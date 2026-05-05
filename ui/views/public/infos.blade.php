@extends('admin', ['context' => 'infos', 'title' => $pageTitle ?? ''])

@section('content')
    <style>
        /* All values resolved from design tokens (tokens.css) — light + dark
           swap automatically via the [data-theme="dark"] alias overrides. */

        /* Hide redundant H2 inside each legacy stats panel — the tab label
           already names the section. */
        .yourls-infos-panel > div > h2:first-child { display: none; }

        /* Legacy 2-col <table border="0"> → responsive CSS grid */
        .yourls-infos-panel table[border="0"] {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            background: transparent;
        }
        .yourls-infos-panel table[border="0"] > tbody > tr {
            display: grid;
            grid-template-columns: minmax(0, 1.35fr) minmax(0, 1fr);
            gap: var(--space-6);
        }
        @media (max-width: 768px) {
            .yourls-infos-panel table[border="0"] > tbody > tr { grid-template-columns: 1fr; }
        }
        .yourls-infos-panel table[border="0"] > tbody > tr > td {
            padding: 0;
            vertical-align: top;
            min-width: 0;
        }

        /* Chart surfaces — token-driven so they invert in dark mode */
        .yourls-infos-panel .stats_line,
        .yourls-infos-panel [id^="stat_tab_"][id$="_pie"],
        .yourls-infos-panel #stat_tab_location_pie,
        .yourls-infos-panel #stat_tab_location_map,
        .yourls-infos-panel #stat_tab_source_ref,
        .yourls-infos-panel #stat_tab_source_direct {
            background: var(--bg-surface-2);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: var(--space-3);
            margin-top: var(--space-2);
            overflow: hidden;
        }

        /* Section headings */
        .yourls-infos-panel h3 {
            font-size: var(--fs-xs);
            font-weight: var(--fw-semibold);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--text-muted);
            margin: 0 0 var(--space-2);
        }
        .yourls-infos-panel h3 + p,
        .yourls-infos-panel h3 + ul,
        .yourls-infos-panel h3 + .stats_line { margin-top: var(--space-1); }
        .yourls-infos-panel p {
            font-size: var(--fs-sm);
            line-height: var(--lh-normal);
            color: var(--text-secondary);
            margin: 0 0 var(--space-3);
        }

        /* Time-range selector (Last 24h / 7d / 30d / All) — pill buttons */
        .yourls-infos-panel #stats_lines {
            list-style: none;
            padding: 0;
            margin: 0 0 var(--space-3);
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-2);
        }
        .yourls-infos-panel #stats_lines li { margin: 0; }
        .yourls-infos-panel #stats_lines a {
            display: inline-block;
            padding: var(--space-1) var(--space-3);
            border-radius: var(--radius-full);
            background: var(--bg-surface-2);
            color: var(--text-secondary);
            border: 1px solid var(--border-subtle);
            text-decoration: none;
            font-size: var(--fs-xs);
            font-weight: var(--fw-medium);
            transition: background var(--duration-fast) var(--ease-out),
                        color var(--duration-fast) var(--ease-out),
                        border-color var(--duration-fast) var(--ease-out);
        }
        .yourls-infos-panel #stats_lines a:hover {
            background: rgb(var(--color-primary-500) / 0.10);
            color: var(--accent);
            border-color: rgb(var(--color-primary-500) / 0.40);
        }

        /* Historical click count — metric cards */
        .yourls-infos-panel #historical_clicks {
            list-style: none;
            padding: 0;
            margin: 0 0 var(--space-3);
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: var(--space-2);
        }
        .yourls-infos-panel #historical_clicks li {
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: var(--space-1);
            padding: var(--space-3);
            background: var(--bg-surface) !important;
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
        }
        /* Neutralize :target highlight from anchor jumps (#stat_line_*) and
           any stray inherited bg from the legacy stylesheet. */
        .yourls-infos-panel #historical_clicks li,
        .yourls-infos-panel #historical_clicks li:target,
        .yourls-infos-panel #historical_clicks li:hover,
        .yourls-infos-panel #historical_clicks li:focus,
        .yourls-infos-panel #historical_clicks li:focus-within,
        .yourls-infos-panel #historical_clicks li:active {
            background-color: var(--bg-surface) !important;
            background-image: none !important;
        }
        /* Reset anchor inside historical card — no bg, no target highlight */
        .yourls-infos-panel #historical_clicks a,
        .yourls-infos-panel #historical_clicks a:link,
        .yourls-infos-panel #historical_clicks a:visited,
        .yourls-infos-panel #historical_clicks a:hover,
        .yourls-infos-panel #historical_clicks a:active,
        .yourls-infos-panel #historical_clicks a:focus {
            background: transparent !important;
            display: inline;
        }
        .yourls-infos-panel #historical_clicks .historical_link,
        .yourls-infos-panel #historical_clicks .historical_link a {
            font-size: 11px;
            font-weight: var(--fw-semibold);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--text-muted);
            text-decoration: none;
            background: transparent !important;
        }
        .yourls-infos-panel #historical_clicks .historical_link a:hover {
            color: var(--accent);
        }
        .yourls-infos-panel #historical_clicks .historical_count {
            font-size: var(--fs-xl);
            font-weight: var(--fw-semibold);
            font-variant-numeric: tabular-nums;
            color: var(--text-primary);
            line-height: 1.1;
        }
        /* "X per day" trailing string */
        .yourls-infos-panel #historical_clicks li {
            font-size: var(--fs-xs);
            color: var(--text-muted);
        }

        /* Best day disclosure */
        .yourls-infos-panel #details_clicks,
        .yourls-infos-panel #details_countries {
            list-style: none;
            padding-left: var(--space-4);
            font-size: var(--fs-sm);
            color: var(--text-secondary);
        }
        .yourls-infos-panel #details_clicks ul,
        .yourls-infos-panel #details_countries ul {
            list-style: none;
            padding-left: var(--space-4);
        }
        .yourls-infos-panel .bestday {
            color: var(--accent);
            font-weight: var(--fw-semibold);
        }

        /* Disclosure links ("Click for more details") */
        .yourls-infos-panel a.details {
            font-size: var(--fs-xs);
            color: var(--accent);
            text-decoration: none;
        }
        .yourls-infos-panel a.details:hover { text-decoration: underline; }

        /* Country list */
        .yourls-infos-panel #details_countries img {
            display: inline-block;
            vertical-align: middle;
            margin-right: var(--space-2);
            height: 12px;
            width: auto;
        }

        /* Strong values in <p> (eg. "<strong>86</strong> hits on…") */
        .yourls-infos-panel p strong { color: var(--text-primary); font-weight: var(--fw-semibold); }

        /* Force Google Charts SVG to fit the container & invert background.
           Google Charts paints a white <rect> as background — neutralize it
           so our themed surface shows through. */
        .yourls-infos-panel .stats_line > div,
        .yourls-infos-panel [id^="stat_tab_"] > div { max-width: 100%; }
        .yourls-infos-panel .stats_line svg > rect:first-child,
        .yourls-infos-panel [id^="stat_tab_"] svg > rect:first-child {
            fill: transparent !important;
        }
        /* Recolor chart text to current theme */
        .yourls-infos-panel .stats_line svg text,
        .yourls-infos-panel [id^="stat_tab_"] svg text {
            fill: var(--text-secondary) !important;
        }
        /* Axis & gridlines */
        .yourls-infos-panel .stats_line svg path[stroke="#000000"],
        .yourls-infos-panel .stats_line svg line[stroke="#cccccc"],
        .yourls-infos-panel .stats_line svg line[stroke="#000000"] {
            stroke: var(--border-default) !important;
            stroke-opacity: 0.6;
        }
    </style>

    <header class="mb-6 rounded-lg border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-950 px-5 py-4">
        <div class="flex items-center gap-2 mb-1">
            <span aria-hidden="true" class="inline-block h-1.5 w-1.5 rounded-full bg-primary-500"></span>
            <span class="text-[11px] font-semibold uppercase tracking-[0.14em] text-neutral-500 dark:text-neutral-400">
                @yourlsT('Statistics')
            </span>
        </div>
        @if(!empty($title))
            <h1 class="text-xl font-semibold text-neutral-900 dark:text-neutral-100 truncate">{{ $title }}</h1>
        @endif
        <p class="mt-2 flex items-center flex-wrap gap-x-2 gap-y-1 text-sm text-neutral-600 dark:text-neutral-400">
            <a href="{{ $shortUrl ?? '#' }}" class="font-mono font-medium text-primary-600 dark:text-primary-400 hover:underline break-all">{{ $shortUrl ?? '' }}</a>
            <span aria-hidden="true" class="text-neutral-400">→</span>
            <a href="{{ $longUrl ?? '#' }}" class="text-neutral-700 dark:text-neutral-300 hover:underline break-all">{{ $longUrlDisplay ?? ($longUrl ?? '') }}</a>
        </p>
    </header>

    <x-molecules::tabs :tabs="$tabs" :active="$activeTab ?? 'stats'" idPrefix="infos">
        <div role="tabpanel" id="infos-panel-stats" class="yourls-infos-panel">
            <div class="rounded-lg border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-950 p-5">
                {!! $statsPanel ?? '' !!}
            </div>
        </div>
        <div role="tabpanel" id="infos-panel-locations" class="yourls-infos-panel" hidden>
            <div class="rounded-lg border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-950 p-5">
                {!! $locationsPanel ?? '' !!}
            </div>
        </div>
        <div role="tabpanel" id="infos-panel-sources" class="yourls-infos-panel" hidden>
            <div class="rounded-lg border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-950 p-5">
                {!! $sourcesPanel ?? '' !!}
            </div>
        </div>
        <div role="tabpanel" id="infos-panel-share" class="yourls-infos-panel" hidden>
            <x-forms::share-box :longurl="$longUrl ?? ''"
                                :shorturl="$shortUrl ?? ''"
                                :title="$title ?? ''"
                                :share="$shareText ?? ''"
                                :count="$shareCharCount ?? 280" />
        </div>
    </x-molecules::tabs>
@endsection

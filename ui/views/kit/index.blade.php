<!doctype html>
<html lang="{{ $yourls_locale }}" data-theme="{{ $yourls_theme }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YOURLS UI Kit</title>
    @yourlsThemeBoot
    <link rel="stylesheet" href="@yourlsAsset('admin.css')">
    <style>
        body { font-family: var(--font-sans); }
        .kit-section { border-bottom: 1px solid var(--border-subtle); padding: 2rem 0; }
        .kit-row { display: flex; flex-wrap: wrap; gap: .75rem; align-items: center; padding: .5rem 0; }
        .kit-grid { display: grid; gap: 1rem; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); }
        h2 { font-size: 1.125rem; font-weight: 600; margin: 0 0 1rem; color: var(--text-primary); }
        h3 { font-size: .875rem; text-transform: uppercase; letter-spacing: .05em; color: var(--text-muted); margin: 1rem 0 .5rem; }
    </style>
</head>
<body class="bg-app text-primary">
<div class="mx-auto max-w-5xl px-6 py-8">
    <header class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">YOURLS UI Kit</h1>
            <p class="text-sm text-neutral-500">Component catalog for the new admin UI.</p>
        </div>
        <button
            type="button"
            x-data
            @click="$store.theme.toggle()"
            class="inline-flex items-center gap-2 rounded-md border border-neutral-300 dark:border-neutral-700 px-3 py-2 text-sm hover:bg-neutral-50 dark:hover:bg-neutral-800"
        >
            <x-atoms::icon name="sun" />
            <span x-text="$store.theme.current === 'dark' ? 'Light' : 'Dark'">Toggle</span>
        </button>
    </header>

    {{-- Atoms --}}
    <section class="kit-section">
        <h2>Atoms — Buttons</h2>
        <div class="kit-row">
            <x-atoms::button variant="primary">Primary</x-atoms::button>
            <x-atoms::button variant="secondary">Secondary</x-atoms::button>
            <x-atoms::button variant="ghost">Ghost</x-atoms::button>
            <x-atoms::button variant="danger">Danger</x-atoms::button>
            <x-atoms::button variant="success">Success</x-atoms::button>
            <x-atoms::button variant="primary" loading>Loading</x-atoms::button>
            <x-atoms::button variant="primary" disabled>Disabled</x-atoms::button>
            <x-atoms::button variant="primary" icon="plus">With icon</x-atoms::button>
        </div>
        <h3>Sizes</h3>
        <div class="kit-row">
            <x-atoms::button size="sm">Small</x-atoms::button>
            <x-atoms::button size="md">Medium</x-atoms::button>
            <x-atoms::button size="lg">Large</x-atoms::button>
        </div>
        <h3>Icon buttons</h3>
        <div class="kit-row">
            <x-atoms::icon-button icon="pencil" label="Edit" />
            <x-atoms::icon-button icon="trash" label="Delete" variant="danger" />
            <x-atoms::icon-button icon="copy" label="Copy" variant="primary" />
        </div>
    </section>

    <section class="kit-section">
        <h2>Atoms — Status &amp; identity</h2>
        <div class="kit-row">
            <x-atoms::badge>neutral</x-atoms::badge>
            <x-atoms::badge tone="primary">primary</x-atoms::badge>
            <x-atoms::badge tone="success" dot>active</x-atoms::badge>
            <x-atoms::badge tone="warning" dot>pending</x-atoms::badge>
            <x-atoms::badge tone="danger" dot>error</x-atoms::badge>
            <x-atoms::badge tone="info">info</x-atoms::badge>
        </div>
        <div class="kit-row">
            <x-atoms::tag>tag</x-atoms::tag>
            <x-atoms::tag closable>closable</x-atoms::tag>
            <x-atoms::tag tone="primary">primary</x-atoms::tag>
        </div>
        <div class="kit-row">
            <x-atoms::avatar initials="MA" alt="Marco" size="sm" />
            <x-atoms::avatar initials="MA" alt="Marco" />
            <x-atoms::avatar initials="MA" alt="Marco" size="lg" />
            <x-atoms::avatar alt="anonymous" />
        </div>
        <div class="kit-row">
            <x-atoms::spinner size="sm" />
            <x-atoms::spinner />
            <x-atoms::spinner size="lg" />
        </div>
    </section>

    <section class="kit-section">
        <h2>Atoms — Form controls</h2>
        <div class="kit-grid">
            <x-molecules::form-field label="Email" for="kit-email" help="We will not share it.">
                <x-atoms::input id="kit-email" type="email" name="email" placeholder="you@example.com" />
            </x-molecules::form-field>
            <x-molecules::form-field label="Description" for="kit-desc">
                <x-atoms::textarea id="kit-desc" name="desc" rows="3" />
            </x-molecules::form-field>
            <x-molecules::form-field label="Language" for="kit-lang">
                <x-atoms::select id="kit-lang" name="lang" :options="['en' => 'English', 'it' => 'Italiano', 'fr' => 'Français']" selected="it" label="Language" />
            </x-molecules::form-field>
            <x-molecules::form-field label="With error" for="kit-err" error="This field is required.">
                <x-atoms::input id="kit-err" name="err" invalid />
            </x-molecules::form-field>
        </div>
        <h3>Choices</h3>
        <div class="kit-row">
            <x-atoms::checkbox name="agree" label="I agree" />
            <x-atoms::checkbox name="check2" label="Checked" checked />
            <x-atoms::checkbox name="check3" label="Indeterminate" indeterminate />
            <x-atoms::toggle name="dark" label="Dark mode" />
            <x-atoms::toggle name="enabled" label="Enabled" checked />
        </div>
        <div class="kit-row">
            <x-atoms::radio name="opt" :options="['a' => 'Option A', 'b' => 'Option B', 'c' => 'Option C']" selected="b" inline />
        </div>
    </section>

    <section class="kit-section">
        <h2>Atoms — Misc</h2>
        <div class="kit-row">
            <x-atoms::label for="kit-x" required>Required label</x-atoms::label>
        </div>
        <div class="kit-row">
            <x-atoms::help-text>Default help</x-atoms::help-text>
            <x-atoms::help-text tone="error">Error help</x-atoms::help-text>
            <x-atoms::help-text tone="success">Success help</x-atoms::help-text>
        </div>
        <x-atoms::divider />
        <x-atoms::divider label="OR" />
        <h3>Icons</h3>
        <div class="kit-row" style="gap: 1rem;">
            @foreach(['plus','check','x','trash','pencil','copy','search','chevron-down','sun','moon','menu','external','info','alert','link','chart'] as $i)
                <span class="inline-flex flex-col items-center gap-1 text-xs">
                    <x-atoms::icon :name="$i" size="lg" />
                    <code>{{ $i }}</code>
                </span>
            @endforeach
        </div>
    </section>

    {{-- Molecules --}}
    <section class="kit-section">
        <h2>Molecules</h2>
        <div class="kit-grid">
            <div>
                <h3>Search input</h3>
                <x-molecules::search-input value="" placeholder="Search links…" />
            </div>
            <div>
                <h3>Date range</h3>
                <x-molecules::date-range />
            </div>
            <div>
                <h3>File input</h3>
                <x-molecules::file-input name="csv" accept=".csv" />
            </div>
            <div>
                <h3>Copy button</h3>
                <x-molecules::copy-button value="https://yourls.org/abc" />
            </div>
        </div>
        <h3>Pagination</h3>
        <x-molecules::pagination :current="3" :total="12" />
        <h3>Breadcrumb</h3>
        <x-molecules::breadcrumb :items="[['label' => 'Admin', 'href' => '#'], ['label' => 'Plugins', 'href' => '#'], ['label' => 'Settings']]" />
        <h3>Tabs</h3>
        <x-molecules::tabs :tabs="['stats' => 'Statistics', 'sources' => 'Sources', 'share' => 'Share']" active="stats">
            <div class="text-sm text-neutral-600 dark:text-neutral-300">Active panel content goes here.</div>
        </x-molecules::tabs>
        <h3>Dropdown</h3>
        <x-molecules::dropdown label="Actions">
            <a href="#" role="menuitem" class="block px-3 py-1.5 text-sm hover:bg-neutral-50 dark:hover:bg-neutral-800">Edit</a>
            <a href="#" role="menuitem" class="block px-3 py-1.5 text-sm hover:bg-neutral-50 dark:hover:bg-neutral-800">Duplicate</a>
            <a href="#" role="menuitem" class="block px-3 py-1.5 text-sm text-danger-600 hover:bg-danger-50 dark:hover:bg-danger-950">Delete</a>
        </x-molecules::dropdown>
    </section>
</div>
<script src="@yourlsAsset('admin.js')" defer></script>
</body>
</html>

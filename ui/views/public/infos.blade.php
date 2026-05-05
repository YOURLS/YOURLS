@extends('public', ['context' => 'infos', 'title' => $pageTitle ?? ''])

@section('content')
    <header class="mb-6">
        <h1 class="text-2xl font-semibold text-neutral-900 dark:text-neutral-100">{{ $pageTitle ?? '' }}</h1>
        <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-1">
            <a href="{{ $shortUrl ?? '#' }}" class="font-mono text-primary-600 hover:underline">{{ $shortUrl ?? '' }}</a>
            →
            <a href="{{ $longUrl  ?? '#' }}" class="hover:underline">{{ $longUrlDisplay ?? ($longUrl ?? '') }}</a>
        </p>
    </header>

    <x-molecules::tabs :tabs="$tabs" :active="$activeTab ?? 'stats'" idPrefix="infos">
        <div role="tabpanel" id="infos-panel-stats">
            {!! $statsPanel ?? '' !!}
        </div>
        <div role="tabpanel" id="infos-panel-locations" hidden>
            {!! $locationsPanel ?? '' !!}
        </div>
        <div role="tabpanel" id="infos-panel-sources" hidden>
            {!! $sourcesPanel ?? '' !!}
        </div>
        <div role="tabpanel" id="infos-panel-share" hidden>
            <x-forms::share-box :longurl="$longUrl ?? ''"
                                :shorturl="$shortUrl ?? ''"
                                :title="$title ?? ''"
                                :share="$shareText ?? ''"
                                :count="$shareCharCount ?? 280" />
        </div>
    </x-molecules::tabs>
@endsection

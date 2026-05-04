@props(['items' => []])
<nav aria-label="Breadcrumb" {{ $attributes->merge(['class' => 'flex items-center text-sm']) }}>
    <ol class="flex flex-wrap items-center gap-1.5 text-neutral-500 dark:text-neutral-400">
        @foreach($items as $i => $item)
            @php $isLast = $i === array_key_last($items); @endphp
            <li class="flex items-center gap-1.5">
                @if(!$isLast && !empty($item['href']))
                    <a href="{{ $item['href'] }}" class="hover:text-neutral-800 dark:hover:text-neutral-200">{{ $item['label'] }}</a>
                @else
                    <span @if($isLast) aria-current="page" class="text-neutral-800 dark:text-neutral-200 font-medium" @endif>{{ $item['label'] }}</span>
                @endif
                @unless($isLast)
                    <x-atoms::icon name="chevron-right" size="sm" class="text-neutral-300 dark:text-neutral-700" />
                @endunless
            </li>
        @endforeach
    </ol>
</nav>

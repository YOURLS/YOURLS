@props(['cells' => []])
{{-- Preserves the legacy <th id="main_table_head_{key}"> attribute so
     plugins that target a specific column header still match. --}}
<thead>
    <tr>
        @foreach($cells as $key => $label)
            <th id="main_table_head_{{ $key }}" class="text-left font-semibold text-xs uppercase tracking-wide text-neutral-600 dark:text-neutral-400 px-3 py-2 border-b border-neutral-200 dark:border-neutral-800">
                <span>{!! $label !!}</span>
            </th>
        @endforeach
    </tr>
</thead>

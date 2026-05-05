@props([
    'rowId',           // unique element id, e.g. yid12 (matches yourls_unique_element_id)
    'keyword',
    'cells' => [],     // associative array following the legacy %placeholder% template contract
])
{{-- Preserves <tr id="id-{rowId}">, <td class="{cell}" id="{cell}-{rowId}">,
     and the %placeholder% expansion contract so existing
     'table_add_row_cell_array' plugins keep working unchanged. --}}
@php
    $expand = function (array $elements): string {
        $tpl = $elements['template'] ?? '';
        return preg_replace_callback('/%([^%]+)%/', function ($m) use ($elements) {
            return $elements[$m[1]] ?? '';
        }, $tpl);
    };
@endphp
<tr id="id-{{ $rowId }}">
    @foreach($cells as $cellId => $elements)
        <td class="{{ $cellId }} px-3 py-2 align-top border-b border-neutral-100 dark:border-neutral-800" id="{{ $cellId }}-{{ $rowId }}">{!! $expand($elements) !!}</td>
    @endforeach
</tr>

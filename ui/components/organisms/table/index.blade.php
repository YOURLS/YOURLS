@props(['id' => 'main_table'])
{{-- Preserves the legacy id="main_table" + class="tblSorter" so plugins
     that scrape the DOM (notably the tablesorter init code) keep working.
     New CSS targets .yourls-table for clean styling. --}}
<table id="{{ $id }}" {{ $attributes->merge(['class' => 'yourls-table tblSorter w-full text-sm border-separate border-spacing-0']) }} cellpadding="0" cellspacing="1">
    {{ $slot }}
</table>

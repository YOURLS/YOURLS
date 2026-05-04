@props(['colspan' => 6, 'message' => null])
@php
    $message = $message ?? (function_exists('yourls__') ? yourls__('No results') : 'No results');
@endphp
<tr>
    <td colspan="{{ $colspan }}" class="text-center text-sm text-neutral-500 dark:text-neutral-400 py-8">
        {{ $message }}
    </td>
</tr>

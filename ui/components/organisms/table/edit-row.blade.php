@props(['id', 'keyword', 'url', 'title' => '', 'sitePrefix' => ''])
{{-- Preserves legacy edit-row IDs (#edit-{id}, #edit-url-{id},
     #edit-keyword-{id}, #edit-title-{id}, #edit-submit-{id},
     #edit-close-{id}, #old_keyword_{id}, #nonce_{id}) and inline
     onclick handlers (edit_link_save, edit_link_hide). --}}
@php
    $nonce = function_exists('yourls_create_nonce') ? yourls_create_nonce('edit-save_' . $id) : '';
@endphp
<tr id="edit-{{ $id }}" class="edit-row bg-neutral-50 dark:bg-neutral-900">
    <td colspan="5" class="edit-row p-3">
        <div class="grid gap-2">
            <label class="text-xs font-medium text-neutral-600 dark:text-neutral-400">@yourlsT('Long URL')</label>
            <x-atoms::input id="edit-url-{{ $id }}" :name="'edit-url-' . $id" :value="$url" />

            <label class="text-xs font-medium text-neutral-600 dark:text-neutral-400">@yourlsT('Short URL')</label>
            <div class="flex items-center gap-2">
                <span class="text-xs text-neutral-500">{{ $sitePrefix }}</span>
                <x-atoms::input id="edit-keyword-{{ $id }}" :name="'edit-keyword-' . $id" :value="$keyword" />
            </div>

            <label class="text-xs font-medium text-neutral-600 dark:text-neutral-400">@yourlsT('Title')</label>
            <x-atoms::input id="edit-title-{{ $id }}" :name="'edit-title-' . $id" :value="$title" />
        </div>
    </td>
    <td colspan="1" class="edit-row p-3 align-top">
        <div class="flex items-center gap-2">
            <x-atoms::button
                type="button"
                id="edit-submit-{{ $id }}"
                :name="'edit-submit-' . $id"
                variant="primary"
                size="sm"
                :title="function_exists('yourls__') ? yourls__('Save new values') : 'Save new values'"
                onclick="edit_link_save('{{ $id }}');"
            >@yourlsT('Save')</x-atoms::button>
            <x-atoms::button
                type="button"
                id="edit-close-{{ $id }}"
                :name="'edit-close-' . $id"
                variant="secondary"
                size="sm"
                :title="function_exists('yourls__') ? yourls__('Cancel editing') : 'Cancel editing'"
                onclick="edit_link_hide('{{ $id }}');"
            >@yourlsT('Cancel')</x-atoms::button>
            <input type="hidden" id="old_keyword_{{ $id }}" value="{{ $keyword }}" />
            <input type="hidden" id="nonce_{{ $id }}" value="{{ $nonce }}" />
        </div>
    </td>
</tr>

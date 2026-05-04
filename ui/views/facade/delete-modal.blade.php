<x-organisms::modal
    id="delete-confirm-dialog"
    :title="$title"
    :confirmLabel="$confirmLabel"
    :cancelLabel="$cancelLabel"
    confirmTone="danger"
    onConfirm="remove_link_confirmed();"
    onCancel="remove_link_canceled(); return false;"
>
    <p><strong>{{ $reallyDelete }}</strong></p>
    <ul class="text-sm space-y-1 mt-2">
        <li>{{ $shortLabel }}: <span name="short_url"></span></li>
        <li>{{ $titleLabel }}: <span name="title"></span></li>
        <li>{{ $urlLabel }}:   <span name="url"></span></li>
    </ul>
    <input type="hidden" name="keyword_id" value="">
</x-organisms::modal>

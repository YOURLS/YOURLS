{{-- Mirrors the legacy menu hook ordering: admin_notices fires first,
     admin_notice fires immediately after as a back-compat alias. --}}
<div id="admin_notices" class="space-y-2">
    @yourlsAction('admin_notices')
    @yourlsAction('admin_notice')
</div>

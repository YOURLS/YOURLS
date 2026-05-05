{{-- Wrapper used by yourls_ui_render_table_head(). Filter ordering is
     replicated in PHP so this view only emits the markup; the surrounding
     start/end filters are echoed by the caller. --}}
<x-organisms::table.head :cells="$cells" />

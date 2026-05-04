@extends('admin', ['context' => $isBookmark ? 'bookmark' : 'index', 'title' => ''])

@section('content')
    @if(!$isBookmark)
        <p>{!! $searchSentence !!}</p>
        <p>
            @if($totalItems === 0)
                @yourlsT('No URLs.')
                @if(!empty($search)) @yourlsT('Try being less specific') @endif
            @else
                {!! sprintf(
                    function_exists('yourls__') ? yourls__('Display <strong>%1$s</strong> to <strong class="increment">%2$s</strong> of <strong class="increment">%3$s</strong> URLs') : 'Display %1$s to %2$s of %3$s URLs',
                    $displayOnPage, $maxOnPage, $totalItems
                ) !!}
                @if($totalItemsClicks !== false)
                    , {!! sprintf(
                        function_exists('yourls_n')
                            ? yourls_n('counting <strong>1</strong> click', 'counting <strong>%s</strong> clicks', $totalItemsClicks)
                            : 'counting %s clicks',
                        function_exists('yourls_number_format_i18n') ? yourls_number_format_i18n($totalItemsClicks) : $totalItemsClicks
                    ) !!}
                @endif
            @endif
        </p>
    @endif

    <p id="overall_tracking">
        {!! sprintf(
            function_exists('yourls__') ? yourls__('Overall, tracking <strong class="increment">%1$s</strong> links, <strong>%2$s</strong> clicks, and counting!') : 'Overall, tracking %1$s links, %2$s clicks, and counting!',
            function_exists('yourls_number_format_i18n') ? yourls_number_format_i18n($totalUrls)   : $totalUrls,
            function_exists('yourls_number_format_i18n') ? yourls_number_format_i18n($totalClicks) : $totalClicks
        ) !!}
    </p>

    @yourlsAction('admin_page_before_form')

    <x-forms::add-url :url="$url ?? ''" :keyword="$keyword ?? ''" />

    @if(!$isBookmark)
        <x-forms::share-box longurl="" shorturl="" :hidden="true" />
    @endif

    @yourlsAction('admin_page_before_table')

    <x-organisms::table.index id="main_table">
        <x-organisms::table.head :cells="$tableHeadCells" />
        @if(!$isBookmark)
            <x-organisms::table.footer :params="$footerParams" />
        @endif
        <x-organisms::table.tbody>
            {{-- Each row is rendered by yourls_table_add_row() upstream
                 (echoed in $rowsHtml) so that the table_add_row /
                 table_add_row_cell_array filter contract is preserved. --}}
            {!! $rowsHtml !!}
            <tr id="nourl_found" @if($foundRows) style="display:none" @endif>
                <td colspan="6">@yourlsT('No URL')</td>
            </tr>
        </x-organisms::table.tbody>
    </x-organisms::table.index>

    @yourlsAction('admin_page_after_table')

    <x-organisms::modal id="delete-confirm-dialog"
                        :title="function_exists('yourls__') ? yourls__('Delete confirmation') : 'Delete confirmation'"
                        :confirmLabel="function_exists('yourls__') ? yourls__('Delete') : 'Delete'"
                        :cancelLabel="function_exists('yourls__')  ? yourls__('Cancel')  : 'Cancel'"
                        confirmTone="danger"
                        onConfirm="remove_link_confirmed();"
                        onCancel="remove_link_canceled(); return false;">
        <p><strong>@yourlsT('Really delete?')</strong></p>
        <ul class="text-sm space-y-1 mt-2">
            <li>@yourlsT('Short URL'): <span name="short_url"></span></li>
            <li>@yourlsT('Title'):     <span name="title"></span></li>
            <li>@yourlsT('URL'):       <span name="url"></span></li>
        </ul>
        <input type="hidden" name="keyword_id" value="">
    </x-organisms::modal>

    @if($isBookmark)
        <x-forms::share-box :longurl="$bookmarkLongUrl"
                            :shorturl="$bookmarkShortUrl"
                            :title="$bookmarkTitle"
                            :text="$bookmarkText"
                            :share="$bookmarkShareText"
                            :count="$bookmarkCharCount" />
        <script>
            $(document).ready(function () {
                feedback({!! json_encode($bookmarkMessage) !!}, {!! json_encode($bookmarkStatus) !!});
                init_clipboard();
            });
        </script>
    @endif
@endsection

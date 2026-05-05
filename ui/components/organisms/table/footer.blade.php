@props([
    'params' => [],   // associative array passed straight from yourls_html_tfooter()
])
@php
    $search       = $params['search']       ?? '';
    $searchText   = $params['search_text']  ?? '';
    $searchIn     = $params['search_in']    ?? 'all';
    $sortBy       = $params['sort_by']      ?? 'timestamp';
    $sortOrder    = $params['sort_order']   ?? 'desc';
    $page         = (int) ($params['page']  ?? 1);
    $perpage      = (int) ($params['perpage'] ?? 20);
    $clickFilter  = $params['click_filter'] ?? 'more';
    $clickLimit   = $params['click_limit']  ?? '';
    $totalPages   = (int) ($params['total_pages'] ?? 1);
    $dateFilter   = $params['date_filter']  ?? '';
    $dateFirst    = $params['date_first']   ?? '';
    $dateSecond   = $params['date_second']  ?? '';

    // Pagination link builder mirrors the legacy implementation: keep
    // every search/filter param, override "page".
    $base = function_exists('yourls_admin_url') ? yourls_admin_url('index.php') : 'index.php';
    $clean = array_filter($params, fn ($v) => $v !== '' && $v !== null);
    if (isset($clean['search_text'])) {
        $clean['search'] = $clean['search_text'];
        unset($clean['search_text']);
    }
    unset($clean['total_pages']);
    $urlFor = function (int $p) use ($base, $clean): string {
        $merged = array_merge($clean, ['page' => $p]);
        return function_exists('yourls_add_query_arg') ? yourls_add_query_arg($merged, $base) : ($base . '?' . http_build_query($merged));
    };

    $searchInOpts = [
        'all'     => function_exists('yourls__') ? yourls__('All fields') : 'All fields',
        'keyword' => function_exists('yourls__') ? yourls__('Short URL') : 'Short URL',
        'url'     => function_exists('yourls__') ? yourls__('URL') : 'URL',
        'title'   => function_exists('yourls__') ? yourls__('Title') : 'Title',
        'ip'      => function_exists('yourls__') ? yourls__('IP') : 'IP',
    ];
    $sortByOpts = [
        'keyword'   => function_exists('yourls__') ? yourls__('Short URL') : 'Short URL',
        'url'       => function_exists('yourls__') ? yourls__('URL') : 'URL',
        'title'     => function_exists('yourls__') ? yourls__('Title') : 'Title',
        'timestamp' => function_exists('yourls__') ? yourls__('Date') : 'Date',
        'ip'        => function_exists('yourls__') ? yourls__('IP') : 'IP',
        'clicks'    => function_exists('yourls__') ? yourls__('Clicks') : 'Clicks',
    ];
    $sortOrderOpts = [
        'asc'  => function_exists('yourls__') ? yourls__('Ascending') : 'Ascending',
        'desc' => function_exists('yourls__') ? yourls__('Descending') : 'Descending',
    ];
    $clickOpts = [
        'more' => function_exists('yourls__') ? yourls__('more') : 'more',
        'less' => function_exists('yourls__') ? yourls__('less') : 'less',
    ];
    $dateOpts = [
        ''        => '—',
        'before'  => function_exists('yourls__') ? yourls__('before') : 'before',
        'after'   => function_exists('yourls__') ? yourls__('after') : 'after',
        'between' => function_exists('yourls__') ? yourls__('between') : 'between',
    ];
@endphp
<tfoot>
    <tr>
        <th colspan="7" class="px-3 py-4 bg-neutral-50 dark:bg-neutral-950">
            <div id="filter_form">
                <form action="" method="get" class="space-y-3">
                    <div id="filter_options" class="grid gap-3 md:grid-cols-2 xl:grid-cols-4">
                        <x-molecules::form-field :label="function_exists('yourls__') ? yourls__('Search for') : 'Search for'">
                            <div class="flex items-center gap-2">
                                <x-atoms::input name="search" :value="$searchText" size="sm" :placeholder="function_exists('yourls__') ? yourls__('Search for') : 'Search for'" />
                                <x-atoms::select name="search_in" :options="$searchInOpts" :selected="$searchIn" size="sm" />
                            </div>
                        </x-molecules::form-field>

                        <x-molecules::form-field :label="function_exists('yourls__') ? yourls__('Order by') : 'Order by'">
                            <div class="flex items-center gap-2">
                                <x-atoms::select name="sort_by" :options="$sortByOpts" :selected="$sortBy" size="sm" />
                                <x-atoms::select name="sort_order" :options="$sortOrderOpts" :selected="$sortOrder" size="sm" />
                            </div>
                        </x-molecules::form-field>

                        <x-molecules::form-field :label="function_exists('yourls__') ? yourls__('Show links with') : 'Show links with'">
                            <div class="flex items-center gap-2">
                                <x-atoms::select name="click_filter" :options="$clickOpts" :selected="$clickFilter" size="sm" />
                                <x-atoms::input name="click_limit" :value="(string) $clickLimit" size="sm" />
                            </div>
                        </x-molecules::form-field>

                        <x-molecules::form-field :label="function_exists('yourls__') ? yourls__('Show links created') : 'Show links created'">
                            <div class="flex items-center gap-2 flex-wrap">
                                <x-atoms::select name="date_filter" :options="$dateOpts" :selected="$dateFilter" size="sm" />
                                <input type="date" name="date_first"  id="date_first"  value="{{ $dateFirst }}" class="rounded-md border border-neutral-300 dark:border-neutral-700 bg-white dark:bg-neutral-900 text-xs px-2 py-1" />
                                <span id="date_and" @if($dateFilter !== 'between') style="display:none" @endif>&amp;</span>
                                <input type="date" name="date_second" id="date_second" value="{{ $dateSecond }}" class="rounded-md border border-neutral-300 dark:border-neutral-700 bg-white dark:bg-neutral-900 text-xs px-2 py-1" @if($dateFilter !== 'between') style="display:none" @endif />
                            </div>
                        </x-molecules::form-field>

                        <div class="flex items-end gap-2 col-span-full">
                            <x-molecules::form-field :label="function_exists('yourls__') ? yourls__('Number of rows to show') : 'Number of rows to show'">
                                <x-atoms::input name="perpage" :value="(string) $perpage" size="sm" />
                            </x-molecules::form-field>
                            <div id="filter_buttons" class="ml-auto flex items-center gap-2">
                                <x-atoms::button type="submit" id="submit-sort" variant="primary" size="sm">@yourlsT('Search')</x-atoms::button>
                                <x-atoms::button type="button" id="submit-clear-filter" variant="secondary" size="sm" onclick="window.parent.location.href = 'index.php'">@yourlsT('Clear')</x-atoms::button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div id="pagination" class="mt-4 flex items-center justify-between gap-3">
                <span class="nav_total text-xs text-neutral-500 dark:text-neutral-400">
                    @if($totalPages > 1)
                        {{ function_exists('yourls_n') ? sprintf(yourls_n('1 page', '%s pages', $totalPages), $totalPages) : ($totalPages . ' pages') }}
                    @endif
                </span>
                @if($totalPages > 1)
                    <span class="navigation">
                        <x-molecules::pagination :current="$page" :total="$totalPages" :urlFor="$urlFor" />
                    </span>
                @endif
            </div>
        </th>
    </tr>
    @yourlsAction('html_tfooter')
</tfoot>

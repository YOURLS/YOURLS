<?php
/**
 * Parameters used to display links the admin view (eg admin/index.php)
 *
 * @since 1.8.2
 */

namespace YOURLS\Views;

/**
 * Class AdminParams to get admin view parameters (number of links to display, search, ...)
 *
 * @since   1.8.2
 * @package YOURLS\Views
 */
class AdminParams
{

    /**
     * All possible search parameters. Populated in the constructor.
     *
     * @var array
     */
    private $possible_search_params;

    /**
     * All possible sort parameters. Populated in the constructor.
     *
     * @var array
     */
    private $possible_sort_params;

    /**
     * All possible date sorting parameters. Populated in the constructor.
     *
     * @var array
     */
    private $possible_date_sorting;

    /**
     * Parameter translations. Populated in the constructor.
     *
     * @var array
     */
    private $params_translations;


    /**
     * Admin constructor : populate all default parameters
     *
     */
    public function __construct()
    {
        $this->possible_search_params = yourls_apply_filter('admin_params_possible_search',
            ['all', 'keyword', 'url', 'title', 'ip']);
        $this->possible_sort_params   = yourls_apply_filter('admin_params_possible_sort',
            ['keyword', 'url', 'title', 'ip', 'timestamp', 'clicks']);
        $this->params_translations    = yourls_apply_filter('admin_params_possible_translations',[
            'all'       => yourls__('All fields'),
            'keyword'   => yourls__('Short URL'),
            'url'       => yourls__('URL'),
            'title'     => yourls__('Title'),
            'ip'        => yourls__('IP Address'),
            'timestamp' => yourls__('Date'),
            'clicks'    => yourls__('Clicks'),
        ]);
        $this->possible_date_sorting  = yourls_apply_filter('admin_params_possible_date_sort',
            ['before', 'after', 'between']);
    }

    /**
     * Get the number of links to display per page
     *
     * @since 1.8.2
     *
     * @param int $default default number of links to display
     * @return int
     */
    public function get_per_page(int $default): int
    {
        // return if we have a value and it's not 0
        if (isset($_GET['perpage']) && intval($_GET['perpage'])) {
            $per_page = intval($_GET['perpage']);
            // otherwise return filtered default value
        } else {
            // @hook Default number of links to display (value provided by caller eg /admin/index.php)
            $per_page = yourls_apply_filter('admin_view_per_page', $default);
        }

        return $per_page;
    }

    /**
     * Get the current page number to be displayed
     *
     * @since 1.8.2
     *
     * @return int
     */
    public function get_page(): int
    {
        return isset($_GET['page']) ? intval($_GET['page']) : 1;
    }

    /**
     * Get search text (the 'Search for') from query string variables search_protocol, search_slashes and search
     *
     * Some servers don't like query strings containing "(ht|f)tp(s)://". A javascript bit
     * explodes the search text into protocol, slashes and the rest (see JS function
     * split_search_text_before_search()) and this function glues pieces back together
     * See issue https://github.com/YOURLS/YOURLS/issues/1576
     *
     * @since 1.8.2
     *
     * @return string
     */
    public function get_search(): string
    {
        $search = '';
        if (isset($_GET['search_protocol'])) {
            $search .= $_GET['search_protocol'];
        }
        if (isset($_GET['search_slashes'])) {
            $search .= $_GET['search_slashes'];
        }
        if (isset($_GET['search'])) {
            $search .= $_GET['search'];
        }

        // @hook Default search text in links displayed
        return yourls_apply_filter('admin_view_get_search_text', htmlspecialchars(trim($search)));
    }

    /**
     * Get the 'Search In' parameter (one of 'all', 'keyword', 'url', 'title', 'ip')
     *
     * @since 1.8.2
     *
     * @return string
     */
    public function get_search_in(): string
    {
        if (isset($_GET['search_in']) && in_array($_GET['search_in'], $this->possible_search_params)) {
            $search_in = $_GET['search_in'];
        } else {
            // @hook Default searching in the admin view (in all fields)
            $search_in = yourls_apply_filter('admin_view_search_in', 'all');
        }

        return $search_in;
    }

    /**
     * Get the 'Sort by' parameter
     *
     * @since 1.8.2
     *
     * @return mixed
     */
    public function get_sort_by(): string
    {
        if (isset($_GET['sort_by']) && in_array($_GET['sort_by'], $this->possible_sort_params)) {
            $sort_by = $_GET['sort_by'];
        } else {
            // @hook Default sorting in the admin view (by Timestamp)
            $sort_by = yourls_apply_filter('admin_view_sort_by', 'timestamp');
        }

        return $sort_by;
    }

    /**
     * Get the correct phrasing associated to a search or sort parameter (ie 'all' -> 'All fields' for instance)
     *
     * No checks : you need to supply an existing parameter, see $params_translations
     *
     * @since 1.8.2
     *
     * @param string $param
     * @return string
     */
    public function get_param_long_name(string $param): string
    {
        return $this->params_translations[$param];
    }

    /**
     * Get the sort order (asc or desc)
     *
     * @since 1.8.2
     *
     * @return mixed
     */
    public function get_sort_order()
    {
        // @hook Default sorting order in the admin view (descending)
        return isset($_GET['sort_order']) && $_GET['sort_order'] == 'asc' ? 'asc' : yourls_apply_filter('admin_view_sort_order', 'desc');

    }

    /**
     * Get the click "more or less than"
     *
     * @since 1.8.2
     *
     * @return mixed
     */
    public function get_click_filter()
    {
        // @hook Default 'Show links with more/less than' ('more')
        return isset($_GET['click_filter']) && $_GET['click_filter'] == 'less' ? 'less' : yourls_apply_filter('admin_view_click_filter', 'more');
    }

    /**
     * Get the click threshold
     *
     * @since 1.8.2
     *
     * @return int|string
     */
    public function get_click_limit()
    {
        // @hook Default link click threshold (unset)
        return (isset($_GET['click_limit']) && intval($_GET['click_limit'])) ?
            intval($_GET['click_limit']) : yourls_apply_filter('admin_view_click_limit', '');
    }


    /**
     * Get the date parameters : the date "filter" and the two dates
     *
     * @since 1.8.2
     *
     * @return array
     */
    public function get_date_params(): array
    {
        if (isset($_GET['date_filter']) && in_array($_GET['date_filter'], $this->possible_date_sorting)) {
            $date_filter = $_GET['date_filter'];
        } else {
            // @hook Default date filtering (unset)
            $date_filter = yourls_apply_filter('admin_view_date_filter', '');
        }

        switch ($date_filter) {
            case 'after':
            case 'before':
                if (isset($_GET['date_first']) && yourls_sanitize_date($_GET['date_first'])) {
                    $date_first = yourls_sanitize_date($_GET['date_first']);
                } else {
                    // @hook Default date when date filter is either 'after' or 'before' (unset)
                    // In such case, the filter is either 'admin_view_date_first_after' or 'admin_view_date_first_before'
                    $date_first = yourls_apply_filter('admin_view_date_first_' . $date_filter, '');
                }
                $date_second = '';
                break;

            case 'between':
                if (isset($_GET['date_first']) && isset($_GET['date_second']) && yourls_sanitize_date($_GET['date_first']) && yourls_sanitize_date($_GET['date_second'])) {
                    $date_first  = yourls_sanitize_date($_GET['date_first']);
                    $date_second = yourls_sanitize_date($_GET['date_second']);
                } else {
                    // @hook Default dates when date filter is 'between' (unset)
                    $date_first  = yourls_apply_filter('admin_view_date_first_between', '');
                    $date_second = yourls_apply_filter('admin_view_date_second_between', '');
                }
                break;

            default:
                // @hook Default date when date filter is unset (unset)
                $date_first  = yourls_apply_filter('admin_view_date_first_unset', '');
                $date_second = yourls_apply_filter('admin_view_date_second_unset', '');

        }

        return ['date_filter' => $date_filter, 'date_first' => $date_first, 'date_second' => $date_second];
    }

}

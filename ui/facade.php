<?php
/**
 * YOURLS UI - Blade-backed alternatives to the legacy yourls_html_*
 * functions in includes/functions-html.php.
 *
 * These functions render the same logical output via the new component
 * layer. They are NOT a drop-in replacement at the symbol level: PHP
 * does not allow redefining a global function, so the legacy
 * implementations stay in place and continue to be the default
 * rendering path.
 *
 * Plugin and core authors can opt into the new rendering by calling
 * the yourls_ui_render_* functions instead. Each one preserves the
 * exact firing order of every yourls_do_action / yourls_apply_filter
 * the legacy version emitted, and keeps the legacy DOM ids and class
 * names plugins target.
 *
 * Future direction (post v1.11): the legacy yourls_html_* functions
 * become thin wrappers that call yourls_ui_render_* whenever the new
 * UI is enabled. That requires either a PHP-level shim (e.g. via the
 * upcoming `override_function` proposal or a Composer pre-load) or
 * editing functions-html.php in place; both paths can be evaluated
 * once the new layer has been validated against the plugin ecosystem
 * smoke set.
 */

if (!function_exists('yourls_ui_render_html_addnew')) {
    function yourls_ui_render_html_addnew(string $url = '', string $keyword = ''): void
    {
        $pre = function_exists('yourls_apply_filter')
            ? yourls_apply_filter('shunt_html_addnew', function_exists('yourls_shunt_default') ? yourls_shunt_default() : null, $url, $keyword)
            : null;
        $shuntDefault = function_exists('yourls_shunt_default') ? yourls_shunt_default() : null;
        if ($pre !== null && $pre !== $shuntDefault) {
            echo $pre;
            return;
        }
        echo yourls_ui_view('forms.add-url', ['url' => $url, 'keyword' => $keyword]);
    }
}

if (!function_exists('yourls_ui_render_share_box')) {
    function yourls_ui_render_share_box(
        string $longurl,
        string $shorturl,
        string $title = '',
        string $text = '',
        string $shortlinkTitle = '',
        string $shareTitle = '',
        bool   $hidden = false
    ): void {
        $pre = function_exists('yourls_apply_filter')
            ? yourls_apply_filter('shunt_share_box', function_exists('yourls_shunt_default') ? yourls_shunt_default() : null)
            : null;
        $shuntDefault = function_exists('yourls_shunt_default') ? yourls_shunt_default() : null;
        if ($pre !== null && $pre !== $shuntDefault) {
            echo $pre;
            return;
        }

        if (function_exists('yourls_normalize_uri')) {
            $shorturl = yourls_normalize_uri($shorturl);
        }

        $textPart  = $text  !== '' ? '"' . $text . '" ' : '';
        $titlePart = $title !== '' ? $title . ' '       : '';
        $share = function_exists('yourls_esc_textarea')
            ? yourls_esc_textarea($titlePart . $textPart . $shorturl)
            : htmlspecialchars($titlePart . $textPart . $shorturl, ENT_QUOTES);
        $count = 280 - strlen($share);

        $data = compact('longurl', 'shorturl', 'title', 'text', 'shortlinkTitle', 'shareTitle', 'share', 'count', 'hidden');
        if (function_exists('yourls_apply_filter')) {
            // Map back to the legacy snake_case keys for the share_box_data filter.
            $legacy = $data;
            $legacy['shortlink_title'] = $legacy['shortlinkTitle']; unset($legacy['shortlinkTitle']);
            $legacy['share_title']     = $legacy['shareTitle'];     unset($legacy['shareTitle']);
            $legacy = yourls_apply_filter('share_box_data', $legacy);
            $data['shortlinkTitle'] = $legacy['shortlink_title'] ?? '';
            $data['shareTitle']     = $legacy['share_title']     ?? '';
            foreach (['longurl', 'shorturl', 'title', 'text', 'share', 'count', 'hidden'] as $k) {
                if (array_key_exists($k, $legacy)) $data[$k] = $legacy[$k];
            }
        }

        $data['logRedirect'] = function_exists('yourls_do_log_redirect') ? (bool) yourls_do_log_redirect() : false;

        echo yourls_ui_view('forms.share-box', $data);
    }
}

if (!function_exists('yourls_ui_render_html_select')) {
    function yourls_ui_render_html_select(string $name, array $options, string $selected = '', bool $display = false, string $label = ''): string
    {
        if (function_exists('yourls_apply_filter')) {
            $options = yourls_apply_filter('html_select_options', $options, $name, $selected, $display, $label);
        }
        $html = yourls_ui_view('facade.select', [
            'name'     => $name,
            'options'  => $options,
            'selected' => $selected,
            'label'    => $label,
        ]);
        if (function_exists('yourls_apply_filter')) {
            $html = yourls_apply_filter('html_select', $html, $name, $options, $selected, $display);
        }
        if ($display) {
            echo $html;
        }
        return $html;
    }
}

if (!function_exists('yourls_ui_render_table_head')) {
    function yourls_ui_render_table_head(): void
    {
        $start = '<table id="main_table" class="yourls-table tblSorter w-full text-sm border-separate border-spacing-0" cellpadding="0" cellspacing="1">';
        if (function_exists('yourls_apply_filter')) {
            $start = yourls_apply_filter('table_head_start', $start);
        }
        echo $start;

        $cells = [
            'shorturl' => function_exists('yourls__') ? yourls__('Short URL')    : 'Short URL',
            'longurl'  => function_exists('yourls__') ? yourls__('Original URL') : 'Original URL',
            'date'     => function_exists('yourls__') ? yourls__('Date')         : 'Date',
            'ip'       => function_exists('yourls__') ? yourls__('IP')           : 'IP',
            'clicks'   => function_exists('yourls__') ? yourls__('Clicks')       : 'Clicks',
            'actions'  => function_exists('yourls__') ? yourls__('Actions')      : 'Actions',
        ];
        if (function_exists('yourls_apply_filter')) {
            $cells = (array) yourls_apply_filter('table_head_cells', $cells);
        }

        echo yourls_ui_view('facade.table-head', ['cells' => $cells]);

        $end = '';
        if (function_exists('yourls_apply_filter')) {
            $end = yourls_apply_filter('table_head_end', '');
        }
        echo $end;
    }
}

if (!function_exists('yourls_ui_render_table_tbody_start')) {
    function yourls_ui_render_table_tbody_start(): void
    {
        $html = '<tbody>';
        if (function_exists('yourls_apply_filter')) {
            $html = yourls_apply_filter('table_tbody_start', $html);
        }
        echo $html;
    }
}

if (!function_exists('yourls_ui_render_table_tbody_end')) {
    function yourls_ui_render_table_tbody_end(): void
    {
        $html = '</tbody>';
        if (function_exists('yourls_apply_filter')) {
            $html = yourls_apply_filter('table_tbody_end', $html);
        }
        echo $html;
    }
}

if (!function_exists('yourls_ui_render_table_end')) {
    function yourls_ui_render_table_end(): void
    {
        $html = '</table></main>';
        if (function_exists('yourls_apply_filter')) {
            $html = yourls_apply_filter('table_end', $html);
        }
        echo $html;
    }
}

if (!function_exists('yourls_ui_render_delete_link_modal')) {
    function yourls_ui_render_delete_link_modal(): void
    {
        echo yourls_ui_view('facade.delete-modal', [
            'title'        => function_exists('yourls__') ? yourls__('Delete confirmation') : 'Delete confirmation',
            'confirmLabel' => function_exists('yourls__') ? yourls__('Delete') : 'Delete',
            'cancelLabel'  => function_exists('yourls__') ? yourls__('Cancel') : 'Cancel',
            'reallyDelete' => function_exists('yourls__') ? yourls__('Really delete?') : 'Really delete?',
            'shortLabel'   => function_exists('yourls__') ? yourls__('Short URL') : 'Short URL',
            'titleLabel'   => function_exists('yourls__') ? yourls__('Title')     : 'Title',
            'urlLabel'     => function_exists('yourls__') ? yourls__('URL')       : 'URL',
        ]);
    }
}

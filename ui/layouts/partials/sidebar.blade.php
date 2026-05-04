@php
    // Reproduces yourls_html_menu() exactly: builds the same arrays,
    // applies the same filters, fires admin_menu / admin_notices /
    // admin_notice in the same order.
    $logoutLink = '';
    if (defined('YOURLS_USER') && function_exists('yourls_nonce_url') && function_exists('yourls_admin_url')) {
        $logoutUrl  = yourls_nonce_url('admin_logout',
            yourls_add_query_arg(['action' => 'logout'], yourls_admin_url('index.php')), 'nonce', 'logout');
        $hello      = function_exists('yourls__') ? yourls__('Hello <strong>%s</strong>') : 'Hello <strong>%s</strong>';
        $logoutText = function_exists('yourls__') ? yourls__('Logout') : 'Logout';
        $titleAttr  = function_exists('yourls_esc_attr__') ? yourls_esc_attr__('Logout') : 'Logout';
        $logoutLink = sprintf($hello, YOURLS_USER) . ' (<a href="' . $logoutUrl . '" title="' . $titleAttr . '">' . $logoutText . '</a>)';
    }
    $logoutLink = (string) \YOURLS\UI\HookBridge::filter('logout_link', $logoutLink);

    $siteUrl  = function_exists('yourls_site_url') ? rtrim((string) yourls_site_url(false), '/') : '';
    $helpText = function_exists('yourls__') ? yourls__('Help') : 'Help';
    $helpLink = (string) \YOURLS\UI\HookBridge::filter('help_link', '<a href="' . $siteUrl . '/readme.html">' . $helpText . '</a>');

    $adminUrl = fn (string $f) => function_exists('yourls_admin_url') ? yourls_admin_url($f) : $f;
    $adminLinks = [
        'admin' => [
            'url'    => $adminUrl('index.php'),
            'title'  => function_exists('yourls__') ? yourls__('Go to the admin interface') : 'Go to the admin interface',
            'anchor' => function_exists('yourls__') ? yourls__('Admin interface') : 'Admin interface',
        ],
    ];
    if (function_exists('yourls_is_admin') && yourls_is_admin()) {
        $adminLinks['tools']   = ['url' => $adminUrl('tools.php'),   'anchor' => function_exists('yourls__') ? yourls__('Tools') : 'Tools'];
        $adminLinks['plugins'] = ['url' => $adminUrl('plugins.php'), 'anchor' => function_exists('yourls__') ? yourls__('Manage Plugins') : 'Manage Plugins'];
    }
    $adminSublinks = [];
    if (function_exists('yourls_list_plugin_admin_pages')) {
        $adminSublinks['plugins'] = yourls_list_plugin_admin_pages();
    }

    $adminLinks    = (array) \YOURLS\UI\HookBridge::filter('admin_links',    $adminLinks);
    $adminSublinks = (array) \YOURLS\UI\HookBridge::filter('admin_sublinks', $adminSublinks);

    $isPrivate = function_exists('yourls_is_private') ? yourls_is_private() : false;
@endphp
<nav role="navigation"><ul id="admin_menu">
    @if($isPrivate && !empty($logoutLink))
        <li id="admin_menu_logout_link">{!! $logoutLink !!}</li>
    @endif
    @foreach($adminLinks as $key => $ar)
        @php
            $anchor = $ar['anchor'] ?? $key;
            $title  = isset($ar['title']) ? ' title="' . $ar['title'] . '"' : '';
            $url    = $ar['url'] ?? '#';
        @endphp
        <li id="admin_menu_{{ $key }}_link" class="admin_menu_toplevel"><a href="{{ $url }}"{!! $title !!}>{{ $anchor }}</a></li>
        @if(!empty($adminSublinks[$key]))
            <ul>
                @foreach($adminSublinks[$key] as $subKey => $subAr)
                    @php
                        $subAnchor = $subAr['anchor'] ?? $subKey;
                        $subTitle  = isset($subAr['title']) ? ' title="' . $subAr['title'] . '"' : '';
                        $subUrl    = $subAr['url'] ?? '#';
                    @endphp
                    <li id="admin_menu_{{ $subKey }}_link" class="admin_menu_sublevel admin_menu_sublevel_{{ $subKey }}"><a href="{{ $subUrl }}"{!! $subTitle !!}>{{ $subAnchor }}</a></li>
                @endforeach
            </ul>
        @endif
    @endforeach
    @if(!empty($helpLink))
        <li id="admin_menu_help_link">{!! $helpLink !!}</li>
    @endif
    @yourlsAction('admin_menu')
</ul></nav>
@yourlsAction('admin_notices')
@yourlsAction('admin_notice')

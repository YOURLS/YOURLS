@include('partials.head', ['context' => $context ?? 'index', 'title' => $title ?? ''])
@include('logo')
@include('partials.sidebar')
@yourlsAction('admin_page_before_content')
{{ $slot ?? '' }}
@yield('content')
@include('partials.flash')
@include('partials.footer')

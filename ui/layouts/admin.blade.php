@include('partials.head', ['context' => $context ?? 'index', 'title' => $title ?? ''])
@include('logo')
@include('partials.sidebar')
@yourlsAction('admin_page_before_content')
{{ $slot ?? '' }}
<main role="main">

@yield('content')
</main>

@include('partials.flash')
@include('partials.footer')

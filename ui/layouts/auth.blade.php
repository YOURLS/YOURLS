@include('partials.head', ['context' => $context ?? 'login', 'title' => $title ?? ''])
@include('logo')
<main role="main" class="mx-auto max-w-md px-4 py-8">
    {{ $slot ?? '' }}
    @yield('content')
</main>
@include('partials.footer')

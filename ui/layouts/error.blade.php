@include('partials.head', ['context' => $context ?? 'error', 'title' => $title ?? ''])
@include('logo')
<main role="main" class="mx-auto max-w-2xl px-4 py-8">
    {{ $slot ?? '' }}
    @yield('content')
</main>
@include('partials.footer', ['canQuery' => false])

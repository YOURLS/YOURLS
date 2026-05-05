@include('partials.head', ['context' => $context ?? 'infos', 'title' => $title ?? ''])
<main role="main" class="mx-auto max-w-5xl px-4 py-8">
    {{ $slot ?? '' }}
    @yield('content')
</main>
@include('partials.footer')

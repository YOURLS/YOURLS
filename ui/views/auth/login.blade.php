@extends('auth', ['context' => 'login', 'title' => function_exists('yourls__') ? yourls__('Login') : 'Login'])

@section('content')
    @php
        $action = (isset($_GET['action']) && $_GET['action'] === 'logout') ? '?' : '';
    @endphp
    <main role="main">
        <div id="login" class="yourls-card p-6">
            <form method="post" action="{{ $action }}">
                @if(!empty($error_msg))
                    <p id="error-message" class="error text-sm text-danger-600">{!! $error_msg !!}</p>
                @endif
                @yourlsAction('login_form_top')
                <div class="space-y-4">
                    <x-molecules::form-field :label="function_exists('yourls__') ? yourls__('Username') : 'Username'" for="username">
                        <x-atoms::input id="username" name="username" autocomplete="username" aria-describedby="error-message" />
                    </x-molecules::form-field>
                    <x-molecules::form-field :label="function_exists('yourls__') ? yourls__('Password') : 'Password'" for="password">
                        <x-atoms::input id="password" name="password" type="password" autocomplete="current-password" />
                    </x-molecules::form-field>
                </div>
                @yourlsAction('login_form_bottom')
                <p style="text-align: right;" class="mt-4">
                    @yourlsNonce('admin_login')
                    <x-atoms::button type="submit" id="submit" name="submit" variant="primary">@yourlsT('Login')</x-atoms::button>
                </p>
                @yourlsAction('login_form_end')
            </form>
            <script>document.getElementById('username')?.focus();</script>
        </div>
    </main>
@endsection

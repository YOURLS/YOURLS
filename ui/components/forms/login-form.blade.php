@props(['error' => null, 'username' => '', 'action' => ''])
<form id="login" method="post" action="{{ $action }}" class="space-y-4">
    @if($error)
        <p id="error-message" class="text-sm text-danger-600" role="alert">{{ $error }}</p>
    @endif
    @yourlsAction('login_form_top')
    <x-molecules::form-field :label="function_exists('yourls__') ? yourls__('Username') : 'Username'" for="username">
        <x-atoms::input id="username" name="username" :value="$username" required autocomplete="username" />
    </x-molecules::form-field>
    <x-molecules::form-field :label="function_exists('yourls__') ? yourls__('Password') : 'Password'" for="password">
        <x-atoms::input id="password" name="password" type="password" required autocomplete="current-password" />
    </x-molecules::form-field>
    @yourlsAction('login_form_bottom')
    <x-atoms::button type="submit" variant="primary" class="w-full">@yourlsT('Login')</x-atoms::button>
    @yourlsAction('login_form_end')
</form>

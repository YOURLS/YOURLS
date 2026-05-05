@extends('admin', ['title' => function_exists('yourls__') ? yourls__('Profile') : 'Profile'])

@section('content')
    <div class="space-y-4">
        @if(!empty($flash))
            <x-organisms::banner :tone="$flash['tone']">{{ $flash['message'] }}</x-organisms::banner>
        @endif

        <x-organisms::card :title="function_exists('yourls__') ? yourls__('Change password') : 'Change password'">
            @if(!$is_db_user)
                <p>@yourlsT('Your credentials live in user/config.php. Edit that file to change them.')</p>
            @else
                <form method="post" action="profile.php" class="space-y-3">
                    <input type="hidden" name="action" value="change_password" />
                    <input type="hidden" name="nonce"  value="{{ $nonce }}" />
                    <label class="block">
                        @yourlsT('Current password')
                        <input class="text" type="password" name="current_password" autocomplete="current-password" required />
                    </label>
                    <label class="block">
                        @yourlsT('New password')
                        <input class="text" type="password" name="password" autocomplete="new-password" required />
                    </label>
                    <label class="block">
                        @yourlsT('Confirm new password')
                        <input class="text" type="password" name="password_confirm" autocomplete="new-password" required />
                    </label>
                    <button type="submit" class="yourls-btn-primary">@yourlsT('Change password')</button>
                </form>
            @endif
        </x-organisms::card>

        <x-organisms::card :title="function_exists('yourls__') ? yourls__('API access') : 'API access'">
            <p><strong>@yourlsT('Username'):</strong> {{ $me_name }}</p>
            <p><strong>@yourlsT('Signature'):</strong> <code>{{ $signature }}</code></p>
            <p class="text-xs">@yourlsT('Example URL'): <code>{{ $sample_url }}</code></p>

            @if($is_db_user)
                <form method="post" action="profile.php" class="mt-3" onsubmit="return confirm('@yourlsT('Rotate your API key? All scripts using the current signature will stop working until updated.')')">
                    <input type="hidden" name="action" value="rotate_key" />
                    <input type="hidden" name="nonce"  value="{{ $nonce }}" />
                    <button type="submit">@yourlsT('Rotate my API key')</button>
                </form>
            @else
                <p class="text-xs mt-3">@yourlsT('Config-file users cannot rotate the signature; it is derived from the static cookie key.')</p>
            @endif
        </x-organisms::card>
    </div>
@endsection

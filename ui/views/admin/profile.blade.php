@extends('admin', ['title' => function_exists('yourls__') ? yourls__('Profile') : 'Profile'])

@section('content')
    <div class="space-y-4">
        @if(!empty($flash))
            <x-organisms::banner :tone="$flash['tone']">{{ $flash['message'] }}</x-organisms::banner>
        @endif

        <x-organisms::card :title="function_exists('yourls__') ? yourls__('Change password') : 'Change password'">
            @if(!$is_db_user)
                <p class="text-sm text-neutral-600 dark:text-neutral-400">
                    @yourlsT('Your credentials live in user/config.php. Edit that file to change them.')
                </p>
            @else
                <form method="post" action="profile.php" class="space-y-4">
                    <input type="hidden" name="action" value="change_password" />
                    <input type="hidden" name="nonce"  value="{{ $nonce }}" />

                    <x-molecules::form-field :label="yourls__('Current password')" for="profile_current_password" :required="true">
                        <x-atoms::input
                            type="password"
                            id="profile_current_password"
                            name="user_current_password"
                            autocomplete="current-password"
                            :required="true"
                        />
                    </x-molecules::form-field>

                    <x-molecules::form-field :label="yourls__('New password')" for="profile_password" :required="true">
                        <x-atoms::input
                            type="password"
                            id="profile_password"
                            name="user_password"
                            autocomplete="new-password"
                            :required="true"
                        />
                    </x-molecules::form-field>

                    <x-molecules::form-field :label="yourls__('Confirm new password')" for="profile_password_confirm" :required="true">
                        <x-atoms::input
                            type="password"
                            id="profile_password_confirm"
                            name="user_password_confirm"
                            autocomplete="new-password"
                            :required="true"
                        />
                    </x-molecules::form-field>

                    <div class="pt-2">
                        <x-atoms::button type="submit" variant="primary">
                            @yourlsT('Change password')
                        </x-atoms::button>
                    </div>
                </form>
            @endif
        </x-organisms::card>

        <x-organisms::card :title="function_exists('yourls__') ? yourls__('API access') : 'API access'">
            <dl class="grid grid-cols-[max-content_1fr] gap-x-4 gap-y-2 text-sm">
                <dt class="font-semibold text-neutral-700 dark:text-neutral-300">@yourlsT('Username')</dt>
                <dd class="text-neutral-900 dark:text-neutral-100">{{ $me_name }}</dd>

                <dt class="font-semibold text-neutral-700 dark:text-neutral-300">@yourlsT('Signature')</dt>
                <dd><code class="rounded bg-neutral-100 dark:bg-neutral-800 px-1.5 py-0.5 text-xs">{{ $signature }}</code></dd>

                <dt class="font-semibold text-neutral-700 dark:text-neutral-300">@yourlsT('Example URL')</dt>
                <dd>
                    <code class="block rounded bg-neutral-100 dark:bg-neutral-800 px-2 py-1 text-xs break-all">{{ $sample_url }}</code>
                </dd>
            </dl>

            <div class="mt-4">
                @if($is_db_user)
                    <form method="post" action="profile.php" onsubmit="return confirm('@yourlsT('Rotate your API key? All scripts using the current signature will stop working until updated.')')">
                        <input type="hidden" name="action" value="rotate_key" />
                        <input type="hidden" name="nonce"  value="{{ $nonce }}" />
                        <x-atoms::button type="submit" variant="secondary">
                            @yourlsT('Rotate my API key')
                        </x-atoms::button>
                    </form>
                @else
                    <p class="text-xs text-neutral-500 dark:text-neutral-400">
                        @yourlsT('Config-file users cannot rotate the signature; it is derived from the static cookie key.')
                    </p>
                @endif
            </div>
        </x-organisms::card>
    </div>
@endsection

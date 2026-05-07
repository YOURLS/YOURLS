@extends('admin', ['title' => function_exists('yourls__') ? yourls__('User') : 'User'])

@section('content')
    <div class="space-y-4">
        @if(!empty($flash))
            <x-organisms::banner :tone="$flash['tone']">{{ $flash['message'] }}</x-organisms::banner>
        @endif

        <x-organisms::card :title="$editing_user ? yourls__('Edit user') : yourls__('New user')">
            <form method="post" action="users.php" class="space-y-4">
                <input type="hidden" name="action" value="{{ $editing_user ? 'update' : 'create' }}" />
                <input type="hidden" name="id" value="{{ (int) ($editing_user['user_id'] ?? 0) }}" />
                <input type="hidden" name="nonce" value="{{ $nonce }}" />

                <x-molecules::form-field :label="yourls__('Username')" for="user_username" :required="!$editing_user">
                    <x-atoms::input
                        id="user_username"
                        name="user_username"
                        :value="$editing_user['username'] ?? ''"
                        :required="!$editing_user"
                        autocomplete="off"
                    />
                </x-molecules::form-field>

                <x-molecules::form-field :label="yourls__('Role')" for="user_role">
                    <x-atoms::select
                        id="user_role"
                        name="role"
                        :options="['admin' => 'admin', 'editor' => 'editor']"
                        :selected="$editing_user['role'] ?? 'editor'"
                    />
                </x-molecules::form-field>

                <div>
                    <x-atoms::checkbox
                        id="user_is_active"
                        name="is_active"
                        :checked="!$editing_user || (int) ($editing_user['is_active'] ?? 1)"
                        :label="yourls__('Active')"
                    />
                </div>

                <x-molecules::form-field
                    :label="$editing_user ? yourls__('New password (leave blank to keep)') : yourls__('Password')"
                    for="user_password"
                    :required="!$editing_user"
                >
                    <x-atoms::input
                        type="password"
                        id="user_password"
                        name="user_password"
                        autocomplete="new-password"
                        :required="!$editing_user"
                    />
                </x-molecules::form-field>

                <x-molecules::form-field :label="yourls__('Confirm password')" for="user_password_confirm" :required="!$editing_user">
                    <x-atoms::input
                        type="password"
                        id="user_password_confirm"
                        name="user_password_confirm"
                        autocomplete="new-password"
                        :required="!$editing_user"
                    />
                </x-molecules::form-field>

                <div class="flex items-center gap-2 pt-2">
                    <x-atoms::button type="submit" variant="primary">
                        {{ $editing_user ? yourls__('Save') : yourls__('Create') }}
                    </x-atoms::button>
                    <a href="users.php">
                        <x-atoms::button type="button" variant="secondary" onclick="window.location='users.php'; return false;">
                            @yourlsT('Cancel')
                        </x-atoms::button>
                    </a>
                </div>
            </form>
        </x-organisms::card>

        @if($editing_user)
            <x-organisms::card :title="yourls__('API key')">
                <p class="text-sm text-neutral-600 dark:text-neutral-400 mb-3">
                    @yourlsT('Current version'): <code>v{{ (int) $editing_user['api_key_version'] }}</code>
                </p>
                <form method="post" action="users.php" onsubmit="return confirm('@yourlsT('Rotate this user\'s API key? All scripts using the current signature will stop working.')')">
                    <input type="hidden" name="action" value="rotate_key" />
                    <input type="hidden" name="id" value="{{ (int) $editing_user['user_id'] }}" />
                    <input type="hidden" name="nonce" value="{{ $nonce }}" />
                    <x-atoms::button type="submit" variant="secondary">
                        @yourlsT('Rotate API key')
                    </x-atoms::button>
                </form>
            </x-organisms::card>
        @endif
    </div>
@endsection

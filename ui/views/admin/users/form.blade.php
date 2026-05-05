@extends('admin', ['title' => function_exists('yourls__') ? yourls__('User') : 'User'])

@section('content')
    @if(!empty($flash))
        <x-organisms::banner :tone="$flash['tone']">{{ $flash['message'] }}</x-organisms::banner>
    @endif

    <x-organisms::card :title="$editing_user ? yourls__('Edit user') : yourls__('New user')">
        <form method="post" action="users.php" class="space-y-3">
            <input type="hidden" name="action" value="{{ $editing_user ? 'update' : 'create' }}" />
            <input type="hidden" name="id" value="{{ (int) ($editing_user['user_id'] ?? 0) }}" />
            <input type="hidden" name="nonce" value="{{ $nonce }}" />

            <label class="block">
                @yourlsT('Username')
                <input class="text" name="username" value="{{ $editing_user['username'] ?? '' }}" required />
            </label>

            <label class="block">
                @yourlsT('Role')
                <select name="role">
                    <option value="admin"  @if(($editing_user['role'] ?? 'editor') === 'admin')  selected @endif>admin</option>
                    <option value="editor" @if(($editing_user['role'] ?? 'editor') === 'editor') selected @endif>editor</option>
                </select>
            </label>

            <label class="block">
                <input type="checkbox" name="is_active" @if(!$editing_user || (int) ($editing_user['is_active'] ?? 1)) checked @endif />
                @yourlsT('Active')
            </label>

            <label class="block">
                {{ $editing_user ? yourls__('New password (leave blank to keep)') : yourls__('Password') }}
                <input class="text" type="password" name="password" autocomplete="new-password" {{ $editing_user ? '' : 'required' }} />
            </label>

            <label class="block">
                @yourlsT('Confirm password')
                <input class="text" type="password" name="password_confirm" autocomplete="new-password" {{ $editing_user ? '' : 'required' }} />
            </label>

            <div class="flex gap-2">
                <button type="submit" class="yourls-btn-primary">{{ $editing_user ? yourls__('Save') : yourls__('Create') }}</button>
                <a href="users.php" class="yourls-btn-secondary">@yourlsT('Cancel')</a>
            </div>
        </form>

        @if($editing_user)
            <hr class="my-4" />
            <form method="post" action="users.php" onsubmit="return confirm('@yourlsT('Rotate this user\'s API key?')')">
                <input type="hidden" name="action" value="rotate_key" />
                <input type="hidden" name="id" value="{{ (int) $editing_user['user_id'] }}" />
                <input type="hidden" name="nonce" value="{{ $nonce }}" />
                <button type="submit">@yourlsT('Rotate API key')</button>
                <span class="text-xs">@yourlsT('Current version'): v{{ (int) $editing_user['api_key_version'] }}</span>
            </form>
        @endif
    </x-organisms::card>
@endsection

@extends('admin', ['title' => function_exists('yourls__') ? yourls__('Users') : 'Users'])

@section('content')
    <div class="space-y-4">
        @if(!empty($flash))
            <x-organisms::banner :tone="$flash['tone']">{{ $flash['message'] }}</x-organisms::banner>
        @endif

        <x-organisms::card :title="function_exists('yourls__') ? yourls__('Users') : 'Users'">
            <div class="flex justify-end mb-3">
                <a class="yourls-btn-primary" href="users.php?action=new">@yourlsT('New user')</a>
            </div>

            <table class="yourls-table w-full">
                <thead>
                    <tr>
                        <th>@yourlsT('Username')</th>
                        <th>@yourlsT('Role')</th>
                        <th>@yourlsT('Active')</th>
                        <th>@yourlsT('Last login')</th>
                        <th>@yourlsT('Created')</th>
                        <th>@yourlsT('Actions')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $u)
                    <tr>
                        <td>
                            {{ $u['username'] }}
                            @if((int) $u['user_id'] === (int) $current_user_id)
                                <span class="text-xs">(@yourlsT('you'))</span>
                            @endif
                        </td>
                        <td>{{ $u['role'] }}</td>
                        <td>{{ ((int) $u['is_active']) ? '✓' : '—' }}</td>
                        <td>{{ $u['last_login_at'] ?? '—' }}</td>
                        <td>{{ $u['created_at'] }}</td>
                        <td>
                            <a href="users.php?action=edit&id={{ (int) $u['user_id'] }}">@yourlsT('Edit')</a>
                            <form method="post" action="users.php" style="display:inline" onsubmit="return confirm('@yourlsT('Delete this user?')')">
                                <input type="hidden" name="action" value="delete" />
                                <input type="hidden" name="id" value="{{ (int) $u['user_id'] }}" />
                                <input type="hidden" name="nonce" value="{{ $nonce }}" />
                                <button type="submit">@yourlsT('Delete')</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-organisms::card>
    </div>
@endsection

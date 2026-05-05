@extends('admin', ['title' => function_exists('yourls__') ? yourls__('Users') : 'Users'])

@section('content')
    <div class="space-y-4">
        @if(!empty($flash))
            <x-organisms::banner :tone="$flash['tone']">{{ $flash['message'] }}</x-organisms::banner>
        @endif

        <x-organisms::card :title="function_exists('yourls__') ? yourls__('Users') : 'Users'">
            <div class="flex justify-end mb-3">
                <a href="users.php?action=new">
                    <x-atoms::button variant="primary" type="button" onclick="window.location='users.php?action=new'; return false;">
                        @yourlsT('New user')
                    </x-atoms::button>
                </a>
            </div>

            <x-organisms::table id="users_table">
                <x-organisms::table.head :cells="[
                    'username'   => yourls__('Username'),
                    'role'       => yourls__('Role'),
                    'active'     => yourls__('Active'),
                    'last_login' => yourls__('Last login'),
                    'created'    => yourls__('Created'),
                    'actions'    => yourls__('Actions'),
                ]" />
                <x-organisms::table.tbody>
                    @forelse($users as $u)
                        <tr id="user-row-{{ (int) $u['user_id'] }}">
                            <td class="px-3 py-2 align-middle border-b border-neutral-100 dark:border-neutral-800">
                                <span class="font-medium">{{ $u['username'] }}</span>
                                @if((int) $u['user_id'] === (int) $current_user_id)
                                    <x-atoms::badge tone="info">@yourlsT('you')</x-atoms::badge>
                                @endif
                            </td>
                            <td class="px-3 py-2 align-middle border-b border-neutral-100 dark:border-neutral-800">
                                <x-atoms::badge :tone="$u['role'] === 'admin' ? 'warning' : 'neutral'">{{ $u['role'] }}</x-atoms::badge>
                            </td>
                            <td class="px-3 py-2 align-middle border-b border-neutral-100 dark:border-neutral-800">
                                @if((int) $u['is_active'])
                                    <x-atoms::icon name="check" class="h-4 w-4 text-success-600" />
                                @else
                                    <span class="text-neutral-400">—</span>
                                @endif
                            </td>
                            <td class="px-3 py-2 align-middle border-b border-neutral-100 dark:border-neutral-800 text-sm text-neutral-600 dark:text-neutral-400">
                                {{ $u['last_login_at'] ?? '—' }}
                            </td>
                            <td class="px-3 py-2 align-middle border-b border-neutral-100 dark:border-neutral-800 text-sm text-neutral-600 dark:text-neutral-400">
                                {{ $u['created_at'] }}
                            </td>
                            <td class="px-3 py-2 align-middle border-b border-neutral-100 dark:border-neutral-800">
                                <div class="flex items-center gap-2">
                                    <a href="users.php?action=edit&id={{ (int) $u['user_id'] }}">
                                        <x-atoms::button variant="secondary" size="sm" type="button" onclick="window.location='users.php?action=edit&id={{ (int) $u['user_id'] }}'; return false;">
                                            @yourlsT('Edit')
                                        </x-atoms::button>
                                    </a>
                                    <form method="post" action="users.php" class="inline" onsubmit="return confirm('@yourlsT('Delete this user?')')">
                                        <input type="hidden" name="action" value="delete" />
                                        <input type="hidden" name="id" value="{{ (int) $u['user_id'] }}" />
                                        <input type="hidden" name="nonce" value="{{ $nonce }}" />
                                        <x-atoms::button variant="danger" size="sm" type="submit">
                                            @yourlsT('Delete')
                                        </x-atoms::button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <x-organisms::table.empty :colspan="6" :message="yourls__('No users yet.')" />
                    @endforelse
                </x-organisms::table.tbody>
            </x-organisms::table>
        </x-organisms::card>
    </div>
@endsection

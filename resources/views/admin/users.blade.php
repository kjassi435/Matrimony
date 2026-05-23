@extends('layouts.dashboard')

@section('title', 'Manage Users - नयी पहल')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Manage Users</h1>
        <p class="text-gray-500 text-sm mt-1">View and manage all registered users.</p>
    </div>

    <div x-data="userTable()" x-init="init()">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="text-left px-4 py-3 font-semibold text-gray-600 text-xs uppercase tracking-wider">Name</th>
                            <th class="text-left px-4 py-3 font-semibold text-gray-600 text-xs uppercase tracking-wider">Email</th>
                            <th class="text-left px-4 py-3 font-semibold text-gray-600 text-xs uppercase tracking-wider">Role</th>
                            <th class="text-left px-4 py-3 font-semibold text-gray-600 text-xs uppercase tracking-wider">Joined</th>
                            <th class="text-right px-4 py-3 font-semibold text-gray-600 text-xs uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(u, i) in users" :key="u.id">
                            <tr class="border-b border-gray-50 hover:bg-gray-50/50">
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 text-xs font-bold" x-text="u.name?.charAt(0)?.toUpperCase() || '?'"></div>
                                        <span class="font-medium text-gray-900" x-text="u.name"></span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-gray-500" x-text="u.email"></td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium"
                                          :class="u.role === 'admin' ? 'bg-primary-50 text-primary-700' : 'bg-gray-100 text-gray-600'"
                                          x-text="u.role || 'user'"></span>
                                </td>
                                <td class="px-4 py-3 text-gray-400 text-xs" x-text="u.createdAt ? new Date(u.createdAt).toLocaleDateString() : '-'"></td>
                                <td class="px-4 py-3 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <form method="POST" action="/admin/update-role">
                                            <input type="hidden" name="user_id" :value="u.id">
                                            <input type="hidden" name="role" :value="u.role === 'admin' ? 'user' : 'admin'">
                                            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg border border-gray-200 text-gray-600 hover:border-primary-300 hover:text-primary-600 transition-colors"
                                                    x-text="u.role === 'admin' ? 'Demote' : 'Make Admin'"></button>
                                        </form>
                                        <form method="POST" action="/admin/delete-user" onsubmit="return confirm('Delete this user?')">
                                            <input type="hidden" name="user_id" :value="u.id">
                                            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg border border-red-200 text-red-500 hover:bg-red-50 transition-colors">Remove</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-6 text-center text-sm text-gray-400" x-show="users.length === 0">
                No users registered yet.
            </div>
        </div>
    </div>
</div>

<script>
const usersTableData = {{ usersJson }};
function userTable() {
    return { users: usersTableData || [] };
}
</script>
@endsection

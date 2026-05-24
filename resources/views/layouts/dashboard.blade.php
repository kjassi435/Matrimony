<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard - नयी पहल')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="font-sans text-gray-800 bg-gray-50 antialiased">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen flex">
        <div class="fixed inset-0 bg-black/40 z-40 md:hidden" x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak></div>

        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed md:translate-x-0 top-0 left-0 z-50 md:z-auto w-64 h-full bg-white border-r border-gray-200 transition-transform duration-300 flex flex-col">
            <div class="p-5 border-b border-gray-100">
                <a href="/" class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-primary-600 flex items-center justify-center text-white text-xs font-bold">न</div>
                    <div>
                        <div class="text-base font-bold text-gray-900 leading-tight">नयी पहल</div>
                        <div class="text-[8px] uppercase tracking-widest text-primary-600 font-medium">Matrimony</div>
                    </div>
                </a>
            </div>

            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <div class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold px-3 mb-2">Dashboard</div>
                <a href="/dashboard" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors" :class="'{{ activeMenu }}' === 'dashboard' ? 'bg-primary-50 text-primary-700' : 'text-gray-600 hover:bg-gray-100'">
                    <i class="fas fa-th-large w-4 text-center text-xs"></i>Overview
                </a>
                <a href="/dashboard/profile" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors" :class="'{{ activeMenu }}' === 'profile' ? 'bg-primary-50 text-primary-700' : 'text-gray-600 hover:bg-gray-100'">
                    <i class="fas fa-user w-4 text-center text-xs"></i>My Profile
                </a>
                <a href="/dashboard/matches" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors" :class="'{{ activeMenu }}' === 'matches' ? 'bg-primary-50 text-primary-700' : 'text-gray-600 hover:bg-gray-100'">
                    <i class="fas fa-heart w-4 text-center text-xs"></i>Match Suggestions
                </a>
                <a href="/dashboard/saved" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors" :class="'{{ activeMenu }}' === 'saved' ? 'bg-primary-50 text-primary-700' : 'text-gray-600 hover:bg-gray-100'">
                    <i class="fas fa-bookmark w-4 text-center text-xs"></i>Saved Profiles
                </a>

                @auth
                <template x-if="'{{ authUser.role }}' === 'admin'">
                    <div>
                        <div class="pt-4 mt-4 border-t border-gray-100">
                            <div class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold px-3 mb-2">Admin</div>
                            <a href="/admin" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors" :class="'{{ activeMenu }}' === 'admin' ? 'bg-primary-50 text-primary-700' : 'text-gray-600 hover:bg-gray-100'">
                                <i class="fas fa-chart-bar w-4 text-center text-xs"></i>Overview
                            </a>
                            <a href="/admin/users" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors" :class="'{{ activeMenu }}' === 'admin-users' ? 'bg-primary-50 text-primary-700' : 'text-gray-600 hover:bg-gray-100'">
                                <i class="fas fa-users w-4 text-center text-xs"></i>Users
                            </a>
                            <a href="/admin/reviews" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors" :class="'{{ activeMenu }}' === 'admin-reviews' ? 'bg-primary-50 text-primary-700' : 'text-gray-600 hover:bg-gray-100'">
                                <i class="fas fa-star w-4 text-center text-xs"></i>Reviews
                            </a>
                        </div>
                    </div>
                </template>
                @endauth
            </nav>

            <div class="p-4 border-t border-gray-100">
                <div class="flex items-center gap-3 px-3 py-2">
                    <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 text-xs font-bold">{{ authUser.initials }}</div>
                    <div class="min-w-0 flex-1">
                        <div class="text-sm font-medium text-gray-900 truncate">{{ authUser.name }}</div>
                        <div class="text-[10px] text-gray-400 truncate">{{ authUser.email }}</div>
                    </div>
                </div>
                <a href="/logout" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-500 hover:text-red-600 hover:bg-red-50 transition-colors mt-1">
                    <i class="fas fa-sign-out-alt w-4 text-center text-xs"></i>Logout
                </a>
            </div>
        </aside>

        <div class="flex-1 md:ml-64 min-h-screen">
            <header class="sticky top-0 z-30 bg-white border-b border-gray-200 px-4 md:px-6 h-16 flex items-center justify-between">
                <button @click="sidebarOpen = !sidebarOpen" class="md:hidden p-2 -ml-2 text-gray-500 hover:text-gray-700">
                    <i class="fas fa-bars text-lg"></i>
                </button>
                <div class="flex-1"></div>
                <div class="flex items-center gap-3">
                    @auth
                    <template x-if="'{{ authUser.role }}' === 'admin'">
                        <span class="bg-primary-50 text-primary-600 text-[10px] font-semibold px-2 py-0.5 rounded-full border border-primary-100">Admin</span>
                    </template>
                    @endauth
                    <a href="/" class="text-xs text-gray-400 hover:text-primary-600 transition-colors">
                        <i class="fas fa-external-link-alt mr-1"></i>View Site
                    </a>
                </div>
            </header>

            <main class="p-4 md:p-6 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>

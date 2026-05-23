<header x-data="{ mobileOpen: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 40)"
    :class="scrolled ? 'bg-white shadow-md' : 'bg-white/95'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b border-gray-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-16">
            <a href="/" class="flex items-center space-x-2">
                <div class="w-9 h-9 rounded-full bg-primary-600 flex items-center justify-center text-white text-sm font-bold">
                    न
                </div>
                <div>
                    <span class="text-lg font-bold text-gray-900">नयी पहल</span>
                    <span class="block text-[9px] uppercase tracking-widest text-primary-600 font-medium">Matrimony</span>
                </div>
            </a>

            <nav class="hidden md:flex items-center space-x-6">
                <a href="#home" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors">Home</a>
                <a href="#about" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors">About</a>
                <a href="#profiles" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors">Stories</a>
                <a href="#testimonials" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors">Testimonials</a>
                <a href="#faq" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors">FAQ</a>
            </nav>

            <div class="hidden md:flex items-center space-x-3">
                @guest
                <a href="/login" class="px-5 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-lg hover:border-primary-300 hover:text-primary-600 transition-colors">Login</a>
                <a href="/register" class="px-5 py-2 text-sm font-medium text-white bg-primary-600 rounded-lg hover:bg-primary-700 transition-colors shadow-sm">Register</a>
                @endguest
                @auth
                <span class="text-sm font-medium text-gray-600">
                    <i class="fas fa-user-circle mr-1"></i>{{ authUser.name }}
                </span>
                <a href="/logout" class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-lg hover:border-red-300 hover:text-red-600 transition-colors">Logout</a>
                @endauth
            </div>

            <button @click="mobileOpen = !mobileOpen" class="md:hidden p-2 text-gray-600 hover:text-primary-600">
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div x-show="mobileOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="md:hidden pb-4">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-4 space-y-2">
                <a href="#home" @click="mobileOpen = false" class="block px-4 py-2.5 rounded-lg text-gray-700 hover:bg-red-50 hover:text-primary-600 font-medium text-sm">Home</a>
                <a href="#about" @click="mobileOpen = false" class="block px-4 py-2.5 rounded-lg text-gray-700 hover:bg-red-50 hover:text-primary-600 font-medium text-sm">About</a>
                <a href="#profiles" @click="mobileOpen = false" class="block px-4 py-2.5 rounded-lg text-gray-700 hover:bg-red-50 hover:text-primary-600 font-medium text-sm">Stories</a>
                <a href="#testimonials" @click="mobileOpen = false" class="block px-4 py-2.5 rounded-lg text-gray-700 hover:bg-red-50 hover:text-primary-600 font-medium text-sm">Testimonials</a>
                <a href="#faq" @click="mobileOpen = false" class="block px-4 py-2.5 rounded-lg text-gray-700 hover:bg-red-50 hover:text-primary-600 font-medium text-sm">FAQ</a>
                <hr class="border-gray-100">
                @guest
                <a href="/login" class="block text-center px-4 py-2.5 rounded-lg border border-gray-300 text-gray-700 font-medium text-sm hover:border-primary-300">Login</a>
                <a href="/register" class="block text-center px-4 py-2.5 rounded-lg bg-primary-600 text-white font-medium text-sm hover:bg-primary-700">Register</a>
                @endguest
                @auth
                <div class="px-4 py-2 text-sm text-gray-600"><i class="fas fa-user-circle mr-1"></i>{{ authUser.name }}</div>
                <a href="/logout" class="block text-center px-4 py-2.5 rounded-lg border border-gray-300 text-red-600 font-medium text-sm hover:border-red-300">Logout</a>
                @endauth
            </div>
        </div>
    </div>
</header>

<section class="py-3 bg-gradient-to-r from-primary-600 via-primary-700 to-primary-800 border-b border-white/10 overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex items-center gap-4 text-sm text-white/90 overflow-hidden whitespace-nowrap">
            <span class="inline-flex items-center gap-1.5 flex-shrink-0 bg-white/15 px-3 py-1 rounded-full text-xs font-medium">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                LIVE
            </span>
            <div x-data="{ active: 0, items: [
                '🌸 5 new members joined today from Mumbai, Delhi & Bengaluru',
                '💞 3 new matches made in the last 24 hours',
                '🎉 12 success stories shared this week',
                '👋 8 members are online right now',
                '⭐ Priya & Arjun got engaged! Another success story ❤️'
            ] }" x-init="setInterval(() => { active = (active + 1) % items.length }, 3500)"
                 class="overflow-hidden relative h-5 flex-1">
                <template x-for="(msg, i) in items" :key="i">
                    <span x-show="active === i"
                          x-transition:enter="transition ease-out duration-500"
                          x-transition:enter-start="translate-y-full opacity-0"
                          x-transition:enter-end="translate-y-0 opacity-100"
                          x-transition:leave="transition ease-in duration-300"
                          x-transition:leave-start="translate-y-0 opacity-100"
                          x-transition:leave-end="-translate-y-full opacity-0"
                          class="absolute left-0 top-0" x-text="msg"></span>
                </template>
            </div>
        </div>
    </div>
</section>

<section class="relative py-14 md:py-18 bg-gradient-to-r from-primary-600 via-primary-700 to-primary-800 overflow-hidden">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-gold-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
            <div x-data="{ count: 0, target: 25000, visible: false }"
                 x-intersect:enter="visible = true; if(visible) { let i = 0; const t = setInterval(() => { i += 47; if (i >= target) { i = target; clearInterval(t); } count = i; }, 20); }"
                 class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-gold-300"><span x-text="count.toLocaleString()">0</span>+</div>
                <div class="text-sm text-white/70 mt-1">Happy Matches</div>
            </div>
            <div x-data="{ count: 0, target: 45000, visible: false }"
                 x-intersect:enter="visible = true; if(visible) { let i = 0; const t = setInterval(() => { i += 83; if (i >= target) { i = target; clearInterval(t); } count = i; }, 20); }"
                 class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-gold-300"><span x-text="count.toLocaleString()">0</span>+</div>
                <div class="text-sm text-white/70 mt-1">Active Members</div>
            </div>
            <div x-data="{ count: 0, target: 500, visible: false }"
                 x-intersect:enter="visible = true; if(visible) { let i = 0; const t = setInterval(() => { i += 1; if (i >= target) { i = target; clearInterval(t); } count = i; }, 20); }"
                 class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-gold-300"><span x-text="count.toLocaleString()">0</span>+</div>
                <div class="text-sm text-white/70 mt-1">Cities Covered</div>
            </div>
            <div x-data="{ count: 0, target: 98, visible: false }"
                 x-intersect:enter="visible = true; if(visible) { let i = 0; const t = setInterval(() => { i += 1; if (i >= target) { i = target; clearInterval(t); } count = i; }, 30); }"
                 class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-gold-300"><span x-text="count">0</span>%</div>
                <div class="text-sm text-white/70 mt-1">Success Rate</div>
            </div>
        </div>
    </div>
</section>

<section id="profiles" class="relative py-16 md:py-24 bg-gradient-to-b from-gray-50 via-white to-gray-50 overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-primary-50/40 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-10">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-50 text-primary-600 text-xs font-semibold tracking-wide border border-primary-100">
                <i class="fas fa-star text-primary-400 text-[10px]"></i>
                Success Stories
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-5 mb-3">
                Real Couples, <span class="text-primary-600">Real Happiness</span>
            </h2>
            <p class="text-gray-500 max-w-xl mx-auto">
                These couples found their second chance at love through our platform.
            </p>
        </div>
    </div>

    <div x-data="coverflow()" x-init="init()" class="relative select-none">
        <div class="relative h-[400px] sm:h-[440px] md:h-[500px] max-w-5xl mx-auto">
            <template x-for="(p, i) in items" :key="i">
                <div x-show="Math.abs(i - current) <= 2"
                     :style="getStyle(i)"
                     @click="current = i"
                     class="absolute left-1/2 w-[280px] sm:w-[320px] md:w-[360px] cursor-pointer"
                     style="transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1)">
                    <div :class="i === current ? 'ring-2 ring-primary-500/50 shadow-2xl scale-100' : 'shadow-lg'" class="bg-white rounded-2xl overflow-hidden transform-gpu transition-shadow duration-500">
                        <div class="relative h-44 sm:h-48 md:h-52 bg-gray-100 overflow-hidden">
                            <img :src="p.image" :alt="p.name"
                                 class="w-full h-full object-cover transition-transform duration-700"
                                 :class="i === current ? 'scale-100' : 'scale-105'">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                            <div class="absolute bottom-3 left-4">
                                <div class="font-semibold text-sm text-white drop-shadow-lg" x-text="p.name"></div>
                            </div>
                        </div>
                        <div class="p-4 md:p-5">
                            <p class="text-sm text-gray-600 leading-relaxed line-clamp-3" x-text="p.story"></p>
                            <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-100">
                                <span class="text-xs text-gray-400" x-text="'Matched ' + p.matched"></span>
                                <span class="text-xs text-primary-600 font-medium">&rarr;</span>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <button @click="prev()" class="absolute left-2 md:left-8 top-1/2 -translate-y-1/2 w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/90 shadow-lg flex items-center justify-center text-gray-500 hover:text-primary-600 hover:bg-white transition-all z-20 backdrop-blur-sm">
            <i class="fas fa-chevron-left text-sm"></i>
        </button>
        <button @click="next()" class="absolute right-2 md:right-8 top-1/2 -translate-y-1/2 w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/90 shadow-lg flex items-center justify-center text-gray-500 hover:text-primary-600 hover:bg-white transition-all z-20 backdrop-blur-sm">
            <i class="fas fa-chevron-right text-sm"></i>
        </button>

        <div class="flex justify-center gap-2 mt-6">
            <template x-for="(_, i) in items" :key="i">
                <button @click="current = i"
                        :class="current === i ? 'w-8 bg-primary-600' : 'w-2.5 bg-gray-300 hover:bg-gray-400'"
                        class="h-2.5 rounded-full transition-all duration-500"></button>
            </template>
        </div>
    </div>
</section>

<script>
function coverflow() {
    return {
        current: 0,
        autoplay: null,
        items: [
            { name: 'Priya & Arjun', location: 'Mumbai', image: 'https://media.istockphoto.com/id/2181769398/photo/happy-couple-hugging-and-holding-the-keys-of-their-new-house.jpg?s=612x612&w=0&k=20&c=PFYcVZbmMcYGu_mU9ndxvPmToQuscSEYCu14upcSyCo=', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=80&q=80', story: '"We both had given up on love, but नयी पहल brought us together. Our families were overjoyed."', matched: '2 months ago' },
            { name: 'Anita & Deepak', location: 'Pune', image: 'https://media.istockphoto.com/id/1463697126/photo/happy-indian-couple-sitting-with-his-little-girl-on-tree-branch-at-garden.jpg?s=612x612&w=0&k=20&c=biGaOPkg9U-RUD4nbQNZcU4PjxerMueLmhVp3Ufsw2Q=', avatar: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&q=80', story: '"नयी पहल understood what we needed. Not just a match, but a companion who values life experiences."', matched: '1 month ago' },
            { name: 'Kavita & Suresh', location: 'Chennai', image: 'https://assets.smfgindiacredit.com/sites/default/files/Best-Places-in-India.jpg?VersionId=D2LFAbA4VQ89xETzetTam.eyJIQ.fRV', avatar: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=80&q=80', story: '"Our families were skeptical about second marriage until they saw our story. Thank you!"', matched: '4 months ago' },
            { name: 'Meera & Anand', location: 'Hyderabad', image: 'https://cdn0.weddingwire.in/article/9410/3_2/960/jpg/10149-indian-wedding-couple-images-mahima-bhatia-photography-lead-image.jpeg', avatar: 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=80&q=80', story: '"Finding someone who accepts your past and wants to build a future together is priceless."', matched: '2 months ago' },
            { name: 'Sunita & Ravi', location: 'Delhi', image: 'https://media.gettyimages.com/id/1489809023/video/happy-couple-spending-leisure-time-together-at-home.jpg?s=640x640&k=20&c=5G-fhgezmZ4U514dtqqUJJkzQB7ynH9DJ1XWQbLsu0k=', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&q=80', story: '"After years of being alone, I finally found my companion. The matching was perfect and thoughtful."', matched: '3 months ago' }
        ],
        getStyle(i) {
            const offset = i - this.current;
            const abs = Math.abs(offset);
            const cardW = window.innerWidth < 640 ? 280 : window.innerWidth < 768 ? 320 : 360;
            const gap = 30;
            const x = offset * (cardW + gap) * 0.55;
            const scale = 1 - abs * 0.13;
            const opacity = 1 - abs * 0.35;
            const y = abs * 12;
            return {
                transform: `translate(calc(-50% + ${x}px), -50%) scale(${scale})`,
                top: `calc(50% + ${y}px)`,
                opacity: Math.max(opacity, 0.1),
                zIndex: 100 - abs,
                filter: i === this.current ? 'none' : 'grayscale(0.25) brightness(0.85)',
                pointerEvents: i === this.current ? 'auto' : 'none',
            };
        },
        init() {
            this.autoplay = setInterval(() => {
                this.current = (this.current + 1) % this.items.length;
            }, 4500);
        },
        next() {
            clearInterval(this.autoplay);
            this.current = (this.current + 1) % this.items.length;
            this.init();
        },
        prev() {
            clearInterval(this.autoplay);
            this.current = (this.current - 1 + this.items.length) % this.items.length;
            this.init();
        }
    };
}
</script>

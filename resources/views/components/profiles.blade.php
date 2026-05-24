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

    <div x-data="coverflow()" x-init="init()" class="relative select-none max-w-5xl mx-auto px-4 sm:px-6">
        <div class="relative h-[420px] sm:h-[480px] md:h-[540px]">
            <template x-for="(p, i) in items" :key="i">
                <div x-show="i === current"
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 scale-90"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-400"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-90"
                     @click="current = i"
                     class="absolute inset-0 flex items-center justify-center cursor-pointer">
                    <div class="w-full max-w-sm mx-auto bg-white rounded-2xl overflow-hidden shadow-xl">
                        <div class="relative h-44 sm:h-48 bg-gray-100 overflow-hidden">
                            <img :src="p.image" :alt="p.name"
                                 class="w-full h-full object-cover"
                                 onerror="this.style.display='none'">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                            <div class="absolute bottom-3 left-4">
                                <div class="font-semibold text-sm text-white drop-shadow-lg" x-text="p.name"></div>
                                <div class="text-xs text-white/80" x-text="p.location"></div>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-2 mb-3">
                                <img :src="p.avatar" class="w-8 h-8 rounded-full object-cover ring-2 ring-primary-100">
                                <div>
                                    <div class="text-sm font-semibold text-gray-900" x-text="p.name"></div>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600 leading-relaxed italic" x-text="p.story"></p>
                            <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100">
                                <span class="text-xs text-gray-400"><i class="far fa-clock mr-1"></i><span x-text="'Matched ' + p.matched"></span></span>
                                <span class="text-primary-600 text-sm">&rarr;</span>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <button @click="prev()" class="absolute left-2 md:left-4 top-1/2 -translate-y-1/2 w-11 h-11 md:w-12 md:h-12 rounded-full bg-white shadow-lg flex items-center justify-center text-gray-400 hover:text-primary-600 hover:shadow-xl transition-all z-10 border border-gray-100">
            <i class="fas fa-chevron-left text-sm"></i>
        </button>
        <button @click="next()" class="absolute right-2 md:right-4 top-1/2 -translate-y-1/2 w-11 h-11 md:w-12 md:h-12 rounded-full bg-white shadow-lg flex items-center justify-center text-gray-400 hover:text-primary-600 hover:shadow-xl transition-all z-10 border border-gray-100">
            <i class="fas fa-chevron-right text-sm"></i>
        </button>

        <div class="flex justify-center gap-2.5 mt-8">
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
            { name: 'Priya & Arjun', location: 'Mumbai', image: 'https://media.istockphoto.com/id/2181769398/photo/happy-couple-hugging-and-holding-the-keys-of-their-new-house.jpg?s=612x612&w=0&k=20&c=PFYcVZbmMcYGu_mU9ndxvPmToQuscSEYCu14upcSyCo=', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=80&q=80', story: '"We both had given up on love, but \u0928\u092f\u0940 \u092a\u0939\u0932 brought us together. Our families were overjoyed."', matched: '2 months ago' },
            { name: 'Anita & Deepak', location: 'Pune', image: 'https://media.istockphoto.com/id/1463697126/photo/happy-indian-couple-sitting-with-his-little-girl-on-tree-branch-at-garden.jpg?s=612x612&w=0&k=20&c=biGaOPkg9U-RUD4nbQNZcU4PjxerMueLmhVp3Ufsw2Q=', avatar: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&q=80', story: '"\u0928\u092f\u0940 \u092a\u0939\u0932 understood what we needed. Not just a match, but a companion who values life experiences."', matched: '1 month ago' },
            { name: 'Kavita & Suresh', location: 'Chennai', image: 'https://assets.smfgindiacredit.com/sites/default/files/Best-Places-in-India.jpg?VersionId=D2LFAbA4VQ89xETzetTam.eyJIQ.fRV', avatar: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=80&q=80', story: '"Our families were skeptical about second marriage until they saw our story. Thank you!"', matched: '4 months ago' },
            { name: 'Meera & Anand', location: 'Hyderabad', image: 'https://cdn0.weddingwire.in/article/9410/3_2/960/jpg/10149-indian-wedding-couple-images-mahima-bhatia-photography-lead-image.jpeg', avatar: 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=80&q=80', story: '"Finding someone who accepts your past and wants to build a future together is priceless."', matched: '2 months ago' },
            { name: 'Sunita & Ravi', location: 'Delhi', image: 'https://media.gettyimages.com/id/1489809023/video/happy-couple-spending-leisure-time-together-at-home.jpg?s=640x640&k=20&c=5G-fhgezmZ4U514dtqqUJJkzQB7ynH9DJ1XWQbLsu0k=', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&q=80', story: '"After years of being alone, I finally found my companion. The matching was perfect and thoughtful."', matched: '3 months ago' }
        ],
        init() {
            this.autoplay = setInterval(() => {
                this.current = (this.current + 1) % this.items.length;
            }, 5000);
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

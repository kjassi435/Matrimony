<section id="profiles" class="relative py-16 md:py-24 bg-gradient-to-b from-gray-50 via-white to-gray-50 overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-primary-50/40 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12">
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

        <div class="relative max-w-lg mx-auto">
            <div id="storyCard" class="bg-white rounded-2xl overflow-hidden shadow-xl transition-all duration-500">
                <div id="storyImageWrap" class="relative h-48 sm:h-56 bg-gray-100 overflow-hidden">
                    <img id="storyImage" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <div class="absolute bottom-3 left-4">
                        <div id="storyName" class="font-semibold text-base text-white drop-shadow-lg"></div>
                        <div id="storyLocation" class="text-xs text-white/80 mt-0.5"></div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <img id="storyAvatar" class="w-10 h-10 rounded-full object-cover ring-2 ring-primary-100">
                        <div>
                            <div id="storyName2" class="text-sm font-semibold text-gray-900"></div>
                        </div>
                    </div>
                    <p id="storyText" class="text-sm text-gray-600 leading-relaxed italic"></p>
                    <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100">
                        <span id="storyMatched" class="text-xs text-gray-400"><i class="far fa-clock mr-1"></i></span>
                        <span class="text-primary-600 text-sm">&rarr;</span>
                    </div>
                </div>
            </div>

            <button id="prevBtn" class="absolute -left-3 md:-left-4 top-1/2 -translate-y-1/2 w-10 h-10 md:w-12 md:h-12 rounded-full bg-white shadow-lg flex items-center justify-center text-gray-400 hover:text-primary-600 hover:shadow-xl transition-all border border-gray-100 z-10">
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button id="nextBtn" class="absolute -right-3 md:-right-4 top-1/2 -translate-y-1/2 w-10 h-10 md:w-12 md:h-12 rounded-full bg-white shadow-lg flex items-center justify-center text-gray-400 hover:text-primary-600 hover:shadow-xl transition-all border border-gray-100 z-10">
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <div id="dotsContainer" class="flex justify-center gap-2.5 mt-8"></div>
    </div>
</section>

<script>
(function() {
    var items = [
        { name: 'Priya & Arjun', location: 'Mumbai', image: 'https://media.istockphoto.com/id/2181769398/photo/happy-couple-hugging-and-holding-the-keys-of-their-new-house.jpg?s=612x612&w=0&k=20&c=PFYcVZbmMcYGu_mU9ndxvPmToQuscSEYCu14upcSyCo=', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=80&q=80', story: '"We both had given up on love, but \u0928\u092f\u0940 \u092a\u0939\u0932 brought us together. Our families were overjoyed."', matched: '2 months ago' },
        { name: 'Anita & Deepak', location: 'Pune', image: 'https://media.istockphoto.com/id/1463697126/photo/happy-indian-couple-sitting-with-his-little-girl-on-tree-branch-at-garden.jpg?s=612x612&w=0&k=20&c=biGaOPkg9U-RUD4nbQNZcU4PjxerMueLmhVp3Ufsw2Q=', avatar: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&q=80', story: '"\u0928\u092f\u0940 \u092a\u0939\u0932 understood what we needed. Not just a match, but a companion who values life experiences."', matched: '1 month ago' },
        { name: 'Kavita & Suresh', location: 'Chennai', image: 'https://assets.smfgindiacredit.com/sites/default/files/Best-Places-in-India.jpg?VersionId=D2LFAbA4VQ89xETzetTam.eyJIQ.fRV', avatar: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=80&q=80', story: '"Our families were skeptical about second marriage until they saw our story. Thank you!"', matched: '4 months ago' },
        { name: 'Meera & Anand', location: 'Hyderabad', image: 'https://cdn0.weddingwire.in/article/9410/3_2/960/jpg/10149-indian-wedding-couple-images-mahima-bhatia-photography-lead-image.jpeg', avatar: 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=80&q=80', story: '"Finding someone who accepts your past and wants to build a future together is priceless."', matched: '2 months ago' },
        { name: 'Sunita & Ravi', location: 'Delhi', image: 'https://media.gettyimages.com/id/1489809023/video/happy-couple-spending-leisure-time-together-at-home.jpg?s=640x640&k=20&c=5G-fhgezmZ4U514dtqqUJJkzQB7ynH9DJ1XWQbLsu0k=', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&q=80', story: '"After years of being alone, I finally found my companion. The matching was perfect and thoughtful."', matched: '3 months ago' }
    ];

    var current = 0;
    var autoplay = null;
    var card = document.getElementById('storyCard');
    var img = document.getElementById('storyImage');
    var name = document.getElementById('storyName');
    var loc = document.getElementById('storyLocation');
    var avatar = document.getElementById('storyAvatar');
    var name2 = document.getElementById('storyName2');
    var text = document.getElementById('storyText');
    var matched = document.getElementById('storyMatched');
    var dotsContainer = document.getElementById('dotsContainer');
    var prevBtn = document.getElementById('prevBtn');
    var nextBtn = document.getElementById('nextBtn');

    function showItem(i) {
        var item = items[i];
        img.src = item.image;
        img.alt = item.name;
        name.textContent = item.name;
        loc.textContent = item.location;
        avatar.src = item.avatar;
        avatar.alt = item.name;
        name2.textContent = item.name;
        text.textContent = item.story;
        matched.innerHTML = '<i class="far fa-clock mr-1"></i>Matched ' + item.matched;
        card.style.opacity = '0.7';
        card.style.transform = 'scale(0.97)';
        setTimeout(function() {
            card.style.opacity = '1';
            card.style.transform = 'scale(1)';
        }, 50);
        updateDots(i);
    }

    function updateDots(i) {
        var dots = dotsContainer.querySelectorAll('button');
        dots.forEach(function(d, idx) {
            d.className = 'h-2.5 rounded-full transition-all duration-500 ' + (idx === i ? 'w-8 bg-primary-600' : 'w-2.5 bg-gray-300 hover:bg-gray-400');
        });
    }

    function next() {
        clearInterval(autoplay);
        current = (current + 1) % items.length;
        showItem(current);
        startAutoplay();
    }

    function prev() {
        clearInterval(autoplay);
        current = (current - 1 + items.length) % items.length;
        showItem(current);
        startAutoplay();
    }

    function startAutoplay() {
        autoplay = setInterval(function() {
            current = (current + 1) % items.length;
            showItem(current);
        }, 5000);
    }

    // Build dots
    for (var i = 0; i < items.length; i++) {
        (function(idx) {
            var dot = document.createElement('button');
            dot.className = 'h-2.5 rounded-full transition-all duration-500 ' + (idx === 0 ? 'w-8 bg-primary-600' : 'w-2.5 bg-gray-300 hover:bg-gray-400');
            dot.addEventListener('click', function() {
                clearInterval(autoplay);
                current = idx;
                showItem(current);
                startAutoplay();
            });
            dotsContainer.appendChild(dot);
        })(i);
    }

    prevBtn.addEventListener('click', prev);
    nextBtn.addEventListener('click', next);

    showItem(0);
    startAutoplay();
})();
</script>
</section>
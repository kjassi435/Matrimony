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

        <div id="coverflowWrap" class="relative mx-auto" style="max-width:960px; height:460px; perspective:1200px;">
            <div id="coverflowTrack" class="relative w-full h-full" style="transform-style:preserve-3d;"></div>

            <button id="cfPrev" class="absolute left-1 md:left-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/90 shadow-lg flex items-center justify-center text-gray-400 hover:text-primary-600 hover:bg-white transition-all z-20 border border-gray-200">
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button id="cfNext" class="absolute right-1 md:right-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/90 shadow-lg flex items-center justify-center text-gray-400 hover:text-primary-600 hover:bg-white transition-all z-20 border border-gray-200">
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <div id="cfDots" class="flex justify-center gap-2.5 mt-6"></div>
    </div>
</section>

<style>
#coverflowTrack .cf-card { position:absolute; top:50%; left:50%; width:300px; height:400px; border-radius:16px; overflow:hidden; cursor:pointer; transition:all 0.6s cubic-bezier(0.25,0.46,0.45,0.94); box-shadow:0 10px 40px rgba(0,0,0,0.12); transform-style:preserve-3d; backface-visibility:hidden; }
#coverflowTrack .cf-card-inner { width:100%; height:100%; position:relative; }
#coverflowTrack .cf-card img { width:100%; height:100%; object-fit:cover; display:block; }
#coverflowTrack .cf-card .cf-overlay { position:absolute; inset:0; background:linear-gradient(to top, rgba(0,0,0,0.6) 0%, transparent 50%); }
#coverflowTrack .cf-card .cf-name { position:absolute; bottom:20px; left:20px; right:20px; color:#fff; font-weight:700; font-size:1.1rem; text-shadow:0 2px 8px rgba(0,0,0,0.4); line-height:1.3; }
#coverflowTrack .cf-card .cf-story { position:absolute; bottom:20px; left:20px; right:20px; color:rgba(255,255,255,0.9); font-size:0.82rem; line-height:1.5; text-shadow:0 1px 4px rgba(0,0,0,0.3); display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; }
#coverflowTrack .cf-card .cf-matched { position:absolute; top:16px; right:16px; background:rgba(255,255,255,0.2); backdrop-filter:blur(8px); -webkit-backdrop-filter:blur(8px); border:1px solid rgba(255,255,255,0.25); color:#fff; font-size:0.7rem; padding:4px 12px; border-radius:20px; font-weight:500; }
@media(min-width:640px){ #coverflowTrack .cf-card { width:340px; height:420px; } }
@media(min-width:768px){ #coverflowTrack .cf-card { width:360px; height:440px; } }
</style>

<script>
(function(){
    var items = [
        { name: 'Priya & Arjun', image: 'https://media.istockphoto.com/id/2181769398/photo/happy-couple-hugging-and-holding-the-keys-of-their-new-house.jpg?s=612x612&w=0&k=20&c=PFYcVZbmMcYGu_mU9ndxvPmToQuscSEYCu14upcSyCo=', story: '"We both had given up on love, but \u0928\u092f\u0940 \u092a\u0939\u0932 brought us together. Our families were overjoyed."', matched: '2 months ago' },
        { name: 'Anita & Deepak', image: 'https://media.istockphoto.com/id/1463697126/photo/happy-indian-couple-sitting-with-his-little-girl-on-tree-branch-at-garden.jpg?s=612x612&w=0&k=20&c=biGaOPkg9U-RUD4nbQNZcU4PjxerMueLmhVp3Ufsw2Q=', story: '"\u0928\u092f\u0940 \u092a\u0939\u0932 understood what we needed. Not just a match, but a companion who values life experiences."', matched: '1 month ago' },
        { name: 'Kavita & Suresh', image: 'https://assets.smfgindiacredit.com/sites/default/files/Best-Places-in-India.jpg?VersionId=D2LFAbA4VQ89xETzetTam.eyJIQ.fRV', story: '"Our families were skeptical about second marriage until they saw our story. Thank you!"', matched: '4 months ago' },
        { name: 'Meera & Anand', image: 'https://cdn0.weddingwire.in/article/9410/3_2/960/jpg/10149-indian-wedding-couple-images-mahima-bhatia-photography-lead-image.jpeg', story: '"Finding someone who accepts your past and wants to build a future together is priceless."', matched: '2 months ago' },
        { name: 'Sunita & Ravi', image: 'https://media.gettyimages.com/id/1489809023/video/happy-couple-spending-leisure-time-together-at-home.jpg?s=640x640&k=20&c=5G-fhgezmZ4U514dtqqUJJkzQB7ynH9DJ1XWQbLsu0k=', story: '"After years of being alone, I finally found my companion. The matching was perfect and thoughtful."', matched: '3 months ago' }
    ];

    var current = 0;
    var autoplay = null;
    var track = document.getElementById('coverflowTrack');
    var dotsEl = document.getElementById('cfDots');
    var cards = [];

    function buildCards() {
        track.innerHTML = '';
        dotsEl.innerHTML = '';
        cards = [];
        for (var i = 0; i < items.length; i++) {
            (function(idx){
                var card = document.createElement('div');
                card.className = 'cf-card';
                card.innerHTML = '<div class="cf-card-inner">' +
                    '<div class="cf-overlay"></div>' +
                    '<img src="' + items[idx].image + '" alt="' + items[idx].name + '" onerror="this.parentElement.style.background=\'linear-gradient(135deg,#667eea,#764ba2)\'">' +
                    '<div class="cf-matched">' + items[idx].matched + '</div>' +
                    '<div class="cf-name">' + items[idx].name + '</div>' +
                    '</div>';
                card.addEventListener('click', function(){ goTo(idx); });
                track.appendChild(card);
                cards.push(card);

                var dot = document.createElement('button');
                dot.className = 'h-2.5 rounded-full transition-all duration-500';
                dot.addEventListener('click', function(){ goTo(idx); });
                dotsEl.appendChild(dot);
            })(i);
        }
    }

    function goTo(i) {
        if (i === current) return;
        clearInterval(autoplay);
        current = i;
        layout();
        startAutoplay();
    }

    function layout() {
        var ww = window.innerWidth;
        var cardW = ww < 640 ? 300 : ww < 768 ? 340 : 360;
        var spread = ww < 640 ? 110 : ww < 768 ? 130 : 150;
        var farSpread = ww < 640 ? 60 : 80;
        var n = items.length;

        for (var i = 0; i < n; i++) {
            var card = cards[i];
            var offset = i - current;
            var abs = Math.abs(offset);
            var sign = offset > 0 ? 1 : (offset < 0 ? -1 : 0);

            var tx, ty, scale, opacity, zIdx, rotateY;
            if (offset === 0) {
                tx = 0; ty = 0; scale = 1; opacity = 1; zIdx = 100; rotateY = 0;
            } else if (abs === 1) {
                tx = sign * (cardW * 0.5 + spread);
                ty = 8; scale = 0.82; opacity = 0.75; zIdx = 80 - abs; rotateY = sign * -18;
            } else if (abs === 2) {
                tx = sign * (cardW * 0.5 + spread * 2 + farSpread);
                ty = 20; scale = 0.6; opacity = 0.35; zIdx = 60 - abs; rotateY = sign * -30;
            } else {
                tx = sign * (cardW * 0.5 + spread * 2 + farSpread * 2);
                ty = 30; scale = 0.4; opacity = 0; zIdx = 40 - abs; rotateY = sign * -40;
            }

            card.style.transform = 'translateX(' + tx + 'px) translateY(-50%) translateY(' + ty + 'px) scale(' + scale + ') rotateY(' + rotateY + 'deg)';
            card.style.opacity = opacity;
            card.style.zIndex = zIdx;
        }

        var dots = dotsEl.querySelectorAll('button');
        for (var j = 0; j < dots.length; j++) {
            dots[j].className = 'h-2.5 rounded-full transition-all duration-500 ' + (j === current ? 'w-8 bg-primary-600' : 'w-2.5 bg-gray-300 hover:bg-gray-400');
        }
    }

    function next() { goTo((current + 1) % items.length); }
    function prev() { goTo((current - 1 + items.length) % items.length); }
    function startAutoplay() { autoplay = setInterval(next, 4500); }

    document.getElementById('cfPrev').addEventListener('click', prev);
    document.getElementById('cfNext').addEventListener('click', next);

    buildCards();
    setTimeout(layout, 50);
    startAutoplay();

    var resizeTimer;
    window.addEventListener('resize', function(){
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(layout, 100);
    });
})();
</script>
</section>

<section id="home" class="relative bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 pt-20 md:pt-24 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-72 h-72 bg-gold-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-72 h-72 bg-gold-400 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid md:grid-cols-2 gap-8 lg:gap-12 items-center min-h-[70vh] py-8 md:py-12">

            <div class="order-2 md:order-1">
                <div x-data="{ active: 0, images: [
                    'https://static.vecteezy.com/system/resources/thumbnails/055/684/910/small/heartwarming-moment-between-elderly-indian-couple-at-home-photo.jpg',
                    'https://st.depositphotos.com/1037987/3697/i/450/depositphotos_36973183-stock-photo-indian-couple-watching-tv.jpg',
                    'https://media.istockphoto.com/id/1161203136/photo/happy-indian-family.jpg?s=612x612&w=0&k=20&c=e_N6SlRdyLr5lrwfwhlx5M_3M-uChpOG9bM-bVJBz_4=',
                    'https://static.vecteezy.com/system/resources/thumbnails/024/753/148/small/young-indian-couple-in-traditional-ethnic-clothes-walking-with-the-bicycle-in-the-park-photo.jpg'
                ] }" x-init="setInterval(() => { active = (active + 1) % images.length }, 4000)" class="relative">
                    <div class="relative overflow-hidden rounded-2xl shadow-2xl aspect-[4/3]">
                        <template x-for="(img, index) in images" :key="index">
                            <img :src="img" :class="active === index ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" class="absolute inset-0 w-full h-full object-cover transition-all duration-700 ease-in-out rounded-2xl" alt="Happy couples">
                        </template>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 text-white">
                            <p class="text-sm md:text-base font-medium drop-shadow-lg" x-text="[
                                'Genuine companionship at any age',
                                'A second chance at happiness',
                                'Find someone who understands',
                                'Start your new journey today'
                            ][active]"></p>
                        </div>
                    </div>
                    <div class="flex justify-center gap-2 mt-4">
                        <template x-for="(img, index) in images" :key="'dot-'+index">
                            <button @click="active = index" :class="active === index ? 'bg-gold-400 w-6' : 'bg-white/40 w-2'" class="h-2 rounded-full transition-all duration-300"></button>
                        </template>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-3 gap-3">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center border border-white/10">
                        <div class="text-xl font-bold text-gold-300">10K+</div>
                        <div class="text-xs text-white/60">Happy Matches</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center border border-white/10">
                        <div class="text-xl font-bold text-gold-300">98%</div>
                        <div class="text-xs text-white/60">Success Rate</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center border border-white/10">
                        <div class="text-xl font-bold text-gold-300">15Y+</div>
                        <div class="text-xs text-white/60">Experience</div>
                    </div>
                </div>
            </div>

            <div class="order-1 md:order-2">
                <div class="inline-block px-4 py-1.5 rounded-full bg-white/15 text-white text-xs font-medium tracking-wide mb-4 border border-white/20">
                    India's Trusted Second Marriage Platform
                </div>

                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white leading-tight mb-3">
                    A Fresh Start at Love &amp;
                    <span class="text-gold-300">Companionship</span>
                </h1>

                <p class="text-sm text-white/70 mb-5 leading-relaxed">
                    A respectful, private platform for divorcees, widows, and widowers seeking a new beginning.
                </p>

                <div class="bg-white rounded-xl shadow-2xl p-5 sm:p-6">
                    <h3 class="text-base font-bold text-gray-900 mb-4">Create Your Free Profile</h3>
                    <form method="POST" action="/register" class="space-y-3">
                        <div>
                            <input type="text" name="name" required placeholder="Full Name"
                                   class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors">
                        </div>
                        <div>
                            <input type="email" name="email" required placeholder="Email Address"
                                   class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors">
                        </div>
                        <div>
                            <input type="tel" name="phone" required placeholder="Phone Number"
                                   class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors">
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <select name="gender" required
                                    class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors bg-white">
                                <option value="">Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <input type="password" name="password" required placeholder="Password"
                                   class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors">
                        </div>
                        <button type="submit"
                                class="w-full py-2.5 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition-colors shadow-sm text-sm">
                            <i class="fas fa-heart mr-2"></i>Create Free Account
                        </button>
                    </form>
                    <p class="mt-3 text-center text-xs text-gray-500">
                        Already a member?
                        <a href="/login" class="text-primary-600 hover:text-primary-700 font-medium">Sign in</a>
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 40L60 35C120 30 240 20 360 17C480 14 600 14 720 17C840 20 960 26 1080 30C1200 34 1320 36 1380 38L1440 40V0H1380C1320 0 1200 0 1080 0C960 0 840 0 720 0C600 0 480 0 360 0C240 0 120 0 60 0H0V40Z" fill="white"/>
        </svg>
    </div>
</section>

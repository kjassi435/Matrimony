<section id="faq" class="py-16 md:py-20 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 rounded-full bg-red-50 text-primary-600 text-xs font-medium tracking-wide mb-3 border border-red-100">
                <i class="fas fa-question-circle mr-1"></i>FAQ
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Frequently Asked Questions
            </h2>
        </div>

        <div class="space-y-3" x-data="{ selected: null }">
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <button @click="selected = selected === 1 ? null : 1" class="w-full px-5 py-4 flex items-center justify-between text-left">
                    <span class="text-sm font-medium text-gray-900 pr-4">Is this platform only for divorced individuals?</span>
                    <i class="fas fa-chevron-down text-gray-400 text-xs transition-transform duration-300" :class="selected === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="selected === 1" x-collapse.duration.200>
                    <div class="px-5 pb-4 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-3">
                        नयी पहल welcomes divorcees, widows, widowers, and anyone seeking a second chance at love. Our community is built on mutual respect and understanding.
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <button @click="selected = selected === 2 ? null : 2" class="w-full px-5 py-4 flex items-center justify-between text-left">
                    <span class="text-sm font-medium text-gray-900 pr-4">How do you protect my privacy?</span>
                    <i class="fas fa-chevron-down text-gray-400 text-xs transition-transform duration-300" :class="selected === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="selected === 2" x-collapse.duration.200>
                    <div class="px-5 pb-4 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-3">
                        Your privacy is our priority. Control what is visible on your profile. Photos can be blurred, and you choose who can contact you. We never share your data with third parties.
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <button @click="selected = selected === 3 ? null : 3" class="w-full px-5 py-4 flex items-center justify-between text-left">
                    <span class="text-sm font-medium text-gray-900 pr-4">How does the matchmaking process work?</span>
                    <i class="fas fa-chevron-down text-gray-400 text-xs transition-transform duration-300" :class="selected === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="selected === 3" x-collapse.duration.200>
                    <div class="px-5 pb-4 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-3">
                        Our matching algorithm considers lifestyle, values, and life experiences to suggest compatible matches. When both members express interest, you can connect through our secure platform.
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <button @click="selected = selected === 4 ? null : 4" class="w-full px-5 py-4 flex items-center justify-between text-left">
                    <span class="text-sm font-medium text-gray-900 pr-4">What if I have children from my previous marriage?</span>
                    <i class="fas fa-chevron-down text-gray-400 text-xs transition-transform duration-300" :class="selected === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="selected === 4" x-collapse.duration.200>
                    <div class="px-5 pb-4 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-3">
                        Many of our members have children. Our platform allows you to mention your children respectfully. Many success stories involve couples who built beautiful blended families.
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <button @click="selected = selected === 5 ? null : 5" class="w-full px-5 py-4 flex items-center justify-between text-left">
                    <span class="text-sm font-medium text-gray-900 pr-4">How much does the service cost?</span>
                    <i class="fas fa-chevron-down text-gray-400 text-xs transition-transform duration-300" :class="selected === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="selected === 5" x-collapse.duration.200>
                    <div class="px-5 pb-4 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-3">
                        Registration and browsing are free. Premium plans start at ₹999/month and include unlimited messaging, priority support, and personalized matchmaking.
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <button @click="selected = selected === 6 ? null : 6" class="w-full px-5 py-4 flex items-center justify-between text-left">
                    <span class="text-sm font-medium text-gray-900 pr-4">How do I know profiles are genuine?</span>
                    <i class="fas fa-chevron-down text-gray-400 text-xs transition-transform duration-300" :class="selected === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="selected === 6" x-collapse.duration.200>
                    <div class="px-5 pb-4 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-3">
                        Every profile undergoes manual verification including ID proof and address verification. Profiles with the "Verified" badge have completed our enhanced verification process.
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-8">
            <p class="text-sm text-gray-600 mb-4">Still have questions? We are here to help.</p>
            <a href="#contact" class="inline-flex items-center px-5 py-2.5 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 transition-colors">
                <i class="fas fa-envelope mr-2"></i>Contact Us
            </a>
        </div>
    </div>
</section>

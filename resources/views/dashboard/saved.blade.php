@extends('layouts.dashboard')

@section('title', 'Saved Profiles - नयी पहल')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Saved Profiles</h1>
        <p class="text-gray-500 text-sm mt-1">Profiles you've saved for later review.</p>
    </div>

    <div x-data="savedCards()" x-init="init()">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <template x-for="(p, i) in profiles" :key="p.id">
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-44 bg-gray-100 overflow-hidden relative">
                        <img :src="p.image" :alt="p.name" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        <div class="absolute bottom-3 left-4 text-white">
                            <div class="font-semibold text-sm" x-text="p.name"></div>
                            <div class="text-xs text-white/80" x-text="p.age + ' yrs, ' + p.city"></div>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="text-xs text-gray-400 mb-1" x-text="p.occupation"></div>
                        <p class="text-sm text-gray-600 leading-relaxed line-clamp-2" x-text="p.bio"></p>
                        <div class="flex items-center gap-2 mt-4">
                            <form method="POST" action="/dashboard/save-profile" class="flex-1">
                                <input type="hidden" name="profile_id" :value="p.id">
                                <button type="submit" class="w-full py-2 text-sm font-medium rounded-lg bg-gold-50 text-gold-700 border border-gold-200 hover:bg-gold-100 transition-colors">
                                    <i class="fas fa-bookmark mr-1"></i>Unsave
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <div class="text-center mt-12 py-12" x-show="profiles.length === 0">
            <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-bookmark text-gray-300 text-xl"></i>
            </div>
            <p class="text-gray-500 text-sm">No saved profiles yet.</p>
            <a href="/dashboard/matches" class="inline-block mt-3 px-5 py-2 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 transition-colors">Browse Matches</a>
        </div>
    </div>
</div>

<script>
const savedProfilesData = {{ savedProfilesJson }};
function savedCards() {
    return { profiles: savedProfilesData || [] };
}
</script>
@endsection

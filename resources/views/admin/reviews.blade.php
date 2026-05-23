@extends('layouts.dashboard')

@section('title', 'Review Moderation - नयी पहल')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Review Moderation</h1>
        <p class="text-gray-500 text-sm mt-1">Approve or remove user-submitted reviews.</p>
    </div>

    <div x-data="reviewMod()" x-init="init()">
        <div class="space-y-4">
            <template x-for="(r, i) in reviews" :key="r.id">
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <div class="font-semibold text-gray-900 text-sm" x-text="r.name || 'Anonymous'"></div>
                            <div class="flex text-gold-400 text-xs mt-1">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>
                        <span class="text-xs px-2 py-0.5 rounded-full font-medium"
                              :class="r.approved ? 'bg-green-50 text-green-700' : 'bg-yellow-50 text-yellow-700'"
                              x-text="r.approved ? 'Approved' : 'Pending'"></span>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed" x-text="r.text"></p>
                    <div class="flex items-center justify-end gap-2 mt-4 pt-3 border-t border-gray-100">
                        <template x-if="!r.approved">
                            <form method="POST" action="/admin/review-action">
                                <input type="hidden" name="review_id" :value="r.id">
                                <input type="hidden" name="action" value="approve">
                                <button type="submit" class="px-4 py-1.5 text-xs font-medium rounded-lg bg-green-50 text-green-700 border border-green-200 hover:bg-green-100 transition-colors">
                                    <i class="fas fa-check mr-1"></i>Approve
                                </button>
                            </form>
                        </template>
                        <form method="POST" action="/admin/review-action" onsubmit="return confirm('Delete this review?')">
                            <input type="hidden" name="review_id" :value="r.id">
                            <input type="hidden" name="action" value="delete">
                            <button type="submit" class="px-4 py-1.5 text-xs font-medium rounded-lg bg-red-50 text-red-600 border border-red-200 hover:bg-red-100 transition-colors">
                                <i class="fas fa-trash mr-1"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </template>
        </div>
        <div class="text-center mt-8 py-8 text-sm text-gray-400" x-show="reviews.length === 0">
            No reviews submitted yet.
        </div>
    </div>
</div>

<script>
const reviewsModData = {{ reviewsJson }};
function reviewMod() {
    return { reviews: reviewsModData || [] };
}
</script>
@endsection

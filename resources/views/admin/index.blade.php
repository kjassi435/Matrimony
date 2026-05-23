@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - नयी पहल')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Admin Dashboard</h1>
        <p class="text-gray-500 text-sm mt-1">Overview of your platform.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl p-5 border border-gray-200 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-primary-50 flex items-center justify-center text-primary-600">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">{{ totalUsers }}</div>
                    <div class="text-xs text-gray-500">Total Users</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-200 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-gold-50 flex items-center justify-center text-gold-600">
                    <i class="fas fa-star"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">{{ pendingReviews }}</div>
                    <div class="text-xs text-gray-500">Pending Reviews</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-200 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center text-green-600">
                    <i class="fas fa-heart"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">{{ matchCount }}</div>
                    <div class="text-xs text-gray-500">Sample Profiles</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-200 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">0</div>
                    <div class="text-xs text-gray-500">New Today</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid sm:grid-cols-2 gap-4">
        <a href="/admin/users" class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 hover:shadow-md transition-all group">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-primary-50 flex items-center justify-center text-primary-600 group-hover:scale-110 transition-transform">
                    <i class="fas fa-users text-lg"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900">Manage Users</h3>
                    <p class="text-sm text-gray-500">View, block, or manage user roles</p>
                </div>
            </div>
        </a>
        <a href="/admin/reviews" class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 hover:shadow-md transition-all group">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-gold-50 flex items-center justify-center text-gold-600 group-hover:scale-110 transition-transform">
                    <i class="fas fa-star text-lg"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900">Moderate Reviews</h3>
                    <p class="text-sm text-gray-500">Approve or remove user reviews</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

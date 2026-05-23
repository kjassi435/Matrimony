@extends('layouts.dashboard')

@section('title', 'Dashboard - नयी पहल')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Welcome, {{ authUser.name }}!</h1>
        <p class="text-gray-500 text-sm mt-1">Here's what's happening with your profile.</p>
    </div>

    <div x-data="{}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl p-5 border border-gray-200 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-primary-50 flex items-center justify-center text-primary-600">
                    <i class="fas fa-heart"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">{{ matchCount }}</div>
                    <div class="text-xs text-gray-500">Match Suggestions</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-200 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-gold-50 flex items-center justify-center text-gold-600">
                    <i class="fas fa-bookmark"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">{{ savedCount }}</div>
                    <div class="text-xs text-gray-500">Saved Profiles</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-200 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center text-green-600">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">{{ totalMembers }}</div>
                    <div class="text-xs text-gray-500">Total Members</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-200 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600">
                    <i class="fas fa-user-check"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">-</div>
                    <div class="text-xs text-gray-500">Profile Views</div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
        <div class="grid sm:grid-cols-2 gap-3">
            <a href="/dashboard/profile" class="flex items-center gap-3 p-4 rounded-lg border border-gray-100 hover:border-primary-200 hover:bg-primary-50/50 transition-all group">
                <div class="w-10 h-10 rounded-lg bg-primary-50 flex items-center justify-center text-primary-600 group-hover:scale-110 transition-transform">
                    <i class="fas fa-user-edit"></i>
                </div>
                <div>
                    <div class="text-sm font-medium text-gray-900">Complete Your Profile</div>
                    <div class="text-xs text-gray-500">Add more details to get better matches</div>
                </div>
            </a>
            <a href="/dashboard/matches" class="flex items-center gap-3 p-4 rounded-lg border border-gray-100 hover:border-primary-200 hover:bg-primary-50/50 transition-all group">
                <div class="w-10 h-10 rounded-lg bg-gold-50 flex items-center justify-center text-gold-600 group-hover:scale-110 transition-transform">
                    <i class="fas fa-heart"></i>
                </div>
                <div>
                    <div class="text-sm font-medium text-gray-900">Browse Matches</div>
                    <div class="text-xs text-gray-500">See who's compatible with you</div>
                </div>
            </a>
        </div>
    </div>

    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-xl p-6 text-white shadow-lg">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div>
                <h3 class="font-semibold text-lg">Complete your profile</h3>
                <p class="text-primary-100 text-sm">Add your bio, age and city to get better match suggestions.</p>
            </div>
            <a href="/dashboard/profile" class="flex-shrink-0 px-5 py-2.5 bg-white text-primary-700 font-semibold rounded-lg hover:bg-primary-50 transition-colors text-sm shadow-md">
                <i class="fas fa-arrow-right mr-1"></i>Go to Profile
            </a>
        </div>
    </div>
</div>
@endsection

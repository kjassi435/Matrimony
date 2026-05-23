@extends('layouts.app')

@section('title', 'Register - नयी पहल')

@section('content')
<div class="min-h-screen bg-gray-50 pt-20 pb-12 flex items-center">
    <div class="max-w-lg mx-auto px-4 w-full">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            <div class="text-center mb-6">
                <div class="w-12 h-12 rounded-full bg-primary-600 flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-user-plus text-white"></i>
                </div>
                <h1 class="text-xl font-bold text-gray-900">Create Your Profile</h1>
                <p class="text-sm text-gray-500 mt-1">Start your journey to find a companion</p>
            </div>

            <form method="POST" action="/register" class="space-y-4">
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" name="name" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors"
                               placeholder="Your name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                        <select name="gender" required
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors bg-white">
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" name="email" required
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors"
                           placeholder="your@email.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <input type="tel" name="phone" required
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors"
                           placeholder="Your phone number">
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors"
                               placeholder="Create password">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <input type="password" name="password_confirmation" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors"
                               placeholder="Confirm password">
                    </div>
                </div>

                <div class="bg-amber-50 border border-amber-200 rounded-lg p-3 text-xs text-amber-800 leading-relaxed">
                    <i class="fas fa-shield-alt mr-1"></i>
                    Your information is kept private and secure. We will never share your details without your permission.
                </div>

                <button type="submit"
                        class="w-full py-2.5 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors shadow-sm text-sm">
                    <i class="fas fa-heart mr-2"></i>Create Free Account
                </button>
            </form>

            <div class="mt-6 text-center text-sm">
                <p class="text-gray-500">
                    Already have an account?
                    <a href="/login" class="text-primary-600 hover:text-primary-700 font-medium ml-1">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

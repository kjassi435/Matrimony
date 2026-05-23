@extends('layouts.app')

@section('title', 'Login - नयी पहल')

@section('content')
<div class="min-h-screen bg-gray-50 pt-20 pb-12 flex items-center">
    <div class="max-w-md mx-auto px-4 w-full">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            <div class="text-center mb-6">
                <div class="w-12 h-12 rounded-full bg-primary-600 flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-user text-white"></i>
                </div>
                <h1 class="text-xl font-bold text-gray-900">Welcome Back</h1>
                <p class="text-sm text-gray-500 mt-1">Sign in to your account</p>
            </div>

            <form method="POST" action="/login" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" name="email" required
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors"
                           placeholder="your@email.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors"
                           placeholder="Enter your password">
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                        <span class="text-gray-600">Remember me</span>
                    </label>
                    <a href="#" class="text-primary-600 hover:text-primary-700 font-medium">Forgot password?</a>
                </div>

                <button type="submit"
                        class="w-full py-2.5 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors shadow-sm text-sm">
                    <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                </button>
            </form>

            <div class="mt-6 text-center text-sm">
                <p class="text-gray-500">
                    Don't have an account?
                    <a href="/register" class="text-primary-600 hover:text-primary-700 font-medium ml-1">Create one</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

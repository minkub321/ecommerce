<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    
    <div class="w-full max-w-md bg-gray-800 shadow-lg rounded-2xl p-6">
        <!-- Laravel Logo -->
        <div class="flex justify-center mb-4">
            <svg class="w-10 h-10 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L3 7v10l9 5 9-5V7l-9-5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>

        <div class="text-center mb-6">
            <h2 class="text-xl font-bold text-white">Login</h2>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-500">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 block w-full px-4 py-2 bg-gray-700 text-white border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full px-4 py-2 bg-gray-700 text-white border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="w-4 h-4 text-indigo-500 border-gray-600 rounded focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-300">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-400 hover:underline">Forgot your password?</a>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-700 transition">
                LOG IN
            </button>
        </form>

        <p class="text-center text-sm mt-4 text-gray-400">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-indigo-400 font-bold hover:underline">Sign up</a>
        </p>
    </div>

</body>
</html>

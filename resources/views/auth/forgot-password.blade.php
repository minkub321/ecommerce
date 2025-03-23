<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
            <h2 class="text-xl font-bold text-white">Forgot Password</h2>
        </div>

        <p class="mb-4 text-sm text-gray-400 text-center">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.
        </p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-500 text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required 
                    class="mt-1 block w-full px-4 py-2 bg-gray-700 text-white border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end mb-4">
                <button type="submit"
                    class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-700 transition">
                    Email Password Reset Link
                </button>
            </div>
        </form>

        <p class="text-center text-sm text-gray-400">
            <a href="{{ route('login') }}" class="text-indigo-400 font-bold hover:underline">Back to Login</a>
        </p>
    </div>

</body>
</html>

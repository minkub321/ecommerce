<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            <h2 class="text-xl font-bold text-white">Register</h2>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-500">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="mt-1 block w-full px-4 py-2 bg-gray-700 text-white border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required 
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

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="mt-1 block w-full px-4 py-2 bg-gray-700 text-white border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Already registered? -->
            <div class="flex items-center justify-between mb-4">
                <a href="{{ route('login') }}" class="text-sm text-indigo-400 hover:underline">Already registered?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-700 transition">
                REGISTER
            </button>
        </form>
    </div>

</body>
</html>

<section class="bg-red-100 shadow-md rounded-lg p-6 border border-red-300 mt-8">
    <header>
        <h2 class="text-lg font-semibold text-red-700">Delete Account</h2>
        <p class="mt-1 text-sm text-red-600">Once deleted, your account cannot be recovered.</p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
        @csrf
        @method('delete')

        <div class="flex items-center gap-4">
            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                Delete Account
            </button>
        </div>
    </form>
</section>

<section class="bg-white shadow-md rounded-lg p-6 border border-gray-300">
    <header>
        <h2 class="text-lg font-semibold text-gray-900">Update Password</h2>
        <p class="mt-1 text-sm text-gray-600">Use a strong password to secure your account.</p>
    </header>

    <form method="post" action="<?php echo e(route('password.update')); ?>" class="mt-6 space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>

        <div>
            <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
            <input id="current_password" name="current_password" type="password" class="mt-1 block w-full border rounded-md p-2"
                   autocomplete="current-password" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
            <input id="password" name="password" type="password" class="mt-1 block w-full border rounded-md p-2"
                   autocomplete="new-password" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border rounded-md p-2"
                   autocomplete="new-password" />
        </div>

        <div class="flex items-center gap-4">
            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                Save
            </button>
        </div>
    </form>
</section>
<?php /**PATH C:\Laravel\www\ecommerce\resources\views/profile/partials/update-password-form.blade.php ENDPATH**/ ?>
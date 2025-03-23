<section class="bg-white shadow-md rounded-lg p-6 border border-gray-300">
    <header>
        <h2 class="text-lg font-semibold text-gray-900">Profile Information</h2>
        <p class="mt-1 text-sm text-gray-600">Update your account's profile information and email address.</p>
    </header>

    <form method="post" action="<?php echo e(route('profile.update')); ?>" class="mt-6 space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full border rounded-md p-2"
                   value="<?php echo e(old('name', auth()->user()->name)); ?>" required />
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full border rounded-md p-2"
                   value="<?php echo e(old('email', auth()->user()->email)); ?>" required />
        </div>

        <div class="flex items-center gap-4">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Save
            </button>
        </div>
    </form>
</section>
<?php /**PATH C:\Laravel\www\ecommerce\resources\views/profile/partials/update-profile-information-form.blade.php ENDPATH**/ ?>
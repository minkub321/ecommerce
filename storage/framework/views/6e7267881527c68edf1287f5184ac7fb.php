
<?php $__env->startSection('profilecontent'); ?>
<div class="container mx-auto px-6 py-8">
    <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-8">User Profile</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <?php echo $__env->make('profile.partials.update-profile-information-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('profile.partials.update-password-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <?php echo $__env->make('profile.partials.delete-user-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user_template.layouts.userprofile_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommerce\resources\views/user_template/userprofile.blade.php ENDPATH**/ ?>
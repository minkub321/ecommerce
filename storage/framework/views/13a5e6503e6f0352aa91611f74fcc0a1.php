

<?php $__env->startSection('page_title', 'User List'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>User List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user->id); ?></td>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td>
                    <select class="form-control" onchange="updateAddress(this, <?php echo e($user->id); ?>)">
                        <?php $__currentLoopData = json_decode($user->addresses); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($address->id); ?>"><?php echo e($address->address); ?>, <?php echo e($address->district); ?>, <?php echo e($address->city); ?>, <?php echo e($address->province); ?>, <?php echo e($address->postal_code); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<script>
    function updateAddress(select, userId) {
        let addressId = select.value;
        // Make an AJAX request to update the selected address
        fetch(`/admin/users/${userId}/update-address`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            body: JSON.stringify({ address_id: addressId })
        }).then(response => response.json())
        .then(data => alert(data.message))
        .catch(error => console.error('Error:', error));
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommerce\resources\views/admin/user.blade.php ENDPATH**/ ?>
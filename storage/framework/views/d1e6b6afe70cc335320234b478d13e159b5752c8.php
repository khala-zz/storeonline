
    <?php $__env->startSection('title'); ?>
        <title>Review Order</title>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('css'); ?>
        
        <link href="<?php echo e(asset('home/home.css')); ?>" rel="stylesheet">
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3 class="text-center">YOUR ORDER HAS BEEN PLACED</h3>
        <p class="text-center">Thanks for your Order that use Options on Cash On Delivery</p>
        <p class="text-center">We will contact you by Your Email (<b><?php echo e($user_order->users_email); ?></b>) or Your Phone Number (<b><?php echo e($user_order->mobile); ?></b>)</p>
    </div>
    <div style="margin-bottom: 20px;"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontend/payment/cod.blade.php ENDPATH**/ ?>
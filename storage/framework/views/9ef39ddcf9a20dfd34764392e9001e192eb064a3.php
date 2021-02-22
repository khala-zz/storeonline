<html>
    <head>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php echo $__env->yieldContent('title'); ?>
        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/prettyPhoto.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/price-range.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">
        <?php echo $__env->yieldContent('css'); ?>
    </head>
    <body>
            <?php echo $__env->make('frontend.components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('frontend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.scrollUp.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/price-range.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.prettyPhoto.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <?php echo $__env->yieldContent('js'); ?>
    </body>
</html><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontEnd/layouts/master.blade.php ENDPATH**/ ?>
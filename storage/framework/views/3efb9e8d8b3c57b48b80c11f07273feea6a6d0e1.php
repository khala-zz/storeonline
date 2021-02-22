<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('images/favicon.png')); ?>">
    <?php echo $__env->yieldContent('head'); ?>
    <?php echo $__env->yieldContent('title'); ?>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <?php echo $__env->yieldContent('css'); ?>
    <link href="<?php echo e(asset('admins/css/morris.css')); ?>" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="<?php echo e(asset('admins/css/jquery.toast.css')); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('admins/css/style.min.css')); ?>" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?php echo e(asset('admins/css/pages/dashboard1.css')); ?>" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
      
        <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      
        <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <?php echo $__env->yieldContent('content'); ?>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        
        <?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(asset('admins/js/jquery.min.js')); ?>"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?php echo e(asset('admins/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admins/js/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(asset('admins/js/perfect-scrollbar.jquery.min.js')); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(asset('admins/js/waves.js')); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(asset('admins/js/sidebarmenu.js')); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo e(asset('admins/js/custom.min.js')); ?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="<?php echo e(asset('admins/js/raphael/raphael-min.js')); ?>"></script>
    <script src="<?php echo e(asset('admins/js/morrisjs/morris.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admins/js/jquery.sparkline.min.js')); ?>"></script>
    <!-- Popup message jquery -->
    <script src="<?php echo e(asset('admins/js/jquery.toast.js')); ?>"></script>
    <!-- Chart JS -->
    <script src="<?php echo e(asset('admins/js/dashboard1.js')); ?>"></script>
    <script src="<?php echo e(asset('admins/js/jquery.toast.js')); ?>"></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/admin/admin.blade.php ENDPATH**/ ?>
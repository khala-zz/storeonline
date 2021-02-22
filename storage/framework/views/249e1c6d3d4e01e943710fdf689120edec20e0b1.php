
	<?php $__env->startSection('title'); ?>
		<title>Home Page</title>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('css'); ?>
		
		<link href="<?php echo e(asset('home/home.css')); ?>" rel="stylesheet">
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('js'); ?>
		<script src=" <?php echo e(asset('home/home.js')); ?> "></script>
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('content'); ?>
	<!-- slider -->
		<?php echo $__env->make('frontend.home.components.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!-- /slider -->
	
	<section>
		<div class="container">
			<div class="row">
				
					<?php echo $__env->make('frontend.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				
				
				<div class="col-sm-9 padding-right">
					<div class="row">
						<!--features_items-->
					<?php echo $__env->make('frontend.home.components.feature_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<!--features_items-->
					<!--category-tab-->
					<?php echo $__env->make('frontend.home.components.category_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					
					<!--/category-tab-->
					
					<!--recommended_items-->
					<?php echo $__env->make('frontend.home.components.recommend_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<!--/recommended_items-->
					</div>
					
					
				</div>
			</div>
		</div>
	</section>
	
	

	<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontend/home/home.blade.php ENDPATH**/ ?>
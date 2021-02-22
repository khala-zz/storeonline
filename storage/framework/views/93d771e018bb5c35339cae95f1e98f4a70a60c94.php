

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
	<section>
		<div class="container">
			<div class="row">
				<?php echo $__env->make('frontend.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="<?php echo e(route('product.detail',['slug' => $product -> slug,'id' => $product -> id])); ?>"><img src="<?php echo e($product -> feature_image_path); ?>" alt="" />
											</a>
										<h2><?php echo e(number_format($product -> price)); ?> VND</h2>
										<p><a href="<?php echo e(route('product.detail',['slug' => $product -> slug,'id' => $product -> id])); ?>"><?php echo e($product -> name); ?></a></p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo e(number_format($product -> price)); ?> VND</h2>
											<p><a href="<?php echo e(route('product.detail',['slug' => $product -> slug,'id' => $product -> id])); ?>"><?php echo e($product -> name); ?></a></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
						
						<?php echo e($products -> links()); ?>

					</div><!--features_items-->
				</div>



			</div>


		</div>
	</div>
</section>
	
	

	<?php $__env->stopSection(); ?>

	
	
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontend/product/category/list.blade.php ENDPATH**/ ?>
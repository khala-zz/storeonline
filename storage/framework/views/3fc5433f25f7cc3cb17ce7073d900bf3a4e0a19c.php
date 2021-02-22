<div class="features_items">
	<h2 class="title text-center">Features Items</h2>
	<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="<?php echo e($product -> feature_image_path); ?>" alt="" />
					
					<h2><?php echo e($product -> price); ?> VND</h2>
					<p><a href="<?php echo e(route('product.detail',['slug' => $product -> slug,'id' => $product -> id])); ?>"><?php echo e($product -> name); ?></a></p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						
						<h2><?php echo e($product -> price); ?> VND</h2>
						<p><a href="<?php echo e(route('product.detail',['slug' => $product -> slug,'id' => $product -> id])); ?>"><?php echo e($product -> name); ?></a></p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</div>
				</div>
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
					<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

</div><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontend/home/components/feature_product.blade.php ENDPATH**/ ?>
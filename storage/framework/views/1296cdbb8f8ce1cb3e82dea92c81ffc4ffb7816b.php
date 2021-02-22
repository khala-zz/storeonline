<div class="recommended_items">
	<h2 class="title text-center">recommended items</h2>
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		
		<div class="carousel-inner">
			
			<?php $__currentLoopData = $productRecommend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyRecommend => $productRecommendItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($keyRecommend % 3 == 0): ?>
			
			<div class="item <?php echo e($keyRecommend == 0 ? 'active' : ''); ?>">
				<?php endif; ?>	

				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="<?php echo e($productRecommendItem -> feature_image_path); ?>" alt="" />
								<h2><?php echo e($productRecommendItem -> price); ?></h2>
								<p><a href="<?php echo e(route('product.detail',['slug' => $productRecommendItem -> slug,'id' => $productRecommendItem -> id])); ?>"><?php echo e($productRecommendItem -> name); ?></a></p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
				<?php if($keyRecommend % 3 == 2): ?>
			</div>
			<?php endif; ?>	
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
		</div>

		<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>			
	</div>
</div><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontend/home/components/recommend_product.blade.php ENDPATH**/ ?>
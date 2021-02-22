<div class="category-tab">
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indexCategory => $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li class=" <?php echo e($indexCategory == 0 ?'active':''); ?> ">
				<a href="#category_tab_<?php echo e($categoryItem -> id); ?>" data-toggle="tab">
				<?php echo e($categoryItem -> name); ?>

			</a>
			</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</ul>
	</div>
	<div class="tab-content">
		<?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indexCategoryProduct => $categoryItemProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="tab-pane fade <?php echo e($indexCategoryProduct == 0 ? 'active in' : ''); ?>" id="category_tab_<?php echo e($categoryItemProduct -> id); ?>" >
			<?php $__currentLoopData = $categoryItemProduct -> products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productItemTabs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="<?php echo e($productItemTabs -> feature_image_path); ?>" alt="" />
							<h2><?php echo e($productItemTabs -> price); ?> VND</h2>
							<p><?php echo e($productItemTabs -> name); ?></p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						</div>

					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		
	</div>
</div><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontend/home/components/category_tab.blade.php ENDPATH**/ ?>
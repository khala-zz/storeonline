<?php if($categoryParent -> categoryChildrent -> count()): ?>
<ul role="menu" class="sub-menu">
	<?php $__currentLoopData = $categoryParent -> categoryChildrent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li>
			<a href="shop.html"><?php echo e($categoryChild -> name); ?></a>
			<?php if($categoryChild -> categoryChildrent -> count()): ?>
			<?php echo $__env->make('frontend.components.child_menu',['categoryParent' => $categoryChild], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php endif; ?>	
		</li>
		

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontend/components/child_menu.blade.php ENDPATH**/ ?>
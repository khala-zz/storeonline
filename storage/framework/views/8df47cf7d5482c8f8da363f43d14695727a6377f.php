	<div class="mainmenu pull-left">
		<ul class="nav navbar-nav collapse navbar-collapse">
			<li><a href="<?php echo e(route('home')); ?>" class="active">Home</a></li>

			<?php $__currentLoopData = $categorysLimit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryParent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li class="dropdown"><a href="#"><?php echo e($categoryParent -> name); ?><i class="fa fa-angle-down"></i></a>
				<?php echo $__env->make('frontend.components.child_menu',['categoryParent' => $categoryParent], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</li>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
			<li><a href="404.html">404</a></li>
			<li><a href="contact-us.html">Contact</a></li>
		</ul>
	</div><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontend/components/main_menu.blade.php ENDPATH**/ ?>
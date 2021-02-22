<section id="slider">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="item <?php echo e($key == 0 ? 'active' : ''); ?>">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2><?php echo e($slider -> name); ?></h2>
									<p><?php echo e($slider -> description); ?> </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo e($slider -> image_path); ?>" class="girl img-responsive" alt="" />
									<img src="<?php echo e(asset('images/home/pricing.png')); ?>"  class="pricing" alt="" />
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontend/home/components/slider.blade.php ENDPATH**/ ?>
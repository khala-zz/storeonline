

	<?php $__env->startSection('title'); ?>
		<title><?php echo e($detail_product -> name); ?></title>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('css'); ?>
		
		<link href="<?php echo e(asset('home/home.css')); ?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo e(asset('frontend/easyzoom/css/easyzoom.css')); ?>" />
	<?php $__env->stopSection(); ?>



	<?php $__env->startSection('content'); ?>
	<section>
		<div class="container">
			<div class="row">
				<?php echo $__env->make('frontend.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<div class="col-sm-9 padding-right">
					<?php if(session('message')): ?>
                            <div class="alert alert-success">
                                <strong><?php echo e(session('message')); ?></strong>
                            </div>
                        <?php endif; ?>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							
							<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">

								<a href="<?php echo e($detail_product->feature_image_path); ?>">
									<img src="<?php echo e($detail_product->feature_image_path); ?>" alt="" id="dynamicImage" style="width: 300px;height: 300px;" />
								</a>
							</div>

							<ul class="thumbnails" style="margin-left: -10px;">
								<li>
									<?php $__currentLoopData = $imagesGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagesGallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<a href="<?php echo e(url('product/large',$imagesGallery->name)); ?>" data-standard="<?php echo e(url('product/small',$imagesGallery->name)); ?>">
										<img src="<?php echo e(url('product/small',$imagesGallery->name)); ?>" alt="" width="75" style="padding: 8px;">
									</a>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</li>
							</ul>

						</div>
						<div class="col-sm-7">
							<form action="<?php echo e(route('addToCart')); ?>" method="post" role="form">
								<?php echo csrf_field(); ?>
								<input type="hidden" name="product_id" value="<?php echo e($detail_product->id); ?>">
								<input type="hidden" name="product_name" value="<?php echo e($detail_product->name); ?>">
								<input type="hidden" name="product_code" value="<?php echo e($detail_product->ma_sp); ?>">
								<input type="hidden" name="product_color" value="<?php echo e($detail_product->p_color); ?>">
								<input type="hidden" name="price" value="<?php echo e($detail_product->price); ?>" id="dynamicPriceInput">
								<div class="product-information"><!--/product-information-->
									<img src="images/product-details/new.jpg" class="newarrival" alt="" />
									<h2><?php echo e($detail_product -> name); ?></h2>
									<p>Mã sản phẩm: <?php echo e($detail_product -> ma_sp); ?></p>
									<?php if($detail_product -> reviews() -> count()): ?>
									<?php echo e(number_format($detail_product -> avg_rating,2)); ?>/5.00
									<br />
									<?php echo e($detail_product -> reviews_count); ?> vote
									<?php else: ?>
									<h2>chua co danh gia</h2>
									<?php endif; ?>
									<br />
									<span>
										<select name="size" id="idSize" class="form-control">
											<option value="">Select Size</option>
											<?php $__currentLoopData = $detail_product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($detail_product->id); ?>-<?php echo e($attrs->size); ?>"><?php echo e($attrs->size); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</span><br>

									<span>

										<span id="dynamic_price">US $<?php echo e($detail_product->price); ?></span>
										<label>Quantity:</label>
										<input type="text" name="quantity" value="<?php echo e($totalStock); ?>" id="inputStock"/>
										<?php if($totalStock>0): ?>
										<button type="submit" class="btn btn-fefault cart" id="buttonAddToCart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
										<?php endif; ?>

									</span>
									<p><b>Availability:</b>
										<?php if($totalStock>0): ?>
										<span id="availableStock">In Stock</span>
										<?php else: ?>
										<span id="availableStock">Out of Stock</span>
										<?php endif; ?>
									</p>
									<p><b>Condition:</b> New</p>
									<p><b>Brand:</b> <?php echo e($detail_product -> brand -> name); ?></p>
									<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
								</div><!--/product-information-->
							</form>
							</div>
						</div><!--/product-details-->

					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>

						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								
								<div class="col-sm-12">
									<?php echo $detail_product -> content; ?>

								</div>
								
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="tag" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<h3>Danh gia sang pham</h3>
									<?php if(Auth::check()): ?>
									<form action="<?php echo e(route('reviews.store')); ?>" method="post" >
										<?php echo csrf_field(); ?>
										<input type="hidden" name="product_id" value="<?php echo e($detail_product -> id); ?>">
										Your rating:
										<br />
										<select name="rating">
											<option >1</option>
											<option >2</option>
											<option >3</option>
											<option selected >4</option>
											<option >5</option>
										</select>
										<br /><br />
										Comment
										<br />
										<textarea name="comment" ></textarea>
										<br /><br />
										<input type="submit" value="save rating">
									</form>
									<?php else: ?>
									<p>ban phai dang nhap moi duoc reviews</p>
									<?php endif; ?>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					

					<!--recommended_items-->
					<?php echo $__env->make('frontend.home.components.recommend_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<!--/recommended_items-->
					
				</div>



			</div>


		</div>
	</div>
</section>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('js'); ?>
		<script src=" <?php echo e(asset('home/home.js')); ?> "></script>
		<script src="<?php echo e(asset('frontend/js/product/attrs/attrs.js')); ?>"></script>
		<script src="<?php echo e(asset('frontend/easyzoom/dist/easyzoom.js')); ?>"></script>
		<script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function(e) {
    	var $this = $(this);

    	e.preventDefault();

        // Use EasyZoom's `swap` method
        api1.swap($this.data('standard'), $this.attr('href'));
    });

    // Setup toggles example
    var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

    $('.toggle').on('click', function() {
    	var $this = $(this);

    	if ($this.data("active") === true) {
    		$this.text("Switch on").data("active", false);
    		api2.teardown();
    	} else {
    		$this.text("Switch off").data("active", true);
    		api2._init();
    	}
    });
</script>
	<?php $__env->stopSection(); ?>



	
	
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontend/product/detail.blade.php ENDPATH**/ ?>


	<?php $__env->startSection('title'); ?>
		<title>Login - Register</title>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('css'); ?>
		
		<link href="<?php echo e(asset('home/home.css')); ?>" rel="stylesheet">
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('js'); ?>
		<script src=" <?php echo e(asset('home/home.js')); ?> "></script>
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('content'); ?>
	
	<section id="form"><!--form-->
		<div class="container">
			<?php if(session('message')): ?>
			<div class="alert alert-success">
				<strong><?php echo e(session('message')); ?></strong>
			</div>
			<?php endif; ?>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
						<form action="<?php echo e(route('user.login.post')); ?>" method="post">
							<?php echo csrf_field(); ?>
							<input type="email" placeholder="Email" name="email" />
							<input type="password" placeholder="Mật khẩu" name="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								lưu đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng kí</h2>
						<form action="<?php echo e(route('user.register')); ?>" method="post">
							<?php echo csrf_field(); ?>
							<input type="text" placeholder="Tên" name="name" value="<?php echo e(old('name')); ?>"/>
							<span class="text-danger"><?php echo e($errors->first('name')); ?></span>

							<input type="email" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>"/>
							<span class="text-danger"><?php echo e($errors->first('email')); ?></span>

							<input type="password" placeholder="Mật khẩu" name="password" value="<?php echo e(old('password')); ?>"/>
							<span class="text-danger"><?php echo e($errors->first('password')); ?></span>

							<input type="password" placeholder="Nhập lại mật khẩu" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>"/>
							<span class="text-danger"><?php echo e($errors->first('password_confirmation')); ?></span>
							
							<button type="submit" class="btn btn-default">Đăng kí</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

	
	

	<?php $__env->stopSection(); ?>

	
	
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontend/user/login_page.blade.php ENDPATH**/ ?>
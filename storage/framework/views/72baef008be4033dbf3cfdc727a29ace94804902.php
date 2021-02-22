

	<?php $__env->startSection('title'); ?>
		<title>Account</title>
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
						 <form action="<?php echo e(route('updateProfile',['id' => $user_login->id])); ?>" method="post" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PUT')); ?>

                        <legend>Thông tin tài khoản</legend>
                        <div class="form-group <?php echo e($errors->has('name')?'has-error':''); ?>">
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e($user_login->name); ?>" placeholder="Name">
                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('address')?'has-error':''); ?>">
                            <input type="text" class="form-control" value="<?php echo e($user_login->address); ?>" name="address" id="address" placeholder="Address">
                            <span class="text-danger"><?php echo e($errors->first('address')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('city')?'has-error':''); ?>">
                            <input type="text" class="form-control" name="city" value="<?php echo e($user_login->city); ?>" id="city" placeholder="City">
                            <span class="text-danger"><?php echo e($errors->first('city')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('state')?'has-error':''); ?>">
                            <input type="text" class="form-control" name="state" value="<?php echo e($user_login->state); ?>" id="state" placeholder="State">
                            <span class="text-danger"><?php echo e($errors->first('state')); ?></span>
                        </div>
                        <div class="form-group">
                            <select name="country" id="country" class="form-control">
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->country_name); ?>" <?php echo e($user_login->country==$country->country_name?' selected':''); ?>><?php echo e($country->country_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group <?php echo e($errors->has('pincode')?'has-error':''); ?>">
                            <input type="text" class="form-control" name="pincode" value="<?php echo e($user_login->pincode); ?>" id="pincode" placeholder="Pincode">
                            <span class="text-danger"><?php echo e($errors->first('pincode')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('mobile')?'has-error':''); ?>">
                            <input type="text" class="form-control" name="mobile" value="<?php echo e($user_login->mobile); ?>" id="mobile" placeholder="Mobile">
                            <span class="text-danger"><?php echo e($errors->first('mobile')); ?></span>
                        </div>
                        <button type="submit" class="btn btn-primary" style="float: right;">Update Profile</button>
                    </form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						
						 <form action="<?php echo e(route('updatePassword',['id' => $user_login->id])); ?>" method="post" class="form-horizontal">
                        <legend>Sửa mật khẩu</legend>
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PUT')); ?>

                        <div class="form-group <?php echo e($errors->has('password')?'has-error':''); ?>">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Old Password">
                            <?php if(Session::has('oldpassword')): ?>
                                <span class="text-danger"><?php echo e(Session::get('oldpassword')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group <?php echo e($errors->has('newPassword')?'has-error':''); ?>">
                            <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password">
                            <span class="text-danger"><?php echo e($errors->first('newPassword')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('newPassword_confirmation')?'has-error':''); ?>">
                            <input type="password" class="form-control" name="newPassword_confirmation" id="newPassword_confirmation" placeholder="Confirm Password">
                            <span class="text-danger"><?php echo e($errors->first('newPassword_confirmation')); ?></span>
                        </div>
                        <button type="submit" class="btn btn-primary" style="float: right;">Update Password</button>
                    </form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

	
	

	<?php $__env->stopSection(); ?>

	
	
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontend/user/account.blade.php ENDPATH**/ ?>
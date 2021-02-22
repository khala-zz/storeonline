<?php $__env->startSection('title'); ?>
	<title>Thêm Coupon</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
 <!-- dung select 2 -->
 
 <link href=" <?php echo e(asset('admins/select2/dist/css/select2.min.css')); ?>" rel="stylesheet" />
 <!-- dung tagsinput -->

 
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<?php echo $__env->make('admin.content-header',['name' => 'Sản phẩm','key' => 'Thêm','link' => 'product.index',
		'text_button' => 'Danh sách'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="row">

			<div class="col-md-12">
				<div class="card card-body">
					<h3 class="box-title m-b-0">Thêm Coupon</h3>
					<p class="text-muted m-b-30 font-13"> Điền đầy đủ thông tin bên dưới </p>
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<form action="<?php echo e(route('coupon.store')); ?>" method="post"  >
								<?php echo csrf_field(); ?>
								<div class="form-group">
									<label> Tên Coupon</label>
									<input type="text" class="form-control <?php $__errorArgs = ['coupon_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="coupon_code" placeholder="Nhập tên Coupon" value="<?php echo e(old('coupon_code')); ?>">
									<?php $__errorArgs = ['coupon_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<div class="alert alert-danger khala-alert">
											<?php echo e($message); ?>

										</div>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>

								<div class="form-group">
									<label> Giảm %</label>
									<input type="number" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="amount" placeholder="Nhập số % giảm" value="<?php echo e(old('amount')); ?>">
									<?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<div class="alert alert-danger khala-alert">
											<?php echo e($message); ?>

										</div>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>

								

				                <div class="form-group">
				                	<label >Chọn kiểu giảm</label>
				                	<!-- dung select 2 -->
				                	<select class="select2 form-control custom-select <?php $__errorArgs = ['amount_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name = "amount_type">
				                		<option value="Percentage">Percentage</option>
				                		
				                	</select>
				                	<?php $__errorArgs = ['amount_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
				                	<div class="alert alert-danger khala-alert"><?php echo e($message); ?></div>
				                	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				                </div>

				     

				                <div class="form-group">
									<label class="control-label">Ngày hết hạn</label>
									<input type="date" class="form-control <?php $__errorArgs = ['expiry_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="expiry_date" placeholder="dd/mm/yyyy" value="<?php echo e(old('expiry_date')); ?>">
									<?php $__errorArgs = ['expiry_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<div class="alert alert-danger khala-alert">
											<?php echo e($message); ?>

										</div>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
				               
								<div class="form-group">
									<label >Trạng thái</label>
									<div >
										<input type="radio"  name="status"  value="0">
										<label  >Ẩn</label>
									</div>
									<div >
										<input type="radio"  name="status"  value="1">
										<label >Hiện</label>
									</div>
									<?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<div class="alert alert-danger khala-alert">
											<?php echo e($message); ?>

										</div>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>


								<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
								<a href="<?php echo e(route('coupon.index')); ?>" class="btn waves-effect waves-light btn-secondary">Cancel</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

 <?php $__env->startSection('js'); ?>
   
 
    
    <!--select 2 -->
    <script src="<?php echo e(asset('admins/select2/dist/js/select2.full.min.js')); ?>"></script>
    <!--tags input -->
    <script src="<?php echo e(asset('admins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>

   

    

    <script>
    jQuery(document).ready(function() {
        // For select 2
        $(".select2").select2();
        
    });
    </script>
 
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/admin/coupon/add.blade.php ENDPATH**/ ?>
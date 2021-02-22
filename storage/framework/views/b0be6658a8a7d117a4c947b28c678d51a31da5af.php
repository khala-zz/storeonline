<?php $__env->startSection('title'); ?>
	<title>Thêm Role</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

  <link href=" <?php echo e(asset('admins/role/add/add.css')); ?>" rel="stylesheet" />
 
 <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<?php echo $__env->make('admin.content-header',['name' => 'Roles','key' => 'Thêm','link' => 'role.index',
		'text_button' => 'Danh sách'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="row">

			<div class="col-md-12">
				<div class="card card-body">
					<h3 class="box-title m-b-0">Thêm Roles</h3>
					<p class="text-muted m-b-30 font-13"> Điền đầy đủ thông tin bên dưới </p>
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<?php if(session('success')): ?>
	                            <div class="alert alert-success">
	                                <strong><?php echo e(session('success')); ?></strong>
	                            </div>
	                        <?php endif; ?>
							<form action="<?php echo e(route('role.store')); ?>" method="post">
								<?php echo csrf_field(); ?>
								<div class="form-group">
									<label> Tên vai trò</label>
									<input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" placeholder="Nhập tên vai trò" value="<?php echo e(old('name')); ?>">
									<?php $__errorArgs = ['name'];
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
									<label>Tên hiển thị</label>


									<input type="text" class="form-control <?php $__errorArgs = ['display_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="display_name" placeholder="Nhập tên hiển thị" value="<?php echo e(old('display_name')); ?>">
									<?php $__errorArgs = ['display_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<div class="alert alert-danger"><?php echo e($message); ?></div>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>

								<div class="form-group">
									<label>Mô tả vai trò</label>


									<textarea name = "description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" >
										<?php echo e(old('description')); ?>

									</textarea>
									<?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<div class="alert alert-danger"><?php echo e($message); ?></div>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>

								<div class="col-md-12">
									<div class="row">
										<div class="col-md-12">
											<label >
												<input type="checkbox" class="checkall">CheckAll
											</label>
										</div>
										<?php $__currentLoopData = $permissionsParent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionParentItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

										<div class="card mb-3 col-md-12" >
											<div class="card-header bg-primary">
												<label >
													<input type="checkbox" value="" class="checkbox_wrapper checkbox_wrapper_<?php echo e($permissionParentItem -> name); ?>">
												</label>  
												Module <?php echo e($permissionParentItem -> name); ?>

											</div>

											<div class="row">
												<?php $__currentLoopData = $permissionParentItem -> permissionsChildrent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionsChildrenItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="card-body col-md-3">
													<h5 class="card-title">
														<label >
															<input type="checkbox" name="permission_id[]" value="<?php echo e($permissionsChildrenItem -> id); ?>" class="checkbox_children checkbox_children_<?php echo e($permissionParentItem -> name); ?>">
														</label> 
														<?php echo e($permissionsChildrenItem -> name); ?></h5>

													</div>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</div>
											</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

										</div>

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
								<a href="<?php echo e(route('role.index')); ?>" class="btn waves-effect waves-light btn-secondary">Cancel</a>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('admins/role/add/add.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/admin/role/add.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
<title>Danh Sách Permission</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('admins/css/footable.core.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('admins/css/bootstrap-select.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('admins/css/pages/footable-page.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('admins/css/sweetalert.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->
    <?php echo $__env->make('admin.content-header',['name' => 'Danh Sách permissions','key' => 'Danh sách','link' => 'permission.add',
    'text_button' => 'Thêm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách Permission</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <?php if(session('message')): ?>
                            <div class="alert alert-success">
                                <strong><?php echo e(session('message')); ?></strong>
                            </div>
                        <?php endif; ?>
                       
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list"  >
                            <thead>
                                <tr>
                                    <th>Thứ tự</th>
                                    <th>Tên permission</th>
                                    <th>Tên permission cha</th>
                                    <th>Thời gian tạo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $parent_pers = DB::table('permissions')->select('name')->where('id',$permission->parent_id)->get();
                                ?>
                                <tr>
                                    <td><?php echo e($permission -> id); ?></td>
                                    <td>
                                        <?php echo e($permission -> name); ?>

                                    </td>
                                    <td> 
                                        <?php $__currentLoopData = $parent_pers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($parent_per->name); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td><?php echo e($permission -> created_at -> diffForHumans()); ?></td>
                                   
                                    
                                    <td>
                                        
                                        <a href="<?php echo e(route('permission.edit',['id' => $permission -> id])); ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                      
                                        <a href="" data-url="<?php echo e(route('permission.delete',['id' => $permission -> id])); ?>" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                        
                                        
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        <?php echo e($permissions -> links()); ?> 
                                    </td>
                                  
                                   
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                       
                    </div>
                    <div class="col-lg-4 ">
                       <?php echo e($permissions -> links()); ?>

                   </div> 
                    <div class="col-lg-4 ">
                        <a href="<?php echo e(route('permission.add')); ?>"  class="btn btn-info btn-rounded" >Thêm danh mục sản phẩm</a>
                   </div> 
                   
                   
               </div>
            </div>

        </div>
    </div>
    
</div>
                                   

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script src="<?php echo e(asset('admins/js/footable.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('admins/js/pages/footable-init.js')); ?>"></script>
<!-- Sweet-Alert  -->
<script src="<?php echo e(asset('admins/js/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('admins/js/jquery.sweet-alert.custom.js')); ?>"></script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/admin/permission/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
<title>Danh sách Coupon</title>
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
    <?php echo $__env->make('admin.content-header',['name' => 'Danh sách Coupon','key' => 'Danh sách','link' => 'coupon.add',
    'text_button' => 'Thêm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách Coupon</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <strong><?php echo e(session('success')); ?></strong>
                            </div>
                        <?php endif; ?>
                       
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list"  >
                            <thead>
                                <tr>
                                    <th>Thứ tự</th>
                                    <th>Tên coupon</th>
                                    <th>% giảm</th>
                                    <th>Loại giảm</th>
                                    <th>Thời gian tạo</th>
                                    <th>Ngày hết hạn</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                                <tr>
                                    <td>
                                        <?php echo e($coupon -> id); ?>

                                    </td>
                                     
                                    <td>
                                        <?php echo e($coupon -> coupon_code); ?>

                                    </td>
                                    
                                    <td> 
                                        <?php echo e($coupon -> amount); ?>

                                    </td>
    
                                    <td>
                                        <?php echo e($coupon -> amount_type); ?>

                                    </td>

                                    <td>
                                        <?php echo e($coupon -> created_at); ?>

                                    </td>

                                    <td>
                                        <?php echo e($coupon -> expiry_date); ?>

                                    </td>

                                    <td>
                                        <span class="label <?php echo e($coupon -> status ==1?'label-success':'label-inverse'); ?>"><?php echo e($coupon -> status ==1?'Hiện':'Ẩn'); ?> </span> 
                                    </td>
                                    
                                    <td>
                                        <a href="<?php echo e(route('coupon.edit',['id' => $coupon -> id])); ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <a href="" data-url="<?php echo e(route('coupon.delete',['id' => $coupon -> id])); ?>" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                        
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        <?php echo e($coupons -> links()); ?> 
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
                       <?php echo e($coupons -> links()); ?>

                   </div> 
                    <div class="col-lg-4 ">
                        <a href="<?php echo e(route('coupon.add')); ?>"  class="btn btn-info btn-rounded" >Thêm Coupon</a>
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
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/admin/coupon/index.blade.php ENDPATH**/ ?>
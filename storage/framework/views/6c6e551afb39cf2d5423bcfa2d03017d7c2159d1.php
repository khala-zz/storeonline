<?php $__env->startSection('title'); ?>
<title>Setting</title>
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
    <?php echo $__env->make('admin.content-header',['name' => 'Setting','key' => 'Danh sách','link' => 'setting.add',
    'text_button' => 'Thêm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách Setting</h4>
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
                                    <th>Config key</th>
                                    <th>Config value</th>
                                    <th>Thời gian tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               
                                <tr>
                                    <td><?php echo e($setting -> id); ?></td>
                                    <td>
                                        <?php echo e($setting -> config_key); ?>

                                    </td>
                                    <td> 
                                        
                                        <?php echo e($setting -> config_value); ?>        
                                      
                                    </td>
                                    <td><?php echo e($setting -> created_at -> diffForHumans()); ?></td>
                                    <td><span class="label <?php echo e($setting -> status ==1?'label-success':'label-inverse'); ?>"><?php echo e($setting -> status ==1?'Hiện':'Ẩn'); ?> </span> </td>
                                    
                                    <td>
                                        <a href="<?php echo e(route('setting.edit',['id' => $setting -> id])); ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <a href="" data-url="<?php echo e(route('setting.delete',['id' => $setting -> id])); ?>" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                        
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        <?php echo e($settings -> links()); ?> 
                                    </td>
                                  
                                   
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                       
                    </div>
                    <div class="col-lg-6 ">
                       <?php echo e($settings -> links()); ?>

                   </div> 
                    <div class="col-lg-2">
                        <a class="btn  btn-info d-none d-lg-block m-l-15 dropdown-toggle" data-toggle="dropdown" href="#">
                          <i class="fa fa-plus-circle"></i>Thêm Setting
                          <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                          <li><a href="<?php echo e(route('setting.add'). '?type=Text'); ?> ">Text</a></li>
                          <li><a href="<?php echo e(route('setting.add'). '?type=Textarea'); ?>">Textarea</a></li>
                      </ul>
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
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/admin/setting/index.blade.php ENDPATH**/ ?>
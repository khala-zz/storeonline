<?php $__env->startSection('title'); ?>
<title>Danh mục sản phẩm</title>
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
    <?php echo $__env->make('admin.content-header',['name' => 'Danh mục sản phẩm','key' => 'Danh sách','link' => 'categories.create',
    'text_button' => 'Thêm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách danh mục sản phẩm</h4>
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
                                    <th>Tên danh mục</th>
                                    <th>Tên danh mục cha</th>
                                    <th>Thời gian tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $parent_cates = DB::table('categories')->select('name')->where('id',$category->parent_id)->get();
                                ?>
                                <tr>
                                    <td><?php echo e($category -> id); ?></td>
                                    <td>
                                        <?php echo e($category -> name); ?>

                                    </td>
                                    <td> 
                                        <?php $__currentLoopData = $parent_cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($parent_cate->name); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td><?php echo e($category -> created_at -> diffForHumans()); ?></td>
                                    <td><span class="label <?php echo e($category -> status ==1?'label-success':'label-inverse'); ?>"><?php echo e($category -> status ==1?'Hiện':'Ẩn'); ?> </span> </td>
                                    
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-edit')): ?>
                                        <a href="<?php echo e(route('categories.edit',['id' => $category -> id])); ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-delete')): ?>
                                        <a href="" data-url="<?php echo e(route('categories.delete',['id' => $category -> id])); ?>" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                        <?php endif; ?>
                                        
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        <?php echo e($categories -> links()); ?> 
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
                       <?php echo e($categories -> links()); ?>

                   </div> 
                    <div class="col-lg-4 ">
                        <a href="<?php echo e(route('categories.create')); ?>"  class="btn btn-info btn-rounded" >Thêm danh mục sản phẩm</a>
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
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/admin/category/index.blade.php ENDPATH**/ ?>
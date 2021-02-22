
<?php $__env->startSection('title'); ?>
<title>Image Gallery</title>
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
    <?php echo $__env->make('admin.content-header',['name' => 'Image Gallery','key' => 'Danh sách','link' => 'product.index',
    'text_button' => 'Danh sách sản phẩm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Bread crumb and right sidebar toggle -->
  <div class="row">
                    <div class="col-lg-6">
                       <div class="card" >
                          <img class="card-img-top" src="<?php echo e($product -> feature_image_path); ?>" alt="<?php echo e($product -> name); ?>">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo e($product -> name); ?></h4>
                            <h4 class="card-title"><?php echo e($product -> price); ?></h4>
                            <h1>Thêm image gallery</h1>
                            <form action="<?php echo e(route('image-gallery.store')); ?>" method="post" role="form" enctype="multipart/form-data">
                                    
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="products_id" value="<?php echo e($product->id); ?>">
                                        <input type="file" name="image_path[]" id="id_imageGallery" class="form-control" multiple="multiple" required>
                                        <span class="text-danger"><?php echo e($errors->first('image')); ?></span>
                                       
                                        <button type="submit" class="btn btn-success" style="margin-left: auto;margin-right: auto;margin-top: 10px;">Upload</button>
                                    </div>

                                </form>
                          </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách hình ảnh của Sản phẩm</h4>
                                <div class="table-responsive">
                                    <table class="table color-table success-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php $__currentLoopData = $imagesGallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i++); ?></td>
                                                <td>
                                                    <img src="<?php echo e($image -> image_path); ?>" class="image_product_100_100">
                                                </td>
                                                <td>
                                                    <a href="" data-url="<?php echo e(route('image-gallery.delete',['id' => $image -> id])); ?>" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                                </td>
                                               
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         
                                        </tbody>
                                    </table>
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
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/admin/product/add-gallery-image.blade.php ENDPATH**/ ?>
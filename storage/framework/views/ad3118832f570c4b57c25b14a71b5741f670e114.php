<?php $__env->startSection('title'); ?>
<title>Danh sách sản phẩm</title>
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
    <?php echo $__env->make('admin.content-header',['name' => 'Danh sách Sản phẩm','key' => 'Danh sách','link' => 'product.add',
    'text_button' => 'Thêm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách Sản phẩm</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <form action="<?php echo e(route('product.index')); ?>">
                            <input type="text" name="query" placeholder="tim san pham" value="<?php echo e(request('query','')); ?>">

                            <!-- category search -->
                            <select name="category_search" >
                                <option value="0">--- tim theo danh muc ---</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option 
                                value="<?php echo e($category -> id); ?>"
                                <?php if(request('category_search',0) == $category -> id): ?> selected <?php endif; ?>><?php echo e($category -> name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                              <!-- tag search -->
                            <select name="tag_search" >
                                <option value="0">--- tim theo tag ---</option>
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag -> id); ?>"
                                     <?php if(request('tag_search',0) == $tag -> id): ?> selected <?php endif; ?>><?php echo e($tag -> name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <input type="submit" value="tim kiem">
                        </form>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <strong><?php echo e(session('success')); ?></strong>
                            </div>
                        <?php endif; ?>
                       
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list"  >
                            <thead>
                                <tr>
                                    <th>Thứ tự</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Danh mục</th>
                                    <th>Thời gian tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Images Gallery</th>
                                    <th>Product Attribute</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                                <tr>
                                    <td><?php echo e($product -> id); ?></td>
                                     <td>
                                        <img src="<?php echo e($product -> feature_image_path); ?>" class="image_product_50_50">
                                    </td>
                                    <td>
                                        <?php echo e($product -> name); ?>

                                    </td>
                                    <td> 
                                        <?php echo e($product -> price); ?>

                                    </td>
                                   
                                     <!-- optional($productItem -> category) dam bao chay ko lỗi khi productItem -> category ko co category tuong ung trong bang category -->
                                    <td><?php echo e(optional($product -> category) -> name); ?></td>
                                    <td><?php echo e($product -> created_at -> diffForHumans()); ?></td>
                                    <td><span class="label <?php echo e($product -> status ==1?'label-success':'label-inverse'); ?>"><?php echo e($product -> status ==1?'Hiện':'Ẩn'); ?> </span> </td>
                                    
                                     <td>
                                        <a href="<?php echo e(route('image-gallery.add',['id' => $product -> id])); ?>" class="btn btn-primary btn-rounded btn-sm"> Add images </a>
                                    </td>
                                     <td>
                                        <a href="<?php echo e(route('product-attr.add',['id' => $product -> id])); ?>" class="btn btn-danger btn-rounded btn-sm"> Add attr </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('product.edit',['id' => $product -> id])); ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <a href="" data-url="<?php echo e(route('product.delete',['id' => $product -> id])); ?>" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                        
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        <?php echo e($products -> links()); ?> 
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
                       <?php echo e($products -> links()); ?>

                   </div> 
                    <div class="col-lg-4 ">
                        <a href="<?php echo e(route('product.add')); ?>"  class="btn btn-info btn-rounded" >Thêm Sản phẩm</a>
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
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/admin/product/index.blade.php ENDPATH**/ ?>
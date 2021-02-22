
<?php $__env->startSection('head'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<title>Product Attribute</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('admins/css/footable.core.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('admins/css/bootstrap-select.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('admins/css/pages/footable-page.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('admins/css/sweetalert.css')); ?>" rel="stylesheet">
<!-- xeditable css -->
<link href="<?php echo e(asset('admins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->
    <?php echo $__env->make('admin.content-header',['name' => 'Image Gallery','key' => 'Danh sách','link' => 'product.index',
    'text_button' => 'Danh sách sản phẩm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Bread crumb and right sidebar toggle -->
  <div class="row">
                    <div class="col-lg-4">
                       <div class="card" >
                          <img class="card-img-top" src="<?php echo e($product -> feature_image_path); ?>" alt="<?php echo e($product -> name); ?>">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo e($product -> name); ?></h4>
                            <h4 class="card-title"><?php echo e($product -> price); ?></h4>
                            <h1>Thêm thuộc tính sản phẩm</h1>

                            <?php if(session('success')): ?>
                                <div class="alert alert-success">
                                    <strong><?php echo e(session('success')); ?></strong>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo e(route('product-attr.store')); ?>" method="post">
                                    
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                        <div class="form-group">
                                    
                                    <input type="text" class="form-control <?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sku" placeholder="Nhập SKU" value="<?php echo e(old('sku')); ?>">
                                    
                                    <?php $__errorArgs = ['sku'];
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
                                    
                                    <input type="text" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price" placeholder="Nhập Price" value="<?php echo e(old('price')); ?>">
                                    <?php $__errorArgs = ['price'];
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
                                    
                                    <input type="text" class="form-control <?php $__errorArgs = ['size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="size" placeholder="Nhập Size" value="<?php echo e(old('size')); ?>">
                                    <?php $__errorArgs = ['size'];
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
                                    
                                    <input type="number" class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="stock" placeholder="Nhập số lượng trong kho" value="<?php echo e(old('stock')); ?>">
                                    <?php $__errorArgs = ['stock'];
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
                                       
                                        <button type="submit" class="btn btn-success" style="margin-left: auto;margin-right: auto;margin-top: 10px;">Upload</button>
                                    </div>

                                </form>
                          </div>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách thuộc tính Sản phẩm</h4>
                                <div class="table-responsive">
                                    <table class="table color-table success-table">
                                        <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Size</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $productAttrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productAttr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="hidden" name="id[]" value="<?php echo e($productAttr->id); ?>">
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0)"  data-type="text" data-pk="1" id="sku_<?php echo e($productAttr->id); ?>" class ="productAttr-sku" name="sku" data-title="Nhập sku"><?php echo e($productAttr -> sku); ?>

                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" class ="productAttr-size" data-type="text" data-pk="1" data-title="Enter username" name="size" id="size_<?php echo e($productAttr->id); ?>"><?php echo e($productAttr -> size); ?>

                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" class ="productAttr-price" name ="price" data-type="text" data-pk="1" data-title="Nhập price" id="price_<?php echo e($productAttr->id); ?>"><?php echo e($productAttr -> price); ?>

                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" class ="productAttr-stock" data-type="text" data-pk="1" data-title="Nhập stock" name="stock" id="stock_<?php echo e($productAttr->id); ?>"><?php echo e($productAttr -> stock); ?>

                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="" data-toggle="tooltip" data-original-title="Cập nhật"  data-id="<?php echo e($productAttr -> id); ?>" class="attr-update"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="" data-url="<?php echo e(route('product-attr.delete',['id' => $productAttr -> id])); ?>" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
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

<!-- text xedtior -->
<script src="<?php echo e(asset('admins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js')); ?>"></script>

<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(function() {
       
        $('.productAttr-sku').editable({
            type: 'text',
            pk: 1,
            name: 'sku[]',
            title: 'Nhập sku',
            mode: 'inline'
        });
        $('.productAttr-size').editable({
            type: 'text',
            pk: 1,
            name: 'size[]',
            title: 'Nhập size',
            mode: 'inline'
        });
        $('.productAttr-price').editable({
            type: 'text',
            pk: 1,
            name: 'price[]',
            title: 'Nhập price',
            mode: 'inline'
        });
        $('.productAttr-stock').editable({
            type: 'text',
            pk: 1,
            name: 'stock[]',
            title: 'Nhập stock',
            mode: 'inline'
        });

        //xu ly ajax để cap nhat dữ liệu attr
       
        $(document).on("click", ".attr-update" , function(e) {
          e.preventDefault();
          var edit_id = $(this).data('id');
          var sku = $('#sku_'+edit_id).text();
          var size = $('#size_'+edit_id).text();
          var price = $('#price_'+edit_id).text();
          var stock = $('#stock_'+edit_id).text();
         
          if(sku != '' && size != '' && price != '' && stock != ''){
            $.ajax({
              url: '/admin/product-attr/update',
              type: 'get',
              data: {_token: CSRF_TOKEN,editid: edit_id,sku: sku,size: size,price: price,stock: stock},
              success: function(response){
                alert('cập nhật thành công');
                }
                
            });
        }
        else{
            alert('Vui lòng điền đầy đủ thông tin');
        }
    });
    });
    </script>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/admin/product/add-attr.blade.php ENDPATH**/ ?>
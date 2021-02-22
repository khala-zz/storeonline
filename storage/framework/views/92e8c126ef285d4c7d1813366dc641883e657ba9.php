<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo e($name); ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <?php if($name === 'Image Gallery'): ?>

                <li class="breadcrumb-item"><a href="<?php echo e(route($link)); ?>">Products</a></li>
                <li class="breadcrumb-item active">Image Gallery</li>

                <?php else: ?>

                <li class="breadcrumb-item"><a href="<?php echo e(route($link)); ?>"><?php echo e($name); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e($key); ?></li>

                <?php endif; ?>

            </ol>
            <?php if($name === 'Setting' && $key ==='Danh sách'): ?>

                <a class="btn  btn-info d-none d-lg-block m-l-15 dropdown-toggle" data-toggle="dropdown" href="#">
                  <i class="fa fa-plus-circle"></i><?php echo e($text_button); ?>

                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo e(route('setting.add'). '?type=Text'); ?> ">Text</a></li>
                  <li><a href="<?php echo e(route('setting.add'). '?type=Textarea'); ?>">Textarea</a></li>
                </ul>

            <?php else: ?> 

                <a href="<?php echo e(route($link)); ?>" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> <?php echo e($text_button); ?></a>

            <?php endif; ?>
        </div>
    </div>
</div>

 <?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/admin/content-header.blade.php ENDPATH**/ ?>
<?php $__env->startSection('head'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <title>Chi tiết đơn đặt hàng</title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <?php echo $__env->make('admin.content-header',['name' => 'Các đơn hàng','key' => 'Đơn hàng','link' => 'order.index',
        'text_button' => 'Danh sách'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">

            <div class="col-md-12">
                <div class="card card-body">
                    <h3 class="box-title m-b-0">Khách hàng <?php echo e($order -> name); ?></h3>
                    <p class="text-muted m-b-30 font-13"> Đơn hàng <?php echo e($order -> ma_order); ?> </p>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                       
                                        <tbody>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td  width="60%">
                                                    <a href="javascript:void(0)">
                                                    <?php
                                                     $product_name = $product_model -> where('id',$product -> products_id) -> first();
                                                    ?>
                                                    <?php echo $product_name -> name .'(Ma san pham: <strong>'.$product_name -> ma_sp.'</strong>)<p><small>Size: '.$product -> size.'</small></p>'; ?>    
                                                    </a>
                                                </td>
                                                <td width="15%">
                                                    <?php echo e($product  -> price); ?> VND
                                                </td>
                                                <td width="5%">
                                                x
                                                </td>
                                                <td width="15%">
                                                     <?php echo e($product -> qty); ?> cai
                                                 </td>
                                                <td width="5%"><?php echo e($product -> total); ?></td>
                                                
                                                
                                            </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3">
                                                    
                                                </td>
                                              <td><p>Tổng tiền</td>
                                                <td >
                                                    <?php echo e($order -> total_price); ?>

                                                    <div class="text-right">
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                   
                                                </td>
                                              <td><p>Giảm giá</td>
                                                <td >
                                                    <?php if($order -> coupon_amount !=''): ?>
                                                    <?php echo e($order -> coupon_amount); ?>

                                                    <?php else: ?>
                                                    <span>0</span>
                                                    <?php endif; ?>
                                                 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                   
                                                </td>
                                              <td><p>Thanh toán</td>
                                                <td >
                                                    <?php echo e($order -> grand_total); ?>

                                                    <div class="text-right">
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            
                                <div class="form-group">
                                    <label>Chú thích</label>
                                    
                                    <textarea 
                                    class="form-control <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    rows="5"
                                    name="note"
                                    id="order_note">
                                    <?php echo e($order -> note); ?>

                                </textarea>
                                <?php $__errorArgs = ['note'];
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
                                <br />
                                 <br />
                                <button data-id= "<?php echo e($order -> id); ?>" id="order_note_submit" class="btn btn-info waves-effect waves-light m-r-10">Save</button>
                                <div class="form-group">
                                  <h4>Xác nhận đơn hàng</h4>
                                  <?php if($order -> order_status == 'pending'): ?>
                                  <button data-id= "<?php echo e($order -> id); ?>" id ="order_confirm" type="button" class="btn btn-success" data-toggle="button" aria-pressed="false">

                                    <i class="ti-settings text" aria-hidden="true"></i>
                                    <input type="hidden" name="order_status" id="order_status" value="done">
                                    <span class="text" id="order_confirm_value" >Đang chờ duyệt</span>
                                    <i class="ti-settings text-active" aria-hidden="true"></i>
                                    <span class="text-active">Đang chờ duyệt</span>


                                </button>
                                <?php else: ?>   
                                <button data-id= "<?php echo e($order -> id); ?>" id ="order_confirm" type="button" class="btn btn-success" data-toggle="button" aria-pressed="false">

                                    <i class="ti-check text" aria-hidden="true"></i>
                                    <input type="hidden" name="order_status" id="order_status" value="pending">
                                    <span class="text" id="order_confirm_value">Đã duyệt</span>

                                    <i class="ti-check text-active" aria-hidden="true"></i>
                                    <span class="text-active">Đã duyệt</span>

                                </button>
                                <?php endif; ?>     

                                <br />
                                 <br />
                               
                                <div class="form-group">
                                  <h4>Xác nhận thanh toán</h4>
                                  <?php if($order -> payment_status == 'pending'): ?>
                                  <button data-id= "<?php echo e($order -> id); ?>" id ="order_payment" type="button" class="btn btn-success" data-toggle="button" aria-pressed="false">
                                    
                                    <i class="ti-settings text" aria-hidden="true"></i>
                                    <input type="hidden" name="order_payment_status" id="order_payment_status" value="done">
                                    <span class="text" id="order_payment_value" >Đang chờ duyệt</span>
                                    <i class="ti-settings text-active" aria-hidden="true"></i>
                                    <span class="text-active">Đang chờ duyệt</span>
                                    
                                    
                                </button>
                                <?php else: ?>   
                                <button data-id= "<?php echo e($order -> id); ?>" id ="order_payment" type="button" class="btn btn-success" data-toggle="button" aria-pressed="false">
                                    
                                    <i class="ti-check text" aria-hidden="true"></i>
                                    <input type="hidden" name="order_payment_status" id="order_payment_status" value="pending">
                                    <span class="text" id="order_payment_value">Đã duyệt</span>

                                    <i class="ti-check text-active" aria-hidden="true"></i>
                                    <span class="text-active">Đã duyệt</span>
                                    
                                </button>
                                <?php endif; ?>     
                                    
                                </div>        
                            </div>

                        
                       


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('admins/order/main.js')); ?>"></script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/admin/order/edit.blade.php ENDPATH**/ ?>
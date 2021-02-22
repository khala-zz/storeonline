
    <?php $__env->startSection('title'); ?>
        <title>Review Order</title>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('css'); ?>
        
        <link href="<?php echo e(asset('home/home.css')); ?>" rel="stylesheet">
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="step-one">
            <h2 class="heading">Shipping To</h2>
        </div>
        <div class="row">
            <form action="<?php echo e(route('order.submit')); ?>" method="post" class="form-horizontal">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="user_id" value="<?php echo e($shipping_address->users_id); ?>">
                <input type="hidden" name="user_email" value="<?php echo e($shipping_address->users_email); ?>">
                <input type="hidden" name="name" value="<?php echo e($shipping_address->name); ?>">
                <input type="hidden" name="address" value="<?php echo e($shipping_address->address); ?>">
                <input type="hidden" name="city" value="<?php echo e($shipping_address->city); ?>">
                <input type="hidden" name="state" value="<?php echo e($shipping_address->state); ?>">
                <input type="hidden" name="pincode" value="<?php echo e($shipping_address->pincode); ?>">
                <input type="hidden" name="country" value="<?php echo e($shipping_address->country); ?>">
                <input type="hidden" name="mobile" value="<?php echo e($shipping_address->mobile); ?>">
                <input type="hidden" name="shipping_charges" value="0">
                <input type="hidden" name="order_status" value="pending">
                <input type="hidden" name="payment_status" value="pending">
                <input type="hidden" name="total_price" value="<?php echo e($total_price); ?>">
                
                <?php if(Session::has('discount_amount_price')): ?>
                    <input type="hidden" name="coupon_code" value="<?php echo e(Session::get('coupon_code')); ?>">
                    <input type="hidden" name="coupon_amount" value="<?php echo e(Session::get('discount_amount_price')); ?>">
                    <input type="hidden" name="grand_total" value="<?php echo e($total_price-Session::get('discount_amount_price')); ?>">
                <?php else: ?>
                    <input type="hidden" name="coupon_code" value="NO Coupon">
                    <input type="hidden" name="coupon_amount" value="0">
                    <input type="hidden" name="grand_total" value="<?php echo e($total_price); ?>">
                <?php endif; ?>

                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Pincode</th>
                                <th>Mobile</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo e($shipping_address->name); ?></td>
                                <td><?php echo e($shipping_address->address); ?></td>
                                <td><?php echo e($shipping_address->city); ?></td>
                                <td><?php echo e($shipping_address->state); ?></td>
                                <td><?php echo e($shipping_address->country); ?></td>
                                <td><?php echo e($shipping_address->pincode); ?></td>
                                <td><?php echo e($shipping_address->mobile); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <section id="cart_items">
                        <div class="review-payment">
                            <h2>Review & Payment</h2>
                        </div>
                        <div class="table-responsive cart_info">
                            <table class="table table-condensed">
                                <thead>
                                <tr class="cart_menu">
                                    <td class="image">Item</td>
                                    <td class="description"></td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $cart_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $image_products=DB::table('products')->select('feature_image_path')->where('id',$cart_data->products_id)->get();

                                    ?>
                                    <tr>
                                    <td class="cart_product">
                                        <?php $__currentLoopData = $image_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href=""><img src="<?php echo e(url('products/small',$image_product->feature_image_path)); ?>" alt="" style="width: 100px;"></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href=""><?php echo e($cart_data->product_name); ?></a></h4>
                                        <p><?php echo e($cart_data->product_code); ?> | <?php echo e($cart_data->size); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p>$<?php echo e($cart_data->price); ?></p>
                                    </td>
                                    <td class="cart_quantity">
                                        <p><?php echo e($cart_data->quantity); ?></p>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">$ <?php echo e($cart_data->price*$cart_data->quantity); ?></p>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                    <td colspan="2">
                                        <table class="table table-condensed total-result">
                                            <tr>
                                                <td>Cart Sub Total</td>
                                                <td>$ <?php echo e($total_price); ?></td>
                                            </tr>
                                            <?php if(Session::has('discount_amount_price')): ?>
                                                <tr class="shipping-cost">
                                                    <td>Coupon Discount</td>
                                                    <td>$ <?php echo e(Session::get('discount_amount_price')); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td><span>$ <?php echo e($total_price-Session::get('discount_amount_price')); ?></span></td>
                                                </tr>
                                            <?php else: ?>
                                                <tr>
                                                    <td>Total</td>
                                                    <td><span>$ <?php echo e($total_price); ?></span></td>
                                                </tr>
                                            <?php endif; ?>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="payment-options">
                            <span>Select Payment Method : </span>
                        <span>
                            <label><input type="radio" name="payment_method" value="COD" checked> Cash On Delivery</label>
                        </span>
                            <span>
                            <label><input type="radio" name="payment_method" value="Paypal"> Paypal</label>
                        </span>
                            <button type="submit" class="btn btn-primary" style="float: right;">Order Now</button>
                        </div>
                    </section>

                </div>
            </form>
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/frontend/checkout/review_order.blade.php ENDPATH**/ ?>
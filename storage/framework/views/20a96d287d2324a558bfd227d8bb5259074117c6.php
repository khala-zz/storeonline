<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="<?php echo e(asset('admins/images/1.jpg')); ?>" alt="user-img" class="img-circle"><span class="hide-menu">Mark Jeckson</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <!-- danh muc san pham -->
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i></i><span class="hide-menu">Danh mục sản phẩm</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('categories.index')); ?>">Danh sách</a></li>
                                <li><a href="<?php echo e(route('categories.create')); ?>">Thêm</a></li>
                                
                            </ul>
                        </li>

                         <!-- menu -->
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('menu.index')); ?>">Danh sách</a></li>
                                <li><a href="<?php echo e(route('menu.create')); ?>">Thêm</a></li>
                                
                            </ul>
                        </li>

                        <!-- Settings -->
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Settings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('setting.index')); ?>">Danh sách</a></li>
                                
                                <li> <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Thêm</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="<?php echo e(route('setting.add') . '?type=Text'); ?>">Setting loại Text</a></li>
                                        <li><a href="<?php echo e(route('setting.add') . '?type=Textarea'); ?>">Setting loại Textarea</a></li>
                                        
                                    </ul>
                                </li>
                                
                            </ul>
                        </li>

                        <!-- slider -->
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Slider</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('slider.index')); ?>">Danh sách</a></li>
                                <li><a href="<?php echo e(route('slider.add')); ?>">Thêm</a></li>
                                
                            </ul>
                        </li>

                         <!-- brand -->
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Brands</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('brand.index')); ?>">Danh sách</a></li>
                                <li><a href="<?php echo e(route('brand.create')); ?>">Thêm</a></li>
                                
                            </ul>
                        </li>

                        <!-- product -->
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Sản phẩm</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('product.index')); ?>">Danh sách</a></li>
                                <li><a href="<?php echo e(route('product.add')); ?>">Thêm</a></li>
                                
                            </ul>
                        </li>

                        <!-- order -->
                        <?php
                                $orders = DB::table('orders') -> where('order_status','pending') -> get();
                            ?>
                        <li> 
                            <a href=" <?php echo e(route('order.index')); ?> " ><i class="ti-align-left"></i>
                            <span class="hide-menu">Đơn hàng</span>
                            <?php if($orders -> count() > 0): ?>
                            <span class="badge badge-success"><?php echo e($orders -> count()); ?></span>
                            <?php endif; ?>
                            </a>
                        </li>
                        <!-- reviews -->
                        <li> 
                            <a href=" <?php echo e(route('review.index')); ?> " ><i class="ti-align-left"></i>
                            <span class="hide-menu">Review</span>
                            </a>
                        </li>

                        <!-- coupon -->
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Coupon</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('coupon.index')); ?>">Danh sách</a></li>
                                <li><a href="<?php echo e(route('coupon.add')); ?>">Thêm</a></li>
                                
                            </ul>
                        </li>


                        <!-- users -->
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('user.index')); ?>">Danh sách</a></li>
                                <li><a href="<?php echo e(route('user.add')); ?>">Thêm</a></li>
                                
                            </ul>
                        </li>

                         <!-- roles -->
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Roles</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('role.index')); ?>">Danh sách</a></li>
                                <li><a href="<?php echo e(route('role.add')); ?>">Thêm</a></li>
                                
                            </ul>
                        </li>

                        <!-- permission -->
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Permissions</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('permission.index')); ?>">Danh sách</a></li>
                                <li><a href="<?php echo e(route('permission.add')); ?>">Thêm</a></li>
                                
                            </ul>
                        </li>

                        <!-- Permissions -->
                        <li> <a class="waves-effect waves-dark" href="<?php echo e(route('permission.add')); ?>"><i class="ti-align-left"></i>Thêm Permissions</a>
                        </li>
                     
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside><?php /**PATH C:\xampp\htdocs\storeOnline\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>
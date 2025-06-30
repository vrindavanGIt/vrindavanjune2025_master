<?php $__env->startSection('title'); ?>
    <?php echo e(__('Wishlist')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-title breadcrums">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                        <li class="separator"></li>
                        <li><?php echo e(__('Wishlist')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container userAdmin_wrap">
        <div class="row">
            <?php echo $__env->make('includes.user_sitebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-lg-8">
                <div class="card">

                    <div class="card cart__table">
                        <div class="card-body">
                            
                            <!-- Wishlist Table-->
                            <div class="pt-0 pb-0">
                                <h5>ITEMS IN YOUR CART</h5>
                                <div class="table-responsive shopping-cart">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('Wishlist Product')); ?></th>
                                                <?php if($wishlist_items->count() > 0): ?>
                                                    <th class="text-center"><a class="btn btn-sm btn-primary"
                                                            href="<?php echo e(route('user.wishlist.delete.all')); ?>"><span><?php echo e(__('Clear Wishlist')); ?></span></a>
                                                    </th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($wishlist_items->count() > 0): ?>
                                                <?php $__currentLoopData = $wishlist_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="item_cart_tr">
                                                        <td>
                                                            <div class="product-item">
                                                                <a class="product-thumb wishlist_product_thumb"
                                                                    href="<?php echo e(route('front.product', $product->slug)); ?>"><img
                                                                        src="<?php echo e(asset('assets/images/' . $product->photo)); ?>"
                                                                        alt="Product"></a>
                                                                <div class="product-info product_col_info">
                                                                    <h4 class="product-title"><a
                                                                            href="<?php echo e(route('front.product', $product->slug)); ?>"><?php echo e($product->name); ?></a>
                                                                    </h4>
                                                                    <div class="product_col">
                                                                        <div class="text-lg mb-1">
                                                                            <?php echo e(PriceHelper::grandCurrencyPrice($product)); ?>

                                                                        </div>
                                                                        <div class="text-sm"><?php echo e(__('Availability')); ?>:
                                                                            <div
                                                                                class="d-inline text-<?php echo e($product->stock == 0 ? 'danger' : 'success'); ?>">
                                                                                <?php echo e($product->stock == 0 ? __('Out of stock') : __('In Stock')); ?>

                                                                            </div>
                                                                        </div>
                                                                        <div class="cart_item_btn">
                                                                            <?php if($product->is_stock()): ?>
                                                                                <a class="product-button btn btn-primary btn-sm add_to_single_cart"
                                                                                    href="javascript:;"
                                                                                    data-target="<?php echo e($product->id); ?>"><span><?php echo e(__('Add To Cart')); ?></span>
                                                                                </a>
                                                                            <?php else: ?>
                                                                                <a class="product-button btn btn-primary btn-sm"
                                                                                    href="<?php echo e(route('front.product', $product->slug)); ?>"><i
                                                                                        class="icon-arrow-right"></i><span><?php echo e(__('Details')); ?></span></a>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="product-remove text-center"><a class="remove-from-cart"
                                                                href="<?php echo e(route('user.wishlist.delete', $product->getWishlistItemId())); ?>"
                                                                data-toggle="tooltip" title="Remove item"><i
                                                                    class="icon-x"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <tr class="text-center">
                                                    <td colspan="3"><?php echo e(__('No Product Found')); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/user/wishlist/index.blade.php ENDPATH**/ ?>
<?php
    $total = 0;
    $qty = 0;
    $option_price = 0;
?>
<?php if(Session::has('cart')): ?>
<?php $__currentLoopData = Session::get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    $total += ($cart['main_price'] + $total + $cart['attribute_price']) * $cart['qty'];
    $grandSubtotal = $total;
?>
<div class="entry">
  <div class="entry-thumb"><a href="<?php echo e(route('front.product',$cart['slug'])); ?>"><img src="<?php echo e(asset('assets/images/'.$cart['photo'])); ?>" alt="Product"></a></div>
  <div class="entry-content">
    <h4 class="entry-title"><a href="<?php echo e(route('front.product',$cart['slug'])); ?>">
        <?php echo e(strlen(strip_tags($cart['name'])) > 35 ? substr(strip_tags($cart['name']), 0, 35) . '...' : strip_tags($cart['name'])); ?>

    </a></h4>
    <span class="entry-meta"><?php echo e($cart['qty']); ?> x <?php echo e(PriceHelper::setCurrencyPrice($cart['main_price'])); ?></span>
   
 </div>
  <div class="entry-delete"><a href="<?php echo e(route('front.cart.destroy',$key)); ?>"><i class="icon-x"></i></a></div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div class="text-right">
<p class="text-gray-dark py-2 mb-0"><span class="text-muted"><?php echo e(__('Subtotal')); ?>:</span> <?php echo e(PriceHelper::setCurrencyPrice($grandSubtotal)); ?></p>
</div>
<div class="d-flex justify-content-between">
<div class="w-50 d-block"><a class="btn btn-primary btn-sm  mb-0" href="<?php echo e(route('front.cart')); ?>"><span><?php echo e(__('Cart')); ?></span></a></div>
<div class="w-50 d-block text-end"><a class="btn btn-primary btn-sm  mb-0" href="<?php echo e(route('front.checkout.billing')); ?>"><span><?php echo e(__('Checkout')); ?></span></a></div>
<?php else: ?>
<?php echo e(__('Cart empty')); ?>

  <?php endif; ?>
</div>
<?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/includes/header_cart.blade.php ENDPATH**/ ?>
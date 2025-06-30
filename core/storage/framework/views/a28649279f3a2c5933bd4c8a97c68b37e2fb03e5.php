<?php
if(request()->has('cod') && request()->get('cod') == 'true'){
 session()->put('cod','true');
} else{
    session()->put('cod','false');
}
$free_shipping = DB::table('shipping_services')->whereStatus(1)->whereid(3)->first();


?>
<h3 class="widget-title"><?php echo e(__('Order Summary  ')); ?> ₹ </h3>
<div  id="free_shipping_min_inr">

    <?php if($free_shipping): ?>
    <?php if($free_shipping->minimum_price >= $cart_total): ?>
    <p class="free-shippin-aa" ><em><?php echo e(__('Free Shipping minimum order amount')); ?> <?php echo e(PriceHelper::setCurrencyPrice($free_shipping->minimum_price)); ?><?php echo e(__(' & weight upto 500 grams')); ?></em></p>
    <?php endif; ?>
    <?php endif; ?>
</div>

<table class="table">
    <tr>
    <td><?php echo e(__('Cart Subtotal')); ?>:</td>
    <td width="75" class="text-gray-dark"><b><?php echo e(PriceHelper::setCurrencyPrice($cart_total)); ?></b></td>
    </tr>

    <?php if($tax != 0): ?>
    <tr>
    <td><?php echo e(__('Estimated tax')); ?>:</td>
    <td width="75" class="text-gray-dark"><b><?php echo e(PriceHelper::setCurrencyPrice($tax)); ?></b></td>
    </tr>
    <?php endif; ?>

    <?php if(DB::table('states')->count() > 0): ?>
    <tr class="<?php echo e(Auth::check() && Auth::user()->state_id ? '' : 'd-none'); ?> set__state_price_tr">
    <td><?php echo e(__('State tax')); ?>:</td>
    <td width="80" class="text-gray-dark set__state_price"><b><?php echo e(PriceHelper::setCurrencyPrice(Auth::check() && Auth::user()->state_id ? Auth::user()->state->price : 0)); ?></b></td>
    </tr>
    <?php endif; ?>

    <?php if($discount): ?>
    <tr>
    <td><?php echo e(__('Coupon discount')); ?>:</td>
    <td width="75" class="text-danger"><b>- <?php echo e(PriceHelper::setCurrencyPrice($discount ? $discount['discount'] : 0)); ?></b></td>
    </tr>
    <?php endif; ?>
    
    <?php if($shipping): ?>
    <tr>
    <td><?php echo e(__('Shipping')); ?>:</td>
    <td width="75" class="text-gray-dark"><b><?php echo e(PriceHelper::setCurrencyPrice($shipping ? $shipping->price : 0)); ?></b></td>
    </tr>
    <?php endif; ?>
    <tr>
        <td></td>
        <td ></td>
    </tr>

    <tr style="border-top: 1px solid #e5e5e5;    padding-top: 12px;">
    <td class="text-lg text-primary"><?php echo e(__('Order total')); ?></td>
    <td width="90" class="text-lg text-primary grand_total_set" id="cart_total" ><b><?php echo e(PriceHelper::setCurrencyPrice($grand_total)); ?></b></td>
    </tr>
    <?php if(Session::get('cod') == 'true'): ?>
    <tr>
        <td class="text-lg text-primary"><?php echo e(__('Partial Advance for (COD Shipping + 10% of Cart Total')); ?></td>
        <td width="75" class="text-lg text-primary grand_total_set"><b> <?php echo e(PriceHelper::setCurrencyPrice(PriceHelper::codCharge($cart_total))); ?></b></td>
     </tr>
     <?php endif; ?>

</table><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/includes/billing_info_in_inr.blade.php ENDPATH**/ ?>
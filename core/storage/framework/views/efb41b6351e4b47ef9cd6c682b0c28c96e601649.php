<?php

$cart_session= Session::get('cart');

$bill = Session::get('billing_address');


$paypal_currency = DB::table('currencies')->whereid(2)->first();

if(isset($billing_country) || (Session::has('billing_address') && $bill['bill_country'] != "India")){

        if(!isset($billing_country) && array_key_exists('bill_country',$bill) && $bill['bill_country'] != "India"){
            $billing_country = $bill['bill_country'];
        }

        if($billing_country != "India"){

            $country = DB::table('countries')->where('name',$billing_country)->first();



            $paypal_shipping = DB::table('country_shipping_fees')->where('country_id',$country->id)->first();
            if(!empty($paypal_shipping)){
                $shipping_charge = $paypal_shipping->amount/$paypal_currency->value;

            } else{

                $paypal_shipping = DB::table('shipping_services')->whereid('2')->first();
                $shipping_charge= $paypal_shipping->price/$paypal_currency->value;
            }

        } else{
            $paypal_shipping = DB::table('shipping_services')->whereid('2')->first();
            $shipping_charge= $paypal_shipping->price/$paypal_currency->value;
        }


}else {

    $paypal_shipping = DB::table('shipping_services')->whereid('2')->first();
    $shipping_charge= $paypal_shipping->price/$paypal_currency->value;
}




// $paypal_shipping=DB::table('shipping_services')->whereid(2)->first();

// $shipping_charge= $paypal_shipping->price/$paypal_currency->value;

$cart_total=$cart_total/$paypal_currency->value;

$cart_and_shipping_total=$shipping_charge+$cart_total;

$paypal_charge= ($cart_and_shipping_total * $paypal_currency->paypal_fee)/100;

$grand_totals= $cart_and_shipping_total + $paypal_charge;

PriceHelper::paypalshippingprice($grand_totals, $cart_total);

$cart_paypal=[
    //   'name'=>$cart_session->name,
    //   'qty'=>$cart_session->qty,
    'shipping_charge'=>$shipping_charge,
    'cart_total'=>$cart_total,
    'shipping_charge'=>$shipping_charge,
    'grand_totals'=>$grand_totals,
];
Session::put('cart_paypal',$cart_paypal);
//   dd(PriceHelper::setCurrencyPrice($cart_total));
?>
    
<section class="card widget widget-featured-posts widget-order-summary p-4 billinfo_inr">
    <h3 class="widget-title"><?php echo e(__('Order Summary')); ?> <?php echo e($paypal_currency->sign); ?></h3>
    <?php
// $free_shipping = DB::table('shipping_services')->whereStatus(1)->whereId(3)->whereIsCondition(1)->first()
    ?>


        
            


    <table class="table">
    <tr>
        <td><?php echo e(__('Shipping cost')); ?>:</td>

        <td class="text-gray-dark"> $<?php echo e(round($shipping_charge, 2)); ?>  </td>
    </tr>
    <tr>
        <td><?php echo e(__('Cart Subtotal')); ?>:</td>

        <td class="text-gray-dark"> $<?php echo e(round($cart_total, 2)); ?> </td>


    </tr>
    <tr>
        <td><?php echo e(__('Paypal charge')); ?>:</td>

        <td class="text-gray-dark"> $<?php echo e(round($paypal_charge, 2)); ?> </td>


    </tr>


    <?php if($tax != 0): ?>
    <tr>
        <td><?php echo e(__('Estimated tax')); ?>:</td>
        <td class="text-gray-dark"><?php echo e(PriceHelper::setCurrencyPrice($tax)); ?></td>
    </tr>
    <?php endif; ?>

    <?php if(DB::table('states')->count() > 0): ?>
    <tr class="<?php echo e(Auth::check() && Auth::user()->state_id ? '' : 'd-none'); ?> set__state_price_tr">
        <td><?php echo e(__('State tax')); ?>:</td>
        <td class="text-gray-dark set__state_price"><?php echo e(PriceHelper::setCurrencyPrice(Auth::check() && Auth::user()->state_id ? Auth::user()->state->price : 0)); ?></td>
    </tr>
    <?php endif; ?>

    <?php if($discount): ?>
    <tr>
        <td><?php echo e(__('Coupon discount')); ?>:</td>
        <td class="text-danger">- <?php echo e(PriceHelper::setCurrencyPrice($discount ? $discount['discount'] : 0)); ?></td>
    </tr>
    <?php endif; ?>

    
    <tr>
        <td class="text-lg text-primary"><?php echo e(__('Order total')); ?></td>
        <td class="text-lg text-primary grand_total_set"> $<?php echo e(round($grand_totals, 2)); ?> </td>
    </tr>

    </table>
</section><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/includes/paypal_billing_info.blade.php ENDPATH**/ ?>
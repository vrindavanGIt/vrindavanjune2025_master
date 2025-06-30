<?php $__env->startSection('title'); ?>
<?php echo e(__('Invoice')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- Page Title-->
<div class="page-title breadcrums">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('user.order.index')); ?>"><?php echo e(__('Orders')); ?></a> </li>
                    <li class="separator"></li>
                    <li><?php echo e(__('Order Invoice')); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
if($order->state){
$state = json_decode($order->state,true);
}else{
$state = [];
}
?>
<!-- Page Content-->
<div class="container padding-bottom-0x mb-1 print_invoice">
    <div class="card card-body p-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex align-items-center justify-content-end">
                    <a href="<?php echo e(route('user.order.index')); ?>"
                        class="btn btn-sm btn-primary d-inline-block m-1"><span><?php echo e(__('Back')); ?></span></a>
                    <a href="<?php echo e(route('user.order.print',$order->id)); ?>" target="_blank"
                        class="btn btn-sm btn-primary invoice_price d-inline-block m-1"><span><?php echo e(__('Print')); ?></span></a>
                </div>
            </div>
        </div> <!-- / .row -->
        <div class="row">
            <div class="col text-center">

                <!-- Logo -->
                <img class="img-fluid mb-5 mh-70" alt="Logo" src="<?php echo e(asset('assets/images/'.$setting->logo)); ?>">

            </div>
        </div> <!-- / .row -->
        <div class="row">
            <div class="col-6">
                <h5><b><?php echo e(__('Order Details :')); ?></b></h5>
                <?php if(isset($order->txnid)): ?>
                <span class="text-muted"><?php echo e(__('Transaction Id : ')); ?></span><?php echo e($order->txnid); ?><br>
                <?php endif; ?>
                <span class="text-muted"><?php echo e(__('Order Id : ')); ?></span><?php echo e($order->id); ?><br>
                <span class="text-muted"><?php echo e(__('Order Date : ')); ?></span><?php echo e($order->created_at->format('M d, Y')); ?><br>
                <span class="text-muted"><?php echo e(__('Payment Status : ')); ?></span>
                <?php if($order->payment_status == 'Paid'): ?>
                <div class="badge badge-success">
                    <?php echo e(__('Paid')); ?>

                </div>
                <?php elseif($order->payment_status == 'Unpaid'): ?>
                <div class="badge badge-danger">
                    <?php echo e(__('Unpaid')); ?>

                </div>
                <?php elseif($order->payment_status == 'Partially Paid'): ?>
                <div class="badge badge-success">
                    <?php echo e(__('Partially Paid')); ?>

                </div>
                <?php else: ?>
                <div class="badge badge-danger">
                    <?php echo e(__('Unpaid')); ?>

                </div>
                <?php endif; ?>
                <br>
                <span class="text-muted"><?php echo e(__('Payment Method : ')); ?></span><?php echo e($order->payment_method); ?><br>
                <?php if(isset($order->cod_payment)): ?>

                <span class="text-muted"><?php echo e(__('Order Type : ')); ?>

                </span><?php echo e(__('Cash On Delivery')); ?><br>
                <?php endif; ?>

                <br>
                <br>
            </div>


            <div class="col-12 col-md-6">
                <h5><?php echo e(__('Billing Address :')); ?></h5>
                <?php
                $bill = json_decode($order->billing_info,true);
                // dd($bill);

                ?>

                <span class="text-muted"><?php echo e(__('Name')); ?>: </span><?php echo e($bill['bill_first_name']); ?>

                <?php echo e($bill['bill_last_name']); ?><br>

                <?php if(isset($bill['bill_address1'])): ?>
                <span class="text-muted"><?php echo e(__('Address')); ?>: </span><?php echo e($bill['bill_address1']); ?>,
                <?php echo e(isset($bill['bill_address2']) ? $bill['bill_address2'] : ''); ?><br>
                <?php endif; ?>
                <span class="text-muted"><?php echo e(__('Email')); ?>: </span><?php echo e($bill['bill_email']); ?><br>

                <span class="text-muted"><?php echo e(__('Phone')); ?>:
                </span><?php echo e($bill['phn_country_code']); ?><?php echo e($bill['bill_phone']); ?><br>
                <?php if(isset($bill['whatsapp_number'])): ?>
                <?php if(($bill['whatsapp_number']!=null) && ($bill['w_country_code']!=null)): ?>
                <span class="text-muted"><?php echo e(__('Whatsapp Number')); ?>:
                </span><?php echo e($bill['w_country_code']); ?><?php echo e($bill['whatsapp_number']); ?><br>
                <?php endif; ?>
                <?php endif; ?>

                <?php if(isset($bill['bill_country'])): ?>
                <span class="text-muted"><?php echo e(__('Country')); ?>: </span><?php echo e($bill['bill_country']); ?><br>
                <?php endif; ?>
                <?php if(isset($bill['state'])): ?>
                <span class="text-muted"><?php echo e(__('State')); ?>: </span><?php echo e($bill['state']); ?><br>
                <?php endif; ?>
                <?php if(isset($bill['bill_city'])): ?>
                <span class="text-muted"><?php echo e(__('City')); ?>: </span><?php echo e($bill['bill_city']); ?><br>
                <?php endif; ?>

                <?php if(isset($bill['bill_zip'])): ?>
                <span class="text-muted"><?php echo e(__('Zip')); ?>: </span><?php echo e($bill['bill_zip']); ?><br>
                <?php endif; ?>
                <?php if(isset($bill['bill_company'])): ?>
                <span class="text-muted"><?php echo e(__('Company')); ?>: </span><?php echo e($bill['bill_company']); ?><br>
                <?php endif; ?>


            </div>
            
        </div>
        <div class="row">
            <div class="col-12">

                <!-- Table -->
                <div class="gd-responsive-table">
                    <table class="table my-4">
                        <thead>
                            <tr>
                                <th width="50%" class="bg-transparent border-top-0">
                                    <span class="h6"><?php echo e(__('Products')); ?></span>
                                </th>
                                <th width="" class="bg-transparent border-top-0">
                                    <span class="h6"><?php echo e(__('Image')); ?></span>
                                </th>
                                <th class="bg-transparent border-top-0">
                                    <span class="h6"><?php echo e(__('Attribute')); ?></span>
                                </th>
                                <th class="bg-transparent border-top-0">
                                    <span class="h6"><?php echo e(__('Quantity')); ?></span>
                                </th>
                                <th class="bg-transparent border-top-0 text-right">
                                    <span class="h6"><?php echo e(__('Price')); ?></span>
                                </th>
                                <?php if($order->payment_method == 'Paypal'): ?>
                                <th class="bg-transparent border-top-0 text-right">
                                    <span class="h6"><?php echo e(__('Price in USD')); ?></span>
                                </th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            $grand_total= PriceHelper::OrderTotalWithoutNumberformat($order);
                            $paypalfee_INR= $grand_total*$order->paypal_fee/100;
                            $option_price = 0;
                            $total = 0;
                            ?>
                            <?php $__currentLoopData = json_decode($order->cart,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $total += $item['main_price'] * $item['qty'];
                            $option_price += $item['attribute_price'];
                            $grandSubtotal = $total + $option_price;
                            $item_id = App\Models\Item::where('slug',$item['slug'])->value('id');

                            ?>
                            <tr>
                                <td class="">
                                    <?php echo e($item['name']); ?> <?php echo e((isset($item_id) && $item_id != '')?'#'.$item_id:''); ?>

                                </td>
                                <td class=""><img src="<?php echo e(url('').'/assets/images/'.$item['photo']); ?>" alt="item"
                                        width="50" height="60">

                                <td class="">
                                    <?php if($item['attribute']['option_name']): ?>
                                    <?php $__currentLoopData = $item['attribute']['option_name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionkey => $option_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="entry-meta"><b><?php echo e($option_name); ?></b> :
                                        <?php if($setting->currency_direction == 1): ?>
                                        <?php echo e($order->currency_sign); ?><?php echo e(round($item['attribute']['option_price'][$optionkey]*$order->currency_value,2)); ?>

                                        <?php else: ?>
                                        <?php echo e(round($item['attribute']['option_price'][$optionkey]*$order->currency_value,2)); ?><?php echo e($order->currency_sign); ?>

                                        <?php endif; ?>

                                    </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    --
                                    <?php endif; ?>
                                </td>
                                <td class="">
                                    <?php echo e($item['qty']); ?>

                                </td>

                                <td class="text-right">
                                    <?php if($setting->currency_direction == 1): ?>
                                    <?php echo e($order->currency_sign); ?><?php echo e(round($item['main_price']*$order->currency_value,2)); ?>

                                    <?php else: ?>
                                    <?php echo e(round($item['main_price']*$order->currency_value,2)); ?><?php echo e($order->currency_sign); ?>

                                    <?php endif; ?>
                                </td>
                                <?php if($order->payment_method == 'Paypal'): ?>
                                <td class="text-right">
                                    <span class="text-muted">$<?php echo e(round($item['main_price'] / $order->usd_rate, 2)); ?>


                                    </span>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="padding-top-2x" colspan="5">
                                </td>
                            </tr>
                            <?php if($order->tax!=0): ?>
                            <tr>
                                <td class="border-top border-top-2">
                                    <span class="text-muted"><?php echo e(__('Tax')); ?></span>
                                </td>
                                <td class="text-right border-top border-top-2" colspan="5">
                                    <span>
                                        <?php if($setting->currency_direction == 1): ?>
                                        <?php echo e($order->currency_sign); ?><?php echo e(round($order->tax*$order->currency_value,2)); ?>

                                        <?php else: ?>
                                        <?php echo e(round($order->tax*$order->currency_value,2)); ?><?php echo e($order->currency_sign); ?>

                                        <?php endif; ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if(json_decode($order->discount,true)): ?>
                            <?php
                            $discount = json_decode($order->discount,true);
                            ?>
                            <tr>
                                <td class="border-top border-top-2">
                                    <span class="text-muted"><?php echo e(__('Coupon discount')); ?>

                                        (<?php echo e($discount['code']['code_name']); ?>)</span>
                                </td>
                                <td class="text-right border-top border-top-2" colspan="5">
                                    <span class="text-danger">
                                        <?php if($setting->currency_direction == 1): ?>
                                        -<?php echo e($order->currency_sign); ?><?php echo e(round($discount['discount'] *
                                        $order->currency_value,2)); ?>

                                        <?php else: ?>
                                        -<?php echo e(round($discount['discount'] *
                                        $order->currency_value,2)); ?><?php echo e($order->currency_sign); ?>

                                        <?php endif; ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if(json_decode($order->shipping,true)): ?>
                            <?php
                            $shipping = json_decode($order->shipping,true);
                            ?>
                            <tr>
                                <td class="border-top border-top-2" colspan="4">
                                    <span class="text-muted"><?php echo e(__('Shipping')); ?></span>
                                </td>
                                <td class="text-right border-top border-top-2">
                                    <span>
                                        <?php if($setting->currency_direction == 1): ?>
                                        <?php echo e($order->currency_sign); ?><?php echo e(round($shipping['price']*$order->currency_value,2)); ?>

                                        <?php else: ?>
                                        <?php echo e(round($shipping['price']*$order->currency_value,2)); ?><?php echo e($order->currency_sign); ?>

                                        <?php endif; ?>

                                    </span>
                                </td>
                                <?php if($order->payment_method == 'Paypal'): ?>
                                <td class="border-top border-top-2 text-right">
                                    <span class="text-muted">$<?php echo e(round($shipping['price'] / $order->usd_rate, 2)); ?></span>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php if(isset($order->cod_payment)): ?>
                            <tr>
                                <td class="border-top border-top-2" colspan="3">
                                    <span class="text-muted"> <?php echo e(__('Total Amount')); ?></span>
                                </td>
                                <td class="text-right border-top border-top-2">
                                    <span class="text-muted">
                                        <?php if($setting->currency_direction == 1): ?>
                                        <?php echo e($order->currency_sign); ?><?php echo e(PriceHelper::OrderTotal($order)); ?>

                                        <?php else: ?>
                                        <?php echo e(PriceHelper::OrderTotal($order)); ?><?php echo e($order->currency_sign); ?>

                                        <?php endif; ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if(isset($order->cod_payment)): ?>
                            <tr>
                                <td class="border-top border-top-2" colspan="3">
                                    <span class="text-muted"><?php echo e(__('Partially Advance Payment')); ?></span>
                                </td>
                                <td class="text-right border-top border-top-2" colspan="3">
                                    <span class="text-muted">₹<?php echo e(round($order->cod_payment, 2)); ?></span>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if($order->payment_method == 'Paypal'): ?>
                            <tr>
                                <td class="border-top border-top-2" colspan="4">
                                    Paypal Charge
                                </td>
                                <td class="text-right border-top border-top-2">
                                    
                                    <span
                                        class="text-muted"><?php echo e($order->currency_sign); ?><?php echo e(round($grand_total*$order->paypal_fee/100,2)); ?></span>
                                </td>
                                <td class="border-top border-top-2 text-right">
                                    <span class="text-muted">$<?php echo e(round(($grand_total*$order->paypal_fee/100)/$order->usd_rate,2)); ?></span>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if(json_decode($order->state_price,true)): ?>
                            <tr>
                                <td class="border-top border-top-2">
                                    <span class="text-muted"><?php echo e(__('State Tax')); ?></span>
                                </td>
                                <td class="text-right border-top border-top-2" colspan="5">
                                    <span>
                                        <?php if($setting->currency_direction == 1): ?>
                                        <?php echo e(isset($state['type']) && $state['type'] == 'percentage' ? '
                                        ('.$state['price'].'%) ' : ''); ?>

                                        <?php echo e($order->currency_sign); ?><?php echo e(round($order['state_price']*$order->currency_value,2)); ?>

                                        <?php else: ?>
                                        <?php echo e(isset($state['type']) && $state['type'] == 'percentage' ? '
                                        ('.$state['price'].'%) ' : ''); ?>

                                        <?php echo e(round($shipping['state_price']*$order->currency_value,2)); ?><?php echo e($order->currency_sign); ?>

                                        <?php endif; ?>

                                    </span>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if(!isset($order->cod_payment)): ?>

                            <tr>
                                <td class="border-top border-top-2" colspan="4">

                                    <?php if($order->payment_method == 'Cash On Delivery'): ?>
                                    <strong><?php echo e(__('Total Amount')); ?></strong>
                                    <?php else: ?>
                                    <strong><?php echo e(__('Total Amount Due')); ?></strong>
                                    <?php endif; ?>
                                </td>
                                <?php if(!$order->payment_method == 'Paypal'): ?>
                                <td class="text-right border-top border-top-2">
                                    <span class="h3">
                                        <?php if($setting->currency_direction == 1): ?>
                                        <?php echo e($order->currency_sign); ?><?php echo e(PriceHelper::OrderTotal($order)); ?>

                                        <?php else: ?>
                                        <?php echo e(PriceHelper::OrderTotal($order)); ?><?php echo e($order->currency_sign); ?>

                                        <?php endif; ?>
                                    </span>
                                </td>
                                <?php else: ?>
                                <td class="text-right border-top border-top-2">
                                    <span class="h3">
                                        <?php $price=$grand_total+$paypalfee_INR ?>
                                        
                                        <?php echo e($order->currency_sign); ?><?php echo e(PriceHelper::testPrice($price)); ?>

                                    </span>
                                </td>

                                <?php endif; ?>
                                <?php if($order->payment_method == 'Paypal'): ?>
                                <td class="border-top border-top-2 text-right">
                                    <span class="h3">$<?php echo e((round(($grand_total+$paypalfee_INR)/$order->usd_rate,2))); ?></span>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php else: ?>
                            <tr>
                                <td class="border-top border-top-2" colspan="3">
                                    <strong><?php echo e(__('Total Amount Due')); ?></strong>
                                </td>
                                <td class="text-right border-top border-top-2" colspan="3">
                                    <span class="h3">
                                        <?php
                                        $price=$grand_total+$paypalfee_INR;
                                        // dd($price);
                                        $price=$price-$order->cod_payment;
                                        ?>
                                        
                                        <?php echo e($order->currency_sign); ?><?php echo e(PriceHelper::testPrice($price)); ?>

                                    </span>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- / .row -->
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/user/order/invoice.blade.php ENDPATH**/ ?>
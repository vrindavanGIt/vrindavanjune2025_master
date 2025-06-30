<!DOCTYPE html>
<html lang="en">

<head>
    <title>Original Tulsimala</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style media="screen"></style>
    <style>
        .section_temp {
            width: 65%;
            margin: auto;
        }
        .section__table {
            border: 2px solid #5c4033;
        }
        .tulislogo img {
            height: 115px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 17px;
            margin-bottom: 25px;
        }

        .modal-header-info {
            color: #fff;
            padding: 10px 15px;
            border-bottom: 1px solid #eee;
            background-color: #5C4033;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            text-align: center;
        }
        .modal-header-info h4 {
            color: #fff;
            font-size: 16px;
            margin: 0;
        }
        .modal-header-info h4 a {
            color: #fff;
            margin: 0 10px 0 0;
        }
        .modal-header-info h4 .link {
            margin: 0px;
            text-decoration: underline;
        }
        .success-inner {
            padding: 15px 0;
            background-color: white;
            text-align: center;
        }
        .success-inner h3 {
            margin: 0px;
        }

        .success-inner h2 li {
            color: #FC4E03;
            list-style: none;
            text-decoration: none;
        }

        .success-inner h2 li a {
            color: #FC4E03;
        }
        .top-container table th:first-child {
            width: 250px;
        }
        table th {
            border: 1px solid #e6e6e6;
            width: 100px;
            background-color: #eeeeee;
            padding: 12px 15px;
        }
        table td {
            border: 1px solid #e6e6e6;
            width: 100px;
            background-color: #eeeeee38;
            padding: 12px 15px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .WorldwideCon .single-service.homeAboutWrapper {
            /* display: flex; */
            /* flex-wrap: wrap; */
            padding-bottom: 0px;
        }

        .WorldwideCon {
            display: inline-block;
            width: 100%;
            vertical-align: top;
        }

        tr.info-container {
            /* font-size: 16px; */
            /* color: rgb(68, 48, 40) !important; */
            /* background: #F8FFEE !important; */
            /* padding: 20px 39px; */
            word-break: break-word;
            /* border: 1px solid #256125; */
            /* text-align: justify; */
        }

        .WorldwideCon .single-service ul {
            list-style: none;
            margin: 0px;
            padding: 0px;
        }
        .WorldwideCon .single-service ul li {
                margin: 0 0 5px;
        }
            .WorldwideCon .single-service ul p {
            margin: 0 0 0;
        }

        .WorldwideCon .single-service .email-head-num li {
            color: #fc4e03;
            text-decoration: underline;
        }

        .WorldwideCon .single-service .email-heading li {
            color: #3d34eb;
        }

        .billing-add {
            float: left;
            width: 50%;
        }

        .bottom-container {
            margin: 0x 0px 0px 0px;
        }
        a:link {
            color:#eee;
            background-color: transparent;
            text-decoration: none;
        }

        @media  screen and (max-width: 576px) {
            .section_temp {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="section_temp">
    <div class="container">
        
        <div class="tulislogo">
            <img height="115px" style="display: block;  margin-left: auto; margin-right: auto;"   src="<?php echo e(asset('assets/images/' . $logo)); ?>" alt="logo"></a>

        </div>

        <div class="section__table" >
        <div class="modal show" id="modalCompose">
            <div class="modal-dialog">
                <div class="modal-header modal-header-info">
                    
                   <h4>  <a href="<?php echo e(url('user/order/invoice/'.$emailData['Order_id'])); ?>">[Order
                        #<?php echo e($emailData['Order_id']); ?>]</a><span>(<?php echo e(date('F d,
                        Y',strtotime($order_details['created_at']))); ?>)</span>
                        <a class="link" href="https://vrindavantulsimala.com/">www.vrindavantulsimala.com</a>

                    </h4>
                </div>
            </div>
        </div>

        <div class="top-container">
            <div class="success-inner">
                <h3><span>Thank you for shopping with VrindavanTulsiMala!</span></h3>
                
            </div>
            <table>
                <tr style="">

                    <th style="width: 250px;">Product</th>
                    <th>Quantity</th>
                    <th>Price(INR)</th>
                    <?php if($billing_info['bill_country'] != 'India'): ?>
                    <th>Price(USD)</th>
                    <?php endif; ?>
                </tr>
                <?php
                $option_price = 0;
                $total = 0;
                ?>
                <?php $__currentLoopData = $cart_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $total += $item['main_price'] * $item['qty'];
                $option_price += $item['attribute_price'];
                $grandSubtotal = $total + $option_price;
                $setting = App\Models\Setting::first();


                ?>
                <tr>
                    <td class="right-padding" style="padding-left: 15px;"><?php echo e($item['name']); ?></td>
                    <td style="text-align: center"><?php echo e($item['qty']); ?></td>
                    <td style="text-align: center">
                        <?php if($setting->currency_direction == 1): ?>
                        &#8377; <?php echo e(round($item['main_price']*$order_details['currency_value'],2)); ?>

                        <?php else: ?>
                        &#8377; <?php echo e(round($item['main_price']*$order_details['currency_value'],2)); ?>

                        <?php endif; ?>
                    </td>
                    
                    <?php if($billing_info['bill_country'] != 'India'): ?>
                    <td style="text-align: center">$<?php echo e(round(($item['main_price']/$order_details['usd_rate']),2)); ?></td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <tr>
                    <td colspan="2" style="padding-left: 15px;">Shipping Cost</td>
                    <?php
                    $shipping = json_decode($order_details['shipping'],true);
                    ?>
                    <?php if($shipping != null && is_array($shipping) && isset($shipping['price'])): ?>
                    <td style="text-align: center;font-size: 15px;"><b> &#8377; <?php echo e(round($shipping['price']*$order_details['currency_value'],2)); ?></b>
                    </td>
                    <?php else: ?>
                    <td style="text-align: center;font-size: 15px;"><b> &#8377; 0</b></td>
                    <?php endif; ?>
                    <?php if($billing_info['bill_country'] != 'India'): ?>
                    <td style="text-align: center;font-size: 15px;"><b>$<?php echo e(round(($shipping['price']/$order_details['usd_rate']),2)); ?></b></td>
                    <?php endif; ?>
                </tr>
                <?php if($billing_info['bill_country'] != 'India'): ?>
        <tr>
            <?php //dd($order_details); ?>
            <td colspan="2" style="padding-left: 15px;">Paypal Fee</td>
            <td style="text-align: center">&#8377; <?php echo e(round((PriceHelper::OrderTotalWithoutNumberformat($order_details)*$order_details['paypal_fee']/100),2)); ?></td>
            <?php if($billing_info['bill_country'] != 'India'): ?>
            <td style="text-align: center">$<?php echo e(round(((PriceHelper::OrderTotalWithoutNumberformat($order_details)*$order_details['paypal_fee']/100)/$order_details['usd_rate']) ,2)); ?></td>
            <?php endif; ?>
        </tr>
        <?php endif; ?>
            <?php
            $grand_total_paypal=PriceHelper::OrderTotalWithoutNumberformat($order_details) + (PriceHelper::OrderTotalWithoutNumberformat($order_details)*$order_details['paypal_fee']/100 ? PriceHelper::OrderTotalWithoutNumberformat($order_details)*$order_details['paypal_fee']/100 : 0);
            // dd(PriceHelper::OrderTotalWithoutNumberformat($order_details)*$order_details['paypal_fee']/100 ? PriceHelper::OrderTotalWithoutNumberformat($order_details)*$order_details['paypal_fee']/100 : 0);
            // dd($billing_info);
            ?>
                <tr>
                    <td colspan="2" style="padding-left: 15px;">Total Amount</td>
                    <td style="text-align: center;font-size: 15px;"><b>&#8377; <?php echo e(round($grand_total_paypal,2)); ?></b></td>
                    <?php if($billing_info['bill_country'] != 'India'): ?>
                    <td style="text-align: center;font-size: 15px;"><b>$<?php echo e(round(($grand_total_paypal/$order_details['usd_rate']),2)); ?></b></td>
                    <?php endif; ?>
                </tr>
                <?php if($order_details['payment_status']=='Partially Paid' && (isset($order_details['cod_payment'])) ): ?>
                <tr>
                    <td colspan="2" style="padding-left: 15px;">Partially Advance Payment</td>
                    <td style="text-align: center;font-size: 15px;"><b> <?php echo e($order_details->currency_sign); ?><?php echo e(PriceHelper::testPrice($order_details['cod_payment'])); ?></b></td>

                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 15px;">Total Amount Due</td>
                    <?php if($order_details['payment_status']=='Partially Paid' && (isset($order_details['cod_payment'])) ): ?>
                    <td style="text-align: center;font-size: 15px;"><b> <?php echo e($order_details->currency_sign); ?><?php echo e(PriceHelper::testPrice($grand_total_paypal - $order_details['cod_payment'])); ?> </b></td>
                    <?php else: ?>
                    <td style="text-align: center;font-size: 15px;"><b> <?php echo e($order_details->currency_sign); ?><?php echo e(PriceHelper::testPrice($grand_total_paypal)); ?> </b> </td>
                    <?php endif; ?>

                </tr>
                <tr>
                    <td colspan="1" style="padding-left: 15px;">Order Type </td>
                    <td style="text-align: center; font-size: 15px;" colspan="2"><b> <?php echo e(__('Cash On Delivery')); ?></b></td>

                </tr>
                <?php endif; ?>
                
                <tr>
                    <td colspan="2" style="padding-left: 15px;">Payment Method</td>

                    <?php if($order_details['isImage']): ?>
                    <td style="text-align: center" colspan="1"><img style="width: 100px;" class="" src="<?php echo e(asset('assets/images/'.$order_details['image'])); ?>?<?php echo e(strtotime(now())); ?>"></td>
                    <?php else: ?>
                    <td style="text-align: center" colspan="2"><?php echo e($order_details['payment_method']); ?></td>
                    <?php endif; ?>

                </tr>
            </table>
        </div>

        <div class="bottom-container">
            <div class="success-inner">
                <h3 class="shipping"><span>Shipping And Contact Information</span></h3>
            </div>
            
            <table>
                <tr class="table-heading">
                    <th>
                        Billing Information
                    </th>
                    <th>
                        Support Details
                    </th>

                </tr>
                
                <tr class="info-container">
                    <td>
                        <section class="selected-product-section theme2" style="margin-bottom:0px;">

                            <div class="container">
                                <div class="WorldwideCon">
                                    <div class="single-service single-service2 homeAboutWrapper">
                                        <ul>
                                            <li class="homeAboutWrapper"><?php echo e($billing_info['bill_first_name']); ?>

                                                <?php echo e($billing_info['bill_last_name']); ?></li>
                                            <li class="homeAboutWrapper"><?php echo e($billing_info['bill_address1']); ?></li>
                                            <?php if(isset($billing_info['bill_address2'])): ?>
                                            <li class="homeAboutWrapper"><?php echo e($billing_info['bill_address2']); ?></li>
                                            <?php endif; ?>
                                            <li class="homeAboutWrapper">
                                                <?php echo e($billing_info['bill_city']); ?>,<?php echo e($billing_info['bill_country']); ?></li>
                                            <?php if(isset($billing_info['state'])): ?>
                                            <li class="homeAboutWrapper"><?php echo e($billing_info['state']); ?></li>
                                            <?php endif; ?>

                                            <li class="homeAboutWrapper"><?php echo e($billing_info['bill_zip']); ?></li>
                                            <div class="email-head-num">
                                                <li><?php echo e($billing_info['phn_country_code']); ?><?php echo e($billing_info['bill_phone']); ?></li>
                                            </div>
                                            <div class="email-heading">
                                                <li><?php echo e($billing_info['bill_email']); ?></li>
                                            </div>

                                            <?php if($billing_info['description']!=null): ?>
                                            <p>
                                                <?php echo e($billing_info['description']); ?>

                                            </p>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </td>
                    <td>
                        <section class="selected-product-section theme2" style="margin-bottom:0px;">

                            <div class="container">
                                <div class="WorldwideCon">
                                    <div class="single-service single-service2 homeAboutWrapper">
                                        <section class="widget">

                                            <ul class="list-icon margin-bottom-1x" style="list-style-type:none;">
                                                <li> <img class="fb_img" style="width: 19px; height: 19px;" src="<?php echo e(asset('assets/images/phone_icon_email.png')); ?>?<?php echo e(strtotime(now())); ?>" alt="" width="20px"><?php echo e($setting->footer_phone); ?></li>
                                                <li>  <img class="fb_img" style="width: 20px; height: 21px;" src="<?php echo e(asset('assets/images/whatsaap_icone_for_email.png')); ?>?<?php echo e(strtotime(now())); ?>" alt="" width="20px"><?php echo e($setting->footer_whatsapp); ?></li>
                                                <li> <img class="fb_img" style="width: 20px; height: 18px;" src="<?php echo e(asset('assets/images/emailicon.png')); ?>?<?php echo e(strtotime(now())); ?>" alt="" width="20px"> <?php echo e($setting->footer_email); ?>

                                                </li>
                                                <li> <img class="fb_img" style="width: 20px; height: 18px;" src="<?php echo e(asset('assets/images/emailicon.png')); ?>?<?php echo e(strtotime(now())); ?>" alt="" width="20px"> <?php echo e($setting->store_email_2); ?></li>

                                                
                                            </ul>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </td>

                </tr>


            </table>
        </div>
        </div>
    </div>
    </div>
</body>

</html>


<?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/order_mail_templete.blade.php ENDPATH**/ ?>
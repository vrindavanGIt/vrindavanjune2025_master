<?php $__env->startSection('title'); ?>
    <?php echo e(__('Payment')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
<div class="page-title breadcrums">
    <div class="container">
      <div class="column">
        <ul class="breadcrumbs">
          <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
          <li class="separator"></li>
          <li><?php echo e(__('Review your order and pay')); ?></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Page Content-->
  <div class="container pt-0 pb-4 mb-0 mt-0  checkut-page">
    <div class="row">
      <!-- Payment Methode-->
      <div class="col-xl-9 col-lg-8">
        <div class="steps flex-sm-nowrap mb-4 billing__step"> <a class="step" href="<?php echo e(route('front.checkout.billing')); ?>">
          <h4 class="step-title"><i class="icon-check-circle"></i>1. <?php echo e(__('Invoice to')); ?>:</h4>
          </a> <a style="display: none" class="step" href="<?php echo e(route('front.checkout.shipping')); ?>">
          <h4 class="step-title" style="display: none"><i class="icon-check-circle"></i>2. <?php echo e(__('Ship to')); ?>:</h4>
          </a> <a class="step active" href="<?php echo e(route('front.checkout.payment')); ?>">
          <h4 class="step-title">2. <?php echo e(__('Review and pay')); ?></h4>
          </a>
        </div>
        <div class="card billing__card">
            <div class="card-body">
                

        <div class="row mb-4">
          <div class="col-sm-12">
            <div class="bill__userDetail">
              <h6><?php echo e(__('Billing Details')); ?> </h6>
              <?php
                  $ship = Session::get('shipping_address');
                  $bill = Session::get('billing_address');

                  if(!isset($cod)){
                    $cod='false';
                    session::put('cod', 'false');
                       }
                       Log::info(session::get('cod'));
                       Log::info(url()->previous());

              ?>
              <ul class="list-unstyled">
                <li><span class="text-muted"><?php echo e(__('Name')); ?>:- </span><?php echo e($bill['bill_first_name']); ?> <?php echo e($bill['bill_last_name']); ?></li>
                <?php if(PriceHelper::CheckDigital()): ?>
                <li><span class="text-muted"><?php echo e(__('Address')); ?>:- </span><?php echo e($bill['bill_address1']); ?> <?php echo e($bill['bill_address2']); ?></li>
                <?php endif; ?>
                <li><span class="text-muted"><?php echo e(__('Email')); ?>:- </span><?php echo e($bill['bill_email']); ?></li>
                <li><span class="text-muted"><?php echo e(__('Phone')); ?>:- </span><?php echo e($bill['phn_country_code']); ?><?php echo e($bill['bill_phone']); ?></li>
                
                <?php if(isset($bill['whatsapp_number']) && !empty($bill['whatsapp_number'])): ?>
                    <li><span class="text-muted"><?php echo e(__('Whatsapp Number')); ?>:- </span><?php echo e($bill['w_country_code']); ?><?php echo e($bill['whatsapp_number']); ?> </li>
                <?php endif; ?>
                <li><span class="text-muted"><?php echo e(__('Country')); ?>:- </span><?php echo e($bill['bill_country']); ?> </li>
                <?php if(isset($bill['state']) && $bill['bill_country'] == 'India'): ?>
                    <li><span class="text-muted"><?php echo e(__('State')); ?>:- </span><?php echo e($bill['state']); ?> </li>
                <?php endif; ?>
                <li><span class="text-muted"><?php echo e(__('City')); ?>:- </span><?php echo e($bill['bill_city']); ?> </li>
                <li><span class="text-muted"><?php echo e(__('ZIP Code')); ?>:- </span><?php echo e($bill['bill_zip']); ?> </li>
              </ul>
            </div>
          </div>
          <?php

       ?>
          


        </div>


        <div class="row">
          <div class="col-12">

            <h6 class="pay__title"><?php echo e(__('Payment with')); ?> </h6>
            <div class="payment-methods">
              <?php
                  $gateways = DB::table('payment_settings')->whereStatus(1)->get();
              ?>
              <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
              <?php if($cod=='false' ): ?>
              <?php echo e(session::put('cod','false')); ?>




                <?php if($bill['bill_country']!='India'): ?>
                    <?php if($gateway->unique_keyword=='paypal'): ?>

                    <div class="single-payment-method">
                        <a class="text-decoration-none" href="#" data-bs-toggle="modal" id=<?php echo e($gateway->unique_keyword == 'payu'?'payu_open':'null'); ?> data-bs-target="#<?php echo e($gateway->unique_keyword); ?>">
                            <img class="" src="<?php echo e(asset('assets/images/'.$gateway->photo)); ?>" alt="<?php echo e($gateway->name); ?>" title="<?php echo e($gateway->name); ?>">
                            
                        </a>
                    </div>
                    <?php endif; ?>

                    

                    
                        

                <?php else: ?>
                    <?php if($gateway->unique_keyword != 'paypal'): ?>
                    <div class="single-payment-method">
                        <a class="text-decoration-none" href="#" data-bs-toggle="modal" id=<?php echo e($gateway->unique_keyword == 'payu'?'payu_open':'null'); ?> data-bs-target="#<?php echo e($gateway->unique_keyword); ?>">
                            <img class="" src="<?php echo e(asset('assets/images/'.$gateway->photo)); ?>" alt="<?php echo e($gateway->name); ?>" title="<?php echo e($gateway->name); ?>">
                            
                        </a>
                    </div>

                  <?php endif; ?>

                <?php endif; ?>
            <?php else: ?>

                <?php if($cod==true && $gateway->unique_keyword != 'cod' &&$gateway->unique_keyword != 'paypal' ): ?>
                        <div class="single-payment-method">
                            <a class="text-decoration-none" href="#" data-bs-toggle="modal" id=<?php echo e($gateway->unique_keyword == 'payu'?'payu_open':'null'); ?> data-bs-target="#<?php echo e($gateway->unique_keyword); ?>">
                                <img class="" src="<?php echo e(asset('assets/images/'.$gateway->photo)); ?>" alt="<?php echo e($gateway->name); ?>" title="<?php echo e($gateway->name); ?>">
                                
                            </a>
                        </div>

                <?php endif; ?>
           <?php endif; ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </div>
          </div>
        </div>

        </div>
        </div>

        <?php echo $__env->make('includes.checkout_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      </div>
      <?php echo $__env->make('includes.checkout_sitebar',$cart, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php
          Log::info(url()->previous());
        // use

        ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>

      $(document).ready(function(){

        //   console.log(<?php echo e(session::get('cod')); ?>);

          if( "<?php echo e($bill['bill_country']); ?>" == 'India'){
              // console.log('afaf');
              $("#USDCHECK").hide();
            }
        });
        // console.log(<?php echo e(session::get('cod')); ?>);
        $(document).ready(function(){
            let data=window.performance.getEntriesByType("navigation")[0].type;
            // console.log(data);
            if(data !='reload'){
                if((window.location.href == 'https://beta.originaltulsimala.com/checkout/review/payment')  || (window.location.href == 'http://localhost/originaltulsi_laravel/checkout/review/payment') || (window.location.href =='https://originaltulsimala.com/checkout/review/payment') || (window.location.href =='https://vrindavantulsimala.com/checkout/billing/address') ||  (window.location.href =='http://vrindavantulsimala.com/checkout/billing/address')){
                    window.location.reload();


                }
            }
            if(data=='back_forward'){
                if((window.location.href == 'http://localhost/originaltulsi_laravel/checkout/review/payment?cod=true')  || (window.location.href == 'https://beta.originaltulsimala.com/checkout/review/payment?cod=true') || (window.location.href == 'https://originaltulsimala.com/checkout/review/payment?cod=true')|| (window.location.href =='https://vrindavantulsimala.com/checkout/billing/address') ||  (window.location.href =='http://vrindavantulsimala.com/checkout/billing/address')) {
                    window.location.href = "<?php echo e(route('front.checkout.payment')); ?>";
                }
            }
        });


  </script>

  <script>
    $(document).ready(function(){
        // console.log($('#cart_total').text());
     function visitor_info($type){

        $.getJSON("https://api.ipify.org/?format=json", function(e) {



                $.ajax({

                url : "<?php echo e(route('front.activity.log')); ?>",
                type : 'POST',
                dataType : 'json',
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",

                    'ip':e.ip,
                    'type':$type,
                    'cart_total':$('#cart_total').text(),

                        },
                success:function(data){
                var response=data;
                console.log(response);
                // console.log(response);


                },

                });

                });
            }
        visitor_info(4);
        });
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/checkout/payment.blade.php ENDPATH**/ ?>
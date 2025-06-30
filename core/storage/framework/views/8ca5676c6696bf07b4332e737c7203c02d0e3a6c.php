<?php $__env->startSection('title'); ?>
    <?php echo e(__('Billing')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
<div class="page-title breadcrums">
    <div class="container">
      <div class="column">
        <ul class="breadcrumbs">
          <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
          <li class="separator"></li>
          <li><?php echo e(__('Billing address')); ?></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Page Content-->
  <div class="container pt-0 pb-4 mt-0 checkut-page">

    <div class="row">
      <!-- Billing Adress-->
      <div class="col-xl-9 col-lg-8">
        <div class="steps flex-sm-nowrap mb-4 billing__step">
          <span class="step active" href="javascript::void();">
          <h4 class="step-title">1. <?php echo e(__('Billing Address')); ?>:</h4>
          </span>
          
          <a class="step" href="javascript:;" style="display: none" >
          <h4 class="step-title" style="display: none" >2. <?php echo e(__('Shipping Address')); ?>:</h4>
          </a>
          <span class="step" href="javascript::void();">
            <h4 class="step-title">2. <?php echo e(__('Review and Pay')); ?></h4>
          </span>
          
        </div>
        <div class="card address__card">
            <div class="card-body">
                <h6><?php echo e(__('Billing Details')); ?></h6>

                <form id="checkoutBilling" action="<?php echo e(route('front.checkout.store')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="checkout-fn"><?php echo e(__('First Name')); ?><sup>*</sup></label>
                            <input class="form-control" name="bill_first_name" type="text"  id="checkout-fn" value="<?php echo e(isset($user) ? $user->first_name : ''); ?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="checkout-ln"><?php echo e(__('Last Name')); ?><sup>*</sup></label>
                            <input class="form-control" name="bill_last_name" type="text" required id="checkout-ln" value="<?php echo e(isset($user) ? $user->last_name : ''); ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="checkout_email_billing"><?php echo e(__('E-mail Address')); ?><sup>*</sup></label>
                            <input class="form-control" name="bill_email"  type="email" required id="checkout_email_billing" value="<?php echo e(isset($user) ? $user->email : ''); ?>">
                          </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group dropdown__form">
                            <label for="checkout-country"><?php echo e(__('Country')); ?><sup>*</sup></label>
                            <select class="form-control selectpicker" autocomplete="off" data-live-search="true" name="bill_country" id="billing_country" required >
                              <option id="selected_country_value" name="selected_country_value"  selected  value=""><?php echo e(__('Choose Country')); ?></option>
                              <?php $__currentLoopData = DB::table('countries')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option  value="<?php echo e($country->name); ?>" data-country-code="<?php echo e($country->country_code); ?>" ><?php echo e($country->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>

                          </div>

                        </div>

                        <div class="col-sm-6 state_section">
                            <div class="form-group dropdown__form">
                              <div class="state-dropdown"  >

                                  <label for="checkout-state"><?php echo e(__('State')); ?><sup>*</sup></label>
                                  <select class="form-control selectpicker" data-live-search="true" <?php if(isset($user) && $user->bill_country == 'India'): ?> required <?php endif; ?> name="state" id="state" >
                                  <option  value=""><?php echo e(__('Choose state')); ?></option>
                                  <?php $__currentLoopData = DB::table('state_names')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($state->name); ?>"  ><?php echo e($state->name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="checkout-address1"><?php echo e(__('Address')); ?> 1<sup>*</sup></label>
                            <input class="form-control" id="billaddress1" autocomplete="off" name="bill_address1" required type="text" id="checkout-address1" value="<?php echo e(isset($user) ? $user->bill_address1 : ''); ?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="checkout-address2"><?php echo e(__('Address')); ?> 2</label>
                            <input class="form-control" id="billaddress2" autocomplete="off" name="bill_address2" type="text" id="checkout-address2" value="<?php echo e(isset($user) ? $user->bill_address2 : ''); ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="checkout-zip"><?php echo e(__('ZIP Code')); ?><sup>*</sup></label>
                            <input class="form-control"  id="billzip" autocomplete="off" name="bill_zip" type="text" required id="checkout-zip" value="<?php echo e(isset($user) ? $user->bill_zip : ''); ?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="checkout-city"><?php echo e(__('City')); ?><sup>*</sup></label>
                            <input class="form-control" id="billcity" autocomplete="off" name="bill_city" type="text" required id="checkout-city" value="<?php echo e(isset($user) ? $user->bill_city : ''); ?>">
                          </div>
                        </div>
                      </div>

                  
                    
                    
                  

                  <?php if(PriceHelper::CheckDigital()): ?>
                  
                  
                  

                   
                    <div class="row">

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="checkout-phone"><?php echo e(__('Phone Number')); ?><sup>*</sup></label>
                            <div class="code-phone">
                                <div class="col-sm-2">
                                  <input class="form-control phone-code"  placeholder="" name="phn_country_code" type="text"  id="phn-country-code" readonly value="" >
                                </div>
                                <div class="col-sm-10 phone-field">
                                  <input class="form-control"   name="bill_phone" type="number"  id="checkout-phone" required   minlength="8" maxlength="20" value="<?php echo e(isset($user) ? $user->phone : ''); ?>">
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="checkout-phone"><?php echo e(__('Whatsapp Number')); ?></label>
                              <div class="code-phone">
                                  <div class="col-sm-2">
                                    <input class="form-control phone-code" placeholder=""  name="w_country_code" type="text"  id="w-country-code"   readonly value="">
                                  </div>
                                  <div class="col-sm-10 phone-field">
                                    <input class="form-control" name="whatsapp_number" type="number" id="whatsapp_number"   value="<?php echo e(isset($user) ? $user->phone : ''); ?>">
                                  </div>
                              </div>
                            </div>
                          </div>

                      
                      
                      
                      
                    </div>

                    <div class="col-12  ">
                      <div class="form-group">
                        <label class="description" for="message-text"><?php echo e(__('Share your requirements and concerns ')); ?></label>
                        <textarea class="form-control form-control-rounded" rows="3" name="description" id="description" placeholder="<?php echo e(__('Write a message to us about your requirements and concerns...')); ?>"></textarea>

                      </div>
                    </div>
                  <?php endif; ?>

                  <div class="form-group" style="display: none">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" checked id="same_address" name="same_ship_address" <?php echo e(Session::has('shipping_address') ? 'checked' : ''); ?> >
                      <label class="custom-control-label" for="same_address"><?php echo e(__('Same as billing address')); ?></label>
                    </div>
                  </div>

                  <?php if($setting->is_privacy_trams == 1): ?>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox address__tearm">
                      <label class="custom-control-label" for="trams__condition">I have read and agree to the website
                        <a class="text-decoration-none" href="#" data-bs-toggle="modal"  data-bs-target="#trem_condition"> Terms & Conditions *</a>

                        <input class="custom-control-input" name="tram_condition" type="checkbox" id="trams__condition" >
                        
                    </label>
                    </div>
                  </div>
                  <?php endif; ?>

                  <div class="d-flex justify-content-between paddin-top-1x mt-4">
                      <a class="btn btn-primary btn-sm" href="<?php echo e(route('front.cart')); ?>"><span class="hidden-xs-down"><?php echo e(__('Back To Cart')); ?></span><i class="icon-arrow-left"></i></a>
                      <?php if($setting->is_privacy_trams == 1): ?>
                      <button  id="continue__button" class="btn btn-primary  btn-sm" type="button"><span class="hidden-xs-down"><?php echo e(__('Continue')); ?></span><i class="icon-arrow-right"></i></button>
                      <?php else: ?>
                      <button class="btn btn-primary btn-sm" type="submit"><span class="hidden-xs-down"><?php echo e(__('Continue')); ?></span><i class="icon-arrow-right"></i></button>
                      <?php endif; ?>
                  </div>
                </form>
            </div>
        </div>
      </div>

      <?php
      $data=DB::table('countries')->get();

       ?>
      <!-- Sidebar          -->
      <?php echo $__env->make('includes.checkout_sitebar',$cart, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="modal fade" id="trem_condition" tabindex="-1"  aria-hidden="true">

        <?php
        $page=DB::table('pages')->whereslug('terms-conditions-policy')->first();
     ?>
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <?php if(isset($page)): ?>
                        <h4 class="d-block text-center"><b><?php echo e($page->title); ?></b></h4>
                        <?php endif; ?>
                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <?php if(isset($page)): ?>
                        <?php echo $page->details; ?>

                        <?php else: ?>
                        <p> <h2> some issues</h2></p>
                        <?php endif; ?>
                    </div>

                    <div class="modal-footer">
                    <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal"><span><?php echo e(__('close')); ?></span></button>
                    </div>
                </div>
            </div>

      </div>
  </div>
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('script'); ?>
  <script>




         function visitor_info($type){

            //  console.log('sdjlhsakjdf');
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

        // visitor_info(3);

  </script>
<script>

$(document).ready(function(){
    visitor_info(3)
    $val=$('#billing_country').val();
    // console.log($val);
    if($val ==  ''){
        $("#USDCHECK").hide();
        $(".state_section").hide();
    }

    $(  '.selectpicker').selectpicker();

});

 var bla = $('#billing_country').val();
//  console.log(bla);
//Set
$('#billing_country').on("change",function() {
    visitor_info(3)
    $country_name = $(this).val();
  $("#state").val("");
  $("#billaddress1").val("");
  $("#billaddress2").val("");
  $("#billcity").val("");
  $("#billzip").val("");
  if($(this).val() == ''){
    $("#phn-country-code").val("");
    $("#w-country-code").val("");
  }else{
    $c_code = $('#billing_country option[value="'+$(this).val()+'"]').attr('data-country-code');
    document.getElementById("phn-country-code").value = $c_code;
    document.getElementById("w-country-code").value = $c_code;
  }

    if($(this).val() !='India'){
        $(".state_section").hide();
        $(".state-dropdown").find("select").removeAttr('required');
    } else{
        $(".state-dropdown").find("select").attr('required','required');
        $(".state_section").show();

    }



    $.ajax({

        url:"<?php echo e(route('front.checkout.billing.change.shippingfee')); ?>",
        type:'POST',
        dataType:'json',
        async: false,
        data:{
            "_token": "<?php echo e(csrf_token()); ?>",
            "country_name" : $country_name
        },
        success:function(data){
            if($country_name != "India"){
                $('#billinfo_inr').hide();
                $('#USDCHECK').show();
                $('#USDCHECK').html(data.html);
            } else{
                $('#billinfo_inr').show();
                $('#USDCHECK').hide();
            }
            // console.log(data);
            // console.log(response);
            // $('#google_review_section').html(response);

        },
    });

    $.ajax({

        url:"<?php echo e(route('front.checkout.billing.change.shippingInr')); ?>",
        type:'POST',
        dataType:'json',
        async: false,
        data:{
            "_token": "<?php echo e(csrf_token()); ?>",
            "country_name" : $country_name
        },
        success:function(data){

        //    $('#billinfo_inr').show();
            $('#billinfo_inr').html(data.html);

        //    console.log(data);
            // console.log(response);
            // $('#google_review_section').html(response);

        },
    });

    if($(this).val() !='India'){
        $("#free_shipping_min_inr").hide();
    }else {
        $("#free_shipping_min_inr").show();
    }
    // $('#w-country-code').value($c_code);
    // $('#phn-country-code').val($c_code);
    // console.log($c_code)

  });
  </script>
<script>


    $("#checkoutBilling").validate({
      rules: {
        bill_first_name : {
          required: true,
          maxlength: 50,
        },
        bill_last_name : {
          required: true,
          maxlength: 50,
      },
      bill_email : {
        required: true,
        email: true,
      },
      bill_zip : {
        required: true,
        number: true,
      },
      bill_address1 : {
        required: true,
      },
      bill_city : {
        required: true,
      },
      bill_country : {
        required: function(){
            if($('#selected_country_value').val()== ''){
                return true
            }else{
                return false;
            }
        },
      },
      state : {
        required: true,
      },
      bill_phone : {
        required: true,
      },
      tram_condition:{
        required:function(e){
             if($(this).is(":checked")){
                return false;
             }else{
                return true;
             }

        },
      }



    },
    messages: {
      bill_first_name:{
        required:'First name field is required.'
      },
      bill_last_name:{
        required:'Last name field is required.'
      },
      bill_email:{
        required:'Email field is required.'
      },
      bill_zip:{
        required:'Zip code field is required.',
        number:'Zip code must be a number.'
      },
      bill_country:{
        required:'Country field is required.'
      },
      state:{
        required:'State field is required.'
      },
      bill_address1:{
        required:'Addres field is required.'
      },

      bill_city:{
        required:'City field is required.'
      },
      bill_phone:{
        required:'Phone Number field is required.'
      },
      tram_condition:{
        required:'Please agree terms and conditions before placing the order.'
      }


    },
    errorElement : 'span',



});
$('#trams__condition').on("click", function(){
    console.log($(this).is(":checked"));
    setTimeout(function () {
        if($(this).is(":checked")){
        $('#continue__button').attr('disabled',false);
        $('#continue__button').attr('type','submit');
        }else{
        $('#continue__button').attr('disabled',false);
        $('#continue__button').attr('type','submit');
        }
    } ,10)

});
// $('#billing_country').on('change',function(){
//    console.log(($('#billing_country').find(":selected").val()));
// })


    $(document).ready(function(){
        $('#continue__button').attr('type','submit');
      let data=window.performance.getEntriesByType("navigation")[0].type;
        //  console.log(data);


         if(data=='back_forward'){
           if((window.location.href == 'https://beta.originaltulsimala.com/checkout/billing/address')  || (window.location.href == 'http://localhost/originaltulsi_laravel/checkout/billing/address') || (window.location.href =='https://originaltulsimala.com/checkout/billing/address') || (window.location.href =='https://vrindavantulsimala.com/checkout/billing/address') ||  (window.location.href =='http://vrindavantulsimala.com/checkout/billing/address'))
            window.location.reload();
         }
    });

  </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/checkout/billing.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="page-title breadcrums">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                <li class="separator"></li>
                <li><?php echo e(__('Login/Register')); ?></li>
              </ul>
          </div>
      </div>
    </div>
  </div>
  <!-- Page Content-->
  <style>
    .form-group label sup {
    font-size: 16px;
    color: red;
    position: relative;
    top: 0;
    }
</style>

  <div class="container padding-bottom-3x mb-1">
  <div class="row">

          <div class="col-md-6">
            <?php if(session('warning')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e(session('warning')); ?>

            </div>
            <?php endif; ?>
            <form class="card" method="post" id="loginForm" action="<?php echo e(route('user.login.submit')); ?>">
                <?php echo csrf_field(); ?>
              <div class="card-body ">
                <h4 class="margin-bottom-1x text-center"><?php echo e(__('Login')); ?></h4>

                <div class="form-group input-group">
                  <input class="form-control" type="email" name="login_email" placeholder="<?php echo e(__('Email')); ?>" value="<?php echo e(old('login_email')); ?>"><span class="input-group-addon"><i class="icon-mail"></i></span>
                </div>
                <?php $__errorArgs = ['login_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <p class="text-danger"><?php echo e($message); ?></p>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="form-group input-group">
                  <input class="form-control" type="password" name="login_password" placeholder="<?php echo e(__('Password')); ?>" ><span class="input-group-addon"><i class="icon-lock"></i></span>
                </div>
                <?php $__errorArgs = ['login_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="remember_me" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    <label class="custom-control-label" for="remember_me"><?php echo e(__('Remember me')); ?></label>
                  </div><a class="navi-link" href="<?php echo e(route('user.forgot')); ?>"><?php echo e(__('Forgot password?')); ?></a>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary margin-bottom-none" type="submit"><span><?php echo e(__('Login')); ?></span></button>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt-3">
                    <?php if($setting->facebook_check == 1): ?>
                    <a class="facebook-btn mr-2" href="<?php echo e(route('social.provider','facebook')); ?>"><?php echo e(__('Facebook login')); ?>

                    </a>
                    <?php endif; ?>
                    <?php if($setting->google_check == 1): ?>
                    <a class="google-btn" href="<?php echo e(route('social.provider','google')); ?>"> <?php echo e(__('Google login')); ?>

                    </a>
                    <?php endif; ?>
                  </div>
                  </div>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <div class="card register-area address__card">
                <div class="card-body ">
                    <h4 class="margin-bottom-1x text-center"><?php echo e(__('Register')); ?></h4>
            <form class="row" action="<?php echo e(route('user.register.submit')); ?>" method="POST" id="registerForm">
                <?php echo csrf_field(); ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-fn"><?php echo e(__('First Name')); ?><sup>*</sup></label>
                  <input class="form-control" type="text" name="first_name" placeholder="<?php echo e(__('First Name')); ?>" id="reg-fn" value="<?php echo e(old('first_name')); ?>">
                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-danger"><?php echo e($message); ?></p>
                <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-ln"><?php echo e(__('Last Name')); ?><sup>*</sup></label>
                  <input class="form-control" type="text" name="last_name" placeholder="<?php echo e(__('Last Name')); ?>" id="reg-ln" value="<?php echo e(old('last_name')); ?>">
                  <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-danger"><?php echo e($message); ?></p>
                <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-email"><?php echo e(__('E-mail Address')); ?><sup>*</sup></label>
                  <input class="form-control" type="email" name="email" placeholder="<?php echo e(__('E-mail Address')); ?>" id="reg-email" value="<?php echo e(old('email')); ?>">
                  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <p class="text-danger"><?php echo e($message); ?></p>
                  <?php endif; ?>
                </div>
              </div>
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
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-phone"><?php echo e(__('Phone Number')); ?><sup>*</sup></label>
                  <div class="code-phone">
                      <div class="col-sm-2">
                        <input class="form-control phone-code"  placeholder="" name="phn_country_code" type="text"  id="phn-country-code" readonly value="" >
                      </div>
                      <div class="col-sm-10 phone-field">
                        <input  class="form-control" name="phone" type="text" placeholder="<?php echo e(__('Phone Number')); ?>" id="reg-phone" value="<?php echo e(old('phone')); ?>">
                      </div>
                  </div>
                </div>
              </div>
              

              <div class="col-sm-6">
                <div class="form-group form-group-password">
                  <label for="reg-pass"><?php echo e(__('Password')); ?><sup>*</sup></label>
                  <input class="form-control" type="password" name="password" placeholder="<?php echo e(__('Password')); ?>" id="reg-pass">
                  <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>

                  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <p class="text-danger"><?php echo e($message); ?></p>
                  <?php endif; ?>
                </div>

              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-pass-confirm"><?php echo e(__('Confirm Password')); ?><sup>*</sup></label>
                  <input class="form-control" type="password" name="password_confirmation" placeholder="<?php echo e(__('Confirm Password')); ?>" id="reg-pass-confirm">
                  <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <p class="text-danger"><?php echo e($message); ?></p>
                  <?php endif; ?>
                </div>
              </div>

              <?php if($setting->recaptcha == 1): ?>
              <div class="col-lg-6 mb-4">
                  <?php echo NoCaptcha::renderJs(); ?>

                  <?php echo NoCaptcha::display(); ?>

                  <?php if($errors->has('g-recaptcha-response')): ?>
                  <?php
                      $errmsg = $errors->first('g-recaptcha-response');
                  ?>
                  <p class="text-danger mb-0"><?php echo e(__("$errmsg")); ?></p>
                  <?php endif; ?>
              </div>
              <?php endif; ?>

              <div class="col-12 text-center">
                
                <button class="btn btn-primary margin-bottom-none" type="submit"><span><?php echo e(__('Register')); ?></span></button>
              </div>
              <div class="row">
                <div class="col-lg-12 text-center mt-3">
                  <input class="facebook-btn mr-2 reset_form " type="reset" value="Reset">
                  <a class="google-btn" href="<?php echo e(url('/')); ?>"> <?php echo e(__('Cancel')); ?>

                  </a>
                </div>
              </div>
            </form>
                </div>
            </div>
          </div>
        </div>
  </div>
  <!-- Site Footer-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script>
$(document).ready(function() {
    //Set
$('#billing_country').on("change",function() {
  if($(this).val() == ''){
    $("#phn-country-code").val("");
  }else{
    $c_code = $('#billing_country option[value="'+$(this).val()+'"]').attr('data-country-code');
    document.getElementById("phn-country-code").value = $c_code;
    document.getElementById("w-country-code").value = $c_code;
  }
});
$(document).on("click",".reset_form",function() {
    $('#billing_country').prop('selectedIndex',0);
});

    $(document).ready(function() {

      $('#loginForm').validate({
          rules: {

            login_email: {
                  required: true,
                  email: true, //add an email rule that will ensure the value entered is valid email id.
                  maxlength: 255,
              },

              login_password: {
                  required: true,
                  minlength: 6,
                  maxlength: 15,
              },

          },
      });

  });


        $('#registerForm').validate({
            rules: {
              first_name: {
                    required: true,
                    maxlength: 255,
                },
                last_name: {
                    required: true,
                    maxlength: 255,
                },
                email: {
                    required: true,
                    email: true, //add an email rule that will ensure the value entered is valid email id.
                    maxlength: 255,
                },
                phone: {
                    required: true,
                    number: true,
                    maxlength: 12,
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 15,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#reg-pass"
                },

            },
        });

    });




  $("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#reg-pass");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/user/auth/login.blade.php ENDPATH**/ ?>
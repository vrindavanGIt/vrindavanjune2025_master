<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="<?php echo e($setting->meta_keywords); ?>">
<meta name="description" content="<?php echo e($setting->meta_description); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Contact')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
<div class="page-title breadcrums mb-0">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs ">
                <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                <li class="separator"></li>
                <li><?php echo e(__('Contact Us')); ?></li>
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

  <div class="contactUsBanner">
    <div class="widget-content">
      <div class="contact-us-cover">

        <div class="container">
            <h3>We'd Love to Hear from You</h3>
            <p>Kindly Contact us for any query related to products  quality, payments and any doubts related to products.</p>
        </div>

      </div>
    </div>
  </div>

  <div class="container padding-bottom-2x padding-top-2x mb-0 contact-page">

    <div class="row">
      <div class="col-lg-4 col-md-5 col-sm-5 order-lg-1 order-md-2 order-sm-2">

        <!-- Widget Contacts-->
            
            <!-- Widget Address-->
            <section class="widget widget-featured-posts card rounded p-0">
                <h2 class="widget-title contact__adrsTitle" style="font-size: 17px;"><?php echo e(__('We have two working offices and address details are here.')); ?></h2>
                <h2 class="widget-title padding-bottom-1x brance__title">Mathura Branch</h2>
                
                <ul class="list-icon margin-bottom-1x">
                    <li> <i class="icon-map-pin text-muted"></i><?php echo e($setting->footer_address); ?></li>
                    <li> <i class="icon-phone text-muted"></i><?php echo e($setting->footer_phone); ?></li>
                    <li> <i class="fa fa-envelope text-muted"></i> <?php echo e($setting->footer_email); ?></li>

                </ul>

                <?php
                $links = json_decode($setting->social_link,true)['links'];
                $icons = json_decode($setting->social_link,true)['icons'];

                ?>

                

                


                <h3 class="widget-title padding-bottom-1x brance__title"><?php echo e(__('Noida Branch')); ?></h3>
                <ul class="list-icon margin-bottom-1x">
                    <li> <i class="icon-map-pin text-muted"></i><?php echo e($setting->noida_branch_address); ?></li>
                    <li> <i class="fa fa-whatsapp text-muted"></i><?php echo e($setting->footer_whatsapp); ?></li>
                    <li> <i class="fa fa-envelope text-muted"></i><?php echo e($setting->store_email_2); ?></li>
                </ul>

                

                <?php
                $links = json_decode($setting->social_link, true)['links'];
                $icons = json_decode($setting->social_link, true)['icons'];

                ?>
                <div class="footer-social-links">
                    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link_key => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a target="_blank" href="<?php echo e($link); ?>"><span><i
                                    class="<?php echo e($icons[$link_key]); ?>"></i></span></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                

            </section>


            <div class="googleMap">
                

              <iframe height="360" src="https://maps.google.com/maps?q=<?php echo e(__('contact us map address')); ?>%20&t=&z=17&ie=UTF8&iwloc=&output=embed" style="border:0;" width="100%"></iframe>
            </div>
    </div>


      <div class="col-lg-8 col-md-7 col-sm-7 order-lg-2 order-md-1 order-sm-1">
        <div class="contact-form-box card">

            <h2 class="widget-title contact__formTitle" style="font-size: 17px;"><?php echo e(__('Get In Touch')); ?></h2>

            <form class="row mt-2" method="Post" id="contactForm" action="<?php echo e(route('front.contact.submit')); ?>">
                <?php echo csrf_field(); ?>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first-name"><?php echo e(__('Name')); ?><sup>*</sup></label>
                    <input class="form-control form-control-rounded" name="first_name" type="text" id="first_name" placeholder="<?php echo e(__('Name')); ?>" >
                    <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                  </div>
                </div>
                <div class="col-md-6" style="display: none">
                  <div class="form-group">
                    <label for="last-name"><?php echo e(__('Last Name')); ?></label>
                    <input class="form-control form-control-rounded" name="last_name" type="text" id="last-name" placeholder="<?php echo e(__('Last Name')); ?>" >
                    <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="contact-email"><?php echo e(__('E-mail')); ?><sup>*</sup></label>
                    <input class="form-control form-control-rounded" type="email" name="email" id="contact-email" placeholder="<?php echo e(__('Email Address')); ?>" >
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="contact-tel"><?php echo e(__('Phone')); ?><sup>*</sup></label>
                    <input class="form-control form-control-rounded" type="number" name="phone" id="contact-tel" placeholder="<?php echo e(__('Phone/Mobile No')); ?>" >
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>

                
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="last-name"><?php echo e(__('WhatsApp No')); ?></label>
                      <input class="form-control form-control-rounded" name="whatsapp_no" type="number" id="whatsapp_no" placeholder="<?php echo e(__('WhatsApp No.')); ?>" >
                      <?php $__errorArgs = ['whatsapp_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger"><?php echo e($message); ?></p>

                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="last-name"><?php echo e(__('Country/City')); ?></label>
                      <input class="form-control form-control-rounded" name="country_city" type="text" id="country_city" placeholder="<?php echo e(__('Country / City Address')); ?>" >
                      <?php $__errorArgs = ['Country_City'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="col-12  ">
                  <div class="form-group">
                    <label for="message-text"><?php echo e(__('Message')); ?><sup>*</sup></label>
                    <textarea class="form-control form-control-rounded" rows="5" name="message" id="message-text" placeholder="<?php echo e(__('Write your message here...')); ?>"></textarea>
                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <?php if($setting->recaptcha == 1): ?>
                <div class="col-lg-12 mb-4">
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
                <div>
                    <p style="font-size:12px;">By Submitting this form, you authorize us to store your information for the purpose of your enquiry and agree to our privacy policy.</p>
                </div>

                <div class="col-12 text-right">
                    <!-- Show toastr after succesfull submit -->
                  <button class="btn btn-primary" type="submit"><span><?php echo e(__('Send message')); ?></span></button>
                </div>

              </form>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
<script>
$("#contactForm").validate({
    rules: {
        first_name: {
            required: true,
            maxlength: 50,
        },
        email: {
            required: true,
            email: true,
        },
        phone: {
            required: true,
            number:true,
            maxlength: 15,
            minlength: 8,
        },
        whatsapp_no: {
            number:true,
            maxlength: 15,
            minlength: 8,
        },
        message: {
            required: true,
            maxlength: 500,
        },
    },
    messages: {
        first_name: {
            required: "Name is required.",
        },
        email: {
            required: "Email is required.",
        },
        phone: {
            required: "Phone is required.",
        },
        message: {
            required: "Message is required.",
        },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
        error.addClass("invalid-feedback");
        element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass("is-invalid");
    },
});

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/contact.blade.php ENDPATH**/ ?>
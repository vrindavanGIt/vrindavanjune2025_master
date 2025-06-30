<form action=<?php echo e($action); ?> method="post" id="payuForm" name="payuForm" class="pb-0">

    <input type="hidden" name="key" value="<?php echo e(@$MERCHANT_KEY , ''); ?>"/>
    <input type="hidden" name="hash" value="<?php echo e(@$hash , ''); ?>"/>
    <input type="hidden" name="txnid" value="<?php echo e(@$txnid , ''); ?>"/>
    <input class="input-box form-control w-100" placeholder="Amount *" id="pay_total" type="hidden" name="amount"
                            value="<?php echo e(!empty($posted['amount']) ? $posted['amount'] : ''); ?>">
    <div class="px-5 pt-4 pb-5 form-block" style="display: none">
        <div class="row">
            <div class="col-12">
                <div class="form-group mb-3 position-relative">
                    <input type="text" class="input-box form-control w-100" placeholder="Name *"
                            aria-label="Recipient's username"
                            aria-describedby="button-addon2" name="firstname"
                            value="<?php echo e(!empty($posted['firstname']) ? $posted['firstname'] : ''); ?>">
                    <div class="icon-group-append">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group mb-3 position-relative">
                    <input class="input-box form-control w-100" placeholder="Email *" type="email" name="email"
                            value="<?php echo e(!empty($posted['email']) ? $posted['email'] : ''); ?>">
                    <div class="icon-group-append">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group mb-3 position-relative">
                    <input class="input-box form-control w-100" placeholder="Phone *" type="number" name="phone"
                            value="<?php echo e(!empty($posted['phone']) ? $posted['phone'] : ''); ?>">
                    <div class="icon-group-append">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="form-group mb-3 position-relative">
                    <textarea class="input-box form-control w-100" placeholder="Note *" name="productinfo"><?php echo e(!empty($posted['productinfo']) ? $posted['productinfo'] : ''); ?></textarea>
                    <div class="icon-group-append">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 text-center">
        <button class="btn btn-primary w-100 continue-pay-btn" id="continue-pay-btn"><span>Continue to pay</span></button>
    </div>

    <input name="surl" value="<?php echo e(route('front.payu.success')); ?>" hidden/>
    <input name="furl" value="<?php echo e(route('front.payu.fail')); ?>" hidden/>
    <input type="hidden" name="service_provider" value="payu_paisa"/>
</form><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/checkout/payu_checkout_modal.blade.php ENDPATH**/ ?>
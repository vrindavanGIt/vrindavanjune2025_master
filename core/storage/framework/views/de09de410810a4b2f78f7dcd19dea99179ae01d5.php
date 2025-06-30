<?php $__env->startSection('title'); ?>
<?php echo e(__('Order Track')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="page-title breadcrums">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                    <li class="separator"></li>
                    <li><?php echo e(__('Track Order')); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="selected-product-section WholesalerBlock mt-30 mb-30 theme2">
    <div class="container">
        <div class="WorldwideCon WorldwideCon_trackOrder">

            <h2 class="homeaboutTitle mb-0"><?php echo e(__('tracking page title')); ?></h2>



            <div class="single-service single-service2 homeAboutWrapper check-less-more-parent shadow-none">
                <p class="wholesale-text readmore readmore-fire w-100 text-center mb-0">
                    <?php echo e(__('tracking page description')); ?>

                    
                </p>
            </div>

            <div class="container py-0">
                <div class="row justify-content-center py-3">
                    <div class="col-lg-8">
                        <div class="row align-items-center">
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input class="form-control" type="text" id="order_number" name="order_number"
                                        placeholder="<?php echo e(__('Order ID')); ?>">
                                    <span class="input-group-addon"><i class="icon-map-pin"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-3 mt-sm-0">
                                <button class="btn btn-primary btn-block mt-0 mb-0" id="submit_number"
                                    data-href="<?php echo e(route('front.order.track.submit')); ?>" type="submit"><span><?php echo e(__('Track
                                        Now')); ?></span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-0">
                    <div class="col-lg-12 px-0">
                        <div id="track-order">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/track_order.blade.php ENDPATH**/ ?>
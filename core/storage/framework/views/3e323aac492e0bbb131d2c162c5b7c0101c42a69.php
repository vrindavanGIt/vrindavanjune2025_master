<div class="contener">


    <div class="container">
        <h2 class="shop-homeaboutTitle"><?php echo e(__('Real Reviews On Google')); ?>

            <span class="block-innerBlock">
                <a href="https://search.google.com/local/reviews?placeid=ChIJi9WZg75zczkRlCcxQxOksQs " target="_blank">View All</a> </span>

                
            </span>
    </h2>
    </div>

        <div class="caregoryListingRow mt-0 mb-0">
            <?php
            $google_review=DB::table('google_reviews')->take(10)->get();
            $shop_details=DB::table('settings')->first();


            ?>
            
            <section class="selected-product-section categoryListingCol theme2">
                <div class="container">


                    <div class="row g-3">
                        <div class="col-lg-12" >
                            <div class="cat-prod-wrapper cat-prod-wrapper__review">

                                <div class="static-img-block shop-title" style="">
                                    <div class="shop-review section-title2 shop-section-title3">
                                        <div class="innerBlock">
                                            <div class="google-review">
                                                <div class="shop-img">

                                                    <img src="<?php echo e(asset('assets/images/google_review_shop_img.jpg')); ?>" alt="Avatar">
                                                </div>
                                                <p class="shop-title"><?php echo e($shop_details->google_store_title); ?></p>
                                            </div>
                                            <div class="col-md-12">
                                                <span class="g-stars" data-rating="<?php echo e($shop_details->google_avg_review); ?>"><?php echo e($shop_details->google_avg_review); ?></span>

                                            </div>
                                        <span>Based on <?php echo e($shop_details->google_total_review); ?> reviews </span>
                                        <img  src="<?php echo e(asset('assets/images/powered_by_google_logo.png')); ?>" alt="img">
                                            

                                            
                                            
                                        </div>
                                    </div>
                                    <div class="cat-prod-btn"></div>
                                </div>

                                <div class="prod-slider-wrapper google-review-item">

                                    <div class="review-slider owl-carousel row g-3">

                                        <?php $__currentLoopData = $google_review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="slider-google-item">

                                                    <div class="product-card product_card__review">
                                                        <div class="google-review" >
                                                            <img class="review-user-img" src="<?php echo e($review->author_image); ?>" alt="<?php echo e($review->name); ?>">
                                                            <div class="author__time">
                                                                <span class="author-name"><?php echo e($review->name); ?></span>
                                                                <span class="author-comment-time"><?php echo e($review->review_timestamp); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <span class="g-stars" data-rating="<?php echo e($review->rating); ?>"></span>
                                                        </div>
                                                        <div class="product-card-inner">
                                                        <div class="product-card-body">
                                                            <p><?php echo e($review->review_text); ?></p>
                                                            



                                                        </div>

                                                        </div>
                                                    </div>
                                                </div>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
            
        </div>
</div>



<script src="<?php echo e(asset('assets/front/star-rating-svg-master/src/jquery.star-rating-svg.js')); ?>"></script>
<script>
    $(".g-stars").starRating({
    totalStars: 5,
    starShape: 'rounded',
    starSize: 20,
    emptyColor: 'lightgray',
   // hoverColor: 'salmon',
    activeColor: 'rgb(231, 113, 27)',
    useGradient: false
});
</script><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/google_review.blade.php ENDPATH**/ ?>
<?php $__env->startSection('meta'); ?>
    <meta name="keywords" content="<?php echo e($setting->meta_keywords); ?>">
    <meta name="description" content="<?php echo e($setting->meta_description); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Customer Say')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
    <div class="page-title breadcrums">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                        <li class="separator"></li>
                        <li><?php echo e(__('Customer Say')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <?php
    function renderStarRating($rating, $maxRating = 5)
    {
        $fullStar = "<i class = 'far fa-star filled'></i>";
        $halfStar = "<i class = 'far fa-star-half filled'></i>";
        $emptyStar = "<i class = 'far fa-star'></i>";
        $rating = $rating <= $maxRating ? $rating : $maxRating;

        $fullStarCount = (int) $rating;
        $halfStarCount = ceil($rating) - $fullStarCount;
        $emptyStarCount = $maxRating - $fullStarCount - $halfStarCount;

        $html = str_repeat($fullStar, $fullStarCount);
        $html .= str_repeat($halfStar, $halfStarCount);
        $html .= str_repeat($emptyStar, $emptyStarCount);
        $html = $html;
        return $html;
    }
    ?>

    <!-- Page Content-->
    <div class="container mt-0">
        <h2 class="shop-homeaboutTitle"><?php echo e(__('Real Reviews On Google')); ?>

            <span class="block-innerBlock">
                <a href="https://search.google.com/local/reviews?placeid=ChIJi9WZg75zczkRlCcxQxOksQs " target="_blank">View All</a> </span>

                
            </span>
    </h2>
    </div>
    <section class="selected-product-section pt-4 pb-4 theme2">

        <div class="container ">


            <div class="row">

                <div class="col-lg-12">

                    <div class="customer_say__slider  ">


                        <?php if(isset($datas)): ?>
                        <div class="row">
                        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="col-md-4 col-12 customer__says_saysPage">
                                    <div class="slider-item">
                                        <div class="product-card ">
                                            <div class="product-thumb">
                                                <div class="google-review" >
                                                    <img class="review-user-img" src="<?php echo e($details->author_image); ?>" alt="Product">
                                                    <div class="author__time">
                                                        <span class="author-name"><?php echo e($details->name); ?></span>
                                                        <span class="author-comment-time"><?php echo e($details->review_timestamp); ?></span>
                                                    </div>
                                                </div>
                                                

                                                <div class="rating-stars">
                                                    <?php echo renderStarRating($details->rating); ?>

                                                </div>

                                                <div class="author-text">

                                                    <p><?php echo e($details->review_text); ?></p>
                                                </div>
                                                <div class="author-img">

                                                    
                                                </div>



                                            </div>

                                        </div>
                                    </div>
                                </div>

                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                        <?php else: ?>
                        <tr>
                            <td class="text-center"><strong style=""><b><?php echo e(__('Google Review not found')); ?></b></strong></td>
                        </tr>
                        <?php endif; ?>
                    </div>
                </div>
                

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/customer_say.blade.php ENDPATH**/ ?>
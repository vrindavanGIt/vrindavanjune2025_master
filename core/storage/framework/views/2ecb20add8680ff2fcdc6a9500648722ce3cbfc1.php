<?php $__env->startSection('meta'); ?>
    <meta name="keywords" content="<?php echo e($setting->meta_keywords); ?>">
    <meta name="description" content="<?php echo e($setting->meta_description); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <?php
        function renderStarRating($rating, $maxRating = 5)
        {
            // dd($rating);
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

    <?php if($extra_settings->is_t2_slider == 1): ?>
        <div class="slider-area-wrapper mt-0">
            <!-- Main Slider-->
            <div class="hero-slider">
                <div class="hero-slider-main owl-carousel dots-inside" >
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- <div class="item
                            <?php if(DB::table('languages')->where('is_default',1)->first()->rtl == 1): ?>
                            d-flex justify-content-end
                            <?php endif; ?>
                            "
                            style="background: url('<?php echo e(asset('assets/images/' . $slider->photo)); ?>')" -->
                        <div class="item">
                            <img class="lazy" src="<?php echo e(asset('assets/images/' . $slider->photo)); ?>" />

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="item-inner">
                                            <div class="from-bottom">
                                                <?php if($slider->logo): ?>
                                                    <img class="d-inline-block brand-logo"
                                                    src="<?php echo e(asset('assets/images/' . $slider->logo)); ?>"
                                                    alt="logo">
                                                <?php endif; ?>

                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php
    $free_shipping = DB::table('shipping_services')->whereStatus(1)->whereid(3)->first();
    $setting = App\Models\Setting::first();

    ?>
    <?php if($extra_settings->is_t2_service_section == 1): ?>
        <section class="service-section mt-30 pt-0">
            <div class="container">
                <div class="ServicesRow">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="servicesBlockCon text-center">
                            <div class="single-service single-service2">
                                <img src="<?php echo e(asset('assets/images/'.$service->photo)); ?>" alt="Shipping">
                                <div class="content">

                                    <h6 class="mb-2"><?php echo e(strtr($service->title, array('{minimum_price}' => PriceHelper::setCurrencyPrice($free_shipping->minimum_price),'{phone_no}' => $setting->footer_whatsapp ))); ?></h6>
                                    <p class="text-sm text-muted mb-0"><?php echo e($service->details); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if($extra_settings->is_t2_3_column_banner_first == 1): ?>
        <div class="bannner-section mt-30">
            <div class="container ">
                <div class="row gx-3">
                    <div class="col-md-4">
                        <a href="<?php echo e($banner_first['firsturl1']); ?>" class="genius-banner">
                            <img src="<?php echo e(asset('assets/images/'.$banner_first['img1'])); ?>" alt="">
                            <div class="inner-content">
                                <?php if(isset($banner_first['subtitle1'])): ?>
                                    <p><?php echo e($banner_first['subtitle1']); ?></p>
                                <?php endif; ?>
                                <?php if(isset($banner_first['title1'])): ?>
                                    <h4><?php echo e($banner_first['title1']); ?></h4>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo e($banner_first['firsturl2']); ?>" class="genius-banner">
                            <img src="<?php echo e(asset('assets/images/'.$banner_first['img2'])); ?>" alt="">
                            <div class="inner-content">
                                <?php if(isset($banner_first['subtitle2'])): ?>
                                    <p><?php echo e($banner_first['subtitle2']); ?></p>
                                <?php endif; ?>
                                <?php if(isset($banner_first['title2'])): ?>
                                    <h4><?php echo e($banner_first['title2']); ?></h4>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo e($banner_first['firsturl3']); ?>" class="genius-banner">
                            <img src="<?php echo e(asset('assets/images/'.$banner_first['img3'])); ?>" alt="">
                            <div class="inner-content">
                                <?php if(isset($banner_first['subtitle3'])): ?>
                                    <p><?php echo e($banner_first['subtitle3']); ?> </p>
                                <?php endif; ?>
                                <?php if(isset($banner_first['title3'])): ?>
                                    <h4><?php echo e($banner_first['title3']); ?></h4>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
<section class="selected-product-section WholesalerBlock mt-30 theme2">
    <div class="container">
        <div class="WorldwideCon">
            
                <h1 class="homeaboutTitle"><?php echo __('home page paragraph 1 title'); ?></h1>
            

            <div class="single-service single-service2 homeAboutWrapper check-less-more-parent">
                <p id="desc1" class="wholesale-text readmore readmore-fire" data-target="desc1"><?php echo __('home page paragraph 1 description'); ?>

                </p>
                <p id="readmore-readeless" class="readmore-readeless readmore-fire readmore-fire-btn" data-target="desc1">Read more</p>
            </div>
        </div>
    </div>
</section>
    <?php if($extra_settings->is_t1_falsh == 1): ?>
        <div class="flash-sell-new-section mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="section-title section-title2 section-title3section-title section-title2 section-title3">
                            <h2 class="h3"><?php echo e(__('Flash Deal')); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-content">
                            <div class="flash-deal-slider owl-carousel" >
                                <?php $__currentLoopData = $products->orderBy('id','DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->is_type == 'flash_deal' && $item->date != null): ?>
                                    <div class="slider-item">
                                        <div class="product-card ">
                                            <div class="product-thumb">
                                                <?php if(!$item->is_stock()): ?>
                                                <div class="product-badge bg-secondary border-default text-body
                                                "><?php echo e(__('out of stock')); ?></div>
                                                <?php endif; ?>
                                                
                                                <a href="<?php echo e(url($item->slug)); ?>">    <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$item->thumbnail)); ?>" alt="Product"> </a>
                                                <div class="product-button-group">
                                                    
                                                    
                                                    
                                                </div>
                                                <div class="widhListCon"><a class="btn wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a></div>
                                            </div>
                                            <div class="product-card-inner">
                                                <div class="product-card-body">

                                                    <div class="product-category"><a href="<?php echo e(url($item->category->slug)); ?>"><?php echo e($item->category->name); ?></a></div>
                                                    <h3 class="product-title"><a href="<?php echo e(url($item->slug)); ?>">
                                                        <?php echo e(strlen(strip_tags($item->name)) > 50 ? substr(strip_tags($item->name), 0, 50) : strip_tags($item->name)); ?>

                                                    </a></h3>
                                                    <div class="rating-stars">
                                                        <?php echo renderStarRating($item->reviews->avg('rating')); ?>

                                                    </div>

                                                    <div class="productItemPrice">
                                                        <h4 class="product-price">
                                                        <?php if($item->previous_price != 0): ?>
                                                        <del><?php echo e(PriceHelper::setPreviousPrice($item->previous_price)); ?></del>
                                                        <?php endif; ?>

                                                        <?php echo e(PriceHelper::grandCurrencyPrice($item)); ?>

                                                        </h4>
                                                        <div class="addToCart-btn">
                                                            <?php echo $__env->make('includes.item_footer',['sitem' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </div>
                                                    </div>

                                                    <?php if(date('d-m-y') != \Carbon\Carbon::parse($item->date)->format('d-m-y')): ?>
                                                    <div class="countdown countdown-alt mb-3" data-date-time="<?php echo e($item->date); ?>">
                                                    </div>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    

    <?php if($extra_settings->is_t2_3_column_banner_second == 1): ?>
        <div class="bannner-section mt-60">
            <div class="container ">
                <div class="row gx-3">
                    <div class="col-md-4">
                        <a href="<?php echo e($banner_secend['url1']); ?>" class="genius-banner">
                            <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$banner_secend['img1'])); ?>" alt="">
                            <div class="inner-content">
                                <?php if(isset($banner_secend['subtitle1'])): ?>
                                    <p><?php echo e($banner_secend['subtitle1']); ?></p>
                                <?php endif; ?>

                                <?php if(isset($banner_secend['title1'])): ?>
                                    <h4><?php echo e($banner_secend['title1']); ?></h4>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo e($banner_secend['url2']); ?>" class="genius-banner">
                            <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$banner_secend['img2'])); ?>" alt="">
                            <div class="inner-content">
                                <?php if(isset($banner_secend['subtitle2'])): ?>
                                    <p><?php echo e($banner_secend['subtitle2']); ?></p>
                                <?php endif; ?>

                                <?php if(isset($banner_secend['title2'])): ?>
                                    <h4> <?php echo e($banner_secend['title2']); ?></h4>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo e($banner_secend['url3']); ?>" class="genius-banner">
                            <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$banner_secend['img3'])); ?>" alt="">
                            <div class="inner-content">
                                <?php if(isset($banner_secend['subtitle3'])): ?>
                                    <p><?php echo e($banner_secend['subtitle3']); ?> </p>
                                <?php endif; ?>

                                <?php if(isset($banner_secend['title3'])): ?>
                                    <h4><?php echo e($banner_secend['title3']); ?></h4>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    
    

    <section class="selected-product-section mt-30 theme2">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-12 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title section-title2  section-title3">
                                <h2 class="h3"><?php echo e(__('Shop By Category')); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="categoryListingRow" id="main_div">
                        <?php if(isset($all_category)): ?>
                        <div class="home-category-slider owl-carousel">
                        <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($item->category_item) && count($item->category_item)): ?>
                        <div class="slider-item">
                            <div class="product-card">
                                    <div class="product-thumb">
                                        <a href="<?php echo e(url($item->slug)); ?>"> <img class="lazy" src="<?php echo e(asset('assets/images/'.$item->thum_name)); ?>" alt="Product"> </a>
                                    </div>
                                    <a href="<?php echo e(url($item->slug)); ?>">
                                        <span class="product-badge bg-success">Shop Now</span>
                                    </a>
                                    <div class="categoryName">
                                        <a href="<?php echo e(url($item->slug)); ?>">
                                             <h3 class="post-title title_tooltip" data-html="true" data-toggle="tooltip"  title="<?php echo $item->name; ?>"><?php echo e($item->name); ?>

                                        </a></h3>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>


            </div>

                </div>
            </div>
        </div>
    </section>

    

    <?php if($extra_settings->is_t2_bestseller_product == 1): ?>
        <section class="selected-product-section mt-50  theme2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title section-title2  section-title3">
                            <h2 class="h3"><?php echo e(__('Best Seller')); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="features-slider  owl-carousel" >
                            <?php $__currentLoopData = $products->orderBy('id','DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->is_type == 'best'): ?>
                                    <div class="slider-item">
                                        <div class="product-card ">
                                            <div class="product-thumb">
                                            <?php if(!$item->is_stock()): ?>
                                                <div class="product-badge bg-secondary border-default text-body
                                                "><?php echo e(__('out of stock')); ?></div>
                                            <?php endif; ?>
                                            
                                            <a href="<?php echo e(url($item->slug)); ?>">  <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$item->thumbnail)); ?>" alt="Product"> </a>
                                            <div class="product-button-group">
                                                
                                                
                                                
                                            </div>
                                            <div class="widhListCon">
                                                <a class="btn wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                                            </div>
                                        </div>
                                            <div class="product-card-inner">
                                            <div class="product-card-body">
                                                <div class="product-category"><a href="<?php echo e(url($item->category->slug)); ?>"><?php echo e($item->category->name); ?></a></div>
                                                <h3 class="product-title"><a href="<?php echo e(url($item->slug)); ?>">
                                                    <?php echo e(strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name)); ?>

                                                </a></h3>
                                                <div class="rating-stars">
                                                    <?php echo renderStarRating($item->reviews->avg('rating')); ?>

                                                </div>

                                                <div class="productItemPrice">
                                                    <h4 class="product-price">
                                                    <?php if($item->previous_price != 0): ?>
                                                    <del><?php echo e(PriceHelper::setPreviousPrice($item->previous_price)); ?></del>
                                                    <?php endif; ?>
                                                    <?php echo e(PriceHelper::grandCurrencyPrice($item)); ?>

                                                    </h4>

                                                    <div class="addToCart-btn">
                                                        <?php echo $__env->make('includes.item_footer',['sitem' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                </div>

                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if($extra_settings->is_t2_toprated_product == 1): ?>
        <section class="selected-product-section mt-50  theme2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title section-title2  section-title3">
                            <h2 class="h3"><?php echo e(__('Top Rated')); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="features-slider  owl-carousel" >
                            <?php $__currentLoopData = $products->orderBy('id','DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->is_type == 'top'): ?>
                                    <div class="slider-item">
                                        <div class="product-card ">
                                            <div class="product-thumb">
                                            <?php if(!$item->is_stock()): ?>
                                                <div class="product-badge bg-secondary border-default text-body
                                                "><?php echo e(__('out of stock')); ?></div>
                                            <?php endif; ?>
                                            <?php if($item->previous_price && $item->previous_price !=0): ?>
                                            <div class="product-badge product-badge2 bg-info"> -<?php echo e(PriceHelper::DiscountPercentage($item)); ?></div>
                                            <?php endif; ?>
                                            <a href="<?php echo e(url($item->slug)); ?>"> <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$item->thumbnail)); ?>" alt="Product"> </a>
                                            <div class="product-button-group">
                                                
                                                
                                                
                                            </div>
                                            <div class="widhListCon">
                                                <a class="btn wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                                            </div>
                                        </div>
                                            <div class="product-card-inner">
                                            <div class="product-card-body">
                                                <div class="product-category"><a href="<?php echo e(url($item->category->slug)); ?>"><?php echo e($item->category->name); ?></a></div>
                                                <h3 class="product-title"><a href="<?php echo e(url($item->slug)); ?>">
                                                    <?php echo e(strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name)); ?>

                                                </a></h3>
                                                <div class="rating-stars">
                                                    <?php echo renderStarRating($item->reviews->avg('rating')); ?>

                                                </div>


                                                <div class="productItemPrice">
                                                    <h4 class="product-price">
                                                    <?php if($item->previous_price != 0): ?>
                                                    <del><?php echo e(PriceHelper::setPreviousPrice($item->previous_price)); ?></del>
                                                    <?php endif; ?>
                                                    <?php echo e(PriceHelper::grandCurrencyPrice($item)); ?>

                                                    </h4>
                                                    <div class="addToCart-btn">
                                                        <?php echo $__env->make('includes.item_footer',['sitem' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                </div>

                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <?php endif; ?>
 <?php
    // foreach($products->orderBy('id','DESC')->get()  as $item){
    //     dd($item);
    // }
    ?>

    
    <div class="caregoryListingRow">
    <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pcitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($pcitem->category_item) && count($pcitem->category_item)): ?>
        <section class="selected-product-section categoryListingCol theme2">
            <div class="container">
                <div class="row g-3">
                    <div class="col-lg-12" >
                        <div class="cat-prod-wrapper">
                            <div class="static-img-block" style="background-image:url('<?php echo e(asset('assets/images/'.$pcitem->photo)); ?>')">
                                <div class="section-title section-title2 section-title3">
                                    <div class="innerBlock">
                                        <h3 class="staticImageTitle"><?php echo e($pcitem->name); ?></h3>
                                        <div class="cat-prod-btn home-cat-category"><a href="<?php echo e(url($pcitem->slug)); ?>">View All</a></div>
                                    </div>
                                </div>
                                <div class="cat-prod-btn"></div>
                            </div>
                            <div class="prod-slider-wrapper">
                                <div class="features-slider  owl-carousel row g-3">
                                    <?php $__currentLoopData = $pcitem->category_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <div class="slider-item">
                                                <div class="product-card ">
                                                    <div class="product-thumb" >
                                                        <?php if(!$item->is_stock()): ?>
                                                            <div class="product-badge bg-secondary border-default text-body
                                                            "><?php echo e(__('out of stock')); ?></div>
                                                        <?php endif; ?>
                                                        
                                                        <a href="<?php echo e(url($item->slug)); ?>">    <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$item->thumbnail)); ?>" alt="<?php echo e($item->original_image_name); ?>"> </a>
                                                        <div class="product-button-group">
                                                            
                                                            
                                                            
                                                        </div>
                                                        <div class="widhListCon">
                                                            <a class="btn wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card-inner">
                                                    <div class="product-card-body">
                                                        <div class="product-category"><a href="<?php echo e(url($item->category->slug)); ?>"> <span style=" font-weight: 600;"> <?php echo e($item->category->name); ?></span></a></div>
                                                        <h3 class="product-title"><a href="<?php echo e(url($item->slug)); ?>">
                                                            <?php echo e(strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name)); ?>

                                                        </a></h3>
                                                        <div class="rating-stars">
                                                            <?php echo renderStarRating($item->reviews->avg('rating')); ?>

                                                        </div>

                                                        <div class="productItemPrice">
                                                            <h4 class="product-price">
                                                            <?php if($item->previous_price != 0): ?>
                                                            <del><?php echo e(PriceHelper::setPreviousPrice($item->previous_price)); ?></del>
                                                            <?php endif; ?>
                                                            <?php echo e(PriceHelper::grandCurrencyPrice($item)); ?>

                                                            </h4>
                                                            <div class="addToCart-btn">
                                                                <?php echo $__env->make('includes.item_footer',['sitem' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            </div>
                                                        </div>
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
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <span id="google_review_section" class="home__google_rev">

    </span>

    <?php if($extra_settings->is_t2_2_column_banner == 1): ?>
        <div class="bannner-section mt-50">
            <div class="container ">
                <div class="row gx-3">
                    <div class="col-md-6">
                        <a href="<?php echo e($banner_third['url1']); ?>" class="genius-banner">
                            <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$banner_third['img1'])); ?>" alt="">
                            <div class="inner-content">
                                <?php if(isset($banner_third['subtitle1'])): ?>
                                    <p><?php echo e($banner_third['subtitle1']); ?></p>
                                <?php endif; ?>
                                <?php if(isset($banner_third['title1'])): ?>
                                    <h4><?php echo e($banner_third['title1']); ?></h4>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo e($banner_third['url2']); ?>" class="genius-banner">
                            <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$banner_third['img2'])); ?>" alt="">
                            <div class="inner-content">
                                <?php if(isset($banner_third['subtitle2'])): ?>
                                    <p><?php echo e($banner_third['subtitle2']); ?> </p>
                                <?php endif; ?>
                                <?php if(isset($banner_third['title2'])): ?>
                                    <h4><?php echo e($banner_third['title2']); ?></h4>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if($extra_settings->is_t2_three_column_category == 1): ?>
    <div class="flash-sell-area three_column_product mt-50">
        <div class="container">
            <div class="row gx-3 justify-content-center">
                <?php $__currentLoopData = $two_column_categoriess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $two_column_key => $two_column_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-lg-6">
                    <div class="section-title">
                        <h2 class="h3"><?php echo e($two_column_category['name']->name); ?></h2>
                    </div>
                    <div class="main-content">
                        <div class="newproduct-slider owl-carousel">
                            <?php $__currentLoopData = $two_column_categoriess[$two_column_key]['items']->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $two_column_category_itemt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="slider-item">
                                    <?php $__currentLoopData = $two_column_category_itemt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $two_column_category_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="product-card p-col">
                                        <a class="product-thumb" href="<?php echo e(route('front.product',$two_column_category_item->slug)); ?>">
                                            <?php if(!$two_column_category_item->is_stock()): ?>
                                                <div class="product-badge bg-secondary border-default text-body
                                                "><?php echo e(__('out of stock')); ?></div>
                                                <?php endif; ?>

                                            <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$two_column_category_item->thumbnail)); ?>" alt="Product"></a>
                                        <div class="product-card-body">
                                            <h3 class="product-title"><a href="<?php echo e(route('front.product',$two_column_category_item->slug)); ?>">
                                                <?php echo e(strlen(strip_tags($two_column_category_item->name)) > 40 ? substr(strip_tags($two_column_category_item->name), 0, 40) : strip_tags($two_column_category_item->name)); ?>

                                            </a></h3>
                                            <div class="rating-stars">
                                                <?php echo renderStarRating($two_column_category_item->reviews->avg('rating')); ?>

                                            </div>
                                            <h4 class="product-price">
                                            <?php if($two_column_category_item->previous_price != 0): ?>
                                            <del><?php echo e(PriceHelper::setPreviousPrice($two_column_category_item->previous_price)); ?></del>
                                            <?php endif; ?>
                                                <?php echo e(PriceHelper::grandCurrencyPrice($two_column_category_item)); ?>

                                            </h4>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
    <?php endif; ?>

    

    <?php if($extra_settings->is_t2_brand_section == 1): ?>
        <section class="brand-section  mt-30 mb-60">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="section-title section-title2  section-title3">
                            <h2 class="h3"><?php echo e(__('Popular Brands')); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brand-slider owl-carousel">
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="slider-item">
                                <a class="text-center" href="<?php echo e(route('front.shopbycategory') . '?brand=' . $brand->slug); ?>">
                                    <img class="d-block hi-50 lazy"
                                     data-src="<?php echo e(asset('assets/images/' . $brand->photo)); ?>"
                                        alt="<?php echo e($brand->name); ?>" title="<?php echo e($brand->name); ?>">
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="selected-product-section WholesalerBlock mt-30 theme2" style="margin-bottom:30px;">
        <div class="container">
            <div class="WorldwideCon">
                <h2 class="homeaboutTitle"> <?php echo __('home page paragraph 2 title'); ?></h2>
                <div class="single-service single-service2 homeAboutWrapper check-less-more-parent">
                    <span id="desc1" class="wholesale-text readmore readmore-fire" data-target="desc1">
                       <?php echo __('home page paragraph 2 description'); ?>

                    </span>
                    <p id="readmore-readeless" class="readmore-readeless readmore-fire readmore-fire-btn" data-target="desc1">Read more</p>
                </div>
            </div>
        </div>
    </section>

    <?php if($setting->is_blog == 1): ?>
    <div class="blog-section-h page_section mt-20 mb-0 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title section-title2 section-title3">
                        <h2 class="h3"><?php echo e(__('Our Blogs')); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="home-blog-slider owl-carousel">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="slider-item">
                                <a href="<?php echo e(url($post->slug)); ?>" class="blog-post">
                                    <div class="post-thumb">
                                        <img class="lazy" src="<?php echo e(asset('assets/images/'.$post->thum_img)); ?>"
                                            alt="<?php echo e($post->slug); ?>">
                                        </div>
                                    <div class="post-body">

                                        <h3 class="post-title title_tooltip" data-html="true" data-toggle="tooltip"  title="<?php echo $post->title; ?>"><?php echo $post->title; ?>

                                        </h3>
                                        <ul class="post-meta">

                                            
                                            <li><i class="icon-clock"></i><?php echo e(date('jS F, Y', strtotime($post->created_at))); ?></li>
                                        </ul>
                                        <p><?php echo App\Helpers\CommonHelper::truncate($post->details,85); ?>

                                        </p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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

$(document).ready(function(){

$.ajax({
url:"<?php echo e(route('front.google.review.section')); ?>",
type:'GET',
dataType:'html',
async: false,
success:function(data){
    var response=data;
    // console.log(response);
    // console.log(response);
    $('#google_review_section').html(response);

},
});
});


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


                    },
            success:function(data){
            var response=data;
            
        },

        });

        });

    }

</script>

<?php $__env->stopSection(); ?>






<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/themes/theme2.blade.php ENDPATH**/ ?>
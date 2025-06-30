<?php $__env->startSection('title'); ?>
    <?php if($item->meta_tittle == null): ?>
        <?php echo e($setting->title); ?> - <?php echo e($item->name); ?>

    <?php else: ?>
        <?php echo e($item->meta_tittle); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styleplugins'); ?>
    <link rel="stylesheet" media="screen" href="<?php echo e(asset('assets/front/css/reset.css')); ?>">
    <link rel="stylesheet" media="screen" href="<?php echo e(asset('assets/front/css/jquery-picZoomer.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="keywords" content="<?php echo e($item->meta_keywords); ?>">
    <meta name="description" content="<?php echo e($item->meta_description); ?>">
    <style>
        .error {
            color: red;
        }

        .priceWrapperRow .price-area .cut_price {
            font-weight: 600;
            font-size: 18px;
        }

        @media  screen and (max-width:576px) {
            .priceWrapperRow .price-area .cut_price {
                font-size: 14px;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $item_text = false;
        $setting_item_text = false;

        $item_text_info = str_replace('&nbsp;', '', preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', strip_tags($item->details)));
        $setting_item_text_info = str_replace('&nbsp;', '', preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', strip_tags($item->product_discription)));

        if (isset($item->details)) {
            $item_text = !ctype_space(
                str_replace(
                    '&nbsp;',
                    ' ',
                    preg_replace(
                        '#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>
            )#',
                        '\\1\\6',
                        strip_tags($item->details),
                    ),
                ),
            );
        }
        if (isset($setting->product_discription)) {
            $setting_item_text = !ctype_space(
                str_replace(
                    '&nbsp;',
                    ' ',
                    preg_replace(
                        '#(<[a-z
                ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#',
                        '\\1\\6',
                        strip_tags($setting->product_discription),
                    ),
                ),
            );
        }

    ?>
    <div class="page-title breadcrums">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a>
                        </li>
                        <li class="separator"></li>
                        <li><a href="<?php echo e(route('front.shopbycategory')); ?>"><?php echo e(__('Tulsimala Shopping')); ?></a>
                        </li>
                        <li class="separator"></li>
                        <li><?php echo e($item->name); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-1x mb-1">
        <div class="row">
            <!-- Poduct Gallery-->
            <div class="col-xxl-5 col-lg-6 col-md-6">
                <div class="product-gallery">
                    
                    <?php if($item->is_stock()): ?>
                        
                    <?php else: ?>
                        <span
                            class="product-badge bg-secondary border-default text-body
                  "><?php echo e(__('out of stock')); ?></span>
                    <?php endif; ?>

                    

                    <div class="product-thumbnails insize">

                        <div class="picZoomer">

                            <img class="lazy" src="<?php echo e(asset('assets/images/' . $item->photo)); ?>"
                                alt="<?php echo e($item->original_image_name); ?>">

                        </div>
                        
                        <div class="piclist">
                            <div class="item "><img class="lazy" src="<?php echo e(asset('assets/images/' . $item->photo)); ?>"
                                    alt="<?php echo e($item->original_image_name); ?>" /></div>
                            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item "><img class="lazy" src="<?php echo e(asset('assets/images/' . $gallery->photo)); ?>"
                                        alt="<?php echo e($gallery->original_image_name); ?>" /></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($item->video) && $item->video != ''): ?>
                                <div class="video_wrap">
                                    <div class="video-btn-sample">
                                        <a class="btn1" href="<?php echo e($item->video); ?>" title="Watch video"><i
                                                class="fa fa-play" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                function renderStarRating($rating, $maxRating = 5)
                {
                    $fullStar = "<i class='far fa-star filled'></i>";
                    $halfStar = "<i class='far fa-star-half filled'></i>";
                    $emptyStar = "<i class='far fa-star'></i>";
                    $rating = $rating <= $maxRating ? $rating : $maxRating;
                    $fullStarCount = (int) $rating;
                    $halfStarCount = ceil($rating) - $fullStarCount;
                    $emptyStarCount = $maxRating - $fullStarCount - $halfStarCount;
                    $html = str_repeat($fullStar, $fullStarCount);
                    $html .= str_repeat($halfStar, $halfStarCount);
                    $html .= str_repeat($emptyStar, $emptyStarCount);
                    $html = $html;
                    return $html;
            } ?> <!-- Product Info-->
            <div class="col-xxl-7 col-lg-6 col-md-6">
                <div class="details-page-top-right-content d-flex">
                    <div class="DetailWrapper">
                        <input type="hidden" id="item_id" value="<?php echo e($item->id); ?>">
                        <input type="hidden" id="demo_price"
                            value="<?php echo e(PriceHelper::setConvertPrice($item->discount_price)); ?>">
                        <input type="hidden" value="<?php echo e(PriceHelper::setCurrencySign()); ?>" id="set_currency">
                        <input type="hidden" value="<?php echo e(PriceHelper::setCurrencyValue()); ?>" id="set_currency_val">
                        <input type="hidden" value="<?php echo e($setting->currency_direction); ?>" id="currency_direction">
                        <h4 class="mb-2 p-title-main"><?php echo e($item->name); ?></h4>
                        <div class="mb-3">
                            
                        </div>
                        <?php if($item->is_type == 'flash_deal'): ?>
                            <?php if(date('d-m-y') != \Carbon\Carbon::parse($item->date)->format('d-m-y')): ?>
                                <div class="countdown countdown-alt mb-3" data-date-time="<?php echo e($item->date); ?>">
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="priceWrapperRow">
                            <span class="price-area">
                                <?php if($item->previous_price != 0): ?>
                                    <small
                                        class="d-inline-block cut_price"><del><?php echo e(PriceHelper::setPreviousPrice($item->previous_price)); ?></del></small>
                                <?php endif; ?>

                                <span id="main_price" class="main-price">
                                    <?php echo e(PriceHelper::grandCurrencyPrice($item)); ?></span>
                            </span>
                        </div>
                        <div class="metaWrapper">
                            <?php if($item->is_stock()): ?>
                                <button class="btnGreen in_stock"><i
                                        class="icon-bag"></i><span><?php echo e(__('In
                                                                                            Stock')); ?></span></button>
                            <?php else: ?>
                                <button class="btn "><i
                                        class="icon-bag"></i><span><?php echo e(__('Out of Stock')); ?></span></button>
                            <?php endif; ?>
                            
                            <span class="SkuWrapper"> <span class="text-medium"><?php echo e(__('SKU')); ?>:</span>
                                <?php echo e($item->sku); ?></span>
                            
                            <button class="btnGreen quickEnquiry m-0" onclick="openForm()"><i
                                    class="icon-bag"></i><span><?php echo e(__('Quick Enquiry')); ?></span></button>
                        </div>
                        <p class="text-muted" style="display:none"><?php echo e($item->sort_details); ?> <a href="#details"
                                class="scroll-to"><?php echo e(__('Read more')); ?></a></p>

                        
                        <div class="row align-items-end pb-4">
                            <div class="col-sm-12">
                                

                                
                                
                                
                                <div class="ProductMetaBLock">
                                    
                                    <div class="qtySelector product-quantity">
                                        <span class="decreaseQty subclick"><i class="fas fa-minus "></i></span>
                                        <input type="text" class="qtyValue cart-amount" value="1">
                                        <span class="increaseQty addclick"><i class="fas fa-plus"></i></span>
                                        <input type="hidden" value="3333" id="current_stock">
                                    </div>
                                    
                                    <div class="p-action-button">
                                        <?php if($item->item_type != 'affiliate'): ?>
                                            <?php if($item->is_stock()): ?>
                                                <button class="btnRed" data-target="<?php echo e($item->id); ?>"
                                                    onclick="visitor_info(1)" id="add_to_cart"><i
                                                        class="icon-bag"></i><span><?php echo e(__('Add to Cart')); ?></span></button>
                                            <?php else: ?>
                                                <button class="btn btn-primary m-0"><i
                                                        class="icon-bag"></i><span><?php echo e(__('Out of
                                                                                                                        stock')); ?></span></button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="<?php echo e($item->affiliate_link); ?>" target="_blank"
                                                class="btn btn-bordered m-0"><span><i
                                                        class="icon-bag"></i><?php echo e(__('Buy Now')); ?></span></a>
                                        <?php endif; ?>
                                        <a class="btn btn-bordered  wishlist_store "
                                            href="<?php echo e(route('user.wishlist.store', $item->id)); ?>"><span>
                                                <i class="icon-heart"></i></span>
                                            <?php if(Auth::check() &&
                                                    App\Models\Wishlist::where('user_id', Auth::user()->id)->where('item_id', $item->id)->exists()): ?>
                                                <span><?php echo e(__('Added To Wishlist')); ?></span>
                                            <?php else: ?>
                                                <span class="wishlist1"><?php echo e(__('Wishlist')); ?></span>
                                                <span
                                                    class="wishlist2 d-none"><?php echo e(__('Added To
                                                                                                                    Wishlist')); ?></span>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                                <?php
                                    $free_shipping = DB::table('shipping_services')
                                        ->whereStatus(1)
                                        ->whereid(3)
                                        ->first();
                                ?>
                                <div class="product-section-blocks">
                                    <ul>
                                        <li>
                                            <div class="blockIcon"><img class="lazy"
                                                    src="<?php echo e(asset('assets/images/DZi3vrdrcopy.png')); ?>"
                                                    alt="Worldwide Shipping"></div>
                                            <div class="blockContent">
                                                <p>Worldwide Shipping</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="blockIcon"><img class="lazy"
                                                    src="<?php echo e(asset('assets/images/FqPkRgcccopy.png')); ?>"
                                                    alt="Contact for Custom Designs"></div>
                                            <div class="blockContent">
                                                <p>Contact for Custom Designs </p>
                                                <p> <?php echo e($setting->footer_whatsapp); ?> </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="blockIcon"><img class="lazy"
                                                    src="<?php echo e(asset('assets/images/jLwFh8gecopy.png')); ?>"
                                                    alt="Worldwide Shipping"></div>
                                            <div class="blockContent">
                                                <p>Free Shipping
                                                    order<br><?php echo e(PriceHelper::setCurrencyPrice($free_shipping->minimum_price)); ?>

                                                    or more </p>
                                                <p><span>Applicable only in India</span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="blockIcon"><i class="fa fa-credit-card"></i>
                                            </div>
                                            <div class="blockContent">
                                                <p>Internationl Payment Accepted</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="DeliveryInformation">

                                    <h3><i class="fa fa-truck"></i> Delivery Information</h3>
                                    <ul class="list-icon">
                                        <?php echo __('delivery information'); ?>

                                        
                                    </ul>
                                </div>

                                <div class="socialWrapperBlock">

                                    <div class="p-d-f-area">

                                        <link rel="stylesheet"
                                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                                        <div class="d-flex align-items-center">
                                            <span class="text-muted mr-1"><?php echo e(__('Share')); ?>: </span>
                                            <div class="d-inline-block a2a_kit">
                                                <a class="facebook  a2a_button_facebook" href="">
                                                    <span><i class="fab fa-facebook-f"></i></span>
                                                </a>
                                                <a class="twitter  a2a_button_twitter" href="">
                                                    <span><i class="fab fa-twitter"></i></span>
                                                </a>
                                                <a class="linkedin  a2a_button_linkedin" href="">
                                                    <span><i class="fab fa-linkedin-in"></i></span>
                                                </a>
                                                <a class="pinterest   a2a_button_pinterest" href="">
                                                    <span><i class="fab fa-pinterest"></i></span>
                                                </a>
                                                <a target="_blank" class="whatsaap"
                                                    href="https://api.whatsapp.com/send?text=<?php echo e(urlencode(url()->current())); ?> ">
                                                    <span><i class="fa fa-whatsapp"></i></span>
                                                </a>

                                            </div>
                                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $itemAttributesOptionsStack = [];
        foreach ($itemAttributesOptions as $hasAttribute) {
            if (isset($hasAttribute->attribute) && isset($hasAttribute->attributeOption)) {
                if (array_key_exists($hasAttribute->attribute->name . '__' . $hasAttribute->attribute->id, $itemAttributesOptionsStack)) {
                    $itemAttributesOptionsStack[$hasAttribute->attribute->name . '__' . $hasAttribute->attribute->id] = $itemAttributesOptionsStack[$hasAttribute->attribute->name . '__' . $hasAttribute->attribute->id] . ',' . $hasAttribute->attributeOption->name;
                } else {
                    $itemAttributesOptionsStack[$hasAttribute->attribute->name . '__' . $hasAttribute->attribute->id] = $hasAttribute->attributeOption->name;
                }
            }
        }
        $is_itemAttributesOptionsStack = false;
        if ($itemAttributesOptionsStack) {
            $is_itemAttributesOptionsStack = true;
        }
        // dd($itemAttributesOptionsStack);die;
        ?>

        <div class="ProductDetailWrapper" id="details">
            <div class="col-lg-12">
                <ul class="nav nav-tabs product_tabs" role="tablist">
                    
                    <?php if($itemAttributesOptionsStack): ?>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php echo e($is_itemAttributesOptionsStack ? 'active' : ''); ?>" id="description-tab"
                                data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab"
                                aria-controls="description" aria-selected="false"><?php echo e(__('Discription')); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if(($item_text && $item_text_info != '') || ($setting_item_text && $setting_item_text_info != '')): ?>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php echo e($is_itemAttributesOptionsStack ? '' : 'active'); ?> " id="specification-tab"
                                data-bs-toggle="tab" data-bs-target="#specification" type="button" role="tab"
                                aria-controls="specification"
                                aria-selected="true"><?php echo e(__('Additionla
                                                                        Information')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content card">
                    <?php $itemAttributesOptionsStack = [];
                    foreach ($itemAttributesOptions as $hasAttribute) {
                        if (isset($hasAttribute->attribute) && isset($hasAttribute->attributeOption)) {
                            if (array_key_exists($hasAttribute->attribute->name . '__' . $hasAttribute->attribute->id, $itemAttributesOptionsStack)) {
                                $itemAttributesOptionsStack[$hasAttribute->attribute->name . '__' . $hasAttribute->attribute->id] = $itemAttributesOptionsStack[$hasAttribute->attribute->name . '__' . $hasAttribute->attribute->id] . ',' . $hasAttribute->attributeOption->name;
                            } else {
                                $itemAttributesOptionsStack[$hasAttribute->attribute->name . '__' . $hasAttribute->attribute->id] = $hasAttribute->attributeOption->name;
                            }
                        }
                    }
                    // dd($itemAttributesOptionsStack);die;
                    ?>
                    <div class="tab-pane fade show  <?php echo e($itemAttributesOptionsStack ? 'active' : ''); ?>" id="description"
                        role="tabpanel" aria-labelledby="description-tab">
                        <div class="comparison-table table_detail">
                            <table class="table table-bordered">
                                <thead class="bg-secondary">
                                </thead>
                                <tbody>
                                    
                                    <?php if($itemAttributesOptionsStack): ?>
                                        <?php $__currentLoopData = $itemAttributesOptionsStack; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th><?php echo e(explode('__', $attribute)[0]); ?></th>
                                                <td><?php echo e($options); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr class="text-center">
                                            <td colspan="2"><?php echo e(__('No Descriptions')); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>


                    <?php if(($item_text && $item_text_info != '') || ($setting_item_text && $setting_item_text_info != '')): ?>
                        <div class="tab-pane fade show  <?php echo e(!$itemAttributesOptionsStack ? 'active' : ''); ?>"
                            id="specification" role="tabpanel" aria-labelledby="specification-tab">
                            <?php echo $setting->product_discription . ' ' . $item->details; ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>






        <!-- Reviews-->
        

        <?php if(count($related_items) > 0): ?>
            <div class="relatedproduct-section mb-1 s-pt-30">
                <!-- Related Products Carousel-->
                <div class="section-title">
                    <h2 class="h3"><?php echo e(__('Related Product')); ?></h2>
                </div>

                <!-- Carousel-->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="home-blog-slider owl-carousel">
                            <?php $__currentLoopData = $related_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="slider-item">
                                    <div class="product-card">
                                        <?php if($related->is_stock()): ?>
                                            <?php if($related->is_type == 'new'): ?>
                                            <?php else: ?>
                                                
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <div
                                                class="product-badge bg-secondary border-default text-body
                                    ">
                                                <?php echo e(__('out of stock')); ?></div>
                                        <?php endif; ?>
                                        

                                        
                                        <div class="product-thumb">
                                            <a href="<?php echo e(route('front.product', $related->slug)); ?>"> <img class="lazy"
                                                    data-src="<?php echo e(asset('assets/images/' . $related->thumbnail)); ?>"
                                                    alt="<?php echo e($related->original_image_name); ?>"></a>
                                            <div class="product-button-group">
                                                
                                                
                                                
                                            </div>
                                            <div class="widhListCon">
                                                <a class="btn wishlist_store"
                                                    href="<?php echo e(route('user.wishlist.store', $item->id)); ?>"
                                                    title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-card-body">
                                            <div class="product-category">
                                                <a
                                                    href="<?php echo e(route('front.shopbycategory') . '?category=' . $related->category->slug); ?>"><?php echo e($related->category->name); ?></a>
                                            </div>
                                            <h3 class="product-title title_h3">
                                                <a href="<?php echo e(route('front.product', $related->slug)); ?>"
                                                    title="<?php echo e($related->name); ?>">
                                                    
                                                    <?php echo e($related->name); ?>

                                                </a>
                                            </h3>
                                            <div class="productItemPrice">
                                                <h4 class="product-price">
                                                    <?php if($related->previous_price != 0): ?>
                                                        <del><?php echo e(PriceHelper::setPreviousPrice($related->previous_price)); ?></del>
                                                    <?php endif; ?>
                                                    <?php echo e(PriceHelper::grandCurrencyPrice($related)); ?>

                                                </h4>
                                                <div class="addToCart-btn">
                                                    <?php echo $__env->make('includes.item_footer', ['sitem' => $related], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        <?php endif; ?>

    </div>

    <div>
        
        




        <?php if(auth()->guard()->check()): ?>
            <form class="modal fade ratingForm" action="<?php echo e(route('front.review.submit')); ?>" method="post" id="leaveReview"
                tabindex="-1">
                <?php echo csrf_field(); ?>
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo e(__('Leave a Review')); ?></h4>
                            <button class="close modal_close" type="button" data-bs-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <?php
                                $user = Auth::user();
                            ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="review-name"><?php echo e(__('Your Name')); ?></label>
                                        <input class="form-control" type="text" id="review-name"
                                            value="<?php echo e($user->first_name); ?>" required>
                                    </div>
                                </div>
                                <input type="hidden" name="item_id" value="<?php echo e($item->id); ?>">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="review-email"><?php echo e(__('Your Email')); ?></label>
                                        <input class="form-control" type="email" id="review-email"
                                            value="<?php echo e($user->email); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="review-subject"><?php echo e(__('Subject')); ?></label>
                                        <input class="form-control" type="text" name="subject" id="review-subject"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="review-rating"><?php echo e(__('Rating')); ?></label>
                                        <select name="rating" class="form-control" id="review-rating">
                                            <option value="5">5 <?php echo e(__('Stars')); ?></option>
                                            <option value="4">4 <?php echo e(__('Stars')); ?></option>
                                            <option value="3">3 <?php echo e(__('Stars')); ?></option>
                                            <option value="2">2 <?php echo e(__('Stars')); ?></option>
                                            <option value="1">1 <?php echo e(__('Star')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="review-message"><?php echo e(__('Review')); ?></label>
                                <textarea class="form-control" name="review" id="review-message" rows="8" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary"
                                type="submit"><span><?php echo e(__('Submit
                                                                        Review')); ?></span></button>
                        </div>


                    </div>
                </div>
            </form>

        <?php endif; ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Please Ask Here</h5>
                        <button type="button" class="close" onclick="closeForm()" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo e(route('front.quick.enquiry')); ?>" method="POST" id="send_message"
                        class="form-container">

                        <div class="modal-body">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">

                                <label for="name"><b>Name</b></label>
                                <input type="text" class="form-control mb-0" name="name">
                                <?php $__errorArgs = ['name'];
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

                            <div class="form-group">

                                <label for="email"><b>Email</b></label>
                                <input type="email" class="form-control mb-0" name="email">
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
                            <div class="form-group">

                                <label for="contact_number"><b>Contact Number</b></label>
                                <input type="tel" class="form-control mb-0" name="contact_number"><br>
                                <?php $__errorArgs = ['contact_number'];
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


                            
                            <div class="form-group">

                                <label for="message"><b>Message</b></label>
                                <textarea id="message" class="form-control mb-0" name="message" placeholder="Write something.."></textarea>
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

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="closeForm()">Close</button>
                            <button type="submit" class="btn  btn-primary" id="form_submit">Send
                                Message</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>


    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <script type="text/javascript" src="<?php echo e(asset('assets/front/js/magnifier.js')); ?>"></script>
        <!-- CSS only -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function() {

                var magnify = new magnifier();
                magnify.magnifyImg('.picZoomer img', magnification, magnifierSize);


                $('.piclist .item').on('click', function(event) {

                    var $pic = $(this).find('img');

                    // console.log($('.picZoomer img').attr('src',$pic.attr('src')));
                    $('.picZoomer img').attr('src', $pic.attr('src'));
                    $('.picZoomer img').attr('alt', $pic.attr('alt'));
                    var magnify = new magnifier();
                    magnify.magnifyImg('.picZoomer img', magnification, magnifierSize);


                });
                $('#send_message').validate({
                    rules: {
                        name: {
                            required: true,
                            maxlength: 255,
                        },
                        email: {
                            required: true,
                            email: true, //add an email rule that will ensure the value entered is valid email id.
                            maxlength: 255,
                        },
                        contact_number: {
                            required: true,
                            number: true,
                            maxlength: 150,
                        },
                        message: {
                            required: true,
                        },
                        'g-recaptcha-response': {
                            required: function() {
                                return grecaptcha.getResponse() === 0;
                            },
                        },
                    },

                });


                // $("#form_submit").click(function() {
                //         console.log($('#form_submit').valid());
                //         if(!$('#form_submit').valid()){
                //         event.preventDefault();
                //         var response = grecaptcha.getResponse(); // Get reCAPTCHA response
                //         if (response.length === 0) {
                //             // alert('Please complete the reCAPTCHA challenge.');


                //         } else {
                //             $('#myForm').unbind('submit').submit(); // Submit the form
                //         }
                //     }
                // });

                $('#exampleModal').on('shown.bs.modal', function() {
                    console.log("modal call back.....");
                    //$('#exampleModal').trigger('focus')
                })


            })
        </script>
        <script>
            function openForm() {

                $("#exampleModal").modal('show');
                // document.getElementById("myForm").style.display = "block";
            }

            function closeForm() {
                $("#exampleModal").modal('hide');
                //document.getElementById("myForm").style.display = "none";
            }




            function visitor_info($type) {


                // console.log(simple);

                $.getJSON("https://api.ipify.org/?format=json", function(e) {



                    $.ajax({

                        url: "<?php echo e(route('front.activity.log')); ?>",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",

                            'ip': e.ip,
                            'type': $type,

                        },
                        success: function(data) {
                            var response = data;
                            // console.log(response);
                            // console.log(response);


                        },

                    });

                });

            }
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/shopbycategory/product.blade.php ENDPATH**/ ?>
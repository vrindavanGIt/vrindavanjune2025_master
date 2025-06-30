
    <!-- Shop Toolbar-->
        <?php
        function renderStarRating($rating,$maxRating=5) {
            $fullStar = "<i class = 'far fa-star filled'></i>";
            $halfStar = "<i class = 'far fa-star-half filled'></i>";
            $emptyStar = "<i class = 'far fa-star'></i>";
            $rating = $rating <= $maxRating?$rating:$maxRating;

            $fullStarCount = (int)$rating;
            $halfStarCount = ceil($rating)-$fullStarCount;
            $emptyStarCount = $maxRating -$fullStarCount-$halfStarCount;

            $html = str_repeat($fullStar,$fullStarCount);
            $html .= str_repeat($halfStar,$halfStarCount);
            $html .= str_repeat($emptyStar,$emptyStarCount);
            $html = $html;
            return $html;
        }
        $checkcategorytitle=$items[0]?$items[0]->category:null;


        ?>



        <div class="row g-3" id="main_div">

            <?php if($items->count() > 0): ?>
            <?php if($checkType != 'list'): ?>

                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xxl-3 col-md-4 col-6">

                        <div class="product-card ">
                            <?php if($item->is_stock()): ?>

                            <?php else: ?>
                                <div class="product-badge bg-secondary border-default text-body"><?php echo e(__('out of stock')); ?></div>
                            <?php endif; ?>

                        <div class="product-thumb">

                          <a href="<?php echo e(url($item->slug)); ?>">  <img class="lazy" src="<?php echo e(asset('assets/images/'.$item->thumbnail)); ?>" data-src="<?php echo e(asset('assets/images/'.$item->thumbnail)); ?>" alt="<?php echo e($item->original_image_name); ?>"> </a>

                        </div>
                         <div class="widhListCon">
                                      <a class="btn wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                                  </div>
                        <div class="product-card-body">

                            <div class="product-category">
                                <a href="<?php echo e((($category) ? url($category->slug) : '')); ?>"> <span style=" font-weight: 600;"> <?php echo e((($category) ? $category->name : '')); ?> </span></a>
                            </div>
                            <h3 class="product-title"><a href="<?php echo e(url($item->slug)); ?>">
                                <?php echo e(strlen(strip_tags($item->name)) > $name_string_count ? substr(strip_tags($item->name), 0, 38) : strip_tags($item->name)); ?>

                            </a></h3>

                            <div class="rating-stars">
                                <?php echo renderStarRating($item->reviews->avg('rating')); ?>


                                <a class="btn wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>

                                <?php echo $__env->make('includes.item_footer',['sitem' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                            </div>
                            <div class="productItemPrice">
                            <h4 class="product-price">
                                <?php if($item->previous_price !=0): ?>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-lg-12">
                            <div class="product-card product-list">
                                <div class="product-thumb" >
                                <?php if($item->is_stock()): ?>

                                    <?php else: ?>
                                    <div class="product-badge bg-secondary border-default text-body"><?php echo e(__('out of stock')); ?></div>
                                    <?php endif; ?>

                                    <div class="product-thumb">

                                    <a href="<?php echo e(url($item->slug)); ?>"><img class="lazy" src="<?php echo e(asset('assets/images/'.$item->thumbnail)); ?>" data-src="<?php echo e(asset('assets/images/'.$item->thumbnail)); ?>" alt="<?php echo e($item->original_image_name); ?>"> </a>

                                        </div>
                                        <div class="widhListCon">
                                            <a class="btn wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                                        </div>
                                </div>


                                    <div class="product-card-inner">
                                        <div class="product-card-body">
                                            <div class="product-category"><a href="<?php echo e(url($item->category->slug)); ?>"><?php echo e($item->category->name); ?></a></div>
                                            <h3 class="product-title"><a href="<?php echo e(url('front.product',$item->slug)); ?>">
                                                <?php echo e(strlen(strip_tags($item->name)) > $name_string_count ? substr(strip_tags($item->name), 0, 52) .'...': strip_tags($item->name)); ?>

                                            </a></h3>
                                            <div class="rating-stars">
                                                <?php echo renderStarRating($item->reviews->avg('rating')); ?>


                                                <a class="btn wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>

                                                 <?php echo $__env->make('includes.item_footer',['sitem' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                            <h4 class="product-price">
                                                <?php if($item->previous_price !=0): ?>
                                                <del><?php echo e(PriceHelper::setPreviousPrice($item->previous_price)); ?></del>
                                                <?php endif; ?>
                                                <?php echo e(PriceHelper::grandCurrencyPrice($item)); ?>

                                            </h4>
                                            <div class="productItemPrice">
                                            <p class="text-sm sort_details_show  text-muted hidden-xs-down my-1">
                                            <?php echo e(strlen(strip_tags($item->sort_details)) > 100 ? substr(strip_tags($item->sort_details), 0, 100) : strip_tags($item->sort_details)); ?>

                                            </p>
                                            <div class="addToCart-btn" style="float: left;">
                                                <?php echo $__env->make('includes.item_footer',['sitem' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                              </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php else: ?>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="h4 mb-0"><?php echo e(__('No Product Found')); ?></h4>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>


        <!-- Pagination-->
        <div class="row mt-15" id="item_pagination">
            <div class="col-lg-12 text-center">
                <?php echo e(@$items->links()); ?>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


        

        <Script>
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


            },

            });

            });

    }
        </Script>

<?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/shopbycategory/catalog.blade.php ENDPATH**/ ?>
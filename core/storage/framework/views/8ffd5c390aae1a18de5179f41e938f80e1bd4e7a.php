<?php if(Route::current()->parameters() != null ): ?>
<?php
$sub_category_slug= isset(Route::getCurrentRoute()->parameters()['subcategory_slug'])?Route::getCurrentRoute()->parameters()['subcategory_slug']:null;
$getCategorySlug=null;
if(isset($sub_category_slug)){
    $getCategorySlug=App\Models\Subcategory::where('slug',$sub_category_slug)->with('category')->first();
    if(isset($getCategorySlug) && isset($getCategorySlug->category->slug)){
        $getCategorySlug = $getCategorySlug->category->slug;
    }
}
if(!isset($getCategorySlug)){
    $getCategorySlug=Route::current()->parameters()['slug'];
}
//sub category
$getSubCategory=App\Models\Subcategory::where('slug',$sub_category_slug)->with('category')->first();
    if(isset($getSubCategory)){
    $sub_category_meta_keywords_val = json_decode($getSubCategory->meta_keywords);
    $subCategory_meta_keywords =null;
    if(isset($sub_category_meta_keywords_val) && count($sub_category_meta_keywords_val)){
        $lastElement = end($sub_category_meta_keywords_val);
    foreach ($sub_category_meta_keywords_val as $key => $item) {
        if(isset($item->value)){
            $subCategory_meta_keywords .= $item->value;
            if($item != $lastElement) {
                $subCategory_meta_keywords .= ',';
            }
        }
    }

    }
    }

    //category
$categoryname=App\Models\Category::where('slug',$getCategorySlug)->with('subcategory')->first();
if(isset($categoryname)){
$meta_keywords = json_decode($categoryname->meta_keywords);
$category_meta_keywords =null;
if(isset($meta_keywords) && count($meta_keywords)){
    $lastElement = end($meta_keywords);
   foreach ($meta_keywords as $key => $item) {
    if(isset($item->value)){
        $category_meta_keywords .= $item->value;
        if($item != $lastElement) {
            $category_meta_keywords .= ',';
        }
    }
   }
}
}
?>
<?php endif; ?>

<?php if(isset($getSubCategory)): ?>
<?php $__env->startSection('meta'); ?>
        <meta name="keywords" content="<?php echo e($subCategory_meta_keywords??$setting->meta_keywords); ?>">
        <meta name="description" content="<?php echo e($getSubCategory->meta_descriptions??$setting->meta_description); ?>">
        <?php $__env->stopSection(); ?>
        <?php endif; ?>
<?php if(isset($getSubCategory)): ?>
    <?php $__env->startSection('title'); ?>
        <?php echo e(__(isset($getSubCategory)? $getSubCategory->meta_title?$getSubCategory->meta_title:$getSubCategory->name:'Tulsimala Shopping')); ?>

    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php if(isset($categoryname)): ?>
<?php $__env->startSection('meta'); ?>

        <meta name="keywords" content="<?php echo e($category_meta_keywords??$setting->meta_keywords); ?>">
        <meta name="description" content="<?php echo e($categoryname->meta_descriptions??$setting->meta_description); ?>">
<?php $__env->stopSection(); ?>
        <?php endif; ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__(isset($categoryname)? $categoryname->meta_title?$categoryname->meta_title:$categoryname->name:'Tulsimala Shopping')); ?>

<?php $__env->stopSection(); ?>

<style>
    /* #product__read__box p,
    #product__read__box h2,
    #product__read__box span {
        color: #235d23;
    } */
    </style>
<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
<div class="page-title breadcrums">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                <li class="separator"></li>
                <li><?php echo e(__('Tulsimala Shopping ')); ?></li>

                
                

                <?php if(isset($categoryname) ): ?>
                <li class="separator"></li>
                <li><?php echo e($categoryname->name); ?></li>
                <?php endif; ?>

              </ul>
          </div>
      </div>
    </div>
  </div>
  <!-- Page Content-->
  <?php

      $checkcategorytitle=$items[0]?$items[0]->category:null;
        $category_ids = App\Models\Category::with('subcategory')->where('is_menu',1)->pluck('id');
        $category_ids = end($category_ids);
        $category_is_not_ids = App\Models\Category::with('subcategory')->where('is_menu','!=',1)->pluck('id');
        $category_is_not_ids = end($category_is_not_ids);
        // if(isset($categoryname) ){
        //     if(isset($categoryname->id)){
        //         array_push($category_ids,$categoryname->id);
        //     }
        // }

      $categoriesAsMenu = App\Models\Category::with('subcategory')
                        ->whereStatus(1)
                        ->whereIn('id',$category_ids)
                        // ->where('is_menu',1)
                        ->orderby('serial','asc')->get();
      $categories_is_not_AsMenu = App\Models\Category::with('subcategory')
                        ->whereStatus(1)
                        ->whereIn('id',$category_is_not_ids)
                        // ->where('is_menu',1)
                        ->orderby('serial','asc')->get();
        $tulsimalaShoping=Route::currentRouteName();
       if(isset($tulsimalaShoping) && $tulsimalaShoping=='front.shopbycategory'){
        $categoriesAsMenu = App\Models\Category::with('subcategory')
                        ->whereStatus(1)
                        ->whereIn('id',$category_ids)
                        // ->where('is_menu',1)
                        ->orderby('serial','asc')->get();
       }




  ?>
  <div class="container padding-bottom-1x mb-1">
    <?php if(isset($tulsimala_content)): ?>
    <div class="row">
        <div class="WorldwideCon">
            <div class="section-title">
                <h2 class="wholesale-heading h3"> <?php echo $tulsimala_content->tulsi_shopping_title; ?> </h2>
            </div>
            <div class="WorldwideCon__text">
                <p classs="wholesale-text"> <?php echo $tulsimala_content->tulsi_shopping_description; ?> </p>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if(!isset($tulsimala_content)): ?>
    <?php if(isset($checkcategorytitle)): ?>
    <?php if($checkcategorytitle['category_title']  != null): ?>

    <section class="product__read__box ">
        <div class="">
            <div class="WorldwideCon">
                <?php if(isset($checkcategorytitle->category_title)): ?>
                <div class="section-title">
                    <h2 class="wholesale-heading h3"> <?php echo $checkcategorytitle->category_title; ?> </h2>
                </div>
                <?php endif; ?>
                <?php if(isset($checkcategorytitle->category_text)): ?>

                <div class="single-service single-service2 homeAboutWrapper product__read__box check-less-more-parent h-auto" id="product__read__box">
                    <span id="desc1" class="wholesale-text readmore readmore-fire" data-target="desc1" class="wholesale-text"><?php echo $checkcategorytitle->category_text; ?>  </span>
                    <p id="readmore-readeless" class="readmore-readeless readmore-fire readmore-fire-btn" data-target="desc1">Read more</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>
        <div class="row product__row">
          <div class="col-lg-12">
            <div class="shop-top-filter-wrapper">
                <div class="row">
                    <div class="col-md-12 col-10 gd-text-sm-center">
                        <div class="sptfl">
                            
                            <div class="shop-sorting">
                                <label for="sorting"><?php echo e(__('Sort by')); ?>:</label>
                                <select class="categoris catagory_dropdown sorting_dropdown selectpicker" id="sorting">
                                <option value=""><?php echo e(__('Latest Products')); ?></option>
                                <option value="low_to_high" <?php echo e(request()->input('low_to_high') ? 'selected' : ''); ?>><?php echo e(__('Low - High Price')); ?></option>
                                <option value="high_to_low" <?php echo e(request()->input('high_to_low') ? 'selected' : ''); ?>><?php echo e(__('High - Low Price')); ?></option>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mobileHidden gd-text-sm-center">
                        <div class="shop-view"><a class="list-view <?php echo e(Session::has('view_catalog') && Session::get('view_catalog') == 'grid' ? 'active' : ''); ?> " data-step="grid" href="javascript:;" data-href="<?php echo e(route('front.shopbycategory').'?view_check=grid'); ?>"><i class="fas fa-th-large"></i></a>
                            <a class="list-view <?php echo e(Session::has('view_catalog') && Session::get('view_catalog') == 'list' ? 'active' : ''); ?>" href="javascript:;" data-step="list" data-href="<?php echo e(route('front.shopbycategory').'?view_check=list'); ?>"><i class="fas fa-list"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar-toggle position-left"><button class="btn btn-secondary"><?php echo e(__('Filter Product')); ?><i class=""></i></div></button>
            

            
          </div>
        </div>
        <div class="row g-3">


          <div class="col-lg-9 order-lg-2" id="list_view_ajax">
            <?php echo $__env->make('front.shopbycategory.catalog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>

          <!-- Sidebar          -->
          <div class="col-lg-3 order-lg-1">

            <aside class="sidebar shop__catLeft sidebar-offcanvas position-left"><span class="sidebar-close"><i class="icon-x"></i></span>
                <section class="widget widget-categories card rounded">
                    <h3 class="widget-title"><?php echo e(__('Filter by Price')); ?></h3>
                    <form class="price-range-slider" method="post" data-start-min="<?php echo e(request()->input('minPrice') ? request()->input('minPrice') : '0'); ?>" data-start-max="<?php echo e(request()->input('maxPrice') ? request()->input('maxPrice') : $setting->max_price); ?>" data-min="0" data-max="<?php echo e($setting->max_price); ?>" data-step="5">
                      <div class="ui-range-slider"></div>
                      <footer class="ui-range-slider-footer">
                        <div class="column">
                          <button class="btn btn-primary btn-sm" id="price_filter" type="button"><span><?php echo e(__('Filter')); ?></span></button>
                        </div>
                        <div class="column">
                          <div class="ui-range-values">
                            <div class="ui-range-value-min"><?php echo e(PriceHelper::setCurrencySign()); ?><span class="min_price"></span>
                              <input type="hidden">
                            </div>-
                            <div class="ui-range-value-max"><?php echo e(PriceHelper::setCurrencySign()); ?><span class="max_price"></span>
                              <input type="hidden">
                            </div>
                          </div>
                        </div>
                      </footer>
                    </form>
                  </section>
                <!-- Widget Categories-->
              <?php if(count($categoriesAsMenu) ): ?>
              
              <section class="widget widget-categories shop-categories card rounded">
                <h3 class="widget-title"><?php echo e(__('Shop By Categories')); ?></h3>
                <ul class="category-scroll">
                    <?php $__currentLoopData = $categoriesAsMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <li class="has-children  <?php echo e(isset($category) && $category->id == $getcategory->id ? 'expand_active  active expanded' : ''); ?> ">
                      <a class="category_search" href="<?php echo e(url($getcategory->slug)); ?>"  data-href="<?php echo e($getcategory->slug); ?>"><?php echo e($getcategory->name); ?></a>

                        <ul id="subcategory_list" >
                          <?php if(count($getcategory->subcategory)): ?>
                            <?php $__currentLoopData = $getcategory->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="<?php echo e(isset($subcategory) && $subcategory->id == $getsubcategory->id ? 'active' : ''); ?> ">
                                
                              <a class="subcategory" href="<?php echo e(url($getcategory->slug.'/'.$getsubcategory->slug)); ?>" data-href="<?php echo e($getsubcategory->slug); ?>"><?php echo e($getsubcategory->name); ?></a>
                              <ul id="childcategory_list">
                                <?php if(count($getsubcategory->childcategory)): ?>
                                <?php $__currentLoopData = $getsubcategory->childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getchildcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="<?php echo e(isset($childcategory) && $getchildcategory->id == $getchildcategory->id ? 'active' : ''); ?>">
                                  <a class="childcategory" href="javascript:;" data-href="<?php echo e($getchildcategory->slug); ?>"><?php echo e($getchildcategory->name); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </ul>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                      </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <li id="category_list" class="has-children check_child_is_active">
                        <a class="category_search shoping_active" href="<?php echo e(route('front.shopbycategory')); ?>" >Tulsimala Shopping</a>
                        <ul id="subcategory_list" class="subCat_one">
                            <?php $__currentLoopData = $categories_is_not_AsMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <li class="has-children  find_has_child_active <?php echo e(isset($category) && $category->id == $getcategory->id ? 'expand_active active' : ''); ?> ">
                              <a class="category_search" href="<?php echo e(url($getcategory->slug)); ?>"  data-href="<?php echo e($getcategory->slug); ?>"><?php echo e($getcategory->name); ?></a>

                                <ul id="subcategory_list">
                                  <?php if(count($getcategory->subcategory)): ?>
                                    <?php $__currentLoopData = $getcategory->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="<?php echo e(isset($subcategory) && $subcategory->id == $getsubcategory->id ? 'active' : ''); ?> ">
                                        
                                      <a class="subcategory" href="<?php echo e(url($getcategory->slug.'/'.$getsubcategory->slug)); ?>" data-href="<?php echo e($getsubcategory->slug); ?>"><?php echo e($getsubcategory->name); ?></a>
                                      <ul id="childcategory_list">
                                        <?php if(count($getsubcategory->childcategory)): ?>
                                        <?php $__currentLoopData = $getsubcategory->childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getchildcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="<?php echo e(isset($childcategory) && $getchildcategory->id == $getchildcategory->id ? 'active' : ''); ?>">
                                          <a class="childcategory" href="javascript:;" data-href="<?php echo e($getchildcategory->slug); ?>"><?php echo e($getchildcategory->name); ?></a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                      </ul>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                              </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                    </li>
                </ul>
              </section>
              <?php endif; ?>

              
                   <!-- Widget Price Range-->


              <?php if(isset($categoryname ) && count($categoryname->subcategory) || isset($sub_category_slug)): ?>


              <section class="widget widget-categories shop-categories card rounded d-xl-none d-lg-none d-md-none d-sm-none d-block">
                <h3 class="widget-title">Search by Deity</h3>
                <ul class="mobile__subcategory mobile__subcategory">
                    <?php $__currentLoopData = $categoryname->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?php echo e(isset($sub_category_slug) ? $getsubcategory->slug==$sub_category_slug? 'deity__active':'':''); ?>">
                            <a class="subcategory" href="<?php echo e(url($getcategory->slug.'/'.$getsubcategory->slug)); ?>"><?php echo e($getsubcategory->name); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </section>


              <?php endif; ?>

              
              

              
              <div style="display: none">
              <?php if($setting->is_attribute_search == 1): ?>
              <?php $__currentLoopData = $attrubutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attrubute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <section class="widget widget-categories card rounded">
                <h3 class="widget-title"><?php echo e(__('Filter by')); ?> <?php echo e($key); ?></h3>
                <?php $__currentLoopData = $attrubute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input option"   type="checkbox" value="<?php echo e($options); ?>" id="<?php echo e($options); ?>">
                    <label class="custom-control-label" for="<?php echo e($options); ?>"><?php echo e($options); ?><span class="text-muted"></span></label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </section>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>

              <!-- Widget Brand Filter-->
              


            </aside>
          </div>
        </div>
      </div>



      <form id="search_form" class="d-none" action="<?php echo e(route('front.shopbycategory')); ?>" method="GET">

        <input type="text" name="maxPrice" id="maxPrice" value="<?php echo e(request()->input('maxPrice') ? request()->input('maxPrice') : ''); ?>">
        <input type="text" name="minPrice" id="minPrice" value="<?php echo e(request()->input('minPrice') ? request()->input('minPrice') : ''); ?>">
        <input type="text" name="brand" id="brand" value="<?php echo e(isset($brand) ? $brand->slug : ''); ?>">
        <input type="text" name="brand" id="brand" value="<?php echo e(isset($brand) ? $brand->slug : ''); ?>">
        <input type="text" name="category" id="category" value="<?php echo e(isset($category) ? $category->slug : ''); ?>">
        <input type="text" name="quick_filter" id="quick_filter" value="">
        <input type="text" name="childcategory" id="childcategory" value="<?php echo e(isset($childcategory) ? $childcategory->slug : ''); ?>">
        <input type="text" name="page" id="page" value="<?php echo e(isset($page) ? $page : ''); ?>">
        <input type="text" name="attribute" id="attribute" value="<?php echo e(isset($attribute) ? $attribute : ''); ?>">
        <input type="text" name="option" id="option" value="<?php echo e(isset($option) ? $option : ''); ?>">
        <input type="text" name="subcategory" id="subcategory" value="<?php echo e(isset($subcategory) ? $subcategory->slug : ''); ?>">
        <input type="text" name="sorting" id="sorting" value="<?php echo e(isset($sorting) ? $sorting : ''); ?>">
        <input type="text" name="view_check" id="view_check" value="<?php echo e(isset($view_check) ? $view_check : ''); ?>">
        <input type="text" name="tag" id="tag" value="<?php echo e(isset($tag) ? $tag : ''); ?>">


        <button type="submit" id="search_button" class="d-none"></button>
    </form>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/shopbycategory/index.blade.php ENDPATH**/ ?>
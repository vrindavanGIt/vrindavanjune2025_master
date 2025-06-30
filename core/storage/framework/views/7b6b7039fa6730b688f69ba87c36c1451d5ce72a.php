<?php
    $meta_keywords = "";
    if(isset($presence_details->meta_keywords)){
        $array = json_decode($presence_details->meta_keywords, true);
        $meta_keywords = implode(', ', array_column($array, 'value'));
    }
?>
<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="<?php echo e($meta_keywords); ?>">
<meta name="description" content="<?php echo e($presence_details->meta_description); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('Products')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Title-->

        <div class="page-title breadcrums mb-0 ">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                        <li class="separator"></li>
                        <li> <span style="text-transform: uppercase"> <?php echo e($presence_details->title); ?></span></li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
  <!-- Page Content-->






    

    <div class="pt-4 pb-4">
        <div class="container ">
            <!-- Categories-->
            <div class="row">
                <div class="col-lg-12 mb-0 mt-0">
                    <div class="card">
                        <div class="card-body px-0 py-0">
                            <h1 class="d-block presence__title text-center"><b><?php echo e($presence_details->title); ?></b></h1>
                            <div class="presence__content">
                                <?php echo $presence_details->description; ?>

                            </div>
                        </div>
                    </div>
                </div>
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


<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/our_presence/presence_details.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__($page->title)); ?>

<?php $__env->stopSection(); ?>

<?php
    $meta_keywords = "";
    if(isset($page->meta_keywords)){
        $array = json_decode($page->meta_keywords, true);
        $meta_keywords = implode(', ', array_column($array, 'value'));
    }
?>
<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="<?php echo e($meta_keywords); ?>">
<meta name="description" content="<?php echo e($page->meta_descriptions); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
<div class="page-title breadcrums">
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                <li class="separator">&nbsp;</li>
                <li><?php echo e($page->title); ?></li>
            </ul>
        </div>
    </div>
  </div>
</div>
<?php
  $google_review=DB::table('google_reviews')->take(10)->get();
?>

<!-- Page Content-->
<div class="pt-0 pb-4">
    <div class="container ">
        <!-- Categories-->
        <div class="row">
            <div class="col-lg-12 mb-0 mt-0">
                <div class="card">
                    <div class="card-body px-0 py-0">
                        <h1 class="d-block policy__title text-center"><b><?php echo e($page->title); ?></b></h1>
                        <div class="d-page-content policy__content">
                            <?php echo $page->details; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/page.blade.php ENDPATH**/ ?>
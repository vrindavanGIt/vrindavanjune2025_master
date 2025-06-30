<?php
    $meta_keywords = "";
    if(isset($presence->meta_keywords)){
        $array = json_decode($presence->meta_keywords, true);
        $meta_keywords = implode(', ', array_column($array, 'value'));
    }
?>
<?php $__env->startSection('meta'); ?>
    <meta name="keywords" content="<?php echo e($meta_keywords); ?>">
    <meta name="description" content="<?php echo e($presence->meta_description); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Our Presence')); ?>

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
                <li><?php echo e(__('Our Presence')); ?></li>
              </ul>
          </div>
      </div>
    </div>
  </div>
  <!-- Page Content-->

  <div class="WorldwideCon presence__wordwide pt-0 pb-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-12">
          <div class="single-service single-service2">
            <div class="category_description">
                <?php echo $presence->description; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="container pb-4 mb-1">


        <div class="row g-3">

          <div class="" id="list_view_ajax">
            <?php echo $__env->make('front.our_presence.presence_item_table',["data"=>$data ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>

          <!-- Sidebar          -->
          <div class="col-lg-4 order-lg-2">
            <div class="sidebar-toggle position-left"><i class="icon-filter"></i></div>
            <aside class="sidebar sidebar-offcanvas position-left"><span class="sidebar-close"><i class="icon-x"></i></span>
              <!-- Widget Categories-->
              




            </aside>
          </div>
        </div>
      </div>




<?php $__env->stopSection(); ?>


<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/our_presence/our_presence_category.blade.php ENDPATH**/ ?>
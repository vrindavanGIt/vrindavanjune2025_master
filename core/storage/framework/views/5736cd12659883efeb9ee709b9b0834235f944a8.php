<?php $__env->startSection('title'); ?>
    <?php echo e(__('Blogs')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
<div class="page-title breadcrums mb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                    <li class="separator"></li>
                    <li><?php echo e(__('Blog')); ?></li>
                  </ul>
            </div>
        </div>
    </div>
  </div>
  

  <div class="container padding-bottom-0x pt-4 mb-1 blog-page">
    <div class="row ">
            <!-- Content-->
            <div class="col-xl-9 col-lg-8 order-lg-1">
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-md-4">
                          <div class="blog__postTHumb">
                              <a href="<?php echo e(url($post->slug)); ?>" class="blog-post">
                                  <div class="post-thumb">
                                      <img class="lazy" data-src="<?php echo e(asset('assets/images/' . json_decode($post->photo, true)[array_key_first(json_decode($post->photo, true))])); ?>"
                                          alt="Blog Post">
                                      </div>
                                  <div class="post-body">

                                      <h3 class="post-title title_tooltip" data-html="true" data-toggle="tooltip"  title="<?php echo $post->title; ?>"><?php echo App\Helpers\CommonHelper::truncate($post->title,95,'...'); ?>

                                      </h3>
                                      <ul class="post-meta">

                                          
                                          <li><i class="icon-clock"></i><?php echo e(date('jS F, Y', strtotime($post->created_at))); ?></li>
                                      </ul>
                                      <p><?php echo App\Helpers\CommonHelper::truncate($post->details ); ?>

                                      </p>
                                  </div>
                              </a>
                          </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <?php echo e(__('No Data Found')); ?>

                                </div>
                            </div>
                        </div>
                     <?php endif; ?>

                </div>
                <div class="row">
                    <div class="col-lg-12 text-center pb-4">
                        <?php echo e($posts->links()); ?>

                    </div>
                </div>
            </div>
            <!-- Sidebar          -->
            <div class="col-xl-3 col-lg-4 order-lg-2">
              <div class="sidebar-toggle position-left"><i class="icon-filter"></i></div>
              <aside class="sidebar blog_detailAside sidebar-offcanvas position-left"><span class="sidebar-close"><i class="icon-x"></i></span>
                <!-- Widget Search-->
                
                <!-- Widget Categories-->
                
                <!-- Widget Featured Posts-->
                <section class="widget widget-featured-posts card rounded p-4 pt-0">
                  <h3 class="widget-title"><?php echo e(__('Most Recent Added Posts')); ?></h3>
                 <?php $__currentLoopData = $recent_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="entry">
                  <div class="entry-thumb"><a href="<?php echo e(url($recent->slug)); ?>"><img src="<?php echo e(asset('assets/images/'.json_decode($recent->photo,true)[array_key_first(json_decode($recent->photo,true))])); ?>" alt="Post"></a></div>
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="<?php echo e(url($recent->slug)); ?>">
                      <?php echo e(strlen(strip_tags($recent->title)) > 55 ? substr(strip_tags($recent->title), 0, 55) . '...' : strip_tags($recent->title)); ?>


                  </a></h4>
                  
                  </div>
                </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </section>
                <!-- Widget Tags-->
                
              </aside>
            </div>

          </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/blog/index.blade.php ENDPATH**/ ?>
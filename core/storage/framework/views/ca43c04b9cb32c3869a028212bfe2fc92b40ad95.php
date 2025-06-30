<?php $__env->startSection('title'); ?>
    <?php echo e(__($post->title)); ?>

<?php $__env->stopSection(); ?>
<?php
    $meta_keywords = "";
    if(isset($post->meta_keywords)){
        $array = json_decode($post->meta_keywords, true);
        $meta_keywords = implode(', ', array_column($array, 'value'));
    }
?>
<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="<?php echo e($meta_keywords); ?>">
<meta name="description" content="<?php echo e($post->meta_descriptions); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-title breadcrums">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a>
                </li>
                <li class="separator"></li>
                <li><a href="<?php echo e(route('front.blog')); ?>"><?php echo e(__('Blog')); ?></a>
                </li>
                <li class="separator"></li>
                <li><?php echo e($post->title); ?></li>
              </ul>
          </div>
      </div>
    </div>
  </div>
  <!-- Page Content-->
  <div class="container padding-bottom-1x mb-1">
  <div class="row">
          <!-- Content-->
          <div class="col-xl-9 col-lg-8 order-lg-1">
            <div class="card blog-details-box">
              <div class="blog-details-main-content">
                <h4 class="pt-0 b-d-title"><?php echo e($post->title); ?></h4>
                  <ul class="post-meta mb-4">
                    <li><i class="icon-user"></i><a href="javascript:;}"><?php echo e(__('Tulsi Mala Store')); ?></a></li>
                    
                    <li><i class="icon-clock"></i><a href="javascript:;"><?php echo e(date('jS F, Y', strtotime($post->created_at))); ?></a></li>
                    <div class="pb-2"><span class="d-inline-block align-middle text-sm text-muted"><?php echo e(__('Share post:')); ?></span>
                        <a class="social-button shape-rounded sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="social-button shape-rounded sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="social-button shape-rounded sb-linkedin" href="#" data-toggle="tooltip" data-placement="top" title="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                  </ul>

                </div>
                <!-- Gallery-->
                <div class="blog-details-slider owl-carousel">


                    <?php $__currentLoopData = json_decode($post->photo,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(asset('assets/images/'.$photo)); ?>" alt="Image">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="blog-details-main-content pt-4">

                      <div>
                          <?php echo $post->details; ?>

                      </div>

                      <!-- Post Tags + Share-->
                      <div class="d-flex flex-wrap justify-content-between align-items-center pt-0 pb-0">

                          <?php if($post->tags): ?>
                          <div class="pb-0">
                              <?php echo e(__('Tags :')); ?>

                              <?php $__currentLoopData = explode(',',$post->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($loop->last): ?>
                              <a class="text-sm text-muted navi-link" href="<?php echo e(route('front.blog').'?tag='.$tag); ?>"><?php echo e($tag); ?></a>
                              <?php else: ?>
                              <a class="text-sm text-muted navi-link" href="<?php echo e(route('front.blog').'?tag='.$tag); ?>"><?php echo e($tag); ?></a>,
                              <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                          <?php endif; ?>



                    
                </div>
                </div>
            </div>

            


          </div>
          <!-- Sidebar          -->
          <div class="col-xl-3 col-lg-4 order-lg-2">
            <div class="sidebar-toggle blog_detail_toggle"><i class="icon-filter"></i></div>
            <aside class="sidebar sidebar-offcanvas blog_detailAside position-left"><span class="sidebar-close"><i class="icon-x"></i></span>
              <!-- Widget Search-->
              
              <!-- Widget Categories-->
              
              <!-- Widget Featured Posts-->
              <section class="widget widget-featured-posts card rounded p-0 mb-30">
                <h3 class="widget-title"><?php echo e(__('Most Recent Added Posts')); ?></h3>

               <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php
                $img='';
                $img_count = count(json_decode($recent->photo));
                if($img_count){
                  $img = json_decode($recent->photo,true)[array_key_first(json_decode($recent->photo,true))];
                }
               ?>
               <div class="entry">
                <div class="entry-thumb"><a href="<?php echo e(url($recent->slug)); ?>"><img src="<?php echo e(asset('assets/images/'.$img)); ?>" alt="Post"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="<?php echo e(url($recent->slug)); ?>">
                    <?php echo e(strlen(strip_tags($recent->title)) > 55 ? substr(strip_tags($recent->title), 0, 55) . '...' : strip_tags($recent->title)); ?>


                </a>
            </h4>
            
                </div>
              </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </section>
              <!-- Widget Tags-->
              
            </aside>
          </div>
        </div>

        <div class="row">
            <div class="col-12">
                <?php if($post->category->posts->where('id','!=',$post->id)->count() > 0): ?>

                <div class="row">
                    <div class="col-lg-12 pb-2">
                        <div class="section-title">
                            <h2 class="h3"><?php echo e(__('You May Also Like')); ?></h2>
                        </div>
                    </div>
                </div>
                <!-- Relevant Posts-->
                <div class="resent-blog-slider owl-carousel" >
                    <?php if(isset($post->category) && isset($post->category->posts)): ?>
                        <?php $__currentLoopData = $post->category->posts->where('id','!=',$post->id)->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="widget widget-featured-posts">
                            <div class="entry">
                            <div class="entry-thumb"><a href="<?php echo e(url($like_post->slug)); ?>"><img src="<?php echo e(asset('assets/images/'.json_decode($like_post->photo,true)[array_key_first(json_decode($like_post->photo,true))])); ?>" alt="Post"></a></div>
                            <div class="entry-content">
                                <h4 class="entry-title"><a href="<?php echo e(url($like_post->slug)); ?>">
                                    <?php echo e(strlen(strip_tags($like_post->title)) > 75 ? substr(strip_tags($like_post->title), 0, 75) . '...' : strip_tags($like_post->title)); ?>

                                </a></h4>
                                <span class="entry-meta"> <?php echo e(__('')); ?></span>
                            </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/blog/show.blade.php ENDPATH**/ ?>
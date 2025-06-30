
<?php
    $categories = App\Models\Category::with('subcategory')->whereStatus(1)->orderby('serial','asc')->get();
?>


<div class="widget-categories mobile-cat">
    <ul id="category_list">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="has-children">
            <a class="category_search" href="<?php echo e(route('front.shopbycategory').'?category='.$getcategory->slug); ?>"><?php echo e($getcategory->name); ?>

                <?php if($getcategory->subcategory->count() > 0): ?>
                    <span><i class="icon-chevron-down"></i></span>
                <?php endif; ?>
            </a>
<!--               <ul id="subcategory_list"> -->
            <ul>
                <?php $__currentLoopData = $getcategory->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="">
                    
<!--                        <ul id="childcategory_list"> -->
                    <ul>
                        <?php $__currentLoopData = $getsubcategory->childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getchildcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="">
                            <a class="childcategory" href="<?php echo e(route('front.shopbycategory').'?childcategory='.$getchildcategory->slug); ?>"><?php echo e($getchildcategory->name); ?></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>







<?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/includes/mobile-category.blade.php ENDPATH**/ ?>
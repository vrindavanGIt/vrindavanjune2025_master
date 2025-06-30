
<?php
    $categories = App\Models\Category::with('subcategory')->whereStatus(1)->orderby('serial','asc')->get();
    $category_slug_stack = [];
    $subcategory_slug_stack = [];
    foreach ($categories as $key => $category) {
        array_push($category_slug_stack,$category->slug);
        foreach ($category->subcategory as $key => $value) {
            array_push($subcategory_slug_stack,$value->slug);
        }
        }

    ?>
<!-- <ul id="category_list" class="dropdown-menu  <?php echo e(in_array($getcategoryurl,$category_slug_stack) ||  in_array( $get_item_category,$category_slug_stack)   ? 'show' : ''); ?>" aria-labelledby="dropdownMenuButton1"> -->

<ul class="dropdown-menu  <?php echo e(in_array($getcategoryurl,$category_slug_stack) ||  in_array( $get_item_category,$category_slug_stack)   ? 'show' : ''); ?>" aria-labelledby="dropdownMenuButton1">

    
    
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
   <!-- <li id="categoryid" class="<?php echo e((isset($slug) && ($getcategory->slug == $slug) ) ? 'active' : ''); ?> <?php echo e($get_item_category== $getcategory->slug? 'active':''); ?>   has-children"> -->
        <li class="<?php echo e((isset($slug) && ($getcategory->slug == $slug) ) ? 'active' : ''); ?> <?php echo e($get_item_category== $getcategory->slug? 'active':''); ?>   has-children">
            <a class="category_search mobile__searchcategory" href="<?php echo e(url($getcategory->slug)); ?>"><?php echo e($getcategory->name); ?>

                <?php if($getcategory->subcategory->count() > 0): ?>
                <span class="mobile_view_drop_down" onclick="drop_down(<?php echo e($getcategory->id); ?>)" ><i class="icon-chevron-down" ></i></span>
                <?php endif; ?>
            </a>
            <ul class="mobile__subcategory mobile__subcategory_<?php echo e($getcategory->id); ?> <?php echo e(isset($subcategory) ? $getcategory->id==$subcategory->category_id? 'show__mobile__subcategory':'':''); ?> <?php echo e(isset($slug) ? $slug==$getcategory->slug? 'show__mobile__subcategory':'':''); ?>">
                <?php $__currentLoopData = $getcategory->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e(isset($subcategory) ? $getsubcategory->slug==$subcategory->slug? 'sub__active':'':''); ?>">
                    <a class="subcategory" href="<?php echo e(url($getcategory->slug.'/'.$getsubcategory->slug)); ?>"><?php echo e($getsubcategory->name); ?></a>
<!--                     <ul id="childcategory_list" > -->
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











<?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/includes/mobile-category-navbar.blade.php ENDPATH**/ ?>
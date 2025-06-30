<?php if(@$sitem->item_type != 'affiliate'): ?>
    <?php if(@$sitem->is_stock()): ?>
    <a class="btn product-button add_to_single_cart"  onclick="visitor_info(1)"  data-target="<?php echo e(@$sitem->id); ?>" href="javascript:;"  title="<?php echo e(__('To Cart')); ?>"><i class="icon-shopping-cart"></i>
    </a>
    <?php else: ?>
    <a class="product-button" href="<?php echo e(route('front.product',@$sitem->slug)); ?>" title="<?php echo e(__('Details')); ?>"><i class="icon-arrow-right"></i></a>
    <?php endif; ?>
<?php else: ?>
<a class="product-button" href="<?php echo e(@$sitem->affiliate_link); ?>" target="_blank" title="<?php echo e(__('Buy Now')); ?>"><i class="icon-arrow-right"></i></a>
<?php endif; ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/includes/item_footer.blade.php ENDPATH**/ ?>
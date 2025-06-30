<?php
    $data = $row;
?>
<div class="dropdown">
    <button class="btn btn-secondary btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo e(__('Options')); ?>

    </button>
    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
      <?php if($data->item_type == 'normal'): ?>
      <a class="dropdown-item" href="<?php echo e(route('back.item.edit',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Edit')); ?></a>
      <?php elseif($data->item_type =='digital'): ?>
      <a class="dropdown-item" href="<?php echo e(route('back.digital.item.edit',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Edit')); ?></a>
      <?php elseif($data->item_type =='affiliate'): ?>
      <a class="dropdown-item" href="<?php echo e(route('back.affiliate.edit',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Edit')); ?></a>
      <?php else: ?>
      <a class="dropdown-item" href="<?php echo e(route('back.license.item.edit',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Edit')); ?></a>
      <?php endif; ?>
        <?php if($data->status == 1): ?>
        <a class="dropdown-item" target="_blank" href="<?php echo e(url($data->slug)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('View')); ?></a>
      <?php endif; ?>
      
      <a class="dropdown-item" href="<?php echo e(route('back.attribute.index',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Attributes')); ?></a>
      <a class="dropdown-item" href="<?php echo e(route('back.option.index',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Attribute Options')); ?></a>
      
      <a class="dropdown-item" href="<?php echo e(route('back.item.gallery',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Gallery Images')); ?></a>
      <a class="dropdown-item" href="<?php echo e(route('back.item.highlight',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Highlight')); ?></a>
      <a class="dropdown-item" data-toggle="modal"
      data-target="#confirm-delete" href="javascript:;"
      data-href="<?php echo e(route('back.item.destroy',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Delete')); ?></a>
    </div>
  </div><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/back/item/parsal/action.blade.php ENDPATH**/ ?>
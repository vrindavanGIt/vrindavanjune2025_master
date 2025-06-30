<?php
    $data = $row;
?>
  <div class="dropdown">
    <button class="btn btn-<?php echo e($data->status == 1 ? 'success' : 'danger'); ?> btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo e($data->status == 1 ? __('Publish') : __('Unpublish')); ?>

    </button>
    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="<?php echo e(route('back.item.status',[$data->id,1])); ?>"><?php echo e(__('Publish')); ?></a>
      <a class="dropdown-item" href="<?php echo e(route('back.item.status',[$data->id,0])); ?>"><?php echo e(__('Unpublish')); ?></a>
    </div>
  </div><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/back/item/parsal/item_status_drop_down.blade.php ENDPATH**/ ?>
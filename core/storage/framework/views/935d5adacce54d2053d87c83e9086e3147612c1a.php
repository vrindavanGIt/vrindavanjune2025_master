<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr id="order-bulk-delete">
  <td><input type="checkbox" class="bulk-item" value="<?php echo e($data->id); ?>"></td>

    <td>
        <?php echo e($data->id); ?>

    </td>
    <?php

    $subtotal_with_paypal_charge=(PriceHelper::OrderTotalWithoutNumberformat($data) + PriceHelper::OrderTotalWithoutNumberformat($data)*$data->paypal_fee/100);
    // dd( $subtotal_with_paypal_charge);
    ?>

    <td>
      <?php if($setting->currency_direction == 1): ?>
      <?php echo e($data->currency_sign); ?><?php echo e(round(($subtotal_with_paypal_charge),2)); ?>

      <?php else: ?>
      <?php echo e(round(($subtotal_with_paypal_charge),2)); ?><?php echo e($data->currency_sign); ?>

      <?php endif; ?>
    </td>

    <td>
        <div class="dropdown">
            <button class="btn btn-<?php echo e($data->payment_status == 'Paid' ?  'success': 'danger'); ?> btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php if($data->payment_status == 'Partially Paid'): ?>
                    <?php echo e(__('Partially Paid')); ?>

            <?php else: ?>

                    <?php echo e($data->payment_status == 'Paid' ?  __('Paid') : __('Unpaid')); ?>

            <?php endif; ?>
            </button>
            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" data-toggle="modal" data-target="#statusModal" href="javascript:;" data-href="<?php echo e(route('back.order.status',[$data->id,'payment_status','Paid'])); ?>"><?php echo e(__('Paid')); ?></a>
              <a class="dropdown-item" data-toggle="modal" data-target="#statusModal" href="javascript:;" data-href="<?php echo e(route('back.order.status',[$data->id,'payment_status','Unpaid'])); ?>"><?php echo e(__('Unpaid')); ?></a>
              <a class="dropdown-item" data-toggle="modal" data-target="#statusModal" href="javascript:;" data-href="<?php echo e(route('back.order.status',[$data->id,'payment_status','Partially Paid'])); ?>"><?php echo e(__('Partially Paid')); ?></a>
            </div>
          </div>
    </td>
    <td>
        <div class="dropdown">
            <button class="btn <?php echo e($data->order_status); ?>  btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo e($data->order_status); ?>

            </button>
            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" data-toggle="modal" data-target="#statusModal" href="javascript:;" data-href="<?php echo e(route('back.order.status',[$data->id,'order_status','Pending'])); ?>"><?php echo e(__('Pending')); ?></a>
              <a class="dropdown-item" data-toggle="modal" data-target="#statusModal" href="javascript:;" data-href="<?php echo e(route('back.order.status',[$data->id,'order_status','In Progress'])); ?>"><?php echo e(__('In Progress')); ?></a>
              <a class="dropdown-item" data-toggle="modal" data-target="#statusModal" href="javascript:;" data-href="<?php echo e(route('back.order.status',[$data->id,'order_status','Delivered'])); ?>"><?php echo e(__('Delivered')); ?></a>
              <a class="dropdown-item" data-toggle="modal" data-target="#statusModal" href="javascript:;" data-href="<?php echo e(route('back.order.status',[$data->id,'order_status','Canceled'])); ?>"><?php echo e(__('Canceled')); ?></a>
            </div>
          </div>
    </td>
    <td>
        <div class="action-list">
            <a class="btn btn-secondary btn-sm"
                href="<?php echo e(route('back.order.invoice',$data->id)); ?>">
                <i class="fas fa-eye"></i>
            </a>
            <a class="btn btn-danger btn-sm " data-toggle="modal"
                data-target="#confirm-delete" href="javascript:;"
                data-href="<?php echo e(route('back.order.delete',$data->id)); ?>">
                <i class="fas fa-trash-alt"></i>
            </a>
        </div>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/back/order/table.blade.php ENDPATH**/ ?>
<?php if(!isset($error)): ?>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        .progress-area-step {
            margin-bottom: 1rem;
        }

        @media  screen and (max-width:580px) {
            .progress-area-step {
                margin-bottom: 1rem;
            }

            .progress-steps {
                display: flex;
                margin: 0px;
                padding: 0px;
            }

            .progress-steps li .icon {
                font-size: 22px;
            }

            .progress-steps li:after {
                width: calc(115% - 30px);
                right: calc(45% + 14px);
            }

            .progress-steps li .progress-title {
                font-size: 12px;
                font-weight: 500;
                line-height: 15px;
                padding-top: 5px;
            }
        }
    </style>

    <?php if(!$order->shipment_carrier == null): ?>
        <div class="row justify-content-center py-0">
            <div class="col-lg-8">
                <div class="shipment__detTable">
                    <h6>Shipment details</h6>
                    <div class="detTable__wrapper">
                        <table class="table">
                            <tr>
                                <th>Shipping Carrier</th>
                                <th>Tracking Number</th>
                                <th style="text-align: center">Tracking URL</th>
                                <th>Shipping</th>
                            </tr>
                            <tr>
                                <td><?php echo e($order['shipment_carrier']); ?></td>
                                <td><?php echo e($order['tracking_number']); ?></td>
                                <td style="text-align: center"> <a href=" <?php echo e($order['tracking_url']); ?>" target="_blank"> <i
                                            class="fa fa-external-link" aria-hidden="true"></i></a> </td>
                                <td><?php echo e($order->payment_status); ?></td>

                            </tr>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="progress-area-step pt-sm-3 pt-0 mb-0">

        <ul class="progress-steps">

            <?php for($i = 0; $i <= $numbers; $i++): ?>

                <?php if($i == 0): ?>
                    <?php if(!empty($track_orders[$i])): ?>
                        <?php if($track_orders[$i]['title'] == 'Pending'): ?>
                            <li class="active">
                                <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
                                <div class="progress-title"><?php echo e(__('Pending')); ?></div>
                                
                                <div class="progress-title"><?php echo e(__('Product at hub')); ?></div>
                            </li>
                        <?php else: ?>
                            <li>
                                <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
                                <div class="progress-title"><?php echo e(__('Pending')); ?></div>
                                <div class="progress-title"><?php echo e(__('Soon')); ?></div>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li>
                            <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
                            <div class="progress-title"><?php echo e(__('Pending')); ?></div>
                            <div class="progress-title"><?php echo e(__('Soon')); ?></div>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(!isset($track_orders[3])): ?>


                    <?php if($i == 1): ?>
                        <?php if(!empty($track_orders[$i])): ?>
                            <?php if($track_orders[$i]['title'] == 'In Progress'): ?>
                                <li class="active">
                                    <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
                                    <div class="progress-title"><?php echo e(__('Processing')); ?></div>
                                    
                                    <div class="progress-title"><?php echo e(__('Out for delivery')); ?></div>
                                </li>
                            <?php else: ?>
                                <li>
                                    <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
                                    <div class="progress-title"><?php echo e(__('Processing')); ?></div>
                                    <div class="progress-title"><?php echo e(__('Soon')); ?></div>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li>
                                <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
                                <div class="progress-title"><?php echo e(__('Processing')); ?></div>
                                <div class="progress-title"><?php echo e(__('Soon')); ?></div>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>


                    <?php if($i == 2): ?>
                        <?php if(!empty($track_orders[$i])): ?>
                            <?php if($track_orders[$i]['title'] == 'Delivered'): ?>
                                <li class="active">
                                    <div class="icon"><i class="fas fa-check-circle"></i></div>
                                    <div class="progress-title"><?php echo e(__('Delivered')); ?></div>
                                    
                                    <div class="progress-title"><?php echo e(__('Delivered to Customer')); ?></div>
                                </li>
                            <?php else: ?>
                                <li>
                                    <div class="icon"><i class="fas fa-check-circle"></i></div>
                                    <div class="progress-title"><?php echo e(__('Delivered')); ?></div>
                                    <div class="progress-title"><?php echo e(__('Soon')); ?></div>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li>
                                <div class="icon"><i class="fas fa-check-circle"></i></div>
                                <div class="progress-title"><?php echo e(__('Delivered')); ?></div>
                                <div class="progress-title"><?php echo e(__('Soon')); ?></div>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                <?php endif; ?>

                <?php if($i == 3): ?>
                    <?php if(!empty($track_orders[$i])): ?>
                        <?php if($track_orders[$i]['title'] == 'Canceled'): ?>
                            <li class="active">
                                <div class="icon"><i class="fas fa-times-circle"></i></div>
                                <div class="progress-title"><?php echo e(__('Rejected')); ?></div>
                                
                                <div class="progress-title"><?php echo e(__('Cancelled by Customer')); ?></div>
                            </li>
                        <?php else: ?>
                            <li>
                                <div class="icon"><i class="fas fa-times-circle"></i></div>
                                <div class="progress-title"><?php echo e(__('Rejected')); ?></div>
                                <div class="progress-title"><?php echo e(__('Not')); ?></div>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li>
                            <div class="icon"><i class="fas fa-times-circle"></i></div>
                            <div class="progress-title"><?php echo e(__('Rejected')); ?></div>
                            <div class="progress-title"><?php echo e(__('Not')); ?></div>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

            <?php endfor; ?>
        </ul>
    </div>
<?php else: ?>
    <p><?php echo e(__('Order Not Found')); ?></p>
<?php endif; ?>
<?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/user/order/track.blade.php ENDPATH**/ ?>
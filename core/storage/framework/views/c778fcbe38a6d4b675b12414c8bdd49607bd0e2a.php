
    <div class="row g-2" id="main_div">
        <?php if(isset($data)): ?>


                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                <div class="col-xxl-3 col-md-3 col-12">
                    <div class="product-card presence__card">

                        <div class="product-thumb">
                            <a href="<?php echo e(url($item->slug)); ?>"> <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$item->image)); ?>" alt="Product"> </a>


                        

                        </div>

                        <div class="product-card-body">


                            <h3 class="product-title"><a href="<?php echo e(url($item->slug)); ?>" style="text-align: center">
                                <h5><?php echo e($item->name); ?></h5>
                                
                            </a></h3>
                        </div>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        <?php else: ?>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="h4 mb-0"><?php echo e(__('No Presence Found')); ?></h4>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>


    <!-- Pagination-->
    <div class="row mt-15" id="item_pagination">
        <div class="col-lg-12 text-center">
            <?php echo e($data->links()); ?>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="<?php echo e(asset('assets/front/js/catalog.js')); ?>"></script>



<?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/front/our_presence/presence_item_table.blade.php ENDPATH**/ ?>
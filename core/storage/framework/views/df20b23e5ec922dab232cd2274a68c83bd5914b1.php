<?php $__env->startSection('content'); ?>



<!-- Start of Main Content -->
<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b><?php echo e(__('All Products')); ?></b></h3>
                    <div class="right">
                        <a href="<?php echo e(route('back.csv.export')); ?>" class="btn btn-info btn-sm d-inline-block"><?php echo e(__('CSV Export')); ?></a>
                        <form class="d-inline-block" action="<?php echo e(route('back.bulk.delete')); ?>" method="get">
                            <input type="hidden" value="" name="ids[]" id="bulk_delete">
                            <input type="hidden" value="items" name="table">
                            <button class="btn btn-danger btn-sm"><?php echo e(__('Bulk Delete')); ?></button>
                        </form>
                    </div>
                </div>
        </div>
    </div>

    <input type="hidden" id="product_url" value="<?php echo e(route('back.item.index')); ?>">

	<!-- DataTales -->
	<div class="card shadow mb-4">
		<div class="card-body">
            <?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="<?php echo e(route('back.item.index')); ?>" method="GET">
                <div class="product-filter-area">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="mb-2"><b><?php echo e(__('Product Filter :')); ?></b></h4>
                        </div>
                    </div>
                    <div class="row">
                        
                        
                        <div class="col-lg-6 col-md-4 col-sm-6" >
                            <div class="form-group px-0">
                                <select class="form-control" name="category_id">
                                    <option disabled><?php echo e(__('Select Category')); ?></option>
                                    <option value=""><?php echo e(__('All Category')); ?></option>
                                    <?php if(count(DB::table('categories')->whereStatus(1)->get()) ): ?>
                                        <?php $__currentLoopData = DB::table('categories')->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cat->id); ?>" <?php echo e(request()->input('category_id') == $cat->id ? 'selected' : ''); ?> ><?php echo e($cat->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <button type="submit" class="btn btn-primary  py-2  d-inline-block"><?php echo e(__('Filter Product')); ?></button>
                        </div>
                    </div>
                </div>
            </form>



            <br>
			<div class="gd-responsive-table">
				<table class="table table-bordered table-striped" id="admin-table-item" width="100%" cellspacing="0">

					<thead>
						<tr>
							
							<th><?php echo e(__('S.No')); ?></th>
							<th><?php echo e(__('Image')); ?></th>
                            <th width="30%"><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('Price')); ?></th>
							<th><?php echo e(__('Status')); ?></th>
							
							<th><?php echo e(__('Actions')); ?></th>
						</tr>
					</thead>

					

				</table>
			</div>
		</div>
	</div>

</div>

</div>
<!-- End of Main Content -->



  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

		<!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Confirm Delete?')); ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
		</div>

		<!-- Modal Body -->
        <div class="modal-body">
			<?php echo e(__('You are going to delete this item. All contents related with this item will be lost.')); ?> <?php echo e(__('Do you want to delete it?')); ?>

		</div>

		<!-- Modal footer -->
        <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
			<form action="" class="d-inline btn-ok" method="POST">

                <?php echo csrf_field(); ?>

                <?php echo method_field('DELETE'); ?>

                <button type="submit" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>

			</form>
		</div>

      </div>
    </div>
  </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>

var table = $('#admin-table-item').DataTable({
    processing: true,
    serverSide: true,
    ajax: window.location.href,
    columns: [
        {data: 'id',name:'id'},
        {data: 'item_thum',name:'item_thum' },
        {data: 'name',name:'name',orderable: true },
        {data: 'discount_price',name:'discount_price' ,orderable: true},
        {data: 'item_status',name:'item_status' },
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
});


</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/back/item/index.blade.php ENDPATH**/ ?>
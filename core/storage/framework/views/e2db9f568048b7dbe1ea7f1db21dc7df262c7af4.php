<?php $__env->startSection('content'); ?>

<!-- Start of Main Content -->
<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b><?php echo e(__('All Presence Category')); ?></b> </h3>

                <div class="right">
                  <a class="btn btn-primary  btn-sm" href="<?php echo e(route('back.presence.state')); ?>"><i class="fas fa-plus"></i> <?php echo e(__('Add')); ?></a>
                    <form class="d-inline-block" action="<?php echo e(route('back.bulk.delete')); ?>" method="get">
                      <input type="hidden" value="" name="ids[]" id="bulk_delete">
                      <input type="hidden" value="our_presense" name="table">
                      <button class="btn btn-danger btn-sm"><?php echo e(__('Delete')); ?></button>
                    </form>
                </div>
              </div>

        </div>
    </div>

	<!-- DataTales -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="gd-responsive-table">
				<table class="table table-bordered table-striped" id="admin-table" width="100%" cellspacing="0">

					<thead>
						<tr>
                            <th> <input type="checkbox" data-target="blog-bulk-delete" class="form-control bulk_all_delete"> </th>
                            <th><?php echo e(__('Image')); ?></th>
                            <th><?php echo e(__('Name')); ?></th>
							<th><?php echo e(__('Actions')); ?></th>
						</tr>
					</thead>

					<tbody>
                      
                        <?php $__currentLoopData = DB::table('our_presense')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php //dd($data->image) ?>
                        <tr id="blog-bulk-delete">
                            <td><input type="checkbox" class="bulk-item" value="<?php echo e($data->id); ?>"></td>
                        
                          <td>
                              <img src="<?php echo e(isset($data->image) ?  asset('assets/images/'.$data->image) : asset('assets/images/placeholder.png')); ?>" alt="">
                        
                          </td>
                            <td>
                                <?php echo e($data->name); ?>

                            </td>
                            
                        
                            <td>
                                <div class="action-list">
                                    <a class="btn btn-secondary btn-sm "
                                        href="<?php echo e(route('back.presence.state.edit',$data->id)); ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm " data-toggle="modal"
                                        data-target="#confirm-delete" href="javascript:;"
                                        data-href="<?php echo e(route('back.presence.state.delete',$data->id)); ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>

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
          <h3 class="modal-title" id="exampleModalLabel"><?php echo e(__('Confirm Delete?')); ?></h3>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
		</div>

		<!-- Modal Body -->
        <div class="modal-body">
			<?php echo e(__('You are going to delete this post. All contents related with this post will be lost.')); ?> <?php echo e(__('Do you want to delete it?')); ?>

		</div>

		<!-- Modal footer -->
        <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
			<form action="" class="d-inline btn-ok" method="POST">

                <?php echo csrf_field(); ?>

                

                <button type="submit" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>

			</form>
		</div>

      </div>
    </div>
  </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/back/presence/show.blade.php ENDPATH**/ ?>
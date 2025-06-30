<?php $__env->startSection('content'); ?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="card mb-4">
    <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-0 bc-title"><b><?php echo e(__('Update Presence Category')); ?></b> </h3>
            <a class="btn btn-primary   btn-sm" href="<?php echo e(route('presence.state.show')); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
            <?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<!-- Nested Row within Card Body -->
<form class="admin-form tab-form" action="<?php echo e(route("back.presence.state.update",$presence)); ?>" method="POST"
                enctype="multipart/form-data">
    <input type="hidden" value="digital" name="item_type">
    <?php echo csrf_field(); ?>
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name"><?php echo e(__('Current Image')); ?> </label>
                        <br>
                            <img class="admin-img"
                                src="<?php echo e($presence->image ? asset('assets/images/'.$presence->image) : asset('assets/images/placeholder.png')); ?>"
                                alt="No Image Found">
                        <br>
                        <span class="mt-1"><?php echo e(__('Image Size Should Be 60 x 60.')); ?></span>
                    </div>

                    <div class="form-group position-relative">
                        <label class="file">
                            <input type="file"  accept="image"  class="upload-photo" name="image" id="file"
                                aria-label="File browser example">
                            <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                        </label>
                    </div>


                        <br>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name"><?php echo e(__('Name')); ?> *</label>
                                <input type="text" name="name" class="form-control item-name"
                                    id="name" placeholder="<?php echo e(__('Enter Name')); ?>"
                                    value="<?php echo e($presence->name); ?>" >
                            </div>
                            <div class="form-group">
                                <label for="slug"><?php echo e(__('Slug')); ?> *</label>
                                <input type="text" name="slug" class="form-control"
                                    id="slug" placeholder="<?php echo e(__('Enter Slug')); ?>"
                                    value="<?php echo e($presence->slug); ?>" >
                            </div>
                            <div class="form-group">
                                <label for="details"><?php echo e(__('Description')); ?> *</label>
                                <textarea name="description" id="description" class="form-control text-editor" rows="5"
                                    placeholder="<?php echo e(__('Enter Description')); ?>"
                                    ><?php echo e($presence->description); ?></textarea>
                            </div>
                        </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="meta_keywords"><?php echo e(__('Meta Keywords')); ?>

                                        </label>
                                    <input type="text" name="meta_keywords" class="tags"
                                        id="meta_keywords"
                                        value="<?php echo e(old('meta_keywords') ?? $presence->meta_keywords); ?>"
                                        placeholder="<?php echo e(__('Enter Meta Keywords')); ?>"
                                        value="">
                                </div>

                                <div class="form-group">
                                    <label
                                        for="meta_description"><?php echo e(__('Meta Description')); ?>

                                        </label>
                                    <textarea name="meta_description" id="meta_description"
                                        class="form-control" rows="5"
                                        placeholder="<?php echo e(__('Enter Meta Description')); ?>"
                                    ><?php echo e(old('meta_description') ?? $presence->meta_description); ?></textarea>
                                </div>
                            </div>

                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-secondary "><?php echo e(__('Submit')); ?></button>
                        </div>

                </div>
            </div>



        </div>
    </div>
</form>
</div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).on('change','#file_type',function(){
            let type = $(this).val();
            if(type == 'file'){
                $('.view_link').addClass('d-none');
                $('.view_file').removeClass('d-none');
                $('.view_file input').prop('required',true);
                $('.view_link input').prop('required',false);
            }else{
                $('.view_link').removeClass('d-none');
                $('.view_file').addClass('d-none');
                $('.view_file input').prop('required',false);
                $('.view_link input').prop('required',true);
            }
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/back/presence/edit.blade.php ENDPATH**/ ?>
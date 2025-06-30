<?php $__env->startSection('content'); ?>

<div class="container-fluid">

<!-- Page Heading -->

<div class="card mb-4">
    <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-0 bc-title"><b><?php echo e(__('Update Digital Product')); ?></b> </h3>
            <a class="btn btn-primary   btn-sm" href="<?php echo e(route('back.item.index',['category_id'=>$category_id,'orderby'=>$orderby])); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
            <?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<!-- Nested Row within Card Body -->

<form class="admin-form" action="<?php echo e(route('back.item.update',$item->id)); ?>" method="POST"
    enctype="multipart/form-data">

    <?php echo csrf_field(); ?>

    <?php echo method_field('PUT'); ?>
    <div class="row">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name"><?php echo e(__('Name')); ?> <sup>*</sup></label>
                        <input oninput="this.value = this.value.toLowerCase()" type="text" name="name" class="form-control item-name"
                            id="name"
                            placeholder="<?php echo e(__('Enter Name')); ?>"
                            value="<?php echo e($item->name); ?>" >
                    </div>

                    <div class="form-group">
                        <label for="slug"><?php echo e(__('Slug')); ?> <sup>*</sup></label>
                        <input oninput="this.value = this.value.toLowerCase()" type="text" name="slug" class="form-control"
                            id="slug"
                            placeholder="<?php echo e(__('Enter Slug')); ?>"
                            value="<?php echo e($item->slug); ?>" >
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group pb-0  mb-0">
                        <label class="d-block"><?php echo e(__('Featured Image')); ?> <sup>*</sup></label>
                    </div>
                    <div class="form-group pb-0 pt-0 mt-0 mb-0">
                    <img class="admin-img lg" src="<?php echo e($item->photo ? asset('assets/images/'.$item->photo) : asset('assets/images/placeholder.png')); ?>" >
                    </div>
                    <div class="form-group position-relative ">
                        <label class="file">
                            <input type="file"  accept="image/*"   class="upload-photo" name="photo"
                                id="file"  aria-label="File browser example">
                            <span
                                class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                        </label>
                        <br>
                        <span class="mt-1 text-info"><?php echo e(__('Image Size Should Be 800 x 800. or square size')); ?></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group pb-0  mb-0">
                        <label><?php echo e(__('Gallery Images')); ?> :   </label>
                        <span><a class="gallery-img-edit-product" href="<?php echo e(route('back.item.gallery',$item->id)); ?>" target="_blank"> <?php echo e(__(' Click Here To Manage Gallery Images')); ?></a></span>
                    </div>
                    <div class="form-group pb-0 pt-0 mt-0 mb-0">
                        <div id="gallery-images">
                            <div class="single-image">
                                <img class="admin-img lg" src="" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group position-relative ">
                        <label class="file">
                            <input type="file"  accept="image/*"  name="galleries[]" id="file"
                                    aria-label="File browser example" accept="image/*" multiple>
                            <span
                                class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                        </label>
                        <br>
                        <span class="mt-1 text-info"><?php echo e(__('Image Size Should Be 800 x 800. or square size')); ?></span>
                        
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">


                    <div class="form-group">
                        <label for="details"><?php echo e(__('Additionla Information')); ?> </label>
                        <textarea name="details" id="details"
                            class="form-control text-editor"
                            rows="6"
                            placeholder="<?php echo e(__('Additionla Information')); ?>"
                            ><?php echo e($item->details); ?></textarea>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-0 bc-title text-center"><b>SEO INPUT</b> </h2>
                    <div class="form-group">
                        <label for="meta_keywords"><?php echo e(__('Meta Keywords')); ?>

                            </label>
                        <input type="text" name="meta_keywords" class="tags"
                            id="meta_keywords"
                            placeholder="<?php echo e(__('Enter Meta Keywords')); ?>"
                            value="<?php echo e($item->meta_keywords); ?>">
                    </div>
                    <div class="form-group">
                        <label for="meta_title"><?php echo e(__('Meta Title')); ?>

                            </label>
                        <div class="input-group mb-3">

                            <input type="text" id="meta_title"
                                name="meta_title" class="form-control"
                                placeholder="<?php echo e(__('Enter Meta Title')); ?>"

                                value="<?php echo e($item->meta_tittle); ?>" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label
                            for="meta_description"><?php echo e(__('Meta Description')); ?>

                            </label>
                        <textarea name="meta_description" id="meta_description"
                            class="form-control" rows="5"
                            placeholder="<?php echo e(__('Enter Meta Description')); ?>"><?php echo e($item->meta_description); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" class="check_button" name="is_button" value="0">
                    <button type="submit" class="btn btn-secondary mr-2"><?php echo e(__('Save')); ?></button>
                    <button type="submit" class="btn btn-info save__edit"><?php echo e(__('Save & Edit')); ?></button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="discount_price"><?php echo e(__('Current Price')); ?>

                            <sup>*</sup></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span
                                    class="input-group-text"><?php echo e($curr->sign); ?></span>
                            </div>
                            <input type="text" id="discount_price"
                                name="discount_price" class="form-control"
                                placeholder="<?php echo e(__('Enter Current Price')); ?>"
                                min="1" step="0.1"
                                value="<?php echo e(round($item->discount_price * $curr->value,2)); ?>" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="previous_price"><?php echo e(__('Previous Price')); ?>

                            </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span
                                    class="input-group-text"><?php echo e($curr->sign); ?></span>
                            </div>
                            <input type="text" id="previous_price"
                                name="previous_price" class="form-control"
                                placeholder="<?php echo e(__('Enter Previous Price')); ?>"
                                min="1" step="0.1"
                                value="<?php echo e(round($item->previous_price*$curr->value ,2)); ?>" >
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="category_id"><?php echo e(__('Select Category')); ?> <sup>*</sup></label>
                        <select name="category_id[]" id="category_id" data-href="<?php echo e(route('back.get.subcategoryarray')); ?>" class="form-control" multiple >
                            <?php $__currentLoopData = DB::table('categories')->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->id); ?>"  <?php if(in_array($cat->id,
                                explode(",",$item->category_id)??[])): ?>selected="selected"
                               <?php endif; ?> ><?php echo e($cat->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group" >
                        <label for="subcategory_id"><?php echo e(__('Select Sub Category')); ?> </label>
                        <select data-crrunt_url="<?php echo e(\Request::route()->getName()); ?>"  name="subcategory_id[]" id="subcategory_id" class="form-control" data-href="<?php echo e(route('back.get.childcategory')); ?>" multiple>
                            <?php $__currentLoopData = DB::table('subcategories')->whereIn('category_id',explode(",",$item->category_id))->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subcat->id); ?>" <?php if(in_array($subcat->id,
                                explode(",",$item->subcategory_id)??[])): ?>selected="selected"
                               <?php endif; ?> ><?php echo e($subcat->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group" style="display: none">
                        <label for="childcategory_id"><?php echo e(__('Select Child Category')); ?> </label>
                        <select name="childcategory_id" id="childcategory_id" class="form-control">
                            <option value=""><?php echo e(__('Select one')); ?></option>
                            <?php $__currentLoopData = DB::table('chield_categories')->where('category_id',$item->category_id)->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chieldcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($chieldcategory->id); ?>" <?php echo e($chieldcategory->id == $item->childcategory_id ? 'selected' : ''); ?>><?php echo e($chieldcategory->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group" style="display: none">
                        <label for="brand_id"><?php echo e(__('Select Brand')); ?> </label>
                        <select name="brand_id" id="brand_id" class="form-control" >
                            <option value="" selected><?php echo e(__('Select Brand')); ?></option>
                            <?php $__currentLoopData = DB::table('brands')->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($brand->id); ?>" <?php echo e($brand->id == $item->brand_id ? 'selected' : ''); ?> ><?php echo e($brand->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="tax_id"><?php echo e(__('Select Tax')); ?></label>
                        <select name="tax_id" id="tax_id"  class="form-control" >
                            <option value="" selected><?php echo e(__('No Tax')); ?></option>
                            <?php $__currentLoopData = DB::table('taxes')->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tax->id); ?>" <?php echo e($item->tax_id == $tax->id ? 'selected' : ''); ?> ><?php echo e($tax->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>


                    <div class="form-group">
                        <label for="sku"><?php echo e(__('SKU')); ?> <sup>*</sup></label>
                        <input type="text" name="sku" class="form-control"
                            id="sku" placeholder="<?php echo e(__('Enter SKU')); ?>"
                            value="<?php echo e($item->sku); ?>" >
                    </div>
                    <div class="form-group">
                        <label for="video"><?php echo e(__('Vido Link')); ?> </label>
                        <input type="text" name="video" class="form-control"
                            id="video" placeholder="<?php echo e(__('Enter Video Link')); ?>"
                            value="<?php echo e($item->video); ?>" >
                    </div>
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
<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/back/item/digital/edit.blade.php ENDPATH**/ ?>
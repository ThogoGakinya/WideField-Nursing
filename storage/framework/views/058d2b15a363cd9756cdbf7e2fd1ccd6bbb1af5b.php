<?php $__env->startSection('page_title',trans('labels.add_service')); ?>
<?php $__env->startSection('content'); ?>
	<section id="basic-form-layouts">
		<div class="row">
			<div class="col-md-12">
  			<div class="card">
      		<div class="card-header">
						<h4 class="card-title" id="horz-layout-colored-controls"><?php echo e(trans('labels.add_service')); ?></h4>
      		</div>
      		<div class="card-body">
         		<div class="px-3">
				    	<form class="form form-horizontal" id="add_service_form" action="<?php echo e(URL::to('services-store')); ?>" method="POST" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
              	<div class="form-body">

              		        <div class="row">
              			                <div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="name"><?php echo e(trans('labels.service')); ?></label>
												<div class="col-md-9">
													<input type="text" id="add_service_name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(trans('labels.enter_service')); ?>">
													<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="name_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="category_id"> <?php echo e(trans('labels.category')); ?> </label>
												<div class="col-md-9">
													<select id="add_service_category_id" name="category_id" class="form-control <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="category_id">
														<option value="" selected disabled><?php echo e(trans('labels.select')); ?></option>
														<?php $__currentLoopData = $categorydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($cd->id); ?>"><?php echo e($cd->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
													<?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="category_id_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
										</div>
                        	</div>
							<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="image"><?php echo e(trans('labels.image')); ?></label>
												<div class="col-md-9">
													<input type="file" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="service_image" name="image" accept=".jpg,.jpeg,.png" value="<?php echo e(old('image')); ?>">
													<?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="image_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="gallery_image"><?php echo e(trans('labels.gallery')); ?></label>
												<div class="col-md-9">
													<input type="file" id="add_service_gallery_image" class="form-control <?php if($errors->has('gallery_image.*')): ?> is-invalid <?php endif; ?>" name="gallery_image[]" accept="image/*" multiple>
													<?php $__errorArgs = ['gallery_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="gallery_image_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>		
													<?php if($errors->has('gallery_image.*')): ?>
														<span class="text-danger"><?php echo e($errors->first('gallery_image.*')); ?></span>
													<?php endif; ?>
												</div>
											</div>
										</div>
							</div>
	                        <div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="price"><?php echo e(trans('labels.price')); ?></label>
												<div class="col-md-9 ">
													<input type="text" id="service_price" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price" value="<?php echo e(old('price')); ?>" placeholder="<?php echo e(trans('labels.enter_price')); ?>">
													<?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="priceError"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="discount">FEATURED</label>
												<div class="col-md-9 ">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input " type="checkbox" id="is_featured" name="is_featured" value="is_featured">
                                                    <label class="form-check-label " for="is_featured"><?php echo e(trans('labels.set_as_featured')); ?></label>
                                                 	</div>
													<?php $__errorArgs = ['is_featured'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="is_featured_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
										</div>
                             </div>
                              <div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="price">START TIME</label>
												<div class="col-md-9 ">
													<input type="datetime-local" id="start" required onchange=diff_hours() class="form-control <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="start_time" value="<?php echo e(old('duration')); ?>" placeholder="Select Start Date">
													<?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="start"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="discount">END TIME</label>
												<div class="col-md-9 ">
                                                <input type="datetime-local" id="end" onchange=diff_hours() class="form-control <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="end_time" value="<?php echo e(old('duration')); ?>" placeholder="Select End Date" required>
													<?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="endr"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div>
										</div>
                             </div>
                             </div>
                             <div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="description">Duration </label>
												<div class="col-md-9 ">
													<input type="text" id="diff" class="form-control <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="duration"  placeholder="Hours" readonly>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="description">Description </label>
												<div class="col-md-9 ">
                                                    <textarea id="add_service_description" rows="2" class="form-control col-md-12 <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" placeholder="<?php echo e(trans('labels.service_description')); ?>"><?php echo e(old('description')); ?></textarea>
													<?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="descriptionError"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
										</div>
							</div>
          <!--                   <div class="row">-->
										<!--<div class="col-md-12">-->
										<!--	<div class="form-group row" align="right">-->
										<!--		<div class="col-md-12">-->
										<!--			<textarea id="add_service_description" rows="2" class="form-control col-md-12 <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" placeholder="<?php echo e(trans('labels.service_description')); ?>"><?php echo e(old('description')); ?></textarea>-->
										<!--			<?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="descriptionError"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
										<!--		</div>-->
										<!--	</div>-->
										<!--</div>-->
          <!--                   </div>-->

								<div class="form-actions left">
										<a class="btn btn-raised btn-danger mr-1" href="<?php echo e(URL::to('services')); ?>"> <i class="fa fa-arrow-left"></i> <?php echo e(trans('labels.back')); ?> </a>
										<?php if(env('Environment') == 'sendbox'): ?>
                     	<button type="button" onclick="myFunction()" class="btn btn-raised btn-primary"> <i class="fa fa-paper-plane"></i> <?php echo e(trans('labels.add')); ?> </button>
                   	<?php else: ?>
											<button type="submit" id="btn_add_service" class="btn btn-raised btn-primary"> <i class="fa fa-paper-plane"></i> <?php echo e(trans('labels.add')); ?> </button>
										<?php endif; ?>
								</div>
							</form>
         		</div>
      		</div>
  			</div>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
  <script src="<?php echo e(asset('resources/views/service/service.js')); ?>" type="text/javascript"></script>
  <script>
  function diff_hours()
    {
        var start = document.getElementById("start").value;
        var end = document.getElementById("end").value;
        var diff = Math.abs(new Date(end) - new Date(start))/3600000;
        document.getElementById("diff").value = diff;
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/service/add.blade.php ENDPATH**/ ?>
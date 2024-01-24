<?php $__env->startSection('page_title',trans('labels.edit_service')); ?>
<?php $__env->startSection('content'); ?>
	<section id="basic-form-layouts">
		<div class="row">
			<div class="col-md-12">
	        	<div class="card">
	            <div class="card-header">
						<h4 class="card-title" id="horz-layout-colored-controls"><?php echo e(trans('labels.edit_service')); ?></h4>
	            </div>
	            <div class="card-body">
	               <div class="px-3">
					    	<form class="form form-horizontal" id="edit_service_form" action="<?php echo e(URL::to('services/edit/'.$servicedata->slug)); ?>" method="POST" enctype="multipart/form-data">
								<?php echo csrf_field(); ?>
	                    	<div class="form-body">
	                    		<div class="row">
	                    			<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="name"><?php echo e(trans('labels.service_name')); ?> </label>
												<div class="col-md-9">
													<input type="text" id="edit_service_name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e($servicedata->name); ?>" placeholder="<?php echo e(trans('labels.enter_service')); ?>">
													<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="nameError"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="category_id"> <?php echo e(trans('labels.category')); ?></label>
												<div class="col-md-9">
													<select id="edit_service_category_id" name="category_id" class="form-control <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="category_id">
														<option value="<?php echo e($servicedata['categoryname']->id); ?>" selected ><?php echo e($servicedata['categoryname']->name); ?></option>
														<?php $__currentLoopData = $categorydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($cd->id); ?>"><?php echo e($cd->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
													<?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="category_idError"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
										</div>
                              <div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="image"><?php echo e(trans('labels.image')); ?></label>
												<div class="col-md-9">
													<input type="file" id="edit_service_image" class="form-control mb-1 <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="image" >
													<?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="image_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
													<img src="<?php echo e(Helper::image_path($servicedata->image)); ?>" alt="<?php echo e(trans('labels.service')); ?>" class="rounded edit-image">
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
unset($__errorArgs, $__bag); ?>" name="price" value="<?php echo e($servicedata->price); ?>" placeholder="<?php echo e(trans('labels.enter_price')); ?>">
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
												<label class="col-md-3 label-control" for="discount"><?php echo e(trans('labels.discount')); ?></label>
												<div class="col-md-9 ">
                                       <input type="text" id="service_discount" class="form-control <?php $__errorArgs = ['discount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="discount" value="<?php echo e($servicedata->discount); ?>" placeholder="<?php echo e(trans('labels.enter_discount')); ?>">
													<?php $__errorArgs = ['discount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="discountError"><?php echo e($message); ?></span><?php unset($message);
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
												<label class="col-md-3 label-control" for="featured"><?php echo e(trans('labels.featured')); ?></label>
												<div class="col-md-9">
	                                    <div class="form-check form-switch">
	                                       <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="is_featured" <?php if($servicedata->is_featured == 1): ?> checked="checked" <?php endif; ?>>
	                                       <label class="form-check-label" for="is_featured"><?php echo e(trans('labels.set_as_featured')); ?></label>
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
                                    <label class="col-md-3 label-control" for="is_available"><?php echo e(trans('labels.status')); ?> </label>
												<div class="col-md-9">
                                       <div class="form-check form-switch">
                                          <input class="form-check-input" type="checkbox" id="is_available" name="is_available" value="is_available" <?php if($servicedata->is_available == 1): ?> checked="checked" <?php endif; ?>>
                                          <label class="form-check-label" for="is_available"><?php echo e(trans('labels.active')); ?></label>
                                       </div>
													<?php $__errorArgs = ['is_available'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="is_available_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
												<label class="col-md-3 label-control" for="price_type"><?php echo e(trans('labels.price_type')); ?></label>
												<div class="col-md-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="price_type" id="fixed" onChange="getduration(this)" value="Fixed" <?php if($servicedata->price_type == "Fixed"): ?> checked <?php endif; ?>>
														<label class="form-check-label" for="fixed"><?php echo e(trans('labels.fixed')); ?></label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="price_type" id="hourly" onChange="getduration(this)" value="Hourly" <?php if($servicedata->price_type == "Hourly"): ?> checked <?php endif; ?>>
														<label class="form-check-label" for="hourly"><?php echo e(trans('labels.hourly')); ?></label>
													</div>

                                       <?php $__errorArgs = ['price_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="price_type_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
											<div class="form-group row <?php if($servicedata->price_type == 'Hourly'): ?> dn <?php endif; ?>" id="duration_type" >
												<label class="col-md-3 label-control" for="duration_type"><?php echo e(trans('labels.type')); ?></label>
												<div class="col-md-9 ">
													<select class="form-control selectbox select" name="duration_type" >
														<option <?php if($servicedata->duration_type == "1"): ?> selected <?php endif; ?> value="1"> <?php echo e(trans('labels.minutes')); ?> </option>
														<option <?php if($servicedata->duration_type == "2"): ?> selected <?php endif; ?> value="2"> <?php echo e(trans('labels.hours')); ?> </option>
														<option <?php if($servicedata->duration_type == "3"): ?> selected <?php endif; ?> value="3"> <?php echo e(trans('labels.days')); ?> </option>
													</select>
												</div>
											</div>
											<div class="form-group row <?php if($servicedata->price_type == 'Hourly'): ?> dn <?php endif; ?>" id="duration">
												<label class="col-md-3 label-control" for="duration"><?php echo e(trans('labels.duration')); ?></label>
												<div class="col-md-9 ">
                                       <input type="text" id="service_duration" class="form-control <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="duration" value="<?php echo e($servicedata->duration); ?>" placeholder="<?php echo e(trans('labels.enter_duration')); ?>">
													<?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="durationError"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="description"><?php echo e(trans('labels.description')); ?> </label>
												<div class="col-md-9">
													<textarea id="edit_service_description" rows="3" class="form-control col-md-12 <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" placeholder="<?php echo e(trans('labels.service_description')); ?>"><?php echo e(strip_tags($servicedata->description)); ?></textarea>
													<?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="description_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-actions left">
									<a class="btn btn-raised btn-danger mr-1" href="<?php echo e(URL::to('services')); ?>"> <i class="fa fa-arrow-left"></i> <?php echo e(trans('labels.back')); ?> </a>
									<?php if(env('Environment') == 'sendbox'): ?>
		                     	<button type="button" onclick="myFunction()" class="btn btn-raised btn-primary"> <i class="ft-edit"></i> <?php echo e(trans('labels.update')); ?> </button>
		                   	<?php else: ?>
										<button type="submit" id="btn_edit_service" class="btn btn-raised btn-primary"> <i class="ft-edit"></i> <?php echo e(trans('labels.update')); ?> </button>
									<?php endif; ?>
								</div>
	                  </form>
							<div class="form-group">
								<label><a class="btn btn-info btn-xs float-right add_gallery_image" data-id="<?php echo e($servicedata->id); ?>" data-toggle="modal" data-target="#add_gallery_image"><i class="fa fa-plus"></i> <?php echo e(trans('labels.add_gallery_image')); ?></a></label>
								<?php if(count($gimages) > 0): ?>
									<div class="row">
										<?php $__currentLoopData = $gimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $si): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="text-center p-2">
												<img src='<?php echo e(Helper::image_path($si->image)); ?>' id="edit_gallery_image" alt="<?php echo e(trans('labels.gallery')); ?>" height="200" width="200" class="rounded">
												<div class="col-sm-0 p-1 text-center">
													<div class="btn-group" role="group" aria-label="Basic example">

														<?php if(env('Environment') == 'sendbox'): ?>
															<a class="btn btn-danger" onclick="myFunction()"><i class="ft-trash"></i></a>
							                   	<?php else: ?>
															<a class="btn btn-danger" onclick="deletegallery('<?php echo e($si->id); ?>','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('/del/gallery')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-trash"></i></a>
														<?php endif; ?>
														<a class="btn btn-info edit_service_gallery" data-id="<?php echo e($si->id); ?>" data-userid="<?php echo e($si->image); ?>" data-image-url="<?php echo e(Helper::image_path($si->image)); ?>" data-toggle="modal" data-target="#edit_service_gallery"><i class="ft-edit"></i></a>
													</div>
												</div>
											</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								<?php else: ?>
									<span class="text-muted text-center"><?php echo e(trans('labels.gallery_not_found')); ?></span>
								<?php endif; ?>
							</div>
	               </div>
	            </div>
	        	</div>
	    	</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('resources/views/service/service.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
	// Edit gallery Image modal
   $(document).on('click','.edit_service_gallery',function(){
      var imageid = $(this).attr('data-id');
      $('#gimage_id').val(imageid); 
      var imagename = $(this).attr('data-userid');
      var imageurl = $(this).attr('data-image-url');
      document.getElementById("oldGalleryImg").src = imageurl;
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/service/show.blade.php ENDPATH**/ ?>
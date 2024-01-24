<?php $__env->startSection('page_title',trans('labels.edit_provider')); ?>
<?php $__env->startSection('content'); ?>
	<section id="basic-form-layouts">
		<div class="row">
			<div class="col-md-12">
	        	<div class="card">
	            <div class="card-header">
						<h4 class="card-title" id="horz-layout-colored-controls"><?php echo e(trans('labels.edit_provider')); ?></h4>
	            </div>
	            <div class="card-body">
	               <div class="px-3">
					    	<form class="form form-horizontal" id="edit_provider_form" action="<?php echo e(URL::to('/providers/edit/'.$providerdata->slug)); ?>" method="POST" enctype="multipart/form-data">
								<?php echo csrf_field(); ?>
	                    	<div class="form-body">
	                    		<div class="row">
	                    			<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="name"><?php echo e(trans('labels.name')); ?> </label>
												<div class="col-md-9">
													<input type="text" id="edit_provider_name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e($providerdata->name); ?>" placeholder="<?php echo e(trans('labels.enter_full_name')); ?>">
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
											<div class="form-group row">
												<label class="col-md-3 label-control" for="email"><?php echo e(trans('labels.email')); ?> </label>
												<div class="col-md-9">
													<input type="email" id="edit_provider_email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($providerdata->email); ?>" placeholder="<?php echo e(trans('labels.enter_email')); ?>">
													<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="emailError"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="mobile"><?php echo e(trans('labels.mobile')); ?></label>
												<div class="col-md-9">
													<input type="text" id="edit_provider_mobile" class="form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mobile" value="<?php echo e($providerdata->mobile); ?>" placeholder="<?php echo e(trans('labels.enter_mobile')); ?>">
													<?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="mobile_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="provider_type"><?php echo e(trans('labels.provider_type')); ?></label>
												<div class="col-md-9">
													<select id="edit_provider_provider_type" name="provider_type" class="form-control <?php $__errorArgs = ['provider_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="<?php echo e(trans('labels.provider_type')); ?>">
														<option value="<?php echo e($providerdata['providertype']->id); ?>" selected><?php echo e($providerdata['providertype']->name); ?></option>
														<?php $__currentLoopData = $providertypedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($pt->id); ?>"><?php echo e($pt->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
													<?php $__errorArgs = ['provider_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="provider_type_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="new_image"><?php echo e(trans('labels.select_new')); ?></label>
												<div class="col-md-9">
													<input type="file" id="edit_provider_image" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="image" accept="image/*">
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
											<div class="form-group row">
												<label class="col-md-3 label-control" for="image"> <?php echo e(trans('labels.profile')); ?></label>
												<div class="col-md-9">
                                       <img src="<?php echo e(Helper::image_path($providerdata->image)); ?>" alt="<?php echo e(trans('labels.provider')); ?>" class="rounded edit-image">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="about"><?php echo e(trans('labels.about')); ?> </label>
												<div class="col-md-9">
													<textarea id="edit_provider_about" rows="3" class="form-control col-md-12 <?php $__errorArgs = ['about'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="about" placeholder="<?php echo e(trans('labels.enter_about_provider')); ?>"><?php echo e(strip_tags($providerdata->about)); ?></textarea>
													<?php $__errorArgs = ['about'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="about_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="address"><?php echo e(trans('labels.address')); ?> </label>
												<div class="col-md-9">
													<textarea id="edit_provider_address" rows="3" class="form-control col-md-12 <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address" placeholder="<?php echo e(trans('labels.enter_address')); ?>"><?php echo e(strip_tags($providerdata->address)); ?></textarea>
													<?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="address_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="userinput4"><?php echo e(trans('labels.city')); ?> </label>
												<div class="col-md-9">
													<select id="edit_provider_city_id" name="city_id" class="form-control <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="City">
														<option value="<?php echo e($providerdata['city']->id); ?>" selected><?php echo e($providerdata['city']->name); ?></option>
														<?php $__currentLoopData = $citydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($cd->id); ?>"><?php echo e($cd->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
													</select>
													<?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="cityError"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="is_available"><?php echo e(trans('labels.status')); ?></label>
												<div class="col-md-9">
                                       <div class="form-check form-switch">
                                          <input class="form-check-input " type="checkbox" id="is_available" name="is_available" value="is_available" <?php if($providerdata->is_available == 1): ?> checked="true" <?php endif; ?>>
                                          <label class="form-check-label " for="is_available"><?php echo e(trans('labels.active')); ?></label>
                                       </div>
												</div>
											</div>
										</div>
		                     </div>
								</div>
	                        <div class="form-actions left">
										<a class="btn btn-raised btn-danger mr-1" href="<?php echo e(URL::to('providers')); ?>"> <i class="fa fa-arrow-left"></i> <?php echo e(trans('labels.back')); ?> </a>
										<?php if(env('Environment') == 'sendbox'): ?>
	                              <button type="button" class="btn btn-raised btn-primary" onclick="myFunction()"><i class="ft-edit"></i> <?php echo e(trans('labels.update')); ?> </button>
	                           <?php else: ?>
											<button type="submit" id="btnAddProvider" class="btn btn-raised btn-primary"> <i class="ft-edit"></i> <?php echo e(trans('labels.update')); ?> </button>
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
<script src="<?php echo e(asset('resources/views/provider/provider.js')); ?>" type="text/javascript"></script>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/provider/show.blade.php ENDPATH**/ ?>
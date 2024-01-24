<?php $__env->startSection('page_title'); ?>
   <?php echo e(trans('labels.user')); ?> | <?php echo e(trans('labels.profile_settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('front_content'); ?>
      <div class="col-xl-9 col-md-8">
         <div class="tab-content pt-0">
            <div class="tab-pane show active" id="user_profile_settings">
               <div class="widget">
                  <h4 class="widget-title"><?php echo e(trans('labels.profile_settings')); ?></h4>
                  <?php if(!empty($citydata)): ?>
                  <form action="<?php echo e(URL::to('/home/user/profile/edit')); ?>" method="POST" enctype="multipart/form-data">
                     <?php echo csrf_field(); ?>
                     <div class="row">
                        <div class="form-group col-xl-6">
                           <div class="media align-items-center mb-3">
                              <img class="user-image rounded" src="<?php echo e(Helper::image_path(Auth::user()->image)); ?>" alt="<?php echo e(trans('labels.user_image')); ?>">
                              <div class="media-body">
                                 <h5 class="mb-50"><?php echo e(Auth::user()->name); ?></h5>
                                 <div class="jstinput"> 
                                    <label for="profile_image" class="btn btn-primary">Change Profile</label>
                                    <input type="file" class="form-control" name="image" id="profile_image">
                                 </div>
                                 <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                        </div>
                        <?php if(Auth::user()->license != NULL): ?>
                        <div class="form-group col-xl-6">
                           <div class="media align-items-center mb-3">
                              <img class="user-image rounded" data-target="#show_license" data-toggle="modal"  src="<?php echo e(Helper::image_path(Auth::user()->license)); ?>" alt="<?php echo e(trans('labels.user_image')); ?>">
                              <div class="media-body">
                                 <h5 class="mb-50">Your License</h5>
                                 <div class="jstinput"> 
                                    <label for="license" class="btn btn-primary">Change License</label>
                                    <input type="file" class="form-control" name="license" id="license">
                                 </div>
                                 <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                           </div>
                        </div>
                        <?php else: ?>
                        <div class="form-group col-xl-6">
                           <label class="mr-sm-2">No License <small><i>Please upload License</a></small></label>
                           <input class="form-control" type="file" name="license">
                           <?php $__errorArgs = ['license'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <?php endif; ?>
                        <!--<div class="form-group col-xl-6">-->
                        <!--   <label class="mr-sm-2"><?php echo e(trans('labels.email')); ?></label>-->
                        <!--   <input class="form-control" type="email" value="<?php echo e(Auth::user()->email); ?>" disabled>-->
                        <!--</div>-->
                     </div>
                     <div class="row">
                        <div class="form-group col-xl-6">
                           <label class="mr-sm-2"><?php echo e(trans('labels.name')); ?></label>
                           <input class="form-control" type="text" name="name" value="<?php echo e(Auth::user()->name); ?>">
                           <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-xl-6">
                           <label class="mr-sm-2"><?php echo e(trans('labels.mobile')); ?></label>
                           <input class="form-control" type="text" name="mobile" value="<?php echo e(Auth::user()->mobile); ?>" disabled>
                           <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-xl-6">
                           <label class="mr-sm-2"><?php echo e(trans('labels.address')); ?></label>
                           <input type="text" class="form-control" name="address" value="<?php echo e(strip_tags(Auth::user()->address)); ?>">
                           <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-xl-6">
                           <label class="mr-sm-2"><?php echo e(trans('labels.city')); ?></label>
                           <select name="city" id="city" class="form-control">
                              <?php $__currentLoopData = $citydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($cdata->id); ?>" <?php if(Auth::user()->city_id == $cdata->id): ?> selected <?php endif; ?>><?php echo e($cdata->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                           <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-xl-12">
                           <label class="mr-sm-2"><?php echo e(trans('labels.about')); ?></label>
                           <textarea class="form-control" name="about" id="" cols="30" rows="3"><?php echo e(strip_tags(Auth::user()->about)); ?></textarea>
                           <?php $__errorArgs = ['about'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-xl-12">
                           <input type="submit" class="btn btn-primary pl-5 pr-5" value="<?php echo e(trans('labels.update')); ?>">
                        </div>
                     </div>
                  </form>
                  <?php else: ?>
                     <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
      
<!-- start of the modal form to edit a cash request -->
<div class="modal fade" id="show_license">
          <div class="modal-dialog">
            <div class="modal-content">
               <img src="<?php echo e(Helper::image_path(Auth::user()->license)); ?>" alt="<?php echo e(trans('labels.user_image')); ?>">
               
            </div>   <!-- /.modal-content -->
        </div>
    </div><!-- /.modal-dialog --><!-- end of the modal form to add a cash request-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.vendor_theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/user/profile.blade.php ENDPATH**/ ?>
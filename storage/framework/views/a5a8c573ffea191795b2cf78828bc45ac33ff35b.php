<?php $__env->startSection('page_title',trans('labels.timing')); ?>
<?php $__env->startSection('content'); ?>
   <section id="basic-form-layouts">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title" id="horz-layout-colored-controls"><?php echo e(trans('labels.timing')); ?></h4>
               </div>
               <div class="card-body">
                  <div class="px-3">
    	               <form action="<?php echo e(URL::to('timings/edit')); ?>" method="post">
    	                	<?php echo csrf_field(); ?>
                        <div class="form-row">
    	                		<label class="col-sm-2 col-form-label"></label>
    	                	   <div class="form-group col-md-3 text-center"><label class="font-weight-bold" ><?php echo e(trans('labels.opening_time')); ?></label></div>
    	                	   <div class="form-group col-md-3 text-center"><label class="font-weight-bold" ><?php echo e(trans('labels.closing_time')); ?></label></div>
                           <div class="form-group col-md-3 text-center"><label class="font-weight-bold" ><?php echo e(trans('labels.always_closed')); ?></label></div>
    	                	</div>
                        <?php $__currentLoopData = $timingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="form-row">
                              <label class="col-sm-2 form-label text-center font-weight-bold">
                                 <?php if($time->day == "Monday"): ?>
                                    <?php echo e(trans('labels.Monday')); ?>

                                 <?php endif; ?>
                                 <?php if($time->day == "Tuesday"): ?>
                                    <?php echo e(trans('labels.Tuesday')); ?>

                                 <?php endif; ?>
                                 <?php if($time->day == "Wednesday"): ?>
                                    <?php echo e(trans('labels.Wednesday')); ?>

                                 <?php endif; ?>
                                 <?php if($time->day == "Thursday"): ?>
                                    <?php echo e(trans('labels.Thursday')); ?>

                                 <?php endif; ?>
                                 <?php if($time->day == "Friday"): ?>
                                    <?php echo e(trans('labels.Friday')); ?>

                                 <?php endif; ?>
                                 <?php if($time->day == "Saturday"): ?>
                                    <?php echo e(trans('labels.Saturday')); ?>

                                 <?php endif; ?>
                                 <?php if($time->day == "Sunday"): ?>
                                    <?php echo e(trans('labels.Sunday')); ?>

                                 <?php endif; ?>
                              </label>
                              <input type="hidden" name="day[]" value="<?php echo e($time->day); ?>">
                              <div class="form-group col-md-3">
                                 <input type="text" class="form-control pickatime" placeholder="Opening time" id="open<?php echo e($time->day); ?>" name="open_time[]" <?php if($time->is_always_close == '2'): ?> value="<?php echo e($time->open_time); ?>" <?php else: ?> value="<?php echo e(trans('labels.closed')); ?>" readonly="" <?php endif; ?>>
                              </div>
                              <div class="form-group col-md-3">
                                 <input type="text" class="form-control pickatime" placeholder="Closing Time" id="close<?php echo e($time->day); ?>" name="close_time[]" <?php if($time->is_always_close == '2'): ?> value="<?php echo e($time->close_time); ?>" <?php else: ?> value="<?php echo e(trans('labels.closed')); ?>" readonly="" <?php endif; ?>>
                              </div>
                              <div class="form-group col-md-3">
                                 <select class="form-control" name="is_always_close[]" id="is_always_close<?php echo e($time->day); ?>">
                                    <option value="" disabled ><?php echo e(trans('labels.select')); ?></option>
                                    <option value="1" <?php if($time->is_always_close == '1'): ?> selected <?php endif; ?>><?php echo e(trans('labels.yes')); ?></option>
                                    <option value="2" <?php if($time->is_always_close == '2'): ?> selected <?php endif; ?>><?php echo e(trans('labels.no')); ?></option>
                                 </select>
                              </div>
                           </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-2 form-label text-center">
                           <?php if(env('Environment') == 'sendbox'): ?>
                              <button type="button" onclick="myFunction()" class="btn btn-raised btn-primary"> <i class="ft-edit"></i> <?php echo e(trans('labels.update')); ?> </button>
                           <?php else: ?>
                              <button type="submit" class="btn btn-primary btn-raised"><i class="ft-edit"></i> <?php echo e(trans('labels.update')); ?></button>
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
<script src="<?php echo e(asset('storage/app/public/admin-assets/js/jquery.timepicker.js')); ?>" defer></script>
<script src="<?php echo e(asset('resources/views/timing/timing.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/timing/show.blade.php ENDPATH**/ ?>
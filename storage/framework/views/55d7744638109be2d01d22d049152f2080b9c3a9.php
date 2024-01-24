<?php $__env->startSection('page_title'); ?>
   <?php echo e(trans('labels.user')); ?> | <?php echo e(trans('labels.my_bookings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('front_content'); ?>
      <div class="col-xl-9 col-md-8">
         <div class="row align-items-center mb-4">
            <div class="col">
               <h4 class="widget-title mb-0"><?php echo e(trans('labels.my_bookings')); ?></h4>
            </div>
            <div class="col-auto">
               <div class="sort-by">
                  <select class="form-control searchFilter" name="search_by" id="search_by" url="<?php echo e(URL::to('/home/user/get-bookings-by')); ?>">
                     <option value="all" selected><?php echo e(trans('labels.all')); ?></option>
                     <option value="1"><?php echo e(trans('labels.pending')); ?></option>
                     <option value="2"><?php echo e(trans('labels.inprogress')); ?></option>
                     <option value="3"><?php echo e(trans('labels.completed')); ?></option>
                     <option value="4"><?php echo e(trans('labels.cancelled')); ?></option>
                  </select>
               </div>
            </div>
            <div class="input-group col-4 float-right">
               <input type="text" name="search_booking" id="search_booking" class="form-control" placeholder="<?php echo e(trans('labels.search_booking_by_id')); ?>" aria-label="Small" aria-describedby="inputGroup-sizing-sm" url="<?php echo e(URL::to('/home/user/get-bookings')); ?>"/>
            </div>
         </div>
         <div class="bookings">
            <?php if(!empty($bookingdata) && count($bookingdata)>0): ?>
               <?php $__currentLoopData = $bookingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="booking-list">
                     <div class="booking-widget">
                        <a href="<?php echo e(URL::to('/home/user/bookings/'.$bdata->booking_id)); ?>" class="booking-img text-center">
                           <img src="<?php echo e(Helper::image_path($bdata->service_image)); ?>" alt="<?php echo e(trans('labels.service_image')); ?>">
                           <span class="badge bg-success-light">Request ID : <strong><?php echo e($bdata->booking_id); ?></strong></span>
                        </a>
                        <div class="booking-det-info">
                           <h3>
                              <a href="<?php echo e(URL::to('/home/user/bookings/'.$bdata->booking_id)); ?>"><?php echo e($bdata->service_name); ?></a>
                              <?php if($bdata->status == 1): ?>
                                 <span class="badge bg-warning-light"><?php echo e(trans('labels.pending')); ?></span>
                              <?php elseif($bdata->status == 2): ?>
                                 <span class="badge bg-info-light"><?php echo e(trans('labels.accepted')); ?></span>
                              <?php endif; ?>
                           </h3>
                           <?php
                             $start = strtotime($bdata->service->start_time);
                             $end = strtotime($bdata->service->end_time);
                             $diff = abs($end - $start)/3600;
                            ?>
                           <ul class="booking-details">
                              <li><span>Start</span> <?php echo e($bdata->service->start_time); ?></li>
                              <li><span>End</span> <?php echo e($bdata->service->end_time); ?></li>
                              <li><span>Duration</span> <?php echo e($diff); ?> Hours </li>
                              
                              <li><span><?php echo e(trans('labels.amount')); ?></span> <?php echo e(Helper::currency_format($bdata->total_amt)); ?> </li>
                              <li>
                                 <span><?php echo e(trans('labels.provider')); ?></span>
                                 <div class="avatar avatar-xs mr-1">
                                    <img class="avatar-img rounded-circle" alt="<?php echo e(trans('labels.provider_image')); ?>" src="<?php echo e(Helper::image_path($bdata->provider_image)); ?>">
                                 </div>
                                 <a href="<?php echo e(URL::to('/home/providers-services/'.$bdata->provider_slug)); ?>" class="text-muted"><?php echo e($bdata->provider_name); ?></a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="booking-action">
                        <?php if($bdata->status == 1): ?>
                           <a class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#cancel_application_<?php echo e($bdata->booking_id); ?>"><i class="fas fa-close"></i> <?php echo e(trans('labels.cancel_booking')); ?></a>
                        <?php elseif($bdata->status == 2): ?>
                           <h5><span class="badge bg-primary-light"><i class="fas fa-clock"></i> <?php echo e(trans('labels.inprogress')); ?> </span></h5>
                        <?php elseif($bdata->status == 3): ?>
                           <h5><span class="badge bg-success-light"><i class="fas fa-check"></i> <?php echo e(trans('labels.completed')); ?> </span></h5>
                        <?php elseif($bdata->status == 4): ?>
                           <h5><span class="badge bg-danger-light"><i class="fas fa-close"></i>
                              <?php if($bdata->canceled_by==1): ?>
                                 <?php echo e(trans('labels.cancel_by_provider')); ?>

                              <?php endif; ?>
                              <?php if($bdata->canceled_by==2): ?>
                                 <?php echo e(trans('labels.cancel_by_you')); ?>

                              <?php endif; ?>
                           </span></h5>
                        <?php endif; ?>
                     </div>
                  </div>
                  <div class="modal" tabindex="-1" role="dialog" id="cancel_application_<?php echo e($bdata->booking_id); ?>">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Cancel  Shift</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                               <form action="<?php echo e(URL::to('/home/user/bookings/cancel')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="booking_id" value="<?php echo e($bdata->booking_id); ?>"/>
                                <p>Are you sure you want to cancel this Shift?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Yes Cancel</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>     
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <div class="d-flex justify-content-center">
                  <?php echo e($bookingdata->links()); ?>

               </div>
            <?php else: ?>
            <p class="no-center"><?php echo e(trans('labels.no_data')); ?></p>
            <?php endif; ?>
         </div>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.vendor_theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/user/bookings.blade.php ENDPATH**/ ?>
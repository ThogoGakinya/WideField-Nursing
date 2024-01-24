<?php $__env->startSection('page_title'); ?>
   <?php echo e(trans('labels.user')); ?> | <?php echo e(trans('labels.booking_details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('front_content'); ?>
   <div class="col-xl-9 col-md-8">
      <div class="row match-height">
         <?php if(!empty($bookingdata)): ?>
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div class="plan-det">
                     <h5><?php echo e(trans('labels.booking_status')); ?> 
                        <?php if($bookingdata->status == 1): ?> 
                           <a class="btn btn-sm bg-danger-light float-right" onclick="cancelbooking('<?php echo e($bookingdata->booking_id); ?>','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('/home/user/bookings/cancel')); ?>','<?php echo e(trans('messages.wrong')); ?> :(','<?php echo e(trans('messages.record_safe')); ?>')"><i class="fas fa-close"></i> <?php echo e(trans('labels.cancel_booking')); ?></a>
                        <?php endif; ?>
                        <?php if($bookingdata->is_rated==0 && $bookingdata->status==3 ): ?>
                           <a class="btn btn-sm bg-info-light float-right" data-toggle="modal" data-target="#add-rattings"><i class="fas fa-star"></i> <?php echo e(trans('labels.add_rattings')); ?></a>
                        <?php endif; ?>
                     </h5>
                     <hr>
                     <div class="bookingtrack">
                        <?php if($bookingdata->status == 1): ?>
                           <div class="step active">
                              <span class="icon"><i class="fa fa-clock"></i></span>
                              <span class="text"> <?php echo e(trans('labels.pending')); ?> </span>
                           </div>
                           <div class="step"><span class="icon"><i class="fa fa-user"></i></span><span class="text"><?php echo e(trans('labels.accepted_by_provider')); ?></span></div>
                           <div class="step"><span class="icon"><i class="fa fa-hourglass-start"></i></span><span class="text"><?php echo e(trans('labels.booking_inprogress')); ?></span></div>
                           <div class="step"><span class="icon"><i class="fa fa-check"></i></span><span class="text"><?php echo e(trans('labels.completed')); ?></span> </div>
                        <?php endif; ?>
                        <?php if($bookingdata->status == 2): ?>
                           <div class="step active"><span class="icon"><i class="fa fa-clock"></i></span><span class="text"> <?php echo e(trans('labels.pending')); ?> </span></div>
                           <div class="step active"><span class="icon"><i class="fa fa-user"></i></span><span class="text"><?php echo e(trans('labels.accepted_by_provider')); ?></span></div>
                           <div class="step active"><span class="icon"><i class="fa fa-hourglass-start"></i></span>
                              <?php if($bookingdata->handyman_id != "" && $bookingdata->handyman_accept==1): ?>
                                 <span class="text"><?php echo e(trans('labels.handyman_assigned')); ?></span>
                              <?php else: ?>
                                 <span class="text"><?php echo e(trans('labels.booking_inprogress')); ?></span>
                              <?php endif; ?>
                           </div>
                           <div class="step"><span class="icon"><i class="fa fa-check"></i></span><span class="text"><?php echo e(trans('labels.completed')); ?></span></div>
                        <?php endif; ?>
                        <?php if($bookingdata->status == 3): ?>
                           <div class="step active"><span class="icon"><i class="fa fa-clock"></i></span><span class="text"> <?php echo e(trans('labels.pending')); ?> </span></div>
                           <div class="step active"><span class="icon"><i class="fa fa-user"></i></span><span class="text"><?php echo e(trans('labels.accepted_by_provider')); ?></span></div>
                           <div class="step active"><span class="icon"><i class="fa fa-hourglass-end"></i></span><span class="text"><?php echo e(trans('labels.booking_inprogress')); ?></span></div>
                           <div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text"><?php echo e(trans('labels.completed')); ?></span> </div>
                        <?php endif; ?>
                        <?php if($bookingdata->status == 4): ?>
                           <div class="step active">
                              <span class="icon"><i class="fa fa-close"></i></span><span class="text">
                                 <?php if($bookingdata->canceled_by == 1): ?>
                                    <?php echo e(trans('labels.canceled_by_provider')); ?>

                                 <?php else: ?>
                                    <?php echo e(trans('labels.canceled_by_you')); ?>

                                 <?php endif; ?>
                              </span> 
                           </div>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <div class="plan-det">
                     <h5><a class="text-dark" href="<?php echo e(URL::to('/home/service-details/'.$bookingdata->service_slug)); ?>"><?php echo e($bookingdata->service_name); ?></a></h5><hr>
                     <div class="booking-list">
                        <div class="booking-widget">
                           <img class="booking-img rounded" src="<?php echo e(Helper::image_path($bookingdata->service_image)); ?>" alt="<?php echo e(trans('labels.service_image')); ?>">
                           <div class="booking-det-info">
                              <ul class="list-group list-group-flush">
                                 <li class="list-group-item"><?php echo e(trans('labels.price')); ?> :- <span><?php echo e(Helper::currency_format($bookingdata->price)); ?></span></li>
                                 <li class="list-group-item"><?php echo e(trans('labels.category')); ?> :- <span><?php echo e($bookingdata->category_name); ?></span></li>
                                 <li class="list-group-item"><?php echo e(trans('labels.duration')); ?> :- 
                                    <span><?php if($bookingdata->price_type == "Fixed"): ?>
                                          <?php if($bookingdata->duration_type == 1): ?>
                                             <?php echo e($bookingdata->duration.trans('labels.minutes')); ?>

                                          <?php elseif($bookingdata->duration_type == 2): ?>
                                             <?php echo e($bookingdata->duration.trans('labels.hours')); ?>

                                          <?php elseif($bookingdata->duration_type == 3): ?>
                                             <?php echo e($bookingdata->duration.trans('labels.days')); ?>

                                          <?php else: ?>
                                             <?php echo e($bookingdata->duration.trans('labels.minutes')); ?>

                                          <?php endif; ?> 
                                    <?php else: ?>
                                       <?php echo e($bookingdata->price_type); ?>

                                    <?php endif; ?>
                                    <i class="fas fa-clock ml-1"></i></span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-7">
            <div class="card">
               <div class="card-body">
                  <div class="plan-det">
                     <h5><?php echo e(trans('labels.date_and_time')); ?></h5><hr>
                     <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo e(trans('labels.date')); ?> :- <span><?php echo e(Helper::date_format($bookingdata->date)); ?></span></li>
                        <li class="list-group-item"><?php echo e(trans('labels.time')); ?> :- <span><?php echo e($bookingdata->time); ?></span></li>
                        <?php if($bookingdata->note != "" || $bookingdata->note != null): ?>
                           <li class="list-group-item"><?php echo e(trans('labels.notes')); ?> :- <span><?php echo e(strip_tags($bookingdata->note)); ?></span></li>
                        <?php endif; ?>
                       <li class="list-group-item"><?php echo e(trans('labels.address')); ?> :- <span><?php echo e(strip_tags($bookingdata->address)); ?></span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-5">
            <div class="card">
               <div class="card-body">
                  <div class="plan-det">
                     <h5><?php echo e(trans('labels.payment_details')); ?></h5><hr>
                     <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo e(trans('labels.payment_type')); ?> <span class="float-right">
                           <?php if($bookingdata->payment_type == 1): ?>
                              <?php echo e(trans('labels.cod')); ?>

                           <?php elseif($bookingdata->payment_type == 2): ?>
                              <?php echo e(trans('labels.wallet')); ?>

                           <?php else: ?>
                              <?php echo e(trans('labels.online')); ?>

                           <?php endif; ?>
                        </span></li>
                        <li class="list-group-item"><?php echo e(trans('labels.price')); ?> <span class="float-right"><?php echo e(Helper::currency_format($bookingdata->price)); ?></span></li>
                        <li class="list-group-item"><?php echo e(trans('labels.discount')); ?> <span class="float-right"><?php echo e(Helper::currency_format($bookingdata->discount)); ?></span></li>
                        <li class="list-group-item"><strong><?php echo e(trans('labels.total')); ?> <span class="float-right"><?php echo e(Helper::currency_format($bookingdata->total_amt)); ?></span></strong></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <div class="plan-det">
                     <h5><?php echo e(trans('labels.provider_details')); ?></h5><hr>
                     <div class="booking-list">
                        <div class="booking-widget">
                           <a href="<?php echo e(URL::to('/home/providers-services/'.$bookingdata->provider_slug)); ?>" class="p-2">
                              <img class="booking-img rounded" src="<?php echo e(Helper::image_path($bookingdata->provider_image)); ?>" alt="<?php echo e(trans('labels.provider_image')); ?>">
                           </a>
                           <div class="booking-det-info pt-2">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?php echo e(trans('labels.name')); ?> :- <span><?php echo e($bookingdata->provider_name); ?></span></li>
                                <li class="list-group-item"><?php echo e(trans('labels.email')); ?> :- <span><?php echo e($bookingdata->provider_email); ?></span></li>
                                <li class="list-group-item"><?php echo e(trans('labels.mobile')); ?> :- <span><?php echo e($bookingdata->provider_mobile); ?></span></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php if($bookingdata->handyman_id != "" && $bookingdata->handyman_accept==1): ?>
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <div class="plan-det">
                     <h5><?php echo e(trans('labels.handyman_details')); ?></h5><hr>
                     <div class="booking-list">
                        <div class="booking-widget">
                           <img class="booking-img rounded" src="<?php echo e(Helper::image_path($bookingdata->handyman_image)); ?>" alt="<?php echo e(trans('labels.handyman_image')); ?>">
                           <div class="booking-det-info pt-2">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?php echo e(trans('labels.name')); ?> :- <span><?php echo e($bookingdata->handyman_name); ?></span></li>
                                <li class="list-group-item"><?php echo e(trans('labels.email')); ?> :- <span><?php echo e($bookingdata->handyman_email); ?></span></li>
                                <li class="list-group-item"><?php echo e(trans('labels.mobile')); ?> :- <span><?php echo e($bookingdata->handyman_mobile); ?></span></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php endif; ?>
         <?php else: ?>
            <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
         <?php endif; ?>
      </div>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.vendor_theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/user/booking_details.blade.php ENDPATH**/ ?>
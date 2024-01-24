<?php $__env->startSection('page_title'); ?>
   <?php echo e(trans('labels.user')); ?> | <?php echo e(trans('labels.notifications')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('front_content'); ?>
      <div class="col-xl-9 col-md-8">
         <div class="container">
            <h4 class="widget-title"><?php echo e(trans('labels.notifications')); ?></h4>
            <?php if(!empty($notifications) && count($notifications)>0): ?>
               <div class="row">
                  <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="col-lg-12">
                     <div class="review-list">
                        <div class="review-img">
                           <?php if($noti->booking_status == 1): ?>
                              <?php $image = 'booking-pending.png';?>
                           <?php elseif($noti->booking_status == 2): ?>
                              <?php $image = 'booking-confirmed.png';?>
                           <?php elseif($noti->booking_status == 3): ?>
                              <?php $image = 'booking-confirmed.png';?>
                           <?php elseif($noti->booking_status == 4): ?>
                              <?php $image = 'booking-cancel.png';?>
                           <?php else: ?>
                              <?php $image = '';?>
                           <?php endif; ?>
                           <img class="rounded img-fluid w-60" src="<?php echo e(Helper::image_path($image)); ?>" alt="">
                        </div>
                        <div class="review-info col-md-10">
                           <h5><a href="<?php echo e(URL::to('/home/user/bookings/'.$noti->booking_id)); ?>"><?php echo e($noti->title); ?></a>
                              <small class="review-date float-right text-muted"><?php echo e(Helper::date_format($noti->date)); ?></small>
                           </h5>
                           <p class="mb-2"><?php echo e($noti->message); ?></p>
                        </div>
                     </div>
                     </div>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

               </div>
               <div class="d-flex justify-content-center">
                  <?php echo e($notifications->links()); ?>

               </div>
            <?php else: ?>
               <p class="text-center"><?php echo e(trans('labels.not_available')); ?></p>
            <?php endif; ?>
         </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.vendor_theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/user/notifications.blade.php ENDPATH**/ ?>
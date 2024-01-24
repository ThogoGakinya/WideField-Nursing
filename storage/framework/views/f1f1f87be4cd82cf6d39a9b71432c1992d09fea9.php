<?php $__env->startSection('page_title'); ?>
   <?php echo e(trans('labels.user')); ?> | <?php echo e(trans('labels.dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('front_content'); ?>
   <div class="col-xl-9 col-md-8">
      <div class="row">
         <div class="col-lg-4">
            <a href="<?php echo e(URL::to('/home/user/bookings')); ?>" class="dash-widget dash-bg-1">
               <?php if(!empty($bookings)): ?>
               <span class="dash-widget-icon"><?php echo e(count($bookings)); ?></span>
               <div class="dash-widget-info">
                  <span><?php echo e(trans('labels.bookings')); ?></span>
               </div>
               <?php else: ?>
                  <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
               <?php endif; ?>
            </a>
         </div>
         <div class="col-lg-4">
            <a href="<?php echo e(URL::to('/home/user/reviews')); ?>" class="dash-widget dash-bg-2">
               <?php if(!empty($reviews)): ?>
               
               <span class="dash-widget-icon"><?php echo e(count($reviews)); ?></span>
               <div class="dash-widget-info">
                  <span><?php echo e(trans('labels.reviews')); ?></span>
               </div>
               <?php else: ?>
                  <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
               <?php endif; ?>
            </a>
         </div>
         <div class="col-lg-4">
            <a href="" onclick="clearnotification()" class="dash-widget dash-bg-3">
                <?php if(!empty($notifications)): ?>
                
               <span class="dash-widget-icon"><?php echo e(count($notifications)); ?></span>
               <div class="dash-widget-info">
                  <span><?php echo e(trans('labels.notifications')); ?></span>
               </div>
               <?php else: ?>
                  <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
               <?php endif; ?>
            </a>
         </div>
      </div>
   </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.vendor_theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/user/dashboard.blade.php ENDPATH**/ ?>
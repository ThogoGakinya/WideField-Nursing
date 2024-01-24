<?php $__env->startSection('page_title'); ?>
   <?php echo e(trans('labels.user')); ?> | <?php echo e(trans('labels.reviews')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('front_content'); ?>
   <div class="col-xl-9 col-md-8">
      <h4 class="widget-title"><?php echo e(trans('labels.reviews')); ?></h4>
      <?php if(!empty($rattingsdata) && count($rattingsdata)>0): ?>
         <div class="card review-card mb-0">
            <div class="card-body">
               <?php $__currentLoopData = $rattingsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="review-list">
                     <div class="review-img">
                        <img class="rounded" 
                        <?php if($rdata->service_image != ""): ?>
                           src="<?php echo e(Helper::image_path($rdata->service_image)); ?>"
                        <?php else: ?>
                           src="<?php echo e(Helper::image_path($rdata->provider_image)); ?>"
                        <?php endif; ?>
                        alt="<?php echo e(trans('labels.image')); ?>">
                     </div>
                     <div class="review-info">
                        <h5>
                           <?php if($rdata->service_name != ""): ?>
                              <a href="<?php echo e(URL::to('/home/service-details/'.$rdata->service_slug)); ?>"><?php echo e($rdata->service_name); ?></a>
                           <?php else: ?>
                              <a href="<?php echo e(URL::to('/home/providers-services/'.$rdata->provider_slug)); ?>"><?php echo e($rdata->provider_name); ?></a>
                           <?php endif; ?>
                        </h5>
                        <div class="review-date"><?php echo e(Helper::date_format($rdata->date)); ?></div>
                        <p class="mb-2"><?php echo e(Str::limit($rdata->comment,100)); ?></p>
                     </div>
                     <div class="review-count">
                        <div class="rating">
                           <i class="fas fa-star filled"></i>
                           <span class="d-inline-block average-rating"><?php echo e(number_format($rdata->ratting,1)); ?></span>
                        </div>
                     </div>
                  </div>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
            </div>
         </div>
         <div class="d-flex justify-content-center">
            <?php echo e($rattingsdata->links()); ?>

         </div>
      <?php else: ?>
         <div class="d-flex justify-content-center">
            <?php echo e(trans('labels.no_data')); ?>

         </div>
      <?php endif; ?>
   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.vendor_theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/user/reviews.blade.php ENDPATH**/ ?>
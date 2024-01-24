<?php $__currentLoopData = $providerdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fpdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <div class="col-lg-2 col-md-6">
      <div class="service-widget">
         <div class="service-img">
            <a href="<?php echo e(URL::to('/home/providers-services/'.$fpdata->slug)); ?>">
               <img class="img-fluid serv-img popular-services-img" alt="provider Image" src="<?php echo e(Helper::image_path($fpdata->provider_image)); ?>">
            </a>
            <div class="item-info">
               <div class="service-user">
                  <span class="service-price"><?php echo e($fpdata->provider_name); ?></span>
               </div>
               <div class="cate-list">
                  <a class="bg-yellow"><?php echo e($fpdata->provider_type); ?></a>
               </div>
            </div>
         </div>
         <div class="service-content">
            <span><?php echo e(Str::limit(strip_tags($fpdata->about),50)); ?></span>
            <div class="rating">
               <i class="fas fa-star filled"></i>
               <span class="d-inline-block average-rating"><?php echo e(number_format($fpdata['rattings']->avg('ratting'),1)); ?></span>
            </div>
            <div class="user-info">
               <div class="row">
                  <span class="col-auto ser-contact">
                     <i class="fas fa-phone-alt mr-1"></i>
                     <span><?php echo e($fpdata->mobile); ?></span>
                  </span>
               </div>
            </div>
         </div>
      </div>
   </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/provider_section.blade.php ENDPATH**/ ?>
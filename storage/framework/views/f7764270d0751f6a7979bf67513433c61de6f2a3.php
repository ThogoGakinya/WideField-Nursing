<?php $__currentLoopData = $servicedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <div class="col-lg-3 col-md-6">
      <div class="service-widget">
         <div class="service-img">
                            <a href="<?php echo e(URL::to('/home/service-details/'.$sdata->slug)); ?>">
               <img class="img-fluid serv-img popular-services-img" src="<?php echo e(Helper::image_path($sdata->service_image)); ?>" alt="<?php echo e(trans('labels.service_image')); ?>">
            </a>
            <div class="item-info">
               <div class="service-user">
                  <span class="service-price"><?php echo e(Helper::currency_format($sdata->price)); ?></span>
               </div>
               <div class="cate-list">
                  <a class="bg-yellow"><?php echo e($sdata->category_name); ?></a>
               </div>
            </div>
         </div>
         <div class="service-content">
            <h3 class="title">
               <a href="<?php echo e(URL::to('/home/service-details/'.$sdata->slug)); ?>"><?php echo e($sdata->service_name); ?></a>
            </h3>
            <address class="service-location"><i class="fas fa-location-arrow"></i> <?php echo e($sdata->address); ?></address>
            <div class="rating">
                 
               <i class="fas fa-star filled"></i>
               <span class="d-inline-block average-rating"><?php echo e($sdata->start_time); ?></span>
            </div>
            <div class="user-info">
               
               <div class="row">
                  <span class="col-auto ser-contact"><i class="fas fa-phone-alt mr-1"></i>
                     <span><?php echo e($sdata->mobile); ?></span>
                  </span>
                  <span class="col ser-location">
                     <?php if($sdata->price_type == "Fixed"): ?>
                        <span>
                           <?php if($sdata->duration_type == 1): ?>
                              <?php echo e($sdata->duration.trans('labels.minutes')); ?>

                           <?php elseif($sdata->duration_type == 2): ?>
                              <?php echo e($sdata->duration.trans('labels.hours')); ?>

                           <?php elseif($sdata->duration_type == 3): ?>
                              <?php echo e($sdata->duration.trans('labels.days')); ?>

                           <?php else: ?>
                              <?php echo e($sdata->duration.trans('labels.minutes')); ?>

                           <?php endif; ?>
                        </span><i class="fas fa-clock ml-1"></i>
                     <?php else: ?>
                        <span><?php echo e($sdata->price_type); ?></span><i class="fas fa-clock ml-1"></i>
                     <?php endif; ?>
                  </span>
               </div>
               <div class="row">
                   <div class="col-md-6">
                       <small><i><?php echo e($sdata->category_name); ?></i></small>
                   </div>

                   <div class="col-md-6" align="right">
                       <small><i></i></small>
                   </div>
                  <!--<span class="col-auto ser-contact">-->
                  <!--     <small>Time :<i><?php echo e($sdata->start_time); ?></i></small>-->
                  <!--      <small><i><?php echo e($sdata->end_time); ?></i></small>-->
                  <!--</span>-->
                  
               </div>
               
                <div class="row">
                      <div class="col-md-8" align="center">
                         <div class="cate-list" style="text-align:center;">
                              <a href="<?php echo e(URL::to('/home/service-details/'.$sdata->slug)); ?>" class="btn btn-success btn-sm">Book Shift</a>
                          </div>
                      </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/service_section.blade.php ENDPATH**/ ?>
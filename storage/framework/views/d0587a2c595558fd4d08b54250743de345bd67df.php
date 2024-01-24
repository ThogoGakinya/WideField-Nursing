<?php $__env->startSection('page_title'); ?>
   <?php echo e(@$providerdata->provider_name); ?> | <?php echo e(trans('labels.services')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-title">
                        <h2><?php echo e(trans('labels.providers')); ?></h2>
                    </div>
                </div>
                <div class="col-auto float-right ml-auto breadcrumb-menu">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('labels.home')); ?></a></li>
                           <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/home/providers')); ?>"><?php echo e(trans('labels.providers')); ?></a></li>
                           <li class="breadcrumb-item active" aria-current="page"><?php echo e(@$providerdata->provider_name); ?></li>
                        </ol>
                    </nav> 
                </div>
            </div>
        </div>
      </div>

      <div class="content">
         <div class="container">
            <div class="row">
               <?php echo $__env->make('front.layout.provider_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <div class="col-xl-9 col-md-8">
                  <h4 class="widget-title"><?php echo e(trans('labels.services')); ?></h4>
                  <?php if(!empty($servicedata) && count($servicedata)>0): ?>
                     <div class="row">
                        <?php $__currentLoopData = $servicedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="col-lg-4 col-md-4">
                              <div class="service-widget">
                                 <div class="service-img">
                                 <a href="<?php echo e(URL::to('/home/service-details/'.$sdata->slug)); ?>">
                                    <img class="img-fluid serv-img popular-services-img" alt="<?php echo e(trans('labels.service_image')); ?>" src="<?php echo e(Helper::image_path($sdata->service_image)); ?>">
                                 </a>
                                 <div class="item-info">
                                    <div class="service-user">
                                       <span class="service-price"><?php echo e(Helper::currency_format($sdata->price)); ?></span>
                                    </div>
                                    <div class="cate-list">
                                       <a class="bg-yellow" href="#"><?php echo e($sdata->category_name); ?></a>
                                    </div>
                                 </div>
                                 </div>
                                 <div class="service-content">
                                 <h3 class="title text-truncate">
                                    <a href="<?php echo e(URL::to('/home/service-details/'.$sdata->id)); ?>"><?php echo e($sdata->service_name); ?></a>
                                 </h3>
                                 <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <span class="d-inline-block average-rating"><?php echo e(number_format($sdata['rattings']->avg('ratting'),1)); ?></span>
                                 </div>
                                 <div class="user-info">
                                    <div class="service-action">
                                       <div class="row">
                                          <span class="col-auto ser-contact"><i class="fas fa-phone-alt mr-1"></i>
                                             <span><?php echo e($sdata->provider_mobile); ?></span>
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

                                                   <?php endif; ?>
                                                </span><i class="fas fa-clock ml-1"></i>
                                             <?php else: ?>
                                                <span><?php echo e($sdata->price_type); ?></span><i class="fas fa-clock ml-1"></i>
                                             <?php endif; ?>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                  <?php else: ?>
                     <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/provider_services.blade.php ENDPATH**/ ?>
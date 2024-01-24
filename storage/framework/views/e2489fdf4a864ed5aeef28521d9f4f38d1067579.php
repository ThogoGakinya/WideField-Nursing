<?php $__env->startSection('page_title'); ?>
   <?php echo e($providerdata->provider_name); ?> | <?php echo e(trans('labels.reviews')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-title">
                        <h2><?php echo e(trans('labels.reviews')); ?></h2>
                    </div>
                </div>
                <div class="col-auto float-right ml-auto breadcrumb-menu">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('labels.home')); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/home/providers')); ?>"><?php echo e(trans('labels.providers')); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($providerdata->provider_name); ?></li>
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
                  <h4 class="widget-title"><?php echo e(trans('labels.reviews')); ?></h4>
                  <?php if(!empty($providerrattingsdata) && count($providerrattingsdata)>0): ?>
                     <div class="card review-card mb-0">
                        <div class="card-body">
                           <?php $__currentLoopData = $providerrattingsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="review-list">
                                 <div class="review-img">
                                    <img class="rounded img-fluid" src="<?php echo e(Helper::image_path($prdata->user_image)); ?>" alt="">
                                 </div>
                                 <div class="review-info">
                                    <div class="review-user mt-2"><b><?php echo e($prdata->user_name); ?></b></div>
                                    <p class="mb-2"><?php echo e($prdata->comment); ?></p>
                                 </div>
                                 <div class="review-count">
                                    <div class="col">
                                       <div class="text-muted"><?php echo e($prdata->date); ?></div>
                                       <div class="rating text-right">
                                          <i class="fas fa-star filled"></i>
                                          <span class="d-inline-block average-rating"><?php echo e(number_format($prdata->ratting,1)); ?></span>
                                       </div>
                                    </div>
                                 </div>
                                 
                              </div>

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              
                        </div>
                     </div>
                     <div class="d-flex justify-content-center">
                        <?php echo $providerrattingsdata->links(); ?>

                     </div>
                  <?php else: ?>
                     <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/provider_rattings.blade.php ENDPATH**/ ?>
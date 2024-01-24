<?php $__env->startSection('page_title',trans('labels.terms_conditions')); ?>

<?php $__env->startSection('content'); ?>
      <div class="breadcrumb-bar">
         <div class="container">
            <div class="row">
               <div class="col">
                  <div class="breadcrumb-title">
                     <h2><?php echo e(trans('labels.terms_conditions')); ?></h2>
                  </div>
               </div>
               <div class="col-auto float-right ml-auto breadcrumb-menu">
                  <nav aria-label="breadcrumb" class="page-breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('labels.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(trans('labels.terms_conditions')); ?></li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <section class="about-us">
         <div class="content">
            <div class="container">
               <?php if(!empty($tcdata)): ?>
               <div class="row">
                  <div class="col-12">
                     <div class="about-blk-content" >
                        <h4 class="text-center"><?php echo e(trans('labels.terms_conditions')); ?></h4>
                        <p><?php echo e($tcdata->tc_content); ?></p>
                     </div>
                  </div>
               </div>
               <?php else: ?>
                  <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
               <?php endif; ?>
            </div>
         </div>
      </section>
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/tc.blade.php ENDPATH**/ ?>
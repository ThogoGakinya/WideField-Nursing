<?php $__env->startSection('page_title',trans('labels.about_us')); ?>
<?php $__env->startSection('content'); ?>
      <div class="breadcrumb-bar">
         <div class="container">
            <div class="row">
               <div class="col">
                  <div class="breadcrumb-title">
                     <h2><?php echo e(trans('labels.about_us')); ?></h2>
                  </div>
               </div>
               <div class="col-auto float-right ml-auto breadcrumb-menu">
                  <nav aria-label="breadcrumb" class="page-breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('labels.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(trans('labels.about_us')); ?></li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <section class="about-us">
         <div class="content">
            <div class="container">
               <?php if(!empty($aboutdata)): ?>
               <div class="row">
                  <div class="col-6">
                     <div class="about-blk-content">
                        <p >We match healthcare workers with open shifts at the best facilities. 
                        <br>When you’re a nurse, you know that every day you will touch a life or a life will touch yours</p>
                           <!-- <?php echo nl2br(e($aboutdata->about_content)); ?> -->
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="about-blk-image">
                        <img src="<?php echo e(Helper::image_path(Helper::appdata()->banner)); ?>" class="img-fluid" alt="<?php echo e(trans('labels.aboutus_image')); ?>">
                     </div>
                  </div>
               </div>
               <?php else: ?>
                  <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
               <?php endif; ?>
            </div>
         </div>
      </section>
      
      <?php echo $__env->make('front.how_work', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/aboutus.blade.php ENDPATH**/ ?>
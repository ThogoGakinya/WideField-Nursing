<?php $__env->startSection('page_title',trans('labels.categories')); ?>
<?php $__env->startSection('content'); ?>
      <div class="breadcrumb-bar">
         <div class="container">
            <div class="row">       
               <div class="col">
                  <div class="breadcrumb-title">
                     <h2><?php echo e(trans('labels.categories')); ?></h2>
                  </div>
               </div>
               <div class="col-auto float-right ml-auto breadcrumb-menu">
                  <nav aria-label="breadcrumb" class="page-breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('labels.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(trans('labels.categories')); ?></li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <div class="content">
         <?php echo $__env->make('front.category_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/categories.blade.php ENDPATH**/ ?>
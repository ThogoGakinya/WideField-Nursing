<?php $__env->startSection('page_title',trans('labels.services')); ?>

<?php $__env->startSection('content'); ?>

   <div class="breadcrumb-bar">
      <div class="container">
         <div class="row">       
            <div class="col">
               <div class="breadcrumb-title">
                  <h2><?php echo e(trans('labels.services')); ?></h2>
               </div>
            </div>
            <div class="col-auto float-right ml-auto breadcrumb-menu">
               <nav aria-label="breadcrumb" class="page-breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('labels.home')); ?></a></li>
                     <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('labels.services')); ?></li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
      <div class="col-auto">
               <div class="sort-by">
                  <select class="form-control searchFilter" name="search_category" id="category_id" url="<?php echo e(URL::to('/home/user/get-bookings-by')); ?>">
                     <option value="all" selected><?php echo e(trans('labels.all')); ?></option>
                     <option value="1"><?php echo e(trans('labels.rn')); ?></option>
                     <option value="2"><?php echo e(trans('labels.lpn')); ?></option>
                     <option value="3"><?php echo e(trans('labels.cna')); ?></option>
                  </select>
               </div>
            </div>
   <section class="popular-services">
      <div class="content">
         <div class="container-fluid">
            <div class="catsec clearfix">
               <?php if(!empty($servicedata) && count($servicedata)>0): ?>
                  <div class="row">
                    <?php echo $__env->make('front.service_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                  <div class="d-flex justify-content-center">
                     <?php echo e($servicedata->links()); ?>

                  </div>
               <?php else: ?>
                  <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/services.blade.php ENDPATH**/ ?>
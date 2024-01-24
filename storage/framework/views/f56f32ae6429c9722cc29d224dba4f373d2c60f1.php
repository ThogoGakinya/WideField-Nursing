   
<div class="catsec">
   <div class="container-fluid">
      <?php if(!empty($categorydata) && count($categorydata)>0): ?>
         <div class="row match-height">
            <?php $__currentLoopData = $categorydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-2 col-md-3 col-sm-2 p-0 m-0">
               <div class="card-deck text-center">
                  <div class="card-body m-0 p-0">
                     <a href="<?php echo e(URL::to('/home/services/'.$cdata->slug)); ?>">
                     <img class="card-img-top img-fluid category-section-img" src="<?php echo e(Helper::image_path($cdata->image)); ?>" alt="<?php echo e(trans('labels.image')); ?>">
                     </a>
                  </div>
                  <div class="card-footer text-dark m-auto">
                     <h6><?php echo e($cdata->name); ?></h6>
                  </div>
               </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
      <?php else: ?>
         <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
      <?php endif; ?>
   </div>
</div><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/category_section.blade.php ENDPATH**/ ?>
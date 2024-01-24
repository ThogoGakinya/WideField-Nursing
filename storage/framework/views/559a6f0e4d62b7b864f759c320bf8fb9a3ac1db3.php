


<?php $__env->startSection('content'); ?>

      <div class="content">
         <div class="container">
            <div class="row">

               <?php echo $__env->make('front.layout.vendor_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

               <?php echo $__env->yieldContent('front_content'); ?>

            </div>
         </div>
      </div>
         
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/layout/vendor_theme.blade.php ENDPATH**/ ?>
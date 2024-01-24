<?php $__env->startSection('page_title',trans('labels.payout_request')); ?>
<?php $__env->startSection('content'); ?>
   <section id="contenxtual">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title"><?php echo e(trans('labels.payout_request')); ?></h4>
               </div>
               <div class="card-body">
                  <div class="card-block">
                     <?php echo $__env->make('payout.payout_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
   <script src="<?php echo e(asset('resources/views/payout/payout.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/payout/index.blade.php ENDPATH**/ ?>
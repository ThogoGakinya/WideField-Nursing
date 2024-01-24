<?php $__env->startSection('page_title',trans('labels.handymans')); ?>
<?php $__env->startSection('content'); ?>
   <section id="ordering">
      <div class="row">
         <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title"><?php echo e(trans('labels.handyman')); ?>

                     <?php if(Auth::user()->type == 2): ?>
                        <a href="<?php echo e(URL::to('/handymans-add')); ?>" class="btn btn-primary btn-sm float-right"><?php echo e(trans('labels.add_new')); ?></a>
                     <?php endif; ?>
                  </h4>
               </div>
               <div class="card-body collapse show">
                  <div class="card-block card-dashboard">
                     <?php echo $__env->make('provider.handyman.handyman_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('resources/views/provider/handyman/handyman.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/provider/handyman/index.blade.php ENDPATH**/ ?>
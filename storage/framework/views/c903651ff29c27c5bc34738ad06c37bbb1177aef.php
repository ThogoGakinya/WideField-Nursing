<?php $__env->startSection('page_title',trans('labels.reviews')); ?>
<?php $__env->startSection('content'); ?>
	<div class="col-sm-12 col-md-6 col-lg-12">
      <div class="card">
			<div class="card-header">
				<h4 class="card-title">
					<?php echo e(trans('labels.average_ratting')); ?> <span class="badge badge-light text-right"><i class="fa fa-star yellow"></i> <?php echo e(number_format($averageratting->avg_ratting,1)); ?></span>
				</h4>
			</div>
         <div class="card-body">
         	<?php if(!empty($rattingsdata) && count($rattingsdata)>0): ?>
            <div class="card-block">
					<?php $__currentLoopData = $rattingsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="form-group row border-bottom border-dark mb-2">
							<div class="col-md-1 mb-1">
								<img class="rounded" src="<?php echo e(Helper::image_path($rdata->user_image)); ?>" alt="<?php echo e(trans('labels.image')); ?>" class="rounded table-image">
							</div>
							<div class="col-md-11 ">
								<div class="row">
									<div class="col col-md-10"><strong><?php echo e($rdata->user_name); ?></strong></div>
									<div class="col col-md-2 text-right text-muted"><?php echo e(Helper::date_format($rdata->date)); ?></div>
									<div class="w-100"></div>
									<div class="col col-md-10"><?php echo e(strip_tags($rdata->comment)); ?></div>
									<div class="col col-md-2 text-right">
										<i class="fa fa-star yellow"></i>
										<span class="d-inline-block average-rating"><?php echo e(number_format($rdata->ratting,1)); ?></span>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/provider/rattings.blade.php ENDPATH**/ ?>
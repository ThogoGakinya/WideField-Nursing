<?php $__env->startSection('page_title',trans('labels.notifications')); ?>
<?php $__env->startSection('content'); ?>
	<section id="list">
	   <div class="row match-height">
	      <div class="col-sm-12 col-md-6 col-lg-12">
	         <div class="card">
	            <div class="card-header">
	               <h4 class="card-title"><?php echo e(trans('labels.notifications')); ?></h4>
	            </div>
					<div class="card-body">
	               <div class="card-block">
	                  <div class="simple-line-icons overflow-hidden">
	                  	<?php if(!empty($notificationdata) && count($notificationdata)>0): ?>
                        	<div class="row">
									<?php $__currentLoopData = $notificationdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="col-md-12 col-sm-6 col-12 fonticon-container ">
											<div class="fonticon-wrap">
												<?php if($noti->booking_status == 1): ?>
													<i class="fa fa-tags info"></i>
												<?php endif; ?>
												<?php if($noti->booking_status == 3): ?>
													<i class="fa fa-check success"></i>
												<?php endif; ?>
												<?php if($noti->booking_status == 4): ?>
													<i class="fa fa-times danger"></i>
												<?php endif; ?>
												<?php if($noti->booking_status == 2 && $noti->title == "Booking Rejected"): ?>
													<i class="fa fa-times danger"></i>
												<?php endif; ?>
												<?php if($noti->booking_status == 2 && $noti->title == "Booking Accepted"): ?>
													<i class="fa fa-check success"></i>
												<?php endif; ?>
											</div>
											<label class="fonticon-classname" for="view_info">
												<a href="<?php echo e(URL::to('/bookings/'.$noti->booking_id)); ?>" class="text-dark"><?php echo e($noti->title); ?></a>
												<small class="text-muted font-small-3 float-right mr-2 mt-1"><?php echo e(Helper::date_format($noti->date)); ?></small>
											</label>
											<label class=""><?php echo e($noti->message); ?></label>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
								<div class="text-center">
									<?php echo e($notificationdata->links()); ?>

								</div>
							</div>
						<?php else: ?>
							<p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
						<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
	    </div>
	</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/provider/notification.blade.php ENDPATH**/ ?>
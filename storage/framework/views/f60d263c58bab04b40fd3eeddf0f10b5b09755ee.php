<?php $__env->startSection('page_title'); ?>
	<?php echo e(trans('labels.booking')); ?> | <?php echo e(trans('labels.continue')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

		<div class="breadcrumb-bar">
	        <div class="container">
	            <div class="row">
	                <div class="col">
	                    <div class="breadcrumb-title">
	                        <h2><?php echo e(trans('labels.booking')); ?></h2>
	                    </div>
	                </div>
	                <div class="col-auto float-right ml-auto breadcrumb-menu">
	                    <nav aria-label="breadcrumb" class="page-breadcrumb">
	                        <ol class="breadcrumb">
	                           <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('labels.home')); ?></a></li>
	                           <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(URL::to('/home/services')); ?>"><?php echo e(trans('labels.services')); ?></a></li>
	                           <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('labels.continue')); ?></li>
	                        </ol>
	                    </nav>
	                </div>
	            </div>
	        </div>
	    </div>

		<div class="content">
			<div class="container">
				<div class="row">

	      			<div class="col-xl-8 col-md-8">
	         			<div class="row align-items-center mb-4">
			            	<div class="col">
			               		<h4 class="widget-title mb-0"><?php echo e(trans('labels.service')); ?></h4>
			            	</div>
			         	</div>
               			<div class="bookings">
               				<?php if(!empty($servicedata)): ?>
                  			<div class="booking-list">
                     			<div class="booking-widget">
                        			<a href="<?php echo e(URL::to('/home/service-details/'.$servicedata->slug)); ?>" class="booking-img">
                           				<img src="<?php echo e(Helper::image_path($servicedata->service_image)); ?>" alt="<?php echo e(trans('labels.service_image')); ?>">
                        			</a>
			                        <div class="booking-det-info">
			                           	<h3>
			                           		<a href="<?php echo e(URL::to('/home/service-details/'.$servicedata->slug)); ?>"><?php echo e($servicedata->service_name); ?></a>
			                           		<?php Storage::disk('local')->put("service", $servicedata->service_id);?>
			                           	</h3>
			                           	<ul class="booking-details">

			                           		<li><span><?php echo e(trans('labels.price')); ?></span> <?php echo e(Helper::currency_format($servicedata->price)); ?> </li>
			                           		<li><span><?php echo e(trans('labels.duration')); ?></span> 
												<?php if($servicedata->price_type == "Fixed"): ?>
		                                             <span>
		                                                <?php if($servicedata->duration_type == 1): ?>
		                                                   <?php echo e($servicedata->duration.trans('labels.minutes')); ?>

		                                                <?php elseif($servicedata->duration_type == 2): ?>
		                                                   <?php echo e($servicedata->duration.trans('labels.hours')); ?>

		                                                <?php elseif($servicedata->duration_type == 3): ?>
		                                                   <?php echo e($servicedata->duration.trans('labels.days')); ?>

		                                                <?php else: ?>
		                                                   <?php echo e($servicedata->duration.trans('labels.minutes')); ?>

		                                                <?php endif; ?>
		                                                <i class="fas fa-clock ml-1"></i>
		                                             </span>
		                                          <?php else: ?>
		                                             <span><?php echo e($servicedata->price_type); ?></span>
		                                          <?php endif; ?>
			                           		</li>
			                              	<li>
			                                 	<span><?php echo e(trans('labels.provider')); ?></span>
		                                 		<div class="avatar avatar-xs mr-1">
		                                    		<img class="avatar-img rounded-circle" alt="<?php echo e(trans('labels.provider_image')); ?>" src="<?php echo e(Helper::image_path($servicedata->provider_image)); ?>">
		                                 		</div>
		                                 		<?php echo e($servicedata->provider_name); ?>

		                              		</li>

			                           	</ul>
			                        </div>
                     			</div>
                  			</div>
                  			<?php else: ?>
                  				<p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
                  			<?php endif; ?>
               			</div>
	      			<!-- <div class="col-xl-4 col-md-4">
	         			<div class="row align-items-center mb-4">
			            	<div class="col">
			               		<h4 class="widget-title mb-0"><?php echo e(trans('labels.booking_summery')); ?></h4>
			            	</div>
			         	</div>
               			<div class="bookings">
               				<?php if(!empty($servicedata)): ?>
	                  			<div class="booking-list">
	                  				<?php if(Storage::exists('service_id') && Storage::disk('local')->get('service_id') == $servicedata->service_id): ?>
	                  					<input type="text" class="btn bg-light w-100 <?php $__errorArgs = ['coupon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="coupon" value="<?php echo e(Storage::disk('local')->get('coupon_code')); ?>" disabled="true">
										<a href="<?php echo e(URL::to('/home/remove-coupon/'.$servicedata->service_id)); ?>" class="btn bg-light w-100"><i class="fas fa-trash"></i> <?php echo e(trans('labels.remove_coupon')); ?> </a>
									<?php else: ?>
										<form id="check_coupon" action="<?php echo e(URL::to('/home/service/continue/check-coupon/'.$servicedata->slug)); ?>" method="POST">
		                           			<?php echo csrf_field(); ?>
											<p class="text-muted"><?php echo e(trans('labels.apply_coupon_here')); ?></p>
										  	<div class="row">
											  	<div class="col-sm-8">
											  		<input type="text" class="btn bg-light w-100 <?php $__errorArgs = ['coupon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="coupon" value="<?php echo e(old('coupon')); ?>" placeholder="<?php echo e(trans('labels.enter_coupon')); ?> ">
											  		<?php $__errorArgs = ['coupon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											  	</div>
											  	<div class="col-sm-4">
													<button type="submit" class="btn bg-light w-100"><i class="fas fa-paper-plane"></i> <?php echo e(trans('labels.apply')); ?> </button>
											  	</div>
											</div>
										</form>
									<?php endif; ?> 
	                  			</div>
	                  			<div class="booking-list">
								  	<div class="col-sm-8"><?php echo e(trans('labels.price')); ?></div>
								  	<div class="col-sm-4 text-right">
								  		<?php $price = $servicedata->price ; Storage::disk('local')->put("price", $price);?>
								  		<?php echo e(Helper::currency_format($price)); ?>

								  	</div>
								  	<div class="col-sm-8"><?php echo e(trans('labels.discount')); ?></div>
								  	<div class="col-sm-4 text-right">
								  		<?php if(Storage::exists('service_id') && Storage::disk('local')->get('service_id') == $servicedata->service_id): ?>
											<?php if(Storage::disk('local')->get('discount_type') == 2): ?>
												<?php $discount = (Storage::disk('local')->get('discount') / 100) * $price; Storage::disk('local')->put("total_discount", $discount); ?>
												<?php echo e(Helper::currency_format($discount)); ?>

											<?php elseif(Storage::disk('local')->get('discount_type') == 1): ?>
												<?php $discount = Storage::disk('local')->get('discount') ; Storage::disk('local')->put("total_discount", $discount);?>
												<?php echo e(Helper::currency_format($discount)); ?>

											<?php else: ?>
												<?php $discount = 0;Storage::disk('local')->put("total_discount", $discount );?>
												<?php echo e(Helper::currency_format($discount)); ?>

											<?php endif; ?>
										<?php else: ?>
											<?php $discount = 0;Storage::disk('local')->put("total_discount", $discount );?>
											<?php echo e(Helper::currency_format($discount)); ?>

										<?php endif; ?>
								  	</div> 
									<div class="w-100"><hr></div>
									<div class="col-sm-8"><?php echo e(trans('labels.total')); ?></div>
								  	<div class="col-sm-4 text-right">
								  		<?php $total = $price-$discount;Storage::disk('local')->put("total_price", $total); ?>
								  		<?php echo e(Helper::currency_format($total)); ?>

								  	</div> -->
									<div class="w-100"><hr></div>
									<div class="col-sm-12">
										<div class="service-book mt-1">
				                            <a class="btn btn-light border-dark" href="<?php echo e(URL::to('/home/service/continue/checkout/'.$servicedata->service_id)); ?>"><?php echo e(trans('labels.checkout')); ?>

				                            </a>
				                        </div>
				                       
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/continue_booking.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page_title'); ?>
   <?php echo e(trans('labels.user')); ?> | <?php echo e(trans('labels.wallett')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('front_content'); ?>
	<div class="col-xl-9 col-md-8">
		<?php if(!empty($walletdata)): ?>
     		<div class="row">
         	<div class="col-xl-6 col-lg-6 col-md-6">
             	<div class="card">
                 	<div class="card-body">
                     <h4 class="card-title border-bottom"><?php echo e(trans('labels.wallett')); ?></h4>
                     <div class="wallet-details">
                         
                         
                        <div id="ff-compose"></div>
                         <script async defer src="https://formfacade.com/include/107835492585041740563/form/1FAIpQLSfnE0U1uSQj9uY7wjaaADKuwO_E3_EjQjCWAAm6ZSV4OGiT8A/classic.js?div=ff-compose"></script>
                         
                        
                         
                       
                       
                
                     <span id="err_msg" class=""></span>
                     <div class="row">
             			<?php $__currentLoopData = $paymethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $methods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  	<div class="col-12 col-sm-6">
						  		<div class="list-group-item mb-3">
	    							<div class="custom-control custom-radio">
	    								<input class="custom-control-input" id="<?php echo e($methods->payment_name); ?>" data-payment_type="<?php echo e($methods->id); ?>" name="payment" type="radio">
	    								<label class="custom-control-label font-size-sm text-body text-nowrap" for="<?php echo e($methods->payment_name); ?>">

	    									<?php if($methods->payment_name == "RazorPay"): ?>
	    										<img src="<?php echo e(Helper::image_path('creditcard.png')); ?>" class="img-fluid ml-2" alt="knjbhv" width="30px" />

	    										<?php if($methods->environment=='1'): ?>
	    										    <input type="hidden" name="razorpay" id="razorpay" value="<?php echo e($methods->test_public_key); ?>">
	    										<?php else: ?>
	    										    <input type="hidden" name="razorpay" id="razorpay" value="<?php echo e($methods->live_public_key); ?>">
	    										<?php endif; ?>
												<?php echo e($methods->payment_name); ?>

	    									<?php endif; ?>

	    									<?php if($methods->payment_name == "Stripe"): ?>
	    										<img src="<?php echo e(Helper::image_path('creditcard.png')); ?>" class="img-fluid ml-2" alt="knjbhv" width="30px" />

	    										<?php if($methods->environment=='1'): ?>
	    										    <input type="hidden" name="stripe" id="stripe" value="<?php echo e($methods->test_public_key); ?>">
	    										<?php else: ?>
	    										    <input type="hidden" name="stripe" id="stripe" value="<?php echo e($methods->live_public_key); ?>">
	    										<?php endif; ?>
												<?php echo e($methods->payment_name); ?>

	    									<?php endif; ?>

	    									<?php if($methods->payment_name == "Flutterwave"): ?>
	    										<img src="<?php echo e(Helper::image_path('creditcard.png')); ?>" class="img-fluid ml-2" alt="knjbhv" width="30px" />

	    										<?php if($methods->environment=='1'): ?>
	    										    <input type="hidden" name="flutterwave" id="flutterwave" value="<?php echo e($methods->test_public_key); ?>">
	    										<?php else: ?>
	    										    <input type="hidden" name="flutterwave" id="flutterwave" value="<?php echo e($methods->live_public_key); ?>">
	    										<?php endif; ?>
												<?php echo e($methods->payment_name); ?>

	    									<?php endif; ?>

	    									<?php if($methods->payment_name == "Paystack"): ?>
	    										<img src="<?php echo e(Helper::image_path('creditcard.png')); ?>" class="img-fluid ml-2" alt="knjbhv" width="30px" />

	    										<?php if($methods->environment=='1'): ?>
	    										    <input type="hidden" name="paystack" id="paystack" value="<?php echo e($methods->test_public_key); ?>">
	    										<?php else: ?>
	    										    <input type="hidden" name="paystack" id="paystack" value="<?php echo e($methods->live_public_key); ?>">
	    										<?php endif; ?>
												<?php echo e($methods->payment_name); ?>

	    									<?php endif; ?>

	    								</label>
	    							</div>
	    						</div>	
						  	</div>
					  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<span id="payment_err_msg" class=""></span>
					<div class="service-book mt-2">
                       
                     </div>
                 	</div>
            	</div>
         	</div>
     		</div>
       	<?php if(!empty($walletdata) && count($walletdata) > 0): ?>
            <h4 class="mb-4">Wallet Transactions</h4>
            <div class="card transaction-table mb-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-center table-hover mb-0">
                            <thead>
                                <tr>
                                    <th><?php echo e(trans('labels.srno')); ?></th>
                                    <th><?php echo e(trans('labels.amount')); ?></th>
                                    <th><?php echo e(trans('labels.description')); ?></th>
                                    <th><?php echo e(trans('labels.date')); ?></th>
                                    <th><?php echo e(trans('labels.status')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $i=1;?>
                            	<?php $__currentLoopData = $walletdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wallet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><?php echo e(Helper::currency_format($wallet->amount)); ?></td>
                                    <td>
                                    	<?php if($wallet->payment_type == 1): ?>
                                    		<?php echo e(trans('labels.booking_canceled')); ?> <strong><?php echo e($wallet->booking_id); ?></strong>
                                    	<?php elseif($wallet->payment_type == 2): ?>
											<?php echo e(trans('labels.service_booked')); ?> <strong><?php echo e($wallet->booking_id); ?></strong>
										<?php elseif($wallet->payment_type == 3 || $wallet->payment_type == 4 || $wallet->payment_type == 5 || $wallet->payment_type == 6): ?>
										 	<?php echo e(trans('labels.added_with_card')); ?>

										<?php elseif($wallet->payment_type == 7): ?>
											<?php echo e(trans('labels.from_reference')); ?> <strong><?php echo e($wallet->username); ?></strong>
										<?php endif; ?>
                                    </td>
                                    <td><?php echo e(Helper::date_format($wallet->date)); ?></td>
                                    <td>
                                    	<?php if($wallet->payment_type == 2): ?>
											<span class="badge bg-danger-light"> <?php echo e(trans('labels.debit')); ?> </span>
										<?php elseif($wallet->payment_type == 1 || $wallet->payment_type == 3 || $wallet->payment_type == 4 || $wallet->payment_type == 5 || $wallet->payment_type == 6 || $wallet->payment_type == 7): ?>
											<span class="badge bg-success-light"> <?php echo e(trans('labels.credit')); ?> </span>
										<?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        	</div>
        	<div class="d-flex justify-content-center">
	            <?php echo e($walletdata->links()); ?>

	         </div>
        <?php endif; ?>
     	<?php else: ?>
    		<p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
    	<?php endif; ?>
		</div>

   	<input type="hidden" name="name" id="name" value="<?php echo e(Auth::user()->name); ?>">
	<input type="hidden" name="email" id="email" value="<?php echo e(Auth::user()->email); ?>">
	<input type="hidden" name="mobile" id="mobile" value="<?php echo e(Auth::user()->mobile); ?>">
	<input type="hidden" name="user_id" id="user_id" value="<?php echo e(Auth::user()->id); ?>">
	<input type="hidden" name="amt_err_text" id="amt_err_text" value="<?php echo e(trans('messages.enter_amount')); ?>">
	<input type="hidden" name="select_ptype" id="select_ptype" value="<?php echo e(trans('messages.select_payment_type')); ?>">
	<input type="hidden" name="title" id="title" value="<?php echo e(trans('labels.app_name')); ?>">
	<input type="hidden" name="description" id="description" value="<?php echo e(trans('labels.add_wallet_description')); ?>">
	<input type="hidden" name="logo" id="logo" value="https://stripe.com/img/documentation/checkout/marketplace.png">
	<input type="hidden" name="add_wallet_url" id="add_wallet_url" value="<?php echo e(URL::to('/home/user/wallet/add')); ?>">
	<input type="hidden" name="wallet_url" id="wallet_url" value="<?php echo e(URL::to('/home/user/wallet')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://checkout.stripe.com/v2/checkout.js"></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.vendor_theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/user/wallet.blade.php ENDPATH**/ ?>
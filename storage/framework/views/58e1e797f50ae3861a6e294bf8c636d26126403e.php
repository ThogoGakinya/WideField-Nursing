<table class="table table-responsive-sm">
   <thead>
      <tr>
         <th><?php echo e(trans('labels.srno')); ?></th>
         <th><?php echo e(trans('labels.image')); ?></th>
         <th><?php echo e(trans('labels.service_name')); ?></th>
         <th><?php echo e(trans('labels.booking_id')); ?></th>
         <th><?php echo e(trans('labels.date_time')); ?></th>
         <th><?php echo e(trans('labels.status')); ?></th>
         <th><?php echo e(trans('labels.action')); ?></th>
      </tr>
   </thead>
   <tbody>
	<?php if(count($bookingdata) > 0): ?>
		<?php $i = 1;?>
	   	<?php $__currentLoopData = $bookingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	      <tr>    
	         <td><?=$i++;?></td> 
	         <td><img src="<?php echo e(Helper::image_path($bdata->service_image)); ?>" alt="<?php echo e(trans('labels.image')); ?>" class="rounded table-image"></td>
	         <td><?php echo e($bdata->service_name); ?></td>
	         <td><?php echo e($bdata->booking_id); ?></td>
	         <td><?php echo e(Helper::date_format($bdata->date)); ?><br><?php echo e($bdata->time); ?></td>
	         <td>
	            <?php if($bdata->status == 1): ?>
	               <span class="badge badge-warning"><i class="ft-clock"></i> <?php echo e(trans('labels.pending')); ?> </span>
	            <?php elseif($bdata->status == 2): ?>
	               <span class="badge badge-info">
	               <?php if($bdata->handyman_id != ""): ?>
	                  <i class="ft-user"></i> <?php echo e(trans('labels.handyman_assigned')); ?>

	               <?php else: ?>
	                  <i class="ft-check"></i> <?php echo e(trans('labels.accepted')); ?>

	               <?php endif; ?>
	               </span>
	            <?php elseif($bdata->status == 3): ?>
	               <span class="badge badge-success"><i class="ft-check"></i> <?php echo e(trans('labels.completed')); ?> </span>
	            <?php elseif($bdata->status == 4): ?>
	               
	               <span class="badge badge-danger" ><i class="ft-x"></i>
	               	<?php if($bdata->canceled_by == 1): ?>
	               		<?php if(Auth::user()->type == 1): ?>
	               			<?php echo e(trans('labels.cancel_by_provider')); ?> 
	               		<?php else: ?>
	               			<?php echo e(trans('labels.cancel_by_you')); ?> 
	               		<?php endif; ?>
	               	<?php else: ?> 
	               		<?php echo e(trans('labels.cancel_by_customer')); ?> 
	               	<?php endif; ?>
	               </span>
	               
	            <?php endif; ?>
	         </td>
	         <td>
		         <?php if(Auth::user()->type == 2): ?>
		            <?php if($bdata->status == 1): ?>
		               <a class="btn btn-info btn-sm" onclick="acceptbooking('<?php echo e($bdata->id); ?>','2','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('/bookings/accept')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>','<?php echo e($bdata->service_id); ?>')"><i class="ft-check"></i> <?php echo e(trans('labels.accept')); ?></a>
		               <a class="btn btn-danger btn-sm" onclick="cancelbooking('<?php echo e($bdata->id); ?>','4','1','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('/bookings/cancel')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-x"></i> <?php echo e(trans('labels.cancel')); ?> </a>
		            <?php endif; ?>
		            <?php if(!empty($ahandymandata)): ?>
                     <?php if($bdata->status == 2 && ($bdata->handyman_accept == 2 || $bdata->handyman_id == "") ): ?>
                        <a class="btn btn-warning btn-sm select_handyman" data-bookingid="<?php echo e($bdata->id); ?>" data-toggle="modal" data-target="#select_handyman"><i class="ft-user"></i> <?php echo e(trans('labels.assign_handyman')); ?> </a>
                     <?php endif; ?>
                  <?php endif; ?>
                  <?php if($bdata->status == 2): ?>
                     <a class="btn btn-success btn-sm" onclick="completebooking('<?php echo e($bdata->id); ?>','3','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('/bookings/complete')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-check"></i> <?php echo e(trans('labels.complete')); ?></a>
                  <?php endif; ?>
		         <?php endif; ?>
	         	<a class="btn btn-primary btn-sm" data-original-title="View" title="View" href="<?php echo e(URL::to('/bookings/'.$bdata->booking_id)); ?>">
	            	<i class="ft-eye"></i> <?php echo e(trans('labels.view')); ?>

	            </a>
	         </td>
	      </tr>
	   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	   
         <tr>
            <td colspan="7" align="right">
               <div class="float-right">
                  <?php echo e($bookingdata->links()); ?>

               </div>
            </td>
         </tr>
   <?php else: ?>
         <tr>
            <td colspan="7" align="center">
               <?php echo e(trans('labels.booking_not_found')); ?>

            </td>
         </tr>
   <?php endif; ?>
   </tbody>
</table>
<input type="hidden" name="hidden_page" id="hidden_page" value="1" /><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/booking/booking_table.blade.php ENDPATH**/ ?>
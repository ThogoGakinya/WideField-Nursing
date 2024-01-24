
<table class="table table-responsive-sm">
   <thead>
      <tr>
         <th><?php echo e(trans('labels.request_id')); ?></th>
         <th><?php echo e(trans('labels.provider_name')); ?></th>
         <th><?php echo e(trans('labels.amount')); ?></th>
         <th><?php echo e(trans('labels.request_date')); ?></th>
         <th><?php echo e(trans('labels.payout_date')); ?></th>
         <th><?php echo e(trans('labels.status')); ?></th>
         <?php if(Auth::user()->type == 1): ?>
         <th><?php echo e(trans('labels.action')); ?></th>
         <?php endif; ?>
      </tr>
   </thead>
   <tbody>
   <?php if(!empty($requests) && count($requests) > 0): ?>
      <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td><?php echo e($prdata->request_id); ?></td>
            <td><?php echo e($prdata->provider_name); ?></td>
            <td>
               <small>
               <?php echo e(trans('labels.requested_amt')); ?> : <b><?php echo e(Helper::currency_format($prdata->request_balance)); ?></b> <br>
               <?php echo e(trans('labels.admin_commission')); ?> (<?php echo e($prdata->commission); ?>%) : - <b><?php echo e(Helper::currency_format($prdata->commission_amt)); ?></b>
               <div class="dropdown-divider"></div>
               <?php echo e(trans('labels.payable_amt')); ?> : <b><?php echo e(Helper::currency_format($prdata->payable_amt)); ?></b>
               </small>
            </td>
            <td><?php echo e(Helper::date_format($prdata->request_date)); ?></td>
            <td><?php if($prdata->payout_date != ""): ?><?php echo e(Helper::date_format($prdata->payout_date)); ?> <?php else: ?> - <?php endif; ?></td>
            <td>
               <?php if($prdata->status == 1): ?>
                  <span class="badge badge-success"><?php echo e(trans('labels.paid')); ?></span>
               <?php endif; ?>
               <?php if($prdata->status == 2): ?>
                  <span class="badge badge-warning"><?php echo e(trans('labels.pending')); ?></span>
               <?php endif; ?>
            </td>
            <?php if(Auth::user()->type == 1): ?>
               <td>
                  <?php if($prdata->status == 2): ?>
                  <a class="badge badge-info pay_now" data-request-id="<?php echo e($prdata->request_id); ?>" data-request-amount="<?php echo e($prdata->request_balance); ?>" data-commission="<?php echo e($prdata->commission); ?>" data-commission-amt="<?php echo e($prdata->commission_amt); ?>"  data-payable-amt="<?php echo e($prdata->payable_amt); ?>" data-provider-name="<?php echo e($prdata->provider_name); ?>" data-provider-id="<?php echo e($prdata->provider_id); ?>" data-bank-name="<?php echo e($prdata->bank_name); ?>" data-account-holder="<?php echo e($prdata->account_holder); ?>" data-account-type="<?php echo e($prdata->account_type); ?>" data-account-number="<?php echo e($prdata->account_number); ?>" data-routing-number="<?php echo e($prdata->routing_number); ?>"><?php echo e(trans('labels.pay')); ?></a>
                  <?php else: ?>
                     -
                  <?php endif; ?>
               </td>
            <?php endif; ?>
         </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td colspan="7" align="right">
               <div class="float-right">
                  <?php echo e($requests->links()); ?>

               </div>
            </td>
         </tr>
   <?php else: ?>
         <tr>
            <td colspan="7" align="center">
                  <?php echo e(trans('labels.payout_not_found')); ?>

            </td>
         </tr>
   <?php endif; ?>
   </tbody>
</table><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/payout/payout_table.blade.php ENDPATH**/ ?>
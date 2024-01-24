
<table class="table table-responsive-sm">
   <thead>
      <tr>
         <th><?php echo e(trans('labels.srno')); ?></th>
         <th><?php echo e(trans('labels.profile')); ?></th>
         <th><?php echo e(trans('labels.provider_type')); ?></th>
         <th><?php echo e(trans('labels.name')); ?></th>
         <th><?php echo e(trans('labels.email')); ?></th>
         <th><?php echo e(trans('labels.mobile')); ?></th>
         <th><?php echo e(trans('labels.status')); ?></th>
         <th><?php echo e(trans('labels.action')); ?></th>
      </tr>
   </thead>
   <tbody>
   <?php if(count($providerdata) > 0): ?>
      <?php $i = 1;?>
      <?php $__currentLoopData = $providerdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>    
            <td><?=$i++;?></td>
            <td> <img src="<?php echo e(Helper::image_path($pdata->image)); ?>" alt="<?php echo e(trans('labels.provider')); ?>" class="rounded table-image"> </td>
            <td><?php echo e($pdata['providertype']->name); ?></td>
            <td><?php echo e($pdata->name); ?></td>
            <td><?php echo e($pdata->email); ?></td>
            <td><?php echo e($pdata->mobile); ?></td>
            <td>
               <?php if(env('Environment') == 'sendbox'): ?>
                  <?php if($pdata->is_available == 1): ?>
                     <a class="success p-0" onclick="myFunction()"><i class="ft-check font-medium-3 mr-2"></i></a>
                  <?php else: ?>
                     <a class="danger p-0" onclick="myFunction()"><i class="ft-x font-medium-3 mr-2"></i></a>
                  <?php endif; ?>
               <?php else: ?>
                  <?php if($pdata->is_available == 1): ?>
                     <a class="success p-0" onclick="updateproviderstatus('<?php echo e($pdata->id); ?>','2','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('providers/edit/status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-check font-medium-3 mr-2"></i></a>
                  <?php else: ?>
                     <a class="danger p-0" onclick="updateproviderstatus('<?php echo e($pdata->id); ?>','1','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('providers/edit/status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-x font-medium-3 mr-2"></i></a>
                  <?php endif; ?>
               <?php endif; ?>
            </td>
            <td>
               <a class="dark p-0" href="<?php echo e(URL::to('/providers/'.$pdata->slug)); ?>"><i class="ft-user font-medium-3 mr-2"></i></a>
               <a class="info p-0" href="<?php echo e(URL::to('/providers/edit/'.$pdata->slug)); ?>"><i class="ft-edit font-medium-3 mr-2"></i></a>
               <a class="primary p-0" href="<?php echo e(URL::to('/log-in-provider/'.$pdata->slug)); ?>"><i class="ft-log-in font-medium-3 mr-2"></i></a>
            </td>
         </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td colspan="8" align="right">
               <div class="float-right">
                  <?php echo e($providerdata->links()); ?>

               </div>
            </td>
         </tr>
   <?php else: ?>
         <tr>
            <td colspan="8" align="center">
                  <?php echo e(trans('labels.providers_not_found')); ?>

            </td>
         </tr>
   <?php endif; ?>
   </tbody>
</table>
<input type="hidden" name="hidden_page" id="hidden_page" value="1" /><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/provider/provider_table.blade.php ENDPATH**/ ?>

<table class="table table-responsive-sm">
   <thead>
      <tr>
         <th><?php echo e(trans('labels.srno')); ?></th>
         <th><?php echo e(trans('labels.type_name')); ?></th>
         <th><?php echo e(trans('labels.commission')); ?></th>
         <th><?php echo e(trans('labels.status')); ?></th>
         <th><?php echo e(trans('labels.action')); ?></th>
      </tr>
   </thead>
   <tbody>
<?php if(count($providertypedata) > 0): ?>
	<?php $i = 1;?>
       <?php $__currentLoopData = $providertypedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ptd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>    
             <td><?=$i++;?></td> 
             <td><?php echo e($ptd->name); ?></td>
             <td><?php echo e($ptd->commission); ?>%</td>
             <td>
               <?php if(env('Environment') == 'sendbox'): ?>
                  <?php if($ptd->is_available == 1): ?>
                     <a class="success p-0" onclick="myFunction()"><i class="ft-check font-medium-3 mr-2"></i></a>
                  <?php else: ?>
                     <a class="danger p-0" onclick="myFunction()"><i class="ft-x font-medium-3 mr-2"></i></a>
                  <?php endif; ?>
               <?php else: ?>
                  <?php if($ptd->is_available == 1): ?>
                     <a class="success p-0" onclick="updateprovidertypestatus('<?php echo e($ptd->id); ?>','2','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('provider_types/status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-check font-medium-3 mr-2"></i></a>
                  <?php else: ?>
                     <a class="danger p-0" onclick="updateprovidertypestatus('<?php echo e($ptd->id); ?>','1','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('provider_types/status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-x font-medium-3 mr-2"></i></a>
                  <?php endif; ?>
               <?php endif; ?>

             </td>
             <td>
               <a class="info p-0" href="<?php echo e(URL::to('/provider_types/edit/'.$ptd->id)); ?>"><i class="ft-edit font-medium-3 mr-2"></i></a>
               <?php if(env('Environment') == 'sendbox'): ?>
                  <a class="danger p-0" onclick="myFunction()"><i class="ft-trash font-medium-3 mr-2"></i></a>
               <?php else: ?>
                  <a class="danger p-0" onclick="deleteprovidertype('<?php echo e($ptd->id); ?>','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('/provider_types/del')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')">
                      <i class="ft-trash font-medium-3 mr-2"></i>
                   </a>
               <?php endif; ?>
             </td>
          </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
       	<tr>
            <td colspan="5" align="right">
               <div class="float-right">
                  <?php echo e($providertypedata->links()); ?>

               </div>
            </td>
         </tr>
   <?php else: ?>
         <tr>
            <td colspan="5" align="center">
                  <?php echo e(trans('labels.ptype_not_found')); ?>

            </td>
         </tr>
   <?php endif; ?>

   </tbody>
</table>
<input type="hidden" name="hidden_page" id="hidden_page" value="1" /><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/provider/provider_types/ptype_table.blade.php ENDPATH**/ ?>
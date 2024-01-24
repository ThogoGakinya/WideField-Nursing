
<table class="table table-responsive-sm">
   <thead>
   <tr>
      <th><?php echo e(trans('labels.srno')); ?></th>
      <th><?php echo e(trans('labels.image')); ?></th>
      <th><?php echo e(trans('labels.name')); ?></th>
      <th><?php echo e(trans('labels.status')); ?></th>
      <th><?php echo e(trans('labels.action')); ?></th>
   </tr>
   </thead>
   <tbody>

<?php if(count($citydata) > 0): ?>
	<?php $i = 1;?>
       <?php $__currentLoopData = $citydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>    
             <td><?=$i++;?></td>
             <td><img src="<?php echo e(Helper::image_path($cd->image)); ?>" alt="<?php echo e(trans('labels.image')); ?>" class="rounded table-image"></td>
             <td><?php echo e($cd->name); ?></td>
             <td>

               <?php if(env('Environment') == 'sendbox'): ?>
                  <?php if($cd->is_available == 1): ?>
                      <a class="success p-0" onclick="myFunction()"><i class="ft-check font-medium-3 mr-2"></i></a>
                   <?php else: ?>
                      <a class="danger p-0" onclick="myFunction()"><i class="ft-x font-medium-3 mr-2"></i></a>
                   <?php endif; ?>
               <?php else: ?>
                   <?php if($cd->is_available == 1): ?>
                      <a class="success p-0" onclick="updatecitystatus('<?php echo e($cd->id); ?>','2','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('cities/edit/status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-check font-medium-3 mr-2"></i></a>
                   <?php else: ?>
                      <a class="danger p-0" onclick="updatecitystatus('<?php echo e($cd->id); ?>','1','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('cities/edit/status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-x font-medium-3 mr-2"></i></a>
                   <?php endif; ?>
                <?php endif; ?>
             </td>
             <td>
                  <a class="info p-0" data-original-title="" title=""  href="<?php echo e(URL::to('/cities/edit/'.$cd->id)); ?>">
                     <i class="ft-edit font-medium-3 mr-2"></i>
                  </a>
                  <?php if(env('Environment') == 'sendbox'): ?>
                      <a class="danger p-0" onclick="myFunction()"><i class="ft-trash font-medium-3 mr-2"></i></a>
                  <?php else: ?>
                     <a class="danger p-0" data-original-title="" title="" onclick="deletecity('<?php echo e($cd->id); ?>','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('/cities/del')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')" ><i class="ft-trash font-medium-3 mr-2"></i>
                     </a>
                  <?php endif; ?>
             </td>
          </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
       	<tr>
            <td colspan="5" align="right">
               <div class="float-right">
                  <?php echo e($citydata->links()); ?>

               </div>
            </td>
         </tr>
   <?php else: ?>
         <tr>
            <td colspan="5" align="center">
                  <?php echo e(trans('labels.city_not_found')); ?>

            </td>
         </tr>
   <?php endif; ?>
   </tbody>
</table>
<input type="hidden" name="hidden_page" id="hidden_page" value="1" /><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/city/city_table.blade.php ENDPATH**/ ?>
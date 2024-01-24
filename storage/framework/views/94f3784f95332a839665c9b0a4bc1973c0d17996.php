   <table class="table table-responsive-sm">
      <thead>
         <tr>
            <th><?php echo e(trans('labels.srno')); ?></th>
            <th><?php echo e(trans('labels.profile')); ?></th>
            <th><?php echo e(trans('labels.name')); ?></th>
            <th><?php echo e(trans('labels.email')); ?></th>
            <th><?php echo e(trans('labels.mobile')); ?></th>
            <th><?php echo e(trans('labels.status')); ?></th>
         </tr>
      </thead>
      <tbody>
      <?php if(count($usersdata) > 0): ?>
         <?php $i = 1;?>
         <?php $__currentLoopData = $usersdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $udata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>    
               <td><?=$i++;?></td> 
               <td> <img src="<?php echo e(Helper::image_path($udata->image)); ?>" alt="<?php echo e(trans('labels.users')); ?>" class="rounded table-image"> </td>
               <td><?php echo e($udata->name); ?></td>
               <td><?php echo e($udata->email); ?></td>
               <td><?php echo e($udata->mobile); ?></td>
               <td>
                  <?php if(env('Environment') == 'sendbox'): ?>

                     <?php if($udata->is_available == 1): ?>
                        <a class="success p-0" onclick="myFunction()"><i class="ft-check font-medium-3 mr-2"></i></a>
                     <?php else: ?>
                        <a class="danger p-0" onclick="myFunction()"><i class="ft-x font-medium-3 mr-2"></i></a>
                     <?php endif; ?>
                  <?php else: ?>
                     <?php if($udata->is_available == 1): ?>
                        <a class="success p-0" onclick="updateuserstatus('<?php echo e($udata->id); ?>','2','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('users/edit/status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-check font-medium-3 mr-2"></i></a>
                     <?php else: ?>
                        <a class="danger p-0" onclick="updateuserstatus('<?php echo e($udata->id); ?>','1','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('users/edit/status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-x font-medium-3 mr-2"></i></a>
                     <?php endif; ?>
                  <?php endif; ?>
               </td>
            </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
               <td colspan="8" align="right">
                  <div class="float-right">
                     <?php echo e($usersdata->links()); ?>

                  </div>
               </td>
            </tr>
      <?php else: ?>
            <tr>
               <td colspan="8" align="center">
                     <?php echo e(trans('labels.no_result')); ?>

               </td>
            </tr>
      <?php endif; ?>
      </tbody>
   </table>
   <input type="hidden" name="hidden_page" id="hidden_page" value="1" /><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/users/users_table.blade.php ENDPATH**/ ?>
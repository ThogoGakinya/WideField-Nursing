
<table class="table table-striped table-bordered default-ordering">
   <thead>
      <tr>
         <th><?php echo e(trans('labels.srno')); ?></th>
         <th><?php echo e(trans('labels.profile')); ?></th>
         <th><?php echo e(trans('labels.provider')); ?></th>
         <th><?php echo e(trans('labels.name')); ?></th>
         <th><?php echo e(trans('labels.email')); ?></th>
         <th><?php echo e(trans('labels.mobile')); ?></th>
         <th><?php echo e(trans('labels.status')); ?></th>
         <th><?php echo e(trans('labels.action')); ?></th>
      </tr>
   </thead>
   <tbody>
      <?php $i=1;?>
      <?php $__currentLoopData = $handymandata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
         <td><?=$i++;?></td>
         <td>
            <img src="<?php echo e(Helper::image_path($hdata->image)); ?>" alt="<?php echo e(trans('labels.image')); ?>" class="rounded table-image">
         </td>
         <td><?php echo e($hdata['providername']->name); ?></td>
         <td><?php echo e($hdata->name); ?></td>
         <td><?php echo e($hdata->email); ?></td>
         <td><?php echo e($hdata->mobile); ?></td>
         <td>
            <?php if(Auth::user()->type == 2): ?>

               <?php if(env('Environment') == 'sendbox'): ?>
                  <?php if($hdata->is_available == 1): ?>
                     <a class="success p-0" onclick="myFunction()"><i class="ft-check font-medium-3 mr-2"></i></a>
                  <?php else: ?>
                     <a class="danger p-0" onclick="myFunction()"><i class="ft-x font-medium-3 mr-2"></i></a>
                  <?php endif; ?>
               <?php else: ?>
               
                  <?php if($hdata->is_available == 1): ?>
                     <a class="success p-0" onclick="updatehandymanstatus('<?php echo e($hdata->id); ?>','2','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('handymans-status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-check font-medium-3 mr-2"></i></a>
                  <?php else: ?>
                     <a class="danger p-0" onclick="updatehandymanstatus('<?php echo e($hdata->id); ?>','1','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('handymans-status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-x font-medium-3 mr-2"></i></a>
                  <?php endif; ?>

               <?php endif; ?>
            <?php else: ?>
               <i class="<?php if($hdata->is_available == 1): ?> success ft-check <?php else: ?> danger ft-x <?php endif; ?> font-medium-3 mr-2"></i>
            <?php endif; ?>
         </td>
         <td>
            <a class="dark p-0" href="<?php echo e(URL::to('/handymans/'.$hdata->slug)); ?>" ><i class="ft-user font-medium-3 mr-2"></i></a>
            <?php if(Auth::user()->type == 2): ?>
               <a class="info p-0" href="<?php echo e(URL::to('/handymans/edit/'.$hdata->slug)); ?>"><i class="ft-edit font-medium-3 mr-2"></i></a>
            <?php endif; ?>
         </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </tbody>
</table><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/provider/handyman/handyman_table.blade.php ENDPATH**/ ?>
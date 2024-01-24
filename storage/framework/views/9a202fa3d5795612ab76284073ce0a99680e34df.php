   <table class="table table-striped table-bordered zero-configuration">
      <thead>
         <tr>
            <th><?php echo e(trans('labels.srno')); ?></th>
            <th><?php echo e(trans('labels.image')); ?></th>
            <th><?php echo e(trans('labels.service_name')); ?></th>
            <th><?php echo e(trans('labels.category_name')); ?></th>
            <th><?php echo e(trans('labels.price')); ?></th>
            <th><?php echo e(trans('labels.duration')); ?></th>
            <th><?php echo e(trans('labels.status')); ?></th>
            <th>Featured</th>
            <th><?php echo e(trans('labels.action')); ?></th>
         </tr>
      </thead>
      <tbody>
         <?php $i = 1;?>
         <?php $__currentLoopData = $servicedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>    
               <td><?=$i++;?></td> 
               <td><img src="<?php echo e(Helper::image_path($sdata->image)); ?>" alt="<?php echo e(trans('labels.service')); ?>" class="rounded table-image"></td>
               <td><?php echo e($sdata->name); ?></td>
               <td><?php echo e($sdata['categoryname']->name); ?></td>
               <td><?php echo e(Helper::currency_format($sdata->price)); ?></td>
               <td>
                   <?php
                        $t1 = strtotime($sdata->end_time);
                        $t2 = strtotime($sdata->start_time);
                        $diff = $t1 - $t2;
                        $hours = $diff / ( 60 * 60 );
                   ?>
                 <?php echo e($hours); ?> Hours
               </td>
               <?php if(Auth::user()->type == 2): ?>
                  <td>
                     <?php if(env('Environment') == 'sendbox'): ?>
                        <?php if($sdata->is_featured == 1): ?>
                           <a class="success p-0" onclick="myFunction()"><i class="ft-check font-medium-3 mr-2"></i></a>
                        <?php else: ?>
                           <a class="danger p-0" onclick="myFunction()"><i class="ft-x font-medium-3 mr-2"></i></a>
                        <?php endif; ?>
                     <?php else: ?>
                        <?php if($sdata->is_featured == 1): ?>
                           <a class="success p-0" onclick="updateserviceisfeatured('<?php echo e($sdata->id); ?>','2','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('services/edit/is_featured')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-check font-medium-3 mr-2"></i></a>
                        <?php else: ?>
                           <a class="danger p-0" onclick="updateserviceisfeatured('<?php echo e($sdata->id); ?>','1','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('services/edit/is_featured')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-x font-medium-3 mr-2"></i></a>
                        <?php endif; ?>
                     <?php endif; ?>
                  </td>
                  <td>
                     <?php if(env('Environment') == 'sendbox'): ?>
                        <?php if($sdata->is_available == 1): ?>
                           <a class="success p-0" onclick="myFunction()"><i class="ft-check font-medium-3 mr-2"></i></a>
                        <?php else: ?>
                           <a class="danger p-0" onclick="myFunction()"><i class="ft-x font-medium-3 mr-2"></i></a>
                        <?php endif; ?>
                     <?php else: ?>
                        <?php if($sdata->is_available == 1): ?>
                           <a class="success p-0" onclick="updateservicestatus('<?php echo e($sdata->id); ?>','2','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('services/edit/status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-check font-medium-3 mr-2"></i></a>
                        <?php else: ?>
                           <a class="danger p-0" onclick="updateservicestatus('<?php echo e($sdata->id); ?>','1','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('services/edit/status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-x font-medium-3 mr-2"></i></a>
                        <?php endif; ?>
                     <?php endif; ?>
                  </td>
               <?php else: ?>
                  <td><i class="<?php if($sdata->is_featured == 1): ?> success ft-check <?php else: ?> danger ft-x <?php endif; ?> font-medium-3 mr-2"></i></td>
                  <td><i class="<?php if($sdata->is_available == 1): ?> success ft-check <?php else: ?> danger ft-x <?php endif; ?> font-medium-3 mr-2"></i></td>
               <?php endif; ?>
               <td>
                  <?php if(Auth::user()->type == 2): ?>
                     <a class="info p-0" href="<?php echo e(URL::to('/services/edit/'.$sdata->slug)); ?>"><i class="ft-edit font-medium-3 mr-2"></i></a>
                     <?php if(env('Environment') == 'sendbox'): ?>
                        <a class="danger p-0" onclick="myFunction()" ><i class="ft-trash font-medium-3 mr-2"></i></a>
                     <?php else: ?>
                        <a class="danger p-0" onclick="deleteservice('<?php echo e($sdata->id); ?>','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('/services-del')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')" ><i class="ft-trash font-medium-3 mr-2"></i></a>
                     <?php endif; ?>
                  <?php endif; ?>
                  <a class="dark p-0" href="<?php echo e(URL::to('/services/'.$sdata->slug)); ?>"><i class="ft-eye font-medium-3 mr-2"></i></a>
               </td>
            </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
   </table><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/service/service_table.blade.php ENDPATH**/ ?>
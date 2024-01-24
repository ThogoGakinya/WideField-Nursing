<table class="table table-responsive-sm">
   <thead>
      <tr>
         <th><?php echo e(trans("labels.srno")); ?></th>
         <th><?php echo e(trans("labels.image")); ?></th>
         <th><?php echo e(trans("labels.name")); ?></th>
         <th><?php echo e(trans("labels.status")); ?></th>
         <th><?php echo e(trans("labels.featured")); ?></th>
         <th><?php echo e(trans("labels.action")); ?></th>
      </tr>
   </thead>
   <tbody>
      <?php if(!empty($categorydata) && count($categorydata) > 0): ?>
         <?php $i=1;?>
         <?php $__currentLoopData = $categorydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
               <td><?=$i++;?></td> 
               <td><img src="<?php echo e(Helper::image_path($cdata->image)); ?>" alt="<?php echo e(trans('labels.image')); ?>" class="rounded table-image"></td>
               <td><?php echo e($cdata->name); ?></td>
               <td>
                  <?php if(env('Environment') == 'sendbox'): ?>
                     <?php if($cdata->is_available == 1): ?>
                        <a class="success p-0" onclick="myFunction()"><i class="ft-check font-medium-3 mr-2"></i></a>
                     <?php else: ?>
                        <a class="danger p-0" onclick="myFunction()"><i class="ft-x font-medium-3 mr-2"></i></a>
                     <?php endif; ?>
                  <?php else: ?>
                     <?php if($cdata->is_available == 1): ?>
                        <a class="success p-0" onclick="updatecategorystatus('<?php echo e($cdata->id); ?>','2','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('categories/edit/status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-check font-medium-3 mr-2"></i></a>
                     <?php else: ?>
                        <a class="danger p-0" onclick="updatecategorystatus('<?php echo e($cdata->id); ?>','1','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('categories/edit/status')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-x font-medium-3 mr-2"></i></a>
                     <?php endif; ?>
                  <?php endif; ?>
               </td>
               <td>
                  <?php if(env('Environment') == 'sendbox'): ?>
                     <?php if($cdata->is_featured == 1): ?>
                        <a class="success p-0" onclick="myFunction()"><i class="ft-check font-medium-3 mr-2"></i></a>
                     <?php else: ?>
                        <a class="danger p-0" onclick="myFunction()"><i class="ft-x font-medium-3 mr-2"></i></a>
                     <?php endif; ?>
                  <?php else: ?>
                     <?php if($cdata->is_featured == 1): ?>
                        <a class="success p-0" onclick="updatecategoryisfeatured('<?php echo e($cdata->id); ?>','2','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('categories/edit/is_featured')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-check font-medium-3 mr-2"></i></a>
                     <?php else: ?>
                        <a class="danger p-0" onclick="updatecategoryisfeatured('<?php echo e($cdata->id); ?>','1','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('categories/edit/is_featured')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')"><i class="ft-x font-medium-3 mr-2"></i></a>
                     <?php endif; ?>
                  <?php endif; ?>
               </td>
               <td>
                  <a class="info p-0" data-original-title="" title="" href="<?php echo e(URL::to('/categories/edit/'.$cdata->slug)); ?>">
                     <i class="ft-edit font-medium-3 mr-2"></i>
                  </a>
                  <?php if(env('Environment') == 'sendbox'): ?>
                     <a class="danger p-0" onclick="myFunction()"><i class="ft-trash font-medium-3 mr-2"></i></a>
                  <?php else: ?>
                     <a class="danger p-0" onclick="deletecategory('<?php echo e($cdata->id); ?>','<?php echo e(trans('messages.are_you_sure')); ?>','<?php echo e(trans('messages.yes')); ?>','<?php echo e(trans('messages.no')); ?>','<?php echo e(URL::to('/categories/del')); ?>','<?php echo e(trans('messages.wrong')); ?>','<?php echo e(trans('messages.record_safe')); ?>')" >
                        <i class="ft-trash font-medium-3 mr-2"></i>
                     </a>
                  <?php endif; ?>
               </td>
            </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td colspan="6" align="right">
               <div class="float-right">
                  <?php echo $categorydata->links(); ?>

               </div>
            </td>
         </tr>
   <?php else: ?>
         <tr>
            <td colspan="6" align="center">
                  <?php echo e(trans('labels.category_not_found')); ?>

            </td>
         </tr>
   <?php endif; ?>
   
   </tbody>
</table>
<input type="hidden" name="hidden_page" id="hidden_page" value="1" /><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/category/category_table.blade.php ENDPATH**/ ?>
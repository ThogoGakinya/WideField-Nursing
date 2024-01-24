<?php $__env->startSection('page_title',$providerdata->provider_name); ?>
<?php $__env->startSection('content'); ?>

    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-title">
                        <h2><?php echo e(trans('labels.providers')); ?></h2>
                    </div>
                </div>
                <div class="col-auto float-right ml-auto breadcrumb-menu">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('labels.home')); ?></a></li>
                           <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/home/providers')); ?>"><?php echo e(trans('labels.providers')); ?></a></li>
                           <li class="breadcrumb-item active" aria-current="page"><?php echo e($providerdata->provider_name); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

         <div class="content">
            <div class="container">
               <div class="row">
                  <?php echo $__env->make('front.layout.provider_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  <div class="col-xl-9 col-md-8">
                     <div class="widget">
                        <h5 class="mb-0"><?php echo e(trans('labels.profile')); ?></h5><hr>
                        
                        <?php if(!empty($providerdata)): ?>
                        <div class="row">
                           <div class="form-group col-xl-6">
                              <label class="mr-sm-2"><?php echo e(trans('labels.name')); ?></label>
                              <input class="form-control" type="text" value="<?php echo e($providerdata->provider_name); ?>" disabled>
                           </div>
                           <div class="form-group col-xl-6">
                              <label class="mr-sm-2"><?php echo e(trans('labels.email')); ?></label>
                              <input class="form-control" type="email" value="<?php echo e($providerdata->email); ?>" disabled>
                           </div>
                           <div class="form-group col-xl-6">
                              <label class="mr-sm-2"><?php echo e(trans('labels.mobile')); ?></label>
                              <input class="form-control no_only" type="text" value="<?php echo e($providerdata->mobile); ?>" disabled>
                           </div>
                           <div class="form-group col-xl-6">
                              <label class="mr-sm-2"><?php echo e(trans('labels.address')); ?></label>
                              <input class="form-control" type="text" value='<?php echo e(strip_tags($providerdata->address)); ?>' disabled>
                           </div>
                           <div class="form-group col-xl-12">
                              <label class="mr-sm-2"><?php echo e(trans('labels.about')); ?></label>
                              <textarea class="form-control" rows="3" disabled><?php echo e(strip_tags($providerdata->about)); ?></textarea>
                           </div>
                        </div>
                        <?php else: ?>
                           <p class="text-center"> <?php echo e(trans('labels.no_data')); ?></p>
                        <?php endif; ?>
                     </div>
                     <h5 class="mb-0"><?php echo e(trans('labels.service_availability')); ?></h5><hr>
                     <div class="card mb-0">
                        <div class="card-body">
                           <div class="form-group">
                              <?php if(!empty($timingdata)): ?>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="table-responsive">
                                       <table class="table availability-table">
                                          <thead class="thead-dark">
                                             <tr>
                                                <th><?php echo e(trans('labels.days')); ?></th>
                                                <th><?php echo e(trans('labels.from_time')); ?></th>
                                                <th><?php echo e(trans('labels.to_time')); ?></th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php $__currentLoopData = $timingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                   <td><?php echo e($tdata->day); ?></td>
                                                   <?php if($tdata->is_always_close == 1): ?>
                                                      <td colspan="2"> <i> <?php echo e(trans('labels.not_available')); ?> </i></td>
                                                   <?php else: ?>
                                                      <td><?php echo e($tdata->open_time); ?></td>
                                                      <td><?php echo e($tdata->close_time); ?></td>
                                                   <?php endif; ?>
                                                </tr>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <?php else: ?>
                                 <p class="text-center"> <?php echo e(trans('labels.no_data')); ?></p>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/provider_details.blade.php ENDPATH**/ ?>
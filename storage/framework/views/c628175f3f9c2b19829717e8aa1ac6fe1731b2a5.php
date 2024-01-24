<?php $__env->startSection('page_title',trans('labels.contact_us')); ?>
<?php $__env->startSection('content'); ?>
   <div class="breadcrumb-bar">
      <div class="container">
         <div class="row">
            <div class="col">
               <div class="breadcrumb-title">
                  <h2><?php echo e(trans('labels.contact_us')); ?></h2>
               </div>
            </div>
            <div class="col-auto float-right ml-auto breadcrumb-menu">
               <nav aria-label="breadcrumb" class="page-breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('labels.home')); ?></a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?php echo e(trans('labels.contact_us')); ?></li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <section class="contact-us">
      <div class="content">
         <div class="container">
               <div class="row match-height">
                  <div class="col-8">
                     <div class="contact-queries">
                        <h4 class="mb-4"><?php echo e(trans('labels.drop_queries')); ?></h4>
                        <form action="<?php echo e(URL::to('home/add-inquiry')); ?>" method="post">
                           <?php echo csrf_field(); ?>
                           <div class="row">
                              <div class="form-group col-xl-6">
                                 <label class="mr-sm-2"><?php echo e(trans('labels.first_name')); ?></label>
                                 <input class="form-control <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="fname" placeholder="<?php echo e(trans('labels.enter_first_name')); ?>">
                                 <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger "><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                              <div class="form-group col-xl-6">
                                 <label class="mr-sm-2"><?php echo e(trans('labels.last_name')); ?></label>
                                 <input class="form-control <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="lname" placeholder="<?php echo e(trans('labels.enter_last_name')); ?>">
                                 <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                              <div class="form-group col-xl-6">
                                 <label class="mr-sm-2"><?php echo e(trans('labels.email')); ?></label>
                                 <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="email" name="email" placeholder="<?php echo e(trans('labels.enter_email')); ?>">
                                 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                              <div class="form-group col-xl-6">
                                 <label class="mr-sm-2"><?php echo e(trans('labels.mobile')); ?></label>
                                 <input class="form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="mobile" placeholder="<?php echo e(trans('labels.enter_mobile')); ?>">
                                 <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                              <div class="form-group col-xl-12">
                                 <label class="mr-sm-2"><?php echo e(trans('labels.message')); ?></label>
                                 <textarea class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3" name="message" placeholder="<?php echo e(trans('labels.drop_inquiry_here')); ?>"></textarea>
                                 <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                              <?php if(isset($_COOKIE["city_name"])): ?>
                              <div class="col-xl-12 mt-4">
                                 <button class="btn btn-primary btn-lg pl-5 pr-5" type="submit"> <i class="fa fa-paper-plane"></i> <?php echo e(trans('labels.send')); ?></button>
                              </div>
                              <?php endif; ?>
                           </div>
                        </form>
                     </div>
                  </div>
                 <!--
                  <div class="col-4">
                     <div class="contact-details">
                        <div class="contact-info">
                           <i class="fas fa-map-marker-alt"></i>
                           <div class="contact-data">
                              <p><?php echo e(strip_tags(Helper::appdata()->address)); ?></p>
                           </div>
                        </div><hr>
                        <div class="contact-info">
                           <i class="fas fa-phone-alt"></i>
                           <div class="contact-data">
                              <p><?php echo e(Helper::appdata()->contact); ?></p>
                           </div>
                        </div><hr>
                        <div class="contact-info">
                           <i class="far fa-envelope"></i>
                           <div class="contact-data">
                              <p><?php echo e(Helper::appdata()->email); ?></p>
                           </div>
                        </div>

                     </div>
                  </div> -->
               </div>
         </div>
      </div>
   </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/contactus.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page_title',trans('labels.login')); ?>

<?php $__env->startSection('content'); ?>

      <section class="contact-us">
         <div class="content">
            <div class="container">
               <div class="row justify-content-md-center">
                  <div class="col-lg-6 col-md-12 col-sm-12">
                     <div class="contact-queries">
                        <div class="login-header">
                           <h3><?php echo e(trans('labels.login')); ?></h3>
                        </div>

                        <?php if($message = Session::get('AuthError')): ?>
                           <span class="text-center text-danger"><?php echo e($message); ?></span>
                        <?php endif; ?>

                        <form action="<?php echo e(URL::to('/home/checklogin')); ?>" method="POST">
                           <?php echo csrf_field(); ?>
                           <div class="form-group form-focus">
                              <label class="focus-label"><?php echo e(trans('labels.email')); ?> </label>
                              <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" placeholder="<?php echo e(trans('labels.enter_email')); ?>">
                              <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           </div>
                           <div class="form-group form-focus">
                              <label class="focus-label"><?php echo e(trans('labels.password')); ?> </label>
                              <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="<?php echo e(trans('labels.enter_password')); ?>">
                              <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           </div>
                           <button class="btn btn-primary btn-block btn-lg login-btn" type="submit"><?php echo e(trans('labels.login')); ?></button>
                        </form>
                        <div class="row form-row social-login mt-2">
                           <div class="col-6">
                              <a href="<?php echo e(URL::to('/home/register-user')); ?>" class="btn btn-light btn-block">
                                 <i class="fa fa-user mr-1"></i><?php echo e(trans('labels.register')); ?>

                              </a>
                           </div>
                           <div class="col-6">
                              <a href="<?php echo e(URL::to('/home/forgot-password')); ?>" class="btn btn-light btn-block"><?php echo e(trans('labels.forgot_password')); ?> ?</a>
                           </div>
                        </div>
                        
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/login.blade.php ENDPATH**/ ?>
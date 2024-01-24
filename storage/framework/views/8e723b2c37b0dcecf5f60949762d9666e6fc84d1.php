<?php $__env->startSection('page_title',trans('labels.email_verification')); ?>

<?php $__env->startSection('content'); ?>

    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-title">
                        <h2><?php echo e(trans('labels.email_verification')); ?></h2>
                    </div>
                </div>
                <div class="col-auto float-right ml-auto breadcrumb-menu">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><?php echo e(trans('labels.register')); ?></li>
                           <li class="breadcrumb-item active" aria-current="page"><?php echo e(trans('labels.verify_email')); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

      <section class="contact-us">
         <div class="content">
            <div class="container">
               <div class="row justify-content-md-center">
                  <div class="col-6">
                     <div class="contact-queries">

                        <h4 class="mb-4"><?php echo e(trans('messages.verification_code_sent')); ?> <br>
                           <small><strong>
                              <?php if(Session::has('otpemail')): ?> 
                                 <?php echo e($email = Session::get('otpemail')); ?>

                              <?php endif; ?>
                           </strong></small>
                        </h4>
                        <small><i>* Please make sure to check in the spam/junk folder if no email appears in your inbox</i></small>

                        <form action="<?php echo e(URL::to('home/verify/otp')); ?>" method="post">
                           <?php echo csrf_field(); ?>
                           <div class="row">
                              <div class="form-group col-xl-12">
                                 <input type="hidden" value="<?php echo e($email); ?>" name="email">
                              </div>
                              <div class="form-group col-xl-12">
                                 <label class="mr-sm-2"><?php echo e(trans('labels.otp')); ?> <?php $__errorArgs = ['otp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger">> <?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></label>
                                 <input type="text" class="form-control <?php $__errorArgs = ['otp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="otp" value="<?php echo e(old('otp')); ?>" placeholder="<?php echo e(trans('labels.enter_otp')); ?>">
                              </div>
                              <div class="col-xl-12 mt-4">
                                 <div class="text-right white" id="timer"></div>
                                 <button class="btn btn-primary btn-lg pl-5 pr-5" type="submit"> <i class="fa fa-paper-plane"></i> <?php echo e(trans('labels.verify_otp')); ?> </button>
                              </div>
                           </div>
                        </form>

                     </div>
                  </div>
                  <div class="card-footer dn" id="resend">
                     <a class="white" href="<?php echo e(route('resend-otp')); ?>"><?php echo e(trans('labels.resend_otp')); ?></a> 
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
   let timerOn = true;
      timer(120);
      function timer(remaining) {
         var m = Math.floor(remaining / 60);
         var s = remaining % 60; 
         m = m < 10 ? '0' + m : m;
         s = s < 10 ? '0' + s : s;
         document.getElementById('timer').innerHTML = m + ':' + s;
         remaining -= 1;
         if(remaining >= 0 && timerOn) {
            setTimeout(function() {
               timer(remaining);
            }, 1000);
            return;
         }
         if(!timerOn) {
            alert(322);
            return;
         }
         $('#timer').hide();
         $('#resend').show();
      }
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/verify_email.blade.php ENDPATH**/ ?>
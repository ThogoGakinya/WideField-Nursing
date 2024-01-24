<!DOCTYPE html>
<html lang="en" class="loading">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <title><?php echo e(trans('labels.login')); ?></title>
      <link rel="stylesheet" type="text/css" href="<?php echo e(asset('storage/app/public/admin-assets/css/app.css')); ?>">
      <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('storage/app/public/images/'.Helper::appdata()->favicon)); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo e(asset('storage/app/public/admin-assets/js/toaster/toastr.min.css')); ?>">
   </head>
   <body data-col="1-column" class=" 1-column  blank-page blank-page">
      <div class="wrapper">
         <div class="main-panel">
            <div class="main-content">
               <div class="content-wrapper">
                  <section id="login">
                     <div class="container-fluid">
                        <div class="row full-height-vh">
                           <div class="col-12 d-flex align-items-center justify-content-center">
                              <div class="card gradient-indigo-purple text-center width-400">
                                 <div class="card-body">
                                    <img alt="element 06" class="mb-3 mt-3" src="<?php echo e(Helper::image_path(Helper::appdata()->logo)); ?>" width="300">
                                    <div class="card-block">
                                       <form action="<?php echo e(URL::to('/checkadminlogin')); ?>" method="POST">
                                          <?php echo csrf_field(); ?>
                                          <h2 class="white"><?php echo e(trans('labels.login')); ?></h2>
                                          <?php if($message = Session::get('AuthError')): ?>
                                             <span class="text-danger text-center" id="AuthError"><?php echo e($message); ?></span>
                                          <?php endif; ?>
                                          <div class="form-group">
                                             <div class="col-md-12">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo e(trans('labels.enter_email')); ?>" required >
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger text-left" id="email_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-md-12">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo e(trans('labels.enter_password')); ?>" required>
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger text-left" id="AuthPasswordError"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-md-12">
                                                <input type="submit" value="<?php echo e(trans('labels.login')); ?>" class="btn btn-primary btn-block"> 
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                 
               </div>
            </div>
         </div>
      </div>
   </body>
   <script src="<?php echo e(asset('storage/app/public/admin-assets/js/jquery-3.6.0.js')); ?>"></script>
   <script src="<?php echo e(asset('storage/app/public/admin-assets/js/toaster/toastr.min.js')); ?>" type="text/javascript"></script>
   <script>
      <?php if(Session::has('success')): ?>
         toastr.options = {
            "closeButton" : true,
            "progressBar" : true
         },
         toastr.success("<?php echo e(session('success')); ?>");
      <?php endif; ?>
      <?php if(Session::has('error')): ?>
         toastr.options ={
            "closeButton" : true,
            "progressBar" : true,
            "timeOut" : 10000
         },
         toastr.error("<?php echo e(session('error')); ?>");
      <?php endif; ?>
   </script>
</html><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/auth/index.blade.php ENDPATH**/ ?>
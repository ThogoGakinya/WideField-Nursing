<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
   <title><?php echo e(Helper::appdata()->website_title); ?> |  <?php echo $__env->yieldContent('page_title'); ?></title>
   <link rel="shortcut icon" href="<?php echo e(Helper::image_path(Helper::appdata()->favicon)); ?>">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo e(asset('storage/app/public/front-assets/plugins/bootstrap/css/bootstrap.min.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('storage/app/public/front-assets/plugins/fontawesome/css/fontawesome.min.css')); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('storage/app/public/front-assets/fonts/font-awesome/css/font-awesome.min.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('storage/app/public/front-assets/plugins/fontawesome/css/all.min.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('storage/app/public/front-assets/plugins/owlcarousel/owl.carousel.min.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('storage/app/public/front-assets/plugins/owlcarousel/owl.theme.default.min.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('storage/app/public/front-assets/css/style.css')); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('storage/app/public/front-assets/js/toaster/toastr.min.css')); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('storage/app/public/plugins/sweetalert/css/sweetalert.css')); ?>">
   <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
   <?php echo $__env->yieldContent('styles'); ?>

</head>

   <body>

      <div class="page-loading">
         <div class="preloader-inner">
            <div class="preloader-square-swapping">
               <div class="cssload-square-part cssload-square-green"></div>
               <div class="cssload-square-part cssload-square-pink"></div>
               <div class="cssload-square-blend"></div>
            </div>
         </div>
      </div>

      <div class="main-wrapper">

         <?php echo $__env->make('front.layout.home_header_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

         <?php echo $__env->yieldContent('content'); ?>

         <div class="modal fade slow" id="citiesModal" tabindex="-1" aria-labelledby="citiesModalLabel" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
               <div class="modal-content">
                  <div class="modal-header">
                     <div class="col-md-12 mb-0">
                        <div class="input-group">
                           <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                           <input type="text" class="form-control" name="city" id="ajax_city" placeholder="<?php echo e(trans('labels.search_your_city')); ?>" url="<?php echo e(URL::to('/home/find-cities')); ?>" spellcheck="false" autocomplete="off" data-ms-editor="true" aria-describedby="basic-addon1">
                        </div>
                        <div  class="item-list d-flex"></div>
                     </div>
                  </div>
                  <div class="modal-body">
                     <div class="container-fluid">
                        <div class="row match-height" id="city_suggestion">
                           <?php $__currentLoopData = Helper::cities(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="col-lg-2 col-md-3 col-sm-2">
                              <div class="card-deck text-center">
                                 <div class="card-body m-2 p-0">
                                    <a onclick="setCookie('city_name','<?php echo e($cdata->name); ?>', 365)" href="#" >
                                       <img class="card-img-top h-80 w-80 img-fluid city-modal-img" src="<?php echo e(Helper::image_path($cdata->image)); ?>" alt="<?php echo e(trans('labels.city')); ?>">
                                    </a>
                                 </div>
                                 <div class="card-footer text-dark m-auto">
                                    <?php echo e($cdata->name); ?>

                                 </div>
                              </div>
                           </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

        <!-- <div class="modal fade text-left add-rattings" id="add-rattings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h3 class="modal-title" id="myModalLabel35"> <?php echo e(trans('labels.rattings_reviews')); ?> </h3>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <form class="form" id="change_password_form" action="<?php echo e(URL::to('/home/user/add-rattings')); ?>" method="POST">
                     <?php echo csrf_field(); ?>
                     <div class="form-body">
                        <div class="form-group col-lg-12">
                           <?php $__errorArgs = ['service'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           <?php $__errorArgs = ['provider'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-lg-12">
                           <label for="new_password"> <?php echo e(trans('labels.service')); ?> </label>
                           <div class="controls">
                              <input type="text" class="form-control" value="<?php echo e(@$bookingdata->service_name); ?>" disabled>
                              <input type="hidden" class="form-control" name="service" value="<?php echo e(@$bookingdata->service_id); ?>" readonly>
                              <input type="hidden" class="form-control" name="provider" value="<?php echo e(@$bookingdata->provider_id); ?>" readonly>
                           </div>
                        </div>
                        
                        <div class="form-group col-lg-12 text-center">
                           <div class="star-rating">
                              <input id="five" type="radio" name="rating" value="five" onclick="$('#ratting').val('5');" />
                              <label for="five" ><i class="active fa fa-star" aria-hidden="true"></i></label>
                              <input id="four" type="radio" name="rating" value="four" onclick="$('#ratting').val('4');" />
                              <label for="four" ><i class="active fa fa-star" aria-hidden="true"></i></label>
                              <input id="three" type="radio" name="rating" value="three" onclick="$('#ratting').val('3');" />
                              <label for="three" ><i class="active fa fa-star" aria-hidden="true"></i></label>
                              <input id="two" type="radio" name="rating" value="two" onclick="$('#ratting').val('2');" />
                              <label for="two" ><i class="active fa fa-star" aria-hidden="true"></i></label>
                              <input id="one" type="radio" name="rating" value="one" onclick="$('#ratting').val('1');" />
                              <label for="one" ><i class="active fa fa-star" aria-hidden="true"></i></label>
                              <span class="result"></span>
                           </div>
                           <input type="hidden" name="ratting" id="ratting">
                           <?php $__errorArgs = ['ratting'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><br><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-lg-12">
                           <textarea name="message" rows="4" class="form-control" placeholder="<?php echo e(trans('labels.message')); ?>" required><?php echo e(old('message')); ?></textarea>
                           <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal"><?php echo e(trans('labels.close')); ?></button>
                           <input type="submit" id="btn_update_password" class="btn btn-raised btn-primary" value="<?php echo e(trans('labels.add')); ?>">
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div> -->

         <footer class="footer">
            <div class="footer-top">
               <div class="container">
                  <div class="row">

                     <div class="col-lg-3 col-md-6">
                        <div class="footer-widget footer-contact">
                           <h2 class="footer-title"><?php echo e(trans('labels.contact_us')); ?></h2>
                           <div class="footer-contact-info">
                              <div class="footer-address">
                                 <span><i class="far fa-building"></i></span>
                                 <p><?php echo e(Helper::appdata()->address); ?></p>
                              </div>
                              <p><i class="fas fa-headphones"></i><?php echo e(Helper::appdata()->contact); ?></p>
                              <p class="mb-0"><i class="fas fa-envelope"></i> <?php echo e(Helper::appdata()->email); ?> </p>
                           </div>
                        </div>
                     </div>

                     <div class="col-lg-3 col-md-6">
                        <div class="footer-widget footer-menu">
                           <h2 class="footer-title"><?php echo e(trans('labels.categories')); ?></h2>
                           <ul>
                              <?php $__currentLoopData = Helper::categories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li><a href="<?php echo e(URL::to('/homee/services/'.$categories->slug)); ?>"><?php echo e($categories->name); ?></a></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                        </div>
                     </div>

                     

                     <div class="col-lg-3 col-md-6">
                        <div class="footer-widget footer-menu">
                           <h2 class="footer-title"><?php echo e(trans('labels.quick_links')); ?></h2>
                           <ul>
                   <!--   <li><a href="<?php echo e(URL::to('/home/providers')); ?>"><?php echo e(trans('labels.providers')); ?></a></li>   -->
                              <li><a href="<?php echo e(URL::to('/home/about-us')); ?>"><?php echo e(trans('labels.about_us')); ?></a></li>
                              <li><a href="<?php echo e(URL::to('/home/contact-us')); ?>"><?php echo e(trans('labels.contact_us')); ?></a></li>
                              <li>
                                 <?php if(Auth::check() && (Auth::user()->type == 4) ): ?>
                                    <a href="<?php echo e(URL::to('/home/help')); ?>"><?php echo e(trans('labels.help')); ?></a>
                                 <?php else: ?>
                                    <a href="<?php echo e(URL::to('/home/login')); ?>"><?php echo e(trans('labels.help')); ?></a>
                                 <?php endif; ?>
                              </li>
                           </ul>
                        </div>
                     </div>

                     <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                           <h2 class="footer-title"><?php echo e(trans('labels.follow_us')); ?></h2>
                           <div class="social-icon">
                              <ul>
                                 <li><a href="<?php echo e(Helper::appdata()->facebook_link); ?>" target="_blank"><i class="fab fa-facebook-f"></i> </a></li>
                                 <li><a href="<?php echo e(Helper::appdata()->instagram_link); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                 <li><a href="<?php echo e(Helper::appdata()->linkedin_link); ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                 <li><a href="<?php echo e(Helper::appdata()->twitter_link); ?>" target="_blank"><i class="fab fa-twitter"></i> </a></li>
                              </ul>
                           </div>
                           <div class="subscribe-form">
                              <form action="<?php echo e(URL::to('/subscribe')); ?>" method="POST">
                                 <?php echo csrf_field(); ?>
                                 <input type="email" class="form-control <?php $__errorArgs = ['sub_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sub_email" placeholder="<?php echo e(trans('labels.enter_email')); ?>">
                                 <button type="submit" class="btn footer-btn"><i class="fas fa-paper-plane"></i></button>
                                 <?php $__errorArgs = ['sub_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </form>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>

            <div class="footer-bottom">
               <div class="container-fluid">
                  <div class="copyright">
                     <div class="row">
                        <div class="col-md-6 col-lg-6">
                           <div class="copyright-text">
                              <p class="mb-0"><?php echo e(helper::appdata()->copyright); ?></p>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                           <div class="copyright-menu">
                              <ul class="policy-menu">
                                 <li><a href="<?php echo e(URL::to('/home/terms-condition')); ?>"><?php echo e(trans('labels.terms_conditions')); ?></a></li>
                                 <li><a href="<?php echo e(URL::to('/home/privacy-policy')); ?>"><?php echo e(trans('labels.privacy_policy')); ?></a></li>
                              </ul>
                           </div >
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </footer>

      </div>
   </body>

   <?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <script src="<?php echo e(asset('storage/app/public/front-assets/js/jquery-3.5.0.min.js')); ?>"></script>
   <script src="<?php echo e(asset('storage/app/public/front-assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
   <script src="<?php echo e(asset('storage/app/public/front-assets/plugins/owlcarousel/owl.carousel.min.js')); ?>"></script>
   <script src="<?php echo e(asset('storage/app/public/front-assets/js/script.js')); ?>"></script>
   <script src="<?php echo e(asset('storage/app/public/front-assets/js/toaster/toastr.min.js')); ?>" type="text/javascript"></script>
   <script src="<?php echo e(asset('storage/app/public/plugins/sweetalert/js/sweetalert.min.js')); ?>" type="text/javascript"></script>
   <script src="<?php echo e(asset('storage/app/public/front-assets/booking.js')); ?>" type="text/javascript"></script>
   <script src="<?php echo e(asset('storage/app/public/front-assets/checkout.js')); ?>" type="text/javascript"></script>
   <script src="<?php echo e(asset('storage/app/public/front-assets/home.js')); ?>" type="text/javascript"></script>
   <script src="<?php echo e(asset('storage/app/public/front-assets/main.js')); ?>" type="text/javascript"></script>
   <script src="<?php echo e(asset('storage/app/public/front-assets/search.js')); ?>" type="text/javascript"></script>
   <script src="<?php echo e(asset('storage/app/public/front-assets/wallet.js')); ?>" type="text/javascript"></script>
   
   <script type="text/javascript">
      <?php if(Session::has('success')): ?>
         toastr.options = {
            "closeButton" : true,
            "progressBar" : true
         }
         toastr.success("<?php echo e(session('success')); ?>");
      <?php endif; ?>
      <?php if(Session::has('error')): ?>
         toastr.options ={
            "closeButton" : true,
            "progressBar" : true,
            "timeOut" : 10000
         }
         toastr.error("<?php echo e(session('error')); ?>");
      <?php endif; ?>
   </script>
   <?php echo $__env->yieldContent('scripts'); ?>

</html><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/layout/home_main.blade.php ENDPATH**/ ?>
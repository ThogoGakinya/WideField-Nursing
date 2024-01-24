
<!-- main menu-->
   <div data-active-color="white" data-background-color="black" data-image="<?php echo e(asset('storage/app/public/admin-assets/img/sidebar-bg/04.jpg')); ?>" class="app-sidebar">
      <!-- main menu header-->
      <div class="sidebar-header">
         <div class="logo clearfix">
            <a href="<?php echo e(URL::to('/dashboard')); ?>" class="logo-text float-left">
               <span class="text align-middle">
                  <?php if(Auth::user()->type == 1): ?>
                     <?php echo e(trans('labels.admin')); ?>

                  <?php elseif(Auth::user()->type == 2): ?>
                     <?php echo e(trans('labels.provider')); ?>

                  <?php endif; ?>
               </span>
            </a>
            <a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="ft-toggle-right toggle-icon"></i></a>
            <a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a>
         </div>
      </div>
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="sidebar-content">
         <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
               <li class="<?php echo e(request()->is('dashboard') ? 'active' : ''); ?>">
                  <a href="<?php echo e(URL::to('/dashboard')); ?>" class="menu-item"><i class="ft-home"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.home')); ?></span></a>
               </li>
               <?php if(Auth::user()->type == 1): ?>
                  <li class="<?php echo e(request()->is('categories*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/categories')); ?>" class="menu-item"><i class="ft-briefcase"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.category')); ?></span></a>
                  </li>                            
                  <li class="<?php echo e(request()->is('cities*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/cities')); ?>" class="menu-item"><i class="ft-map"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.city')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('provider_types*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/provider_types')); ?>" class="menu-item"><i class="ft-list"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.provider_type')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('providers*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/providers')); ?>" class="menu-item"><i class="ft-users"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.provider')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('handymans*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/handymans')); ?>" class="menu-item"><i class="fa fa-users"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.handyman')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('users*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/users')); ?>" class="menu-item"><i class="ft-users"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.users')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('services*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/services')); ?>" class="menu-item"><i class="ft-heart"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.service')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('bookings*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/bookings')); ?>" class="menu-item"><i class="ft-calendar"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.booking')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('coupons*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/coupons')); ?>" class="menu-item"><i class="fa fa-gift"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.coupon')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('payment-methods*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/payment-methods')); ?>" class="menu-item"><i class="fa fa-money"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.payment_method')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('banners*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/banners')); ?>" class="menu-item"><i class="ft-image"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.banner')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('subscribers*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/subscribers')); ?>" class="menu-item"><i class="ft-check"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.subscribers')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('help*') ? 'active' : ''); ?>">
                     <a onclick="clearhelp()" class="menu-item">
                        <i class="fa fa-question-circle"></i>
                        <span data-i18n="" class="menu-title"><?php echo e(trans('labels.help')); ?></span>
                        <?php if(Helper::help() > 0): ?>
                           <span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"><?php echo Helper::help(); ?></span>
                        <?php endif; ?>
                     </a>
                  </li>
                  <li class="<?php echo e(request()->is('contact-us*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/contact-us')); ?>" class="menu-item"><i class="fa fa-phone"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.contact_us')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('payout*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/payout')); ?>" class="menu-item">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        <span class="menu-title"><?php echo e(trans('labels.payout_request')); ?></span>
                        <?php if(Helper::payout_request() > 0): ?>
                           <span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"><?php echo Helper::payout_request(); ?></span>
                        <?php endif; ?>
                     </a>
                  </li>
                  <li class="<?php echo e(request()->is('settings*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/settings')); ?>" class="menu-item"><i class="fa fa-cog"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.settings')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('home-settings*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/home-settings/home')); ?>" class="menu-item"><i class="fa fa-cog"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.home_settings')); ?></span></a>
                  </li>

                  <li class="has-sub nav-item "><a href="#"><i class="fa fa-list"></i><span class="menu-title"><?php echo e(trans('labels.cms_pages')); ?></span></a>
                     <ul class="menu-content">
                        <li class="<?php echo e(request()->is('about*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('/about')); ?>"><span class="menu-title"><?php echo e(trans('labels.about')); ?></span></a></li>
                        <li class="<?php echo e(request()->is('privacy*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('/privacy-policy')); ?>"><span class="menu-title"><?php echo e(trans('labels.privacy_policy')); ?></span></a></li>
                        <li class="<?php echo e(request()->is('terms*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('/terms-conditions')); ?>"><span class="menu-title"><?php echo e(trans('labels.terms_conditions')); ?></span></a></li>
                     </ul>
                  </li>
               <?php endif; ?>
               <?php if(Auth::user()->type == 2): ?>
                  <li class="<?php echo e(request()->is('handymans*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/handymans')); ?>" class="menu-item"><i class="fa fa-users"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.handyman')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('services*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/services')); ?>" class="menu-item"><i class="ft-heart"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.services')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('bookings*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/bookings')); ?>" class="menu-item">
                        <i class="ft-calendar"></i>
                        <span data-i18n="" class="menu-title"><?php echo e(trans('labels.bookings')); ?></span>
                        <?php if(Helper::booking() > 0): ?>
                           <span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"><?php echo Helper::booking(); ?></span>
                        <?php endif; ?>
                     </a>
                  </li>
                  <li class="<?php echo e(request()->is('timings*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/timings')); ?>" class="menu-item"><i class="ft-clock"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.timing')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('payout*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/payout')); ?>" class="menu-item">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        <span class="menu-title"><?php echo e(trans('labels.payout_request')); ?></span>
                        <?php if(Helper::payout_request() > 0): ?>
                           <span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"><?php echo Helper::payout_request(); ?></span>
                        <?php endif; ?>
                     </a>
                  </li>
                  <li class="<?php echo e(request()->is('reviews*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/reviews')); ?>" class="menu-item"><i class="ft-star"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.reviews')); ?></span></a>
                  </li>
                  <li class="<?php echo e(request()->is('notification*') ? 'active' : ''); ?>">
                     <a href="" onclick="clearnotification('<?php echo e(Auth::user()->id); ?>')" class="menu-item"><i class="ft-bell"></i> <span data-i18n="" class="menu-title"><?php echo e(trans('labels.notifications')); ?></span>
                        <?php if(Helper::notification() > 0): ?>
                           <span class="tag notification badge badge-pill badge-danger float-right mr-1 mt-1"><?php echo Helper::notification(); ?></span>
                        <?php endif; ?>
                     </a>
                  </li>
                  <li class="<?php echo e(request()->is('profile*') ? 'active' : ''); ?>">
                     <a href="<?php echo e(URL::to('/profile-settings')); ?>" class="menu-item"><i class="fa fa-cog"></i><span data-i18n="" class="menu-title"><?php echo e(trans('labels.profile_settings')); ?></span></a>
                  </li>
               <?php endif; ?>
            </ul>
         </div>
      </div>
      <!-- main menu content-->
      <div class="sidebar-background"></div>
   </div>
<!-- / main menu--><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/layout/main_menu.blade.php ENDPATH**/ ?>
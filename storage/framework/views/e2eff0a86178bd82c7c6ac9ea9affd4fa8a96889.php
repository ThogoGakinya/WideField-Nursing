         <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
               <div class="navbar-header">
                  <a id="mobile_btn" href="javascript:void(0);">
                     <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                     </span>
                  </a>
                  <a href="<?php echo e(URL::to('/')); ?>" class="navbar-brand logo"><img src="<?php echo e(Helper::image_path(Helper::appdata()->logo)); ?>" class="avatar-lg rounded" alt="Logo"></a>
                  <a href="<?php echo e(URL::to('/')); ?>" class="navbar-brand logo-small"><img src="<?php echo e(Helper::image_path(Helper::appdata()->logo)); ?>" class="avatar-lg rounded" alt="Logo"></a>
               </div>
               <div class="main-menu-wrapper">
                  <div class="menu-header">
                     <a href="<?php echo e(URL::to('/')); ?>" class="menu-logo"><img src="<?php echo e(Helper::image_path(Helper::appdata()->logo)); ?>" class="avatar-lg rounded" alt="Logo"></a>
                     <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
                  </div>
                  <ul class="main-nav">
                     <li class="<?php echo e(request()->is('/') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('labels.home')); ?></a></li>
                     <li class="<?php echo e(request()->is('home/categories*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('/home/categories')); ?>"><?php echo e(trans('labels.categories')); ?></a></li>
                     <!--<li class="<?php echo e(request()->is('home/services*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('/home/services')); ?>"><?php echo e(trans('labels.services')); ?></a></li>-->
                     <li class="<?php echo e(request()->is('home/search*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('/home/search')); ?>"><?php echo e(trans('labels.search')); ?></a></li>
                     <?php if(!Session::get('id')): ?>
                        <li class="<?php echo e(request()->is('home/register-provider*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('/home/register-provider')); ?>"><?php echo e(trans('labels.become_provider')); ?></a></li>
                        <li class="<?php echo e(request()->is('home/login*') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('/home/login')); ?>"><?php echo e(trans('labels.login')); ?></a></li>
                     <?php endif; ?>
                     <li>
                        <a href="javascript:void(0);" class="nav-link" data-toggle="modal" data-target="#citiesModal" aria-expanded="false" id="selected_city"></a>
                     </li>
                  </ul>
               </div>
               <ul class="nav header-navbar-rht">
                  <?php if(Session::get('id')): ?>
                     <li class="nav-item desc-list wallet-menu">
                        <a href="<?php echo e(URL::to('/home/user/wallet')); ?>" class="nav-link header-login">
                           <img src="<?php echo e(Helper::image_path('wallet.png')); ?>" alt="" class="mr-2 wallet-img" /><span><?php echo e(trans('labels.wallet')); ?></span> : <?php echo e(Helper::currency_format(Helper::wallet())); ?>

                        </a>
                     </li>
                     <li class="nav-item dropdown logged-item">
                        <a href="" onclick="clearnotification('<?php echo e(URL::to('/home/user/clearnotification')); ?>','<?php echo e(URL::to('/home/user/notifications')); ?>')" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                           <i class="fas fa-bell"></i>
                           <?php if(Helper::notification() > 0): ?>
                              <span class="badge badge-pill bg-yellow"><?php echo e(Helper::notification()); ?></span>
                           <?php endif; ?>
                        </a>
                     </li>
                     <li class="nav-item dropdown has-arrow logged-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                           <span class="user-img">
                              <img class="rounded-circle" src="<?php echo e(Helper::image_path(@Auth::user()->image)); ?>" alt="" />
                           </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                           <a class="dropdown-item" href="<?php echo e(URL::to('/home/user/dashboard')); ?>"><?php echo e(trans('labels.dashboard')); ?></a>
                           <a class="dropdown-item" href="<?php echo e(URL::to('/home/user/bookings')); ?>"><?php echo e(trans('labels.my_bookings')); ?></a>
                           <a class="dropdown-item" href="<?php echo e(URL::to('/home/user/profile')); ?>"><?php echo e(trans('labels.profile_settings')); ?></a>
                           <a class="dropdown-item" href="<?php echo e(URL::to('/logout')); ?>"><?php echo e(trans('labels.logout')); ?></a>
                        </div>
                     </li>
                  <?php endif; ?>
               </ul>
            </nav>
         </header>
<?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/layout/header_navbar.blade.php ENDPATH**/ ?>
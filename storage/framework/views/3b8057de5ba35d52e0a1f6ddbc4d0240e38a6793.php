<div class="col-xl-3 col-md-4">
   <div class="mb-4">
         <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center ">
            <img alt="profile image" src="<?php echo e(Helper::image_path(Auth::user()->image)); ?>" class="avatar-lg rounded" />
            <div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
               <h6 class="mb-0"><?php echo e(Auth::user()->name); ?></h6>
            </div>
         </div>
   </div>
   <div class="widget settings-menu">
      <ul role="tablist" class="nav nav-tabs">
         <li class="nav-item current">
            <a href="<?php echo e(URL::to('/home/user/dashboard')); ?>" class="<?php echo e(request()->is('home/user/dashboard*') ? 'active' : ''); ?>">
            <i class="fas fa-chart-line"></i> <span><?php echo e(trans('labels.dashboard')); ?></span> </a>
         </li>
         <li class="nav-item current">
            <a href="<?php echo e(URL::to('/home/services')); ?>" class="<?php echo e(request()->is('home/user/bookings*') ? '' : ''); ?>">
               <i class="far fa-heart"></i> <span>Shifts</span>
               <?php if(Helper::booking() > 0): ?>
                  <span class="badge badge-pill bg-yellow white"></span>
               <?php endif; ?>
            </a>
         </li>
         
         <li class="nav-item current">
            <a href="<?php echo e(URL::to('/home/user/bookings')); ?>" class="<?php echo e(request()->is('home/user/bookings*') ? 'active' : ''); ?>">
               <i class="far fa-calendar-check"></i> <span><?php echo e(trans('labels.my_bookings')); ?></span>
               <?php if(Helper::booking() > 0): ?>
                  <span class="badge badge-pill bg-yellow white"><?php echo Helper::booking(); ?></span>
               <?php endif; ?>
            </a>
         </li>
         
         
         
         
         <li class="nav-item">
            <a href="<?php echo e(URL::to('/home/user/reviews')); ?>" class="<?php echo e(request()->is('home/user/reviews*') ? 'active' : ''); ?>">
            <i class="far fa-star"></i> <span><?php echo e(trans('labels.reviews')); ?></span> </a>
         </li>
         <li class="nav-item">
            <a href="<?php echo e(URL::to('/home/user/notifications')); ?>" onclick="clearnotification('<?php echo e(URL::to('/home/user/clearnotification')); ?>','<?php echo e(URL::to('/home/user/notifications')); ?>')" class="<?php echo e(request()->is('home/user/notifications*') ? 'active' : ''); ?>">
            <i class="far fa-bell"></i> <span><?php echo e(trans('labels.notifications')); ?></span></a> 
            <?php if(Helper::notification() > 0): ?>
               <span class="badge badge-pill bg-yellow white"><?php echo Helper::notification(); ?></span>
            <?php endif; ?>
         </li>
         <li class="nav-item">
            <a href="<?php echo e(URL::to('/home/user/wallet')); ?>" class="<?php echo e(request()->is('home/user/wallet*') ? 'active' : ''); ?>">
            <i class="far fa-money-bill-alt"></i> <span><?php echo e(trans('labels.wallett')); ?></span> </a>
         </li>
         <li class="nav-item">
            <a href="<?php echo e(URL::to('/home/user/profile')); ?>" class="<?php echo e(request()->is('home/user/profile*') ? 'active' : ''); ?>">
            <i class="far fa-user"></i> <span><?php echo e(trans('labels.profile_settings')); ?></span> </a>
         </li>
         <li class="nav-item">
            <a href="<?php echo e(URL::to('/home/user/change-password')); ?>" class="<?php echo e(request()->is('home/user/change*') ? 'active' : ''); ?>">
            <i class="fas fa-key"></i> <span><?php echo e(trans('labels.change_password')); ?></span> </a>
         </li>
      </ul>
   </div>
</div><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/layout/vendor_menu.blade.php ENDPATH**/ ?>
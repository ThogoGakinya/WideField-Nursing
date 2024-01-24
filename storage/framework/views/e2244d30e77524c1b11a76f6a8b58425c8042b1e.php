<?php $__env->startSection('page_title',trans('labels.home')); ?>
<?php $__env->startSection('content'); ?>


   <section class="hero-section">
      <div class="layer">
         <div class="home-banner" style="background-image:url('<?php echo e(Helper::image_path(Helper::appdata()->banner)); ?>')"></div>
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-12">
                  <div class="section-search">
                     <h3><?php echo e(trans('labels.banner_main_title')); ?></h3>
                     <p><?php echo e(trans('labels.banner_sub_title')); ?></p>
                     <div class="search-box">
                        <div class="search-input w-100">
                           <i class="fas fa-search bficon"></i>
                           <div class="form-group mb-0">
                              <input type="text" class="form-control" name="search_box" id="search_box" placeholder="<?php echo e(trans('labels.looking_for_service')); ?>" ">   <!--url="<?php echo e(URL::to('/home/find-service')); ?> -->
                              <div class="item-list" id="suggestion" ></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
  
   <?php echo $__env->make('front.how_work', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/home.blade.php ENDPATH**/ ?>
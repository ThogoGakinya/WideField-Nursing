<?php if(!empty($howworkdata)): ?>
<section class="how-work">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="heading howitworks">
               <h2><?php echo e(trans('labels.how_works')); ?></h2>
               <span><?php echo e(trans('labels.how_works_description')); ?></span>
            </div>
            <div class="howworksec">
               <div class="row">
                  <div class="col-lg-4">
                     <div class="howwork">
                        <div class="iconround">
                           <div class="steps">01</div>
                           <img src="<?php echo e(Helper::image_path($howworkdata->icon1)); ?>" alt="">
                        </div>
                        <h3><?php echo e($howworkdata->title1); ?></h3>
                        <p><?php echo e($howworkdata->description1); ?></p>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="howwork">
                        <div class="iconround">
                           <div class="steps">02</div>
                           <img src="<?php echo e(Helper::image_path($howworkdata->icon2)); ?>" alt="">
                        </div>
                        <h3><?php echo e($howworkdata->title2); ?></h3>
                        <p><?php echo e($howworkdata->description2); ?></p>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="howwork">
                        <div class="iconround">
                           <div class="steps">03</div>
                           <img src="<?php echo e(Helper::image_path($howworkdata->icon3)); ?>" alt="">
                        </div>
                        <h3><?php echo e($howworkdata->title3); ?></h3>
                        <p><?php echo e($howworkdata->description3); ?></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php endif; ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/how_work.blade.php ENDPATH**/ ?>
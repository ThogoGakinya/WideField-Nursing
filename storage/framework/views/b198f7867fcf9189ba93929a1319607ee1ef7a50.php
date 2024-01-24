<?php $__env->startSection('page_title',trans('labels.bookings')); ?>
<?php $__env->startSection('content'); ?>
   <section id="contenxtual">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title"><?php echo e(trans('labels.bookings')); ?>

                     <div class="input-group col-4 float-right">
                        <input type="text" name="search_booking" id="search_booking" class="form-control" placeholder="<?php echo e(trans('labels.search_booking')); ?>" aria-label="Small" aria-describedby="inputGroup-sizing-sm"/>
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-search"></i></span>
                        </div>
                     </div>
                     <input type="hidden" name="url" id="fetch_bookings_url" url="<?php echo e(route('bookings')); ?>">
                  </h4>
               </div>
               <div class="card-body">
                  <div class="card-block booking_table">
                     
                     <?php echo $__env->make('booking.booking_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
   <script src="<?php echo e(asset('resources/views/booking/booking.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/booking/index.blade.php ENDPATH**/ ?>
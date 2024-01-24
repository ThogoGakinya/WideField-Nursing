<?php $__env->startSection('page_title',trans('labels.categories')); ?>
<?php $__env->startSection('content'); ?>
   <section id="contenxtual">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header"> 
                  <h4 class="card-title"><?php echo e(trans('labels.categories')); ?>

                     <?php if(Auth::user()->type == 1): ?>
                        <a href="<?php echo e(URL::to('/categories/add')); ?>" class="btn btn-primary btn-sm float-right"><?php echo e(trans("labels.add_new")); ?></a>
                     <?php endif; ?>
                  </h4>
               </div>
               <div class="card-body">
                  <div class="card-block">
                     <div class="input-group col-4 float-right">
                        <input type="text" name="search_category" id="search_category" class="form-control" placeholder="<?php echo e(trans('labels.search_category')); ?>" aria-label="Small" aria-describedby="inputGroup-sizing-sm"/>
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-search"></i></span>
                        </div>
                     </div>
                     <input type="hidden" name="url" id="categories_url" url="<?php echo e(route('categories')); ?>">
                     <div class="category_table">
                        <?php echo $__env->make('category.category_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('resources/views/category/category.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/category/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page_title',trans('labels.search')); ?>
<?php $__env->startSection('content'); ?>
   <div class="breadcrumb-bar">
      <div class="container-fluid">
         <div class="row">
            <div class="col">
               <div class="breadcrumb-title">
                  <h2><?php echo e(trans('labels.find_professional')); ?></h2>
               </div>
            </div>
            <div class="col-auto float-right ml-auto breadcrumb-menu">
               <nav aria-label="breadcrumb" class="page-breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('labels.home')); ?></a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?php echo e(trans('labels.search')); ?></li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>

   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-3">
               <div class="card filter-card">
                  <div class="card-body">
                     <h4 class="card-title mb-4"><?php echo e(trans('labels.search_filter')); ?></h4>

                     <form id="search_form" action="<?php echo e(URL::to('/home/search')); ?>" method="GET">
                        <?php echo csrf_field(); ?>
                        <div class="filter-widget">
                           <div class="filter-list">
                              <h4 class="filter-title"><?php echo e(trans('labels.search_by')); ?></h4>
                              <select class="form-control selectbox select" name="search_by" id="search_by" data-next-page="<?php echo e(URL::to('/home/search')); ?>">
                                 <option value="service" <?php if(isset($filterservice)): ?> selected <?php endif; ?>><?php echo e(trans('labels.service')); ?> </option>
                                 <option value="provider" <?php if(isset($providerdata)): ?> selected <?php endif; ?>><?php echo e(trans('labels.provider')); ?> </option>
                              </select>
                              <?php $__errorArgs = ['search_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger" id="search_by_error"> <?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           </div>
                           <div class="filter-list">
                              <h4 class="filter-title"><?php echo e(trans('labels.keyword')); ?></h4>
                              <input type="text" class="form-control" id="search_name" name="search_name" <?php if(isset($_GET['search_name'])): ?> value="<?php echo e($_GET['search_name']); ?>" <?php endif; ?> placeholder="<?php echo e(trans('labels.enter_keyword')); ?>">
                           </div>
                           <div class="filter-list">
                              <h4 class="filter-title"><?php echo e(trans('labels.sort_by')); ?></h4>
                              <select class="form-control selectbox select" name="sort_by" id="sort_by">
                                 <option value="newest"
                                    <?php if(isset($_GET['sort_by'])): ?> <?php if($_GET['sort_by'] == "newest"): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(trans('labels.newest')); ?></option>
                                 
                                 <option id="low_to_high" value="low_to_high" class="<?php if(isset($providerdata)): ?> dn <?php endif; ?>" 
                                    <?php if(isset($_GET['sort_by'])): ?> <?php if($_GET['sort_by'] == "low_to_high"): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(trans('labels.low_to_high')); ?></option>
                                 
                                 <option id="high_to_low" value="high_to_low" class="<?php if(isset($providerdata)): ?> dn <?php endif; ?>" 
                                    <?php if(isset($_GET['sort_by'])): ?> <?php if($_GET['sort_by'] == "oldest"): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(trans('labels.high_to_low')); ?></option>
                                 
                                 <option value="oldest"
                                    <?php if(isset($_GET['sort_by'])): ?> <?php if($_GET['sort_by'] == "oldest"): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(trans('labels.oldest')); ?></option>
                              </select>
                           </div>
                           <div class="filter-list <?php if(isset($providerdata)): ?> dn <?php endif; ?> " id="category_id">
                              <h4 class="filter-title"><?php echo e(trans('labels.category')); ?></h4>
                              <select class="form-control form-control selectbox select" name="category" id="category" data-show-subtext="true" data-live-search="true">
                                 <option value="" selected disabled><?php echo e(trans('labels.select')); ?></option>
                                 <?php $__currentLoopData = $categorydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cdata->id); ?>" <?php if(isset($_GET['category'])): ?> <?php if($cdata->id == $_GET['category']): ?> selected <?php endif; ?> <?php endif; ?> ><?php echo e($cdata->name); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                           </div>
                        </div>
                        <input class="btn btn-primary pl-5 pr-5 btn-block get_services" type="submit" value="<?php echo e(trans('labels.search')); ?>" >
                     </form>

                  </div>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="row align-items-center mb-4">
                  <div class="col-md-6 col">
                     <h4>
                        <?php if(isset($providerdata)): ?>
                           <?php echo e(trans('labels.provider')); ?>

                        <?php endif; ?>
                        <?php if(isset($servicedata)): ?>
                           <?php echo e(trans('labels.service')); ?>

                        <?php endif; ?>
                     </h4>
                  </div>
                  <div class="col-md-6 col-auto">
                     <div class="view-icons">
                        <a href="javascript:void(0);" class="grid-view active"><i class="fas fa-th-large"></i></a>
                     </div>
                  </div>
               </div>
               <div>
                  <div class="row match-height" id="data">

                     <?php if(isset($providerdata)): ?>
                     
                        <?php $__currentLoopData = $providerdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fpdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="col-lg-3 col-md-6">
                              <div class="service-widget">
                                 <div class="service-img">
                                    <a href="<?php echo e(URL::to('/home/providers-services/'.$fpdata->slug)); ?>">
                                       <img class="img-fluid serv-img popular-services-img" alt="provider Image" src="<?php echo e(Helper::image_path($fpdata->provider_image)); ?>">
                                    </a>
                                    <div class="item-info">
                                       <div class="service-user">
                                          <span class="service-price"><?php echo e($fpdata->provider_name); ?></span>
                                       </div>
                                       <div class="cate-list">
                                          <a class="bg-yellow"><?php echo e($fpdata->provider_type); ?></a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="service-content">
                                    <span><?php echo e(Str::limit(strip_tags($fpdata->about),50)); ?></span>
                                    <div class="rating">
                                       <i class="fas fa-star filled"></i>
                                       <span class="d-inline-block average-rating"><?php echo e(number_format($fpdata['rattings']->avg('ratting'),1)); ?></span>
                                    </div>
                                    <div class="user-info">
                                       <div class="row">
                                          <span class="col-auto ser-contact">
                                             <i class="fas fa-phone-alt mr-1"></i>
                                             <span><?php echo e($fpdata->mobile); ?></span>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
                     <?php endif; ?>
                     
                     <?php if(isset($servicedata)): ?>
                      
                        <?php echo $__env->make('front.service_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     
                     <?php endif; ?>
                  
                  </div>

                  <div class="text-center">
                     <button type="button" class="btn btn-outline-dark m-1 ajax-load" onclick="next_page()"><?php echo e(trans('labels.load_more')); ?></button>
                     <p class="text-muted dn no-record"><?php echo e(trans('labels.no_data')); ?></p>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>﻿

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/search.blade.php ENDPATH**/ ?>
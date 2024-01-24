<?php $__env->startSection('page_title',trans('labels.services')); ?>
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container">
        <?php if(!empty($servicedata)): ?>
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-view">
                        <div class="service-header">
                            <h1><?php echo e($servicedata->service_name); ?></h1>
                            <address class="service-location"><i class="fas fa-location-arrow"></i> <?php echo e($providerdata->city_name); ?></address>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <span class="d-inline-block average-rating"><?php echo e(number_format($serviceaverageratting->avg_ratting,1)); ?></span>
                            </div>
                            <div class="service-cate"><a href="<?php echo e(URL::to('/home/services/'.$servicedata->category_slug)); ?>"><?php echo e($servicedata->category_name); ?></a></div>
                        </div>
                        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 h-100 servic-carousel-img" src="<?php echo e(Helper::image_path($servicedata->service_image)); ?>" alt="<?php echo e(trans('labels.slide')); ?>">
                                </div>
                                <?php $__currentLoopData = $galleryimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="carousel-item">
                                        <img class="d-block w-100 h-100 servic-carousel-img" src="<?php echo e(Helper::image_path($gallery->gallery_image)); ?>" alt="<?php echo e(trans('labels.slide')); ?>">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only"><?php echo e(trans('labels.previous')); ?></span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only"><?php echo e(trans('labels.next')); ?></span>
                            </a>
                        </div>
                        <div class="service-details mt-2">
                            <ul class="nav nav-pills service-tabs" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><?php echo e(trans('labels.description')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-book-tab" data-toggle="pill" href="#pills-book" role="tab" aria-controls="pills-book" aria-selected="false"><?php echo e(trans('labels.reviews')); ?></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="card service-description">
                                        <div class="card-body">
                                            <p class="mb-0"><?php echo e(strip_tags($servicedata->description)); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-book" role="tabpanel" aria-labelledby="pills-book-tab">
                                    <?php if(!empty($servicerattingsdata) && count($servicerattingsdata)>0): ?>
                                        <div class="card review-box ratting_scroll">
                                            <div class="card-body">
                                                <?php $__currentLoopData = $servicerattingsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $srdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="review-list pt-1">
                                                        <div class="review-img">
                                                            <img class="rounded-circle" src="<?php echo e(Helper::image_path($srdata->user_image)); ?>" alt="<?php echo e(trans('labels.user_image')); ?>" />
                                                        </div>
                                                        <div class="review-info">
                                                            <h5><?php echo e($srdata->user_name); ?>

                                                                <div class="review-date text-muted"> <small><?php echo e(Helper::date_format($srdata->date)); ?></small></div>
                                                            </h5>
                                                            <p class="mb-0"><?php echo e($srdata->comment); ?></p>
                                                        </div>
                                                        <div class="review-count">
                                                            <div class="rating">
                                                                <i class="fas fa-star filled"></i>
                                                                <span class="d-inline-block average-rating"><?php echo e(number_format($srdata->ratting,1)); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="heading">
                                <h2><?php echo e(trans('labels.related_services')); ?></h2>
                                <span><?php echo e(trans('labels.explore_services')); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="viewall">
                                <h4><a href="<?php echo e(URL::to('/home/services/'.$servicedata->category_slug)); ?>"><?php echo e(trans('labels.view_all')); ?><i class="fas fa-angle-right"></i></a></h4>
                                <span><?php echo e(trans('labels.most_related')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="service-carousel">
                        <?php if(!empty($reletedservices) && count($reletedservices)>0): ?>
                        <div class="popular-slider owl-carousel owl-theme owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage">
                                    <?php $__currentLoopData = $reletedservices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $rsdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="owl-item <?php if($key == 0 || $key == 1): ?> active <?php endif; ?>">
                                        <div class="service-widget">
                                            <div class="service-img">
                                                <a href="<?php echo e(URL::to('/home/service-details/'.$rsdata->slug)); ?>">
                                                    <img class="img-fluid serv-img popular-services-img" alt="Service Image" src="<?php echo e(Helper::image_path($rsdata->service_image)); ?>">
                                                </a>
                                                <div class="item-info">
                                                    <div class="service-user">
                                                        <a><img src="<?php echo e(Helper::image_path($rsdata->provider_image)); ?>" alt=""></a>
                                                        <span class="service-price"><?php echo e(Helper::currency_format($rsdata->price)); ?></span>
                                                    </div>
                                                    <div class="cate-list">
                                                        <a class="bg-yellow" href=""><?php echo e($rsdata->category_name); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="service-content">
                                                <h3 class="title"><a href="<?php echo e(URL::to('/home/service-details/'.$rsdata->slug)); ?>"><?php echo e($rsdata->service_name); ?></a></h3>
                                                <div class="rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <span class="d-inline-block average-rating"><?php echo e(number_format($rsdata['rattings']->avg('ratting'),1)); ?></span>
                                                </div>
                                                <div class="user-info">
                                                    <div class="row">
                                                        <span class="col-auto ser-contact"> <strong> <?php echo e(Helper::currency_format($rsdata->price)); ?> </strong></span>
                                                         <span class="col ser-location">
                                                            <?php if($rsdata->price_type == "Fixed"): ?>
                                                                <span>
                                                                    <?php if($rsdata->duration_type == 1): ?>
                                                                        <?php echo e($rsdata->duration.trans('labels.minutes')); ?>

                                                                    <?php elseif($rsdata->duration_type == 2): ?>
                                                                        <?php echo e($rsdata->duration.trans('labels.hours')); ?>

                                                                    <?php elseif($rsdata->duration_type == 3): ?>
                                                                        <?php echo e($rsdata->duration.trans('labels.days')); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e($rsdata->duration.trans('labels.minutes')); ?>

                                                                    <?php endif; ?>
                                                                </span><i class="fas fa-clock ml-1"></i>
                                                            <?php else: ?>
                                                                <span><?php echo e($rsdata->price_type); ?></span><i class="fas fa-clock ml-1"></i>
                                                            <?php endif; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                            <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-widget widget">
                        <div class="service-amount">
                            <span><?php echo e(Helper::currency_format($servicedata->price)); ?></span>
                        </div>
                        <?php if(Auth::user()->license != NULL): ?>
                        <div class="service-book">
                            <a class="btn btn-primary" href="<?php if(Auth::user()): ?> <?php echo e(URL::to('/home/service/continue/'.$servicedata->slug)); ?> <?php else: ?> <?php echo e(URL::to('/home/login')); ?> <?php endif; ?>" ><?php echo e(trans('labels.book_service')); ?></a>
                        </div>
                        <?php else: ?>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                    Please <a href="<?php echo e(route('user_profile')); ?>"> Upload </a> your License first for you to proceed with application
                             </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="card provider-widget clearfix">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($providerdata->provider_name); ?></h5>
                            <div class="about-author">
                                <div class="about-provider-img">
                                    <div class="provider-img-wrap">
                                        <a href="<?php echo e(URL::to('/home/providers-services/'.$providerdata->slug)); ?>">
                                            <img class="img-fluid rounded" alt="" src="<?php echo e(Helper::image_path($providerdata->provider_image)); ?>">
                                        </a>
                                    </div>
                                </div>
                                <div class="provider-details">
                                    <p class="last-seen"><i class="fas fa-circle online"></i> <?php echo e(trans('labels.about')); ?> </p>
                                    <p class="text-muted mb-1"><?php echo e(Str::limit(strip_tags($providerdata->about),100)); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="provider-info">
                                <p class="mb-1"><i class="far fa-envelope"></i> <?php echo e($providerdata->email); ?> </p>
                                <p class="mb-0"><i class="fas fa-phone-alt"></i> <?php echo e($providerdata->mobile); ?> </p>
                            </div>
                        </div>
                    </div>
                    <div class="card available-widget">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e(trans('labels.service_availability')); ?></h5>
                            <hr>
                            <ul>
                                <?php if(!empty($timingdata) && count($timingdata)>0): ?>
                                    <?php $__currentLoopData = $timingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($time->is_always_close == 1): ?>
                                            <li><span><?php echo e($time->day); ?></span><?php echo e(trans('labels.unavailable')); ?></li>
                                        <?php else: ?>
                                            <li><span><?php echo e($time->day); ?></span><?php echo e($time->open_time." - ".$time->close_time); ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    
                                    <li class="text-center"><?php echo e(trans('labels.no_data')); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php else: ?>
            <p class="text-center"><?php echo e(trans('labels.no_data')); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/front/service_details.blade.php ENDPATH**/ ?>
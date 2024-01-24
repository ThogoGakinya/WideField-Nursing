<?php $__env->startSection('page_title'); ?>
   <?php echo e(trans('labels.provider')); ?> | <?php echo e(@$providerdata->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section id="basic-form-layouts">
    <div class="row">
        <!-- Provider Personal Info -->
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">

                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="<?php echo e(Helper::image_path($providerdata->image)); ?>" alt="<?php echo e(trans('labels.image')); ?>" class="rounded booking-detail-profile zoom-in" data-enlargeable/>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="media-body ml-2">    
                                                <div class="form-group row m-0">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col col-md-12">
                                                                <h3 class="text-bold-500 primary mt-2"><?php echo e($providerdata->name); ?></h3>
                                                            </div>
                                                            <div class="w-100"><hr class="m-1"></div>
                                                            <div class="col col-md-12 ">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6 col-sm-4 text-left">
                                                                        <ul class="no-list-style">
                                                                            <li class="">
                                                                                <span class="text-bold-500 primary"><i class="ft-smartphone font-small-3"></i> <?php echo e(trans('labels.status')); ?></span>
                                                                                <span class="display-block overflow-hidden">
                                                                                    <?php if($providerdata->is_available == 1): ?>
                                                                                        <span class="success"><i class="ft-check font-medium-3"></i> <?php echo e(trans('labels.active')); ?></span>
                                                                                    <?php elseif($providerdata->is_available == 2): ?>
                                                                                        <span class="danger"><i class="ft-x font-medium-3"></i> <?php echo e(trans('labels.not_active')); ?></span>
                                                                                    <?php endif; ?>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-sm-4">
                                                                        <ul class="no-list-style">
                                                                            <li class="">
                                                                                <span class="text-bold-500 primary"><i class="ft-mail font-small-3"></i> <?php echo e(trans('labels.email')); ?></span>
                                                                                <span class="display-block overflow-hidden"><?php echo e($providerdata->email); ?></span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-sm-4">
                                                                        <ul class="no-list-style">
                                                                            <li class="">
                                                                                <span class="text-bold-500 primary"><i class="ft-phone font-small-3"></i> <?php echo e(trans('labels.mobile')); ?></span>
                                                                                <span class="display-block overflow-hidden"><?php echo e($providerdata->mobile); ?></span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-sm-4">
                                                                        <ul class="no-list-style">
                                                                            <li class="">
                                                                                <span class="text-bold-500 primary"><i class="fa fa-list-alt font-small-3"></i> <?php echo e(trans('labels.provider_type')); ?></span>
                                                                                <span class="display-block overflow-hidden"><?php echo e($providerdata['providertype']->name); ?></span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3 class="panel-title"><?php echo e(trans('labels.earnings')); ?></h3>
                                </div>
                                <div class="col-md-4">
                                    <select name="year" class="form-control" id="year" data-show-subtext="true"data-live-search="true" url="<?php echo e(URL::to('/providers/'.$providerdata->slug)); ?>">
                                        <option value="" selected disabled><?php echo e(trans('labels.select')); ?></option>
                                        <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($year->year); ?>" <?php if($year->year == $providerdata->year): ?> selected <?php endif; ?>><?php echo e($year->year); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="piechart_3d" class="card-body card-block height-400 width-600 lineAreaDashboard"></div>
                    </div>
                </div>
               <div class="col-md-6">
                  <div class="row match-height">
                     <div class="col-xl-6 col-lg-6 col-12">
                           <div class="card gradient-ibiza-sunset">
                               <div class="card-body">
                                   <div class="px-3 py-3">
                                       <div class="media">
                                           <div class="media-body white text-left">
                                               <h3><?php echo e(count($servicedata)); ?></h3>
                                               <span><?php echo e(trans('labels.total_services')); ?></span>
                                           </div>
                                           <div class="media-right align-self-center">
                                               <i class="icon-heart white font-large-2 float-right"></i>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-xl-6 col-lg-6 col-12">
                           <div class="card gradient-blackberry">
                               <div class="card-body">
                                   <div class="px-3 py-3">
                                       <div class="media">
                                           <div class="media-body white text-left">
                                               <h3><?php echo e(count($handymandata)); ?></h3>
                                               <span><?php echo e(trans('labels.total_handyman')); ?></span>
                                           </div>
                                           <div class="media-left align-self-center">
                                               <i class="icon-users white font-large-2 float-left"></i>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-xl-6 col-lg-6 col-12">
                           <div class="card gradient-green-tea">
                               <div class="card-body">
                                   <div class="px-3 py-3">
                                       <div class="media">
                                           <div class="media-body white text-left">
                                               <h3><?php echo e(Helper::currency_format($total_earning)); ?></h3>
                                               <span><?php echo e(trans('labels.total_earnings')); ?></span>
                                           </div>
                                           <div class="media-right align-self-center">
                                               <i class="fa fa-money white font-large-2 float-right"></i>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-xl-6 col-lg-6 col-12">
                           <div class="card gradient-pomegranate">
                               <div class="card-body">
                                   <div class="px-3 py-3">
                                       <div class="media">
                                           <div class="media-body white text-left">
                                               <h3><?php echo e(Helper::currency_format($providerdata->wallet)); ?></h3>
                                               <span><?php echo e(trans('labels.wallet')); ?></span>
                                           </div>
                                           <div class="media-right align-self-center">
                                               <i class="icon-wallet white font-large-2 float-right"></i>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>

            <!-- Provider Services List -->
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo e(trans('labels.services')); ?></h4>
                        <p class="card-text"><?php echo e($providerdata->name); ?><?php echo e(trans('labels.providers_services')); ?></p>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <?php echo $__env->make('service.service_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>      
                        </div>
                    </div>
                </div>
            </div>
            <!-- Provider Handyman List -->
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo e($providerdata->name); ?><?php echo e(trans('labels.providers_handyman')); ?></h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <?php echo $__env->make('provider.handyman.handyman_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>                     
                        </div>
                    </div>
                </div>
            </div>

        <!-- rattings list -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                   <h4 class="card-title"><strong> <?php echo e(trans('labels.rattings_reviews')); ?> </strong></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <?php if(count($rattingsdata) > 0): ?>
                        <?php $__currentLoopData = $rattingsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group row border-bottom border-gray mb-2">
                                <div class="col-md-1 mb-1">
                                    <img src="<?php echo e(Helper::image_path($rdata->user_image)); ?>" alt="<?php echo e(trans('labels.image')); ?>" class="rounded table-image">
                                </div>
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col col-md-10"><strong><?php echo e($rdata->user_name); ?></strong></div>
                                        <div class="col col-md-2 text-right text-muted"><?php echo e(Helper::date_format($rdata->date)); ?></div>
                                        <div class="w-100"></div>
                                        <div class="col col-md-10"><?php echo e(strip_tags($rdata->comment)); ?></div>
                                        <div class="col col-md-2 text-right">
                                            <i class="fa fa-star yellow"></i>
                                            <span class="d-inline-block average-rating"><?php echo e(number_format($rdata->ratting,1)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <p class="text-center text-muted"><?php echo e(trans('labels.no_data')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
   </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('storage/app/public/admin-assets/js/google-chart.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('resources/views/provider/provider.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
    var earnings = <?php echo $earnings; ?>;
    draw_chart(earnings, 'Yearly Month Wise Earnings');
    $('#year').change(function(){
    var year = $(this).val();
        load_monthwise_data(year, 'Yearly Month Wise Earnings For');
    });
    function load_monthwise_data(year, title)
    {
        var myurl = $("#year").attr('url');
        var temp_title = title + ' '+year+'';
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url:myurl,
            method:"GET",
            data:{year:year},
            dataType:"JSON",
            success:function(data)
            {
                draw_chart(data, temp_title);
            }
        });
    }
    function draw_chart(chart_data, chart_main_title)
    {
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable(chart_data);
            var options = {
                title: chart_main_title,
                is3D: true,
                pieSliceText: 'value-and-percentage',
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/provider/showprovider.blade.php ENDPATH**/ ?>
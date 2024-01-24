<?php $__env->startSection('page_title',trans('labels.home')); ?>
<?php $__env->startSection('content'); ?>
   
<div class="row match-height">
	<?php if(Auth::user()->type == 1): ?>
	<div class="col-xl-3 col-lg-6 col-md-6 col-12">
		<div class="card gradient-green-tea">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
                     <h3 class="font-large-1 mb-0"><?php echo e($total_providers); ?></h3>
                     <span><?php echo e(trans('labels.total_providers')); ?></span>
                  </div>
                  <a <?php if(Auth::user()->type == 1): ?> href="<?php echo e(URL::to('/providers')); ?>" <?php endif; ?>>
                     <div class="media-right white text-right">
                        <i class="ft-users font-large-2"></i>
                     </div>
                  </a>
					</div>
				</div>
				<div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">				
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-xl-3 col-lg-6 col-md-6 col-12">
		<div class="card gradient-blackberry">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
                  <div class="media-body white text-left">
                     <h3 class="font-large-1 mb-0"><?php echo e($total_categories); ?></h3>
                     <span><?php echo e(trans('labels.total_categories')); ?></span>
                  </div>
                  <a <?php if(Auth::user()->type == 1): ?> href="<?php echo e(URL::to('/categories')); ?>" <?php endif; ?>>
                     <div class="media-right white text-right">
                        <i class="fa fa-list-alt font-large-2"></i>
                     </div>
                  </a>
					</div>
				</div>
				<div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">					
				</div>
			</div>
		</div>
	</div>

   <div class="col-xl-3 col-lg-6 col-md-6 col-12">
		<div class="card gradient-green-tea">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
                     <h3 class="font-large-1 mb-0"><?php echo e($total_coupons); ?></h3>
                     <span><?php echo e(trans('labels.total_coupons')); ?></span>
                  </div>
                  <a <?php if(Auth::user()->type == 1): ?> href="<?php echo e(URL::to('/coupons')); ?>" <?php endif; ?>> 
                     <div class="media-right white text-right">
                        <i class="fa fa-gift font-large-2"></i>
                     </div>
                  </a>
					</div>
				</div>
				<div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">				
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-xl-3 col-lg-6 col-md-6 col-12">
		<div class="card gradient-pomegranate">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
                     <h3 class="font-large-1 mb-0"><?php echo e($total_ptypes); ?></h3>
                     <span><?php echo e(trans('labels.total_provider_types')); ?></span>
                  </div>
                  <a <?php if(Auth::user()->type == 1): ?> href="<?php echo e(URL::to('provider_types')); ?>" <?php endif; ?>>
                     <div class="media-right white text-right">
                        <i class="ft-list font-large-2"></i>
                     </div>
                  </a>
					</div>
				</div>
				<div id="Widget-line-chart3" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">					
				</div>
			</div>
		</div>
	</div>
	
   <div class="col-xl-3 col-lg-6 col-md-6 col-12">
		<div class="card gradient-blackberry">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
                     <h3 class="font-large-1 mb-0"><?php echo e($total_cities); ?></h3>
                     <span><?php echo e(trans('labels.total_cities')); ?></span>
                  </div>
                  <a <?php if(Auth::user()->type == 1): ?> href="<?php echo e(URL::to('/cities')); ?>" <?php endif; ?>>
                     <div class="media-right white text-right">
                        <i class="icon-map font-large-2"></i>
                     </div>
                  </a>
					</div>
				</div>
				<div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">				
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="col-xl-3 col-lg-6 col-md-6 col-12">
		<div class="card gradient-ibiza-sunset">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
                     <h3 class="font-large-1 mb-0"><?php echo e($total_services); ?></h3>
                     <span><?php echo e(trans('labels.total_services')); ?></span>
                  </div>
                  <a href="<?php echo e(URL::to('/services')); ?>">
                     <div class="media-right white text-right">
                        <i class="fa fa-heart font-large-2"></i>
                     </div>
                  </a>
					</div>
				</div>
				<div id="Widget-line-chart1" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
				</div>
			</div>
		</div>
	</div>
	
   <div class="col-xl-3 col-lg-6 col-md-6 col-12">
		<div class="card gradient-pomegranate">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
                     <h3 class="font-large-1 mb-0"><?php echo e($total_handymans); ?></h3>
                     <span><?php echo e(trans('labels.total_handyman')); ?></span>
                  </div>
                  <a href="<?php echo e(URL::to('/handymans')); ?>">
                     <div class="media-right white text-right">
                        <i class="fa fa-users font-large-2"></i>
                     </div>
                  </a>
					</div>
				</div>
				<div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">				
				</div>
			</div>
		</div>
	</div>

</div>

	<div class="row match-height">

      <!-- users-chart -->
    	<div class="col-xl-6 col-lg-12 <?php if(Auth::user()->type == 2): ?> dn <?php endif; ?>">
       	<div class="card">
            <div class="card-header border-bottom">
               <div class="row">
                   <div class="col-md-8">
                       <h3 class="panel-title"><?php echo e(trans('labels.users')); ?></h3>
                   </div>
                   <div class="col-md-4">
                     <select name="year" class="form-control" id="year" data-show-subtext="true" data-live-search="true" url="<?php echo e(URL::to('/dashboard')); ?>">
                        <?php $__currentLoopData = $user_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($year->years); ?>"><?php echo e($year->years); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>
                  </div>
               </div>
            </div>
            <div class="card-body"><div class="card-block"><div id="users-chart" class="height-350" ></div></div></div>
        	</div>
    	</div>

    	<!-- bookings-chart -->
      <div class="col-xl-6 col-lg-12">
         <div class="card">
            <div class="card-header border-bottom">
               <div class="container">
                  <div class="row">
                     <div class="col"><h3 class="panel-title"><?php echo e(trans('labels.bookings')); ?></h3></div>
                     <form class="input-group-append" id="get-bookings" url="<?php echo e(URL::to('/dashboard')); ?>">
                     <?php if(Auth::user()->type == 1): ?>
	                     <div class="col-lg-7">
	                        <select name="provider" class="form-control" id="provider" data-show-subtext="true" data-live-search="true">
	                           <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                              <option value="<?php echo e($pdata->id); ?>"><?php echo e($pdata->name); ?></option>
	                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                        </select>
	                     </div>
                     <?php endif; ?>
                     <div class="<?php if(Auth::user()->type == 1): ?> col-lg-5 <?php else: ?> col-md-auto <?php endif; ?>">
                        <select name="booking_year" class="form-control" id="booking_year" data-show-subtext="true" data-live-search="true" url="<?php echo e(URL::to('/dashboard')); ?>">
                           <?php $__currentLoopData = $booking_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $byear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($byear->year); ?>"><?php echo e($byear->year); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                     </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="card-body"><div class="card-block"><div id="bookings-chart" class="height-350"></div></div></div>
         </div>
      </div>

      <!-- items-chart -->
      <div class="col-xl-6 col-lg-12 <?php if(Auth::user()->type == 1): ?> dn <?php endif; ?>">
         <div class="card">
            <div class="card-header border-bottom">
               <div class="container">
                  <div class="row">
                     <div class="col"><h3 class="panel-title"><?php echo e(trans('labels.service_bookings')); ?></h3></div>
                     <form class="input-group-append" id="get-service-orders" url="<?php echo e(URL::to('/dashboard')); ?>">
                        <div class="col-lg-8">
                           <select name="service" class="form-control" id="service" data-show-subtext="true" data-live-search="true">
                              <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($sdata->id); ?>"><?php echo e($sdata->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                        </div>
                        <div class="col-lg-4">
                           <select name="service_year" class="form-control" id="service_year" data-show-subtext="true" data-live-search="true">
                              <?php $__currentLoopData = $service_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oyear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($oyear->years); ?>"><?php echo e($oyear->years); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="card-body"><div class="card-block"><div id="service-orders-chart" class="height-350"></div></div></div>
         </div>
      </div>


   </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('storage/app/public/admin-assets/js/google-chart.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
    
   // users-chart
   var user_count = <?php echo $user_chart_data; ?>;
   DrawUsersColumnChart(user_count, 'Month wise users');
   $('#year').change(function(){
	   var year = $(this).val();
      UsersChartData(year, 'Month wise users for');
	});
   function UsersChartData(year, title){
      var myurl = $("#year").attr('url');
      var temp_title = title + ' '+year+'';
      $.ajax({
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         url:myurl,
         method:"GET",
         data:{year:year},
         dataType:"JSON",
         success:function(data){
            var chart_data = data.users_count;
            DrawUsersColumnChart(chart_data, temp_title);
         }
      });
   }
   function DrawUsersColumnChart(chart_data, chart_main_title){
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawLineChart);
      function drawLineChart() {
         if(chart_data.length <= 1){
            chart_data.push(["No data", 0,0,0]);
         }
         var data = google.visualization.arrayToDataTable(chart_data);
         var options = {title: chart_main_title,pieSliceText: 'value-and-percentage',
            vAxis: {title: 'Users',},
            bar: {groupWidth: "50%"},
         };
         var chart = new google.visualization.ColumnChart(document.getElementById('users-chart'));
         chart.draw(data, options);
      }
   }



   // booking chart
   var bookings_count = <?php echo $rest_chart_data; ?>;
   DrawPieChart(bookings_count, 'Month wise bookings');
   $('#get-bookings').change(function(){
      var provider = $("#provider").val();
      var booking_year = $("#booking_year").val();
      BookingsChartData(booking_year,provider,'Month wise bookings for');
   });
   function BookingsChartData(booking_year,provider,title){
      var myurl = $("#get-bookings").attr('url');
      var temp_title = title +' '+booking_year+'';
      $.ajax({
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         url:myurl,
         method:"GET",
         data:{booking_year:booking_year,provider:provider},
         dataType:"JSON",
         success:function(data){
            var chart_data = data.bookings_count;
            DrawPieChart(chart_data, temp_title);
         }
      });
   }
   function DrawPieChart(chart_data, chart_main_title){
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
         var data = google.visualization.arrayToDataTable(chart_data);
         var options = {title: chart_main_title,is3D: true,pieSliceText: 'value-and-percentage',};
         var chart = new google.visualization.PieChart(document.getElementById('bookings-chart'));
         chart.draw(data, options);
      }
   }

   // service-booking chart
   var service_orders_count = <?php echo $service_chart_data; ?>;
   DrawDonutChart(service_orders_count, 'Month wise orders');
   $('#get-service-orders').change(function(){
      var service = $("#service").val();
      var service_year = $("#service_year").val();
      ItemOrdersChartData(service_year,service,'Month wise orders for');
   });
   function ItemOrdersChartData(service_year,service,title){
      var myurl = $("#get-service-orders").attr('url');
      var temp_title = title +' '+service_year+'';
      $.ajax({
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         url:myurl,
         method:"GET",
         data:{service_year:service_year,service:service},
         dataType:"JSON",
         success:function(data){
            var chart_data = data.service_orders_count;
            DrawDonutChart(chart_data, temp_title);
         }
      });
   }
   function DrawDonutChart(chart_data, chart_main_title){
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
         var data = google.visualization.arrayToDataTable(chart_data);
         var options = {title: chart_main_title,pieHole: 0.4,pieSliceTextStyle: {color: 'black'} };
         var chart = new google.visualization.PieChart(document.getElementById('service-orders-chart'));
         chart.draw(data, options);
      }
   }

	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/admin/adashboard.blade.php ENDPATH**/ ?>
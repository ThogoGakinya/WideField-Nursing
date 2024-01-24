@foreach($servicedata as $sdata)
   <div class="col-lg-3 col-md-6">
      <div class="service-widget">
         <div class="service-img">
                            <a href="{{URL::to('/home/service-details/'.$sdata->slug)}}">
               <img class="img-fluid serv-img popular-services-img" src="{{ Helper::image_path($sdata->service_image) }}" alt="{{trans('labels.service_image')}}">
            </a>
            <div class="item-info">
               <div class="service-user">
                  <span class="service-price">{{ Helper::currency_format($sdata->price) }}</span>
               </div>
               <div class="cate-list">
                  <a class="bg-yellow">{{$sdata->category_name}}</a>
               </div>
            </div>
         </div>
         <div class="service-content">
            <h3 class="title">
               <a href="{{URL::to('/home/service-details/'.$sdata->slug)}}">{{$sdata->service_name}}</a>
            </h3>
            <address class="service-location"><i class="fas fa-location-arrow"></i> {{$sdata->address}}</address>
            <div class="rating">
                 
               <i class="fas fa-star filled"></i>
               <span class="d-inline-block average-rating">{{$sdata->start_time}}</span>
            </div>
            <div class="user-info">
               
               <div class="row">
                  <span class="col-auto ser-contact"><i class="fas fa-phone-alt mr-1"></i>
                     <span>{{$sdata->mobile}}</span>
                  </span>
                  <span class="col ser-location">
                     @if($sdata->price_type == "Fixed")
                        <span>
                           @if ($sdata->duration_type == 1)
                              {{$sdata->duration.trans('labels.minutes')}}
                           @elseif ($sdata->duration_type == 2)
                              {{$sdata->duration.trans('labels.hours')}}
                           @elseif ($sdata->duration_type == 3)
                              {{$sdata->duration.trans('labels.days')}}
                           @else
                              {{$sdata->duration.trans('labels.minutes')}}
                           @endif
                        </span><i class="fas fa-clock ml-1"></i>
                     @else
                        <span>{{$sdata->price_type}}</span><i class="fas fa-clock ml-1"></i>
                     @endif
                  </span>
               </div>
               <div class="row">
                   <div class="col-md-6">
                       <small><i>{{$sdata->category_name}}</i></small>
                   </div>

                   <div class="col-md-6" align="right">
                       <small><i></i></small>
                   </div>
                  <!--<span class="col-auto ser-contact">-->
                  <!--     <small>Time :<i>{{$sdata->start_time}}</i></small>-->
                  <!--      <small><i>{{$sdata->end_time}}</i></small>-->
                  <!--</span>-->
                  
               </div>
               
                <div class="row">
                      <div class="col-md-8" align="center">
                         <div class="cate-list" style="text-align:center;">
                              <a href="{{URL::to('/home/service-details/'.$sdata->slug)}}" class="btn btn-success btn-sm">Book Shift</a>
                          </div>
                      </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endforeach
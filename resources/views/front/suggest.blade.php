@isset($servicedata)
<div class="text-left mt-1">
   <ul class="list-group suggestion_scroll col-sm-12 col-md-12 col-lg-12 ">
      @if(!empty($servicedata))
         @if(count($servicedata)>0)
            @foreach($servicedata as $service)
            <li class="list-group-item"><a href="{{URL::to('/home/service-details/'.$service->service_slug)}}" class="text-dark" style="font-weight: bolder;">{{$service->service_name}}</a></li>
            @endforeach
         @else
            
            <p class="list-group-item">{{trans('labels.no_result')}}</p>
         
         @endif
      @endif      
   </ul>
</div>
@endisset


@isset($citydata)
   @if(!empty($citydata) && count($citydata)>0)
      
      @foreach($citydata as $city)
      
         <div class="col-lg-2 col-md-3 col-sm-2">
            <div class="card-deck text-center">
               <div class="card-body m-2 p-0">
                  <a onclick="setCookie('city_name','{{$city->name}}', 365)" href="#" >
                     <img class="card-img-top h-80 w-80 city-modal-img" src="{{ Helper::image_path($city->image) }}" alt="{{trans('labels.city')}}">
                  </a>
                  <div class="card-footer text-dark m-0">
                     {{$city->name}}
                  </div>
               </div>
            </div>
         </div>
         
      @endforeach
   @else
      <div class="text-center">
         {{trans('labels.no_result')}}
      </div>
   @endif
@endisset
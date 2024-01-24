@extends('front.layout.main')
@section('page_title')
   {{@$providerdata->provider_name}} | {{trans('labels.services')}}
@endsection
@section('content')

    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-title">
                        <h2>{{trans('labels.providers')}}</h2>
                    </div>
                </div>
                <div class="col-auto float-right ml-auto breadcrumb-menu">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.home')}}</a></li>
                           <li class="breadcrumb-item"><a href="{{URL::to('/home/providers')}}">{{trans('labels.providers')}}</a></li>
                           <li class="breadcrumb-item active" aria-current="page">{{@$providerdata->provider_name}}</li>
                        </ol>
                    </nav> 
                </div>
            </div>
        </div>
      </div>

      <div class="content">
         <div class="container">
            <div class="row">
               @include('front.layout.provider_menu')
               <div class="col-xl-9 col-md-8">
                  <h4 class="widget-title">{{trans('labels.services')}}</h4>
                  @if(!empty($servicedata) && count($servicedata)>0)
                     <div class="row">
                        @foreach ($servicedata as $sdata)
                           <div class="col-lg-4 col-md-4">
                              <div class="service-widget">
                                 <div class="service-img">
                                 <a href="{{URL::to('/home/service-details/'.$sdata->slug)}}">
                                    <img class="img-fluid serv-img popular-services-img" alt="{{trans('labels.service_image')}}" src="{{Helper::image_path($sdata->service_image)}}">
                                 </a>
                                 <div class="item-info">
                                    <div class="service-user">
                                       <span class="service-price">{{ Helper::currency_format($sdata->price) }}</span>
                                    </div>
                                    <div class="cate-list">
                                       <a class="bg-yellow" href="#">{{$sdata->category_name}}</a>
                                    </div>
                                 </div>
                                 </div>
                                 <div class="service-content">
                                 <h3 class="title text-truncate">
                                    <a href="{{URL::to('/home/service-details/'.$sdata->id)}}">{{$sdata->service_name}}</a>
                                 </h3>
                                 <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <span class="d-inline-block average-rating">{{ number_format($sdata['rattings']->avg('ratting'),1)}}</span>
                                 </div>
                                 <div class="user-info">
                                    <div class="service-action">
                                       <div class="row">
                                          <span class="col-auto ser-contact"><i class="fas fa-phone-alt mr-1"></i>
                                             <span>{{$sdata->provider_mobile}}</span>
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
                                                   @endif
                                                </span><i class="fas fa-clock ml-1"></i>
                                             @else
                                                <span>{{$sdata->price_type}}</span><i class="fas fa-clock ml-1"></i>
                                             @endif
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                                 </div>
                              </div>
                           </div>
                        @endforeach
                     </div>
                  @else
                     <p class="text-center">{{trans('labels.no_data')}}</p>
                  @endif
               </div>
            </div>
         </div>
      </div>
@endsection

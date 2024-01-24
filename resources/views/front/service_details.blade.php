@extends('front.layout.main')
@section('page_title',trans('labels.services'))
@section('content')
<div class="content">
    <div class="container">
        @if(!empty($servicedata))
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-view">
                        <div class="service-header">
                            <h1>{{$servicedata->service_name}}</h1>
                            <address class="service-location"><i class="fas fa-location-arrow"></i> {{$providerdata->city_name}}</address>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <span class="d-inline-block average-rating">{{number_format($serviceaverageratting->avg_ratting,1)}}</span>
                            </div>
                            <div class="service-cate"><a href="{{URL::to('/home/services/'.$servicedata->category_slug)}}">{{$servicedata->category_name}}</a></div>
                        </div>
                        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 h-100 servic-carousel-img" src="{{Helper::image_path($servicedata->service_image)}}" alt="{{trans('labels.slide')}}">
                                </div>
                                @foreach($galleryimages as $gallery)
                                    <div class="carousel-item">
                                        <img class="d-block w-100 h-100 servic-carousel-img" src="{{Helper::image_path($gallery->gallery_image)}}" alt="{{trans('labels.slide')}}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">{{trans('labels.previous')}}</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">{{trans('labels.next')}}</span>
                            </a>
                        </div>
                        <div class="service-details mt-2">
                            <ul class="nav nav-pills service-tabs" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">{{trans('labels.description')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-book-tab" data-toggle="pill" href="#pills-book" role="tab" aria-controls="pills-book" aria-selected="false">{{trans('labels.reviews')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="card service-description">
                                        <div class="card-body">
                                            <p class="mb-0">{{strip_tags($servicedata->description)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-book" role="tabpanel" aria-labelledby="pills-book-tab">
                                    @if(!empty($servicerattingsdata) && count($servicerattingsdata)>0)
                                        <div class="card review-box ratting_scroll">
                                            <div class="card-body">
                                                @foreach($servicerattingsdata as $srdata)
                                                    <div class="review-list pt-1">
                                                        <div class="review-img">
                                                            <img class="rounded-circle" src="{{Helper::image_path($srdata->user_image)}}" alt="{{trans('labels.user_image')}}" />
                                                        </div>
                                                        <div class="review-info">
                                                            <h5>{{$srdata->user_name}}
                                                                <div class="review-date text-muted"> <small>{{Helper::date_format($srdata->date)}}</small></div>
                                                            </h5>
                                                            <p class="mb-0">{{$srdata->comment}}</p>
                                                        </div>
                                                        <div class="review-count">
                                                            <div class="rating">
                                                                <i class="fas fa-star filled"></i>
                                                                <span class="d-inline-block average-rating">{{number_format($srdata->ratting,1)}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-center">{{trans('labels.no_data')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="heading">
                                <h2>{{trans('labels.related_services')}}</h2>
                                <span>{{trans('labels.explore_services')}}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="viewall">
                                <h4><a href="{{URL::to('/home/services/'.$servicedata->category_slug)}}">{{trans('labels.view_all')}}<i class="fas fa-angle-right"></i></a></h4>
                                <span>{{trans('labels.most_related')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="service-carousel">
                        @if(!empty($reletedservices) && count($reletedservices)>0)
                        <div class="popular-slider owl-carousel owl-theme owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage">
                                    @foreach($reletedservices as $key => $rsdata)
                                    <div class="owl-item @if($key == 0 || $key == 1) active @endif">
                                        <div class="service-widget">
                                            <div class="service-img">
                                                <a href="{{URL::to('/home/service-details/'.$rsdata->slug)}}">
                                                    <img class="img-fluid serv-img popular-services-img" alt="Service Image" src="{{Helper::image_path($rsdata->service_image)}}">
                                                </a>
                                                <div class="item-info">
                                                    <div class="service-user">
                                                        <a><img src="{{Helper::image_path($rsdata->provider_image)}}" alt=""></a>
                                                        <span class="service-price">{{Helper::currency_format($rsdata->price)}}</span>
                                                    </div>
                                                    <div class="cate-list">
                                                        <a class="bg-yellow" href="">{{$rsdata->category_name}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="service-content">
                                                <h3 class="title"><a href="{{URL::to('/home/service-details/'.$rsdata->slug)}}">{{$rsdata->service_name}}</a></h3>
                                                <div class="rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <span class="d-inline-block average-rating">{{number_format($rsdata['rattings']->avg('ratting'),1)}}</span>
                                                </div>
                                                <div class="user-info">
                                                    <div class="row">
                                                        <span class="col-auto ser-contact"> <strong> {{Helper::currency_format($rsdata->price)}} </strong></span>
                                                         <span class="col ser-location">
                                                            @if($rsdata->price_type == "Fixed")
                                                                <span>
                                                                    @if ($rsdata->duration_type == 1)
                                                                        {{$rsdata->duration.trans('labels.minutes')}}
                                                                    @elseif ($rsdata->duration_type == 2)
                                                                        {{$rsdata->duration.trans('labels.hours')}}
                                                                    @elseif ($rsdata->duration_type == 3)
                                                                        {{$rsdata->duration.trans('labels.days')}}
                                                                    @else
                                                                        {{$rsdata->duration.trans('labels.minutes')}}
                                                                    @endif
                                                                </span><i class="fas fa-clock ml-1"></i>
                                                            @else
                                                                <span>{{$rsdata->price_type}}</span><i class="fas fa-clock ml-1"></i>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @else
                            <p class="text-center">{{trans('labels.no_data')}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-widget widget">
                        <div class="service-amount">
                            <span>{{Helper::currency_format($servicedata->price)}}</span>
                        </div>
                        @if(Auth::user()->license != NULL)
                        <div class="service-book">
                            <a class="btn btn-primary" href="@if(Auth::user()) {{URL::to('/home/service/continue/'.$servicedata->slug)}} @else {{URL::to('/home/login')}} @endif" >{{trans('labels.book_service')}}</a>
                        </div>
                        @else
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                    Please <a href="{{route('user_profile')}}"> Upload </a> your License first for you to proceed with application
                             </div>
                        </div>
                        @endif
                    </div>
                    <div class="card provider-widget clearfix">
                        <div class="card-body">
                            <h5 class="card-title">{{$providerdata->provider_name}}</h5>
                            <div class="about-author">
                                <div class="about-provider-img">
                                    <div class="provider-img-wrap">
                                        <a href="{{URL::to('/home/providers-services/'.$providerdata->slug)}}">
                                            <img class="img-fluid rounded" alt="" src="{{Helper::image_path($providerdata->provider_image)}}">
                                        </a>
                                    </div>
                                </div>
                                <div class="provider-details">
                                    <p class="last-seen"><i class="fas fa-circle online"></i> {{trans('labels.about')}} </p>
                                    <p class="text-muted mb-1">{{Str::limit(strip_tags($providerdata->about),100)}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="provider-info">
                                <p class="mb-1"><i class="far fa-envelope"></i> {{$providerdata->email}} </p>
                                <p class="mb-0"><i class="fas fa-phone-alt"></i> {{$providerdata->mobile}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card available-widget">
                        <div class="card-body">
                            <h5 class="card-title">{{trans('labels.service_availability')}}</h5>
                            <hr>
                            <ul>
                                @if(!empty($timingdata) && count($timingdata)>0)
                                    @foreach($timingdata as $time)
                                        @if($time->is_always_close == 1)
                                            <li><span>{{$time->day}}</span>{{trans('labels.unavailable')}}</li>
                                        @else
                                            <li><span>{{$time->day}}</span>{{$time->open_time." - ".$time->close_time}}</li>
                                        @endif
                                    @endforeach
                                @else
                                    
                                    <li class="text-center">{{trans('labels.no_data')}}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        @else
            <p class="text-center">{{trans('labels.no_data')}}</p>
        @endif
    </div>
</div>
@endsection
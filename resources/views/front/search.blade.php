@extends('front.layout.main')
@section('page_title',trans('labels.search'))
@section('content')
   <div class="breadcrumb-bar">
      <div class="container-fluid">
         <div class="row">
            <div class="col">
               <div class="breadcrumb-title">
                  <h2>{{trans('labels.find_professional')}}</h2>
               </div>
            </div>
            <div class="col-auto float-right ml-auto breadcrumb-menu">
               <nav aria-label="breadcrumb" class="page-breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.home')}}</a></li>
                     <li class="breadcrumb-item active" aria-current="page">{{trans('labels.search')}}</li>
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
                     <h4 class="card-title mb-4">{{trans('labels.search_filter')}}</h4>

                     <form id="search_form" action="{{ URL::to('/home/search') }}" method="GET">
                        @csrf
                        <div class="filter-widget">
                           <div class="filter-list">
                              <h4 class="filter-title">{{trans('labels.search_by')}}</h4>
                              <select class="form-control selectbox select" name="search_by" id="search_by" data-next-page="{{URL::to('/home/search')}}">
                                 <option value="service" @isset($filterservice) selected @endisset>{{trans('labels.service')}} </option>
                                 <option value="provider" @isset($providerdata) selected @endisset>{{trans('labels.provider')}} </option>
                              </select>
                              @error('search_by')<small class="text-danger" id="search_by_error"> {{ $message }}</small>@enderror
                           </div>
                           <div class="filter-list">
                              <h4 class="filter-title">{{trans('labels.keyword')}}</h4>
                              <input type="text" class="form-control" id="search_name" name="search_name" @isset($_GET['search_name']) value="{{$_GET['search_name']}}" @endisset placeholder="{{trans('labels.enter_keyword')}}">
                           </div>
                           <div class="filter-list">
                              <h4 class="filter-title">{{trans('labels.sort_by')}}</h4>
                              <select class="form-control selectbox select" name="sort_by" id="sort_by">
                                 <option value="newest"
                                    @isset($_GET['sort_by']) @if($_GET['sort_by'] == "newest") selected @endif @endisset>{{trans('labels.newest')}}</option>
                                 
                                 <option id="low_to_high" value="low_to_high" class="@isset($providerdata) dn @endisset" 
                                    @isset($_GET['sort_by']) @if($_GET['sort_by'] == "low_to_high") selected @endif @endisset>{{trans('labels.low_to_high')}}</option>
                                 
                                 <option id="high_to_low" value="high_to_low" class="@isset($providerdata) dn @endisset" 
                                    @isset($_GET['sort_by']) @if($_GET['sort_by'] == "oldest") selected @endif @endisset>{{trans('labels.high_to_low')}}</option>
                                 
                                 <option value="oldest"
                                    @isset($_GET['sort_by']) @if($_GET['sort_by'] == "oldest") selected @endif @endisset>{{trans('labels.oldest')}}</option>
                              </select>
                           </div>
                           <div class="filter-list @isset($providerdata) dn @endisset " id="category_id">
                              <h4 class="filter-title">{{trans('labels.category')}}</h4>
                              <select class="form-control form-control selectbox select" name="category" id="category" data-show-subtext="true" data-live-search="true">
                                 <option value="" selected disabled>{{trans('labels.select')}}</option>
                                 @foreach($categorydata as $cdata)
                                    <option value="{{$cdata->id}}" @isset($_GET['category']) @if($cdata->id == $_GET['category']) selected @endif @endisset >{{$cdata->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <input class="btn btn-primary pl-5 pr-5 btn-block get_services" type="submit" value="{{trans('labels.search')}}" >
                     </form>

                  </div>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="row align-items-center mb-4">
                  <div class="col-md-6 col">
                     <h4>
                        @isset($providerdata)
                           {{trans('labels.provider')}}
                        @endisset
                        @isset($servicedata)
                           {{trans('labels.service')}}
                        @endisset
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

                     @isset($providerdata)
                     
                        @foreach($providerdata as $fpdata)
                           <div class="col-lg-3 col-md-6">
                              <div class="service-widget">
                                 <div class="service-img">
                                    <a href="{{URL::to('/home/providers-services/'.$fpdata->slug)}}">
                                       <img class="img-fluid serv-img popular-services-img" alt="provider Image" src="{{ Helper::image_path($fpdata->provider_image) }}">
                                    </a>
                                    <div class="item-info">
                                       <div class="service-user">
                                          <span class="service-price">{{$fpdata->provider_name}}</span>
                                       </div>
                                       <div class="cate-list">
                                          <a class="bg-yellow">{{$fpdata->provider_type}}</a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="service-content">
                                    <span>{{Str::limit(strip_tags($fpdata->about),50)}}</span>
                                    <div class="rating">
                                       <i class="fas fa-star filled"></i>
                                       <span class="d-inline-block average-rating">{{number_format($fpdata['rattings']->avg('ratting'),1)}}</span>
                                    </div>
                                    <div class="user-info">
                                       <div class="row">
                                          <span class="col-auto ser-contact">
                                             <i class="fas fa-phone-alt mr-1"></i>
                                             <span>{{$fpdata->mobile}}</span>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        @endforeach
                     
                     @endisset
                     
                     @isset($servicedata)
                      
                        @include('front.service_section')
                     
                     @endisset
                  
                  </div>

                  <div class="text-center">
                     <button type="button" class="btn btn-outline-dark m-1 ajax-load" onclick="next_page()">{{trans('labels.load_more')}}</button>
                     <p class="text-muted dn no-record">{{trans('labels.no_data')}}</p>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>﻿

@endsection
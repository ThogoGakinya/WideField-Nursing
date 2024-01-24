@extends('front.layout.home_main')
@section('page_title',trans('labels.about_us'))
@section('content')
      <div class="breadcrumb-bar">
         <div class="container">
            <div class="row">
               <div class="col">
                  <div class="breadcrumb-title">
                     <h2>{{trans('labels.about_us')}}</h2>
                  </div>
               </div>
               <div class="col-auto float-right ml-auto breadcrumb-menu">
                  <nav aria-label="breadcrumb" class="page-breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{trans('labels.about_us')}}</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <section class="about-us">
         <div class="content">
            <div class="container">
               @if(!empty($aboutdata))
               <div class="row">
                  <div class="col-6">
                     <div class="about-blk-content">
                        <p >We match healthcare workers with open shifts at the best facilities. 
                        <br>When you’re a nurse, you know that every day you will touch a life or a life will touch yours</p>
                           <!-- {!! nl2br(e($aboutdata->about_content)) !!} -->
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="about-blk-image">
                        <img src="{{ Helper::image_path(Helper::appdata()->banner) }}" class="img-fluid" alt="{{trans('labels.aboutus_image')}}">
                     </div>
                  </div>
               </div>
               @else
                  <p class="text-center">{{trans('labels.no_data')}}</p>
               @endif
            </div>
         </div>
      </section>
      
      @include('front.how_work')
      
@endsection

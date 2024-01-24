@extends('front.layout.home_main')
@section('page_title',trans('labels.home'))
@section('content')


   <section class="hero-section">
      <div class="layer">
         <div class="home-banner" style="background-image:url('{{Helper::image_path(Helper::appdata()->banner)}}')"></div>
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-12">
                  <div class="section-search">
                     <h3>{{trans('labels.banner_main_title')}}</h3>
                     <p>{{trans('labels.banner_sub_title')}}</p>
                     <div class="search-box">
                        <div class="search-input w-100">
                           <i class="fas fa-search bficon"></i>
                           <div class="form-group mb-0">
                              <input type="text" class="form-control" name="search_box" id="search_box" placeholder="{{trans('labels.looking_for_service')}}" ">   <!--url="{{URL::to('/home/find-service')}} -->
                              <div class="item-list" id="suggestion" ></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
  
   @include('front.how_work')
@endsection
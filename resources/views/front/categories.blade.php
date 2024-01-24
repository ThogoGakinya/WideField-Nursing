@extends('front.layout.main')
@section('page_title',trans('labels.categories'))
@section('content')
      <div class="breadcrumb-bar">
         <div class="container">
            <div class="row">       
               <div class="col">
                  <div class="breadcrumb-title">
                     <h2>{{trans('labels.categories')}}</h2>
                  </div>
               </div>
               <div class="col-auto float-right ml-auto breadcrumb-menu">
                  <nav aria-label="breadcrumb" class="page-breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{trans('labels.categories')}}</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <div class="content">
         @include('front.category_section')
      </div>

@endsection
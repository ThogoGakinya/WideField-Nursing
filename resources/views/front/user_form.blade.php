@extends('front.layout.main')

@section('page_title',trans('labels.become_user'))

@section('content')

      <div class="breadcrumb-bar">
         <div class="container">
            <div class="row">
               <div class="col">
                 <div class="breadcrumb-title">
                     <h2>{{ trans('labels.become_user') }}</h2>
                 </div>
               </div>
               <div class="col-auto float-right ml-auto breadcrumb-menu">
                  <nav aria-label="breadcrumb" class="page-breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('labels.register') }}</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>

      <section class="contact-us">
         <div class="content">
            <div class="container">
               <div class="row justify-content-md-center">
                  <div class="col-10">
                     <div class="contact-queries">
                        <h4 class="mb-4">{{ trans('labels.register') }}</h4>
                           <form action="{{ URL::to('home/store-user') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-xl-6">
                                       <label class="mr-sm-2">{{ trans('labels.fullname') }}</label>
                                       <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="{{trans('labels.enter_full_name')}}" @if(Session::get('default_name')) value="{{Session::get('default_name')}}" @else value="{{old('name')}}" @endif>
                                       @error('name')<span class="text-danger ">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                       <label class="mr-sm-2">{{ trans('labels.mobile') }}</label>
                                       <input class="form-control @error('mobile') is-invalid @enderror" type="text" name="mobile" value="{{old('mobile')}}" placeholder="{{trans('labels.enter_mobile')}}">
                                       @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                       <label class="mr-sm-2">{{trans('labels.email')}}</label>
                                       <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="{{trans('labels.enter_email')}}" @if(Session::get('default_email')) value="{{Session::get('default_email')}}" readonly @else value="{{old('email')}}" @endif>
                                       @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group col-xl-6 @if(Session::get('google_id') || Session::get('facebook_id')) dn @endif ">
                                       <label class="mr-sm-2">{{ trans('labels.password') }}</label>
                                       <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" value="{{old('password')}}" placeholder="{{trans('labels.enter_password')}}">
                                       @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                       <label class="mr-sm-2">{{trans('labels.profile')}}</label>
                                       <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" value="{{old('image')}}">
                                       @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                       <label class="mr-sm-2">{{ trans('labels.referral_code') }} </label>
                                       <input class="form-control" type="text" name="referral_code" value="{{old('referral_code')}}" placeholder="{{trans('labels.enter_referral_code')}}">
                                    </div>
                                    <div class="form-group col-xl-6">
                                       <label class="mr-sm-2">{{trans('labels.address')}}</label>
                                       <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" placeholder="{{trans('labels.enter_address')}}" value="{{old('address')}}">
                                       @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-xl-12 mt-4">
                                       <button class="btn btn-primary btn-lg pl-5 pr-5" type="submit"> <i class="fa fa-paper-plane"></i> {{ trans('labels.register') }} </button>
                                    </div>
                                </div>
                           </form>
                           <p class=" mt-2">{{trans('labels.already_account')}} <a href="{{URL::to('/home/login')}}">{{trans('labels.login')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('front.layout.home_main')

@section('page_title',trans('labels.login'))

@section('content')

      <section class="contact-us">
         <div class="content">
            <div class="container">
               <div class="row justify-content-md-center">
                  <div class="col-lg-6 col-md-12 col-sm-12">
                     <div class="contact-queries">
                        <div class="login-header">
                           <h3>{{trans('labels.login')}}</h3>
                        </div>

                        @if ($message = Session::get('AuthError'))
                           <span class="text-center text-danger">{{ $message }}</span>
                        @endif

                        <form action="{{ URL::to('/home/checklogin') }}" method="POST">
                           @csrf
                           <div class="form-group form-focus">
                              <label class="focus-label">{{trans('labels.email')}} </label>
                              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{trans('labels.enter_email')}}">
                              @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                           </div>
                           <div class="form-group form-focus">
                              <label class="focus-label">{{ trans('labels.password') }} </label>
                              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{trans('labels.enter_password')}}">
                              @error('password')<span class="text-danger"> {{ $message }}</span>@enderror
                           </div>
                           <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">{{ trans('labels.login') }}</button>
                        </form>
                        <div class="row form-row social-login mt-2">
                           <div class="col-6">
                              <a href="{{URL::to('/home/register-user')}}" class="btn btn-light btn-block">
                                 <i class="fa fa-user mr-1"></i>{{ trans('labels.register') }}
                              </a>
                           </div>
                           <div class="col-6">
                              <a href="{{URL::to('/home/forgot-password')}}" class="btn btn-light btn-block">{{trans('labels.forgot_password')}} ?</a>
                           </div>
                        </div>
                        
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection

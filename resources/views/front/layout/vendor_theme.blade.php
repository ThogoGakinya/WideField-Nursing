
@extends('front.layout.main')

@section('content')

      <div class="content">
         <div class="container">
            <div class="row">

               @include('front.layout.vendor_menu')

               @yield('front_content')

            </div>
         </div>
      </div>
         
@endsection
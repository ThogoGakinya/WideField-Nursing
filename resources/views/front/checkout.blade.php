
@extends('front.layout.main')
@section('page_title')
    {{ trans('labels.booking') }} | {{ trans('labels.checkout') }}
@endsection
<script type="text/javascript">
  function preventBack() { "use strict"; window.history.forward(); }  
  setTimeout("preventBack()", 0);
  window.onunload = function () { null };
</script>
@section('content')
	<div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-title">
                        <h2>{{ trans('labels.checkout') }}</h2>
                    </div>
                </div>
                <div class="col-auto float-right ml-auto breadcrumb-menu">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.home')}}</a></li>
                           <li class="breadcrumb-item active" aria-current="page">{{ trans('labels.service') }}</li>
                           <li class="breadcrumb-item active" aria-current="page">{{ trans('labels.continue') }}</li>
                           <li class="breadcrumb-item " aria-current="page">{{ trans('labels.checkout') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    	<div class="content">
    		<div class="container">
    			<div class="row">
        				<div class="col-lg-8 col-md-12">
        				

        					<div class="service-book mt-2">
                                <button class="btn btn-light border-dark" onclick="proceed_payment()">Confirm and Complete</button>
                            </div>

        				</div>
        				<div class="col-12 col-md-12 col-lg-4">
   

        							<input type="hidden" name="price" id="price" value="{{Storage::disk('local')->get('price')}}">
        							<input type="hidden" name="total_price" id="total_price" value="{{Storage::disk('local')->get('total_price')}}">
        							<input type="hidden" name="discount" id="discount" value="{{Storage::disk('local')->get('total_discount')}}">
        							<input type="hidden" name="service" id="service" value="{{Storage::disk('local')->get('service')}}">
        							<input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">

        							<input type="hidden" name="select_ptype" id="select_ptype" value="{{trans('messages.select_payment_type')}}">
        							<input type="hidden" name="date_time_err_text" id="date_time_err_text" value="{{trans('messages.select_date_time')}}">
        							<input type="hidden" name="address_err_text" id="address_err_text" value="{{trans('messages.select_address')}}">
    								<input type="hidden" name="title" id="title" value="{{trans('labels.app_name')}}">
    								<input type="hidden" name="description" id="description" value="{{trans('labels.add_wallet_description')}}">
    								<input type="hidden" name="logo" id="logo" value="https://stripe.com/img/documentation/checkout/marketplace.png">
    								<input type="hidden" name="booking_url" id="booking_url" value="{{ URL::to('/home/service/book') }}">
    								<input type="hidden" name="success_url" id="success_url" value="{{route('booking_success')}}">

    			</div>
    			<!--<div class= "alert alert-success alert-dismissible">-->
       <!--             <button type ="button" class="close" data-dismiss = "alert" aria-hidden = "true" >×</button>-->
       <!--                 <h5><i class= "icon fas fa-check"></i > Complete! </h5>-->
       <!--                     Application sent successfully.-->
       <!--         </div>-->
    		</div>
    	</div>

@endsection

@section('scripts')

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://checkout.stripe.com/v2/checkout.js"></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script> 
@endsection
@extends('layout.main')
@section('page_title',trans('labels.add_provider'))
@section('content')
	<section id="basic-form-layouts">
		<div class="row">
			<div class="col-md-12">
	        	<div class="card">
	            <div class="card-header">
						<h4 class="card-title" id="horz-layout-colored-controls">{{ trans('labels.add_provider') }}</h4>
	            </div>
	            <div class="card-body">
	               <div class="px-3">
					    	<form class="form form-horizontal" id="add_provider_form" action="{{URL::to('providers/store')}}" method="POST" enctype="multipart/form-data">
								@csrf
	                    	<div class="form-body">
	                    		<div class="row">
	                    			<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="name">{{ trans('labels.name') }} </label>
												<div class="col-md-9">
													<input type="text" id="add_provider_name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" placeholder="{{trans('labels.enter_full_name')}}">
													@error('name')<span class="text-danger" id="name_error">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="image">{{ trans('labels.profile') }}</label>
												<div class="col-md-9">
													<input type="file" id="add_provider_image" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image')}}">
													@error('image')<span class="text-danger" id="image_error">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
		                     </div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="email">{{ trans('labels.email') }} </label>
												<div class="col-md-9">
													<input type="email" id="add_provider_email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}" placeholder="{{trans('labels.enter_email')}}">
													@error('email')<span class="text-danger" id="email_error">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="password">{{ trans('labels.password') }} </label>
												<div class="col-md-9">
													<input type="password" id="add_provider_password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password')}}" placeholder="{{trans('labels.enter_password')}}">
													@error('password')<span class="text-danger" id="password_error">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
									</div>
	                    		<div class="row">
	                    			<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="provider_type">{{ trans('labels.provider_type') }}</label>
												<div class="col-md-9">
													<select id="add_provider_providertype" name="provider_type" class="form-control @error('provider_type') is-invalid @enderror" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="provider_type">
														<option value="" selected disabled>Select</option>
														@foreach ($providertypedata as $pt)
															<option value="{{$pt->id}}">{{$pt->name}}</option>
														@endforeach
													</select>
													@error('provider_type')<span class="text-danger" id="provider_type_error">{{ $message }}</span>@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="mobile">{{ trans('labels.mobile') }}</label>
												<div class="col-md-9">
													<input type="text" id="add_provider_mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" placeholder="{{ trans('labels.enter_mobile') }}">
													@error('mobile')<span class="text-danger" id="mobileError">{{ $message }}</span>@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="about">{{ trans('labels.about') }}</label>
												<div class="col-md-9">
													<textarea id="add_provider_about" rows="2" class="form-control col-md-12 @error('about') is-invalid @enderror" name="about" placeholder="{{ trans('labels.enter_about_provider') }}"></textarea>
													@error('about')<span class="text-danger" id="about_error">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="address">{{ trans('labels.address') }}</label>
												<div class="col-md-9">
													<textarea id="add_provider_address" rows="2" class="form-control col-md-12 @error('address') is-invalid @enderror" name="address" placeholder="{{ trans('labels.enter_address') }}"></textarea>
													@error('address')<span class="text-danger" id="about_error">{{ $message }}</span>@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="city">{{ trans('labels.city') }}</label>
												<div class="col-md-9">
													<select id="add_provider_city" name="city_id" class="form-control @error('city_id') is-invalid @enderror" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="City">
														<option value="" selected disabled>{{trans('labels.select')}}</option>
														@foreach ($citydata as $cd)
															<option value="{{$cd->id}}">{{$cd->name}}</option>
														@endforeach
													</select>
													@error('city_id')<span class="text-danger" id="cityError">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
		                     </div>
								</div>
	                        <div class="form-actions left">
										<a class="btn btn-raised btn-danger mr-1" href="{{URL::to('providers')}}"> <i class="fa fa-arrow-left"></i> {{ trans('labels.back') }} </a>
										@if (env('Environment') == 'sendbox')
	                              <button type="button" class="btn btn-raised btn-primary" onclick="myFunction()"><i class="fa fa-paper-plane"></i> {{ trans('labels.add') }} </button>
	                           @else
											<button type="submit" id="btn_add_provider" class="btn btn-raised btn-primary"> <i class="fa fa-paper-plane"></i> {{ trans('labels.add') }} </button>
										@endif
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
   @endsection

@section('scripts')
	<script src="{{ asset('resources/views/provider/provider.js') }}" type="text/javascript"></script>
@endsection
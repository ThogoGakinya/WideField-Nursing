@extends('layout.main')
@section('page_title',trans('labels.edit_provider'))
@section('content')
	<section id="basic-form-layouts">
		<div class="row">
			<div class="col-md-12">
	        	<div class="card">
	            <div class="card-header">
						<h4 class="card-title" id="horz-layout-colored-controls">{{ trans('labels.edit_provider') }}</h4>
	            </div>
	            <div class="card-body">
	               <div class="px-3">
					    	<form class="form form-horizontal" id="edit_provider_form" action="{{URL::to('/providers/edit/'.$providerdata->slug)}}" method="POST" enctype="multipart/form-data">
								@csrf
	                    	<div class="form-body">
	                    		<div class="row">
	                    			<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="name">{{ trans('labels.name') }} </label>
												<div class="col-md-9">
													<input type="text" id="edit_provider_name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$providerdata->name}}" placeholder="{{ trans('labels.enter_full_name') }}">
													@error('name')<span class="text-danger" id="name_error">{{ $message }}</span>@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="email">{{ trans('labels.email') }} </label>
												<div class="col-md-9">
													<input type="email" id="edit_provider_email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$providerdata->email}}" placeholder="{{trans('labels.enter_email')}}">
													@error('email')<span class="text-danger" id="emailError">{{ $message }}</span>@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="mobile">{{ trans('labels.mobile') }}</label>
												<div class="col-md-9">
													<input type="text" id="edit_provider_mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$providerdata->mobile}}" placeholder="{{trans('labels.enter_mobile')}}">
													@error('mobile')<span class="text-danger" id="mobile_error">{{ $message }}</span>@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="provider_type">{{ trans('labels.provider_type') }}</label>
												<div class="col-md-9">
													<select id="edit_provider_provider_type" name="provider_type" class="form-control @error('provider_type') is-invalid @enderror" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="{{trans('labels.provider_type')}}">
														<option value="{{$providerdata['providertype']->id}}" selected>{{$providerdata['providertype']->name}}</option>
														@foreach ($providertypedata as $pt)
															<option value="{{$pt->id}}">{{$pt->name}}</option>
														@endforeach
													</select>
													@error('provider_type')<span class="text-danger" id="provider_type_error">{{ $message }}</span>@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="new_image">{{ trans('labels.select_new') }}</label>
												<div class="col-md-9">
													<input type="file" id="edit_provider_image" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*">
													@error('image')<span class="text-danger" id="image_error">{{ $message }}</span>@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="image"> {{ trans('labels.profile') }}</label>
												<div class="col-md-9">
                                       <img src="{{Helper::image_path($providerdata->image)}}" alt="{{trans('labels.provider')}}" class="rounded edit-image">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="about">{{ trans('labels.about') }} </label>
												<div class="col-md-9">
													<textarea id="edit_provider_about" rows="3" class="form-control col-md-12 @error('about') is-invalid @enderror" name="about" placeholder="{{trans('labels.enter_about_provider')}}">{{strip_tags($providerdata->about)}}</textarea>
													@error('about')<span class="text-danger" id="about_error">{{ $message }}</span>@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="address">{{ trans('labels.address') }} </label>
												<div class="col-md-9">
													<textarea id="edit_provider_address" rows="3" class="form-control col-md-12 @error('address') is-invalid @enderror" name="address" placeholder="{{trans('labels.enter_address')}}">{{strip_tags($providerdata->address)}}</textarea>
													@error('address')<span class="text-danger" id="address_error">{{ $message }}</span>@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="userinput4">{{ trans('labels.city') }} </label>
												<div class="col-md-9">
													<select id="edit_provider_city_id" name="city_id" class="form-control @error('city_id') is-invalid @enderror" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="City">
														<option value="{{$providerdata['city']->id}}" selected>{{$providerdata['city']->name}}</option>
														@foreach ($citydata as $cd)
															<option value="{{$cd->id}}">{{$cd->name}}</option>
														@endforeach 
													</select>
													@error('city_id')<span class="text-danger" id="cityError">{{ $message }}</span>@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="is_available">{{ trans('labels.status') }}</label>
												<div class="col-md-9">
                                       <div class="form-check form-switch">
                                          <input class="form-check-input " type="checkbox" id="is_available" name="is_available" value="is_available" @if($providerdata->is_available == 1) checked="true" @endif>
                                          <label class="form-check-label " for="is_available">{{ trans('labels.active') }}</label>
                                       </div>
												</div>
											</div>
										</div>
		                     </div>
								</div>
	                        <div class="form-actions left">
										<a class="btn btn-raised btn-danger mr-1" href="{{URL::to('providers')}}"> <i class="fa fa-arrow-left"></i> {{ trans('labels.back') }} </a>
										@if (env('Environment') == 'sendbox')
	                              <button type="button" class="btn btn-raised btn-primary" onclick="myFunction()"><i class="ft-edit"></i> {{ trans('labels.update') }} </button>
	                           @else
											<button type="submit" id="btnAddProvider" class="btn btn-raised btn-primary"> <i class="ft-edit"></i> {{ trans('labels.update') }} </button>
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
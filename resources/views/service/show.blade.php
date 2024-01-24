@extends('layout.main')
@section('page_title',trans('labels.edit_service'))
@section('content')
	<section id="basic-form-layouts">
		<div class="row">
			<div class="col-md-12">
	        	<div class="card">
	            <div class="card-header">
						<h4 class="card-title" id="horz-layout-colored-controls">{{trans('labels.edit_service')}}</h4>
	            </div>
	            <div class="card-body">
	               <div class="px-3">
					    	<form class="form form-horizontal" id="edit_service_form" action="{{URL::to('services/edit/'.$servicedata->slug)}}" method="POST" enctype="multipart/form-data">
								@csrf
	                    	<div class="form-body">
	                    		<div class="row">
	                    			<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="name">{{trans('labels.service_name')}} </label>
												<div class="col-md-9">
													<input type="text" id="edit_service_name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $servicedata->name}}" placeholder="{{trans('labels.enter_service')}}">
													@error('name')<span class="text-danger" id="nameError">{{ $message }}</span>@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 label-control" for="category_id"> {{trans('labels.category')}}</label>
												<div class="col-md-9">
													<select id="edit_service_category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="category_id">
														<option value="{{$servicedata['categoryname']->id}}" selected >{{$servicedata['categoryname']->name}}</option>
														@foreach ($categorydata as $cd)
															<option value="{{$cd->id}}">{{$cd->name}}</option>
														@endforeach
													</select>
													@error('category_id')<span class="text-danger" id="category_idError">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
                              <div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="image">{{trans('labels.image')}}</label>
												<div class="col-md-9">
													<input type="file" id="edit_service_image" class="form-control mb-1 @error('image') is-invalid @enderror" name="image" >
													@error('image')<span class="text-danger" id="image_error">{{ $message }}</span>@enderror
													<img src="{{Helper::image_path($servicedata->image)}}" alt="{{trans('labels.service')}}" class="rounded edit-image">
												</div>
											</div>
										</div>
		                     </div>
	                    		<div class="row">
                              <div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="price">{{trans('labels.price')}}</label>
												<div class="col-md-9 ">
                                       <input type="text" id="service_price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $servicedata->price}}" placeholder="{{trans('labels.enter_price')}}">
													@error('price')<span class="text-danger" id="priceError">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="discount">{{trans('labels.discount')}}</label>
												<div class="col-md-9 ">
                                       <input type="text" id="service_discount" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ $servicedata->discount}}" placeholder="{{trans('labels.enter_discount')}}">
													@error('discount')<span class="text-danger" id="discountError">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
		                     </div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="featured">{{trans('labels.featured')}}</label>
												<div class="col-md-9">
	                                    <div class="form-check form-switch">
	                                       <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="is_featured" @if($servicedata->is_featured == 1) checked="checked" @endif>
	                                       <label class="form-check-label" for="is_featured">{{trans('labels.set_as_featured')}}</label>
	                                    </div>
													@error('is_featured')<span class="text-danger" id="is_featured_error">{{ $message }}</span>@enderror
												</div>
                                    <label class="col-md-3 label-control" for="is_available">{{trans('labels.status')}} </label>
												<div class="col-md-9">
                                       <div class="form-check form-switch">
                                          <input class="form-check-input" type="checkbox" id="is_available" name="is_available" value="is_available" @if($servicedata->is_available == 1) checked="checked" @endif>
                                          <label class="form-check-label" for="is_available">{{trans('labels.active')}}</label>
                                       </div>
													@error('is_available')<span class="text-danger" id="is_available_error">{{ $message }}</span>@enderror
												</div>
												<label class="col-md-3 label-control" for="price_type">{{trans('labels.price_type')}}</label>
												<div class="col-md-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="price_type" id="fixed" onChange="getduration(this)" value="Fixed" @if($servicedata->price_type == "Fixed") checked @endif>
														<label class="form-check-label" for="fixed">{{trans('labels.fixed')}}</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="price_type" id="hourly" onChange="getduration(this)" value="Hourly" @if($servicedata->price_type == "Hourly") checked @endif>
														<label class="form-check-label" for="hourly">{{trans('labels.hourly')}}</label>
													</div>

                                       @error('price_type')<span class="text-danger" id="price_type_error">{{ $message }}</span>@enderror
												</div>
											</div>
											<div class="form-group row @if($servicedata->price_type == 'Hourly') dn @endif" id="duration_type" >
												<label class="col-md-3 label-control" for="duration_type">{{trans('labels.type')}}</label>
												<div class="col-md-9 ">
													<select class="form-control selectbox select" name="duration_type" >
														<option @if($servicedata->duration_type == "1") selected @endif value="1"> {{trans('labels.minutes')}} </option>
														<option @if($servicedata->duration_type == "2") selected @endif value="2"> {{trans('labels.hours')}} </option>
														<option @if($servicedata->duration_type == "3") selected @endif value="3"> {{trans('labels.days')}} </option>
													</select>
												</div>
											</div>
											<div class="form-group row @if($servicedata->price_type == 'Hourly') dn @endif" id="duration">
												<label class="col-md-3 label-control" for="duration">{{trans('labels.duration')}}</label>
												<div class="col-md-9 ">
                                       <input type="text" id="service_duration" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{$servicedata->duration}}" placeholder="{{trans('labels.enter_duration')}}">
													@error('duration')<span class="text-danger" id="durationError">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="description">{{trans('labels.description')}} </label>
												<div class="col-md-9">
													<textarea id="edit_service_description" rows="3" class="form-control col-md-12 @error('description') is-invalid @enderror" name="description" placeholder="{{trans('labels.service_description')}}">{{strip_tags($servicedata->description)}}</textarea>
													@error('description')<span class="text-danger" id="description_error">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-actions left">
									<a class="btn btn-raised btn-danger mr-1" href="{{URL::to('services')}}"> <i class="fa fa-arrow-left"></i> {{trans('labels.back')}} </a>
									@if (env('Environment') == 'sendbox')
		                     	<button type="button" onclick="myFunction()" class="btn btn-raised btn-primary"> <i class="ft-edit"></i> {{trans('labels.update')}} </button>
		                   	@else
										<button type="submit" id="btn_edit_service" class="btn btn-raised btn-primary"> <i class="ft-edit"></i> {{trans('labels.update')}} </button>
									@endif
								</div>
	                  </form>
							<div class="form-group">
								<label><a class="btn btn-info btn-xs float-right add_gallery_image" data-id="{{$servicedata->id}}" data-toggle="modal" data-target="#add_gallery_image"><i class="fa fa-plus"></i> {{trans('labels.add_gallery_image')}}</a></label>
								@if(count($gimages) > 0)
									<div class="row">
										@foreach ($gimages as $si)
											<div class="text-center p-2">
												<img src='{{Helper::image_path($si->image)}}' id="edit_gallery_image" alt="{{trans('labels.gallery')}}" height="200" width="200" class="rounded">
												<div class="col-sm-0 p-1 text-center">
													<div class="btn-group" role="group" aria-label="Basic example">

														@if (env('Environment') == 'sendbox')
															<a class="btn btn-danger" onclick="myFunction()"><i class="ft-trash"></i></a>
							                   	@else
															<a class="btn btn-danger" onclick="deletegallery('{{$si->id}}','{{ trans('messages.are_you_sure') }}','{{ trans('messages.yes') }}','{{ trans('messages.no') }}','{{ URL::to('/del/gallery') }}','{{ trans('messages.wrong') }}','{{ trans('messages.record_safe') }}')"><i class="ft-trash"></i></a>
														@endif
														<a class="btn btn-info edit_service_gallery" data-id="{{$si->id}}" data-userid="{{$si->image}}" data-image-url="{{Helper::image_path($si->image)}}" data-toggle="modal" data-target="#edit_service_gallery"><i class="ft-edit"></i></a>
													</div>
												</div>
											</div>
										@endforeach
									</div>
								@else
									<span class="text-muted text-center">{{trans('labels.gallery_not_found')}}</span>
								@endif
							</div>
	               </div>
	            </div>
	        	</div>
	    	</div>
		</div>
	</section>
@endsection
@section('scripts')
<script src="{{ asset('resources/views/service/service.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	// Edit gallery Image modal
   $(document).on('click','.edit_service_gallery',function(){
      var imageid = $(this).attr('data-id');
      $('#gimage_id').val(imageid); 
      var imagename = $(this).attr('data-userid');
      var imageurl = $(this).attr('data-image-url');
      document.getElementById("oldGalleryImg").src = imageurl;
   });
</script>
@endsection

@extends('layout.main')
@section('page_title',trans('labels.add_service'))
@section('content')
	<section id="basic-form-layouts">
		<div class="row">
			<div class="col-md-12">
  			<div class="card">
      		<div class="card-header">
						<h4 class="card-title" id="horz-layout-colored-controls">{{ trans('labels.add_service') }}</h4>
      		</div>
      		<div class="card-body">
         		<div class="px-3">
				    	<form class="form form-horizontal" id="add_service_form" action="{{URL::to('services-store')}}" method="POST" enctype="multipart/form-data">
							@csrf
              	<div class="form-body">

              		        <div class="row">
              			                <div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="name">{{trans('labels.service')}}</label>
												<div class="col-md-9">
													<input type="text" id="add_service_name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" placeholder="{{trans('labels.enter_service')}}">
													@error('name')<span class="text-danger" id="name_error">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="category_id"> {{trans('labels.category')}} </label>
												<div class="col-md-9">
													<select id="add_service_category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="category_id">
														<option value="" selected disabled>{{trans('labels.select')}}</option>
														@foreach ($categorydata as $cd)
															<option value="{{$cd->id}}">{{$cd->name}}</option>
														@endforeach
													</select>
													@error('category_id')<span class="text-danger" id="category_id_error">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
                        	</div>
							<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="image">{{trans('labels.image')}}</label>
												<div class="col-md-9">
													<input type="file" class="form-control @error('image') is-invalid @enderror" id="service_image" name="image" accept=".jpg,.jpeg,.png" value="{{ old('image')}}">
													@error('image')<span class="text-danger" id="image_error">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="gallery_image">{{trans('labels.gallery')}}</label>
												<div class="col-md-9">
													<input type="file" id="add_service_gallery_image" class="form-control @if($errors->has('gallery_image.*')) is-invalid @endif" name="gallery_image[]" accept="image/*" multiple>
													@error('gallery_image')<span class="text-danger" id="gallery_image_error">{{ $message }}</span>@enderror		
													@if ($errors->has('gallery_image.*'))
														<span class="text-danger">{{ $errors->first('gallery_image.*') }}</span>
													@endif
												</div>
											</div>
										</div>
							</div>
	                        <div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="price">{{trans('labels.price')}}</label>
												<div class="col-md-9 ">
													<input type="text" id="service_price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price')}}" placeholder="{{trans('labels.enter_price')}}">
													@error('price')<span class="text-danger" id="priceError">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="discount">FEATURED</label>
												<div class="col-md-9 ">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input " type="checkbox" id="is_featured" name="is_featured" value="is_featured">
                                                    <label class="form-check-label " for="is_featured">{{trans('labels.set_as_featured')}}</label>
                                                 	</div>
													@error('is_featured')<span class="text-danger" id="is_featured_error">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
                             </div>
                              <div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="price">START TIME</label>
												<div class="col-md-9 ">
													<input type="datetime-local" id="start" required onchange=diff_hours() class="form-control @error('duration') is-invalid @enderror" name="start_time" value="{{ old('duration')}}" placeholder="Select Start Date">
													@error('duration')<span class="text-danger" id="start">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="discount">END TIME</label>
												<div class="col-md-9 ">
                                                <input type="datetime-local" id="end" onchange=diff_hours() class="form-control @error('duration') is-invalid @enderror" name="end_time" value="{{ old('duration')}}" placeholder="Select End Date" required>
													@error('duration')<span class="text-danger" id="endr">{{ $message }}</span>@enderror
											</div>
										</div>
                             </div>
                             </div>
                             <div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="description">Duration </label>
												<div class="col-md-9 ">
													<input type="text" id="diff" class="form-control @error('duration') is-invalid @enderror" name="duration"  placeholder="Hours" readonly>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-md-3 label-control" for="description">Description </label>
												<div class="col-md-9 ">
                                                    <textarea id="add_service_description" rows="2" class="form-control col-md-12 @error('description') is-invalid @enderror" name="description" placeholder="{{trans('labels.service_description')}}">{{old('description')}}</textarea>
													@error('description')<span class="text-danger" id="descriptionError">{{ $message }}</span>@enderror
												</div>
											</div>
										</div>
							</div>
          <!--                   <div class="row">-->
										<!--<div class="col-md-12">-->
										<!--	<div class="form-group row" align="right">-->
										<!--		<div class="col-md-12">-->
										<!--			<textarea id="add_service_description" rows="2" class="form-control col-md-12 @error('description') is-invalid @enderror" name="description" placeholder="{{trans('labels.service_description')}}">{{old('description')}}</textarea>-->
										<!--			@error('description')<span class="text-danger" id="descriptionError">{{ $message }}</span>@enderror-->
										<!--		</div>-->
										<!--	</div>-->
										<!--</div>-->
          <!--                   </div>-->

								<div class="form-actions left">
										<a class="btn btn-raised btn-danger mr-1" href="{{URL::to('services')}}"> <i class="fa fa-arrow-left"></i> {{ trans('labels.back')}} </a>
										@if (env('Environment') == 'sendbox')
                     	<button type="button" onclick="myFunction()" class="btn btn-raised btn-primary"> <i class="fa fa-paper-plane"></i> {{trans('labels.add')}} </button>
                   	@else
											<button type="submit" id="btn_add_service" class="btn btn-raised btn-primary"> <i class="fa fa-paper-plane"></i> {{trans('labels.add')}} </button>
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
  <script src="{{ asset('resources/views/service/service.js') }}" type="text/javascript"></script>
  <script>
  function diff_hours()
    {
        var start = document.getElementById("start").value;
        var end = document.getElementById("end").value;
        var diff = Math.abs(new Date(end) - new Date(start))/3600000;
        document.getElementById("diff").value = diff;
    }
</script>
@endsection
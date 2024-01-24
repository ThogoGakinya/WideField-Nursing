@extends('front.layout.vendor_theme')
@section('page_title')
   {{trans('labels.user')}} | {{trans('labels.profile_settings')}}
@endsection
@section('front_content')
      <div class="col-xl-9 col-md-8">
         <div class="tab-content pt-0">
            <div class="tab-pane show active" id="user_profile_settings">
               <div class="widget">
                  <h4 class="widget-title">{{trans('labels.profile_settings')}}</h4>
                  @if(!empty($citydata))
                  <form action="{{URL::to('/home/user/profile/edit')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="row">
                        <div class="form-group col-xl-6">
                           <div class="media align-items-center mb-3">
                              <img class="user-image rounded" src="{{Helper::image_path(Auth::user()->image)}}" alt="{{trans('labels.user_image')}}">
                              <div class="media-body">
                                 <h5 class="mb-50">{{Auth::user()->name}}</h5>
                                 <div class="jstinput"> 
                                    <label for="profile_image" class="btn btn-primary">Change Profile</label>
                                    <input type="file" class="form-control" name="image" id="profile_image">
                                 </div>
                                 @error('image')<span class="text-danger"> {{ $message }}</span>@enderror
                              </div>
                           </div>
                        </div>
                        @if(Auth::user()->license != NULL)
                        <div class="form-group col-xl-6">
                           <div class="media align-items-center mb-3">
                              <img class="user-image rounded" data-target="#show_license" data-toggle="modal"  src="{{Helper::image_path(Auth::user()->license)}}" alt="{{trans('labels.user_image')}}">
                              <div class="media-body">
                                 <h5 class="mb-50">Your License</h5>
                                 <div class="jstinput"> 
                                    <label for="license" class="btn btn-primary">Change License</label>
                                    <input type="file" class="form-control" name="license" id="license">
                                 </div>
                                 @error('image')<span class="text-danger"> {{ $message }}</span>@enderror
                              </div>
                           </div>
                        </div>
                        @else
                        <div class="form-group col-xl-6">
                           <label class="mr-sm-2">No License <small><i>Please upload License</a></small></label>
                           <input class="form-control" type="file" name="license">
                           @error('license')<span class="text-danger"> {{ $message }}</span>@enderror
                        </div>
                        @endif
                        <!--<div class="form-group col-xl-6">-->
                        <!--   <label class="mr-sm-2">{{trans('labels.email')}}</label>-->
                        <!--   <input class="form-control" type="email" value="{{Auth::user()->email}}" disabled>-->
                        <!--</div>-->
                     </div>
                     <div class="row">
                        <div class="form-group col-xl-6">
                           <label class="mr-sm-2">{{trans('labels.name')}}</label>
                           <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
                           @error('name')<span class="text-danger"> {{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-xl-6">
                           <label class="mr-sm-2">{{trans('labels.mobile')}}</label>
                           <input class="form-control" type="text" name="mobile" value="{{Auth::user()->mobile}}" disabled>
                           @error('mobile')<span class="text-danger"> {{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-xl-6">
                           <label class="mr-sm-2">{{trans('labels.address')}}</label>
                           <input type="text" class="form-control" name="address" value="{{strip_tags(Auth::user()->address)}}">
                           @error('address')<span class="text-danger"> {{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-xl-6">
                           <label class="mr-sm-2">{{trans('labels.city')}}</label>
                           <select name="city" id="city" class="form-control">
                              @foreach ($citydata as $cdata)
                                 <option value="{{$cdata->id}}" @if (Auth::user()->city_id == $cdata->id) selected @endif>{{$cdata->name}}</option>
                              @endforeach
                           </select>
                           @error('city')<span class="text-danger"> {{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-xl-12">
                           <label class="mr-sm-2">{{trans('labels.about')}}</label>
                           <textarea class="form-control" name="about" id="" cols="30" rows="3">{{strip_tags(Auth::user()->about)}}</textarea>
                           @error('about')<span class="text-danger"> {{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-xl-12">
                           <input type="submit" class="btn btn-primary pl-5 pr-5" value="{{trans('labels.update')}}">
                        </div>
                     </div>
                  </form>
                  @else
                     <p class="text-center">{{trans('labels.no_data')}}</p>
                  @endif
               </div>
            </div>
         </div>
      </div>
      
<!-- start of the modal form to edit a cash request -->
<div class="modal fade" id="show_license">
          <div class="modal-dialog">
            <div class="modal-content">
               <img src="{{Helper::image_path(Auth::user()->license)}}" alt="{{trans('labels.user_image')}}">
               
            </div>   <!-- /.modal-content -->
        </div>
    </div><!-- /.modal-dialog --><!-- end of the modal form to add a cash request-->
@endsection

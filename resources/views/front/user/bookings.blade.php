@extends('front.layout.vendor_theme')
@section('page_title')
   {{trans('labels.user')}} | {{trans('labels.my_bookings')}}
@endsection
@section('front_content')
      <div class="col-xl-9 col-md-8">
         <div class="row align-items-center mb-4">
            <div class="col">
               <h4 class="widget-title mb-0">{{trans('labels.my_bookings')}}</h4>
            </div>
            <div class="col-auto">
               <div class="sort-by">
                  <select class="form-control searchFilter" name="search_by" id="search_by" url="{{URL::to('/home/user/get-bookings-by')}}">
                     <option value="all" selected>{{trans('labels.all')}}</option>
                     <option value="1">{{trans('labels.pending')}}</option>
                     <option value="2">{{trans('labels.inprogress')}}</option>
                     <option value="3">{{trans('labels.completed')}}</option>
                     <option value="4">{{trans('labels.cancelled')}}</option>
                  </select>
               </div>
            </div>
            <div class="input-group col-4 float-right">
               <input type="text" name="search_booking" id="search_booking" class="form-control" placeholder="{{trans('labels.search_booking_by_id')}}" aria-label="Small" aria-describedby="inputGroup-sizing-sm" url="{{URL::to('/home/user/get-bookings')}}"/>
            </div>
         </div>
         <div class="bookings">
            @if(!empty($bookingdata) && count($bookingdata)>0)
               @foreach ($bookingdata as $bdata)
                  <div class="booking-list">
                     <div class="booking-widget">
                        <a href="{{URL::to('/home/user/bookings/'.$bdata->booking_id)}}" class="booking-img text-center">
                           <img src="{{Helper::image_path($bdata->service_image)}}" alt="{{trans('labels.service_image')}}">
                           <span class="badge bg-success-light">Request ID : <strong>{{$bdata->booking_id}}</strong></span>
                        </a>
                        <div class="booking-det-info">
                           <h3>
                              <a href="{{URL::to('/home/user/bookings/'.$bdata->booking_id)}}">{{$bdata->service_name}}</a>
                              @if ($bdata->status == 1)
                                 <span class="badge bg-warning-light">{{trans('labels.pending')}}</span>
                              @elseif ($bdata->status == 2)
                                 <span class="badge bg-info-light">{{trans('labels.accepted')}}</span>
                              @endif
                           </h3>
                           @php
                             $start = strtotime($bdata->service->start_time);
                             $end = strtotime($bdata->service->end_time);
                             $diff = abs($end - $start)/3600;
                            @endphp
                           <ul class="booking-details">
                              <li><span>Start</span> {{$bdata->service->start_time}}</li>
                              <li><span>End</span> {{$bdata->service->end_time}}</li>
                              <li><span>Duration</span> {{$diff}} Hours </li>
                              
                              <li><span>{{trans('labels.amount')}}</span> {{Helper::currency_format($bdata->total_amt)}} </li>
                              <li>
                                 <span>{{trans('labels.provider')}}</span>
                                 <div class="avatar avatar-xs mr-1">
                                    <img class="avatar-img rounded-circle" alt="{{trans('labels.provider_image')}}" src="{{Helper::image_path($bdata->provider_image)}}">
                                 </div>
                                 <a href="{{URL::to('/home/providers-services/'.$bdata->provider_slug)}}" class="text-muted">{{$bdata->provider_name}}</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="booking-action">
                        @if ($bdata->status == 1)
                           <a class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#cancel_application_{{$bdata->booking_id}}"><i class="fas fa-close"></i> {{trans('labels.cancel_booking')}}</a>
                        @elseif ($bdata->status == 2)
                           <h5><span class="badge bg-primary-light"><i class="fas fa-clock"></i> {{trans('labels.inprogress')}} </span></h5>
                        @elseif ($bdata->status == 3)
                           <h5><span class="badge bg-success-light"><i class="fas fa-check"></i> {{trans('labels.completed')}} </span></h5>
                        @elseif ($bdata->status == 4)
                           <h5><span class="badge bg-danger-light"><i class="fas fa-close"></i>
                              @if ($bdata->canceled_by==1)
                                 {{trans('labels.cancel_by_provider')}}
                              @endif
                              @if ($bdata->canceled_by==2)
                                 {{trans('labels.cancel_by_you')}}
                              @endif
                           </span></h5>
                        @endif
                     </div>
                  </div>
                  <div class="modal" tabindex="-1" role="dialog" id="cancel_application_{{$bdata->booking_id}}">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Cancel  Shift</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                               <form action="{{URL::to('/home/user/bookings/cancel')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="booking_id" value="{{$bdata->booking_id}}"/>
                                <p>Are you sure you want to cancel this Shift?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Yes Cancel</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>     
               @endforeach
               <div class="d-flex justify-content-center">
                  {{ $bookingdata->links() }}
               </div>
            @else
            <p class="no-center">{{trans('labels.no_data')}}</p>
            @endif
         </div>
      </div>
@endsection
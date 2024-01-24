   
<div class="catsec">
   <div class="container-fluid">
      @if(!empty($categorydata) && count($categorydata)>0)
         <div class="row match-height">
            @foreach($categorydata as $cdata)
            <div class="col-lg-2 col-md-3 col-sm-2 p-0 m-0">
               <div class="card-deck text-center">
                  <div class="card-body m-0 p-0">
                     <a href="{{ URL::to('/home/services/'.$cdata->slug)}}">
                     <img class="card-img-top img-fluid category-section-img" src="{{ Helper::image_path($cdata->image) }}" alt="{{trans('labels.image')}}">
                     </a>
                  </div>
                  <div class="card-footer text-dark m-auto">
                     <h6>{{$cdata->name}}</h6>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      @else
         <p class="text-center">{{trans('labels.no_data')}}</p>
      @endif
   </div>
</div>
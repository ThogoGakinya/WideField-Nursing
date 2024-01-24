   <table class="table table-striped table-bordered zero-configuration">
      <thead>
         <tr>
            <th>{{trans('labels.srno')}}</th>
            <th>{{trans('labels.image')}}</th>
            <th>{{trans('labels.service_name')}}</th>
            <th>{{trans('labels.category_name')}}</th>
            <th>{{trans('labels.price')}}</th>
            <th>{{trans('labels.duration')}}</th>
            <th>{{trans('labels.status')}}</th>
            <th>Featured</th>
            <th>{{trans('labels.action')}}</th>
         </tr>
      </thead>
      <tbody>
         <?php $i = 1;?>
         @foreach($servicedata as $sdata)
            <tr>    
               <td><?=$i++;?></td> 
               <td><img src="{{Helper::image_path($sdata->image)}}" alt="{{trans('labels.service')}}" class="rounded table-image"></td>
               <td>{{$sdata->name}}</td>
               <td>{{$sdata['categoryname']->name}}</td>
               <td>{{Helper::currency_format($sdata->price)}}</td>
               <td>
                   @php
                        $t1 = strtotime($sdata->end_time);
                        $t2 = strtotime($sdata->start_time);
                        $diff = $t1 - $t2;
                        $hours = $diff / ( 60 * 60 );
                   @endphp
                 {{$hours}} Hours
               </td>
               @if(Auth::user()->type == 2)
                  <td>
                     @if (env('Environment') == 'sendbox')
                        @if($sdata->is_featured == 1)
                           <a class="success p-0" onclick="myFunction()"><i class="ft-check font-medium-3 mr-2"></i></a>
                        @else
                           <a class="danger p-0" onclick="myFunction()"><i class="ft-x font-medium-3 mr-2"></i></a>
                        @endif
                     @else
                        @if($sdata->is_featured == 1)
                           <a class="success p-0" onclick="updateserviceisfeatured('{{$sdata->id}}','2','{{ trans('messages.are_you_sure') }}','{{ trans('messages.yes') }}','{{ trans('messages.no') }}','{{ URL::to('services/edit/is_featured') }}','{{ trans('messages.wrong') }}','{{ trans('messages.record_safe') }}')"><i class="ft-check font-medium-3 mr-2"></i></a>
                        @else
                           <a class="danger p-0" onclick="updateserviceisfeatured('{{$sdata->id}}','1','{{ trans('messages.are_you_sure') }}','{{ trans('messages.yes') }}','{{ trans('messages.no') }}','{{ URL::to('services/edit/is_featured') }}','{{ trans('messages.wrong') }}','{{ trans('messages.record_safe') }}')"><i class="ft-x font-medium-3 mr-2"></i></a>
                        @endif
                     @endif
                  </td>
                  <td>
                     @if (env('Environment') == 'sendbox')
                        @if($sdata->is_available == 1)
                           <a class="success p-0" onclick="myFunction()"><i class="ft-check font-medium-3 mr-2"></i></a>
                        @else
                           <a class="danger p-0" onclick="myFunction()"><i class="ft-x font-medium-3 mr-2"></i></a>
                        @endif
                     @else
                        @if($sdata->is_available == 1)
                           <a class="success p-0" onclick="updateservicestatus('{{$sdata->id}}','2','{{ trans('messages.are_you_sure') }}','{{ trans('messages.yes') }}','{{ trans('messages.no') }}','{{ URL::to('services/edit/status') }}','{{ trans('messages.wrong') }}','{{ trans('messages.record_safe') }}')"><i class="ft-check font-medium-3 mr-2"></i></a>
                        @else
                           <a class="danger p-0" onclick="updateservicestatus('{{$sdata->id}}','1','{{ trans('messages.are_you_sure') }}','{{ trans('messages.yes') }}','{{ trans('messages.no') }}','{{ URL::to('services/edit/status') }}','{{ trans('messages.wrong') }}','{{ trans('messages.record_safe') }}')"><i class="ft-x font-medium-3 mr-2"></i></a>
                        @endif
                     @endif
                  </td>
               @else
                  <td><i class="@if($sdata->is_featured == 1) success ft-check @else danger ft-x @endif font-medium-3 mr-2"></i></td>
                  <td><i class="@if($sdata->is_available == 1) success ft-check @else danger ft-x @endif font-medium-3 mr-2"></i></td>
               @endif
               <td>
                  @if(Auth::user()->type == 2)
                     <a class="info p-0" href="{{ URL::to('/services/edit/'.$sdata->slug) }}"><i class="ft-edit font-medium-3 mr-2"></i></a>
                     @if (env('Environment') == 'sendbox')
                        <a class="danger p-0" onclick="myFunction()" ><i class="ft-trash font-medium-3 mr-2"></i></a>
                     @else
                        <a class="danger p-0" onclick="deleteservice('{{$sdata->id}}','{{ trans('messages.are_you_sure') }}','{{ trans('messages.yes') }}','{{ trans('messages.no') }}','{{ URL::to('/services-del') }}','{{ trans('messages.wrong') }}','{{ trans('messages.record_safe') }}')" ><i class="ft-trash font-medium-3 mr-2"></i></a>
                     @endif
                  @endif
                  <a class="dark p-0" href="{{ URL::to('/services/'.$sdata->slug) }}"><i class="ft-eye font-medium-3 mr-2"></i></a>
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>
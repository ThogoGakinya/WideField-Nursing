<form class="form form-horizontal striped-rows form-bordered" action="{{URL::to('/profile-settings/update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-body">
        <h4 class="form-section"><i class="ft-user"></i> {{trans('labels.basic_info')}}</h4>
        <div class="form-group row">
            <label class="col-md-2 label-control" for="email">{{trans('labels.email')}}</label>
            <div class="col-md-10">
                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{trans('labels.enter_email')}}" name="email" value="{{$providerdata->email}}" disabled>
                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 label-control" for="name">{{trans('labels.fullname')}}</label>
            <div class="col-md-10">
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{trans('labels.enter_full_name')}}" name="name" value="{{$providerdata->name}}">
                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="form-group row last">
            <label class="col-md-2 label-control" for="mobile">{{trans('labels.mobile')}}</label>
            <div class="col-md-10">
                <input type="text" class="form-control" placeholder="{{trans('labels.enter_mobile')}}" name="mobile" id="mobile" value="{{$providerdata->mobile}}">
                @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 label-control">{{trans('labels.profile')}}</label>
            <div class="col-md-1">
                <img src="{{Helper::image_path($providerdata->image)}}" class='rounded media-object round-media setting-profile'>
            </div>
            <div class="col-md-9">
                <input class="form-control-file @error('image') is-invalid @enderror" type="file" name="image" id="image">
                @error('image')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <h4 class="form-section"><i class="fa fa-university"></i> {{trans('labels.bank_info')}}</h4>
        <div class="form-group row">
            <label class="col-md-2 label-control" for="bank_name">{{trans('labels.bank_name')}}</label>
            <div class="col-md-10">
                <input type="text" id="bank_name" class="form-control @error('bank_name') is-invalid @enderror" placeholder="{{trans('labels.enter_bank_name')}}" name="bank_name" value="{{$bankdata->bank_name}}">
                @error('bank_name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 label-control" for="account_holder">{{trans('labels.account_holder')}}</label>
            <div class="col-md-10">
                <input type="text" id="account_holder" class="form-control @error('account_holder') is-invalid @enderror" placeholder="{{trans('labels.enter_account_holder')}}" name="account_holder" value="{{$bankdata->account_holder}}">
                @error('account_holder')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 label-control" for="account_type">{{trans('labels.account_type')}}</label>
            <div class="col-md-10">
                <input type="text" id="account_type" class="form-control @error('account_type') is-invalid @enderror" placeholder="{{trans('labels.enter_account_type')}}" name="account_type" value="{{$bankdata->account_type}}">
                @error('account_type')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 label-control" for="account_number">{{trans('labels.account_number')}}</label>
            <div class="col-md-10">
                <input type="text" id="account_number" class="form-control @error('account_number') is-invalid @enderror" placeholder="{{trans('labels.enter_account_number')}}" name="account_number" value="{{$bankdata->account_number}}">
                @error('account_number')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 label-control" for="routing_number">{{trans('labels.routing_number')}}</label>
            <div class="col-md-10">
                <input type="text" id="routing_number" class="form-control @error('routing_number') is-invalid @enderror" placeholder="{{trans('labels.enter_routing_number')}}" name="routing_number" value="{{$bankdata->routing_number}}">
                @error('routing_number')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-actions">
        @if (env('Environment') == 'sendbox')
            <button type="button" onclick="myFunction()" class="btn btn-raised btn-primary"><i class="ft-edit"></i> {{trans('labels.update')}}</button>
        @else
            <button type="submit" class="btn btn-raised btn-primary"><i class="ft-edit"></i> {{trans('labels.update')}}</button>
        @endif
    </div>
</form>
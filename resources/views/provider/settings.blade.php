
@extends('layout.main')
@section('page_title',trans('labels.profile_settings'))
@section('content')
    <section id="configuration">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="px-3">
                            @if($bankdata != "")
                                @include('provider.setting_form')
                            @else
                                @include('provider.bank_form')
                            @endif            
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
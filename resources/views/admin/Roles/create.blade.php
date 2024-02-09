@extends('admin.layout.master')
@section('Content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h2 class="h5 page-title">{{ __('lang.add_new_role') }}</h2>
        </div>
    </div>
</div>

<div class="card">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
    <div class="card-body">
        <form action="{{ route('admin.role.store') }}" method="post" id="add_form" enctype="multipart/form-data">
            @csrf

            <div id="add_form_messages"></div>

            {{-- MODIFICATIONS FROM HERE --}}
            <div class="row">

                <div class="form-group col-md-10">
                    <label class="form-label">{{ __('lang.name') }}</label>
                    <input type="text" class="border form-control" name="name"
                        placeholder="{{ __('lang.please_enter') }} {{ __('lang.name') }}...">
                </div>
                <div class="form-group col-md-2 mt-4">
                    <label class="form-check-label text-primary mt-2">
                        <input class="form-check-input" type="checkbox" id="selectAll">
                        @lang('lang.selectAll')
                    </label>
                </div>
                <div class="form-group col-12 mt-2">
                    <div class="row">
                   
                            @foreach ($permission as $item)
                                <div class="col-md-6">
                                    <div class="form-check form-check-primary mt-1">
                                        <input class="form-check-input" type="checkbox"
                                            name="permissionArray[{{ $item->name }}]"
                                            id="formCheckcolor{{ $item->id }}">
                                        <label class="form-check-label"
                                            for="formCheckcolor{{ $item->id }}">{{ $item->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                   
                    </div>
                </div>

            </div>
            {{-- MODIFICATIONS TO HERE --}}

            <div class="form-group float-end mt-3">
                <input type="submit">
                {{-- <button type="su" class="btn btn-primary" id="submit_add_form">{{ __('lang.submit') }}</button> --}}
            </div>
        </form>
    </div>
</div>

        
 
@endsection
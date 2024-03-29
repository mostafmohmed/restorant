

@extends('admin.layout.master')
@section('Content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h2 class="h5 page-title">{{ __('lang.roles') }}</h2>

            <div class="page-title-right">
                {{-- @if (permission(['add_roles'])) --}}
                <a href="{{ route('admin.role.create') }}" class="btn btn-primary">
                    {{ __('lang.add_new') }}
                </a>
                {{-- @endif --}}
            </div>
        </div>
    </div>
</div>

{{-- Table --}}
<div class="card mt-3" id="mainCont">
    <div class="card-body">

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table align-middle table-nowrap font-size-14">
                <thead class="bg-light">
                    <tr>
                        <th class="text-primary" width="5%">#</th>
                        <th class="text-primary">{{ __('lang.name') }}</th>
                        <th class="text-primary" width="11%">{{ __('lang.actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($data) > 0)
                        @foreach ($data as $key => $item)
                            <tr>
                                {{-- <td>{{ $data->firstItem() + $loop->index }}</td> --}}
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ __('lang.actions') }} <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <div class="dropdown-menu">

                                            <a href="{{ route('admin.role.show', ['role' => $item]) }}"
                                                class="dropdown-item">
                                                <span class="bx bx-show-alt"></span>
                                                {{ __('lang.show') }}
                                            </a>

                                            {{-- @if (permission(['edit_roles'])) --}}
                                            <a href="{{ route('admin.role.edit', ['role' => $item]) }}"
                                                class="dropdown-item">
                                                <span class="bx bx-edit-alt"></span>
                                                {{ __('lang.edit') }}
                                            </a>
                                            {{-- @endif --}}

                                            {{-- @if (permission(['delete_roles'])) --}}
                                            <a class="dropdown-item deleteClass"
                                                href="{{ route('admin.role.destroy', ['role' => $item]) }}"
                                                data-title="{{ __('lang.delete_role') }}" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal">
                                                <span class="bx bx-trash-alt"></span>
                                                {{ __('lang.delete') }}
                                            </a>
                                            {{-- @endif --}}

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                 
                    @endif
                </tbody>
            </table>
        </div>

        {{-- {{ $data['data']->appends(request()->query())->render('pagination::bootstrap-4') }} --}}

    </div>
</div>


@endsection
@section('scriptt')
    
@endsection
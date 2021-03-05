@extends('layouts.admin-layout')
@section('title')
    Roles
@endsection

@section('page-name')
    Roles
@endsection

@section('extra-styles')
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/dt-global_style.css">
@endsection
@section('main-content')
<div class="col-xl-3 col-lg-3 col-sm-3  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <form class="needs-validation" novalidate action="{{route('donzy.roles')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-12 mb-4">
                    <label for="validationCustom03">Role Name</label>
                    <input type="text" class="form-control" value="{{old('role_name')}}" name="role_name"  placeholder="Role Name" required>
                    <div class="invalid-feedback">
                        Please a unique role name
                    </div>
                    @error('role_name')
                        <i class="text-danger mt-2">{{$message}}</i>
                    @enderror
                </div>
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="btn-group ">
                        <button class="btn btn-primary btn-sm mt-3" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="col-xl-9 col-lg-9 col-sm-9  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <h3>All Roles</h3>
        <div class="table-responsive mb-4 mt-4">
            @if (session()->has('success'))
             <div class="alert-success alert" role="alert">{!! session()->get('success') !!}</div>
            @endif
            <table id="multi-column-ordering" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Role Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php
                    $serial = 1;
                @endphp
                <tbody>
                    @foreach ($roles as $item)
                        <tr>
                            <td>{{$serial++}}</td>
                            <td>{{$item->name ?? ''}}</td>
                            <td>
                                <a href="" class="badge badge-classic badge-warning text-uppercase">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Role Name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section('extra-scripts')
<script src="plugins/table/datatable/datatables.js"></script>
<script>
    $('#multi-column-ordering').DataTable({
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7,
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 4 ],
            orderData: [ 4, 0 ]
        } ]
    });
</script>
@endsection

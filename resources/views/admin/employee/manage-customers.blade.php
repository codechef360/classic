@extends('layouts.admin-layout')
@section('title')
    Manage Customers
@endsection

@section('page-name')
    Manage Customers
@endsection

@section('extra-styles')
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/dt-global_style.css">
@endsection
@section('main-content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <h3>Manage Customers</h3>
            <p>This list consists of all the companies/customers you've registered on <code>{{config('app.name') }}</code>.</p>
            <a class="btn btn-primary btn-rounded mb-2 " href="{{route('donzy.add-new-customer')}}">Add New Customer</a>
            <div class="table-responsive mb-4 mt-4">
                @if (session()->has('success'))
                    <div class="alert-success alert" role="alert">{!! session()->get('success') !!}</div>
                @endif
                <table id="multi-column-ordering" class="table table-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Location</th>
                        <th>Area</th>
                        <th>Registered By</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @php
                        $serial = 1;
                    @endphp
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{$serial++}}</td>
                            <td>{{$customer->first_name ?? ''}} {{$customer->surname ?? ''}}</td>
                            <td>{{$customer->getLocation->location_name ?? '-'}}</td>
                            <td>{{$customer->getArea->area_name ?? '-'}}</td>
                            <td>{{$customer->registered_by == 0 ? 'Self' : $customer->getRegisteredBy->first_name.' '.$customer->getRegisteredBy->surname }} </td>
                            <td>{{date('d M, Y', strtotime($customer->created_at))}}</td>
                            <td>
                                <a href="{{route('donzy.customer-profile', $customer->slug)}}" class="badge badge-classic badge-primary text-uppercase">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Location</th>
                        <th>Area</th>
                        <th>Registered By</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script src="/plugins/table/datatable/datatables.js"></script>
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

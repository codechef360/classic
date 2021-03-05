@extends('layouts.admin-layout')
@section('title')
    Manage Adverts
@endsection

@section('page-name')
    Manage Adverts
@endsection

@section('extra-styles')
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/dt-global_style.css">
    <link href="/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
@endsection
@section('main-content')

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

            <div class="widget widget-account-invoice-one">

                <div class="widget-heading">
                    <h5 class="">Account Info</h5>
                </div>

                <div class="widget-content">
                    <div class="invoice-box">

                        <div class="acc-total-info">
                            <h5>Balance</h5>
                            <p class="acc-amount">$470</p>
                        </div>

                        <div class="inv-detail">
                            <div class="info-detail-1">
                                <p>Overall</p>
                                <p>$ 199.0</p>
                            </div>
                            <div class="info-detail-2">
                                <p>Last Month</p>
                                <p>$ 17.82</p>
                            </div>
                            <div class="info-detail-2">
                                <p>This Month</p>
                                <p>$ 17.82</p>
                            </div>
                        </div>

                        <div class="inv-action">
                            <a href="" class="btn btn-outline-dark">Commission</a>
                            <a href="" class="btn btn-danger">Withdraw</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <h3>Manage Adverts</h3>
            <p>This list is made up of all adverts you've placed on this platform on behalf of our esteemed customers.</p>
            <a class="btn btn-primary btn-rounded mb-2 " href="{{route('donzy.post-advert')}}">Post New Advert</a>
            <div class="table-responsive mb-4 mt-4">
                @if (session()->has('success'))
                    <div class="alert-success alert" role="alert">{!! session()->get('success') !!}</div>
                @endif
                <table id="multi-column-ordering" class="table table-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Customer Name</th>
                        <th>Package</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Start Date</th>
                        <th>Status</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @php
                        $serial = 1;
                    @endphp
                    <tbody>
                    @foreach($adverts as $advert)
                        <tr>
                            <td>{{$serial++}}</td>
                            <td>{{$advert->title ?? ''}}</td>
                            <td>{{$advert->getCustomer->first_name ?? ''}} {{$advert->getCustomer->surname ?? ''}}</td>
                            <td>{{$advert->getPackage->package_name ?? ''}}</td>
                            <td>{{$advert->getCategory->category_name ?? ''}}</td>
                            <td>{{$advert->getSubCategory->sub_category_name ?? ''}}</td>
                            <td>{{!is_null($advert->start_date) ? date('d/m/Y', strtotime($advert->start_date)) : '-'}}</td>
                            <td>
                                @if($advert->status == 0)
                                    <label for="" class="label label-secondary">Pending</label>
                                @elseif($advert->status == 1)
                                    <label for="" class="label label-success">In-progress</label>
                                @elseif($advert->status == 2)
                                    <label for="" class="label label-warning">Expired</label>
                                @elseif($advert->status == 3)
                                    <label for="" class="label label-danger">Declined</label>
                                @endif
                            </td>
                            <td>{{!is_null($advert->end_date) ? date('d/m/Y', strtotime($advert->end_date)) : '-'}}</td>
                            <td>
                                <a href="{{route('donzy.view-advert', $advert->slug)}}" class="badge badge-classic badge-primary text-uppercase">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Customer Name</th>
                        <th>Package</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Start Date</th>
                        <th>Status</th>
                        <th>End Date</th>
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

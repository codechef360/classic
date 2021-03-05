@extends('layouts.admin-layout')
@section('title')
    All Packages
@endsection

@section('page-name')
All Packages
@endsection

@section('extra-styles')
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/dt-global_style.css">
@endsection
@section('main-content')
<div class="col-xl-3 col-lg-3 col-sm-3  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <form class="needs-validation" novalidate action="{{route('donzy.packages')}}" method="post" autocomplete="off">
            @csrf
            <div class="form-row">
                <div class="col-md-12 mb-1">
                    <label for="validationCustom03">Package Name</label>
                    <input type="text" class="form-control" value="{{old('package_name')}}" name="package_name"  placeholder="Package Name" required>
                    <div class="invalid-feedback">
                        Please enter a unique package name
                    </div>
                    @error('package_name')
                        <i class="text-danger mt-2">{{$message}}</i>
                    @enderror
                </div>
                <div class="col-md-12 mb-1">
                    <label for="validationCustom03">Duration <small>(in days)</small></label>
                    <input type="number" class="form-control" value="{{old('duration')}}" name="duration"  placeholder="Duration" required>
                    <div class="invalid-feedback">
                        Please enter duration in days.
                    </div>
                    @error('duration')
                        <i class="text-danger mt-2">{{$message}}</i>
                    @enderror
                </div>
                <div class="col-md-12 mb-1">
                    <label for="validationCustom03">Category</label>
                    <select name="package_category" id="package_category" class="form-control" required>
                        <option selected disabled>--Select category--</option>
                        <option value="1">In Cars</option>
                        <option value="2">In Property</option>
                        <option value="3">In Others</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select category.
                    </div>
                    @error('package_category')
                        <i class="text-danger mt-2">{{$message}}</i>
                    @enderror
                </div>
                <div class="col-md-12 mb-1">
                    <label for="validationCustom03">Promotion Power <abbr title="Maximum # of ads that can be posted"></abbr> </label>
                    <input type="number"  class="form-control" value="{{old('promotion_power')}}" name="promotion_power"  placeholder="Promotion Power (ex: 2)" required>
                    <div class="invalid-feedback">
                        Please enter promotion power
                    </div>
                    @error('promotion_power')
                        <i class="text-danger mt-2">{{$message}}</i>
                    @enderror
                </div>
                <div class="col-md-12 mb-1">
                    <label for="validationCustom03">Amount</label>
                    <input type="number" step="0.01" class="form-control" value="{{old('amount')}}" name="amount"  placeholder="Amount" required>
                    <div class="invalid-feedback">
                        Please enter amount
                    </div>
                    @error('amount')
                        <i class="text-danger mt-2">{{$message}}</i>
                    @enderror
                </div>
                 <div class="col-md-12 mb-1">
                    <label for="validationCustom03">Auto Renew <small>(in hours)</small></label>
                    <select name="auto_renew" id="auto_renew" class="form-control" required>
                        <option selected disabled>--Select Renewal--</option>
                        <option value="0">0 hours</option>
                        <option value="12">12 hours</option>
                        <option value="6">6 hours</option>
                        <option value="3">3 hours</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select auto renewal period
                    </div>
                    @error('auto_renew')
                        <i class="text-danger mt-2">{{$message}}</i>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>Other Features</strong></p>
                    </div>
                </div>
                <div class="col-md-12 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" name="sms_notification" type="checkbox" value="1" >
                        <label class="form-check-label" for="flexCheckDefault">
                            SMS Notification
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="email_notification">
                        <label class="form-check-label" for="flexCheckChecked">
                            Email Notification
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="website_link">
                        <label class="form-check-label" for="flexCheckChecked">
                            Website Link
                        </label>
                    </div>
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
        <h3>All Packages</h3>
        <div class="table-responsive mb-4 mt-4">
            @if (session()->has('success'))
             <div class="alert-success alert" role="alert">{!! session()->get('success') !!}</div>
            @endif
            <table id="multi-column-ordering" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Package Name</th>
                        <th>Amount</th>
                        <th>Category</th>
                        <th>Duration</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php
                    $serial = 1;
                @endphp
                <tbody>
                    @foreach ($packages as $item)
                        <tr>
                            <td>{{$serial++}}</td>
                            <td>{{$item->package_name ?? ''}}</td>
                            <td>{{number_format($item->amount,2)}}</td>
                            <td>
                                @if ($item->adpack_category == 1)
                                    <label class="label label-info">In Cars</label>
                                @elseif($item->adpack_category == 2)
                                    <label class="label label-info">In Property</label>
                                @else
                                    <label class="label label-info">In Others</label>

                                @endif
                            </td>
                            <td>{{$item->duration ?? 0}} <small> days</small></td>
                            <td>
                                <a href="{{route('donzy.package-edit', $item->id)}}" class="badge badge-classic badge-warning text-uppercase">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Package Name</th>
                        <th>Amount</th>
                        <th>Category</th>
                        <th>Duration</th>
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

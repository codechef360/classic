@extends('layouts.admin-layout')
@section('title')
    Add New Customer
@endsection

@section('page-name')
     Add New Customer
@endsection

@section('extra-styles')
    <link rel="stylesheet" type="text/css" href="/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/plugins/select2/select2.min.css">
@endsection
@section('main-content')


    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <h3> Add New Customer</h3>
            <p>We assume you're doing this registeration on behalf of a customer/company. Kindly note that the login credentials to the customer's account will be <i>mailed</i> to the registered email used during this registration. Do well to inform the customer to check his/her email account (inbox/spam folder) for the login credentials</p>
            <a class="btn btn-primary btn-rounded mb-2 " href="{{route('manage-my-customers')}}">My Customers</a>
            @if (session()->has('success'))
                <div class="alert-success alert" role="alert">{!! session()->get('success') !!}</div>
            @endif
            <div class="row mt-3">
                <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4> Add New Customer</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form enctype="multipart/form-data" action="{{route('add-new-customer')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="form-row mb-1">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">First Name</label>
                                        <input type="text" class="form-control  basic" name="first_name" placeholder="First Name" value="{{old('first_name')}}">
                                        @error('first_name')
                                            <i class="text-danger mt-2">{{$message}}</i>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Phone No.</label>
                                        <input type="text" name="phone_no" class="form-control" id="phone_no" placeholder="Phone No." value="{{old('phone_no')}}">
                                        @error('phone_no')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Email Address</label>
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Email Address" value="{{old('email')}}">
                                        @error('email')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row mb-1">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Company Name</label>
                                        <input type="text" class="form-control  basic" name="company_name" placeholder="Company Name" value="{{old('company_name')}}">
                                        @error('company_name')
                                            <i class="text-danger mt-2">{{$message}}</i>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Office Phone No.</label>
                                        <input type="text" name="office_phone_no" class="form-control" id="office_phone_no" placeholder="Office Phone No." value="{{old('phone_no')}}">
                                        @error('office_phone_no')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4">Office Address</label>
                                        <input type="text" name="office_address" class="form-control" id="office_address" placeholder="Office Address" value="{{old('office_address')}}">
                                        @error('office_address')
                                            <i class="text-danger mt-2">{{$message}}</i>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row mb-1">
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4">Location</label>
                                        <select class="form-control  basic" name="location" id="location">
                                            <option selected disabled>--Select location--</option>
                                            @foreach ($locations as $location)
                                                <option value="{{$location->id}}">{{$location->location_name ?? ''}}</option>
                                            @endforeach
                                        </select>
                                        @error('location')
                                            <i class="text-danger mt-2">{{$message}}</i>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputPassword4">Area</label>
                                        <div id="area-wrapper"></div>
                                        @error('area')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
<script src="/plugins/select2/select2.min.js"></script>
<script src="/js/custom/axios.min.js"></script>
    <script src="/plugins/select2/custom-select2.js"></script>
    <script>
        $(document).ready(function(){

            /* var ss = $(".basic").select2({
                tags: true,
            }); */
            $(document).on('change', '#location', function(e){
                e.preventDefault();
                axios.post('/get-product-location', {location:$(this).val()})
                .then(response=>{
                    $('#area-wrapper').html(response.data)
                        /* var ss = $(".basic").select2({
                            tags: true,
                        }); */
                });
            });

        });
    </script>
@endsection

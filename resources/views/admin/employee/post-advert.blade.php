@extends('layouts.admin-layout')
@section('title')
    Post Advert
@endsection

@section('page-name')
    Post Advert
@endsection

@section('extra-styles')
    <link rel="stylesheet" type="text/css" href="/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/plugins/select2/select2.min.css">
@endsection
@section('main-content')


    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="row">
            <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h3 class="p-2">Post Advert</h3>
                                <p>It is assumed you're posting this advert for a customer. Kindly enter the information below. Then proceed to make payment.</p>
                                <a class="btn btn-primary btn-rounded mb-2 " href="{{route('donzy.manage-my-adverts')}}">My Adverts</a>
                                @if (session()->has('success'))
                                    <div class="alert-success alert" role="alert">{!! session()->get('success') !!}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form enctype="multipart/form-data" action="{{route('donzy.proceed-to-pay')}}" method="post" id="postAdvertForm">
                            @csrf
                            <div class="form-row mb-1">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Customer</label>
                                    <select class="form-control  basic" name="customer">
                                        <option selected disabled>--Select customer--</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->company_name ?? 'Company Name'}} - {{$customer->first_name ?? ''}} {{$customer->surname ?? ''}}</option>
                                        @endforeach
                                    </select>
                                    @error('customer')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Advert Title" value="{{old('title')}}">
                                    @error('title')
                                    <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-1">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Featured Image</label>
                                    <input type="file" name="featured_image" class="form-control-file">
                                    @error('featured_image')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Product Images</label>
                                    <input type="file" name="product_images[]" class="form-control-file" multiple>
                                    @error('product_images')
                                    <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-1">
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Product Category</label>
                                    <select class="form-control  basic" name="category" id="category">
                                        <option selected disabled>--Select category--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}"> {{$category->category_name ?? ''}} </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Product Subcategory</label>
                                    <div id="subcategory-wrapper"></div>
                                    @error('subcategory')
                                    <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Location</label>
                                    <select class="form-control  basic" name="location" id="location">
                                        <option selected disabled>--Select location--</option>
                                        @foreach ($locations as $location)
                                            <option value="{{$location->id}}"> {{$location->location_name ?? ''}} </option>
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
                            <div class="form-group mb-3">
                                <label for="inputAddress">Description</label>
                                <textarea class="form-control" name="description" id="description" style="resize:none;" placeholder="Description">{{old('description')}}</textarea>
                                @error('description')
                                <i class="text-danger mt-2">{{$message}}</i>
                                @enderror
                            </div>
                            <div class="form-row mb-4">
                                <div class="form-group col-md-3">
                                    <label for="inputCity">Price</label>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Price" value="{{old('price')}}">
                                    @error('price')
                                        <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputState">Product Condition</label>
                                    <select id="inputState" class="form-control" name="product_condition">
                                        <option selected disabled>--Select product condition--</option>
                                        <option value="1">New</option>
                                        <option value="2">Used</option>
                                    </select>
                                    @error('product_condition')
                                        <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="package">Package</label>
                                    <select  class="form-control" name="package" id="package">
                                        <option selected disabled>--Select package--</option>
                                        @foreach ($packages as $package)
                                            <option value="{{$package->id}}" data-amount="{{$package->amount}}">{{$package->package_name ?? ''}} - ({{'₦'.number_format($package->amount ?? 0,2)}})</option>
                                        @endforeach
                                    </select>
                                    @error('package')
                                        <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label for="inputAddress">Ad tag</label>
                                <textarea class="form-control" name="ad_tags" id="ad_tags" style="resize:none;" placeholder="Ad tag"></textarea>
                                @error('ad_tags')
                                <i class="text-danger mt-2">{{$message}}</i>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <input type="hidden" name="currency" value="NGN">
                                    <input type="hidden" id="customer" value="Jos">
                                    <input type="hidden" name="metadata[]" id="metadata">
                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                                    <input type="hidden" name="amount" id="package_amount">
                                    <button type="button" class="btn btn-primary mt-3" onclick="payWithPaystack()" >Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
<script src="/plugins/select2/select2.min.js"></script>
<script src="/js/custom/axios.min.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="/plugins/select2/custom-select2.js"></script>
    <script>
        $(document).ready(function(){
            var ss = $(".basic").select2({
                tags: true,
            });

            $(document).on('change', '#category', function(e){
                e.preventDefault();
                axios.post('/donzy/get-product-subcategories', {category:$(this).val()})
                .then(response=>{
                    $('#subcategory-wrapper').html(response.data)
                        var ss = $(".basic").select2({
                            tags: true,
                        });
                });
            });
            $(document).on('change', '#location', function(e){
                e.preventDefault();
                axios.post('/donzy/get-product-location', {location:$(this).val()})
                .then(response=>{
                    $('#area-wrapper').html(response.data)
                        var ss = $(".basic").select2({
                            tags: true,
                        });
                });
            });
            $(document).on('change', '#package', function(e){
                e.preventDefault();
                var amt = parseFloat($(this).find(':selected').data('amount'));
                $('#package_amount').val(amt * 100);
            });


        });
        function payWithPaystack(){
        var handler = PaystackPop.setup({
        key: 'pk_test_ec726436a72f60a31b99b173478a569bddd105bc',
        email: '{{Auth::user()->email}}',
        amount: $('#package_amount').val(),
        currency: "NGN",
        ref: ''+Math.floor((Math.random() * 1000000000) + 1),
        metadata: {
            custom_fields: [
                {
                    display_name: "{{Auth::user()->first_name}}",
                    variable_name: "{{Auth::user()->first_name}}",
                    value: "{{Auth::user()->mobile_no}}"
                }
            ]
        },
        callback: function(response){
           // $('#transaction').val(response.trans);
             axios.post('/donzy/proceed-to-pay',new FormData(postAdvertForm))
                .then(response=>{
                    Toastify({
                        text: "Success! Advert posted.",
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top",
                        position: 'right',
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        stopOnFocus: true,
                        onClick: function(){}
                    }).showToast();
                     //window.location.href = "{{config('app.url')}}/donzy/manage/my-adverts";
                     window.location = response.data.redirect;
                })
                .catch(error=>{
                    $.each(error.response.data.errors, function(key, value){
                        Toastify({
                            text: value,
                            duration: 3000,
                            newWindow: true,
                            close: true,
                            gravity: "top",
                            position: 'right',
                            backgroundColor: "linear-gradient(to right, #FF0000, #FE0000)",
                            stopOnFocus: true,
                            onClick: function(){}
                        }).showToast();

                    });
                });

        },
        onClose: function(){
            alert('Are you sure you want to terminate this transaction?');
        }
    });
    handler.openIframe();
}
    </script>
@endsection

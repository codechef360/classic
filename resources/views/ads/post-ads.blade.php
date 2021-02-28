@extends('layouts.master-layout')

@section('title')
    Post Ads
@endsection

@section('current-page')
    Post Ads
@endsection

@section('extra-styles')
<link href="/assets/css/select2.min.css" rel="stylesheet" />
@endsection

@section('main-content')
<div class="col-md-12" id="postAds">
    <div class="sign-in-page">
        <div class="row">
            <div class="col-md-12 col-sm-12 sign-in">
                <div class="wcmp_regi_main">
                    <form id="postAdvertForm" class="register-form outer-top-xs register" action="{{route('post-ads')}}" role="form" method="post" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <h4>Post Ads</h4>
                        <div class="row mb-2">
                            <div class="col-md-12 col-lg-12 col-12">
                                <div class="wcmp-regi-12">
                                    <label for="reg_username">Title <span class="required">*</span></label>
                                    <input type="text" class="form-control unicase-form-control" placeholder="Title" name="title" >
                                    @error('title')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12 col-lg-12 col-12">
                                <div class="wcmp-regi-12">
                                    <label for="reg_username">Description <span class="required">*</span></label>
                                    <textarea  class=" form-control unicase-form-control" style="resize:none;" cols="30" rows="15" placeholder="Type description here..." name="description" ></textarea>
                                    @error('description')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3 col-lg-3 col-3">
                                <div class="wcmp-regi-12">
                                    <label for="reg_username">Category <span class="required">*</span></label>
                                    <select name="category" id="category"  class="form-control js-example-basic-single unicase-form-control">
                                        <option selected disabled>Select category</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{$cat->id}}" >{{$cat->category_name}}</option>
                                            @endforeach
                                    </select>
                                    @error('category')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-36">
                                <div class="wcmp-regi-12">
                                    <label for="reg_username">Sub-category <span class="required">*</span></label>
                                    <div id="subCatWrapper"></div>
                                    @error('sub_category')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-3">
                                <div class="wcmp-regi-12">
                                    <label for="reg_username">Location <span class="required">*</span></label>
                                    <select name="location" id="location"  class="form-control js-example-basic-single unicase-form-control">
                                        <option selected disabled>Select location</option>
                                            @foreach ($locations as $location)
                                                <option value="{{$location->id}}" >{{$location->location_name}}</option>
                                            @endforeach
                                    </select>
                                    @error('location')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-36">
                                <div class="wcmp-regi-12">
                                    <label for="reg_username">Area <span class="required">*</span></label>
                                    <div id="areaWrapper"></div>
                                    @error('area')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3 col-lg-3">
                                <div class="wcmp-regi-12">
                                    <label for="reg_username">Price (₦) <span class="required">*</span></label>
                                    <input type="number" step="0.01" placeholder="Price" class="form-control unicase-form-control " name="price" id="price">
                                    @error('price')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="wcmp-regi-12" style="margin-top:30px;">
                                    <label>
                                        <input type="checkbox" name="negotiable" id="negotiable"> Is this price negotiable?
                                      </label>
                                </div>
                            </div>
{{--                            <div class="col-md-3 col-lg-3 col-3">
                                <div class="wcmp-regi-12">
                                    <label for="reg_username">Condition <span class="required">*</span></label>
                                    <select name="condition" class="form-control unicase-form-control">
                                        <option selected disabled>Select condition</option>
                                    </select>
                                </div>
                            </div>--}}
                            <div class="col-md-3 col-lg-3 col-3">
                                <div class="wcmp-regi-12">
                                    <label for="reg_username">Package <span class="required">*</span></label>
                                    <select name="package" id="package" class="form-control unicase-form-control">
                                        <option selected disabled>Select package</option>
                                        @foreach($packages as $package)
                                            <option value="{{$package->id}}" data-price="{{$package->amount}}" data-duration="{{$package->duration}}">{{$package->package_name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                    @error('package')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Featured image</label>
                                    <input type="file" class="form-control-file" id="featured_image" name="featured_image">
                                  </div>
                                @error('featured_image')
                                    <i class="text-danger mt-2">{{$message}}</i>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Product images <small>Upload images for this product.</small></label>
                                    <input type="file" class="form-control-file" id="product_images" name="product_images[]" multiple>
                                  </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <p><strong>Price:</strong> ₦ <label for="" id="package_price"></label> </p>
                                    <p><strong>Duration:</strong>  <label for="" id="package_duration"></label> days</p>
                                    <p><input type="hidden" name="hiddenprice" id="hiddenprice"></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 text-center" style="margin-top: 20px;">
                                <button disabled type="submit"  class="btn-upper btn btn-primary checkout-page-button" id="postAdvertZeroBtn" name="postAdvertBtn">Post Ads</button>
                                <button disabled type="button" onclick="payWithPaystack()" class="btn-upper btn btn-primary checkout-page-button" id="postAdvertBtn" name="postAdvertBtn">Post Ads</button>
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
<script src="/assets/js/select2.min.js"></script>
<script type="text/javascript" src="/assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/assets/js/tinymce.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    $(document).ready(function(){
        $('.js-example-basic-single').select2();
        $('#postAdvertZeroBtn').hide();
        $(document).on('change', '#category', function(e){
            e.preventDefault();
            axios.post('/get-subcategories', {cat:$(this).val()})
            .then(response=>{
                $('#subCatWrapper').html(response.data)
                $('.js-example-basic-single').select2();
            });
        });
        $(document).on('change', '#location', function(e){
            e.preventDefault();
            axios.post('/get-areas', {area:$(this).val()})
            .then(response=>{
                $('#areaWrapper').html(response.data)
                $('.js-example-basic-single').select2();
            });
        });

        $(document).on('change', '#package', function(e){
            e.preventDefault();
            var amount = $(this).find(':selected').data('price');
            var duration = $(this).find(':selected').data('duration');
            //$('#price').val(amount);
            $('#hiddenprice').val(amount);
            $('#package_price').text(amount);
            $('#package_duration').text(duration);
            $('#postAdvertBtn').attr('disabled', false)
            if(amount > 0){
                $('#postAdvertBtn').attr('disabled', false);
                $('#postAdvertBtn').show();
                $('#postAdvertZeroBtn').hide();
            }else{
                $('#postAdvertZeroBtn').attr('disabled', false);
                $('#postAdvertZeroBtn').show();
                $('#postAdvertBtn').hide();
            }
        });
    });


    function payWithPaystack(){
        var handler = PaystackPop.setup({
            key: 'pk_test_ec726436a72f60a31b99b173478a569bddd105bc',
            email: '{{Auth::user()->email}}',
            amount: $('#hiddenprice').val() * 100,
            currency: "NGN",
            ref: ''+Math.floor((Math.random() * 1000000000) + 1),
            metadata: {
                custom_fields: [
                    {
                        display_name: "{{Auth::user()->first_name}}",
                        variable_name: "{{Auth::user()->first_name}}",
                        value: "{{Auth::user()->phone_no}}"
                    }
                ]
            },
            callback: function(response){
               // $('#transaction').val(response.trans);
                 axios.post('/post-ads',new FormData(postAdvertForm))
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
                    window.location.href = "{{config('app.url')}}/my-adverts";
            },
            onClose: function(){
                alert('Are you sure you want to terminate this transaction?');
            }
        });
        handler.openIframe();
    }
</script>
@endsection

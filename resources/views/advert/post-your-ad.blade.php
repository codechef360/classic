@extends('layouts.master-layout')

@section('title')
    Post Your Ad
@endsection

@section('meta-title')
    Post Your Ad
@endsection

@section('meta-keywords')
    Post Your Ad
@endsection

@section('extra-styles')
    <link rel="stylesheet" href="css/custom/ad-post.css">
@endsection
@section('current-page')
    Post Your Ad
@endsection
@section('current-page')
    Post Your Ad
@endsection
@section('breadcrumb')
    @include('partials._breadcrumb')
@endsection
@section('main-content')
        @include('customer.partials._dash-header')
        <section class="adpost-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <form class="adpost-form" action="{{route('post-your-ad')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="adpost-card">
                                <div class="adpost-title">
                                    <h3>Ad Information</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" value="{{old('title')}}" placeholder="Title" name="title">
                                            @error('title')
                                                <i class="text-danger mt-2">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Featured Image</label>
                                            <input type="file" class="form-control" name="featured_image">
                                            @error('featured_image')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Product images</label>
                                            <input type="file" class="form-control" name="product_images[]" multiple>
                                            @error('product_images')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Category</label>
                                            <select class="form-control custom-select" id="category" value="{{old('category')}}" name="category">
                                                <option selected disabled>--Select Category--</option>
                                                @foreach ($categories as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->category_name ?? ''}}</option>
                                                @endforeach
                                            </select>
                                             @error('category')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Product Subcategory</label>
                                            <div id="subcategory-wrapper">

                                            </div>
                                             @error('subcategory')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Location</label>
                                            <select class="form-control custom-select" value="{{old('location')}}" name="location" id="location">
                                                <option selected disabled>--Select location--</option>
                                                @foreach ($locations as $locate)
                                                    <option value="{{$locate->id}}">{{$locate->location_name ?? ''}}</option>
                                                @endforeach
                                            </select>
                                             @error('location')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Area</label>
                                            <div id="area-wrapper"></div>
                                             @error('area')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Price</label>
                                            <input type="number" step="0.01" name="price" value="{{old('price')}}" class="form-control" placeholder="Enter your pricing amount">
                                             @error('price')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <ul class="form-check-list">
                                                <li>
                                                    <label class="form-label">product condition</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="used" class="form-check" id="use-check">
                                                    <label for="use-check" class="form-check-text">used</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="new" class="form-check" id="new-check">
                                                    <label for="new-check" class="form-check-text">new</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">ad description</label>
                                            <textarea class="form-control" name="description" placeholder="Ad description">{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">ad tag</label>
                                            <textarea class="form-control" placeholder="Maximum of 15 keywords">{{old('tags')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="adpost-card">
                                <div class="adpost-title">
                                    <h3>Package Information</h3>
                                </div>
                                <ul class="adpost-plan-list">
                                    <li>
                                        <div class="adpost-plan-content">
                                            <h6>
                                                Free Plan -
                                                <span>Submit 5 Ad Listings</span>
                                            </h6>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Delectus minus Eaque corporis accusantium incidunt officiis deleniti.</p>
                                        </div>
                                        <div class="adpost-plan-meta">
                                            <h3>$00.00</h3>
                                            <button class="btn btn-outline">
                                                <span>Select</span>
                                            </button>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="adpost-plan-content">
                                            <h6>
                                                Standerd Plan -
                                                <span>Submit 10 Ad Listings</span>
                                            </h6>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Delectus minus Eaque corporis accusantium incidunt officiis deleniti.</p>
                                        </div>
                                        <div class="adpost-plan-meta">
                                            <h3>$23.00</h3>
                                            <button class="btn btn-outline">
                                                <span>Select</span>
                                            </button>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="adpost-plan-content">
                                            <h6>
                                                Premium Plan -
                                                <span>Unlimited Ad Listings</span>
                                            </h6>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Delectus minus Eaque corporis accusantium incidunt officiis deleniti.</p>
                                        </div>
                                        <div class="adpost-plan-meta">
                                            <h3>$43.00</h3>
                                            <button class="btn btn-outline">
                                                <span>Select</span>
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->
                            <div class="adpost-card pb-2">
                                <!-- <div class="adpost-agree">
                                    <div class="form-group">
                                        <input type="checkbox" class="form-check" name="notification">
                                    </div>
                                    <p>
                                        Send me Trade Email/SMS Alerts for people looking to buy mobile handsets in www By clicking "Post", you agree to our
                                        <a href="#">Terms of Use</a>
                                        and
                                        <a href="#">Privacy Policy</a>
                                        and acknowledge that you are the rightful owner of this item and using Trade to find a genuine buyer.
                                    </p>
                                </div> -->
                                <div class="form-group text-right">
                                    <button class="btn btn-inline">
                                        <i class="fas fa-check-circle"></i>
                                        <span>published your ad</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="account-card alert fade show">
                            <div class="account-title">
                                <h3>Safety Tips</h3>
                            </div>
                            <ul class="account-card-text">
                                <li>
                                    <p>Do not pay in advance even for the delivery</p>
                                </li>
                                <li>
                                    <p>Try to meet at a safe, public location.</p>
                                </li>
                                <li>
                                    <p>Check the item BEFORE you buy it</p>
                                </li>
                                <li>
                                    <p>Pay only after collecting the item</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('extra-scripts')
<script src="/js/custom/select2.min.js"></script>
<script src="/js/custom/axios.min.js"></script>
    <script>
    $(document).ready(function(){
        $('.js-example-basic-single').select2();
        $(document).on('change', '#location', function(e){
            e.preventDefault();
            axios.post('/get-location', {location:$(this).val()})
            .then(response=>{
                $('#area-wrapper').html(response.data)
                   // $(".js-example-basic-single").select2();
            });
        });
        $(document).on('change', '#category', function(e){
            e.preventDefault();
            axios.post('/get-subcategories', {category:$(this).val()})
            .then(response=>{
                $('#subcategory-wrapper').html(response.data)
                   // $(".js-example-basic-single").select2();
            });
        });
    });
</script>
@endsection

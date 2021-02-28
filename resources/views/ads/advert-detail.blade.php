@extends('layouts.master-layout')

@section('title')
    My Advert Detail
@endsection

@section('current-page')
    <a href="javascript:void(0);">{{$detail->getCategory->category_name ?? ''}}</a> / {{$detail->title ?? ''}}
@endsection

@section('extra-styles')
    <link rel="stylesheet" href="/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="/assets/css/rateit.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-select.min.css">
    <link href="/assets/css/lightbox.css" rel="stylesheet">
@endsection

@section('main-content')
    <div class="row single-product">
        <div class="detail-block">
            <div class="row  wow fadeInUp">

                <div class="col-xs-12 col-sm-5 col-md-4 gallery-holder">
                    <div class="product-item-holder size-big single-product-gallery small-gallery">

                        <div id="owl-single-product">
                            <div class="single-product-gallery-item" id="slide1">
                                <a data-lightbox="image-1" data-title="Gallery" href="/assets/images/products/p1.jpg">
                                    <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p4.jpg" />
                                </a>
                            </div>

                            <div class="single-product-gallery-item" id="slide2">
                                <a data-lightbox="image-1" data-title="Gallery" href="/assets/images/products/p2.jpg">
                                    <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p2.jpg" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                            <div class="single-product-gallery-item" id="slide3">
                                <a data-lightbox="image-1" data-title="Gallery" href="/assets/images/products/p3.jpg">
                                    <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p3.jpg" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                            <div class="single-product-gallery-item" id="slide4">
                                <a data-lightbox="image-1" data-title="Gallery" href="/assets/images/products/p4.jpg">
                                    <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p1.jpg" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                            <div class="single-product-gallery-item" id="slide5">
                                <a data-lightbox="image-1" data-title="Gallery" href="/assets/images/products/p5.jpg">
                                    <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p5.jpg" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                            <div class="single-product-gallery-item" id="slide6">
                                <a data-lightbox="image-1" data-title="Gallery" href="/assets/images/products/p6.jpg">
                                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="assets/images/products/p6.jpg" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                            <div class="single-product-gallery-item" id="slide7">
                                <a data-lightbox="image-1" data-title="Gallery" href="/assets/images/products/p7.jpg">
                                    <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p7.jpg" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                            <div class="single-product-gallery-item" id="slide8">
                                <a data-lightbox="image-1" data-title="Gallery" href="/assets/images/products/p8.jpg">
                                    <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p8.jpg" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                            <div class="single-product-gallery-item" id="slide9">
                                <a data-lightbox="image-1" data-title="Gallery" href="/assets/images/products/p9.jpg">
                                    <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p9.jpg" />
                                </a>
                            </div>
                        </div>
                        <div class="single-product-gallery-thumbs gallery-thumbs">

                            <div id="owl-single-product-thumbnails">
                                <div class="item">
                                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                                        <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p4.jpg" />
                                    </a>
                                </div>

                                <div class="item">
                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                                        <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p2.jpg"/>
                                    </a>
                                </div>
                                <div class="item">

                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                                        <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p3.jpg" />
                                    </a>
                                </div>
                                <div class="item">

                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="4" href="#slide4">
                                        <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p1.jpg" />
                                    </a>
                                </div>
                                <div class="item">

                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="5" href="#slide5">
                                        <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p5.jpg" />
                                    </a>
                                </div>
                                <div class="item">

                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="6" href="#slide6">
                                        <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p6.jpg" />
                                    </a>
                                </div>
                                <div class="item">

                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="7" href="#slide7">
                                        <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p7.jpg" />
                                    </a>
                                </div>
                                <div class="item">

                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="8" href="#slide8">
                                        <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="assets/images/products/p8.jpg" />
                                    </a>
                                </div>
                                <div class="item">

                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="9" href="#slide9">
                                        <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="/assets/images/products/p9.jpg" />
                                    </a>
                                </div>
                            </div><!-- /#owl-single-product-thumbnails -->



                        </div><!-- /.gallery-thumbs -->

                    </div><!-- /.single-product-gallery -->
                </div><!-- /.gallery-holder -->
                <div class='col-sm-7 col-md-5 product-info-block'>
                    <div class="product-info">
                        <h1 class="name">{{$detail->title ?? ''}}</h1>

                        <div class="rating-reviews m-t-20">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="pull-left">
                                        <div class="rating rateit-small"></div>
                                    </div>
                                    <div class="pull-left">
                                        <div class="reviews">
                                            <a href="#" class="lnk">(13 Reviews)</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.rating-reviews -->
                        <div class="price-container info-container m-t-20">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                                    <div class="price-box">
                                        <span class="price">₦{{number_format($detail->price ?? 0,2)}}</span>
                                        {{--<span class="price-strike">$900.00</span>--}}
                                    </div>
                                </div>
                                @if(Auth::check())
                                    <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                                        <div class="favorite-button">
                                            <a class="btn btn-primary addToWishlist" data-toggle="tooltip" data-placement="right" title="Wishlist" href="javascript:void(0);" data-product="{{$detail->id}}">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="quantity-container info-container">
                            <div class="row">
                                <div class="add-btn">
                                    <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Contact vendor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-md-3">
                    <div class="store-details">
                        <img alt="" src="assets/images/brands/store.png"/>
                        <h2><a href="#">{{$detail->getCustomer->first_name ?? '' }} {{$detail->getCustomer->surname ?? ''}}</a></h2>
                        <p> nisi ut aliquip.</p>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
        <div class="product-tabs inner-bottom-xs  wow fadeInUp">
            <div class="row">
                <div class="col-sm-3">
                    <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                        <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
                        <li><a data-toggle="tab" href="#vendor">Vendor</a></li>
                        <li><a data-toggle="tab" href="#review">Review</a></li>
                    </ul>
                </div>
                <div class="col-sm-9">

                    <div class="tab-content">

                        <div id="description" class="tab-pane in active">
                            <div class="product-tab">
                                <p class="text"> {{$detail->description ?? ''}} </p>
                            </div>
                        </div><!-- /.tab-pane -->
                        <div id="vendor" class="tab-pane">
                            <div class="product-tab">
                                <h3>{{$detail->getCustomer->first_name ?? ''}} {{$detail->getCustomer->surname ?? ''}}</h3>
                                <p class="text">
                                    about vendor</br>
                                </p>
                            </div>
                        </div>
                        <div id="review" class="tab-pane">
                            <div class="product-tab">
                                <div class="product-reviews">
                                    <h4 class="title">Customer Reviews</h4>

                                    <div class="reviews">
                                        <div class="review">
                                            <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                            <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                        </div>

                                    </div><!-- /.reviews -->
                                </div><!-- /.product-reviews -->



                                <div class="product-add-review">
                                    <h4 class="title">Write your own review</h4>
                                    <div class="review-table">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th class="cell-label">&nbsp;</th>
                                                    <th>1 star</th>
                                                    <th>2 stars</th>
                                                    <th>3 stars</th>
                                                    <th>4 stars</th>
                                                    <th>5 stars</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="cell-label">Quality</td>
                                                    <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                    <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                    <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                    <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                    <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                </tr>
                                                <tr>
                                                    <td class="cell-label">Price</td>
                                                    <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                    <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                    <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                    <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                    <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                </tr>
                                                <tr>
                                                    <td class="cell-label">Value</td>
                                                    <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                    <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                    <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                    <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                    <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                </tr>
                                                </tbody>
                                            </table><!-- /.table .table-bordered -->
                                        </div><!-- /.table-responsive -->
                                    </div><!-- /.review-table -->

                                    <div class="review-form">
                                        <div class="form-container">
                                            <form class="cnt-form">

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                            <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                                        </div><!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                            <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                        </div><!-- /.form-group -->
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                            <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                        </div><!-- /.form-group -->
                                                    </div>
                                                </div><!-- /.row -->

                                                <div class="action text-right">
                                                    <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                </div><!-- /.action -->

                                            </form><!-- /.cnt-form -->
                                        </div><!-- /.form-container -->
                                    </div><!-- /.review-form -->

                                </div><!-- /.product-add-review -->

                            </div><!-- /.product-tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="section wow fadeInUp">
            <h3 class="section-title">Related Products {{$related/*->where('status', 1)*/->count()}}</h3>
            <div class="new-arriavls">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                    @if($related->count() > 0 )
                        @foreach($related as $item)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="{{route('advert-detail', $item->slug)}}">
                                                    <img src="/assets/attachments/ads/featured_image/{{$item->featured_image}}" alt="{{$item->title ?? ''}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info text-left">
                                            <div class="brand">{{$item->getCategory->category_name ?? ''}}</div>
                                            <h3 class="name">
                                                <a href="{{route('advert-detail', $item->slug)}}">{{strlen($item->title) > 35 ? substr($item->title,0,35).'...' : $item->title }}</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> ₦{{number_format($item->price ?? 0,2)}} </span>
                                                <span class="price-before-discount">$ 800</span> </div>

                                        </div>
                                        @if(Auth::check())
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="lnk wishlist">
                                                            <a class="add-to-cart addToWishlist" data-toggle="tooltip" data-placement="right" title="Add to Wishlist" data-product="{{$item->id}}" href="javascript:void(0);" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @else
                        <h6 class="text">There're no related products available at the moment.</h6>
                    @endif
                </div>
            </div>
            @if(Auth::check())
                <input type="hidden" name="customer" id="customer" value="{{Auth::user()->id}}">
            @endif
        </section>
    </div>
@endsection

@section('extra-scripts')
    <script src="/assets/js/interaction.js"></script>
@endsection

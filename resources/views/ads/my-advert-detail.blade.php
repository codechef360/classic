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
                            @foreach ($detail->getGalleryImages as $item)
                                <div class="single-product-gallery-item" id="slide{{$item->id}}">
                                    <a data-lightbox="image-1" data-title="Gallery" href="/assets/attachments/ads/product_gallery/{{$item->directory ?? ''}}">
                                        <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="/assets/attachments/ads/product_gallery/{{$item->directory ?? ''}}" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="single-product-gallery-thumbs gallery-thumbs">
                            <div id="owl-single-product-thumbnails">
                                @foreach ($detail->getGalleryImages as $thumbnail)
                                    <div class="item">
                                        <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{$thumbnail->id}}" href="#slide{{$thumbnail->id}}">
                                            <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="/assets/attachments/ads/product_gallery/{{$thumbnail->directory ?? ''}}" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-sm-7 col-md-5 product-info-block'>
                    <div class="product-info">
                        <h1 class="name">{{$detail->title ?? ''}}</h1>
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
                                    <a href="{{route('contact-vendor', $detail->getCustomer->slug)}}" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Contact vendor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-md-3">
                    <div class="store-details">
                        <img alt="" height="100" width="100" src="/assets/attachments/logos/{{$detail->getCustomer->logo ?? $detail->getCustomer->avatar}}"/>
                        <h2><a href="#">{{$detail->getCustomer->company_name ?? $detail->getCustomer->first_name }} </a></h2>
                        <p> <strong>Office Address: </strong> {{$detail->getCustomer->company_address ?? ''}}</p>
                        <p> <strong>Office Phone: </strong> {{$detail->getCustomer->company_phone ?? ''}}</p>
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
                    </div>
                </div>
            </div>
        </div>
        <section class="section wow fadeInUp">
            <h3 class="section-title">Related Products </h3>
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

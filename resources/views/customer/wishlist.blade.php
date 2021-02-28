@extends('layouts.master-layout')

@section('title')
    Wishlist
@endsection

@section('meta-title')
    Wishlist
@endsection

@section('meta-keywords')
    Wishlist
@endsection
@section('extra-styles')
    <link rel="stylesheet" href="/css/custom/bookmark.css">
@endsection
@section('current-page')
    Watchlist
@endsection
@section('breadcrumb')
    @include('partials._breadcrumb')
@endsection
@section('main-content')
    @include('customer.partials._dash-header')
    <section class="bookmark-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-filter">
                        <div class="product-page-number">
                            <p>Showing 1–9 of 130 results</p>
                        </div>
                        <select class="product-short-select custom-select">
                            <option selected>Short by Best Sell</option>
                            <option value="1">Short by New Item</option>
                            <option value="2">Short by Popularity</option>
                            <option value="3">Short by Average review</option>
                        </select>
                        <ul class="product-card-type">
                            <li class="grid-verti active">
                                <i class="fas fa-grip-vertical"></i>
                            </li>
                            <li class="grid-hori">
                                <i class="fas fa-grip-horizontal"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/01.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge rent">rent</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">property</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">house</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/Negotiable</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/02.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">fashion</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">shoes</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/fixed</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/03.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">stationary</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">book</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/Negotiable</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/04.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">electronics</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">television</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/fixed</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/05.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">gadget</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">headphone</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/Negotiable</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/06.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge rent">rent</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">automobile</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">cycle</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/per hour</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/07.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge booking">booking</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Luxury</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">resort</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/per day</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/08.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">electronics</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">mobile</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/fixed</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/09.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">animal</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">cat</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/fixed</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/10.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge rent">rent</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">automobile</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">car</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/per km</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/11.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge booking">booking</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">property</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">apartment</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/per year</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/12.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">fashion</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">jeans</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/fixed</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/13.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">electronics</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">laptop</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/Negotiable</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/14.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge rent">rent</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">automobile</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">bike</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/per hour</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/15.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge sale">sale</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">electronics</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">camera</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/fixed</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
                    <div class="product-card">
                        <div class="product-head">
                            <div class="product-img" style="background:url(images/product/16.jpg) no-repeat center; background-size:cover;">
                                <i class="cross-badge fas fa-bolt"></i>
                                <span class="flat-badge booking">booking</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>264</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-mouse"></i>
                                        <p>134</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>4.5/7</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag">
                                <i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Luxury</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">ship</li>
                                </ol>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="rightbar-details.html">Lorem ipsum dolor sit amet consect adipisicing elit</a>
                                </h5>
                                <ul class="product-location">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>Uttara, Dhaka</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <p>30 min ago!</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <div class="product-price">
                                    <h5>$1500</h5>
                                    <span>/per week</span>
                                </div>
                                <ul class="product-widget">
                                    <li>
                                        <a href="compare.html" class="tooltip">
                                            <i class="fas fa-compress"></i>
                                            <span class="tooltext top">compare</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="tooltip">
                                            <i class="fas fa-heart"></i>
                                            <span class="tooltext top">bookmark</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-long-arrow-alt-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link active" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">...</li>
                        <li class="page-item">
                            <a class="page-link" href="#">67</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

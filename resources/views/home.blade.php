@extends('layouts.master-layout')
@section('title')
    Home
@endsection
@section('extra-styles')
<link rel="stylesheet" href="/css/custom/leftbar-list.css">
@endsection
@section('meta-title')
    Home
@endsection
@section('meta-keyword')
    classified ads
@endsection

@section('main-content')
 <section class="banner-part">
            <div class="container">
                <div class="banner-content">
                    <h1>You can #Buy, #Rent, #Booking anything from here.</h1>
                    <p>Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs and more in the world.</p>
                    <a href="#allAds" class="btn btn-outline">
                        <i class="fas fa-eye"></i>
                        <span>Show all ads</span>
                    </a>
                </div>
            </div>
        </section>
        <section class="suggest-part">
            <div class="container">
                <div class="suggest-slider slider-arrow">
                    @foreach ($categories as $sliderCat)
                        <div class="suggest-card">
                            <div class="suggest-img">
                                <img src="/images/suggest/automobile.png" alt="car">
                            </div>
                            <div class="suggest-meta">
                                <h6>
                                    <a href="#">{{$sliderCat->category_name ?? ''}}</a>
                                </h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="ad-list-part" id="allAds">
            <div class="container">
                <div class="row content-reverse">
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="product-sidebar">
                                    <div class="product-sidebar-title">
                                        <h6>Filter by Categories</h6>
                                    </div>
                                    <div class="product-sidebar-content">
                                        <div class="product-sidebar-search">
                                            <input type="text" placeholder="Search">
                                        </div>
                                        <ul class="nasted-dropdown">
                                            @foreach ($categories as $category)
                                                <li>
                                                    <div class="nasted-menu">
                                                        <p>
                                                            <span class="fas fa-tags"></span>
                                                            {{$category->category_name ?? ''}}
                                                        </p>
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                    @if ($category->getSubCategories->count() > 0)
                                                        <ul class="nasted-menu-list">
                                                            @foreach ($category->getSubCategories as $sub)
                                                                <li>
                                                                    <a href="#">{{$sub->sub_category_name ?? ''}}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            @foreach ($adverts as $item)
                                <div class="col-sm-6 col-md-4 col-lg-4 card-grid">
                                    <div class="product-card">
                                        <div class="product-head">
                                            <div class="product-img" style="background:url(/attachments/featured-images/{{$item->featured_image}}) no-repeat center; background-size:cover;">

                                                <span class="flat-badge rent">{{$item->getCategory->category_name ?? ''}}</span>
                                                <ul class="product-meta">
                                                    <li>
                                                        <i class="fas fa-eye"></i>
                                                        <p>{{number_format($item->getViews->count())}}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                        <p>{{number_format($item->getAdvertReviews->count())}}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-tag">
                                                <i class="fas fa-tags"></i>
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item">
                                                        <a href="#">{{$item->getCategory->category_name ?? ''}}</a>
                                                    </li>
                                                    <li class="breadcrumb-item active" aria-current="page">{{$item->getSubCategory->sub_category_name ?? ''}}</li>
                                                </ol>
                                            </div>
                                            <div class="product-title">
                                                <h5>
                                                    <a href="{{route('advert-detail', $item->slug)}}">{{strlen($item->title) > 17 ? substr($item->title,0,17).'...' : $item->title  }}</a>
                                                </h5>
                                                <ul class="product-location">
                                                    <li>
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <p>{{$item->getLocation->location_name ?? ''}}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-clock"></i>
                                                        <p>{{$item->created_at->diffForHumans()}}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-details">
                                                <div class="product-price">
                                                    <h5>{{'₦'.number_format($item->price,2)}}</h5>
                                                    <span>/@if($item->price_type == 0) Negotiable @else Fixed @endif</span>
                                                </div>
                                                <ul class="product-widget">
                                                    <li>
                                                        <button class="tooltip addToWishlist" data-product="{{$item->id}}">

                                                                <i class="far fa-heart"></i>

                                                                <i class="far fa-heart fas"></i>

                                                            <span class="tooltext top">Watchlist</span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                             @if(Auth::check())
                                <input type="hidden" name="customer" id="customer" value="{{Auth::user()->id}}">
                            @endif
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
                </div>
            </div>
        </section>

@endsection

@section('extra-scripts')
 <script src="/js/custom/interaction.js"></script>
 <script src="/js/custom/axios.min.js"></script>
@endsection

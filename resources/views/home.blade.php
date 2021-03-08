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
 @include('partials._slider-board')
        <section class="suggest-part">
            <div class="container">
                <div class="suggest-slider slider-arrow">
                    @foreach ($categories as $sliderCat)
                        <div class="suggest-card">
                            <div class="suggest-img">
                                <img src="/attachments/category/featured-images/{{$sliderCat->featured_image}}" alt="{{$sliderCat->category_name ?? ''}}">
                            </div>
                            <div class="suggest-meta">
                                <h6>
                                    <a  href="{{route('get-advert-by-category', $sliderCat->slug)}}">{{$sliderCat->category_name ?? ''}}</a>
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
                                    <div class="product-sidebar-content">
                                        <ul class="nasted-dropdown">
                                            @foreach ($categories as $category)
                                                <li>
                                                    <div class="nasted-menu">
                                                        <p>
                                                            <span class="fas fa-tags"></span>
                                                            <a class="text-muted" href="{{route('get-advert-by-category', $category->slug)}}">{{$category->category_name ?? ''}}</a>
                                                        </p>
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                    @if ($category->getSubCategories->count() > 0)
                                                        <ul class="nasted-menu-list">
                                                            @foreach ($category->getSubCategories as $sub)
                                                                <li>
                                                                    {{$sub->sub_category_name ?? ''}}
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
                                                        <a href="{{route('get-advert-by-category', $item->getCategory->slug)}}">{{$item->getCategory->category_name ?? ''}}</a>
                                                    </li>
                                                    <li class="breadcrumb-item active" aria-current="page">{{$item->getSubCategory->sub_category_name ?? ''}}</li>
                                                </ol>
                                            </div>
                                            <div class="product-title">
                                                <h5>
                                                    <a href="{{route('view-advert', $item->slug)}}">{{strlen($item->title) > 17 ? substr($item->title,0,17).'...' : $item->title  }}</a>
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
                                                @if (Auth::check())
                                                    <ul class="product-widget">
                                                        <li>
                                                            <button class="tooltip addToWishlist" data-product="{{$item->id}}">
                                                                    <i class="far fa-heart"></i>
                                                                <span class="tooltext top">Watchlist</span>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                @endif
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
                                {{$adverts->links('vendor.pagination.default')}}
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

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
<section class="bookmark-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-filter mt-3">
                        <div class="product-page-number">
                            <p>Related Ads</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (count($adverts) > 0)
                    @foreach ($adverts as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3 card-grid">
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
                @else
                    <div class="col-md-12 p-3 ">
                        <p class="text-center">
                            There're currently no active ads in this category ( <label for="" class="label label-danger">{{$cat->category_name ?? ''}}</label> ).
                        </p>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{url()->previous()}}" class="btn btn-inline">
                                <i class="fas fa-backward"></i>
                                <span>Go Back</span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {{$adverts->links('vendor.pagination.default')}}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extra-scripts')
 <script src="/js/custom/interaction.js"></script>
 <script src="/js/custom/axios.min.js"></script>
@endsection

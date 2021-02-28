@extends('layouts.master-layout')

@section('title')
    Contact Seller
@endsection

@section('current-page')
    Contact Seller / {{$vendor->company_name ?? $vendor->first_name }}
@endsection

@section('extra-styles')

@endsection

@section('main-content')
<div class="row">
    <div class="col-md-3 col-lg-3">
        <div class="sidebar-widget product-tag wow fadeInUp animated" style="visibility: visible;">
            <h3 class="section-title">Seller</h3>
            <div class="sidebar-widget-body outer-top-xs text-center">
                <img alt="" height="100" width="100" style="border-radius: 50%;" src="/assets/attachments/logos/avatar.png">
            </div>
            <hr>
            <ul>
                <li><strong>Company Name: </strong> {{$vendor->company_name ?? $vendor->first_name }}</li>
                <li><strong>Office Address: </strong> {{$vendor->company_address ?? '' }}</li>
                <li><strong>Office Location: </strong> sksks</li>
                <li><strong>Office Phone: </strong> {{$vendor->company_phone ?? '' }}</li>
            </ul>
            <hr>
            <div class="add-btn mt-3 text-center">
                <button href="" class="btn btn-primary"><i class="fa fa-envelope inner-right-vs"></i> Message Seller</button>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-lg-9">
        <div class="sidebar-widget product-tag wow fadeInUp animated" style="visibility: visible;">
            <div class="tab-pane  active" id="list-container">
                @foreach ($vendor->getCustomerAdverts as $item)
                    <div class="category-product">
                        <div class="category-product-inner">
                            <div class="products">
                            <div class="product-list product">
                                <div class="row product-list-row">
                                <div class="col col-sm-3 col-lg-3">
                                    <div class="product-image mt-3">
                                    <div class="image">
                                        <img src="/assets/attachments/ads/featured_image/{{$item->featured_image ?? ''}}" alt="">
                                    </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col col-sm-9 col-lg-9">
                                    <div class="product-info">
                                    <h3 class="name">
                                        <a href="{{route('advert-detail', $item->slug)}}">{{$item->title ?? ''}}</a>
                                    </h3>
                                    <div class="product-price"> <span class="price"> ₦{{number_format($item->price,2)}} </span>
                                        {{-- <span class="price-before-discount">$ 800</span>  --}}
                                    </div>
                                    <div class="description m-t-10">{{strlen(strip_tags($item->description)) > 365 ? substr(strip_tags(strip_tags($item->description)), 0,365).'...'  : strip_tags(strip_tags($item->description))}}</div>
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="lnk wishlist addToWishlist" data-product="{{$item->id}}"> <a class="add-to-cart" href="javascript:void(0);" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                        </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-scripts')
<script src="/assets/js/interaction.js"></script>
@endsection

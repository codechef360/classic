@extends('layouts.master-layout')

@section('title')
    Notifications
@endsection

@section('meta-title')
    Notifications
@endsection

@section('meta-keywords')
    Notifications
@endsection
@section('extra-styles')
    <link rel="stylesheet" href="/css/custom/bookmark.css">
@endsection
@section('current-page')
    Notifications
@endsection
@section('breadcrumb')
    @include('partials._breadcrumb')
@endsection

@section('main-content')
    @include('customer.partials._dash-header')
    <section class="bookmark-part">
        <div class="container">
            <div class="row">
                @foreach (Auth::user()->getNotifications as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 card-grid col-sm-12 col-md-12 col-lg-12">
                        <div class="product-card inline">
                            <div class="product-head">
                                <div class="dash-avatar">
                                    <a href="javascript:void(0);">
                                        <img src="/attachments/avatar/{{Auth::user()->id == $item->notifiable_id ? Auth::user()->avatar : $item->getNotifiableUser->avatar}}" alt="avatar">
                                    </a>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-tag">
                                    <i class="fa fa-clock-o"></i>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="javascript:void(0);">{{date('d F, Y h:ia', strtotime($item->created_at))}}</a>
                                        </li>
                                    </ol>
                                </div>
                                <div class="product-title">
                                    <h5>
                                        <a href="javascript:void(0);">Static</a>
                                    </h5>
                                    <ul class="product-location">
                                        <li>
                                            <i class="fas fa-clock"></i>
                                            <p>{{$item->created_at->diffForHumans()}}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection

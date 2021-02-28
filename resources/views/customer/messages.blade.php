@extends('layouts.master-layout')

@section('title')
    Messages
@endsection

@section('meta-title')
    Messages
@endsection

@section('meta-keywords')
    Messages
@endsection
@section('extra-styles')
    <link rel="stylesheet" href="/css/custom/bookmark.css">
@endsection
@section('current-page')
    Messages
@endsection
@section('breadcrumb')
    @include('partials._breadcrumb')
@endsection
@section('main-content')
    @include('customer.partials._dash-header')
    <section class="bookmark-part">
        <div class="container">
            <div class="row">
                @foreach (Auth::user()->getMyMessages as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 card-grid col-sm-12 col-md-12 col-lg-12">
                        <div class="product-card inline">
                            <div class="product-head">
                                <div class="dash-avatar">
                                        <a href="#">
                                            <img src="/images/avatar/01.jpg" alt="avatar">
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
                                        <a href="{{route('read-message', $item->slug)}}">{{strlen($item->message) > 51 ? substr($item->message,0,51).'...' : $item->message }}</a>
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

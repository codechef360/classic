@extends('layouts.master-layout')

@section('title')
    Wishlist
@endsection

@section('current-page')
    Wishlist
@endsection

@section('extra-styles')
    <link href="/css/datatable.min.css" rel="stylesheet" />
@endsection

@section('main-content')

    <div class="body-content blog-page outer-top-ts">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                    <div class="sidebar-module-container">
                        <div class="sidebar-widget product-tag wow fadeInUp">
                            <h3 class="section-title">Product Tags</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <div class="tag-list">
                                    <a class="item" title="Phone" href="category.html">Phone</a>
                                    <a class="item active" title="Vest" href="category.html">Vest</a>
                                    <a class="item" title="Smartphone" href="category.html">Smartphone</a>
                                    <a class="item" title="Furniture" href="category.html">Furniture</a>
                                    <a class="item" title="T-shirt" href="category.html">T-shirt</a>
                                    <a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
                                    <a class="item" title="Sneaker" href="category.html">Sneaker</a>
                                    <a class="item" title="Toys" href="category.html">Toys</a>
                                    <a class="item" title="Rose" href="category.html">Rose</a>
                                </div><!-- /.tag-list -->
                            </div><!-- /.sidebar-widget-body -->
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9 col-md-9">
                    @if(session()->has('error'))
                        <div class="alert alert-warning">
                           {!! session()->get('error') !!}
                        </div>
                    @endif
                    <div class="blog-post wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <table id="myAdverts" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Advert title</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp

                            @if(count($wishlists) > 0)
                                @foreach($wishlists as $wishlist)
                                {{dd($wishlist->getAdvert)}}
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            <a href="{{route('advert-detail', $wishlist->getAdvert->slug)}}"> <img src="/assets/attachments/ads/featured_image/{{$wishlist->getAdvert->featured_image}}" height="32" width="32" style="border-radius: 50%;"  alt=""> {{strlen($wishlist->getAdvert->title) > 31 ? substr($wishlist->getAdvert->title,0,31).'...' : $wishlist->getAdvert->title}}</a>
                                        </td>
                                        <td class="text-danger">{{!is_null($wishlist->getAdvert->created_at) ? date('d-m-Y', strtotime($wishlist->getAdvert->created_at)) : '-' }}</td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Advert title</th>
                                <th>Date</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>


        </div>
    </div>

@endsection

@section('extra-scripts')
    <script src="/js/datatable.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#myAdverts').DataTable();

        });
    </script>
@endsection

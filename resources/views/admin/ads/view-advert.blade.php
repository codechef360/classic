@extends('layouts.admin-layout')
@section('title')
    View Advert | {{$advert->title ?? ''}}
@endsection

@section('page-name')
    View Advert | {{$advert->title ?? ''}}
@endsection

@section('extra-styles')
    <link rel="stylesheet" type="text/css" href="/assets/css/widgets/modules-widgets.css">
    <style>
        .carousel-item img {
            max-height: 400px !important; /* input your desired height here */
            }
    </style>
@endsection
@section('main-content')
    <div class="col-12">
        <div class="row sales">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget widget-account-invoice-one">

                            <div class="widget-heading">
                                <h5 class="">Advert Details</h5>
                            </div>
                            <div class="widget-content">
                                <div class="invoice-box">

                                    <div class="acc-total-info">
                                        <h5>Amount</h5>
                                        <h6 class="text-center">{{$advert->getPackage->package_name ?? ''}}</h6>
                                        <p class="acc-amount">₦{{number_format($advert->getPackage->amount,2)}}</p>
                                    </div>

                                    <div class="inv-detail">
                                        <div class="info-detail-1">
                                            <p>Customer</p>
                                            <p>{{$advert->getCustomer->first_name ?? ''}} {{$advert->getCustomer->surname ?? ''}}</p>
                                        </div>
                                        <div class="info-detail-1">
                                            <p>Category</p>
                                            <p>{{$advert->getCategory->category_name ?? ''}}</p>
                                        </div>
                                        <div class="info-detail-2">
                                            <p>Subcategory</p>
                                            <p>{{$advert->getSubCategory->sub_category_name ?? ''}}</p>
                                        </div>
                                        <div class="info-detail-3 info-sub">
                                            <div class="info-detail">
                                                <p>Location</p>
                                                <p>{{$advert->getLocation->location_name ?? ''}}</p>
                                            </div>
                                            <div class="info-detail-3 info-sub">
                                                <div class="info-detail">

                                                    <p>Area</p>
                                                    <p>{{$advert->getArea->area_name ?? ''}}</p>
                                                </div>
                                            </div>
                                            <div class="info-detail-sub">
                                                <p>Start Date</p>
                                                <p>{{date('d/m/Y', strtotime($advert->start_date))}}</p>
                                            </div>
                                            <div class="info-detail-sub">
                                                <p>End Date</p>
                                                <p>{{date('d/m/Y', strtotime($advert->end_date))}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="inv-action">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{route('manage-adverts')}}" class="btn btn-primary">Customer</a>
                                            <button type="button" class="btn btn-warning" data-target="#endAdvertModal" data-toggle="modal">Update Status</button>
                                            <a href="{{url()->previous()}}" class="btn btn-secondary">Go Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt-3">

                        <div class="widget widget-activity-four">

                            <div class="widget-heading">
                                <h5 class="">Views @if($advert->getAdViews->count() > 0)<small class="badge badge-danger">{{$advert->getAdviews->count()}}</small>@endif</h5>
                            </div>

                            <div class="widget-content">

                                <div class="mt-container mx-auto ps ps--active-y">
                                    <div class="timeline-line">
                                        @foreach($advert->getAdViews as $view)
                                            <div class="item-timeline timeline-primary">
                                                <div class="t-dot" data-original-title="" title="">
                                                </div>
                                                <div class="t-text">
                                                    <p>{{$view->getCustomer->first_name ?? ''}} {{$view->getCustomer->surname ?? ''}}</p>
                                                    <p class="t-time">{{$view->created_at->diffForHumans()}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">

                                        </div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; height: 272px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 142px;">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-8 col-lg-6 col-sm-12 col-8 col-md-6  layout-spacing">
                @if (session()->has('success'))
                    <div class="alert alert-success">{!! session()->get('success') !!}</div>
                @endif
                <div class="widget-content widget-content-area br-6">
                    <blockquote class="blockquote">
                        <h5 class="">{{$advert->title ?? ''}}</h5>

                        {!! $advert->description ?? '' !!}
                        <small> <cite title="Author">{{$advert->getCustomer->first_name ?? ''}} {{$advert->getCustomer->surname ?? ''}}</cite></small>
                    </blockquote>

                </div>
                <div class="widget widget-table-one mt-4">
                    <div class="widget-heading">
                        <h5 class="">Product Images</h5>
                    </div>


                    <div class="widget-content">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">

                                @foreach ($advert->getGalleryImages as $key => $slider)
                                    <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                        <img class="d-block w-100" src="/attachments/product-gallery/{{$slider->directory ?? ''}}" alt="{{$advert->title ?? ''}}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="widget widget-table-one mt-4">
                    <div class="widget-heading">
                        <h5 class="">Comments</h5>
                    </div>

                    <div class="widget-content">
                        @foreach($advert->getAdComments as $comment)
                            <div class="transactions-list">
                                <div class="t-item">
                                    <div class="t-company-name">
                                        <div class="t-icon">
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                            </div>
                                        </div>
                                        <div class="t-name">
                                            <h4>{{$comment->getCustomer->first_name ?? ''}} {{$comment->getCustomer->surname ?? ''}}</h4>
                                            <p class="meta-date">{{date('d/m/Y h:ia', strtotime($comment->created_at))}}</p>
                                            <p>{!! $comment->comment ?? '' !!}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>

    </div>
    <div class="modal fade" id="endAdvertModal" tabindex="-1" role="dialog" aria-labelledby="endAdvertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning ">
                <h5 class="modal-title text-white" id="endAdvertModalLabel">Update Advert Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{route('update-advert-status')}}" method="post">
            <div class="modal-body">
                <p>Update advert status</p>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option selected disabled>--Select status--</option>
                        <option value="0">Pending</option>
                        <option value="1">In-progress</option>
                        <option value="2">Expired</option>
                        <option value="3">Declined</option>
                        <option value="4">Finished</option>
                    </select>
                    @error('status')
                        <i class="text-danger">{{$message}}</i>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                    @csrf
                    <input type="hidden" name="advert" value="{{$advert->id}}" >
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> No, please</button>
                    <button type="submit" class="btn btn-danger">Yes, please</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-scripts')

@endsection

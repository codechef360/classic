@extends('layouts.master-layout')

@section('title')
    Profile
@endsection

@section('meta-title')
    Profile
@endsection

@section('meta-keywords')
    Profile
@endsection
@section('extra-styles')
    <link rel="stylesheet" href="/css/custom/profile.css">
@endsection
@section('current-page')
    Profile
@endsection
@section('breadcrumb')
    @include('partials._breadcrumb')
@endsection
@section('main-content')
@include('customer.partials._dash-header')
<section class="profile-part">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {!! session()->get('success') !!}
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="account-card">
                            <div class="account-title">
                                <h3>Membership</h3>
                                <a href="{{route('settings')}}">Edit</a>
                            </div>

                            <ul class="account-card-list">
                                <li>
                                    <h5>Status</h5>
                                    <p>{{Auth::user()->account_status == 1 ? 'Active' : 'Deactivated'}}</p>
                                </li>
                                <li>
                                    <h5>Member since</h5>
                                    <p>{{date('d F, Y', strtotime(Auth::user()->created_at))}}</p>
                                </li>
                                <li>
                                    <h5>Membership</h5>
                                    <p>{!! Auth::user()->verification == 0 ? "<i class='text-warning'>unverified</i>" : "<i class='text-success'>unverified</i>" !!}</p>
                                </li>
                                <li>
                                    <h5>Date Verified</h5>
                                    <p>{{!is_null(Auth::user()->date_verified) ? date('d F, Y', strtotime(Auth::user()->date_verified)) : '-'}}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="account-card">
                            <div class="account-title">
                                <h3>Contact Info</h3>
                                <a href="{{route('settings')}}">Edit</a>
                            </div>
                            <ul class="account-card-list">
                                <li>
                                    <h5>Website:</h5>
                                    <p>
                                        <a href="{{Auth::user()->company_website ?? 'javascript:void(0);'}}" target="_blank">{{Auth::user()->company_website ?? '-'}}</a>
                                    </p>
                                </li>
                                <li>
                                    <h5>Company Address:</h5>
                                    <p>
                                        <a href="javascript:void(0);">{{Auth::user()->company_address ?? '-'}}</a>
                                    </p>
                                </li>
                                <li>
                                    <h5>Phone:</h5>
                                    <p>
                                        <a href="tel:{{Auth::user()->company_phone ?? ''}}">{{Auth::user()->company_phone ?? ''}}</a>
                                    </p>
                                </li>
                                <li>
                                    <h5>Skype:</h5>
                                    <p>live:richard</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="account-card">
                            <div class="account-title">
                                <h3>Billing Address</h3>
                                <a href="setting.html">Edite</a>
                            </div>
                            <ul class="account-card-list">
                                <li>
                                    <h5>Post Code:</h5>
                                    <p>1420</p>
                                </li>
                                <li>
                                    <h5>State:</h5>
                                    <p>West Jalkuri</p>
                                </li>
                                <li>
                                    <h5>City:</h5>
                                    <p>Narayanganj</p>
                                </li>
                                <li>
                                    <h5>Country:</h5>
                                    <p>Bangladesh</p>
                                </li>
                            </ul>
                        </div>
                        <div class="account-card">
                            <div class="account-title">
                                <h3>Shipping Address</h3>
                                <a href="setting.html">Edite</a>
                            </div>
                            <ul class="account-card-list">
                                <li>
                                    <h5>Post Code:</h5>
                                    <p>1100</p>
                                </li>
                                <li>
                                    <h5>State:</h5>
                                    <p>Kawran Bazar</p>
                                </li>
                                <li>
                                    <h5>City:</h5>
                                    <p>Dhaka</p>
                                </li>
                                <li>
                                    <h5>Country:</h5>
                                    <p>Bangladesh</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

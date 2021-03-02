@extends('layouts.master-layout')

@section('title')
    Settings
@endsection

@section('meta-title')
    Settings
@endsection

@section('meta-keywords')
    Settings
@endsection
@section('extra-styles')
    <link rel="stylesheet" href="/css/custom/setting.css">
    <link rel="stylesheet" href="/css/custom/select2.min.css">
@endsection
@section('current-page')
    Settings
@endsection
@section('breadcrumb')
    @include('partials._breadcrumb')
@endsection
@section('main-content')
    @include('customer.partials._dash-header')
     <div class="setting-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-card alert fade show">
                            <div class="account-title">
                                <h3>Edit Profile</h3>
                                <p>Fields marked <sup class="text-danger">*</sup> are compulsory.</p>
                            </div>
                            <form class="setting-form" action="{{route('save-changes')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">First Name<sup class="text-danger">*</sup></label>
                                            <input type="text" name="first_name" value="{{old('first_name', Auth::user()->first_name)}}" class="form-control" placeholder="First Name">
                                            @error('first_name')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Surname<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{old('surname', Auth::user()->surname)}}">
                                            @error('surname')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Email Address<sup class="text-danger">*</sup></label>
                                            <input type="text" readonly name="email" value="{{old('email', Auth::user()->email)}}" class="form-control" placeholder="Email">
                                            @error('email')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Phone No.<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" placeholder="Phone No." name="phone_no" value="{{old('phone_no', Auth::user()->phone_no)}}">
                                            @error('phone_no')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Address<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" placeholder="Address" name="address" value="{{old('address', Auth::user()->address)}}">
                                            @error('address')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">About us/me</label>
                                            <textarea style="resize: none;" name="about_us" class="form-control" placeholder="About us/me">{{old('about_us', Auth::user()->about)}}</textarea>
                                            @error('about_us')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Company<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" placeholder="{{config('app.name')}}" name="company_name" value="{{old('company_name', Auth::user()->company_name)}}">
                                            @error('company_name')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Office Address<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" placeholder="Office Address" name="office_address" value="{{old('office_address', Auth::user()->company_address)}}">
                                            @error('office_address')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Office Phone</label>
                                            <input type="text"  name="office_phone" value="{{old('office_phone', Auth::user()->company_phone)}}" class="form-control" placeholder="Office Phone">
                                            @error('office_phone')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Website</label>
                                            <input type="text" class="form-control" placeholder="http://www.example.com" name="website" value="{{old('website', Auth::user()->company_website)}}">
                                            @error('website')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Location<sup class="text-danger">*</sup></label>
                                            <select name="location" id="location" class="form-control js-example-basic-single">
                                                <option selected disabled>--Select location--</option>
                                                @foreach ($locations as $locate)
                                                    <option value="{{$locate->id}}">{{$locate->location_name ?? ''}}</option>
                                                @endforeach
                                            </select>
                                            @error('location')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Area<sup class="text-danger">*</sup></label>
                                            <div id="area-wrapper"></div>
                                            @error('area')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Avatar</label>
                                            <input type="file" name="avatar" class="form-control">
                                            @error('avatar')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Logo</label>
                                            <input type="file" name="logo" class="form-control">
                                            @error('logo')
                                                <i class="text-danger">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-inline">
                                            <i class="fas fa-user-check"></i>
                                            <span>Save changes</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('extra-scripts')
<script src="/js/custom/select2.min.js"></script>
<script src="/js/custom/axios.min.js"></script>
<script>
    $(document).ready(function(){
        $('.js-example-basic-single').select2();
        $(document).on('change', '#location', function(e){
            e.preventDefault();
            axios.post('/get-location', {location:$(this).val()})
            .then(response=>{
                $('#area-wrapper').html(response.data)
                   // $(".js-example-basic-single").select2();
            });
        });
    });
</script>

@endsection

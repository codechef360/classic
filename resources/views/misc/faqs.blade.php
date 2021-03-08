@extends('layouts.master-layout')
@section('title')
    Frequently Asked Questions
@endsection
@section('extra-styles')
<link rel="stylesheet" href="/css/custom/leftbar-list.css">
@endsection
@section('meta-title')
    Frequently Asked Questions
@endsection
@section('meta-keyword')
    Frequently Asked Questions
@endsection

@section('main-content')
 @include('partials._slider-board')
<section class="bookmark-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-filter mt-3">
                        <div class="product-page-number">
                            <p>Frequently Asked Questions</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
               <div class="col-md-12">
                   <h3>How to sell on Donzy?</h3>
                   <h5>1. Register</h5>
                   <p>Register using your e-mail and phone number. Make sure you’re entering a correct phone number, so your clients could reach you!</p>
                   <h5>2. Make photos of your item.</h5>
                   <p>Feel free to make a lot of photos using your smartphone. Make sure they show your item in the best light.</p>
                   <h5>3. Press SELL.</h5>
                   <p>Choose a proper category, upload your photos and write a clear title and full description of your item. Enter a fair price, select attributes and send your advert to review!</p>
                   <h5>4. Answer the messages and calls from your clients!</h5>
                   <p>If everything is ok with your advert, it’ll be on our site in a couple of hours after sending to moderation. We’ll send you a letter and notification when your advert goes live. Check your messages and be ready to earn money!</p>

               </div>
            </div>
        </div>
    </section>
@endsection

@section('extra-scripts')
 <script src="/js/custom/interaction.js"></script>
 <script src="/js/custom/axios.min.js"></script>
@endsection

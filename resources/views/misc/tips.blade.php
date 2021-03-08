@extends('layouts.master-layout')
@section('title')
    Tips
@endsection
@section('extra-styles')
<link rel="stylesheet" href="/css/custom/leftbar-list.css">
@endsection
@section('meta-title')
    Tips
@endsection
@section('meta-keyword')
    Tips
@endsection

@section('main-content')
 @include('partials._slider-board')
<section class="bookmark-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-filter mt-3">
                        <div class="product-page-number">
                            <p>Tips</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
               <div class="col-md-12">
                   <h3>Tips</h3>
                   <h5>1. General</h5>
                   <p>We are highly focused on the security and can solve any issues in short-terms. That’s why we ask you, kindly, to leave a review after purchasing. If you run into any problems with a seller, you can report us and Donzy Team will check this seller as soon as possible.</p>
                   <h5>2. Personal safety tips.</h5>
                   <p>- Do not pay in advance, even for the delivery</p>
                   <p>- Try to meet at a safe, public location</p>
                   <p>- Check the item BEFORE you buy it</p>
                   <p>- Pay only after collecting the item</p>
                   <h5>3. Secure payments.</h5>
                   <p>Donzy provides Premium Services for those who want to sell and earn more. We accept both online and offline payments for these services. We guarantee secure and reliable payments on Obaago</p>

               </div>
            </div>
        </div>
    </section>
@endsection

@section('extra-scripts')
 <script src="/js/custom/interaction.js"></script>
 <script src="/js/custom/axios.min.js"></script>
@endsection

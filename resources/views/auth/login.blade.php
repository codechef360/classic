<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Mironcoder">
        <meta name="email" content="">
        <meta name="profile" content="">
        <meta name="name" content="Classicads">
        <meta name="type" content="{{config('app.name')}}">
        <meta name="title" content="{{config('app.name')}}">
        <meta name="keywords" content="classicads, classified, ads, classified ads, listing, business, directory, jobs, marketing, portal, advertising, local, posting, ad listing, ad posting,">
        <title>Classicads - User Form</title>
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" href="/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="/css/custom/main.css">
        <link rel="stylesheet" href="/css/custom/user-form.css">
    </head>
    <body>
        <section class="user-form-part">
            <div class="user-form-banner">
                <div class="user-form-content">
                    <a href="#">
                        <img src="/images/logo.png" alt="logo">
                    </a>
                    <h1>
                        Advertise your assets
                        <span>Buy what are you needs.</span>
                    </h1>
                    <p>Biggest Online Advertising Marketplace in the World.</p>
                </div>
            </div>
            <div class="user-form-category">
                <div class="user-form-header">
                    <a href="#">
                        <img src="/images/logo.png" alt="logo">
                    </a>
                    <a href="{{route('home')}}">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="user-form-category-btn">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="#login-tab" class="nav-link active" data-toggle="tab">sign in</a>
                        </li>
                        <li>
                            <a href="#register-tab" class="nav-link" data-toggle="tab">sign up</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane active" id="login-tab">
                    <div class="user-form-title">
                        <h2>Welcome!</h2>
                        <p>Use credentials to access your account.</p>
                    </div>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {!! session()->get('success') !!}
                        </div>
                    @endif
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email address">
                                    <small class="form-alert">Please follow this example - info@example.com</small>
                                </div>
                                @error('email')
                                    <i class="text-danger">{{$message}}</i>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password" name="password"
                                        placeholder="Password"
                                    >

                                    <button type="button" class="form-icon">
                                        <i class="eye fas fa-eye"></i>
                                    </button>
                                    <small class="form-alert">Password must be 6 characters</small>
                                </div>
                                @error('password')
                                    <i class="text-danger">{{$message}}</i>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" id="signin-check">
                                        <label class="custom-control-label" for="signin-check">Remember me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group text-right">
                                    <a href="#" class="form-forgot">Forgot password?</a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-inline">
                                        <i class="fas fa-unlock"></i>
                                        <span>Login to your account</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="user-form-direction">
                        <p>
                            Don't have an account? click on the
                            <span>( sign up )</span>
                            button above.
                        </p>
                    </div>
                </div>
                <div class="tab-pane" id="register-tab">
                    <div class="user-form-title">
                        <h2>Register</h2>
                        <p>Setup a new account in a minute.</p>
                    </div>
                    <form action="{{route('register')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" value="{{old('first_name')}}" name="first_name" class="form-control" placeholder="First Name">
                                    <small class="form-alert">Please follow this example - Joseph</small>
                                    @error('first_name')
                                        <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" value="{{old('email_address')}}" name="email_address" class="form-control" placeholder="Email Address">
                                    <small class="form-alert">Please follow this example - info@example.com</small>
                                    @error('email_address')
                                        <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" value="{{old('phone_no')}}" name="phone_no" class="form-control" placeholder="Phone No.">
                                    <small class="form-alert">Please follow this example - phone no.</small>
                                    @error('phone_no')
                                        <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <button class="form-icon">
                                        <i class="eye fas fa-eye"></i>
                                    </button>
                                    <small class="form-alert">Password must be 6 characters</small>
                                    @error('password')
                                        <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="password"  name="password_confirmation" class="form-control" placeholder="Re-type Password">
                                    <button class="form-icon">
                                        <i class="eye fas fa-eye"></i>
                                    </button>
                                    <small class="form-alert">Password must be 6 characters</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agreement" class="custom-control-input" id="signup-check">
                                        <label class="custom-control-label" for="signup-check">
                                            I agree to the all
                                            <a href="#">terms & consitions</a>
                                            of bebostha.
                                        </label>
                                    </div>
                                    @error('agreement')
                                        <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-inline">
                                        <i class="fas fa-user-check"></i>
                                        <span>Create new account</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="user-form-direction">
                        <p>
                            Already have an account? click on the
                            <span>( sign in )</span>
                            button above.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <script src="/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="/js/vendor/popper.min.js"></script>
        <script src="/js/vendor/bootstrap.min.js"></script>
        <script src="/js/custom/main.js"></script>
    </body>
</html>

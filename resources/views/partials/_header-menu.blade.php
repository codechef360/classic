        <header class="header-part">
            <div class="container">
                <div class="header-content">
                    <div class="header-left">
                        <ul class="header-widget">
                            <li>
                                <button type="button" class="header-menu">
                                    <i class="fas fa-align-left"></i>
                                </button>
                            </li>
                            <li>
                                <a href="{{route('home')}}" class="header-logo">
                                    <img src="/images/logo.png" alt="logo">
                                </a>
                            </li>
                            @if(!Auth::check())
                                <li>
                                    <a href="{{route('login')}}" class="header-user">
                                        <i class="fas fa-user"></i>
                                        <span>Login/Register</span>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::check())
                                <li>
                                    <a href="{{route('logout')}}" class="header-user">
                                        <i class="fas fa-user"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>

                            @endif
                            <li>
                                <button type="button" class="header-src">
                                    <i class="fas fa-search"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <form class="header-search">
                        <div class="header-main-search">
                            <button type="button" class="header-search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                            <input type="text" class="form-control" placeholder="Search, Whatever you needs...">

                        </div>
                    </form>
                    <div class="header-right">
                        @if (Auth::check())
                            <ul class="header-widget">
                                <li>
                                    <a href="{{route('notifications')}}" class="header-notify">
                                        <i class="fas fa-bell"></i>
                                        <sup>{{number_format(Auth::user()->getNotifications->whereNull('read_at')->count())}}</sup>
                                    </a>
                                </li>
                                <li>
                                    <a class="header-message" href="{{route('my-messages')}}">
                                        <i class="fas fa-envelope"></i>
                                        <sup>{{number_format(Auth::user()->getMyMessages->where('is_read',0)->count())}}</sup>
                                    </a>
                                </li>
                            </ul>
                        @endif
                        <a href="{{route('post-your-ad')}}" class="btn btn-inline">
                            <i class="fas fa-plus-circle"></i>
                            <span>post your ad</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <div class="sidebar-part">
            <div class="sidebar-body">
                <div class="sidebar-header">
                    <a href="{{route('home')}}" class="sidebar-logo">
                        <img src="/images/logo.png" alt="logo">
                    </a>
                    <button class="sidebar-cross">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="sidebar-content">
                   @if(Auth::check())
                        <div class="sidebar-profile">
                            <a href="{{route('home')}}" class="sidebar-avatar">
                                <img src="/attachments/avatar/{{Auth::user()->avatar ?? 'avatar.png'}}" alt="avatar">
                            </a>
                            <h4>
                                <a href="{{route('home')}}" class="sidebar-name">{{Auth::user()->first_name ?? ''}} {{Auth::user()->surname ?? ''}}</a>
                            </h4>
                            <a href="{{route('post-your-ad')}}" class="btn btn-inline sidebar-btn">
                                <i class="fas fa-plus-circle"></i>
                                <span>post your ad</span>
                            </a>
                        </div>
                   @endif
                    <div class="sidebar-menu">
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="#main-menu" class="nav-link active" data-toggle="tab">Main Menu</a>
                            </li>
                            @if(Auth::check())
                                <li>
                                    <a href="#author-menu" class="nav-link" data-toggle="tab">Author Menu</a>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-pane active" id="main-menu">
                            <ul class="navbar-list">
                                @if (Auth::check())
                                    <li class="navbar-item">
                                        <a class="navbar-link" href="{{route('marketplace')}}">Marketplace</a>
                                    </li>
                                @endif
                                @if (!Auth::check())
                                    <li class="navbar-item">
                                        <a class="navbar-link" href="{{route('home')}}">
                                            Home
                                        </a>
                                    </li>
                                    <li class="navbar-item">
                                        <a class="navbar-link" href="{{route('post-your-ad')}}">Post Your Ad</a>
                                    </li>
                                    <li class="navbar-item">
                                        <a class="navbar-link" href="{{route('faqs')}}">FAQs</a>
                                    </li>
                                    <li class="navbar-item">
                                        <a class="navbar-link" href="{{route('register')}}">Register/Login</a>
                                    </li>
                                    <li class="navbar-item">
                                        <a class="navbar-link" href="{{route('tips')}}">Tips</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                        @if(Auth::check())
                        <div class="tab-pane" id="author-menu">
                            <ul class="navbar-list">
                                <li class="navbar-item">
                                    <a class="navbar-link" href="{{route('profile')}}">Profile</a>
                                </li>
                                <li class="navbar-item">
                                    <a class="navbar-link" href="{{route('post-your-ad')}}">Ad Post</a>
                                </li>
                                <li class="navbar-item">
                                    <a class="navbar-link" href="{{route('my-adverts')}}">My Adverts</a>
                                </li>
                                <li class="navbar-item">
                                    <a class="navbar-link" href="{{route('settings')}}">Settings</a>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="{{route('wishlist')}}">
                                        <span>Watchlist</span>
                                        <span>{{number_format(Auth::user()->getMyWatchlist->count())}}</span>
                                    </a>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="{{route('my-messages')}}">
                                        <span>Message</span>
                                        <span>{{number_format(Auth::user()->getMyMessages->where('is_read',0)->count())}}</span>
                                    </a>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="{{route('notifications')}}">
                                        <span>Notification</span>
                                        <span>{{number_format(Auth::user()->getNotifications->whereNull('is_read')->count())}}</span>
                                    </a>
                                </li>
                                <li class="navbar-item">
                                    <a class="navbar-link" href="{{route('logout')}}">Logout</a>
                                </li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="sidebar-footer">
                        <p>All Rights Reserved By
                            <a href="{{route('home')}}" target="_blank">{{config('app.name')}}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

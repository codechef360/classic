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
                                <a href="index.html" class="header-logo">
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
                            <button type="submit" class="header-search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                            <input type="text" class="form-control" placeholder="Search, Whatever you needs...">
                            <button type="button" class="header-option-btn tooltip">
                                <i class="fas fa-sliders-h"></i>
                                <span class="tooltext left">FilterOption</span>
                            </button>
                        </div>
                        <div class="header-search-option">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="State">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Category">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-btn">
                                        <button type="submit" class="btn btn-inline">
                                            <i class="fas fa-search"></i>
                                            <span>Search Here</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="header-right">
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
                    <a href="index.html" class="sidebar-logo">
                        <img src="/images/logo.png" alt="logo">
                    </a>
                    <button class="sidebar-cross">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="sidebar-content">
                   @if(Auth::check())
                        <div class="sidebar-profile">
                            <a href="#" class="sidebar-avatar">
                                <img src="images/avatar/01.jpg" alt="avatar">
                            </a>
                            <h4>
                                <a href="#" class="sidebar-name">{{Auth::user()->first_name ?? ''}} {{Auth::user()->surname ?? ''}}</a>
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
                                <li class="navbar-item">
                                    <a class="navbar-link" href="{{route('marketplace')}}">Marketplace</a>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="#">
                                        <span>Categories</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <ul class="dropdown-list">
                                        <li>
                                            <a class="dropdown-link" href="category-list.html">category list</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-link" href="category-details.html">category details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="#">
                                        <span>Advertise List</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <ul class="dropdown-list">
                                        <li>
                                            <a class="dropdown-link" href="grid-list.html">grid list</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-link" href="leftbar-list.html">leftbar list</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-link" href="rightbar-list.html">rightbar list</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="#">
                                        <span>Advertise details</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <ul class="dropdown-list">
                                        <li>
                                            <a class="dropdown-link" href="grid-details.html">grid details</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-link" href="leftbar-details.html">leftbar details</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-link" href="rightbar-details.html">rightbar details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="#">
                                        <span>Pages</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <ul class="dropdown-list">
                                        <li>
                                            <a class="dropdown-link" href="about.html">About Us</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-link" href="compare.html">Ad Compare</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-link" href="cities.html">Ad by Cities</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-link" href="price.html">Pricing Plan</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-link" href="user-form.html">User Form</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-link" href="404.html">404</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="navbar-item navbar-dropdown">
                                    <a class="navbar-link" href="#">
                                        <span>blogs</span>
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <ul class="dropdown-list">
                                        <li>
                                            <a class="dropdown-link" href="blog-list.html">Blog list</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-link" href="blog-details.html">blog details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="navbar-item">
                                    <a class="navbar-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        @if(Auth::check())
                        <div class="tab-pane" id="author-menu">
                            <ul class="navbar-list">
                                <li class="navbar-item">
                                    <a class="navbar-link" href="dashboard.html">Dashboard</a>
                                </li>
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
                                    <a class="navbar-link" href="bookmark.html">
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
                            <a href="#">Classicads</a>
                        </p>
                        <p>Developed By
                            <a href="#">Jo</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

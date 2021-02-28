        <section class="dash-header-part">
            <div class="container">
                <div class="dash-header-card">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="dash-header-left">
                                <div class="dash-avatar">
                                    <a href="#">
                                        <img src="/images/avatar/01.jpg" alt="avatar">
                                    </a>
                                </div>
                                <div class="dash-intro">
                                    <h4>
                                        <a href="javascript:void(0);">{{Auth::user()->first_name ?? ''}} {{Auth::user()->surname ?? ''}}</a>
                                    </h4>
                                    <ul class="dash-meta">
                                        <li>
                                            <i class="fas fa-phone-alt"></i>
                                            <span>{{Auth::user()->phone_no ?? '-'}}</span>
                                        </li>
                                        <li>
                                            <i class="fas fa-envelope"></i>
                                            <span>{{Auth::user()->email ?? '-'}}</span>
                                        </li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>{{Auth::user()->address ?? '-'}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="dash-header-right">
                                <div class="dash-focus dash-list">
                                    <h2>{{number_format(Auth::user()->getCustomerAdverts->count())}}</h2>
                                    <p>listing ads</p>
                                </div>
                                <div class="dash-focus dash-book">
                                    <h2>{{number_format(Auth::user()->getCustomerWatchlist->count())}}</h2>
                                    <p>Watchlist ads</p>
                                </div>
                                <div class="dash-focus dash-rev">
                                    <h2>{{number_format(Auth::user()->getCustomerReviews->count())}}</h2>
                                    <p>total review</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!empty(Auth::user()->about))
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dash-header-alert alert fade show">
                                    <p>{{Auth::user()->about ?? ''}}</p>

                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dash-menu-list">
                                <ul>
                                    <li>
                                        <a href="dashboard.html">dashboard</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('profile') ? 'active' : '' }}" href="{{route('profile')}}">Profile</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('post-your-ad') ? 'active' : '' }}" href="{{route('post-your-ad')}}">ad post</a>
                                    </li>
                                    <li>
                                        <a class="{{Request::is('my-adverts') ? 'active' : ''}}" href="{{route('my-adverts')}}">my adverts</a>
                                    </li>
                                    <li>
                                        <a class="{{Request::is('settings') ? 'active' : ''}}" href="{{route('settings')}}">settings</a>
                                    </li>
                                    <li>
                                        <a class="{{Request::is('wishlist') ? 'active' : ''}}" href="{{route('wishlist')}}">Wishlist</a>
                                    </li>
                                    <li>
                                        <a class="{{Request::is('my-messages') ? 'active' : ''}}" href="{{route('my-messages')}}">message</a>
                                    </li>
                                    <li>
                                        <a class="{{Request::is('notifications') ? 'active' : ''}}" href="{{route('notifications')}}">notification</a>
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}">logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

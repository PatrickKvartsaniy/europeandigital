<div class="site-header-wrapper penci-trans-nav">
    <div id="masthead-sticky-wrapper" class="sticky-wrapper" style="height: 80px;">
        <header id="masthead" class="site-header header--s1" data-height="100" itemscope="itemscope"
                itemtype="http://schema.org/WPHeader">
            <div class="penci-container-1170 header-content__container">
                <div class="site-branding">
                    <h2>
                        <a href="/"
                           class="custom-logo-link" rel="home">
                            <img width="133" height="20"
                                 src="/img/logo.png"
                                 class="custom-logo"
                                 alt="{{ config('app.name', 'Laravel') }}">
                        </a>
                    </h2>
                </div><!-- .site-branding -->
                <nav id="site-navigation" class="main-navigation pencimn-slide_down" itemscope=""
                     itemtype="http://schema.org/SiteNavigationElement">
                    <ul id="menu-main-menu" class="menu">
                        <li id="menu-item-16"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-16">
                            <a href="/" itemprop="url">Home</a>
                        </li>
                        <li id="menu-item-16"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-16">
                            <a href="/news" itemprop="url">News</a>
                        </li>
                        <li id="menu-item-15"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15">
                            <a itemprop="url">
                                <span class="vp45yf z1asCe bjaP2b" style="right:16px;">
                                    Members
                                    <svg focusable="false" style="width: 20px; margin: -5px;"
                                         xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 24 24">
                                        <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path>
                                    </svg>
                                </span>
                            </a>
                            <ul class="sub-menu">
                                {{--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-312">--}}
                                {{--<a href="{{ urlloc('/members/organizations') }}" itemprop="url">Organizations</a>--}}
                                {{--</li>--}}
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-312">
                                    <a href="{{ urlloc('/members/current-members') }}" itemprop="url">Current
                                        members</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-312">
                                    <a href="{{ urlloc('/members/become-a-member') }}" itemprop="url">Become a
                                        member</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-13"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13">
                            <a itemprop="url">
                                <span class="vp45yf z1asCe bjaP2b" style="right:16px;">
                                    Policy
                                    <svg focusable="false" style="width: 20px; margin: -5px;"
                                         xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 24 24">
                                        <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path>
                                    </svg>
                                </span>
                            </a>
                            <ul class="sub-menu">
                                @foreach($categoriesForMenu as $item)
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-312">
                                        <a href="{{ urlloc('/policy/'.$item->slug) }}" itemprop="url">{{ $item->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li id="menu-item-14"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14">
                            <a itemprop="url">
                                <span class="vp45yf z1asCe bjaP2b" style="right:16px;">
                                    About
                                    <svg focusable="false" style="width: 20px; margin: -5px;"
                                         xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 24 24">
                                        <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path>
                                    </svg>
                                </span>
                            </a>

                            <ul class="sub-menu">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-312">
                                    <a href="{{ urlloc('/about/about-us') }}" itemprop="url">About us</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-312">
                                    <a href="{{ urlloc('/about/contact-us') }}" itemprop="url">Contact us</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-312">
                                    <a href="{{ urlloc('/about/team') }}" itemprop="url">Team</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-312">
                                    <a href="{{ urlloc('/about/vacancies') }}" itemprop="url">Vacancies</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav><!-- #site-navigation -->
                <div class="header__social-search">
                    {{--<div class="header__search header__search_dis_bg" id="top-search">--}}
                    {{--<a class="search-click"><i class="fa fa-search"></i></a>--}}
                    {{--<div class="show-search">--}}
                    {{--<div class="show-search__content">--}}
                    {{--<form method="get" class="search-form"--}}
                    {{--action="http://pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/">--}}
                    {{--<label>--}}
                    {{--<span class="screen-reader-text">Search for:</span>--}}

                    {{--<input id="penci-header-search" type="search" class="search-field"--}}
                    {{--placeholder="Enter keyword..." value="" name="s"--}}
                    {{--autocomplete="off">--}}
                    {{--</label>--}}
                    {{--<button type="submit" class="search-submit">--}}
                    {{--<i class="fa fa-search"></i>--}}
                    {{--<span class="screen-reader-text">Search</span>--}}
                    {{--</button>--}}
                    {{--</form>--}}
                    {{--<div class="penci-ajax-search-results">--}}
                    {{--<div id="penci-ajax-search-results-wrapper"--}}
                    {{--class="penci-ajax-search-results-wrapper"></div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <div class="header__social-media">
                        <div class="header__content-social-media">
                            <a class="social-media-item socail_media__facebook" target="_blank" href="{{$settings->global_facebook_link}}"
                               title="Facebook" rel="noopener">
                                <span class="socail-media-item__content">
                                    <i class="fa fa-facebook"></i>
                                    <span class="social_title screen-reader-text">Facebook</span>
                                </span>
                            </a>
                            <a class="social-media-item socail_media__email_me" target="_blank" href="mailto:{{$settings->global_email_link}}"
                               title="Email" rel="noopener">
                                <span class="socail-media-item__content">
                                    <i class="fa fa-envelope"></i>
                                    <span class="social_title screen-reader-text">Email</span>
                                </span>
                            </a>
                            <a class="social-media-item socail_media__twitter" target="_blank" href="{{$settings->global_twitter_link}}"
                               title="Twitter" rel="noopener">
                                <span class="socail-media-item__content">
                                    <i class="fa fa-twitter"></i>
                                    <span class="social_title screen-reader-text">Twitter</span>
                                </span>
                            </a>
                            <a class="social-media-item socail_media__linkedin" target="_blank" href="{{$settings->global_linkedin_link}}"
                               title="LinkedIn" rel="noopener">
                                <span class="socail-media-item__content">
                                    <i class="fa fa-linkedin"></i>
                                    <span class="social_title screen-reader-text">LinkedIn</span>
                                </span>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </header>
    </div><!-- #masthead -->
</div>
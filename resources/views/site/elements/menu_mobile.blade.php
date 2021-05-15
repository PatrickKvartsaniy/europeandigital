<aside class="mobile-sidebar ">
    <div id="sidebar-nav-logo">
        <a href="/" class="custom-logo-link"
           rel="home">
            <img width="238" height="27"
                 src="/img/logo.png"
                 class="custom-logo" alt="Digital Europe">
        </a>
    </div>
    <div class="header-social sidebar-nav-social">
        <div class="inner-header-social">
            <a class="social-media-item socail_media__facebook" target="_blank"
               href="{{$settings->global_facebook_link}}" title="Facebook"
               rel="noopener">
                <span class="socail-media-item__content">
                    <i class="fa fa-facebook"></i>
                    <span class="social_title screen-reader-text">Facebook</span>
                </span>
            </a>
            <a class="social-media-item socail_media__twitter" target="_blank" href="{{$settings->global_twitter_link}}"
               title="Twitter" rel="noopener">
                <span class="socail-media-item__content">
                    <i class="fa fa-twitter"></i>
                    <span class="social_title screen-reader-text">Twitter</span>
                </span>
            </a>
            <a class="social-media-item socail_media__linkedin" target="_blank"
               href="{{$settings->global_linkedin_link}}" title="Linkedin"
               rel="noopener">
                <span class="socail-media-item__content">
                    <i class="fa fa-linkedin"></i>
                    <span class="social_title screen-reader-text">Linkedin</span>
                </span>
            </a>
            <a class="social-media-item socail_media__email_me"
               target="_blank" href="mailto:{{$settings->global_email_link}}"
               title="Email" rel="noopener">
                <span class="socail-media-item__content">
                    <i class="fa fa-envelope"></i>
                    <span class="social_title screen-reader-text">Email</span>
                </span>
            </a>
        </div>
    </div>
    <nav class="mobile-navigation" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
        <ul id="primary-menu-mobile" class="primary-menu-mobile">
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
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-312">
                        <a href="{{ urlloc('/members/organizations') }}" itemprop="url">Organizations</a>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-312">
                        <a href="{{ urlloc('/members/individual-members') }}" itemprop="url">Individual
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
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-221">
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
    </nav>
</aside>
<a id="close-sidebar-nav" class="header-1 active"><i class="fa fa-close"></i></a>
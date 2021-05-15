<div class="penci-header-mobile">
    <div class="penci-header-mobile_container">
        <button class="menu-toggle navbar-toggle" aria-expanded="false"><span
                    class="screen-reader-text">Primary Menu</span><i
                    class="fa fa-bars"></i></button>
        <div class="site-branding">
            <a href="/" class="custom-logo-link" rel="home">
                <img width="133" height="30"
                     src="/img/logo.png"
                     class="custom-logo"
                     alt="{{ config('app.name', 'Laravel') }}"></a>
        </div>
        <div class="header__search-mobile header__search header__search_dis_bg" id="top-search-mobile" style="display: none;">
            <a class="search-click"><i class="fa fa-search"></i></a>
            <div class="show-search" >
                <div class="show-search__content">
                    <form method="get" class="search-form"
                          action="/search/">
                        <label>
                            <span class="screen-reader-text">Search for:</span>
                            <input type="text" id="penci-search-field-mobile"
                                   class="search-field penci-search-field-mobile" placeholder="Enter keyword..."
                                   value="" name="s" autocomplete="off">
                        </label>
                        <button type="submit" class="search-submit">
                            <i class="fa fa-search"></i>
                            <span class="screen-reader-text">Search</span>
                        </button>
                    </form>
                    <div class="penci-ajax-search-results">
                        <div class="penci-ajax-search-results-wrapper"></div>
                        <div class="penci-loader-effect penci-loading-animation-9">
                            <div class="penci-loading-circle">
                                <div class="penci-loading-circle1 penci-loading-circle-inner"></div>
                                <div class="penci-loading-circle2 penci-loading-circle-inner"></div>
                                <div class="penci-loading-circle3 penci-loading-circle-inner"></div>
                                <div class="penci-loading-circle4 penci-loading-circle-inner"></div>
                                <div class="penci-loading-circle5 penci-loading-circle-inner"></div>
                                <div class="penci-loading-circle6 penci-loading-circle-inner"></div>
                                <div class="penci-loading-circle7 penci-loading-circle-inner"></div>
                                <div class="penci-loading-circle8 penci-loading-circle-inner"></div>
                                <div class="penci-loading-circle9 penci-loading-circle-inner"></div>
                                <div class="penci-loading-circle10 penci-loading-circle-inner"></div>
                                <div class="penci-loading-circle11 penci-loading-circle-inner"></div>
                                <div class="penci-loading-circle12 penci-loading-circle-inner"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
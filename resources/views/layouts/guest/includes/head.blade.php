<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <link href="http://max.pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.1.1"
          rel="stylesheet" type="text/css">
    <link href="http://max.pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/wp-content/plugins/penci-framework/assets/css/single-shortcode.css?ver=4.9.10"
          rel="stylesheet" type="text/css">
    <link href="http://max.pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/wp-content/plugins/penci-pennew-demo-select/css/demobar.css?ver=1.0"
          rel="stylesheet" type="text/css">
    <link href="http://max.pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/wp-content/themes/pennews/css/portfolio.css?ver=6.5.1"
          rel="stylesheet" type="text/css">
    <link href="http://max.pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/wp-content/themes/pennews/css/review.css?ver=6.5.1"
          rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style_pen.css') }}"
          rel="stylesheet" type="text/css">
    <link href="http://max.pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/wp-content/themes/pennews/css/font-awesome.min.css?ver=4.5.2"
          rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Oswald%3A400&ver=4.9.10" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto%3A300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C700%2C700italic%2C800%2C800italic%7CMukta+Vaani%3A300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C700%2C700italic%2C800%2C800italic%7COswald%3A300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C700%2C700italic%2C800%2C800italic%7CTeko%3A300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C700%2C700italic%2C800%2C800italic%7CWork+Sans%3A300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C700%2C700italic%2C800%2C800italic%7COpen+Sans%3A300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C700%2C700italic%2C800%2C800italic%3A300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C700%2C700italic%2C800%2C800italic%26subset%3Dcyrillic%2Ccyrillic-ext%2Cgreek%2Cgreek-ext%2Clatin-ext"
          rel="stylesheet" type="text/css">

    <style id="penci-style-inline-css" type="text/css">
        .penci-block-vc.style-title-13:not(.footer-widget).style-title-center .penci-block-heading {
            border-right: 10px solid transparent;
            border-left: 10px solid transparent;
        }

        .site-branding h1, .site-branding h2 {
            margin: 0;
        }

        .penci-schema-markup {
            display: none !important;
        }

        .penci-entry-media .twitter-video {
            max-width: none !important;
            margin: 0 !important;
        }

        .penci-entry-media .fb-video {
            margin-bottom: 0;
        }

        .penci-entry-media .post-format-meta > iframe {
            vertical-align: top;
        }

        .penci-single-style-6 .penci-entry-media-top.penci-video-format-dailymotion:after, .penci-single-style-6 .penci-entry-media-top.penci-video-format-facebook:after, .penci-single-style-6 .penci-entry-media-top.penci-video-format-vimeo:after, .penci-single-style-6 .penci-entry-media-top.penci-video-format-twitter:after, .penci-single-style-7 .penci-entry-media-top.penci-video-format-dailymotion:after, .penci-single-style-7 .penci-entry-media-top.penci-video-format-facebook:after, .penci-single-style-7 .penci-entry-media-top.penci-video-format-vimeo:after, .penci-single-style-7 .penci-entry-media-top.penci-video-format-twitter:after {
            content: none;
        }

        .penci-single-style-5 .penci-entry-media.penci-video-format-dailymotion:after, .penci-single-style-5 .penci-entry-media.penci-video-format-facebook:after, .penci-single-style-5 .penci-entry-media.penci-video-format-vimeo:after, .penci-single-style-5 .penci-entry-media.penci-video-format-twitter:after {
            content: none;
        }

        @media screen and (max-width: 960px) {
            .penci-insta-thumb ul.thumbnails.penci_col_5 li, .penci-insta-thumb ul.thumbnails.penci_col_6 li {
                width: 33.33% !important;
            }

            .penci-insta-thumb ul.thumbnails.penci_col_7 li, .penci-insta-thumb ul.thumbnails.penci_col_8 li, .penci-insta-thumb ul.thumbnails.penci_col_9 li, .penci-insta-thumb ul.thumbnails.penci_col_10 li {
                width: 25% !important;
            }
        }

        .site-header.header--s12 .penci-menu-toggle-wapper, .site-header.header--s12 .header__social-search {
            flex: 1;
        }

        .site-header.header--s5 .site-branding {
            padding-right: 0;
            margin-right: 40px;
        }

        .penci-block_37 .penci_post-meta {
            padding-top: 8px;
        }

        .penci-block_37 .penci-post-excerpt + .penci_post-meta {
            padding-top: 0;
        }

        .penci-hide-text-votes {
            display: none;
        }

        .penci-usewr-review {
            border-top: 1px solid #ececec;
        }

        .penci-review-score {
            top: 5px;
            position: relative;
        }

        .penci-social-counter.penci-social-counter--style-3 .penci-social__empty a, .penci-social-counter.penci-social-counter--style-4 .penci-social__empty a, .penci-social-counter.penci-social-counter--style-5 .penci-social__empty a, .penci-social-counter.penci-social-counter--style-6 .penci-social__empty a {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .penci-block-error {
            padding: 0 20px 20px;
        }

        @media screen and (min-width: 1240px) {
            .penci_dis_padding_bw .penci-content-main.penci-col-4:nth-child(3n+2) {
                padding-right: 15px;
                padding-left: 15px;
            }
        }

        .bos_searchbox_widget_class.penci-vc-column-1 #flexi_searchbox #b_searchboxInc .b_submitButton_wrapper {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .mfp-image-holder .mfp-close, .mfp-iframe-holder .mfp-close {
            background: transparent;
            border-color: transparent;
        }

        h1, h2, h3, h4, h5, h6, .error404 .page-title,
        .error404 .penci-block-vc .penci-block__title, .footer__bottom.style-2 .block-title {
            font-family: 'Work Sans', sans-serif
        }

        .penci-block-vc .penci-block__title, .penci-menu-hbg .penci-block-vc .penci-block__title, .penci-menu-hbg-widgets .menu-hbg-title {
            font-family: 'Work Sans', sans-serif;
        }

        body, button, input, select, textarea, .woocommerce ul.products li.product .button, #site-navigation .penci-megamenu .penci-mega-thumbnail .mega-cat-name {
            font-family: 'Open Sans', sans-serif
        }

        .site-header .site-branding a, .header__top .site-branding a {
            /*transform: translateY(25px);*/
        }

        .main-navigation > ul:not(.children) > li.highlight-button {
            min-height: 80px;
        }

        .site-header, .main-navigation > ul:not(.children) > li > a, .site-header.header--s7 .main-navigation > ul:not(.children) > li > a, .search-click, .penci-menuhbg-wapper, .header__social-media, .site-header.header--s7, .site-header.header--s1 .site-branding .site-title, .site-header.header--s7 .site-branding .site-title, .site-header.header--s10 .site-branding .site-title, .site-header.header--s5 .site-branding .site-title {
            line-height: 100px;
            min-height: 80px;
        }

        .site-header.header--s7 .custom-logo, .site-header.header--s10 .custom-logo, .site-header.header--s11 .custom-logo, .site-header.header--s1 .custom-logo, .site-header.header--s5 .custom-logo {
            max-height: 100px;
        }

        .main-navigation a, .mobile-sidebar .primary-menu-mobile li a, .penci-menu-hbg .primary-menu-mobile li a {
            font-family: 'Work Sans', sans-serif;
        }

        .main-navigation a, .mobile-sidebar .primary-menu-mobile li a, .penci-menu-hbg .primary-menu-mobile li a {
            font-weight: 600;
        }

        .main-navigation > ul:not(.children) > li > a {
            font-size: 24px;
        }

        .main-navigation a {
            text-transform: none;
        }

        @media screen and (min-width: 1240px) {
            .two-sidebar .site-main .penci-container .widget-area-1, .penci-vc_two-sidebar.penci-container .widget-area-1, .penci-vc_two-sidebar.penci-container-fluid .widget-area-1 {
                width: 21.4%;
            }

            .two-sidebar .site-main .penci-container .widget-area-2, .penci-vc_two-sidebar.penci-container .widget-area-2, .penci-vc_two-sidebar.penci-container-fluid .widget-area-2 {
                width: 21.4%;
            }

            .two-sidebar .site-main .penci-container .penci-wide-content, .penci-vc_two-sidebar.penci-container .penci-wide-content, .penci-vc_two-sidebar.penci-container-fluid .penci-wide-content {
                max-width: 100%;
                width: 57.2%;
            }
        }

        @media screen and (min-width: 960px) {
            .sidebar-left .site-main .penci-wide-content, .sidebar-right .site-main .penci-wide-content {
                width: 74.36%;
                max-width: 100%;
            }

            .sidebar-left .site-main .widget-area, .sidebar-right .site-main .widget-area {
                width: 25.64%;
                max-width: 100%;
            }

            .penci-con_innner-sidebar-left .penci-content-main, .penci-vc_sidebar-right .penci-con_innner-sidebar-left .penci-content-main {
                width: 74.36%;
                max-width: 100%;
            }
        }

        @media screen and (min-width: 1240px) {
            .penci-vc_sidebar-left .penci-container__content .penci-content-main, .penci-vc_sidebar-right .penci-container__content .penci-content-main {
                flex: inherit;
            }

            .penci-vc_sidebar-left .widget-area, .penci-vc_sidebar-right .widget-area {
                width: 25.64%;
                max-width: 100%;
            }

            .penci-vc_sidebar-left .penci-content-main, .penci-vc_sidebar-right .penci-content-main {
                width: 74.36%;
                max-width: 100%;
            }
        }

        @media screen and (max-width: 1240px) and (min-width: 960px) {
            .penci-vc_two-sidebar .widget-area {
                width: 25.64%;
                max-width: 100%;
            }

            .sidebar-left .site-main .penci-container__content, .sidebar-right .site-main .penci-container__content, .two-sidebar .site-main .penci-wide-content, .penci-vc_two-sidebar .penci-wide-content {
                margin-left: 0;
                width: 74.36%;
            }
        }

        @media screen and (min-width: 1440px) {
            .penci-con_innner-sidebar-left .widget-area, .penci-con_innner-sidebar-right .widget-area {
                width: 25.64% !important;
            }
        }

        @media screen and (min-width: 1200px) {
            .archive .site-main, body.blog .site-main {
                max-width: 1200px;
                margin-left: auto;
                margin-right: auto;
            }

            .archive .site-main .penci-container, body.blog .site-main .penci-container {
                max-width: 100%;
            }
        }

        .penci-portfolio-wrap {
            margin-left: 0px;
            margin-right: 0px;
        }

        .penci-portfolio-wrap .portfolio-item {
            padding-left: 0px;
            padding-right: 0px;
            margin-bottom: 0px;
        }

        .penci-menu-hbg-widgets .menu-hbg-title {
            font-family: 'Open Sans', sans-serif
        }

        .woocommerce div.product .related > h2, .woocommerce div.product .upsells > h2,
        .post-title-box .post-box-title, .site-content #respond h3, .site-content .widget-title,
        .site-content .widgettitle,
        body.page-template-full-width.page-paged-2 .site-content .widget.penci-block-vc .penci-block__title,
        body:not( .page-template-full-width ) .site-content .widget.penci-block-vc .penci-block__title {
            font-size: 15px !important;
            font-family: 'Open Sans', sans-serif !important;
        }

        .footer__copyright_menu {
            padding-top: 12px;
            padding-bottom: 12px;
        }

        body {
            background-color: #fff;
        }

        .penci_dis_padding_bw .penci-block-vc.style-title-11:not(.footer-widget) .penci-block__title a,
        .penci_dis_padding_bw .penci-block-vc.style-title-11:not(.footer-widget) .penci-block__title span,
        .penci_dis_padding_bw .penci-block-vc.style-title-11:not(.footer-widget) .penci-subcat-filter,
        .penci_dis_padding_bw .penci-block-vc.style-title-11:not(.footer-widget) .penci-slider-nav {
            background-color: #ffffff;
        }

        .buy-button {
            background-color: #63A2E0 !important;
        }

        .penci-menuhbg-toggle:hover .lines-button:after, .penci-menuhbg-toggle:hover .penci-lines:before, .penci-menuhbg-toggle:hover .penci-lines:after.penci-login-container a, .penci_list_shortcode li:before, .footer__sidebars .penci-block-vc .penci__post-title a:hover, .penci-viewall-results a:hover, .post-entry .penci-portfolio-filter ul li.active a, .penci-portfolio-filter ul li.active a, .penci-ajax-search-results-wrapper .penci__post-title a:hover {
            color: #63A2E0;
        }

        .penci-tweets-widget-content .icon-tweets, .penci-tweets-widget-content .tweet-intents a, .penci-tweets-widget-content .tweet-intents span:after, .woocommerce .star-rating span, .woocommerce .comment-form p.stars a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .penci-subcat-list .flexMenu-viewMore:hover a, .penci-subcat-list .flexMenu-viewMore:focus a, .penci-subcat-list .flexMenu-viewMore .flexMenu-popup .penci-subcat-item a:hover, .penci-owl-carousel-style .owl-dot.active span, .penci-owl-carousel-style .owl-dot:hover span, .penci-owl-carousel-slider .owl-dot.active span, .penci-owl-carousel-slider .owl-dot:hover span {
            color: #63A2E0;
        }

        .penci-owl-carousel-slider .owl-dot.active span, .penci-owl-carousel-slider .owl-dot:hover span {
            background-color: #63A2E0;
        }

        blockquote, q, .penci-post-pagination a:hover, a:hover, .penci-entry-meta a:hover, .penci-portfolio-below_img .inner-item-portfolio .portfolio-desc a:hover h3, .main-navigation.penci_disable_padding_menu > ul:not(.children) > li:hover > a, .main-navigation.penci_disable_padding_menu > ul:not(.children) > li:active > a, .main-navigation.penci_disable_padding_menu > ul:not(.children) > li.current-menu-item > a, .main-navigation.penci_disable_padding_menu > ul:not(.children) > li.current-menu-ancestor > a, .main-navigation.penci_disable_padding_menu > ul:not(.children) > li.current-category-ancestor > a, .site-header.header--s11 .main-navigation.penci_enable_line_menu .menu > li:hover > a, .site-header.header--s11 .main-navigation.penci_enable_line_menu .menu > li:active > a, .site-header.header--s11 .main-navigation.penci_enable_line_menu .menu > li.current-menu-item > a, .main-navigation.penci_disable_padding_menu ul.menu > li > a:hover, .main-navigation ul li:hover > a, .main-navigation ul li:active > a, .main-navigation li.current-menu-item > a, #site-navigation .penci-megamenu .penci-mega-child-categories a.cat-active, #site-navigation .penci-megamenu .penci-content-megamenu .penci-mega-latest-posts .penci-mega-post a:not(.mega-cat-name):hover, .penci-post-pagination h5 a:hover {
            color: black;
        }

        .penci-menu-hbg .primary-menu-mobile li a:hover, .penci-menu-hbg .primary-menu-mobile li.toggled-on > a, .penci-menu-hbg .primary-menu-mobile li.toggled-on > .dropdown-toggle, .penci-menu-hbg .primary-menu-mobile li.current-menu-item > a, .penci-menu-hbg .primary-menu-mobile li.current-menu-item > .dropdown-toggle, .mobile-sidebar .primary-menu-mobile li a:hover, .mobile-sidebar .primary-menu-mobile li.toggled-on-first > a, .mobile-sidebar .primary-menu-mobile li.toggled-on > a, .mobile-sidebar .primary-menu-mobile li.toggled-on > .dropdown-toggle, .mobile-sidebar .primary-menu-mobile li.current-menu-item > a, .mobile-sidebar .primary-menu-mobile li.current-menu-item > .dropdown-toggle, .mobile-sidebar #sidebar-nav-logo a, .mobile-sidebar #sidebar-nav-logo a:hover.mobile-sidebar #sidebar-nav-logo:before, .penci-recipe-heading a.penci-recipe-print, .widget a:hover, .widget.widget_recent_entries li a:hover, .widget.widget_recent_comments li a:hover, .widget.widget_meta li a:hover, .penci-topbar a:hover, .penci-topbar ul li:hover, .penci-topbar ul li a:hover, .penci-topbar ul.menu li ul.sub-menu li a:hover, .site-branding a, .site-branding .site-title {
            color: #63A2E0;
        }

        .penci-viewall-results a:hover, .penci-ajax-search-results-wrapper .penci__post-title a:hover, .header__search_dis_bg .search-click:hover, .header__social-media a:hover, .penci-login-container .link-bottom a, .error404 .page-content a, .penci-no-results .search-form .search-submit:hover, .error404 .page-content .search-form .search-submit:hover, .penci_breadcrumbs a:hover, .penci_breadcrumbs a:hover span, .penci-archive .entry-meta a:hover, .penci-caption-above-img .wp-caption a:hover, .penci-author-content .author-social:hover, .entry-content a, .comment-content a, .penci-page-style-5 .penci-active-thumb .penci-entry-meta a:hover, .penci-single-style-5 .penci-active-thumb .penci-entry-meta a:hover {
            color: #63A2E0;
        }

        blockquote:not(.wp-block-quote).style-2:before {
            background-color: transparent;
        }

        blockquote.style-2:before, blockquote:not(.wp-block-quote), blockquote.style-2 cite, blockquote.style-2 .author, blockquote.style-3 cite, blockquote.style-3 .author, .woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price ins, .woocommerce div.product p.price ins, .woocommerce div.product span.price ins, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote:before, .woocommerce div.product .woocommerce-tabs #tab-description blockquote:before, .woocommerce-product-details__short-description blockquote:before, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote cite, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote .author, .woocommerce div.product .woocommerce-tabs #tab-description blockquote cite, .woocommerce div.product .woocommerce-tabs #tab-description blockquote .author, .woocommerce div.product .product_meta > span a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active {
            color: black;
        }

        .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover {
            background-color: #63A2E0;
        }

        .woocommerce ul.cart_list li .amount, .woocommerce ul.product_list_widget li .amount, .woocommerce table.shop_table td.product-name a:hover, .woocommerce-cart .cart-collaterals .cart_totals table td .amount, .woocommerce .woocommerce-info:before, .woocommerce form.checkout table.shop_table .order-total .amount, .post-entry .penci-portfolio-filter ul li a:hover, .post-entry .penci-portfolio-filter ul li.active a, .penci-portfolio-filter ul li a:hover, .penci-portfolio-filter ul li.active a, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-info a:hover, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title a:hover, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-info .bbp-forum-content a, #bbpress-forums li.bbp-body ul.topic p.bbp-topic-meta a, #bbpress-forums .bbp-breadcrumb a:hover, #bbpress-forums .bbp-breadcrumb .bbp-breadcrumb-current:hover, #bbpress-forums .bbp-forum-freshness a:hover, #bbpress-forums .bbp-topic-freshness a:hover {
            color: #63A2E0;
        }

        .footer__bottom a, .footer__logo a, .footer__logo a:hover, .site-info a, .site-info a:hover, .sub-footer-menu li a:hover, .footer__sidebars a:hover, .penci-block-vc .social-buttons a:hover, .penci-inline-related-posts .penci_post-meta a:hover, .penci__general-meta .penci_post-meta a:hover, .penci-block_video.style-1 .penci_post-meta a:hover, .penci-block_video.style-7 .penci_post-meta a:hover, .penci-block-vc .penci-block__title a:hover, .penci-block-vc.style-title-2 .penci-block__title a:hover, .penci-block-vc.style-title-2:not(.footer-widget) .penci-block__title a:hover, .penci-block-vc.style-title-4 .penci-block__title a:hover, .penci-block-vc.style-title-4:not(.footer-widget) .penci-block__title a:hover, .penci-block-vc .penci-subcat-filter .penci-subcat-item a.active, .penci-block-vc .penci-subcat-filter .penci-subcat-item a:hover, .penci-block_1 .penci_post-meta a:hover, .penci-inline-related-posts.penci-irp-type-grid .penci__post-title:hover {
            color: #63A2E0;
        }

        .penci-block_10 .penci-posted-on a, .penci-block_10 .penci-block__title a:hover, .penci-block_10 .penci__post-title a:hover, .penci-block_26 .block26_first_item .penci__post-title:hover, .penci-block_30 .penci_post-meta a:hover, .penci-block_33 .block33_big_item .penci_post-meta a:hover, .penci-block_36 .penci-chart-text, .penci-block_video.style-1 .block_video_first_item.penci-title-ab-img .penci_post_content a:hover, .penci-block_video.style-1 .block_video_first_item.penci-title-ab-img .penci_post-meta a:hover, .penci-block_video.style-6 .penci__post-title:hover, .penci-block_video.style-7 .penci__post-title:hover, .penci-owl-featured-area.style-12 .penci-small_items h3 a:hover, .penci-owl-featured-area.style-12 .penci-small_items .penci-slider__meta a:hover, .penci-owl-featured-area.style-12 .penci-small_items .owl-item.current h3 a, .penci-owl-featured-area.style-13 .penci-small_items h3 a:hover, .penci-owl-featured-area.style-13 .penci-small_items .penci-slider__meta a:hover, .penci-owl-featured-area.style-13 .penci-small_items .owl-item.current h3 a, .penci-owl-featured-area.style-14 .penci-small_items h3 a:hover, .penci-owl-featured-area.style-14 .penci-small_items .penci-slider__meta a:hover, .penci-owl-featured-area.style-14 .penci-small_items .owl-item.current h3 a, .penci-owl-featured-area.style-17 h3 a:hover, .penci-owl-featured-area.style-17 .penci-slider__meta a:hover, .penci-fslider28-wrapper.penci-block-vc .penci-slider-nav a:hover, .penci-videos-playlist .penci-video-nav .penci-video-playlist-item .penci-video-play-icon, .penci-videos-playlist .penci-video-nav .penci-video-playlist-item.is-playing {
            color: #63A2E0;
        }

        .penci-block_video.style-7 .penci_post-meta a:hover, .penci-ajax-more.disable_bg_load_more .penci-ajax-more-button:hover, .penci-ajax-more.disable_bg_load_more .penci-block-ajax-more-button:hover {
            color: #63A2E0;
        }

        .site-main #buddypress input[type=submit]:hover, .site-main #buddypress div.generic-button a:hover, .site-main #buddypress .comment-reply-link:hover, .site-main #buddypress a.button:hover, .site-main #buddypress a.button:focus, .site-main #buddypress ul.button-nav li a:hover, .site-main #buddypress ul.button-nav li.current a, .site-main #buddypress .dir-search input[type=submit]:hover, .site-main #buddypress .groups-members-search input[type=submit]:hover, .site-main #buddypress div.item-list-tabs ul li.selected a, .site-main #buddypress div.item-list-tabs ul li.current a, .site-main #buddypress div.item-list-tabs ul li a:hover {
            border-color: #63A2E0;
            background-color: #63A2E0;
        }

        .site-main #buddypress table.notifications thead tr, .site-main #buddypress table.notifications-settings thead tr, .site-main #buddypress table.profile-settings thead tr, .site-main #buddypress table.profile-fields thead tr, .site-main #buddypress table.profile-settings thead tr, .site-main #buddypress table.profile-fields thead tr, .site-main #buddypress table.wp-profile-fields thead tr, .site-main #buddypress table.messages-notices thead tr, .site-main #buddypress table.forum thead tr {
            border-color: #63A2E0;
            background-color: #63A2E0;
        }

        .site-main .bbp-pagination-links a:hover, .site-main .bbp-pagination-links span.current, #buddypress div.item-list-tabs:not(#subnav) ul li.selected a, #buddypress div.item-list-tabs:not(#subnav) ul li.current a, #buddypress div.item-list-tabs:not(#subnav) ul li a:hover, #buddypress ul.item-list li div.item-title a, #buddypress ul.item-list li h4 a, div.bbp-template-notice a, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title a, #bbpress-forums li.bbp-body .bbp-forums-list li, .site-main #buddypress .activity-header a:first-child, #buddypress .comment-meta a:first-child, #buddypress .acomment-meta a:first-child {
            color: #63A2E0 !important;
        }

        .single-tribe_events .tribe-events-schedule .tribe-events-cost {
            color: #63A2E0;
        }

        .tribe-events-list .tribe-events-loop .tribe-event-featured, #tribe-events .tribe-events-button, #tribe-events .tribe-events-button:hover, #tribe_events_filters_wrapper input[type=submit], .tribe-events-button, .tribe-events-button.tribe-active:hover, .tribe-events-button.tribe-inactive, .tribe-events-button:hover, .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-], .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-] > a, #tribe-bar-form .tribe-bar-submit input[type=submit]:hover {
            background-color: #63A2E0;
        }

        .woocommerce span.onsale, .show-search:after, select option:focus, .woocommerce .widget_shopping_cart p.buttons a:hover, .woocommerce.widget_shopping_cart p.buttons a:hover, .woocommerce .widget_price_filter .price_slider_amount .button:hover, .woocommerce div.product form.cart .button:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .penci-block-vc.style-title-2:not(.footer-widget) .penci-block__title a, .penci-block-vc.style-title-2:not(.footer-widget) .penci-block__title span, .penci-block-vc.style-title-3:not(.footer-widget) .penci-block-heading:after, .penci-block-vc.style-title-4:not(.footer-widget) .penci-block__title a, .penci-block-vc.style-title-4:not(.footer-widget) .penci-block__title span, .penci-archive .penci-archive__content .penci-cat-links a:hover, .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar, .penci-block-vc .penci-cat-name:hover, #buddypress .activity-list li.load-more, #buddypress .activity-list li.load-newest, #buddypress .activity-list li.load-more:hover, #buddypress .activity-list li.load-newest:hover, .site-main #buddypress button:hover, .site-main #buddypress a.button:hover, .site-main #buddypress input[type=button]:hover, .site-main #buddypress input[type=reset]:hover {
            background-color: #63A2E0;
        }

        .penci-block-vc.style-title-grid:not(.footer-widget) .penci-block__title span, .penci-block-vc.style-title-grid:not(.footer-widget) .penci-block__title a, .penci-block-vc .penci_post_thumb:hover .penci-cat-name, .mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar, .mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar, .main-navigation > ul:not(.children) > li:hover > a, .main-navigation > ul:not(.children) > li:active > a, .main-navigation > ul:not(.children) > li.current-menu-item > a, .main-navigation.penci_enable_line_menu > ul:not(.children) > li > a:before, .main-navigation a:hover, #site-navigation .penci-megamenu .penci-mega-thumbnail .mega-cat-name:hover, #site-navigation .penci-megamenu .penci-mega-thumbnail:hover .mega-cat-name, .penci-review-process span, .penci-review-score-total, .topbar__trending .headline-title, .header__search:not(.header__search_dis_bg) .search-click, .cart-icon span.items-number {
            background-color: #63A2E0;
        }

        .main-navigation > ul:not(.children) > li.highlight-button > a {
            background-color: #63A2E0;
        }

        .main-navigation > ul:not(.children) > li.highlight-button:hover > a, .main-navigation > ul:not(.children) > li.highlight-button:active > a, .main-navigation > ul:not(.children) > li.highlight-button.current-category-ancestor > a, .main-navigation > ul:not(.children) > li.highlight-button.current-menu-ancestor > a, .main-navigation > ul:not(.children) > li.highlight-button.current-menu-item > a {
            border-color: #63A2E0;
        }

        .login__form .login__form__login-submit input:hover, .penci-login-container .penci-login input[type="submit"]:hover, .penci-archive .penci-entry-categories a:hover, .single .penci-cat-links a:hover, .page .penci-cat-links a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce div.product .entry-summary div[itemprop="description"]:before, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote .author span:after, .woocommerce div.product .woocommerce-tabs #tab-description blockquote .author span:after, .woocommerce-product-details__short-description blockquote .author span:after, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #scroll-to-top:hover, #respond #submit:hover, .wpcf7 input[type="submit"]:hover, .widget_wysija input[type="submit"]:hover {
            background-color: #63A2E0;
        }

        .penci-block_video .penci-close-video:hover, .penci-block_5 .penci_post_thumb:hover .penci-cat-name, .penci-block_25 .penci_post_thumb:hover .penci-cat-name, .penci-block_8 .penci_post_thumb:hover .penci-cat-name, .penci-block_14 .penci_post_thumb:hover .penci-cat-name, .penci-block-vc.style-title-grid .penci-block__title span, .penci-block-vc.style-title-grid .penci-block__title a, .penci-block_7 .penci_post_thumb:hover .penci-order-number, .penci-block_15 .penci-post-order, .penci-news_ticker .penci-news_ticker__title {
            background-color: #63A2E0;
        }

        .penci-owl-featured-area .penci-item-mag:hover .penci-slider__cat .penci-cat-name, .penci-owl-featured-area .penci-slider__cat .penci-cat-name:hover, .penci-owl-featured-area.style-12 .penci-small_items .owl-item.current .penci-cat-name, .penci-owl-featured-area.style-13 .penci-big_items .penci-slider__cat .penci-cat-name, .penci-owl-featured-area.style-13 .button-read-more:hover, .penci-owl-featured-area.style-13 .penci-small_items .owl-item.current .penci-cat-name, .penci-owl-featured-area.style-14 .penci-small_items .owl-item.current .penci-cat-name, .penci-owl-featured-area.style-18 .penci-slider__cat .penci-cat-name {
            background-color: #63A2E0;
        }

        .show-search .show-search__content:after, .penci-wide-content .penci-owl-featured-area.style-23 .penci-slider__text, .penci-grid_2 .grid2_first_item:hover .penci-cat-name, .penci-grid_2 .penci-post-item:hover .penci-cat-name, .penci-grid_3 .penci-post-item:hover .penci-cat-name, .penci-grid_1 .penci-post-item:hover .penci-cat-name, .penci-videos-playlist .penci-video-nav .penci-playlist-title, .widget-area .penci-videos-playlist .penci-video-nav .penci-video-playlist-item .penci-video-number, .widget-area .penci-videos-playlist .penci-video-nav .penci-video-playlist-item .penci-video-play-icon, .widget-area .penci-videos-playlist .penci-video-nav .penci-video-playlist-item .penci-video-paused-icon, .penci-owl-featured-area.style-17 .penci-slider__text::after, #scroll-to-top:hover {
            background-color: #63A2E0;
        }

        .featured-area-custom-slider .penci-owl-carousel-slider .owl-dot span, .main-navigation > ul:not(.children) > li ul.sub-menu, .error404 .not-found, .error404 .penci-block-vc, .woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message, .penci-owl-featured-area.style-12 .penci-small_items, .penci-owl-featured-area.style-12 .penci-small_items .owl-item.current .penci_post_thumb, .penci-owl-featured-area.style-13 .button-read-more:hover {
            border-color: #63A2E0;
        }

        .widget .tagcloud a:hover, .penci-social-buttons .penci-social-item.like.liked, .site-footer .widget .tagcloud a:hover, .penci-recipe-heading a.penci-recipe-print:hover, .penci-custom-slider-container .pencislider-content .pencislider-btn-trans:hover, button:hover, .button:hover, .entry-content a.button:hover, .penci-vc-btn-wapper .penci-vc-btn.penci-vcbtn-trans:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .penci-ajax-more .penci-ajax-more-button:hover, .penci-ajax-more .penci-portfolio-more-button:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .penci-block_10 .penci-more-post:hover, .penci-block_15 .penci-more-post:hover, .penci-block_36 .penci-more-post:hover, .penci-block_video.style-7 .penci-owl-carousel-slider .owl-dot.active span, .penci-block_video.style-7 .penci-owl-carousel-slider .owl-dot:hover span, .penci-block_video.style-7 .penci-owl-carousel-slider .owl-dot:hover span, .penci-ajax-more .penci-ajax-more-button:hover, .penci-ajax-more .penci-block-ajax-more-button:hover, .penci-ajax-more .penci-ajax-more-button.loading-posts:hover, .penci-ajax-more .penci-block-ajax-more-button.loading-posts:hover, .site-main #buddypress .activity-list li.load-more a:hover, .site-main #buddypress .activity-list li.load-newest a, .penci-owl-carousel-slider.penci-tweets-slider .owl-dots .owl-dot.active span, .penci-owl-carousel-slider.penci-tweets-slider .owl-dots .owl-dot:hover span, .penci-pagination:not(.penci-ajax-more) span.current, .penci-pagination:not(.penci-ajax-more) a:hover {
            border-color: #63A2E0;
            background-color: #63A2E0;
        }

        .penci-owl-featured-area.style-23 .penci-slider-overlay {
            background: -moz-linear-gradient(left, transparent 26%, #63A2E0 65%);
            background: -webkit-gradient(linear, left top, right top, color-stop(26%, #63A2E0), color-stop(65%, transparent));
            background: -webkit-linear-gradient(left, transparent 26%, #63A2E0 65%);
            background: -o-linear-gradient(left, transparent 26%, #63A2E0 65%);
            background: -ms-linear-gradient(left, transparent 26%, #63A2E0 65%);
            background: linear-gradient(to right, transparent 26%, #63A2E0 65%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#63A2E0', endColorstr='#63A2E0', GradientType=1);
        }

        .site-main #buddypress .activity-list li.load-more a, .site-main #buddypress .activity-list li.load-newest a, .header__search:not(.header__search_dis_bg) .search-click:hover, .tagcloud a:hover, .site-footer .widget .tagcloud a:hover {
            transition: all 0.3s;
            opacity: 0.8;
        }

        .penci-loading-animation-1 .penci-loading-animation, .penci-loading-animation-1 .penci-loading-animation:before, .penci-loading-animation-1 .penci-loading-animation:after, .penci-loading-animation-5 .penci-loading-animation, .penci-loading-animation-6 .penci-loading-animation:before, .penci-loading-animation-7 .penci-loading-animation, .penci-loading-animation-8 .penci-loading-animation, .penci-loading-animation-9 .penci-loading-circle-inner:before, .penci-load-thecube .penci-load-cube:before, .penci-three-bounce .one, .penci-three-bounce .two, .penci-three-bounce .three {
            background-color: #63A2E0;
        }

        @media only screen and ( min-width: 1025px) {
            .penci-header-transparent .penci-trans-nav .main-navigation > ul:not(.children) > li > a:hover, .penci-header-transparent .penci-trans-nav .main-navigation > ul:not(.children) > li.current-menu-item > a {
                color: #63A2E0
            }

            .penci-header-transparent .site-header-wrapper.penci-trans-nav .main-navigation.penci_enable_line_menu > ul:not(.children) > li > a:before {
                background-color: #63A2E0
            }
        }

        #main .widget .tagcloud a {
        }

        #main .widget .tagcloud a:hover {
        }

        .single .penci-cat-links a:hover, .page .penci-cat-links a:hover {
            background-color: #63A2E0;
        }
    </style>
    <!-- Styles -->
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
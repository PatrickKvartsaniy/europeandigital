@extends('layouts.guest.app')

@section('content')
    @include('site.elements.header')
    @include('site.elements.header_mobile')
    @include('site.elements.menu_mobile')
    @include('site.elements.page_title')

    <div class="vc_row wpb_row vc_row_50053673 vc_row-fluid penci-pb-row">
        <div class="wpb_column vc_column_container vc_col-sm-122 penci-col-122">
            <div class="vc_column-inner wpb_column vc_column_container vc_col-sm-122 penci-col-122 ">
                <div class="wpb_wrapper">
                    <div class="featured-area-custom-slider featured-area featured-area-7613">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                <div id="penci-slider-14"
                                     class="penci-owl-carousel-slider penci-owl-featured-area owl-loaded owl-drag"
                                     data-style="penci_custom_slider" data-auto="0" data-autotime="4000"
                                     data-speed="600" data-items="1" data-loop="0" data-dots="0" data-nav="1"
                                     style="max-height:810px; max-width:8100px;">
                                    <div class="owl-item" style="width: 100%;">
                                        <div class="penci-slider__item penci-slider__item-0 penci-image-holder penci-jarallax-slider penci-jarallax-inviewport"
                                             style="height: 810px; background-image: none; background-size: cover; background-position: center center; z-index: 0;"
                                             data-jarallax-original-styles="height:810px;background-image: url(/photos/3/home-pages-slides/3.jpg);background-size: cover; background-position: center center;">
                                            <div class="penci-custom-slider-container penci-fadeInRight align-left penci-right-50percent">
                                                <div class="pencislider-content">
                                                    <h2 class="pencislider-title"
                                                        style=" color:#ffffff; font-size:39px; font-weight:700; font-style:normal;">
                                                        <a href="#"><span
                                                                    class="">European Digital Development Alliance</span></a>
                                                    </h2>
                                                    <div class="pencislider-caption"
                                                         style=" color:#ffffff; font-size:18px; font-weight:normal; font-style:normal;">
                                                        <span class=""> EDDA is influencing digital and tech policies in Europe to reduce digital divide within and outside the EU.</span>
                                                    </div>
                                                    <div class="pencislider-button">
                                                        <a class="pencislider-button-text pencislider-btn-1 button pencislider-btn-fill"
                                                           style="" href="{{ url('/about/about-us') }}">Read more</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="jarallax-container-2" class="jarallax-container-fix"
                                                 style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;">
                                                <div style="background-position: 30% 50%; background-size: cover; background-repeat: no-repeat; background-image: url(&quot;/photos/3/home-pages-slides/3.jpg&quot;); position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; margin-top: -80px; transform: translate3d(0px, 101px, 0px);"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 100%;">
                                        <div class="penci-slider__item penci-slider__item-1 penci-image-holder penci-jarallax-slider penci-jarallax-inviewport"
                                             style="height: 810px; background-image: none; background-size: cover; background-position: center center; z-index: 0;"
                                             data-jarallax-original-styles="height:810px;background-image: url(/photos/3/home-pages-slides/1.jpg);background-size: cover; background-position: center center;">
                                            <div class="penci-custom-slider-container penci-fadeInUp align-center">
                                                <div class="pencislider-content">
                                                    <h2 class="pencislider-title"
                                                        style=" color:#ffffff; font-size:39px;">
                                                        <a href="#">
                                                            <span class="">EU and Development Cooperation</span>
                                                        </a>
                                                    </h2>
                                                    <div class="pencislider-caption"
                                                         style=" color:#ffffff; font-size:18px; font-weight:normal; font-style:normal;">
                                                        <span class="">We work with European Development and International Partnerships policies to advocate for inclusive digital transformation around the globe.</span>
                                                    </div>
                                                    <div class="pencislider-button"><a
                                                                class="pencislider-button-text pencislider-btn-1 button pencislider-btn-fill"
                                                                style="" href="/policy/">discover more</a></div>
                                                </div>
                                            </div>
                                            <div id="jarallax-container-3" class="jarallax-container-fix"
                                                 style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;">
                                                <div style="background-position: 30% 50%; background-size: cover; background-repeat: no-repeat; background-image: url(&quot;/photos/3/home-pages-slides/1.jpg&quot;); position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; margin-top: -80px; transform: translate3d(0px, 101px, 0px);"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 100%;">
                                        <div class="penci-slider__item penci-slider__item-2 penci-image-holder penci-jarallax-slider penci-jarallax-inviewport"
                                             style="height: 810px; background-image: none; background-size: cover; background-position: center center; z-index: 0;"
                                             data-jarallax-original-styles="height:810px;background-image: url(/photos/3/home-pages-slides/2.jpg);background-size: cover; background-position: center center;">
                                            <div class="penci-custom-slider-container penci-fadeInLeft align-right penci-left-50percent">
                                                <div class="pencislider-content"><h2
                                                            class="pencislider-title"
                                                            style=" color:#ffffff; font-size:39px;"><a
                                                                href="#"><span
                                                                    class="">EU Digital Policies</span></a>
                                                    </h2>
                                                    <div class="pencislider-caption"
                                                         style=" color:#ffffff; font-size:18px;"><span
                                                                class="">EDDA is a European association which represents think-tanks, civil society organizations and experts focusing on digital policies and digital transformation.</span>
                                                    </div>
                                                    <div class="pencislider-button"><a
                                                                class="pencislider-button-text pencislider-btn-1 button pencislider-btn-fill"
                                                                style="" href="/about/contact-us">contact us</a></div>
                                                </div>
                                            </div>
                                            <div id="jarallax-container-4" class="jarallax-container-fix"
                                                 style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;">
                                                <div style="background-position: 30% 50%; background-size: cover; background-repeat: no-repeat; background-image: url(&quot;/photos/3/home-pages-slides/2.jpg&quot;); position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; margin-top: -80px; transform: translate3d(0px, 101px, 0px);"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav">
                                <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
                                <div class="owl-next"><i class="fa fa-angle-right"></i></div>
                            </div>
                            <div class="owl-dots disabled"></div>
                        </div>
                    </div>
                    <style>#penci-slider-14 .penci-slider__item-0 .pencislider-btn-1 {
                            padding-left: 30px;
                            padding-right: 30px;
                            padding-top: 15px;
                            padding-bottom: 15px;
                            border-radius: 4px;
                            border-color: #ffffff;
                            background-color: #ffffff;
                            color: #2962ff;
                            font-weight: 700;
                            font-style: normal;
                            font-family: 'Work Sans', sans-serif;
                            /*font-family: 'Overpass', sans-serif;*/
                        }

                        #penci-slider-14 .penci-slider__item-0 .pencislider-btn-2 {
                            font-weight: normal;
                            font-style: normal;
                        }

                        #penci-slider-14 .penci-slider__item-0 .pencislider-btn-1:hover {
                            color: #ffffff
                        }

                        #penci-slider-14 .penci-slider__item-0 .pencislider-btn-1:hover {
                            background-color: #111111
                        }

                        #penci-slider-14 .penci-slider__item-0 .pencislider-btn-1:hover {
                            border-color: #111111
                        }

                        @media screen and (min-width: 540px) {
                            #penci-slider-14 .penci-slider__item-0 .penci-custom-slider-container .pencislider-content {
                                max-width: 540px;
                            }
                        }

                        #penci-slider-14 .penci-slider__item-0 .penci-custom-slider-container .pencislider-content .pencislider-title {
                            text-transform: none;
                        }

                        #penci-slider-14 .penci-slider__item-1 .pencislider-btn-1 {
                            padding-left: 30px;
                            padding-right: 30px;
                            padding-top: 15px;
                            padding-bottom: 15px;
                            border-radius: 4px;
                            border-color: #ffffff;
                            background-color: #ffffff;
                            color: #2962ff;
                            font-weight: 700;
                            font-style: normal;
                            font-family: 'Work Sans', sans-serif;
                            /*font-family: 'Overpass', sans-serif;*/
                        }

                        #penci-slider-14 .penci-slider__item-1 .pencislider-btn-2 {
                            font-weight: normal;
                            font-style: normal;
                        }

                        #penci-slider-14 .penci-slider__item-1 .pencislider-btn-1:hover {
                            color: #ffffff
                        }

                        #penci-slider-14 .penci-slider__item-1 .pencislider-btn-1:hover {
                            background-color: #111111
                        }

                        #penci-slider-14 .penci-slider__item-1 .pencislider-btn-1:hover {
                            border-color: #111111
                        }

                        @media screen and (min-width: 540px) {
                            #penci-slider-14 .penci-slider__item-1 .penci-custom-slider-container .pencislider-content {
                                max-width: 540px;
                            }
                        }

                        #penci-slider-14 .penci-slider__item-1 .penci-custom-slider-container .pencislider-content .pencislider-title {
                            text-transform: none;
                        }

                        #penci-slider-14 .penci-slider__item-2 .pencislider-btn-1 {
                            padding-left: 30px;
                            padding-right: 30px;
                            padding-top: 15px;
                            padding-bottom: 15px;
                            border-radius: 4px;
                            border-color: #ffffff;
                            background-color: #ffffff;
                            color: #2962ff;
                            font-weight: 700;
                            font-family: 'Work Sans', sans-serif;
                            /*font-family: 'Overpass', sans-serif;*/
                        }

                        #penci-slider-14 .penci-slider__item-2 .pencislider-btn-1:hover {
                            color: #ffffff
                        }

                        #penci-slider-14 .penci-slider__item-2 .pencislider-btn-1:hover {
                            background-color: #111111
                        }

                        #penci-slider-14 .penci-slider__item-2 .pencislider-btn-1:hover {
                            border-color: #111111
                        }

                        @media screen and (min-width: 540px) {
                            #penci-slider-14 .penci-slider__item-2 .penci-custom-slider-container .pencislider-content {
                                max-width: 540px;
                            }
                        }

                        #penci-slider-14 .penci-slider__item-2 .penci-custom-slider-container .pencislider-content .pencislider-title {
                            text-transform: none;
                        }</style>
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="site-content">

        <div id="primary" class="content-area">

            {{-- News START--}}
            <div id="penci-vc_row-wapper__51579393"
                 class="penci-vc_row-wapper penci-vc_row-custom penci-vc_row-center">

                <div class="vc_row wpb_row vc_row_51579393 vc_row-fluid penci-pb-row vc_custom_1551392070524">
                    <div class="wpb_column vc_column_container vc_col-sm-12 penci-col-12">
                        <div class="vc_column-inner wpb_column vc_column_container vc_col-sm-12 penci-col-12 vc_custom_1551392052653">
                            <div class="wpb_wrapper">
                                <div class="penci-fancy-heading-inner">
                                    <h2 class="penci-heading-title">Our Latest News</h2>
                                    <div class="penci-separator penci-separator- penci-separator-align-center"><span
                                                class="penci-sep_holder penci-sep_holder_l"><span
                                                    class="penci-sep_line"></span></span><span
                                                class="penci-sep_holder penci-sep_holder_r"><span
                                                    class="penci-sep_line"></span></span></div>
                                    <div class="penci-heading-content entry-content"></div>
                                </div>
                                <div id="penci_block_37__30396016"
                                     class="penci-block-vc penci-block_37 penci__general-meta style-title-1 style-title-left penci-block-load_more penci-imgtype-landscape penci-link-filter-hidden penci-empty-block-title penci-block-col-3"
                                     data-current="1" data-blockuid="penci_block_37__30396016">
                                    <div class="penci-block-heading">
                                    </div>
                                    <div id="penci_block_37__30396016block_content" class="penci-block_content">
                                        <div class="penci-block_content__items penci-block-items__1">
                                            @foreach($articles as $item)
                                                {{--{{ dd($item->title) }}--}}
                                                <article
                                                        class="penci-post-item__{{ $item->id }} hentry penci-post-item">
                                                    <div class="penci_post_thumb">
                                                        <a class="penci-image-holder  penci-lazy penci-image_has_icon"
                                                           data-delay=""
                                                           href="{{ urlloc($item->url) }}"
                                                           title="{!! $item->title !!}"
                                                           style="display: block; background-image: url(&quot;{{$item->main_img}}&quot;);"></a>
                                                        <div class="entry-meta-item penci-post-cat">
                                                            <a class="penci-cat-name"
                                                               href="{{ urlloc($item->serie->url) }}"
                                                               title="View all news in {!! $item->serie->title !!}">{!! $item->serie->title !!}</a>
                                                        </div>
                                                    </div>
                                                    <div class="penci_post_content">
                                                        <h3 class="penci__post-title entry-title">
                                                            <a href="{{ urlloc($item->url) }}"
                                                               title="{!! $item->title !!}">
                                                                {!! $item->title !!}</a>
                                                        </h3>
                                                        <div class="penci-schema-markup">
                                                                <span class="author vcard">
                                                                    <a class="url fn n"
                                                                       href="http://pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/author/admin/">Penci Design</a>
                                                                </span>
                                                            <time class="entry-date published"
                                                                  datetime="{!! $item->published_at->format('c') !!}">{!! $item->published_at->format('F d, Y') !!}
                                                            </time>
                                                            <time class="updated"
                                                                  datetime="{!! $item->updated_at->format('c') !!}">{!! $item->updated_at->format('F d, Y') !!}
                                                            </time>
                                                        </div>
                                                        <div class="penci_post-meta">
                                                                <span class="entry-meta-item penci-posted-on">
                                                                    <i class="fa fa-clock-o"></i>
                                                                    <time class="entry-date published"
                                                                          datetime="{!! $item->published_at->format('c') !!}">{!! $item->published_at->format('F d, Y') !!}
                                                                    </time>
                                                                    <time class="updated"
                                                                          datetime="{!! $item->updated_at->format('c') !!}">{!! $item->updated_at->format('F d, Y') !!}
                                                                    </time>
                                                                </span>
                                                            {{--Comments--}}
                                                            {{--<span class="entry-meta-item penci-comment-count">--}}
                                                            {{--<a class="penci_pmeta-link"--}}
                                                            {{--href="http://pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/creating-a-simple-contacts-list-with-laravel/#respond">--}}
                                                            {{--<i class="la la-comments"></i>--}}
                                                            {{--0 comment</a>--}}
                                                            {{--</span>--}}
                                                        </div>
                                                    </div>
                                                </article>
                                            @endforeach
                                        </div>
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
                                <style>@media screen and (min-width: 768px ) {
                                        #penci_block_37__30396016 .penci-ajax-more .penci-block-ajax-more-button {
                                            padding-top: 0;
                                            font-size: 13px !important;
                                        }
                                    }

                                    @media screen and (min-width: 768px ) {
                                        #penci_block_37__30396016 .penci__post-title {
                                            font-size: 18px !important;;
                                        }
                                    }</style>
                                <script>if (typeof (penciBlock) === "undefined") {
                                        function penciBlock() {
                                            this.atts_json = '';
                                            this.content = '';
                                        }
                                    }
                                    var penciBlocksArray = penciBlocksArray || [];
                                    var PENCILOCALCACHE = PENCILOCALCACHE || {};
                                    var penci_block_37__30396016 = new penciBlock();
                                    penci_block_37__30396016.blockID = "penci_block_37__30396016";
                                    penci_block_37__30396016.atts_json = '{"build_query":"post_type:post|size:9","add_title_icon":"","title_i_align":"left","title_icon":"","image_type":"landscape","column":"3","text_align":"","block_title_meta_settings":"","block_title_align":"style-title-left","block_title_off_uppercase":"","block_title_wborder_left_right":"5px","block_title_wborder":"3px","post_title_trimword_settings":"","post_standard_title_length":"12","posttitle_on_upper":"","hide_post_date":"","hide_comment":"","hide_icon_post_format":"","hide_cat":"","show_allcat":"","hide_review_piechart":"","show_author":"","dis_bg_block":"","enable_stiky_post":"","show_excrept":"","post_excrept_length":15,"enable_line":"","padding_content_lr":"","padding_top_title":"","padding_bottom_title":"","padding_top_meta":"","padding_bottom_meta":"","padding_top_desc":"","padding_bottom_desc":"","style_pag":"load_more","limit_loadmore":"3","post_category_css":"","pagination_css":"","loadmore_css":"","disable_bg_load_more":"","custom_markup_1":"","ajax_filter_type":"","ajax_filter_selected":"","ajax_filter_number_item":"5","infeed_ads__order":"2","block_id":"penci_block_37-1551392076633","penci_show_desk":"Yes","penci_show_tablet":"Yes","penci_show_mobile":"Yes","paged":1,"unique_id":"penci_block_37__30396016","shortcode_id":"block_37","category_ids":"","taxonomy":""}';
                                    penci_block_37__30396016.content = "";
                                    penciBlocksArray.push(penci_block_37__30396016);</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>#penci-vc_row-wapper__51579393.penci-vc_row-wapper {
                    max-width: 90%;
                }</style>
            {{-- News END --}}



            {{-- Policy START --}}

            <div class="penci-page-header-inner penci-container-1170">
                <div id="penci-vc_row-wapper__20046756"
                     class="penci-vc_row-wapper penci-vc_row-custom penci-vc_row-center">
                    <div class="vc_row wpb_row vc_row_20046756 vc_row-fluid penci-pb-row">
                        <div class="wpb_column vc_column_container vc_col-sm-12 penci-col-12">
                            <div class="vc_column-inner wpb_column vc_column_container vc_col-sm-12 penci-col-12 ">
                                <div class="wpb_wrapper">
                                    <div id="penci_fancy_heading__39028005"
                                         class="penci-block-vc penci-fancy-heading2 penci-heading-text-center2">
                                        <br>
                                        <br>
                                        <br>
                                        <div class="penci-fancy-heading-inner">
                                            <h2 class="penci-heading-title">Our Latest Policy Updates</h2>
                                            <div class="penci-separator penci-separator- penci-separator-align-center"><span
                                                        class="penci-sep_holder penci-sep_holder_l"><span
                                                            class="penci-sep_line"></span></span><span
                                                        class="penci-sep_holder penci-sep_holder_r"><span
                                                            class="penci-sep_line"></span></span></div>
                                            <div class="penci-heading-content entry-content"></div>
                                        </div>
                                        <style>
                                            #penci_fancy_heading__39028005 .penci-separator {
                                                margin-top: 20px;
                                            }

                                            #penci_fancy_heading__39028005.penci-fancy-heading .penci-heading-content {
                                                margin-bottom: 0;
                                            }

                                            #penci_fancy_heading__39028005 .penci-separator {
                                                width: 60px;
                                            }

                                            #penci_fancy_heading__39028005 .penci-separator .penci-sep_line {
                                                border-width: 2px;
                                                top: -1px;
                                            }

                                            #penci_fancy_heading__39028005.penci-fancy-heading .penci-heading-subtitle {
                                                color: #0b88ee;
                                            }

                                            /*#penci_fancy_heading__39028005.penci-fancy-heading .penci-heading-title {*/
                                            /*!*font-family: "Fira Sans";*!*/
                                            /*font-weight: 400;*/
                                            /*font-style: normal;*/
                                            /*}*/

                                            .penci-heading-title {
                                                color: #111;
                                            }

                                            @media screen and (min-width: 768px ) {
                                                #penci_fancy_heading__39028005.penci-fancy-heading .penci-heading-title {
                                                    font-size: 42px !important;
                                                }
                                            }

                                            /*#penci_fancy_heading__39028005.penci-fancy-heading .penci-heading-subtitle {*/
                                            /*font-family: "Source Sans Pro";*/
                                            /*font-weight: 400;*/
                                            /*font-style: normal;*/
                                            /*}*/

                                            @media screen and (min-width: 768px ) {
                                                #penci_fancy_heading__39028005.penci-fancy-heading .penci-heading-subtitle {
                                                    font-size: 15px !important;
                                                }
                                            }

                                            #penci_fancy_heading__39028005 .penci-separator .penci-heading-icon {
                                                margin-left: 15px;
                                                margin-right: 15px;
                                            }</style>
                                    </div>


                                    <div id="penci_block_23__39327780"
                                         class="penci-block-vc penci-block_23 penci__general-meta style-title-1 style-title-left penci-imgtype-landscape penci-link-filter-hidden penci-empty-block-title penci-vc-column-3"
                                         data-current="1" data-blockuid="penci_block_23__39327780">
                                        <div class="penci-block-heading"></div>
                                        <div id="penci_block_23__39327780block_content" class="penci-block_content">
                                            <div class="penci-block_content__items penci-block-items__1">
                                                <div class="penci-block-wrapper-item">

                                                    @if(isset($policies) && !empty($policies) && $bigPolicy = $policies->pop())
                                                        <article class="block23_first_item hentry penci-post-item">
                                                            <div class="penci_post_thumb">
                                                                <a class="penci-image-holder  penci-lazy penci-image_has_icon"
                                                                   data-delay=""
                                                                   href="{{$bigPolicy->slug}}"
                                                                   title="{{$bigPolicy->title}}"
                                                                   style="display: block; background-image: url(&quot;{{$bigPolicy->main_img}}&quot;);">
                                                                </a>
                                                                <span class="social-buttons">
                                                                    <span class="social-buttons__content">
                                                                        <a class="penci-social-item facebook"
                                                                           target="_blank" rel="noopener"
                                                                           title=""
                                                                           href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url($bigPolicy->slug))}}"><i
                                                                                    class="fa fa-facebook"></i></a><a
                                                                                class="penci-social-item twitter"
                                                                                target="_blank" rel="noopener"
                                                                                title=""
                                                                                href="https://twitter.com/intent/tweet?text={{$bigPolicy->title}}%20-%20{{urlencode(url($bigPolicy->slug))}}"><i
                                                                                    class="fa fa-twitter"></i></a><a
                                                                                class="penci-social-item google_plus"
                                                                                target="_blank" rel="noopener"
                                                                                title=""
                                                                                href="https://plus.google.com/share?url={{urlencode(url($bigPolicy->slug))}}"><i
                                                                                    class="fa fa-google-plus"></i></a><a
                                                                                class="penci-social-item pinterest"
                                                                                target="_blank" rel="noopener"
                                                                                title=""
                                                                                href="http://pinterest.com/pin/create/button?url={{urlencode(url($bigPolicy->slug))}}&amp;media={{urlencode(url($bigPolicy->main_img))}}&amp;description={{$bigPolicy->title}}"><i
                                                                                    class="fa fa-pinterest"></i></a><a
                                                                                class="penci-social-item email"
                                                                                target="_blank"
                                                                                rel="noopener"
                                                                                href="mailto:?subject={{$bigPolicy->title}}&amp;BODY={{urlencode(url($bigPolicy->slug))}}"><i
                                                                                    class="fa fa-envelope"></i></a></span><a
                                                                            class="social-buttons__toggle" href="#"><i
                                                                                class="fa fa-share"></i></a></span>
                                                            </div>
                                                            <div class="penci_post_content">
                                                                <h3 class="penci__post-title entry-title">
                                                                    <a href="{{$bigPolicy->slug}}"
                                                                       title="{{$bigPolicy->title}}">
                                                                        <b>{{$bigPolicy->title}}</b></a>
                                                                </h3>
                                                                <div class="penci-schema-markup"><span
                                                                            class="author vcard"><a
                                                                                class="url fn n"
                                                                                href="/author/admin/">Penci Design</a></span>
                                                                    <time class="entry-date published"
                                                                          datetime="2018-04-06T02:24:33+00:00">
                                                                        {{$bigPolicy->published_at->format('M d, Y')}}
                                                                    </time>
                                                                    <time class="updated"
                                                                          datetime="2018-04-09T06:57:43+00:00">
                                                                        {{$bigPolicy->published_at->format('M d, Y')}}
                                                                    </time>
                                                                </div>
                                                                <div class="penci_post-meta">
                                                                    <span class="entry-meta-item penci-posted-on">
                                                                        <i class="fa fa-clock-o"></i>
                                                                        <time class="entry-date published"
                                                                              datetime="2018-04-06T02:24:33+00:00"> {{$bigPolicy->published_at->format('M d, Y')}}</time>
                                                                        <time class="updated"
                                                                              datetime="2018-04-09T06:57:43+00:00"> {{$bigPolicy->published_at->format('M d, Y')}}</time>
                                                                    </span>
                                                                    <span class="entry-meta-item penci-comment-count">
                                                                        <a class="penci_pmeta-link" href="">
                                                                            <i class="la la-comments"></i>0
                                                                        </a>
                                                                    </span>
                                                                </div>
                                                                <div class="penci-post-excerpt">{{$bigPolicy->short_decription}}
                                                                </div>
                                                            </div>
                                                        </article>
                                                    @endif

                                                    <div class="block23_items">
                                                        @foreach($policies as $policy)
                                                            <article class="hentry penci-post-item">
                                                                <div class="penci_post_thumb">
                                                                    <a class="penci-image-holder  penci-lazy penci-image_has_icon"
                                                                       data-delay=""
                                                                       href="{{$policy->slug}}"
                                                                       title="{{$policy->title}}"
                                                                       style="display: block; background-image: url(&quot;{{$policy->main_img}}&quot;);">
                                                                    </a>
                                                                </div>
                                                                <div class="penci_post_content">
                                                                    <h3 class="penci__post-title entry-title">
                                                                        <a style="font-size: 18px !important;"
                                                                           href="{{$policy->slug}}"
                                                                           title="{{$policy->title}}">
                                                                            <b>{{$policy->title}}</b>
                                                                        </a>
                                                                    </h3>
                                                                    <div class="penci-schema-markup">
                                                                    <span class="author vcard">
                                                                        <a class="url fn n"
                                                                           href="http://pennews.pencidesign.com/pennews-business-multipurpose/author/admin/">Penci Design</a></span>
                                                                        <time class="entry-date published"
                                                                              datetime="2018-04-06T02:23:25+00:00">
                                                                            April 6,
                                                                            2018
                                                                        </time>
                                                                        <time class="updated"
                                                                              datetime="2018-04-09T04:08:50+00:00">
                                                                            April 9,
                                                                            2018
                                                                        </time>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
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
                                    <style>
                                        @media screen and (min-width: 768px ) {
                                        }

                                        #penci_block_23__39327780 .penci-pmore-link .more-link {
                                            font-family: 'Work Sans', sans-serif;
                                            /*font-family: "Mukta Vaani";*/
                                            font-weight: 500;
                                        }

                                        #penci_block_23__39327780 .penci__post-title {
                                            font-family: 'Work Sans', sans-serif;
                                            /*font-family: "Fira Sans";*/
                                            font-weight: 400;
                                        }

                                        @media screen and (min-width: 768px ) {
                                            #penci_block_23__39327780 .penci__post-title {
                                                font-size: 18px !important;
                                            }
                                        }

                                        @media screen and (min-width: 768px ) {
                                            #penci_block_23__39327780 .block23_first_item .penci__post-title {
                                                font-size: 27px !important;
                                            }
                                        }</style>
                                    <script>if (typeof (penciBlock) === "undefined") {
                                            function penciBlock() {
                                                this.atts_json = '';
                                                this.content = '';
                                            }
                                        }
                                        var penciBlocksArray = penciBlocksArray || [];
                                        var PENCILOCALCACHE = PENCILOCALCACHE || {};
                                        var penci_block_23__39327780 = new penciBlock();
                                        penci_block_23__39327780.blockID = "penci_block_23__39327780";
                                        penci_block_23__39327780.atts_json = '{"build_query":"post_type:post|size:5","add_title_icon":"","title_i_align":"left","title_icon":"","image_type":"landscape","hide_excrept":"","post_excrept_length":"25","block_title_meta_settings":"","block_title_align":"style-title-left","block_title_off_uppercase":"","block_title_wborder_left_right":"5px","block_title_wborder":"3px","post_title_trimword_settings":"","post_big_title_length":"20","post_standard_title_length":"12","hide_comment":"","hide_post_date":"","hide_icon_post_format":"","hide_cat":"true","show_allcat":"","show_readmore":"","show_author":"","show_count_view":"","dis_bg_block":"","enable_stiky_post":"","style_pag":"","readmore_css":"","post_category_css":"","social_share_css":"","pagination_css":"","loadmore_css":"","disable_bg_load_more":"","custom_markup_1":"","ajax_filter_type":"","ajax_filter_selected":"","ajax_filter_number_item":"5","infeed_ads__order":"2","block_id":"penci_block_23-1522981618040","penci_show_desk":"Yes","penci_show_tablet":"Yes","penci_show_mobile":"Yes","paged":1,"unique_id":"penci_block_23__39327780","shortcode_id":"block_23","max_num_pages":3,"category_ids":"","taxonomy":""}';
                                        penci_block_23__39327780.content = "";
                                        penciBlocksArray.push(penci_block_23__39327780);</script>
                                </div>
                                <br>
                                <br>
                                @if(isset($emails) && !empty($emails))
                                    <div class="widget  penci-block-vc penci-widget-sidebar style-title-3 style-title-left widget_categories">
                                        <div class="penci-block-heading">
                                            <h4 class="widget-title penci-block__title">
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="wpb_wrapper">
                                        <br>
                                        <br>
                                        <div class="penci-fancy-heading-inner">
                                            <a href="/policy/areas">
{{--                                                <div class="penci-heading-subtitle">Emails</div>--}}
                                                <h2 class="penci-heading-title">Newsletters</h2>
                                                <div class="penci-separator penci-separator- penci-separator-align-center"><span
                                                            class="penci-sep_holder penci-sep_holder_l"><span
                                                                class="penci-sep_line"></span></span><span
                                                            class="penci-sep_holder penci-sep_holder_r"><span
                                                                class="penci-sep_line"></span></span></div>
                                            </a>
                                            <div class="penci-heading-content entry-content"></div>
                                        </div>
                                        <div id="penci_block_37__30396016"
                                             class="penci-block-vc penci-block_37 penci__general-meta style-title-1 style-title-left penci-block-load_more penci-imgtype-landscape penci-link-filter-hidden penci-empty-block-title penci-block-col-3"
                                             data-current="1" data-blockuid="penci_block_37__30396016">
                                            <div class="penci-block-heading">
                                            </div>
                                            <div id="penci_block_37__30396016block_content" class="penci-block_content">
                                                <div class="penci-block_content__items penci-block-items__1">
                                                    @foreach($emails as $item)
                                                        <article
                                                                class="penci-post-item__{{ $item->id }} hentry penci-post-item">
                                                            <div class="penci_post_thumb">
                                                                <a class="penci-image-holder  penci-lazy penci-image_has_icon"
                                                                   data-delay=""
                                                                   href="{{ urlloc($item->url) }}"
                                                                   title="{!! $item->title !!}"
                                                                   style="display: block; background-image: url(&quot;{{$item->main_img}}&quot;);"></a>
                                                                <div class="entry-meta-item penci-post-cat">
                                                                    <a class="penci-cat-name"
                                                                       href="{{ urlloc($item->serie->url) }}"
                                                                       title="View all news in {!! $item->serie->title !!}">{!! $item->serie->title !!}</a>
                                                                </div>
                                                            </div>
                                                            <div class="penci_post_content">
                                                                <h3 class="penci__post-title entry-title">
                                                                    <a href="{{ urlloc($item->url) }}"
                                                                       title="{!! $item->title !!}">
                                                                        {!! $item->title !!}</a>
                                                                </h3>
                                                                <div class="penci-schema-markup">
                                                                <span class="author vcard">
                                                                    <a class="url fn n"
                                                                       href="http://pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/author/admin/">Penci Design</a>
                                                                </span>
                                                                    <time class="entry-date published"
                                                                          datetime="{!! $item->published_at->format('c') !!}">{!! $item->published_at->format('F d, Y') !!}
                                                                    </time>
                                                                    <time class="updated"
                                                                          datetime="{!! $item->updated_at->format('c') !!}">{!! $item->updated_at->format('F d, Y') !!}
                                                                    </time>
                                                                </div>
                                                                <div class="penci_post-meta">
                                                                <span class="entry-meta-item penci-posted-on">
                                                                    <i class="fa fa-clock-o"></i>
                                                                    <time class="entry-date published"
                                                                          datetime="{!! $item->published_at->format('c') !!}">{!! $item->published_at->format('F d, Y') !!}
                                                                    </time>
                                                                    <time class="updated"
                                                                          datetime="{!! $item->updated_at->format('c') !!}">{!! $item->updated_at->format('F d, Y') !!}
                                                                    </time>
                                                                </span>
                                                                    {{--Comments--}}
                                                                    {{--<span class="entry-meta-item penci-comment-count">--}}
                                                                    {{--<a class="penci_pmeta-link"--}}
                                                                    {{--href="http://pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/creating-a-simple-contacts-list-with-laravel/#respond">--}}
                                                                    {{--<i class="la la-comments"></i>--}}
                                                                    {{--0 comment</a>--}}
                                                                    {{--</span>--}}
                                                                </div>
                                                            </div>
                                                        </article>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Policy END --}}

        </div><!-- #primary -->


    </div>
@endsection

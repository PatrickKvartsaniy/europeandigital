@extends('layouts.guest.app')

@section('content')
    @include('site.elements.header')
    @include('site.elements.header_mobile')
    @include('site.elements.menu_mobile')
    @include('site.elements.page_title')

    <div id="page" class="site" style="transform: none;">
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div id="penci-vc_row-wapper__51579393"
                         class="penci-vc_row-wapper penci-vc_row-custom penci-vc_row-center">
                        
                        <div class="penci_breadcrumbs ">
                            <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <a class="home" href="{{ urlloc('/') }}"
                                       itemprop="item">
                                        <span itemprop="name">Home</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <i class="fa fa-angle-right"></i>
                                    <a href="{{ urlloc('/news') }}"
                                       itemprop="item">
                                        <span itemprop="name">News</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ul>
                        </div>

                        <div class="vc_row wpb_row vc_row_51579393 vc_row-fluid penci-pb-row vc_custom_1551392070524">
                            <div class="wpb_column vc_column_container vc_col-sm-12 penci-col-12">
                                <div class="vc_column-inner wpb_column vc_column_container vc_col-sm-12 penci-col-12 vc_custom_1551392052653">
                                    <div class="wpb_wrapper">
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
                                            <div class="penci-pagination penci-ajax-more penci-pag-center">
                                                <a class="penci-block-ajax-more-button button "
                                                   data-mes="Sorry, No more news"
                                                   data-block_id="penci_block_37__30396016block_content">
                                                    <span class="ajax-more-text">Load more news</span><span
                                                            class="ajaxdot"></span><i class="fa fa-refresh"></i>
                                                </a>
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
                            max-width: 90%; /* 1170px; */
                        }</style>
                </main><!-- #main -->
            </div><!-- #primary -->


        </div>
    </div>
@endsection

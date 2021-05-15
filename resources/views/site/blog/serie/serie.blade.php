@extends('layouts.guest.app')

@section('content')
    @include('site.elements.header')
    @include('site.elements.header_mobile')
    @include('site.elements.menu_mobile')
    @include('site.elements.page_title')

    <div id="page" class="site" style="transform: none;">
        <style>
            #penci_image_box__437897 .penci-team_member_name {
                font-weight: 600;
            }

            @media screen and (min-width: 768px ) {
                #penci_image_box__437897 .penci-team_member_name {
                    font-size: 30px !important;
                }
            }

            #penci_image_box__437897 .penci-team_member_desc {
                font-family: "Hind";
                font-weight: 400;
            }

            @media screen and (min-width: 768px ) {
                #penci_image_box__437897 .penci-team_member_desc {
                    font-size: 15px !important;
                }
            }

            #penci_image_box__437897 .penci-team_member_pos {
                /*font-family: "Hind";*/
                font-weight: 400;
            }

            @media screen and (min-width: 768px ) {
                #penci_image_box__437897 .penci-team_member_pos {
                    font-size: 15px !important;
                }
            }

            #penci_image_box__437897.penci-team_memebers .penci-team_item__content:before {
                background-color: #fafafa;
            }

            #penci_image_box__437897.penci-team_memebers .penci-team_item__content:before {
                opacity: 1;
            }

            #penci_image_box__437897 .penci-team_member_name {
                color: #000000;
            }

            #penci_image_box__437897 .penci-team_member_desc {
                color: #444444;
            }

            #penci_image_box__437897 .penci-team_member_pos {
                color: #888888;
            }

            #penci_image_box__437897 .penci-team_member_social {
                color: #000000;
            }

            #penci_image_box__437897 .penci-team_member_social:hover {
                color: #5625cc;
            }

            #penci_image_box__437897 .penci-team_item__content {
                border-color: #fafafa;
            }

            #penci_image_box__437897 .penci-team_item__content {
                padding-top: 5px;
                padding-bottom: 5px;
                padding-left: 5px;
                padding-right: 5px;
            }

            #penci_image_box__437897 .penci-team_member_name {
                margin-bottom: 30px;
            }

        </style>
        <style>
            .hero__content__headline {
                font-size: 1.2rem;
                line-height: 1.2em;
                letter-spacing: .15em;
                text-transform: uppercase;
            }

            .hero__content > :first-child {
                margin-top: 0;
            }

            @media only screen and (min-width: 48em) {
                .hero__content__headline {
                    font-size: 1.4rem;
                }
            }

            @media only screen and (min-width: 64em) {
                .hero__content__headline {
                    font-size: 1.6rem;
                }
            }

            .hero__content {
                position: relative;
                z-index: 2;
                width: 100%;
                max-width: 90%;
                margin: 15% 0 5% 5%;
                color: #fff;
            }

            .hero__picture-outer {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: #000;
            }

            [class*='hero--'], .hero {
                position: relative;
                overflow: hidden;
                max-width: 100vw;
                height: 461px;
                margin-top: -19px;
                margin-bottom: 16px;
            }

            .hero__content__title {
                font-size: 3.6rem;
                line-height: 1.1em;
            }

            @media only screen and (min-width: 48em) {
                .hero__content__title {
                    font-size: 4.8rem;
                }
            }


            @media only screen and (min-width: 90em) {
                .hero__content__title {
                    font-size: 7.2rem;
                }
            }

        </style>
        <div id="content" class="site-content" style="transform: none;">
            @if(isset($serie['main_img']) && !empty($serie['main_img']))
                <div class="hero">
                    <div class="hero-inner wrap">
                        <div class="hero__picture-outer">
                            <img style="width: 100%; height: 480px; margin-top: -19px;" src="{{$serie['main_img']}}">
                        </div>
                        <div class="hero__content">
                            <div class="hero__content__headline" data-ref="hero.headline" style="opacity: 1;"> Policy
                            </div>
                            <h1 class="hero__content__title" data-ref="hero.title" style="opacity: 1;">
                                {{ $serie->title }}
                            </h1>
                        </div>
                    </div>
                </div>

                {{--                <img style="width: 100%; height: 480px; margin-top: -19px;" src="{{$serie['main_img']}}">--}}

            @endif


            <div id="primary" class="content-area" style="transform: none;">

                <main id="main" class="site-main" style="transform: none; line-height: 2.5;">
                    @if($serie && $serie->description)

                        <div class="penci-container" style="transform: none;">

                            <aside class="widget-area widget-area-1 penci-sticky-sidebar penci-sidebar-widgets"
                                   style="position: relative; overflow: visible; margin-bottom: 20px; box-sizing: border-box; min-height: 1px;">

                                <div style="margin-left: 70px;">
                                    <div class="theiaStickySidebar"
                                         style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                                        @include('site.blog.post.sidebar.elements.series')
                                    </div>
                                </div>
                            </aside>

                            <div style="max-width: 750px; margin-left: 50px; margin-right: 50px; text-align: justify; color: #454545; font-size: 1.8rem;">
                                {!! $serie->description !!}
                            </div>
                        </div>

                        <div class="widget  penci-block-vc penci-widget-sidebar style-title-3 style-title-left widget_categories">
                            <div class="penci-block-heading">
                                <h4 class="widget-title penci-block__title">
                                </h4>
                            </div>
                        </div>
                    @endif
                    <div class="penci-container" style="transform: none;">
                        <div class="penci-container__content penci-con_sb2_sb1" style="transform: none;">
                            <div class="penci-wide-content penci-content-novc penci-sticky-content"
                                 style="width: 100%; position: relative; overflow: visible; margin-bottom: 20px; box-sizing: border-box; min-height: 1057.6px;">
                                <div class="theiaStickySidebar"
                                     style="padding-top: 1px; padding-bottom: 1px; position: fixed; transform: translateY(100px); top: 0px; width: 830px; left: 174.6px;">
                                    <div id="penci-archive__content"
                                         class="penci-archive__content penci-layout-blog-default">
                                        <div class="penci_breadcrumbs ">
                                            <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                                <li itemprop="itemListElement" itemscope=""
                                                    itemtype="http://schema.org/ListItem">
                                                    <a class="home"
                                                       href="{{ urlloc('/') }}"
                                                       itemprop="item">
                                                        <span itemprop="name">Home</span></a>
                                                    <meta itemprop="position" content="1">
                                                </li>
                                                <li itemprop="itemListElement" itemscope=""
                                                    itemtype="http://schema.org/ListItem">
                                                    <i class="fa fa-angle-right"></i>
                                                    <a href="{{ $serie->url }}" itemprop="item">
                                                        <span itemprop="name">{!! $serie->title !!}</span>
                                                    </a>
                                                    <meta itemprop="position" content="2">
                                                </li>
                                            </ul>
                                        </div>
                                        <header class="entry-header penci-entry-header penci-archive-entry-header">
                                            {{--                                            <h1 class="page-title penci-page-title penci-title-"> {!! $serie->title !!}</h1>--}}
                                        </header>
                                        @if(isset($news) && !empty($news))
                                            <div class="widget  penci-block-vc penci-widget-sidebar style-title-3 style-title-left widget_categories">
                                                <div class="penci-block-heading">
                                                    <h4 class="widget-title penci-block__title">
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="wpb_wrapper">
                                                <div class="penci-fancy-heading-inner">
                                                    <a href="/policy/areas">
                                                        {{--                                                <div class="penci-heading-subtitle">Emails</div>--}}
                                                        <h2 class="penci-heading-title">News</h2>
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
                                                    <div id="penci_block_37__30396016block_content"
                                                         class="penci-block_content">
                                                        <div class="penci-block_content__items penci-block-items__1">
                                                            @foreach($news as $item)
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
                                            <div class="widget  penci-block-vc penci-widget-sidebar style-title-3 style-title-left widget_categories">
                                                <div class="penci-block-heading">
                                                    <h4 class="widget-title penci-block__title">
                                                    </h4>
                                                </div>
                                            </div>
                                        @endif
                                        @if(isset($seriesPosts) && !empty($seriesPosts))
                                            <div class="penci-archive__list_posts">
                                                @foreach($seriesPosts as $item)
                                                    <article
                                                            class="penci-imgtype-landscape post-70 post type-post status-publish format-standard has-post-thumbnail hentry category-process tag-blog tag-hosting tag-pennews penci-post-item">
                                                        <div class="article_content penci_media_object">
                                                            <div class="entry-media penci_mobj__img">
                                                                <a class="penci-link-post penci-image-holder penci-lazy"
                                                                   href="{{ $item->url }}"
                                                                   style="width: 250px; display: block; background-image: url(&quot;{{$item->main_img}}&quot;);"></a>
                                                            </div>
                                                            <div class="entry-text penci_mobj__body">
                                                                <header class="entry-header">
                                                                    <span class="penci-cat-links">
                                                                        <a href="{{ $item->serie->url }}"
                                                                           rel="category tag">{!! $item->serie->title !!}</a>
                                                                    </span>
                                                                    <h2 class="entry-title">
                                                                        <a href="{{ $item->url }}"
                                                                           style="font-size: 20px;"
                                                                           rel="bookmark">{!! $item->title !!}</a>
                                                                    </h2>
                                                                    <div style="font-size: 12px;"
                                                                         class="penci-schema-markup">
                                                                    <span class="author vcard">
                                                                        <a class="url fn n"
                                                                           href="/author/admin/">Admin</a>
                                                                    </span>
                                                                        <time class="entry-date published"
                                                                              datetime="{!! $item->published_at->format('c') !!}">
                                                                            {!! $item->published_at->format('F d, Y') !!}
                                                                        </time>
                                                                        <time class="updated"
                                                                              datetime="{!! $item->updated_at->format('c') !!}">
                                                                            {!! $item->updated_at->format('F d, Y') !!}
                                                                        </time>
                                                                    </div>
                                                                    <div style="font-size: 12px;" class="entry-meta">
                                                                    <span class="entry-meta-item penci-byline">by
                                                                        <span class="author vcard">
                                                                            <a class="url fn n"
                                                                               href="/author/admin/">Admin</a>
                                                                        </span>
                                                                    </span>
                                                                        <span class="entry-meta-item penci-posted-on">
                                                                        <i class="fa fa-clock-o"></i>
                                                                        <a href="{{ $item->url }}"
                                                                           rel="bookmark">
                                                                            <time class="entry-date published"
                                                                                  datetime="{!! $item->published_at->format('c') !!}">{!! $item->published_at->format('F d, Y') !!}</time>
                                                                            <time class="updated"
                                                                                  datetime="{!! $item->updated_at->format('c') !!}">{!! $item->updated_at->format('F d, Y') !!}</time>
                                                                        </a>
                                                                    </span>
                                                                        {{--<span class="entry-meta-item penci-comment-count">--}}
                                                                        {{--<a class="penci_pmeta-link"--}}
                                                                        {{--href="http://pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/the-paths-3-engineers-took-to-their-first-community-tutorial/#respond">--}}
                                                                        {{--<i class="la la-comments"></i>--}}
                                                                        {{--0</a>--}}
                                                                        {{--</span>--}}
                                                                        <span class="entry-meta-item penci-post-countview">
                                                                        <span class="entry-meta-item penci-post-countview penci_post-meta_item">
                                                                            <i class="fa fa-eye"></i>
                                                                            <span class="penci-post-countview-number penci-post-countview-p70">{{ $item->views_count }}</span>
                                                                        </span>
                                                                    </span>
                                                                    </div><!-- .entry-meta -->
                                                                </header><!-- .entry-header -->

                                                                <div style="font-size: 14px;" class="entry-content">
                                                                    {!! $item->short_description !!}
                                                                </div>
                                                                <footer class="entry-footer">
                                                                    @if(isset($item->tags) && !empty($item->tags))
                                                                        <span class="tags-links penci-tags-links">
                                                                            @foreach($item->tags as $tag)
                                                                                <a href="{{ $tag->url }}"
                                                                                   rel="tag">{!! $tag->name !!}</a>
                                                                            @endforeach
                                                                        </span>
                                                                    @endif
                                                                </footer>
                                                                <!-- .entry-footer -->
                                                            </div>
                                                        </div>
                                                    </article>
                                                @endforeach
                                            </div>
                                        @else
                                            NO NEWS
                                        @endif

                                        @if($serie && $serie->responsibles && !$serie->responsibles->isEmpty())
                                            <style>#penci_image_box__27013472 .penci-team_member_name {
                                                    /*font-family: "Montserrat";*/
                                                    font-weight: 600;
                                                }

                                                @media screen and (min-width: 768px ) {
                                                    #penci_image_box__27013472 .penci-team_member_name {
                                                        font-size: 18px !important;
                                                    }
                                                }

                                                #penci_image_box__27013472.penci-team_memebers .penci-team_item__content:before {
                                                    opacity: 1;
                                                }

                                                #penci_image_box__27013472 .penci-team_member-img {
                                                    height: 180px;
                                                    width: 180px;
                                                }

                                                #penci_image_box__27013472 .penci-team_member-img {
                                                    /*border-radius: 50%;*/
                                                }

                                                #penci_image_box__27013472 .penci-team_member_name {
                                                    margin-top: 20px;
                                                }</style>
                                            <div class="widget  penci-block-vc penci-widget-sidebar style-title-3 style-title-left widget_categories">
                                                <div class="penci-block-heading">
                                                    <h4 class="widget-title penci-block__title">
                                                        responsibles
                                                    </h4>
                                                </div>
                                            </div>
                                            {{--                                            --}}{{--                                            @include('site.blog.post.elements.post_related')--}}

                                            <div id="penci_image_box__437897"
                                                 class="penci-block-vc penci-team_memebers  columns-12 penci-team_member-s3 style-title-1 style-title-left penci-link-filter-hidden penci-empty-block-title penci-vc-column-12 vc_custom_1534362385858">
                                                <div class="penci-block_content">
                                                    <div class="penci-image-box__content" style="border: none;">
                                                        <div class="team_member_items penci-row">
                                                            @foreach($serie->responsibles as $teamMember)
                                                                <div class="penci-team_member_item penci-col-6">
                                                                    <div class="penci-team_item__content"
                                                                         style="/*border: 1px solid #dedede; */">
                                                                        {{--                                                                        <img class="penci-team_member-img penci-lazy"--}}
                                                                        {{--                                                                             src="{{$teamMember['avatar_img']}}"--}}
                                                                        {{--                                                                             alt="{{ $teamMember['name'] }}"--}}
                                                                        {{--                                                                             style="display: block;">--}}

                                                                        <div class="penci-team_item__info" style="padding: unset;">
                                                                            <h5 class="penci-team_member_name"
                                                                                non-governmental                                          style="margin-bottom: 10px;">{{ $teamMember['name'] }}</h5>
                                                                            <div class="penci-team_member_desc"
                                                                                 style="min-height: 50px; margin-bottom: -1px;">{!! $teamMember['short_description'] !!}</div>
                                                                            <div class="penci-team_member_socails"
                                                                                 style="min-height: 35px;">
                                                                                <a target="_blank" rel="noopener"
                                                                                   class="penci-team_member_social"
                                                                                   href="tel:{{$teamMember['phone'] }}">
                                                                                    {{$teamMember['phone'] }}
                                                                                </a>
                                                                            </div>
                                                                            <div class="penci-team_member_socails">
                                                                                <div class="team_member_items penci-row">
                                                                                    <div class="penci-team_member_item penci-col-12">
                                                                                        <a target="_blank"
                                                                                           rel="noopener"
                                                                                           class="penci-team_member_social"
                                                                                           href="mailto:{{$teamMember['email'] }}">
                                                                                            {{--    <i class="fa fa-envelope"></i>--}}
                                                                                            {{$teamMember['email'] }}
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="penci-team_member_item penci-col-6">
                                                                                        <a target="_blank"
                                                                                           rel="noopener"
                                                                                           class="penci-team_member_social"
                                                                                           href="{{$teamMember['facebook'] }}">
                                                                                            <i class="fa fa-facebook"></i>
                                                                                        </a>
                                                                                        <a target="_blank"
                                                                                           rel="noopener"
                                                                                           class="penci-team_member_social"
                                                                                           href="{{$teamMember['twitter'] }}">
                                                                                            <i class="fa fa-twitter"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{--                            <aside class="widget-area widget-area-1 penci-sticky-sidebar penci-sidebar-widgets"--}}
                            {{--                                   style="position: relative; overflow: visible; margin-bottom: 20px; box-sizing: border-box; min-height: 1px;">--}}
                            {{--                                <div class="theiaStickySidebar"--}}
                            {{--                                     style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">--}}
                            {{--                                    @include('site.blog.post.sidebar.elements.series')--}}
                            {{--                                </div>--}}
                            {{--                            </aside>--}}
                            {{--                            @include('site.blog.post.sidebar.sidebar')--}}

                        </div>

                        {{--                        @include('site.blog.post.sidebar.elements.series')--}}
                    </div>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- #content -->
        @include('site.elements.footer')
    </div>
@endsection

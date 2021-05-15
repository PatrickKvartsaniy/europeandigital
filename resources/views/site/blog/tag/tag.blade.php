@extends('layouts.guest.app')

@section('content')
    @include('site.elements.header')
    @include('site.elements.header_mobile')
    @include('site.elements.menu_mobile')
    @include('site.elements.page_title')

    <div id="page" class="site" style="transform: none;">
        <div id="content" class="site-content" style="transform: none;">
            <div id="primary" class="content-area" style="transform: none;">
                <main id="main" class="site-main" style="transform: none;">
                    <div class="penci-container" style="transform: none;">
                        <div class="penci-container__content penci-con_sb2_sb1" style="transform: none;">
                            <div class="penci-wide-content penci-content-novc penci-sticky-content"
                                 style="position: relative; overflow: visible; margin-bottom: 20px; box-sizing: border-box; min-height: 1057.6px;">
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
                                                    <a href="{{ $tag->url }}" itemprop="item">
                                                        <span itemprop="name"></span>
                                                    </a>
                                                    <meta itemprop="position" content="2">
                                                </li>
                                            </ul>
                                        </div>
                                        <header class="entry-header penci-entry-header penci-archive-entry-header">
                                            <h1 class="page-title penci-page-title penci-title-">Tag
                                                : {!! $tag->name !!}</h1>
                                        </header>
                                        @if(isset($tagPosts) && !empty($tagPosts))
                                            <div class="penci-archive__list_posts">
                                                @foreach($tagPosts as $item)
                                                    <article
                                                            class="penci-imgtype-landscape post-70 post type-post status-publish format-standard has-post-thumbnail hentry category-process tag-blog tag-hosting tag-pennews penci-post-item">
                                                        <div class="article_content penci_media_object">
                                                            <div class="entry-media penci_mobj__img">
                                                                <a class="penci-link-post penci-image-holder penci-lazy"
                                                                   href="{{ $item->url }}"
                                                                   style="display: block; background-image: url(&quot;http://max.pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/wp-content/uploads/sites/125/2019/02/p2-480x320.jpg&quot;);"></a>
                                                            </div>
                                                            <div class="entry-text penci_mobj__body">
                                                                <header class="entry-header">
                                                                    <span class="penci-cat-links">
                                                                        <a href="{{ $item->serie->url }}"
                                                                           rel="category tag">{!! $item->serie->title !!}</a>
                                                                    </span>
                                                                    <h2 class="entry-title">
                                                                        <a href="{{ $item->url }}"
                                                                           rel="bookmark">{!! $item->title !!}</a>
                                                                    </h2>
                                                                    <div class="penci-schema-markup">
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
                                                                    <div class="entry-meta">
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

                                                                <div class="entry-content">
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
                                    </div>
                                </div>
                            </div>

                            @include('site.blog.post.sidebar.sidebar')

                        </div>
                    </div>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- #content -->

        @include('site.elements.footer')
    </div>
@endsection

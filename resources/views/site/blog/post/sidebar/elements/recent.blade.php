<div id="penci_block_6__90557546"
     class="penci-block-vc penci-block_6 penci__general-meta widget penci-block-vc penci-widget-sidebar style-title-3 style-title-left penci-block-vc penci-widget penci-block_6 penci-widget__block_6 left penci-imgtype-landscape penci-link-filter-hidden penci-vc-column-1"
     data-current="1" data-blockuid="penci_block_6__90557546">
    <div class="penci-block-heading">
        <h3 class="penci-block__title"><span>Recent News</span></h3></div>
    <div id="penci_block_6__90557546block_content" class="penci-block_content">
        @if(isset($recentPosts) && !empty($recentPosts))
            <div class="penci-block_content__items penci-block-items__1">
                @foreach($recentPosts as $item)
                    <article class="hentry penci-post-item">
                        <div class="penci_media_object ">
                            <a class="penci-image-holder  penci-lazy penci_mobj__img penci-image_has_icon"
                               data-delay=""
                               href="{{ $item->url }}"
                               title="{!! $item->title !!}"
                               style="display: block; background-image: url(&quot;{{$item->main_img}}&quot;);"></a>
                            <div class="penci_post_content penci_mobj__body">
                                <h3 class="penci__post-title entry-title">
                                    <a href="{{ $item->url }}"
                                       title=" {!! $item->title !!} ">
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
                                              datetime="{!! $item->published_at->format('c') !!}">{!! $item->published_at->format('F d, Y') !!}</time>
                                        <time class="updated"
                                              datetime="{!! $item->updated_at->format('c') !!}">{!! $item->updated_at->format('F d, Y') !!}</time>
                                    </span>
                                    {{--<span class="entry-meta-item penci-comment-count">--}}
                                    {{--<a class="penci_pmeta-link"--}}
                                    {{--href="http://pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/creating-a-simple-contacts-list-with-laravel/#respond">--}}
                                    {{--<i class="la la-comments"></i>--}}
                                    {{--0</a>--}}
                                    {{--</span>--}}
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            NO RECENT NEWS
        @endif
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
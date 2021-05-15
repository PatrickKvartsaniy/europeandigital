<div id="penci_block_25__1364513"
     class="penci-block-vc penci-block_25 penci__general-meta widget penci-block-vc penci-widget-sidebar style-title-3 style-title-left penci-block-vc penci-widget penci-block_25 penci-widget__block_25 left penci-imgtype-landscape penci-link-filter-hidden penci-vc-column-1"
     data-current="1" data-blockuid="penci_block_25__1364513">
    <div class="penci-block-heading">
        <h3 class="penci-block__title"><span>Popular News</span></h3></div>
    <div id="penci_block_25__1364513block_content" class="penci-block_content">
        @if(isset($popularPosts) && !empty($popularPosts))
            <div class="penci-block_content__items penci-block-items__1">
                @foreach($popularPosts as $item)
                    <article class="penci-post-item__{{ $item->id }} hentry penci-post-item">
                        <div class="penci_post_thumb">
                            <a class="penci-image-holder  penci-lazy" data-delay=""
                               href="{{ $item->url }}"
                               title="{!! $item->title !!}"
                               style="display: block; background-image: url(&quot;{{$item->main_img}}&quot;);"></a>
                        </div>
                        <div class="penci_post_content">
                            <h3 class="penci__post-title entry-title">
                                <a href="{{ $item->url }}"
                                   title="{!! $item->title !!}">
                                    {!! $item->title !!}</a>
                            </h3>
                            <div class="penci-schema-markup">
                            <span class="author vcard">
                                <a class="url fn n"
                                   href="http://pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/author/admin/">Penci Design</a>
                            </span>
                                <time class="entry-date published" datetime="{!! $item->published_at->format('c') !!}">
                                    {!! $item->published_at->format('F d, Y') !!}
                                </time>
                                <time class="updated" datetime="{!! $item->updated_at->format('c') !!}">
                                    {!! $item->updated_at->format('F d, Y') !!}
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
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            NO POPULAR NEWS
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
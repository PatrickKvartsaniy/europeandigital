<div class="penci-post-related">
    <div class="post-title-box">
        <h4 class="post-box-title">Related news</h4>
    </div>
    <div class="post-related_content">
        @if(isset($relatedPost) && !empty($relatedPost))
            @foreach($relatedPost as $item)
                <div class="item-related penci-imgtype-landscape post-65 post type-post status-publish format-standard has-post-thumbnail hentry category-process tag-blog tag-hosting tag-pennews penci-post-item">
                    <a class="related-thumb penci-image-holder penci-image_has_icon penci-lazy"
                       data-src="{{$item->main_img}}"
                       href="{{ $item->url }}"></a>
                    <h4 class="entry-title">
                        <a href="{{ $item->url }}">
                            {!! $item->title !!}
                        </a>
                    </h4>
                    <div class="penci-schema-markup">
                        <span class="author vcard">
                            <a class="url fn n"
                               href="/author/admin/">
                                Admin
                            </a>
                        </span>
                        <time class="entry-date published"
                              datetime="{!! $item->published_at->format('c') !!}">{!! $item->published_at->format('F d, Y') !!}</time>
                        <time class="updated"
                              datetime="{!! $item->updated_at->format('c') !!}">{!! $item->updated_at->format('F d, Y') !!}</time>
                    </div>
                </div>
            @endforeach
        @else
            NO RELATED NEWS
        @endif
    </div>
</div>
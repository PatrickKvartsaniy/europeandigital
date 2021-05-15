<header class="entry-header penci-entry-header penci-title-">
    <div class="penci-entry-categories">
        <span class="penci-cat-links">
        <a href="{{ $article->serie->url }}"
           rel="category tag">{!! $article->serie->title !!}</a>
        </span>
    </div>
    <h1 class="entry-title penci-entry-title penci-title-">
        {!! $article->title !!}
    </h1>
    <div class="entry-meta penci-entry-meta">
        <span class="entry-meta-item penci-byline">by
            <span class="author vcard">
                <a class="url fn n">@if($article->author && $article->author->name) {{ $article->author->name }} @else {{ 'Admin' }} @endif</a>
            </span>
        </span>
        <span class="entry-meta-item penci-posted-on">
            <i class="fa fa-clock-o"></i>
            <time class="entry-date published"
                  datetime="{!! $article->published_at->format('c') !!}">{!! $article->published_at->format('F d, Y') !!}</time>
            <time class="updated"
                  datetime="{!! $article->updated_at->format('c') !!}">{!! $article->updated_at->format('F d, Y') !!}</time>
        </span>
        {{--<span class="entry-meta-item penci-comment-count">--}}
        {{--<a class="penci_pmeta-link"--}}
        {{--href="http://pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/the-paths-3-engineers-took-to-their-first-community-tutorial/#respond">--}}
        {{--<i class="la la-comments"></i>--}}
        {{--0--}}
        {{--</a>--}}
        {{--</span>--}}
        <span class="entry-meta-item penci-post-countview">
            <span class="entry-meta-item penci-post-countview penci_post-meta_item">
                <i class="fa fa-eye"></i>
                <span class="penci-post-countview-number penci-post-countview-p70">{{ $article->views_count }}</span>
            </span>
        </span>
    </div><!-- .entry-meta -->

    @include('site.blog.post.article.elements.post_article_share')
</header>
<!-- .entry-header -->
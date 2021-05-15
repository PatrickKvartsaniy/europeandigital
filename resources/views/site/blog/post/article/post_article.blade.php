<article id="post-70"
         class="penci-single-artcontent noloaddisqus post-70 post type-post status-publish format-standard has-post-thumbnail hentry category-process tag-blog tag-hosting tag-pennews penci-post-item">

    @include('site.blog.post.article.elements.post_article_header')

    <div class="entry-media penci-entry-media">
        <div class="post-format-meta ">
            <div class="post-image penci-standard-format">
                <img width="960"
                     height="640"
                     src="{{$article->main_img}}"
                     class="attachment-penci-thumb-960-auto size-penci-thumb-960-auto wp-post-image"
                     alt=""
                     srcset=""
                     sizes="(max-width: 960px) 100vw, 960px">
            </div>
        </div>
    </div>
    <div style="font-size: 20px !important;" class="penci-entry-content entry-content">
        @if(isset($article['body']))
            {!! $article['body'] !!}
        @else
            NO ARTICLE
        @endif
    </div><!-- .entry-content -->

    @include('site.blog.post.article.elements.post_article_footer')
</article>

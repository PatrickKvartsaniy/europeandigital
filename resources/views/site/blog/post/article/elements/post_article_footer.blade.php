<footer class="penci-entry-footer">
    @if(isset($article->tags) && !empty($article->tags))
        <span class="tags-links penci-tags-links">
            @foreach($article->tags as $tag)
                <a href="{{ $tag->url }}" rel="tag">{!! $tag->name !!}</a>
            @endforeach
        </span>
    @endif
{{--    @include('site.blog.post.article.elements.post_article_share_footer')--}}
</footer>
<!-- .entry-footer -->
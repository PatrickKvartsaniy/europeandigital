<span class="penci-social-buttons penci-social-share-footer"><span
            class="penci-social-share-text">Share</span>
        <a href="#" class="penci-post-like penci_post-meta_item  single-like-button penci-social-item like"
           data-post_id="70"
           title="Like"
           data-like="Like"
           data-unlike="Unlike">
                <i class="fa fa-thumbs-o-up"></i>
                <span class="penci-share-number">1</span>
        </a>
        <a class="penci-social-item facebook" target="_blank"
           rel="noopener" title=""
           href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($article->url) }}">
                <i class="fa fa-facebook"></i>
        </a>
        <a class="penci-social-item twitter" target="_blank"
           rel="noopener" title=""
           href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}%0A{{ urlencode($article->url) }}">
                <i class="fa fa-twitter"></i>
        </a>
        <a class="penci-social-item google_plus" target="_blank"
           rel="noopener" title=""
           href="https://plus.google.com/share?url={{ urlencode($article->url) }}">
                <i class="fa fa-google-plus"></i>
        </a>
        <a class="penci-social-item pinterest" target="_blank"
           rel="noopener" title=""
           href="http://pinterest.com/pin/create/button?url={{ urlencode($article->url) }}&amp;media=image.jpg&amp;description={{ urlencode($article->title) }}">
                <i class="fa fa-pinterest"></i>
        </a>
        <a class="penci-social-item linkedin" target="_blank"
           rel="noopener" title=""
           href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode($article->url) }}&amp;title={{ urlencode($article->title) }}">
                <i class="fa fa-linkedin"></i>
        </a>
        <a class="penci-social-item tumblr" target="_blank"
           rel="noopener" title=""
           href="https://www.tumblr.com/share/link?url={{ urlencode($article->url) }}&amp;name={{ urlencode($article->title) }}">
                <i class="fa fa-tumblr"></i>
        </a>
        <a class="penci-social-item reddit" target="_blank"
           rel="noopener" title=""
           href="https://reddit.com/submit?url={{ urlencode($article->url) }}&amp;title={{ urlencode($article->title) }}">
                <i class="fa fa-reddit"></i>
        </a>
        <a class="penci-social-item telegram" target="_blank"
           rel="noopener" title=""
           href="https://telegram.me/share/url?url={{ urlencode($article->url) }}&amp;text={{ urlencode($article->title) }}">
                <i class="fa fa-telegram"></i>
        </a>
        <a class="penci-social-item email" target="_blank"
           rel="noopener"
           href="mailto:?subject={{ urlencode($article->title) }}&amp;BODY={{ urlencode($article->url) }}">
                <i class="fa fa-envelope"></i>
        </a>
</span>
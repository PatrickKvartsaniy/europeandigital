<div class="penci-post-pagination">
    @if(isset($previousPost) && !empty($previousPost))
        <div class="prev-post">
            <div class="prev-post-inner penci_mobj__body">
                <a href="{{ $previousPost->url }}">
                    <div class="prev-post-title">
                        <span><i class="fa fa-angle-left"></i>previous news</span>
                    </div>
                    <div class="pagi-text">
                        <h5 class="prev-title">
                            <a href="{{ $previousPost->url }}">
                                {!! $previousPost->title !!}
                            </a>
                        </h5>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($nextPost) && !empty($nextPost))
        <div class="next-post ">
            <div class="next-post-inner">
                <a href="{{ $nextPost->url }}">
                    <div class="prev-post-title next-post-title">
                        <span>next news<i class="fa fa-angle-right"></i></span>
                    </div>
                    <div class="pagi-text">
                        <h5 class="next-title">
                            <a href="{{ $nextPost->url }}">
                                {!! $nextPost->title !!}
                            </a>
                        </h5>
                    </div>
                </a>
            </div>
        </div>
    @endif

</div>
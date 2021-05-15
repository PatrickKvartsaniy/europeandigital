<div id="categories-2"
     class="widget  penci-block-vc penci-widget-sidebar style-title-3 style-title-left widget_categories">
    <div class="penci-block-heading">
        <h4 class="widget-title penci-block__title">
            <span>Policies</span>
        </h4>
    </div>
    @if(isset($series) && !empty($series))
        <ul>
            @foreach($series as $item)
                <li class="cat-item cat-item-6">
                    <a href="{{ $item->url }}">
                        {!! $item->title !!}
{{--                        <span class="category-item-count">({{ $item->posts_count }})</span>--}}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        NO CATEGORIES
    @endif
</div>
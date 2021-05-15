<div class="penci_breadcrumbs ">
    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="home" href="{{ urlloc('/') }}"
               itemprop="item">
                <span itemprop="name">Home</span></a>
            <meta itemprop="position" content="1">
        </li>
        @if(isset($article->serie->title))
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <i class="fa fa-angle-right"></i>
                <a href="{{ $article->serie->url }}"
                   itemprop="item">
                    <span itemprop="name">{!! $article->serie->title !!}</span>
                </a>
                <meta itemprop="position" content="2">
            </li>
        @endif
        @if(isset($article->title))
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <i class="fa fa-angle-right"></i>
                <a href="{{ $article->url }}"
                   itemprop="item">
                    <span itemprop="name">{!! $article->title !!}</span>
                </a>
                <meta itemprop="position" content="3">
            </li>
        @endif
    </ul>
</div>
@extends('layouts.guest.app')

@section('content')
    @include('site.elements.header')
    @include('site.elements.header_mobile')
    @include('site.elements.menu_mobile')
    @include('site.elements.page_title')

    <div id="page" class="site" style="transform: none;">

        <div id="content" class="site-content" style="transform: none;">
            <div id="primary" class="content-area" style="transform: none;">
                <main id="main" class="site-main" style="transform: none;">
                    <div class="penci-container" style="transform: none;">
                        <div class="penci-container__content penci-con_sb2_sb1" style="transform: none;">
                            <div class="penci-wide-content penci-content-novc penci-sticky-content penci-content-single-inner"
                                 style="position: relative; overflow: visible; margin-bottom: 20px; box-sizing: border-box; min-height: 1px;">
                                <div class="theiaStickySidebar"
                                     style="padding-top: 1px; padding-bottom: 1px; position: static; transform: none;">
                                    <div class="penci-content-post noloaddisqus "
                                         data-url="http://pennews.pencidesign.com/pennews-web-hosting-service-multipurpose/the-paths-3-engineers-took-to-their-first-community-tutorial/"
                                         data-id="70" data-title="">
                                        @include('site.blog.post.elements.post_breadcrumbs')

                                        @if(isset($article) && !empty($article))
                                            @include('site.blog.post.article.post_article')
                                            @include('site.blog.post.elements.post_pagination')
{{--                                            @include('site.blog.post.elements.post_author')--}}
                                            @include('site.blog.post.elements.post_related')
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @include('site.blog.post.sidebar.sidebar')
                        </div>

                    </div>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- #content -->


        @include('site.elements.footer')
        @if(isset($article) && isset($article['id']) && $article['id'] ==11)
            @push('scripts')
                <script>
                    $(document).ready(function () {
                        $("td").css("margin", "initial");
                        $("tr").css("margin", "initial");
                        $("td").css("padding", "initial");
                        $("tr").css("padding", "initial");
                        $("td").css("border", "initial");
                        $("tr").css("border", "initial");
                        $("td").css("vertical-align", "top");
                        $("tr").css("vertical-align", "top");
                        $("td").css("line-height", "initial");
                        $("tr").css("line-height", "initial");
                        $("td").css("font-size", "initial");
                        $("tr").css("font-size", "initial");
                        $("table").css("margin-bottom", "initial");
                        $("table").css("padding", "initial");
                    });
                </script>
            @endpush
        @endif
    </div>
@endsection

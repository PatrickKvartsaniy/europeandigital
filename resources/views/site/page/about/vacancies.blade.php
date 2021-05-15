@extends('layouts.guest.app')

@section('content')
    @include('site.elements.header')
    @include('site.elements.header_mobile')
    @include('site.elements.menu_mobile')
    @include('site.elements.page_title')

    <style>
        #penci_fancy_heading__51142072.penci-fancy-heading .penci-heading-content {
            max-width: 100% !important;
        }

        .penci-heading-title {
            text-align: center;
        }

        .penci-fancy-heading-inner img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 150px !important;
            max-width: 150px !important;
        }

        .penci-heading-content.entry-content {
            text-align: justify;
        }

        ul li {
            font-size: 20px !important;
            color: unset !important;
            font-weight: unset !important;
        }

    </style>

    <div id="page" class="site" style="transform: none;">

        <div id="content" class="site-content" style="transform: none;">
            <div id="primary" class="content-area" style="transform: none;">
                <main id="main" class="site-main" style="transform: none;">
                    <div class="penci-container" style="transform: none;">
                        <div class="vc_row wpb_row vc_row_77684925 vc_row-fluid penci-pb-row vc_custom_1550114574675 vc_row-has-fill">
                            <div class="wpb_column vc_column_container vc_col-sm-12 penci-col-12 vc_col-has-fill">
                                <div class="vc_column-inner wpb_column vc_column_container vc_col-sm-12 penci-col-12 vc_col-has-fill vc_custom_1550114544111">
                                    <div class="wpb_wrapper">
                                        <div class="vc_row wpb_row vc_inner_44678440 vc_inner vc_row-fluid penci-pb-row vc_custom_1550115754911 vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
                                            <div class="wpb_column vc_column_container vc_col-sm-12 penci-col-12">
                                                <div class="vc_column-inner wpb_column vc_column_container vc_col-sm-12 penci-col-12 vc_custom_1550115720271">
                                                    <div class="wpb_wrapper">
                                                        <div id="penci_fancy_heading__51142072"
                                                             class="penci-block-vc penci-fancy-heading penci-heading-text-left vc_custom_1550116663970 vc_custom_1550116663975 vc_custom_1550116663976 vc_custom_1550116663977">
                                                            <div class="penci-fancy-heading-inner">
                                                                {!! $content !!}
                                                            </div>
                                                            <style>#penci_fancy_heading__51142072.penci-fancy-heading .penci-heading-content {
                                                                    margin-bottom: 0;
                                                                }

                                                                #penci_fancy_heading__51142072.penci-fancy-heading .penci-heading-content {
                                                                    max-width: 80%;
                                                                }

                                                                #penci_fancy_heading__51142072 .penci-separator {
                                                                    width: 60px;
                                                                }

                                                                #penci_fancy_heading__51142072.penci-fancy-heading .penci-heading-title {
                                                                    font-style: normal;
                                                                }

                                                                @media screen and (min-width: 768px ) {
                                                                    #penci_fancy_heading__51142072.penci-fancy-heading .penci-heading-title {
                                                                        font-size: 30px !important;
                                                                    }
                                                                }

                                                                #penci_fancy_heading__51142072.penci-fancy-heading .penci-heading-subtitle {
                                                                    font-style: normal;
                                                                    text-align: justify;
                                                                }

                                                                @media screen and (min-width: 768px ) {
                                                                    #penci_fancy_heading__51142072.penci-fancy-heading .penci-heading-content {
                                                                        font-size: 20px !important;
                                                                    }
                                                                }

                                                                #penci_fancy_heading__51142072 .penci-separator .penci-heading-icon {
                                                                    margin-left: 15px;
                                                                    margin-right: 15px;
                                                                }</style>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <style>@media (min-width: 768px) {
                                                .vc_inner_44678440 {
                                                    max-width: 1170px;
                                                }
                                            }

                                            @media (min-width: 768px) {
                                                .vc_inner_44678440 {
                                                    position: relative;
                                                    left: 50%;
                                                    transform: translateX(-50%);
                                                }
                                            }

                                            @media (min-width: 960px) {
                                                .vc_column-gap-30.vc_inner_44678440 {
                                                    margin-left: 0;
                                                    margin-right: 0;
                                                }
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection

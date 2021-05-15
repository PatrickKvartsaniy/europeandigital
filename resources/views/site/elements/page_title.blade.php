@if(isset($pageTitle) && !empty($pageTitle))
    <style>
        .hero__content__headline {
            font-size: 1.2rem;
            line-height: 1.2em;
            letter-spacing: .15em;
            text-transform: uppercase;
            min-height: 2.4rem;
        }

        .hero__content > :first-child {
            margin-top: 0;
        }

        @media only screen and (min-width: 48em) {
            .hero__content__headline {
                font-size: 1.4rem;
            }
        }

        @media only screen and (min-width: 64em) {
            .hero__content__headline {
                font-size: 1.6rem;
            }
        }

        .hero__content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 90%;
            margin: 15% 0 5% 5%;
            color: #fff;
        }

        .hero__picture-outer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #000;
        }

        [class*='hero--'], .hero {
            position: relative;
            overflow: hidden;
            max-width: 100vw;
            height: 461px;
            margin-top: -19px;
            margin-bottom: 16px;
        }

        .hero__content__title {
            font-size: 3.6rem;
            line-height: 1.1em;
        }

        @media only screen and (min-width: 48em) {
            .hero__content__title {
                font-size: 4.8rem;
            }
        }


        @media only screen and (min-width: 90em) {
            .hero__content__title {
                font-size: 7.2rem;
            }
        }

    </style>

{{--    <div class="penci-page-header penci-pheader-center penci-phhide-bread penci-phhide-line"--}}
{{--         style="background-color: #f5f5f5;">--}}
{{--        <div class="penci-page-header-inner penci-container-1170">--}}
{{--            <h1 class="penci-page-header-title">{!! $pageTitle !!}</h1>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="hero">
        <div class="hero-inner wrap">
            <div class="hero__picture-outer">
                <img style="width: 100%; height: 480px; margin-top: -19px;" src="/photos/3/categories/E-Government.jpg">
            </div>
            <div class="hero__content">
                <div class="hero__content__headline" data-ref="hero.headline" style="opacity: 1; ">
                </div>
                <h1 class="hero__content__title" data-ref="hero.title" style="opacity: 1;">
                    {{ $pageTitle }}
                </h1>
            </div>
        </div>
    </div>
@endif

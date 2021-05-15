<style>
    .site-footer {
        /*background: #000043;*/
        background: #090f75;
        color: #fff;
        padding: 7rem 0 5rem
    }

    .footer-widget {
        font-size: 1.4rem;
        font-weight: 400;
        line-height: 1.21428571em
    }

    .footer-widget section {
        background: inherit;
        padding: 0
    }

    .footer-widget .menu {
        list-style: none;
        margin-top: 4.5rem
    }

    .footer-widget .menu-item {
        letter-spacing: 0;
        margin-left: 0;
        padding: 0;
        white-space: nowrap
    }

    .footer-widget .menu-item > a {
        font-size: 1.3rem;
        font-weight: 800;
        line-height: 1.21428571em;
        text-transform: none;
        color: #fff
    }

    .footer-widget .menu-item > a:hover {
        color: #63A2E0
    }

    .footer-widget .widget-title {
        font-size: 2rem;
        font-weight: 700;
        line-height: 1.2em;
        color: #fff;
        margin-bottom: 2.5rem
    }

    .footer-logo {
        display: block;
        margin-left: -1rem;
        width: 17rem;
        /*height: 6.29rem*/
    }

    .footer-social-icons {
        margin: 3rem 0 0
    }

    .footer-social-icons > a {
        color: #fff
    }

    .dropdown-option:hover,
    .footer-social-icons > a:hover {
        color: #63A2E0
    }

    .footer-social-icons > a .fab2 {
        font-size: 3.6rem;
        line-height: 1em;
        margin-right: 2rem
    }

    .footer-newsletter-input {
        background: 0 0;
        border: none;
        border-bottom: 1px solid #979797;
        box-sizing: border-box;
        color: #fff;
        margin-bottom: 5rem;
        padding: 1.6rem 1rem;
        width: 100%
    }

    .footer-newsletter-input::placeholder {
        color: #fff
    }

    .footer-newsletter-input:focus,
    .header-form-input:focus,
    .inline-nav-select,
    a:active,
    a:hover {
        outline: 0
    }

    .footer-newsletter-btn {
        -webkit-appearance: none !important;
        font-size: 2rem;
        font-weight: 700;
        line-height: 1.2em;
        color: #000;
        background: #fff;
        border: 1px solid #fff;
        border-radius: 0;
        padding: 2.5rem 0;
        transition: background .2s ease-in-out;
        width: 100%
    }

    .download-bar,
    .footer-newsletter-btn:hover,
    .to-top {
        background: #fbab18
    }

    .footer-copyright {
        margin-top: 2rem
    }

    .flex-expand {
        display: flex;
        flex-direction: column;
        justify-content: space-between
    }

    .to-top {
        border: 1px solid #979797;
        box-shadow: 0 2px 7px 0 rgba(0, 0, 0, .5);
        cursor: pointer;
        padding: 2rem 1.8rem;
        position: fixed;
        bottom: 20px;
        transition: bottom .15s;
        right: 20px
    }

    .above-content,
    .post-item {
        border-bottom: 1px solid #000
    }

    .to-top.hidden {
        bottom: -50rem
    }

    .to-top.locked {
        bottom: auto;
        position: absolute;
        transform: translateY(-100%)
    }

    .to-top > span {
        display: block;
        font-size: 1.4rem;
        font-weight: 800;
        text-transform: uppercase
    }

    @media screen and (min-width: 768px) and (max-width: 980px) {
        .footer-widget:nth-child(1) {
            order: 1
        }

        .footer-widget:nth-child(2) {
            order: 3
        }

        .footer-widget:nth-child(3) {
            order: 2
        }

        .footer-widget:nth-child(4) {
            order: 4
        }
    }

    @media screen and (max-width: 767px) {
        .footer-widget {
            margin-bottom: 30px
        }

        .footer-widget-2 {
            display: none
        }
    }


    .wrapper {
        margin: 0 auto;
        max-width: 960px;
        padding: 0 8rem;
        position: relative;
        width: calc(100% - 16rem)
    }

    .wrapper.flex {
        display: flex
    }

    .wrapper.flex-vc {
        align-items: center;
        justify-content: space-between;
        display: flex
    }

    .wrapper.wide,
    .wrapper.wide.four-column,
    .wrapper.wide.hero-three-column,
    .wrapper.wide.three-column,
    .wrapper.wide.two-column {
        max-width: 1160px
    }

    .wrapper.four-column,
    .wrapper.hero-three-column,
    .wrapper.three-column,
    .wrapper.two-column {
        max-width: 960px;
        padding: 0 8rem;
        width: calc(100% - 16rem)
    }

    @media screen and (max-width: 767px) {
        .wrapper.flex-vc {
            display: block;
            text-align: center
        }

        .wrapper,
        .wrapper.four-column,
        .wrapper.hero-three-column,
        .wrapper.three-column,
        .wrapper.two-column {
            padding: 0 3rem;
            width: calc(100% - 6rem)
        }

        .wrapper.flex {
            display: block
        }
    }


    .two-column {
        flex-wrap: wrap;
        display: flex;
        width: 100%
    }

    .two-column.wrap {
        flex-wrap: wrap
    }

    .two-column.justify-end {
        justify-content: flex-end
    }

    .two-column > .col {
        margin-left: 20px;
        margin-right: 20px;
        position: relative
    }

    .two-column > .col:first-child,
    .two-column > .col:nth-child(2n+1) {
        margin-left: 0
    }

    .two-column > .col:last-child,
    .two-column > .col:nth-child(2n) {
        margin-right: 0
    }

    .two-column > .col-1 {
        flex-basis: calc(42.5% + 40px)
    }

    .two-column > .col-2 {
        flex-basis: 100%
    }

    @media only screen and (max-width: 979px) {
        .two-column > .col + .col {
            margin-top: 6rem
        }
    }

    @media only screen and (max-width: 599px) {
        .two-column {
            display: block
        }

        .two-column > .col {
            margin-left: 0;
            margin-right: 0
        }

        .two-column > .col + .col {
            margin-top: 3rem
        }
    }

    .three-column {
        display: flex;
        width: 100%
    }

    .three-column.wrap {
        flex-wrap: wrap
    }

    .three-column > .col {
        margin-left: 20px;
        margin-right: 20px;
        position: relative
    }

    .three-column > .col:first-child,
    .three-column > .col:nth-child(3n+1) {
        margin-left: 0
    }

    .three-column > .col:last-child,
    .three-column > .col:nth-child(3n) {
        margin-right: 0
    }

    .three-column > .col-1 {
        flex-basis: 33.33%
    }

    .three-column > .col-2 {
        flex-basis: calc(66.66% + 40px)
    }

    @media only screen and (min-width: 980px) {
        .three-column > .col-1 {
            max-width: 33.33%
        }

        .three-column > .col-1.member-login {
            max-width: 100%
        }

        .three-column > .col-2 {
            max-width: calc(66.66% + 40px)
        }
    }

    .three-column > .col-3 {
        flex-basis: 100%
    }

    @media only screen and (max-width: 979px) {
        .three-column {
            display: block
        }

        .three-column > .col {
            margin-left: 0;
            margin-right: 0
        }

        .three-column > .col + .col {
            margin-top: 6rem
        }

        .four-column {
            flex-wrap: wrap
        }
    }

    @media only screen and (max-width: 599px) {
        .three-column > .col + .col {
            margin-top: 3rem
        }
    }

    .four-column {
        display: flex;
        width: 100%
    }

    .four-column.wrap {
        flex-wrap: wrap
    }

    .four-column > .col {
        margin-left: 13.33px;
        margin-right: 13.33px;
        position: relative
    }

    .four-column > .col:first-child,
    .four-column > .col:nth-child(4n+1) {
        margin-left: 0
    }

    .four-column > .col:last-child,
    .four-column > .col:nth-child(4n) {
        margin-right: 0
    }

    .four-column > .col-1 {
        flex-basis: 25%
    }

    @media only screen and (max-width: 979px) {
        .four-column > .col {
            margin-left: 0;
            margin-right: 0
        }

        .four-column > .col-1 {
            flex-basis: 100%
        }

        .four-column > .col-1.member-login {
            max-width: 100%
        }

        .four-column > .col + .col {
            margin-top: 6rem
        }
    }

    .four-column > .col-2 {
        flex-basis: calc(50% + 40px)
    }

    @media only screen and (min-width: 980px) {
        .four-column > .col-2 {
            flex-basis: calc(50% + 40px)
        }

        .four-column > .col-3 {
            max-width: calc(75 + 40px)
        }
    }

    .four-column > .col-3 {
        flex-basis: calc(75 + 40px)
    }

    .four-column > .col-4 {
        flex-basis: 100%
    }

    @media only screen and (max-width: 599px) {
        .four-column > .col + .col {
            margin-top: 3rem
        }
    }

    @media screen and (max-width: 640px) {
        .centered {
            flex-direction: column
        }
    }

</style>

<footer class="site-footer">
    <div class="wrapper wide four-column">
        <div class="footer-widget col col-1 flex-expand">
            <div>
                <a href="/" rel="home">
                    <img src="/img/logo_white.png"
                         alt="EDDA" class="footer-logo">
                </a>
                <div class="footer-social-icons">
                    <a href="{{$settings->global_facebook_link}}"
                       target="_blank">
                        <i class="fab2 fa fa-facebook-f"></i>
                    </a>
                    <a href="mailto:anna.melenchuk@instingov.org" target="_blank">
                        <i class="fab2 fa fa-envelope"></i>
                    </a>
                    <a href="https://twitter.com/EUDigitalDev" target="_blank">
                        <i class="fab2 fa fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/european-digital-development-alliance/" target="_blank">
                        <i class="fab2 fa fa-linkedin"></i>
                    </a>
                </div>
            </div>
            <p class="footer-copyright">Copyright © {{\Carbon\Carbon::now()->format('Y')}} &nbsp;</p>
        </div>
        <div class="footer-widget footer-widget-2 col col-1">
            <section id="custom_html-2" class="widget_text widget widget_custom_html"><h3 class="widget-title">Contact
                    Us</h3>
                <div class="textwidget custom-html-widget">
                    {!! $settings->global_footer_address  !!}</div>
            </section>
        </div>
        <div class="footer-widget footer-widget-3 col col-1">
            <section id="nav_menu-2" class="widget widget_nav_menu">
                <div class="menu-footer-menu-container">
                    <ul id="menu-footer-menu" class="menu">
                        <li id="menu-item-20440"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20440"><a
                                    href="/">Home</a></li>
                        <li id="menu-item-20439"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20439"><a
                                    href="/news">News</a></li>
                        <li id="menu-item-20443"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20443"><a
                                    href="/members/become-a-member">Become a member</a></li>
                        <li id="menu-item-271"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-271"><a
                                    href="/members/current-members">Current members</a></li>
                        <li id="menu-item-21059"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21059"><a
                                    href="about/about-us">About us</a></li>
                        <li id="menu-item-20441"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20441"><a
                                    href="/about/contact-us">Contact us</a></li>
                        <li id="menu-item-20441"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20441"><a
                                    href="/about/team">Team</a></li>
                        <li id="menu-item-20441"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20441"><a
                                    href="/about/vacancies">Vacancies</a></li>
                    </ul>
                </div>
            </section>
        </div>
        <div class="footer-widget footer-widget-4 col col-1">
            <section id="custom_html-2" class="widget_text widget widget_custom_html">
                <h3 class="widget-title">Newsletter</h3>
                EDDA is a European association which represents think-tanks, civil
                society organizations and experts focusing on digital policies and digital transformation.
                <br>
                <form style="margin-top: 15px;" method="post" action="{{ route('newsletter_subscribe') }}"
                      class="js-sign-up">
                    {{ csrf_field() }}
                    <input type="hidden" name="action" value="newsletter_form">
                    <input type="name" name="email" class="footer-newsletter-input js-email"
                           placeholder="Enter your email">
                    <input type="name" name="name" class="footer-newsletter-input js-email"
                           placeholder="Enter your name">
                    <input type="submit" value="Sign Up >" class="footer-newsletter-btn">
                    <p class="form-notification js-notify"></p>
                </form>
            </section>
        </div>
    </div>
</footer>
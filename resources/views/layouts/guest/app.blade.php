<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.guest.includes.head')

<body style="font-family: 'Work Sans', sans-serif !important;" class="post-template-default single single-post postid-70 single-format-standard custom-background wp-custom-logo header-sticky penci_enable_ajaxsearch penci_sticky_content_sidebar penci_dis_padding_bw sidebar-right penci-single-style-1 wpb-js-composer js-comp-ver-5.4.5 vc_responsive">
@if ($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif

@yield('content')

@include('layouts.guest.includes.foot')

@include('layouts.logged_in.includes.footer')

<!-- General section box modal start -->
<div class="modal" id="section-settings" style="display:none;" tabindex="-1" role="dialog"
     aria-labelledby="ultraModal-Label"
     aria-hidden="true">
    <div class="modal-dialog animated bounceInDown">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Section Settings</h4>
            </div>
            <div class="modal-body">

                Body goes here...

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button class="btn btn-success" type="button">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- modal end -->

@stack('scripts')

</body>
</html>

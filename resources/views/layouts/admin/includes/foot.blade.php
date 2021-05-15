<!-- CORE JS FRAMEWORK - START -->
<script src="{{ asset('assets/js/jquery-1.11.2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/jquery.easing.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/viewport/viewportchecker.js') }}" type="text/javascript"></script>
<!-- CORE JS FRAMEWORK - END -->


<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
<script src="{{ asset('assets/plugins/datepicker/js/datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/autosize/autosize.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


<!-- CORE TEMPLATE JS - START -->
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS - END -->

<!-- Sidebar Graph - START -->
<script src="{{ asset('assets/plugins/sparkline-chart/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/chart-sparkline.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.min.js') }}" type="text/javascript"></script>
<!-- Sidebar Graph - END -->


<script>
    var PENCILOCALIZE = {
        "ajaxUrl": "http:\/\/pennews.pencidesign.com\/pennews-web-hosting-service-multipurpose\/wp-admin\/admin-ajax.php",
        "errorMsg": "Something wrong happened. Please try again.",
        "login": "Email Address",
        "password": "Password",
        "errorPass": "<p class=\"message message-error\">Password does not match the confirm password<\/p>",
        "prevNumber": "1",
        "minlengthSearch": "0",
        "linkTitle": "View More",
        "linkTextAll": "Menu",
        "linkText": "More"
    };

</script>

<script>

    function this_count_value(_this) {
        var parent = $(_this).closest('section');
        var spanHtml = parent.find('.inp_count_value');
        var this_count_value = $(_this).val().length;
        var max_value = $(_this).attr('max');

        spanHtml.text(this_count_value);
    }

</script>
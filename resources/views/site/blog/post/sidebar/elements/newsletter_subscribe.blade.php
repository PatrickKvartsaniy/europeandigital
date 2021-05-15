@if(!isset(\Auth::user()->email) || ! App\Http\Models\NewsLettersSubscribe\NewsLettersSubscribe::checkEmailExists(\Auth::user()->email))
    <div id="mc4wp_form_widget-2"
         class="widget  penci-block-vc penci-widget-sidebar style-title-3 style-title-left widget_mc4wp_form_widget">
        <div class="penci-block-heading">
            <h4 class="widget-title penci-block__title">
                <span>Newsletter</span>
            </h4>
        </div>
        @push('scripts')
            <script>

                $(document).on('submit', '.send_form_ajax',
                    function (e) {
                        e.preventDefault();
                        $(e.currentTarget).addClass('hidden');
                        sendAjaxForm(e.currentTarget, e.currentTarget.method, e.currentTarget.action);
                        // return false;
                    }
                );

                function sendAjaxForm(formElement, method, url) {
                    var data = $(formElement).serializeArray();
                    var result;

                    data.push({name: 'ajax_submit', value: '1'});
                    $.ajax({
                        url: url,
                        type: method,
                        dataType: "html",
                        data: data,
                        success: function (response) {
                            result = $.parseJSON(response);
                        },
                        error: function (response) {
                            alert('Error!');
                        },
                        complete: function (response) {
                            result = $.parseJSON(response.responseText);
                            if (result.status == 'success') {
                                $('#mc4wp-response').html(result.message);
                            } else {
                                $('#mc4wp-response').html(result.message);
                                $(formElement).removeClass('hidden');
                            }
                        }
                    });
                }
            </script>
    @endpush
    <!-- Mailchimp for WordPress v4.3.3 - https://wordpress.org/plugins/mailchimp-for-wp/ -->
        <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-87 send_form_ajax"
              action="{{ route('newsletter_subscribe') }}"
              method="post"
              data-id="87" data-name="Form">
            <div class="mc4wp-form-fields">
                <p class="mdes">Subscribe our newsletter for latest news, service &amp; promo. Let's stay
                    updated!</p>
                <p class="mname">
                    <input type="text" name="name" placeholder="Name...">
                </p>
                <p class="memail">
                    <input type="email" id="mc4wp_email" name="email" placeholder="Email..." required="">
                </p>
                <p class="msubmit">
                    <input type="submit" value="Subscribe">
                </p>
                {{ csrf_field() }}
            </div>
            <div class="mc4wp-response" id="mc4wp-response"></div>
        </form>
    </div>
@endif
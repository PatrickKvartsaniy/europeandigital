@extends('layouts.admin.app')

@section('content')

    @include('admin.common_elements.topbar')

    <!-- START CONTAINER -->
    <div class="page-container row-fluid">

    @include('admin.common_elements.sidebar')

    <!-- START CONTENT -->
        <section id="main-content" class=" ">
            <section class="wrapper main-wrapper" style=''>

                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class="page-title">

                        <div class="pull-left">
                            <h1 class="title">Edit Global Settings</h1></div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/admin/"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="blo-categories.html">Settings</a>
                                </li>
                                <li class="active">
                                    <strong>Edit Global Settings</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-lg-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">Edit Global Settings</h2>
                            <div class="actions panel_actions pull-right">
                                <i class="box_toggle fa fa-chevron-down"></i>
                                <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                <i class="box_close fa fa-times"></i>
                            </div>
                        </header>
                        <div class="content-body">
                            <div class="row">
                                <div class="new-post-blog">
                                    <form action="{{urlloc('/admin/settings/save')}}" accept-charset="UTF-8"
                                          data-no-form-clear="true" role="form" class="role-form"
                                          id="role-form"
                                          method="POST">
                                        {{csrf_field()}}
                                        <br>
                                        <section>
                                            <p class="title">Global Twitter Link</p>
                                            <input type="text" name="global_twitter_link"
                                                   @if(isset($settings->global_twitter_link)) value="{{$settings->global_twitter_link}}" @endif>
                                        </section>
                                        <br>
                                        <section>
                                            <p class="title">Global Facebook Link</p>
                                            <input type="text" name="global_facebook_link"
                                                   @if(isset($settings->global_facebook_link)) value="{{$settings->global_facebook_link}}" @endif>
                                        </section>
                                        <br>
                                        <section>
                                            <p class="title">Global Linkedin Link</p>
                                            <input type="text" name="global_linkedin_link"
                                                   @if(isset($settings->global_linkedin_link)) value="{{$settings->global_linkedin_link}}" @endif>
                                        </section>
                                        <br>
                                        <section>
                                            <p class="title">Global Email Link</p>
                                            <input type="text" name="global_email_link"
                                                   @if(isset($settings->global_email_link)) value="{{$settings->global_email_link}}" @endif>
                                        </section>
                                        <br>
                                        <br>
                                        <section>
                                            <p class="title">Global Footer Address<sup>*</sup></p>
                                            <textarea id="editor1" name="global_footer_address"
                                                      class="">@if(isset($settings->global_footer_address)){!! $settings->global_footer_address !!}@endif</textarea>
                                        </section>
                                        <br>
                                        <section>
                                            <div class="text-center">
                                                <button type="submit" class="btn-def-admin">Сохранить</button>
                                            </div>
                                        </section>
                                        <input name="user_id" hidden
                                               value="@if(isset($settings['id']) && !empty($settings['id']) ){{ $settings['id'] }}@endif"
                                               class="hidden">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>


            </section>
        </section>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->

    @push('scripts')
        <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
        <script src='{{ asset('assets/js/moment-with-locales.js') }}'></script>
        <script src='{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}'></script>
        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <script>

            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            };
        </script>
        <script>
            CKEDITOR.replace('editor1', options);
            CKEDITOR.replace('editor2', options);
            CKEDITOR.replace('editor3', options);
            CKEDITOR.replace('editor4', options);

            $('#lfm').filemanager('image');

            $('input[name="main_img"]').change(function () {
                var fileName = $(this).val();
                if (fileName) {
                    $(this).closest('div').find('div.file-name-holder').text('(' + fileName.replace(/^.*[\\\/]/, '') + ')');
                } else {
                    $(this).closest('div').find('div.file-name-holder').text('');
                }
            });

        </script>
    @endpush
@stop
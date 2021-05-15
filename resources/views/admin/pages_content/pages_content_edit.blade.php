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
                            <h1 class="title">Edit Content</h1></div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/admin/"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="blo-categories.html">Content</a>
                                </li>
                                <li class="active">
                                    <strong>Edit Content</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-lg-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">Add/Edit Member</h2>
                            <div class="actions panel_actions pull-right">
                                <i class="box_toggle fa fa-chevron-down"></i>
                                <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                <i class="box_close fa fa-times"></i>
                            </div>
                        </header>
                        <div class="content-body">
                            <div class="row">
                                <div class="new-post-blog">
                                    <form action="{{urlloc('/admin/pages-content/save')}}" accept-charset="UTF-8"
                                          data-no-form-clear="true" role="form" class="role-form"
                                          id="role-form"
                                          method="POST">
                                        {{csrf_field()}}
                                        <section>
                                            <p class="title">Content <sup>*</sup></p>
                                            <textarea id="content" name="content"
                                                      class="">@if(isset($contentRecord['content'])) {!! $contentRecord['content'] !!}@endif</textarea>
                                        </section>
                                        <br>
                                        <br>
                                        <section>
                                            <div class="text-center">
                                                <button type="submit" class="btn-def-admin">Сохранить</button>
                                            </div>
                                        </section>
                                        <input name="id" hidden
                                               value="@if(isset($contentRecord['id']) && !empty($contentRecord['id']) ){{ $contentRecord['id'] }}@endif"
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
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
                enterMode : CKEDITOR.ENTER_DIV
            };
        </script>
        <script>
            CKEDITOR.replace('content', options);

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
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
                            <h1 class="title">Add/Edit Members</h1></div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/admin/"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="blo-categories.html">Members</a>
                                </li>
                                <li class="active">
                                    <strong>Add/Edit Member</strong>
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
                                    <form action="{{urlloc('/admin/members/save')}}" accept-charset="UTF-8"
                                          data-no-form-clear="true" role="form" class="role-form"
                                          id="role-form"
                                          method="POST">
                                        {{csrf_field()}}
                                        <section>
                                            <p class="title">Аватар пользователя</p>
                                            <div class="uploadPhoto">
                                                @if(isset($member->avatar_img) && !empty($member->avatar_img))
                                                    <div class="text-center block-avatar block-empty-avatar">
                                                        <img width="200" src="{{$member->avatar_img}}">
                                                    </div>
                                                @endif
                                                <div class="input-group">
                                                      <span class="input-group-btn">
                                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                           class="btn btn-primary">
                                                          <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                      </span>
                                                    <input id="thumbnail" class="form-control" type="text"
                                                           name="avatar_img" value="@if(old('avatar_img')) {{ old('avatar_img') }} @elseif(isset($member->avatar_img)) {{$member->avatar_img}} @endif">
                                                </div>
                                                <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
                                        </section>
                                        <section>
                                            <p class="title">First Name<sup>*</sup></p>
                                            <input type="text" name="first_name"
                                                   value="@if(old('first_name')) {{ old('first_name') }} @elseif(isset($member->first_name)) {{$member->first_name}} @endif">
                                        </section>
                                        <section>
                                            <p class="title">Last Name<sup>*</sup></p>
                                            <input type="text" name="last_name"
                                                   value="@if(old('last_name')) {{ old('last_name') }} @elseif(isset($member->last_name)) {{$member->last_name}} @endif">
                                        </section>
                                        <section>
                                            <p class="title">Occupation</p>
                                            <input type="text" name="occupation"
                                                   value="@if(old('occupation')) {{ old('occupation') }} @elseif(isset($member->occupation)) {{$member->occupation}} @endif">
                                        </section>
                                        <section>
                                            <p class="title">Nationality</p>
                                            <input type="text" name="nationality"
                                                   value="@if(old('nationality')) {{ old('nationality') }} @elseif(isset($member->nationality)) {{$member->nationality}} @endif">
                                        </section>
                                        <br>
                                        <br>
                                        <section>
                                            <div class="text-center">
                                                <button type="submit" class="btn-def-admin">Сохранить</button>
                                            </div>
                                        </section>
                                        <input name="individual_member_id" hidden
                                               value="@if(isset($member['id']) && !empty($member['id']) ){{ $member['id'] }}@endif"
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
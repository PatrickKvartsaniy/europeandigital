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
                            <h1 class="title">Add/Edit Article</h1></div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/admin/"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="blo-categories.html">Users</a>
                                </li>
                                <li class="active">
                                    <strong>Add/Edit User</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-lg-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">Add/Edit User</h2>
                            <div class="actions panel_actions pull-right">
                                <i class="box_toggle fa fa-chevron-down"></i>
                                <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                <i class="box_close fa fa-times"></i>
                            </div>
                        </header>
                        <div class="content-body">
                            <div class="row">
                                <div class="new-post-blog">
                                    <form action="{{urlloc('/admin/user/save')}}" accept-charset="UTF-8"
                                          data-no-form-clear="true" role="form" class="role-form"
                                          id="role-form"
                                          method="POST">
                                        {{csrf_field()}}
                                        <section>
                                            <p class="title">Аватар пользователя</p>
                                            <div class="uploadPhoto">
                                                @if(isset($user->avatar_img) && !empty($user->avatar_img))
                                                    <div class="text-center block-avatar block-empty-avatar">
                                                        <img width="200" src="{{$user->avatar_img}}">
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
                                                           name="avatar_img"
                                                           @if(isset($user->avatar_img)) value="{{$user->avatar_img}}" @endif >
                                                </div>
                                                <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
                                        </section>
                                        <section>
                                            <p class="title">Имя пользователя<sup>*</sup></p>
                                            <input type="text" name="name"
                                                   @if(isset($user->name)) value="{{$user->name}}" @endif>
                                        </section>
                                        <section>
                                            <p class="title">Email</p>
                                            <input type="text" name="email"
                                                   @if(isset($user->email)) value="{{$user->email}}" @endif>
                                        </section>
                                        <section>
                                            <p class="title">Phone</p>
                                            <input type="text" name="phone"
                                                   @if(isset($user->phone)) value="{{$user->phone}}" @endif>
                                        </section>
                                        <section>
                                            <p class="title">Twitter</p>
                                            <input type="text" name="twitter"
                                                   @if(isset($user->twitter)) value="{{$user->twitter}}" @endif>
                                        </section>
                                        <section>
                                            <p class="title">Facebook</p>
                                            <input type="text" name="facebook"
                                                   @if(isset($user->facebook)) value="{{$user->facebook}}" @endif>
                                        </section>
                                        <section>
                                            <p class="title">Position number</p>
                                            <input type="text" name="position_number"
                                                   @if(isset($user->position_number)) value="{{$user->position_number}}" @endif>
                                        </section>
                                        <br>
                                        <br>
                                        <br>
                                        <section>
                                            <p class="title">Должность<sup>*</sup></p>
                                            <textarea id="editor1" name="short_description"
                                                      class="">@if(isset($user->short_description)){!! $user->short_description !!}@endif</textarea>
                                        </section>
                                        <br>
                                        <section>
                                            <div class="title">
                                                Роли пользователя
                                                <div class="dropdown post-category inline_block ">
                                                    <button id="post-category-1" class="openBtn" type="button"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        выбрать <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu " aria-labelledby="post-category-1"
                                                        style="padding: 10px;">
                                                        <section id="serie_holder_block" multiple="true">
                                                            @if(isset($roles) && !empty($roles))
                                                                <span>Роли пользователя</span>
                                                                @foreach($roles as $role)
                                                                    <li>
                                                                        <input name="user_role_name[]"
                                                                               value="{{$role->name}}" type="checkbox"
                                                                               @if(isset($user) && !empty($user))
                                                                               @foreach($user->roles as $userRole)
                                                                               @if(isset($userRole->id) && $role->id == $userRole->id) Checked
                                                                               @endif
                                                                               @endforeach
                                                                               @endif
                                                                               class=""
                                                                               id="thisID-{{$role->id}}">
                                                                        <label for="thisID-{{$role->id}}">{{$role->name}}</label>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </section>
                                                    </ul>
                                                </div>
                                            </div>
                                        </section>
                                        <section>
                                            <div class="text-center">
                                                <button type="submit" class="btn-def-admin">Сохранить</button>
                                            </div>
                                        </section>
                                        <input name="user_id" hidden
                                               value="@if(isset($user['id']) && !empty($user['id']) ){{ $user['id'] }}@endif"
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
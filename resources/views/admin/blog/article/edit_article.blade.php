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
                                    <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="blo-categories.html">Articles</a>
                                </li>
                                <li class="active">
                                    <strong>Add/Edit Article</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-lg-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">Add/Edit Article</h2>
                            <div class="actions panel_actions pull-right">
                                <i class="box_toggle fa fa-chevron-down"></i>
                                <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                <i class="box_close fa fa-times"></i>
                            </div>
                        </header>
                        <div class="content-body">
                            <div class="row">
                                <div class="new-post-blog">
                                    <form action="{{urlloc('/admin/blog/article/edit')}}" accept-charset="UTF-8"
                                          data-no-form-clear="true" role="form" class="role-form"
                                          id="role-form"
                                          method="POST">
                                        {{csrf_field()}}
                                        <section>
                                            <p class="title">Фотография поста</p>
                                            <div class="uploadPhoto">
                                                @if(isset($post->main_img) && !empty($post->main_img))
                                                    <div class="text-center block-avatar block-empty-avatar">
                                                        <img width="200" src="{{$post->main_img}}">
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
                                                               name="main_img" value="{{$post->main_img}}">
                                                    </div>
                                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
                                        </section>
                                        <section>
                                            <p class="title">Заголовок публикации <sup>*</sup></p>
                                            <input type="text" name="title"
                                                   @if(isset($post->title)) value="{{$post->title}}" @endif>
                                        </section>
                                        <section>
                                            <p class="title">URL(адрес) страницы <sup>*</sup></p>
                                            <input type="text" name="slug"
                                                   @if(isset($post->slug)) value="{{$post->slug}}" @endif>
                                        </section>
                                        <section>
                                            <p class="title">ВНЕШНИЙ URL(адрес) страницы (для newsletters)</p>
                                            <input class="form-control" type="text" name="external_slug"
                                                   value="@if(old('external_slug')) {{ old('external_slug') }} @elseif(isset($post->external_slug)) {{$post->external_slug}} @endif">
                                        </section>
                                        <section>
                                            <div class="title">
                                                Категории <sup>*</sup>
                                                <div class="dropdown post-category inline_block">
                                                    <button id="post-category-1" class="openBtn" type="button"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        выбрать <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="post-category-1">
                                                        <li class="header">
                                                            <span>Категория</span>
                                                            <div class="post-add-label relative inline_block">
                                                                <input id="new-serie-name-input" type="text"
                                                                       placeholder="Добавить категорию">
                                                                <button type="button" onclick="add_serie(this);"
                                                                        data-post-id="{{$post->id}}" class="addLabel"><i
                                                                            class="fa fa-plus-circle"
                                                                            aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                        </li>
                                                        <section id="serie_holder_block">
                                                            @if(isset($series) && !empty($series))
                                                                @foreach($series as $serie)
                                                                    <li>
                                                                        <input name="serie_id_post"
                                                                               value="{{$serie->id}}" type="radio"
                                                                               @if($serie->id == $post->serie_id) checked
                                                                               @endif class=""
                                                                               id="thisID-{{$serie->id}}">
                                                                        <label for="thisID-{{$serie->id}}">{{$serie->title}}</label>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </section>
                                                        <li class="text-center">
                                                            <button type="button" class="btn-def-admin">Сохранить
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </section>
                                        <section>
                                            <p class="title">Краткое описание <sup>*</sup></p>
                                            <textarea id="editor1" name="short_description"
                                                      class="">@if(isset($post->short_description)){!! $post->short_description !!}@endif</textarea>
                                        </section>
                                        <section>
                                            <p class="title">Полное описание <sup>*</sup></p>
                                            <textarea id="editor2" name="body"
                                                      class="">@if(isset($post->body)) {!! $post->body !!}@endif</textarea>
                                        </section>
                                        <br>
                                        <section>
                                            <div class="title">
                                                Автор <sup>*</sup>
                                                <div class="dropdown post-category inline_block ">
                                                    <button id="post-category-1" class="openBtn" type="button"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        выбрать <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu " aria-labelledby="post-category-1"
                                                        style="padding: 10px;">
                                                        <section id="serie_holder_block">
                                                            @if(isset($authors) && !empty($authors))
                                                                <span>Авторы статей</span>
                                                                @foreach($authors as $author)
                                                                    <li>
                                                                        <input name="user_id"
                                                                               value="{{$author->id}}" type="radio"
                                                                               @if(isset($post->user_id) && $author->id == $post->user_id) checked
                                                                               @endif class=""
                                                                               id="thisID-{{$author->id}}">
                                                                        <label for="thisID-{{$author->id}}">{{$author->name}}</label>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </section>
                                                    </ul>
                                                </div>
                                            </div>
                                        </section>
                                        <br>
                                        <section>
                                            <p class="bigTitle">SEO теги:</p>
                                            <p class="title">Title <span><b class="inp_count_value">0</b> <b> / 100</b></span>
                                            </p>
                                            <input type="text"
                                                   @if(isset($post->meta_title)) value="{!! $post->meta_title !!}"
                                                   @endif name="meta_title" onkeyup="this_count_value(this);" max="10">
                                        </section>
                                        <section>
                                            <p class="title">Description <span><b class="inp_count_value">0</b> <b> / 100</b></span>
                                            </p>
                                            <input type="text"
                                                   @if(isset($post->meta_description)) value="{!! $post->meta_description !!}"
                                                   @endif name="meta_description" onkeyup="this_count_value(this);"
                                                   max="10">
                                        </section>
                                        <section>
                                            <p class="title">Keywords <span><b
                                                            class="inp_count_value">0</b> <b> / 100</b></span></p>
                                            <input type="text"
                                                   @if(isset($post->meta_keywords)) value="{!! $post->meta_keywords !!}"
                                                   @endif name="meta_keywords" onkeyup="this_count_value(this);"
                                                   max="10">
                                        </section>
                                        <section>
                                            <div class="form-group">
                                                <div class='input-group' data-date="" id='datetimepicker111'>
                                                    <input type="text" id="published_at"
                                                           data-date-format="YYYY-MM-DD H:s" name="published_at"
                                                           class="form-control"
                                                           value="@if(isset($post->published_at)){{\Carbon\Carbon::parse($post->published_at)->format('Y-m-d H:i:s')}}@endif"/>
                                                    <span class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </span>
                                                </div>
                                            </div>
                                        </section>
                                        <section>
                                            <p class="title">Метки</p>
                                            <div class="div-label">
                                                <div class="post-add-label relative inline_block">
                                                    <input id="new-tag-name-input" type="text"
                                                           placeholder="Добавить метку">
                                                    <button type="button" onclick="add_tag(this);" class="addLabel"><i
                                                                class="fa fa-plus-circle" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <span id="tag_holder_block">
                            @include('aiw_admin.blog.elements.tags_select_widget')
                        </span>
                                                @if(isset($post->tags) && !empty($post->tags))
                                                    @foreach($post->tags as $tag)
                                                        <span class="output-label">
                                    <i class="fa fa-times" onclick="delete_post_tag(this);"
                                       data-postid="@if(isset($post['id']) && !empty($post['id']) ){{ $post['id'] }}@endif"
                                       data-tagid="{{$tag->id}}" aria-hidden="true"></i>{{$tag->name}}
                                </span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </section>
                                        <section>
                                            <div class="text-center">
                                                <button type="submit" class="btn-def-admin">Сохранить</button>
                                            </div>
                                        </section>
                                        <input name="serie_id" hidden
                                               value="@if(isset($post['id']) && !empty($post['id']) ){{ $post['id'] }}@endif"
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

            function add_tag(_this) {
                $.ajax({
                    method: "POST",
                    url: '{{urlloc('/admin/blog/tag/add')}}',
                    dataType: 'json',
                    data: {
                        _token: '{{csrf_token()}}',
                        name: $('#new-tag-name-input').val(),
                        ajax_submit: true
                    }
                }).done(function (data) {
                    $('#new-tag-name-input').val('');
                    load_tag_selector_block();
                });

                $('#rightMenuCollapse').find('.rightMenuCollapse_content').html('');

            }
            $('#lfm').filemanager('image');
            $('#datetimepicker111').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });

            $('input[name="main_img"]').change(function () {
                var fileName = $(this).val();
                if (fileName) {
                    $(this).closest('div').find('div.file-name-holder').text('(' + fileName.replace(/^.*[\\\/]/, '') + ')');
                } else {
                    $(this).closest('div').find('div.file-name-holder').text('');
                }
            });

            function load_tag_selector_block() {
                $.ajax({
                    method: "GET",
                    url: '{{urlloc('/admin/blog/tag/load-selector')}}',
                    dataType: 'json',
                    data: {
                        _token: '{{csrf_token()}}',
                        ajax_submit: true
                    }
                }).done(function (data) {
                    console.log(data.html);
                    $('#tag_holder_block').html(data.html);
                    $('#tag_holder_block>select').select2('refresh');
                });
            }

            function load_serie_selector_block(_this) {
                $.ajax({
                    method: "GET",
                    url: '{{urlloc('/admin/blog/series/load-selector')}}',
                    dataType: 'json',
                    data: {
                        _token: '{{csrf_token()}}',
                        post_id: $(_this).data('post-id'),
                        ajax_submit: true
                    }
                }).done(function (data) {
                    $('#serie_holder_block').html(data.html);
                });
            }

            function add_serie(_this) {
                $.ajax({
                    method: "POST",
                    url: '{{urlloc('/admin/blog/series/save')}}',
                    dataType: 'json',
                    data: {
                        _token: '{{csrf_token()}}',
                        title: $('#new-serie-name-input').val(),
                        ajax_submit: true
                    }
                }).done(function (data) {
                    $('#new-serie-name-input').val('');
                    load_serie_selector_block(_this);
                });
            }

        </script>
    @endpush
@stop
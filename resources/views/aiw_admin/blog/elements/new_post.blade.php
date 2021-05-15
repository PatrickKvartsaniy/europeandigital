@extends('guest_layouts.admin.default')

@section('content')

    <div class="page_blog">
        <div class="contentTopInfoSection">
            <h1>Добавить Публикацию</h1>
            <a href="{{urlloc('/admin/blog/')}}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Назад</a>
        </div>

        <div class="new-post-blog">
            <form action="{{urlloc('/admin/blog/article/add')}}" accept-charset="UTF-8"
                  data-no-form-clear="true" role="form" class="role-form"
                  id="role-form"
                  method="POST">
                {{csrf_field()}}
                <section>
                    <p class="title">Фотография поста</p>
                    <div class="uploadPhoto">
                        <div class="text-center block-avatar block-empty-avatar">
                            <p class="upload-ico"><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                            <span class="upload-title">Загрузить Фотографию</span>
                            <div class="relative">
                                <input type="file" name="main_img" id="avatar">
                                <label for="avatar" class="btn-def-admin">Загрузить <div class="file-name-holder"></div></label>
                            </div>
                            <div class="small-description">
                                формат jpg или png,
                                минимальный размер 1024 пикс (по ширине),
                                размер до 1Мб
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <p class="title">Заголовок публикации <sup>*</sup></p>
                    <input type="text" name="title" @if(isset($post->title)) value="{{$post->title}}" @endif>
                </section>
                <section>
                    <p class="title">URL(адрес) страницы <sup>*</sup></p>
                    <input type="text" name="slug" @if(isset($post->slug)) value="{{$post->slug}}" @endif>
                </section>
                <section>
                    <div class="title">
                        Категории <sup>*</sup>
                        <div class="dropdown post-category inline_block">
                            <button id="post-category-1" class="openBtn" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                выбрать <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="post-category-1">
                                <li class="header">
                                    <span>Категория</span>
                                    <div class="post-add-label relative inline_block">
                                        <input id="new-serie-name-input" type="text" placeholder="Добавить категорию">
                                        <button type="button" onclick="add_serie(this);" data-post-id="" class="addLabel"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </li>
                                <section id="serie_holder_block">
                                    @if(isset($series) && !empty($series))
                                        @foreach($series as $serie)
                                            <li>
                                                <input name="serie_id_post" value="{{$serie->id}}" type="radio" @if(isset($post->serie_id) && $serie->id == $post->serie_id) checked
                                                       @endif class="" id="thisID-{{$serie->id}}">
                                                <label for="thisID-{{$serie->id}}">{{$serie->title}}</label>
                                            </li>
                                        @endforeach
                                    @endif
                                </section>
                                <li class="text-center">
                                    <button type="button" class="btn-def-admin">Сохранить</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section>
                    <p class="title">Краткое описание <sup>*</sup></p>
                    <textarea id="editor1" name="short_description"
                              class="">@if(isset($post->short_description)){!! $post->short_description !!} @endif</textarea>
                </section>
                <section>
                    <p class="title">Полное описание <sup>*</sup></p>
                    <textarea id="editor2" name="body"
                              class="">@if(isset($post->body)) {!! $post->body !!}@endif</textarea>
                </section>
                <section>
                    <p class="bigTitle">SEO теги:</p>
                    <p class="title">Title <span><b class="inp_count_value">0</b> <b> / 100</b></span></p>
                    <input type="text" @if(isset($post->meta_title)) value="{!! $post->meta_title !!}"
                           @endif name="meta_title" onkeyup="this_count_value(this);" max="10">
                </section>
                <section>
                    <p class="title">Description <span><b class="inp_count_value">0</b> <b> / 100</b></span></p>
                    <input type="text" @if(isset($post->meta_description)) value="{!! $post->meta_description !!}"
                           @endif name="meta_description" onkeyup="this_count_value(this);" max="10">
                </section>
                <section>
                    <p class="title">Keywords <span><b class="inp_count_value">0</b> <b> / 100</b></span></p>
                    <input type="text" @if(isset($post->meta_keywords)) value="{!! $post->meta_keywords !!}"
                           @endif name="meta_keywords" onkeyup="this_count_value(this);" max="10">
                </section>
                <section>
                    <div class="form-group">
                        <div class='input-group' data-date="" id='datetimepicker111'>
                            <input type="text" id="published_at" data-date-format="YYYY-MM-DD H:s" name="published_at" class="form-control" value="@if(isset($post->published_at)){{\Carbon\Carbon::parse($post->published_at)->format('Y-m-d H:i:s')}}@endif"/>
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
                            <input id="new-tag-name-input" type="text" placeholder="Добавить метку">
                            <button type="button" onclick="add_tag(this);" class="addLabel"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </button>
                        </div>
                        <span id="tag_holder_block">
                            <select class="inline_block selectpicker" multiple>
                                <option>выбрать метку</option>
                                @if(isset($tags) && !empty($tags))
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </span>
                        @if(isset($post->tags) && !empty($post->tags))
                            @foreach($post->tags as $tag)
                                <span class="output-label">
                                    <i class="fa fa-times" aria-hidden="true"></i>{{$tag->name}}
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
            </form>
        </div>

    </div>
    <script src='{{ asset('assets/js/moment-with-locales.js') }}'></script>
    <script src='{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}'></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
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

        $('#datetimepicker111').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        });

        $('input[name="main_img"]').change(function(){
            var fileName = $(this).val();
            if(fileName) {
                $(this).closest('div').find('div.file-name-holder').text('('+fileName.replace(/^.*[\\\/]/, '')+')');
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
@stop
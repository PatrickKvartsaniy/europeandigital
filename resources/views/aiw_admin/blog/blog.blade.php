@extends('guest_layouts.admin.default')

@section('content')

    <div class="page_blog">
        <div class="contentTopInfoSection">
            <h1>Блог</h1>
            <div class="col-right-grid">
                <button type="button" class="btn-add btn-def-admin nonBgCl marg_l_r_15 open_right_menu" onclick="tags(this);"><i class="fa fa-tags" aria-hidden="true"></i> <span>Метки</span></button>
                <button type="button" class="btn-add btn-def-admin nonBgCl marg_l_r_15 open_right_menu" onclick="series(this);"><i class="fa fa-list-ul" aria-hidden="true"></i> <span>Категории</span></button>
                <button type="button" class="btn-add btn-def-admin marg_l_r_15 open_right_menu"><a href="{{urlloc('/admin/blog/article/add')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span>Добавить пост</span></a></button>
            </div>
        </div>

        <div class="contentTopInfoSection padding-left-none padding-top-none">
            <div class="adminBlockFilters">
                <section class="inline_block">
                    <span>Категории</span>
                    <select>
                        <option value="Все">Все</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </section>
                <section class="inline_block">
                    <span>Дата создания:</span>
                    <select>
                        <option value="Любая">Любая</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </section>
            </div>
            <div class="inline_block search-parent">
                <input id="search-input" type="text" placeholder="Поиск"> <i class="fa fa-search" aria-hidden="true"></i>
            </div>
        </div>

        @include('aiw_admin.blog.datatables.articles_table')

    </div>

    <script>

        function add_administrator(_this) {
            $('#rightMenuCollapse').find('.rightMenuCollapse_content').html('');

            $.ajax({
                method: "GET",
                url: '{{urlloc('/admin/blog/article/add')}}',
                dataType: 'json',
            }).done(function (data) {
                if (data.status == 'ok') {
                    $('#rightMenuCollapse').find('.rightMenuCollapse_content').html(data.html);
                    $('.rightMenuCollapse').addClass('on');
                    $('body').addClass('no-scroll');
                }
            });
        }

        function tags(_this) {
            $('#rightMenuCollapse').find('.rightMenuCollapse_content').html('');

            $.ajax({
                method: "GET",
                url: '{{urlloc('/admin/blog/tag/list')}}',
                dataType: 'json',
            }).done(function (data) {
                if (data.status == 'ok') {
                    $('#rightMenuCollapse').find('.rightMenuCollapse_content').html(data.html);
                    $('.rightMenuCollapse').addClass('on');
                    $('body').addClass('no-scroll');
                }
            });
        }

        function delete_post(_this) {
            var data = {
                id: $(_this).data('post-id'),
                ajax_submit: true
            };

            $.ajax({
                method: "POST",
                url: '{{urlloc('/admin/blog/article/delete')}}',
                dataType: 'json',
                data: data
            }).done(function (data) {
                location.reload();
            });

            $('#rightMenuCollapse').find('.rightMenuCollapse_content').html('');
        }

        function series(_this) {
            $('#rightMenuCollapse').find('.rightMenuCollapse_content').html('');

            $.ajax({
                method: "GET",
                url: '{{urlloc('/admin/blog/series/list')}}',
                dataType: 'json',
            }).done(function (data) {
                if (data.status == 'ok') {
                    $('#rightMenuCollapse').find('.rightMenuCollapse_content').html(data.html);
                    $('.rightMenuCollapse').addClass('on');
                    $('body').addClass('no-scroll');
                }
            });
        }

    </script>
@stop
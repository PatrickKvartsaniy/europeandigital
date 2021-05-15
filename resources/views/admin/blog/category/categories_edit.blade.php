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
                            <h1 class="title">@if(isset($serie->id)) Edit @else Add @endif Blog Category</h1></div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="blo-tags.html">Categories</a>
                                </li>
                                <li class="active">
                                    <strong>@if(isset($serie->id)) Edit @else Add @endif Category</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">Basic Info</h2>
                            <div class="actions panel_actions pull-right">
                                <i class="box_toggle fa fa-chevron-down"></i>
                                <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                <i class="box_close fa fa-times"></i>
                            </div>
                        </header>
                        <div class="content-body">
                            <div class="row">
                                <form action="@if(isset($serie->id)) {{ urlloc('/admin/blog/series/edit') }} @else {{ urlloc('/admin/blog/series/save') }} @endif"
                                      method="post">
                                    <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">

                                        {{ csrf_field() }}
                                        <section>
                                            <p class="title">Фотография категории</p>
                                            <div class="uploadPhoto">
                                                @if($serie && isset($serie->main_img) && !empty($serie->main_img))
                                                    <br>
                                                    <div class="text-center block-avatar block-empty-avatar">
                                                        <img width="200" src="{{$serie->main_img}}">
                                                    </div>
                                                    <br>
                                                @endif
                                                <div class="input-group">
                                                      <span class="input-group-btn">
                                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                           class="btn btn-primary">
                                                          <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                      </span>
                                                    <input id="thumbnail" class="form-control" type="text"
                                                           name="main_img"
                                                           value="@if($serie && isset($serie->main_img) && !empty($serie->main_img)) {{$serie->main_img}} @endif">
                                                </div>
                                                <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
                                        </section>
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">SHOW THIS CATEGORY IN MAIN
                                                MENU?</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input name="show_in_main_menu" type="checkbox"
                                                       @if(isset($serie) && isset($serie->show_in_main_menu) && $serie->show_in_main_menu) {{'checked'}} @else {{''}} @endif
                                                       class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Category Name</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input name="title" type="text"
                                                       value="@if(isset($serie) && isset($serie->title)) {{ $serie->title }} @endif"
                                                       class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Category Slug</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input name="slug" type="text"
                                                       value="@if(isset($serie) && isset($serie->slug)) {{ $serie->slug }} @endif"
                                                       class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="field-6">Description</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <textarea name="description" class="form-control autogrow"
                                                          cols="5">@if(isset($serie) && isset($serie->description)) {{ $serie->description }} @endif</textarea>
                                            </div>
                                        </div>


                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                            <div class="text-left">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="button" class="btn">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    @if(isset($serie->id)) <input class="hidden" hidden name="id"
                                                                  value="{{ $serie->id }}"> @endif
                                </form>
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

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
        <!-- DataTables -->
        <script src="{{ asset('assets/plugins/datatables/js/jquery.dataTables.min.js') }}"
                type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"
                type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"
                type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js') }}"
                type="text/javascript"></script>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

        <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var oTableActivity = $('#tags-admin').DataTable({
                processing: true,
                serverSide: true,
                dom: 'rtip',
                ajax: {
                    url: '{!! route('datatables.get_series_list_admin') !!}',
                    method: 'GET',
                    data: function (d) {
                        d.filter_by_created_days_ago = $('#filter_by_created_days_ago').val();
                        d.status = $('#filter_by_status').val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'description', name: 'description'},
                    {data: 'articles_count', name: 'articles_count'},
                    {data: 'created_at', name: 'created_at'},
                ],
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        $(input).appendTo($(column.footer()).empty())
                            .on('change', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                    });
                }
            });

            $(document).on('change', '.articles_select', function (e) {
                setTimeout(function () {
                    oTableActivity.draw();
                }, 2000);
                e.preventDefault();
            });

            $('#search-input').on('keyup', function () {
                oTableActivity.search(this.value).draw();
            });

            $(document).on('click', 'button[type="submit"]', function () {
                setTimeout(function () {
                    oTableActivity.draw();
                }, 2000);
            });

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

        </script>

    @endpush
@stop
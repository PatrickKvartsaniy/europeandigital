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
                            <h1 class="title">@if(isset($tag->id)) Edit @else Add @endif Blog Tag</h1></div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="blo-tags.html">Tags</a>
                                </li>
                                <li class="active">
                                    <strong>@if(isset($tag->id)) Edit @else Add @endif Tag</strong>
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
                                <form action="@if(isset($tag->id)) {{ urlloc('/admin/blog/tag/edit') }} @else {{ urlloc('/admin/blog/tag/save') }} @endif"
                                      method="post">
                                    <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Tag Name</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input name="name" type="text"
                                                       value="@if(isset($tag) && isset($tag->name)) {{ $tag->name }} @endif"
                                                       class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Tag Slug</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input name="slug" type="text"
                                                       value="@if(isset($tag) && isset($tag->slug)) {{ $tag->slug }} @endif"
                                                       class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="field-6">Description</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <textarea name="description" class="form-control autogrow"
                                                          cols="5">@if(isset($tag) && isset($tag->description)) {{ $tag->description }} @endif</textarea>
                                            </div>
                                        </div>


                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                            <div class="text-left">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="button" class="btn">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    @if(isset($tag->id)) <input class="hidden" hidden name="id"
                                                                value="{{ $tag->id }}"> @endif
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

        <script>
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
                    url: '{!! route('datatables.get_tag_list_admin') !!}',
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
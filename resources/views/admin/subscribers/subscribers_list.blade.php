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
                            <h1 class="title">Subscribers</h1></div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/admin/"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="/">Subscribers</a>
                                </li>
                                <li class="active">
                                    <strong>All Subscribers</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-lg-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">All Subscribers</h2>
                            <div class="actions panel_actions pull-right">
                                <i class="box_toggle fa fa-chevron-down"></i>
                                <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                <i class="box_close fa fa-times"></i>
                            </div>
                        </header>
                        <div class="content-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="subscribers-admin" class="display table table-hover table-condensed"
                                           cellspacing="0"
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created at</th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
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

            var oTableActivity = $('#subscribers-admin').DataTable({
                processing: true,
                serverSide: true,
                dom: 'rtip',
                order: [ [2, 'desc'] ],
                ajax: {
                    url: '{!! route('datatables.get_subscribers_list_admin') !!}',
                    method: 'GET',
                    data: function (d) {
                        d.filter_by_created_days_ago = $('#filter_by_created_days_ago').val();
                        d.status = $('#filter_by_status').val();
                    }
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
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

            $(document).on('change', '.users_select', function (e) {
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

            function delete_user(_this) {
                var data = {
                    id: $(_this).data('user-id'),
                    _token: '{{ csrf_token() }}',
                    ajax_submit: true
                };

                $.ajax({
                    method: "POST",
                    url: '{{urlloc('/admin/user/delete')}}',
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
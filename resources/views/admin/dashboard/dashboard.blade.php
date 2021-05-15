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
                            <h1 class="title">Blog</h1></div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="general.html">Multi Purpose</a>
                                </li>
                                <li class="active">
                                    <strong>Blog Admin</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>


                <div class="col-lg-12">
                    <section class="box nobox">
                        <div class="content-body">

                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="r4_counter db_box">
                                        <i class='pull-left fa fa-thumbs-up icon-md icon-rounded icon-primary'></i>
                                        <div class="stats">
                                            <h4><strong>450K</strong></h4>
                                            <span>Blog Page Views</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="r4_counter db_box">
                                        <i class='pull-left fa fa-user icon-md icon-rounded icon-orange'></i>
                                        <div class="stats">
                                            <h4><strong>6243</strong></h4>
                                            <span>New Visitors</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="r4_counter db_box">
                                        <i class='pull-left fa fa-database icon-md icon-rounded icon-purple'></i>
                                        <div class="stats">
                                            <h4><strong>99.9%</strong></h4>
                                            <span>Server Up</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="r4_counter db_box">
                                        <i class='pull-left fa fa-users icon-md icon-rounded icon-warning'></i>
                                        <div class="stats">
                                            <h4><strong>1433</strong></h4>
                                            <span>New Users</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End .row -->


                            <div class="row">


                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="r1_maingraph db_box">
                                            <span class='pull-left'>
                                                <i class='icon-purple fa fa-square icon-xs'></i>&nbsp;<small>PAGE VIEWS</small>&nbsp; &nbsp;<i
                                                        class='fa fa-square icon-xs icon-primary'></i>&nbsp;<small>UNIQUE VISITORS</small>
                                            </span>
                                        <div id="db_morris_area_graph" style="height:272px;width:100%;"></div>
                                    </div>
                                </div>

                            </div> <!-- End .row -->


                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="wid-vectormap">
                                        <h4>Visitor's Statistics</h4>
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <figure>
                                                    <div id="db-world-map-markers"
                                                         style="width: 100%; height: 300px"></div>
                                                </figure>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12 map_progress">
                                                <h4>Unique Visitors</h4>
                                                <span class='text-muted'><small>Last Week Rise by 62%</small></span>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                         aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 62%"></div>
                                                </div>
                                                <br>
                                                <h4>Registrations</h4>
                                                <span class='text-muted'><small>Up by 57% last 7 days</small></span>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                         aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 57%"></div>
                                                </div>
                                                <br>
                                                <h4>Direct Sales</h4>
                                                <span class='text-muted'><small>Last Month Rise by 22%</small></span>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                         aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 22%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div> <!-- End .row -->

                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">

                                    <div class="r1_graph1 db_box db_box_large">
                                        <span class='bold'>98.95%</span>
                                        <span class='pull-right'><small>SERVER UP</small></span>
                                        <div class="clearfix"></div>
                                        <span class="db_dynamicbar">Loading...</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">

                                    <div class="r1_graph2 db_box db_box_large">
                                        <span class='bold'>2332</span>
                                        <span class='pull-right'><small>USERS ONLINE</small></span>
                                        <div class="clearfix"></div>
                                        <span class="db_linesparkline">Loading...</span>
                                    </div>

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
        <script src="{{ asset('assets/plugins/rickshaw-chart/vendor/d3.v3.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/jquery-ui/smoothness/jquery-ui.min.js') }}"
                type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/rickshaw-chart/js/Rickshaw.All.js') }}"></script>
        <script src="{{ asset('assets/plugins/sparkline-chart/jquery.sparkline.min.js') }}"
                type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/easypiechart/jquery.easypiechart.min.js') }}"
                type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/morris-chart/js/raphael-min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/morris-chart/js/morris.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.1.min.js') }}"
                type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"
                type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/gauge/gauge.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/blo-dashboard.js') }}" type="text/javascript"></script>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var oTableActivity = $('#articles-admin').DataTable({
                processing: true,
                serverSide: true,
                dom: 'rtip',
                ajax: {
                    url: '{!! route('datatables.get_article_list_admin') !!}',
                    method: 'GET',
                    data: function (d) {
                        d.filter_by_created_days_ago = $('#filter_by_created_days_ago').val();
                        d.status = $('#filter_by_status').val();
                    }
                },
                columns: [
                    {data: 'image', name: 'image'},
                    {data: 'title', name: 'title'},
                    {data: 'serie_id', name: 'serie_id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'tags', name: 'tags'},
                    {data: 'action', name: 'action'},
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

        </script>

    @endpush
@stop
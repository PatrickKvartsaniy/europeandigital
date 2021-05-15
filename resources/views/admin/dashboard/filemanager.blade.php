@extends('layouts.admin.app')

@section('content')

    @include('admin.common_elements.topbar')

    <!-- START CONTAINER -->
    <div class="page-container row-fluid">

    @include('admin.common_elements.sidebar')

    <!-- START CONTENT -->
        <section id="main-content" class=" ">
            <iframe style="min-height: 600px;" width="100%" height="100%"
                    src="{{ urlloc('/admin/laravel-filemanager') }}"></iframe>
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
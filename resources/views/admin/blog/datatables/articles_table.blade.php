{{--<section class="filter_sortable_section">--}}
    {{--<div class="inline_block">--}}
        {{--<select id="filter_by_created_days_ago" class="selectpicker articles_select">--}}
            {{--<option value="">{{trans('crypto_art.any_period')}}</option>--}}
            {{--@foreach($filterByDaysAgoData as $filterByDaysAgoRow)--}}
                {{--<option value="{{$filterByDaysAgoRow['days_ago']}}">{{$filterByDaysAgoRow['label']}}</option>--}}
            {{--@endforeach--}}
        {{--</select>--}}
    {{--</div>--}}
    {{--@if(isset($statuses) && !empty($statuses))--}}
        {{--<div class="inline_block marg_all">--}}
            {{--<div class="inline_block marg_all">--}}
                {{--<span>{{trans('crypto_art.status')}}</span>--}}
                {{--<select id="filter_by_status" class="selectpicker articles_select" multiple>--}}
                    {{--@foreach($statuses as $key => $status)--}}
                        {{--<option value="{{$key}}">{{trans($status)}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}
{{--</section>--}}

<div class="scrollTable">
    <table id="articles-admin" class="table table-hover adminTable">
        <thead>
        <tr>
            <th>Публикация</th>
            <th>Анонс</th>
            <th>Категория</th>
            <th>Метки</th>
            <th>Дата создания</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@push('scripts')
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
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

        $('#search-input').on( 'keyup', function () {
            oTableActivity.search( this.value ).draw();
        } );

        $(document).on('click', 'button[type="submit"]', function () {
            setTimeout(function () {
                oTableActivity.draw();
            }, 2000);
        });

    </script>

@endpush

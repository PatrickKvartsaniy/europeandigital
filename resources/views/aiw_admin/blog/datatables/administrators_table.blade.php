<section class="filter_sortable_section">
    <div class="inline_block">
        <select id="filter_by_created_days_ago" class="selectpicker administrators_select">
            <option value="">{{trans('crypto_art.any_period')}}</option>
            @foreach($filterByDaysAgoData as $filterByDaysAgoRow)
                <option value="{{$filterByDaysAgoRow['days_ago']}}">{{$filterByDaysAgoRow['label']}}</option>
            @endforeach
        </select>
    </div>
    @if(isset($statuses) && !empty($statuses))
        <div class="inline_block marg_all">
            <div class="inline_block marg_all">
                <span>{{trans('crypto_art.status')}}</span>
                <select id="filter_by_status" class="selectpicker administrators_select" multiple>
                    @foreach($statuses as $key => $status)
                        <option value="{{$key}}">{{trans($status)}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</section>

<div class="ggggg">

    <table id="administrators-admin" class="table table-hover adminTable">
        <thead>
        <tr>
            <th>№</th>
            <th>full_name</th>
            <th>email</th>
            <th>created_at</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>
<div class="modal fade" id="remove_row_table" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit administrator</h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
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

        var oTableAdministrators = $('#administrators-admin').DataTable({
            processing: true,
            serverSide: true,
            dom: 'rtip',
            ajax: {
                url: '{!! route('datatables.administratorslistadmin') !!}',
                method: 'GET',
                data: function (d) {
                    d.filter_by_created_days_ago = $('#filter_by_created_days_ago').val();
                    d.status = $('#filter_by_status').val();
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'full_name', name: 'full_name'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
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

        $(document).on('change', '.administrators_select', function (e) {
            setTimeout(function () {
                oTableAdministrators.draw();
            }, 2000);
            e.preventDefault();
        });

        $(document).on('click', 'button[type="submit"]', function () {
            setTimeout(function () {
                oTableAdministrators.draw();
            }, 2000);
        });

        $('#search-input').on( 'keyup', function () {
            oTableAdministrators.search( this.value ).draw();
        } );

        function show_administrator(_this) {
            var user_id = $(_this).attr('data-user_id');
            var data = {
                'user_id': user_id
            };

            $('#rightMenuCollapse').find('.rightMenuCollapse_content').html('');

            $.ajax({
                method: "GET",
                url: '{{urlloc('/admin/users/administrators/show')}}',
                dataType: 'json',
                data: data
            }).done(function (data) {
                if (data.status == 'ok') {
                    $('#rightMenuCollapse').find('.rightMenuCollapse_content').html(data.html);
                    $('.rightMenuCollapse').addClass('on');
                    $('body').addClass('no-scroll');
                }
            });
        }

        function edit_administrator(_this) {
            var user_id = $(_this).attr('data-user_id');
            var data = {
                'user_id': user_id
            };

            $('#rightMenuCollapse').find('.rightMenuCollapse_content').html('');

            $.ajax({
                method: "GET",
                url: '{{urlloc('/admin/users/administrators/edit')}}',
                dataType: 'json',
                data: data
            }).done(function (data) {
                if (data.status == 'ok') {
                    $('#rightMenuCollapse').find('.rightMenuCollapse_content').html(data.html);
                    $('.rightMenuCollapse').addClass('on');
                    $('body').addClass('no-scroll');
                }
            });
        }
    </script>

@endpush

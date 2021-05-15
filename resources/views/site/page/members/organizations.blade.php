@extends('layouts.guest.app')

@section('content')
    @include('site.elements.header')
    @include('site.elements.header_mobile')
    @include('site.elements.menu_mobile')
    @include('site.elements.page_title')




    <div id="page" class="site">
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    {!! $content !!}
                </main>
            </div>
        </div>
    </div>

    @push('scripts')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>


        <script>
            $(document).ready(function() {
                    $('#individual-users').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ route('members.individual_members.get') }}',
                        columns: [
                            // {data: 'id'},
                            {data: 'avatar_img'},
                            {data: 'first_name'},
                            {data: 'last_name'},
                            {data: 'occupation'},
                            {data: 'nationality'},
                        ]
                    });

            });
        </script>
    @endpush

@endsection
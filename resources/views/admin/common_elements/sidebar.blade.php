<!-- SIDEBAR - START -->
<div class="page-sidebar ">

    <!-- MAIN MENU - START -->
    <div class="page-sidebar-wrapper" id="main-menu-wrapper">

        <!-- USER INFO - START -->
        <div class="profile-info row">

            <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                <a href="#">
                    <img src="{{ @\Auth::user()->avatar_img }}" class="img-responsive img-circle">
                </a>
            </div>

            <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                <h3>
                    <a href="#">{{ @\Auth::user()->name }}</a>

                    <!-- Available statuses: online, idle, busy, away and offline -->
                    <span class="profile-status online"></span>
                </h3>

                @if($roles = @\Auth::user()->roles)
                    <p class="profile-title">
                        @foreach($roles as $role)
                            {{ $role['name'] }}
                        @endforeach
                    </p>
                @endif
            </div>

        </div>
        <!-- USER INFO - END -->


        <ul class='wraplist'>


            <li class="">
                <a href="{{ urlloc('/admin/dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="{{ active(['admin/blog/article*'], 'open') }}">
                <a href="javascript:;">
                    <i class="fa fa-edit"></i>
                    <span class="title">Articles</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu" style='{{ active(['admin/blog/article*'], 'display:block;') }}'>
                    <li>
                        <a class="" href="{{ urlloc('/admin/blog/article/list') }}">All Articles</a>
                    </li>
                    <li>
                        <a class="" href="{{ urlloc('/admin/blog/article/add') }}">Add/Edit Article</a>
                    </li>
                </ul>
            </li>
            <li class="{{ active(['admin/blog/series*'], 'open') }}">
                <a href="javascript:;">
                    <i class="fa fa-sitemap"></i>
                    <span class="title">Categories</span>
                    <span class="arrow {{ active(['admin/blog/series*'], 'open') }}"></span>
                </a>
                <ul class="sub-menu" style='{{ active(['admin/blog/series*'], 'display:block;') }}'>
                    <li>
                        <a class="" href="{{ urlloc(route('admin.series')) }}">All Categories</a>
                    </li>
                    <li>
                        <a class="" href="{{ urlloc(route('admin.series.add')) }}">Add/Edit Category</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-upload"></i>
                    <span class="title">Media</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a class="" href="{{ urlloc('/laravel-filemanager') }}">All Media</a>
                    </li>
                </ul>
            </li>

            {{--<li class="">--}}
            {{--<a href="javascript:;">--}}
            {{--<i class="fa fa-files-o"></i>--}}
            {{--<span class="title">Pages</span>--}}
            {{--<span class="arrow "></span>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
            {{--<li>--}}
            {{--<a class="" href="blo-pages.html">All Pages</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a class="" href="blo-page-add.html">Add Page</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a class="" href="blo-page-edit.html">Edit Page</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a class="" href="blo-page-view.html">View Page</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            <li class="{{ active(['admin/user*'], 'open') }}">
                <a href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span class="title">Users</span>
                    <span class="arrow {{ active(['admin/user*'], 'open') }}"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a class="{{ active(['admin/user/list*'], 'active') }}" href="/admin/user/list">All Users</a>
                    </li>
                    <li>
                        <a class="" href="/admin/user/edit">Add/Edit User</a>
                    </li>
                </ul>
            </li>
            <li class="{{ active(['admin/subscribers*'], 'open') }}">
                <a href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span class="title">Subscribers</span>
                    <span class="arrow {{ active(['admin/subscribers*'], 'open') }}"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a class="{{ active(['admin/subscribers/list*'], 'active') }}" href="/admin/subscribers/list">All subscribers</a>
                    </li>
                </ul>
            </li>
            <li class="{{ active(['admin/members*'], 'open') }}">
                <a href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span class="title">Individual members</span>
                    <span class="arrow {{ active(['admin/members*'], 'open') }}"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a class="{{ active(['admin/members/list*'], 'active') }}" href="/admin/members/list">All individual members</a>
                    </li>
                    <li>
                        <a class="" href="/admin/members/edit">Add/Edit individual member</a>
                    </li>
                </ul>
            </li>
            <li class="{{ active(['admin/settings*'], 'open') }}">
                <a href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span class="title">Global settings</span>
                    <span class="arrow {{ active(['admin/settings*'], 'open') }}"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a class="{{ active(['admin/settings/edit*'], 'active') }}" href="/admin/settings/edit">All global settings</a>
                    </li>
                </ul>
            </li>
            {{--<li class="">--}}
            {{--<a href="javascript:;">--}}
            {{--<i class="fa fa-envelope"></i>--}}
            {{--<span class="title">Mailbox</span>--}}
            {{--<span class="arrow "></span><span class="label label-orange">4</span>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
            {{--<li>--}}
            {{--<a class="" href="blo-mail-inbox.html">Inbox</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a class="" href="blo-mail-compose.html">Compose</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a class="" href="blo-mail-view.html">View</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="">--}}
            {{--<a href="javascript:;">--}}
            {{--<i class="fa fa-bar-chart"></i>--}}
            {{--<span class="title">Reports</span>--}}
            {{--<span class="arrow "></span>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
            {{--<li>--}}
            {{--<a class="" href="blo-report-site.html">Site</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a class="" href="blo-report-visitors.html">Visitors</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            <li class="{{ active(['admin/blog/tag*'], 'open') }}">
                <a href="javascript:;">
                    <i class="fa fa-tags"></i>
                    <span class="title">Tags</span>
                    <span class="arrow {{ active(['admin/blog/tag*'], 'open') }}"></span>
                </a>
                <ul class="sub-menu" style='{{ active(['admin/blog/tag*'], 'display:block;') }}'>
                    <li>
                        <a class="{{ active(['admin/blog/tag/list'], 'active') }}"
                           href="{{ urlloc('/admin/blog/tag/list') }}">All Tags</a>
                    </li>
                    <li>
                        <a class="" href="{{ urlloc('/admin/blog/tag/edit') }}">Add/Edit Tag</a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
    <!-- MAIN MENU - END -->


    <div class="project-info">

        <div class="block1">
            <div class="data">
                <span class='title'>New&nbsp;Users</span>
                <span class='total'>245</span>
            </div>
            <div class="graph">
                <span class="sidebar_orders">...</span>
            </div>
        </div>

        <div class="block2">
            <div class="data">
                <span class='title'>Subscribers</span>
                <span class='total'>990</span>
            </div>
            <div class="graph">
                <span class="sidebar_visitors">...</span>
            </div>
        </div>

    </div>


</div>
<!--  SIDEBAR - END -->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            {{-- <div>
                <img src="upload/users/{{Auth::User()->image}}" width="45px" />
        </div>
        <div class="admin-info">
            <div class="font-strong">{{Auth::User()->fullname}}</div><small>{{Auth::User()->roles->name}}</small>
        </div> --}}
    </div>
    <ul class="side-menu metismenu">
        <li class="heading">FEATURES</li>
        @if (Auth::user()->role_id == 1)
        <li class="{{ request()->route()->named('user*') ? 'active' : '' }}">
            <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                <span class="nav-label">Quản trị</span><i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{route('user_list')}}">Danh sách quản trị</a>
                </li>
                <li>
                    <a href="{{route('user_create')}}">Thêm quản trị</a>
                </li>
            </ul>
        </li>
        <li class="{{ request()->route()->named('student*') ? 'active' : '' }}">
            <a href="javascript:;"><i class="sidebar-item-icon fa fa-graduation-cap"></i>
                <span class="nav-label">Học sinh</span><i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{route('students_list')}}">Danh sách Học sinh</a>
                </li>
                <li>
                    <a href="{{route('students_create')}}">Thêm Học sinh</a>
                </li>
                <li>
                    <a href="{{route('dutrainghiem_admin_index')}}">CT trải nghiệm</a>
                </li>
            </ul>
        </li>


        <li class="{{ request()->route()->named('student*') ? 'active' : '' }}">
            <a href="javascript:;">
                <i class="sidebar-item-icon fa fa-graduation-cap"></i>
                <span class="nav-label">Kế toán</span>
                <i class="fa fa-angle-left arrow"></i>
            </a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{route('accountant_list')}}">DS đã xác nhận</a>
                </li>
                <li>
                    <a href="{{route('accountant_deposit_list')}}">DS đặt cọc</a>
                </li>
                <li>
                    <a href="{{route('accountant_no_deposit_list')}}">DS không cần đặt cọc</a>
                </li>
            </ul>
        </li>

        @elseif (Auth::user()->role_id == 2)
        <li class="{{ request()->route()->named('student*') ? 'active' : '' }}">
            <a href="javascript:;"><i class="sidebar-item-icon fa fa-graduation-cap"></i>
                <span class="nav-label">Học sinh</span><i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{route('students_list')}}">Danh sách Học sinh</a>
                </li>
                <li>
                    <a href="{{route('students_create')}}">Thêm Học sinh</a>
                </li>
                <li>
                    <a href="{{route('dutrainghiem_admin_index')}}">CT trải nghiệm</a>
                </li>
            </ul>
        </li>
        @else
        <li class="{{ request()->route()->named('student*') ? 'active' : '' }}">
            <a href="javascript:;">
                <i class="sidebar-item-icon fa fa-graduation-cap"></i>
                <span class="nav-label">Kế toán</span>
                <i class="fa fa-angle-left arrow"></i>
            </a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{route('accountant_list')}}">DS đã xác nhận</a>
                </li>
                <li>
                    <a href="{{route('accountant_deposit_list')}}">DS đặt cọc</a>
                </li>
                <li>
                    <a href="{{route('accountant_no_deposit_list')}}">DS không cần đặt cọc</a>
                </li>
            </ul>
        </li>
        @endif

        {{-- <li class="{{ request()->route()->named('news*') ? 'active' : '' }}">
        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
            <span class="nav-label">Bài viết</span><i class="fa fa-angle-left arrow"></i></a>
        <ul class="nav-2-level collapse">
            <li>
                <a href="{{route('news_list')}}">Danh sách Bài viết</a>
            </li>
            <li>
                <a href="{{route('news_create')}}">Thêm Bài viết</a>
            </li>
        </ul>
        </li>
        <li class="{{ request()->route()->named('project*') ? 'active' : '' }}">
            <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                <span class="nav-label">Projects</span><i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{route('project_list')}}">Projects List</a>
                </li>
                <li>
                    <a href="{{route('project_create')}}">Add new project</a>
                </li>
            </ul>
        </li>
        <li class="{{ request()->route()->named('service*') ? 'active' : '' }}">
            <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                <span class="nav-label">Services</span><i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{route('service_list')}}">Services List</a>
                </li>
                <li>
                    <a href="{{route('service_create')}}">Add new service</a>
                </li>
            </ul>
        </li> --}}
        {{-- <li class="heading">SCHOOL</li>
        <li class="{{ request()->route()->named('school_create*') ? 'active' : '' }}">
            <a href="{{route('school_create')}}"><i class="sidebar-item-icon fa fa-bookmark"></i>
                <span class="nav-label">Thêm trường</span></a>
        </li>
        <li class="{{ request()->route()->named('school_list*') ? 'active' : '' }}">
            <a href="{{route('school_list')}}"><i class="sidebar-item-icon fa fa-list"></i>
                <span class="nav-label">Danh sách trường</span></a>
        </li>
        <li class="{{ request()->route()->named('all_school*') ? 'active' : '' }}">
            <a href="{{route('all_school')}}"><i class="sidebar-item-icon fa fa-list"></i>
                <span class="nav-label">Danh sách trường</span></a>
        </li>
        <li class="{{ request()->route()->named('dutrainghiem_admin_index*') ? 'active' : '' }}">
            <a href="{{route('dutrainghiem_admin_index')}}"><i class="sidebar-item-icon fa fa-list"></i>
                <span class="nav-label">Dự Trải Nghiệm</span></a>
        </li> --}}
    </ul>
    </div>
</nav>

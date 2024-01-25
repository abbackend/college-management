@inject('request', 'Illuminate\Http\Request')

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('dist/img/avatar3.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ $request->segment(2) === 'home' ? 'active' : '' }}">
            <a href="{{ route('home') }}">
                <i class="fa fa-dashboard"></i> <span>{{ __('Dashboard') }}</span>
            </a>
        </li>
        <li class="{{ $request->segment(2) === 'courses' ? 'active' : '' }}">
            <a href="{{ route('courses.index') }}">
                <i class="fa fa-book"></i> <span>{{ __('Courses') }}</span>
            </a>
        </li>
        <li class="{{ $request->segment(2) === 'subjects' ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-address-book"></i> <span>{{ __('Subjects') }}</span>
            </a>
        </li>
        <!-- <li class="treeview {{ $request->segment(2) === 'users' ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-users"></i> <span>{{ __('Students') }}</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $request->segment(3) == null ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}"><i class="fa fa-clock-o"></i>{{ __('List') }}</a>
                </li>
                <li class="{{ $request->segment(3) === 'sessions' ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-clock-o"></i>{{ __('Sessions') }}</a>
                </li>
            </ul>
        </li> -->
        <li class="{{ $request->segment(2) === 'users' ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">
                <i class="fa fa-users"></i> <span>{{ __('Students') }}</span>
            </a>
        </li>
        <li class="{{ $request->segment(2) === 'results' ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-file"></i> <span>{{ __('Results') }}</span>
            </a>
        </li>
    </ul>
</section>
<!-- /.sidebar -->

@inject('request', 'Illuminate\Http\Request')

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            @if(Auth::user()->type->value == 'admin')
                <img src="{{ asset('dist/img/avatar6.png') }}" class="img-circle" alt="User Image">
            @elseif(Auth::user()->details->profile_image)
                <img src="{{ route('display.image', Auth::user()->details->profile_image) }}" class="img-circle" alt="User Image">    
            @else
                <img src="{{ asset('dist/img/avatar6.png') }}" class="img-circle" alt="User Image">
            @endif
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    @if(Auth::user()->type->value == 'admin')
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
            <a href="{{ route('subjects.index') }}">
                <i class="fa fa-address-book"></i> <span>{{ __('Subjects') }}</span>
            </a>
        </li>
        <li class="{{ $request->segment(2) === 'users' ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">
                <i class="fa fa-users"></i> <span>{{ __('Students') }}</span>
            </a>
        </li>
        <li class="{{ $request->segment(2) === 'results' ? 'active' : '' }}">
            <a href="{{ route('results.index') }}">
                <i class="fa fa-file"></i> <span>{{ __('Results') }}</span>
            </a>
        </li>
    </ul>
    @else
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ $request->segment(1) === 'home' ? 'active' : '' }}">
            <a href="{{ route('home') }}">
                <i class="fa fa-dashboard"></i> <span>{{ __('Dashboard') }}</span>
            </a>
        </li>
        <li class="{{ $request->segment(1) === 'results' ? 'active' : '' }}">
            <a href="{{ route('student.results.index') }}">
                <i class="fa fa-file"></i> <span>{{ __('Results') }}</span>
            </a>
        </li>
    </ul>
    @endif
</section>
<!-- /.sidebar -->

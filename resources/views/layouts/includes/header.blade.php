<!-- Logo -->
<a href="{{ route('home') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">{!! config('app.smallname') !!}</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">{!! config('app.largename') !!}</span>
</a>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('dist/img/avatar3.png') }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ asset('dist/img/avatar3.png') }}" class="img-circle" alt="User Image">
                        <p>
                            {{ Auth::user()->name }} - Admin
                            <small>Member since {{ date('M. Y', strtotime(Auth::user()->created_at)) }}</small>
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">

                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <!-- <div class="pull-left">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div> -->
                        <div class="pull-right">
                            <a href="#" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Sign out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

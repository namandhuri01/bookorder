<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center">
                @if(auth()->user() && auth()->user()->profile)
                    <img src="{{ (auth()->user()->profile)?auth()->user()->profile->thumb_image:asset('images/profile.png') }}" alt="person" class="img-fluid rounded-circle">
                @endif
                <h2 class="h5">Welcome</h2><span>{{auth()->user()->name}}</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo">
                <a href="index.html" class="brand-small text-center"> 
                    {{auth()->user()->name}}
                </a>
            </div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">                  
                <li class="{{ route('admin.dashboard') == url()->current() ? 'active': null }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-dashboard"></i>{{ __('Dashboard') }}
                    </a>
                </li>
                
                <li class="{{ route('admin.users.index') == url()->current() ? 'active': null }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="fa fa-group"></i>{{ __('Users') }}
                    </a>
                </li>
                <li class="{{ route('admin.books.index') == url()->current() ? 'active': null }}">
                    <a href="{{ route('admin.books.index') }}">
                        <i class="fa fa-group"></i>{{ __('Books') }}
                    </a>
                </li>
                 

            </ul>
        </div>
    </div>
</nav>
<header class="main-header">
    <a href="{{ route('dashboard') }}" class="logo">
        {{-- <img class="logo-lg" src="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['header_logo'] }}" style="width: 90px;position: absolute;left: 5%;top: 20%;" alt=""> --}}
        <img class="logo-lg" src="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['admin_header_logo'] }}" style="width: 200px;position: absolute;left: 1%;top: 20%;" alt="">
        {{-- <span class="logo-lg" style="position: absolute;top: 205%;left: 4%;">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span> --}}
    </a>

    <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Admin Panel</span>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ url('/') }}" target="_blank">Visit Website</a>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->image)
                            <img src="{{ asset('public/admin/assets/img') }}/{{ Auth::user()->image }}" class="user-image" alt="user photo">
                        @else
                            <img src="{{ asset('public/admin/assets/img/dummy-user.png') }}" class="user-image" alt="user photo">
                        @endif
                        <span class="hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div>
                                <a href="{{ route('admin.profile.edit') }}" class="btn btn-default btn-flat">Edit Profile</a>
                            </div>
                            <div>
                                <a class="dropdown-item btn btn-default btn-flat" href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </nav>
</header>

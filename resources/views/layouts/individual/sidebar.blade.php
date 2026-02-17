<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{ route('dashboard') }}"
                    class="{{ request()->is('dashboard') || request()->is('profile/*') ? 'active' : '' }}">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            {{-- <li class="treeview">
                <a href="{{ route('billing_address.index') }}" class="{{ request()->is('billing_address') || request()->is('billing_address/create') || request()->is('billing_address/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-credit-card"></i> <span>Billing Address</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('shipping_address.index') }}" class="{{ request()->is('shipping_address') || request()->is('shipping_address/create') || request()->is('shipping_address/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-truck"></i> <span>Shipping Address</span>
                </a>
            </li> --}}

            <li class="treeview">
                <a href="{{ route('member.profile.edit') }}"
                    class="{{ request()->is('member/profile/edit') ? 'active' : '' }}">
                    <i class="fa fa-shopping-cart"></i> <span>My Profile</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('order.index') }}"
                    class="{{ request()->is('order') || request()->is('order/create') || request()->is('order/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-shopping-cart"></i> <span>Orders</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('wishlist.index') }}" class="">
                    <i class="fa fa-shopping-cart"></i> <span>Wishlist / Favorites</span>
                </a>
            </li>
            {{-- <li class="treeview">
                <a href="{{route('gift-history.index')}}" class="">
                    <i class="fa fa-shopping-cart"></i> <span>Gift History</span>
                </a>
            </li> --}}
            <li class="treeview {{ request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') ? 'active' : '' }}"
                style="height: auto;">
                <a href="#"
                    class="{{ request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') ? 'active' : '' }}">
                    <i class="fa fa-envelope"></i>
                    <span>Enquiries</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu"
                    style="display: {{ request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') ? 'block' : 'none' }};">
                    <li class="treeview">
                        <a href="{{ route('my-e-card-enquiries') }}"
                            class="{{ request()->is('my-e-card-enquiries') && !request()->is('my-e-card-enquiries/*') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>E-Card Enquiry</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li class="treeview">
                <a href="{{route('notifications.index')}}" class="">
                    <i class="fa fa-bell"></i> <span>Notifications</span>
                </a>
            </li> --}}
            <li class="treeview">
                {{-- <a href="{{route('admin.logout')}}" class="">
                    <i class="fa fa-cog"></i> <span>Logout</span>
                </a> --}}
                <a class="" href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                    <span><i class="fa-solid fa-arrow-right-from-bracket" style="width: 20px;"></i></span>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </section>
</aside>

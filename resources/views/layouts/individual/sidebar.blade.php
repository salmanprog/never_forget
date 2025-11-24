<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') || request()->is('profile/*') ? 'active' : '' }}">
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
                <a href="{{route('myprofile.index')}}" class="">
                    <i class="fa fa-shopping-cart"></i> <span>My Profile</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('order.index') }}" class="{{ request()->is('order') || request()->is('order/create') || request()->is('order/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-shopping-cart"></i> <span>Orders</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{route('wishlist.index')}}" class="">
                    <i class="fa fa-shopping-cart"></i> <span>Wishlist / Favorites</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{route('gift-history.index')}}" class="">
                    <i class="fa fa-shopping-cart"></i> <span>Gift History</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{route('notifications.index')}}" class="">
                    <i class="fa fa-bell"></i> <span>Notifications</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{route('settings.index')}}" class="">
                    <i class="fa fa-cog"></i> <span>Logout / Settings</span>
                </a>
            </li>
 
        </ul>
    </section>
</aside>

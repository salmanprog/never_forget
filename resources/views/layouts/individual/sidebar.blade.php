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
                <a href="{{ route('member.profile') }}"
                    class="{{ request()->path() === 'member/profile' ? 'active' : '' }}">
                    <i class="fa fa-shopping-cart"></i> <span>My Profile</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('member/friends-family*') ? 'active' : '' }}" style="height: auto;">
                <a href="#" class="{{ request()->is('member/friends-family*') ? 'active' : '' }}">
                    <i class="fa fa-users"></i>
                    <span>Friends/Family Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: {{ request()->is('member/friends-family*') ? 'block' : 'none' }};">
                    <li class="treeview">
                        <a href="{{ route('member.friends_family.index') }}" class="{{ request()->is('member/friends-family') && !request()->is('member/friends-family/create') && !request()->is('member/friends-family/bulk-upload') && !request()->is('member/friends-family/*/edit') ? 'active' : '' }}">
                            <i class="fa fa-list"></i> <span>All friends/family</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('member.friends_family.create') }}" class="{{ request()->is('member/friends-family/create') ? 'active' : '' }}">
                            <i class="fa fa-user-plus"></i> <span>Add friends/family</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('member.friends_family.bulk-upload') }}" class="{{ request()->is('member/friends-family/bulk-upload') ? 'active' : '' }}">
                            <i class="fa fa-upload"></i> <span>Bulk upload</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{ route('member.friends_family.gifting') }}" class="{{ request()->is('member/friends-family-gifting') ? 'active' : '' }}">
                    <i class="fa fa-gift"></i> <span>Friends/Family Gifting</span>
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
            <li class="treeview {{ request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') || request()->is('member/balloon-enquiries') || request()->is('member/perfect-gift-enquiries') || request()->is('member/business-card-orders') || request()->is('member/quality-logo-enquiries') || request()->is('member/journey-expert-enquiries') || request()->is('member/gusto-enquiries') ? 'active' : '' }}"
                style="height: auto;">
                <a href="#"
                    class="{{ request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') || request()->is('member/balloon-enquiries') || request()->is('member/perfect-gift-enquiries') || request()->is('member/business-card-orders') || request()->is('member/quality-logo-enquiries') || request()->is('member/journey-expert-enquiries') || request()->is('member/gusto-enquiries') ? 'active' : '' }}">
                    <i class="fa fa-envelope"></i>
                    <span>All Enquiries</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu"
                    style="display: {{ request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') || request()->is('member/balloon-enquiries') || request()->is('member/perfect-gift-enquiries') || request()->is('member/business-card-orders') || request()->is('member/quality-logo-enquiries') || request()->is('member/journey-expert-enquiries') || request()->is('member/gusto-enquiries') ? 'block' : 'none' }};">
                    <li class="treeview">
                        <a href="{{ route('my-e-card-enquiries') }}"
                            class="{{ request()->is('my-e-card-enquiries') && !request()->is('my-e-card-enquiries/*') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>E Card</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('member.balloon-enquiries') }}"
                            class="{{ request()->is('member/balloon-enquiries') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>Balloons</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('member.perfect-gift-enquiries') }}"
                            class="{{ request()->is('member/perfect-gift-enquiries') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>Perfect Gift</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('member.business-card-orders') }}"
                            class="{{ request()->is('member/business-card-orders') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>Business Card</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('member.quality-logo-enquiries') }}"
                            class="{{ request()->is('member/quality-logo-enquiries') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>Quality Logo</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('member.journey-expert-enquiries') }}"
                            class="{{ request()->is('member/journey-expert-enquiries') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>Journey Expert</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('member.gusto-enquiries') }}"
                            class="{{ request()->is('member/gusto-enquiries') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>Gusto</span>
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

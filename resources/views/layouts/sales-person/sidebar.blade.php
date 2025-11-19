<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') || request()->is('profile/*') ? 'active' : '' }}">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
             
            <li class="treeview">
                <a href="{{ route('mts-dashboard.index') }}" class="{{ request()->is('mts-dashboard*') ? 'active' : '' }}">
                    <i class="fa fa-gift"></i> <span>MTS Dashboard</span>
                </a>
            </li>
 
        </ul>
    </section>
</aside>

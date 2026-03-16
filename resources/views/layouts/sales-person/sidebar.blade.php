<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') || request()->is('profile/*') ? 'active' : '' }}">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ request()->is('mts-dashboard*') || request()->is('templates') || request()->is('templates/*') || request()->is('email-templates') || request()->is('email-templates/*') || request()->is('text-message-templates') || request()->is('text-message-templates/*') || request()->is('phone-script-templates') || request()->is('phone-script-templates/*') ? 'active' : '' }}">
                <a href="#" class="{{ request()->is('mts-dashboard*') || request()->is('templates') || request()->is('templates/*') || request()->is('email-templates') || request()->is('email-templates/*') || request()->is('text-message-templates') || request()->is('text-message-templates/*') || request()->is('phone-script-templates') || request()->is('phone-script-templates/*') ? 'active' : '' }}">
                    <i class="fa fa-gift"></i> <span>MTS Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: {{ request()->is('mts-dashboard*') || request()->is('templates') || request()->is('templates/*') || request()->is('email-templates') || request()->is('email-templates/*') || request()->is('text-message-templates') || request()->is('text-message-templates/*') || request()->is('phone-script-templates') || request()->is('phone-script-templates/*') ? 'block' : 'none' }};">
                    <li class="treeview">
                        <a href="{{ route('mts-dashboard.index') }}" class="{{ request()->is('mts-dashboard*') && !request()->is('sms-replies') ? 'active' : '' }}">
                            <i class="fa fa-gift"></i> <span>My Assigned Accounts</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('templates.index') }}" class="{{ request()->is('templates') || request()->is('templates/*') || request()->is('email-templates') || request()->is('email-templates/*') || request()->is('text-message-templates') || request()->is('text-message-templates/*') || request()->is('phone-script-templates') || request()->is('phone-script-templates/*') ? 'active' : '' }}">
                            <i class="fa fa-envelope-o"></i> <span>Templates</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li class="treeview">
                <a href="{{ route('sms-replies') }}" class="{{ request()->is('sms-replies') ? 'active' : '' }}">
                    <i class="fa fa-comment"></i> <span>SMS Replies</span>
                </a>
            </li> --}}

        </ul>
    </section>
</aside>

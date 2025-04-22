<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
      <ul class="menu-inner">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
          <a href="{{ url('/admin/dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboard">Dashboard</div>
          </a>
        </li>

        <!-- Sites -->
        <li class="menu-item {{ request()->segment(2) == 'sites' ? 'active' : '' }}">
          <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
            <div data-i18n="Sites">Sites</div>
          </a>

          <ul class="menu-sub">
            <li class="menu-item {{ request()->segment(2) == 'sites' && request()->segment(3) == '' ? 'active' : '' }}">
              <a href="{{ url('/admin/sites') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-menu-2"></i>
                <div data-i18n="List">List</div>
              </a>
            </li>
          </ul>
        </li>
        <!-- Reports -->
        <li class="menu-item {{ request()->segment(2) == 'reports' ? 'active' : '' }}">
          <a href="{{ url('/admin/reports') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-bar-chart"></i>
            <div data-i18n="Reports">Reports</div>
          </a>
        </li>

        <!-- Configuration -->
        <li class="menu-item {{ request()->segment(2) == 'config' ? 'active' : '' }}">
          <a href="{{ url('/admin/config') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div data-i18n="Configuration">Configuration</div>
          </a>
        </li>

        <!-- User Management -->
        <li class="menu-item {{ request()->segment(2) == 'user-management' ? 'active' : '' }}">
          <a href="{{ url('/admin/user-management') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-user"></i>
            <div data-i18n="User Management">User Management</div>
          </a>
        </li>
      </ul>
    </div>
  </aside>
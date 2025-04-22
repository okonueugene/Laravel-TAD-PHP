<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme"
    style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            @if (auth()->user()->site->hasMedia('site_logo'))
                <img src="{{ asset('storage/' . auth()->user()->site->getMedia('site_logo')->first()->id . '/' . auth()->user()->site->getMedia('site_logo')->first()->file_name) }}"
                    alt="Brand Logo" class="img-fluid" width="90px" height="90px">
            @else
                <img src="{{ asset('images/OptimumGrouplogo.png') }}" alt="Brand Logo" class="img-fluid" width="90px"
                    height="90px">
            @endif

            <span class="app-brand-text demo menu-text fw-bold">{{ env('APP_NAME') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 ps">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->routeIs('staff.dashboard') ? 'active open' : '' }}">
            <a href="{{ route('staff.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        @if (auth()->user()->hasPermissionTo('view_supervisor'))
            <li class="menu-item {{ request()->segment(2) == 'company' ? 'active open' : '' }}">
                <a href="{{ url('app/company') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-building"></i>
                    <div data-i18n="Company">Company</div>
                </a>
            </li>
            <li class="menu-item {{ request()->segment(2) == 'supervisor' ? 'active open' : '' }}">
                <a href="{{ url('app/supervisor') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-crown"></i>
                    <div data-i18n="Supervisor’s">Supervisor’s</div>

                </a>
            </li>
        @endif
        @if (auth()->user()->hasPermissionTo('view_personnel_present'))
            <li class="menu-item {{ request()->segment(2) == 'personnel' ? 'active open' : '' }}">
                <a href="{{ url('app/personnel') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-user"></i>
                    <div data-i18n="Personnel">Personnel</div>
                </a>
            </li>
        @endif
        @if (auth()->user()->hasPermissionTo('view_first_responder'))
            <li class="menu-item {{ request()->segment(2) == 'first-responders' ? 'active open' : '' }}">
                <a href="{{ url('app/first-responders') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-user"></i>
                    <div data-i18n="First Responder">First Responder</div>
                </a>
            </li>
        @endif
        <!-- Tasks -->
        @if (auth()->user()->hasPermissionTo('view_sor'))
            <li class="menu-item {{ in_array(request()->segment(2), ['sors']) ? 'active open' : '' }}">
                <a href="#" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                    <div data-i18n="Safety Observation Records (SOR's)">Safety Observation Records (SOR's)</div>
                </a>

                <ul class="menu-sub">
                    @if (auth()->user()->hasPermissionTo('add_sor'))
                        {{-- <li class="menu-item {{ request()->routeIs('sor') ? 'active' : '' }}">
                            <a href="{{ route('sor') }}" class="menu-link">
                                <div data-i18n="Add Record">Add Record</div>
                            </a>
                        </li> --}}
                    @endif
                    <li
                        class="menu-item {{ in_array(request()->segment(2), ['sors']) && empty(request()->type_param) ? 'active' : '' }}">
                        <a href="{{ url('/app/sors') }}" class="menu-link">
                            <div data-i18n="SOR's">SOR's</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ in_array(request()->segment(2), ['sors']) && request()->type_param == 3 ? 'active' : '' }}">
                        <a href="{{ url('/app/sors') }}?type_param=3" class="menu-link">
                            <div data-i18n="Reported Hazards">Reported Hazards</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ in_array(request()->segment(2), ['sors']) && request()->type_param == 4 ? 'active' : '' }}">
                        <a href="{{ url('/app/sors') }}?type_param=4" class="menu-link">
                            <div data-i18n="Suggested Improvements">Suggested Improvements</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ in_array(request()->segment(2), ['sors']) && request()->type_param == 2 ? 'active' : '' }}">
                        <a href="{{ url('/app/sors') }}?type_param=2" class="menu-link">
                            <div data-i18n="Good Practises">Good Practises</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ in_array(request()->segment(2), ['sors']) && request()->type_param == 1 ? 'active' : '' }}">
                        <a href="{{ url('/app/sors') }}?type_param=1" class="menu-link">
                            <div data-i18n="Bad Practises">Bad Practises</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <!-- Incidents -->
        @if (auth()->user()->hasPermissionTo('view_incident'))
            <li class="menu-item {{ in_array(request()->segment(2), ['incidents']) ? 'active open' : '' }}">
                <a href="#" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                    <div data-i18n="Incident Manager">Incident Manager</div>
                </a>

                <ul class="menu-sub">
                    <li
                        class="menu-item {{ in_array(request()->segment(2), ['incidents']) && empty(request()->type_param) ? 'active' : '' }}">
                        <a href="{{ url('/app/incidents') }}" class="menu-link">
                            <div data-i18n="Incidents">Incidents</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ in_array(request()->segment(2), ['incidents']) && request()->type_param == 1 ? 'active' : '' }}">
                        <a href="{{ url('/app/incidents') }}?type_param=1" class="menu-link">
                            <div data-i18n="Near Miss">Near Miss</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ in_array(request()->segment(2), ['incidents']) && request()->type_param == 2 ? 'active' : '' }}">
                        <a href="{{ url('/app/incidents') }}?type_param=2" class="menu-link">
                            <div data-i18n="First Aid Case">First Aid Case</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ in_array(request()->segment(2), ['incidents']) && request()->type_param == 3 ? 'active' : '' }}">
                        <a href="{{ url('/app/incidents') }}?type_param=3" class="menu-link">
                            <div data-i18n="Medical Treated Case">Medical Treated Case</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ in_array(request()->segment(2), ['incidents']) && request()->type_param == 4 ? 'active' : '' }}">
                        <a href="{{ url('/app/incidents') }}?type_param=4" class="menu-link">
                            <div data-i18n="Lost Time Accidents">Lost Time Accidents</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ in_array(request()->segment(2), ['incidents']) && request()->type_param == 5 ? 'active' : '' }}">
                        <a href="{{ url('/app/incidents') }}?type_param=5" class="menu-link">
                            <div data-i18n="SIF (SIF-p / SIF -a)">SIF (SIF-p / SIF -a)</div>
                        </a>
                    </li>

                </ul>
            </li>
        @endif
        <!-- Deviations -->
        @if (auth()->user()->hasPermissionTo('view_icas'))
            <li class="menu-item {{ request()->segment(2) == 'icas' ? 'active open' : '' }}">
                <a href="{{ url('/app/icas') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                    <div data-i18n="Immediate Corrective Actions (ICA)">Immediate Corrective Actions (ICA)</div>
                </a>
            </li>
        @endif
        <!-- Permits -->
        <li class="menu-item {{ request()->segment(2) == 'permits' ? 'active open' : '' }}">
            <a href="{{ url('/app/permits') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-checklist"></i>
                <div data-i18n=" Permits Applicable"> Permits Applicable</div>
            </a>
        </li>
        @if (auth()->user()->hasPermissionTo('view_tasks'))
            <li class="menu-item {{ request()->segment(2) == 'user-tasks' ? 'active open' : '' }}">
                <a href="{{ url('/app/user-tasks') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-list"></i>
                    <div data-i18n="Tasks">Tasks</div>
                </a>
            </li>
        @endif
        <li class="menu-item  {{ request()->segment(2) == 'environment' ? 'active open' : '' }}">
            <a href="{{ url('/app/environment') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-tree"></i>
                <div data-i18n="Environment Concerns">Environment Concerns</div>
            </a>
        </li>
        <li class="menu-item {{ request()->segment(1) == 'trainings' ? 'active open' : '' }}">
            <a href="{{ url('/app/trainings') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-book"></i>
                <div data-i18n="Trainings">Trainings</div>
            </a>
        </li>
        <!-- Apps & Pages -->
        @if (auth()->user()->hasPermissionTo('view_users'))
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Management</span>
            </li>
            {{-- <li class="menu-item {{ request()->segment(2) == 'users' ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Users">Users</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->segment(2) == 'users' ? 'active' : '' }}">
                        <a href="{{ url('/app/users') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                </ul> 
            </li> --}}
        @endif
        <li class="menu-item {{ request()->segment(2) == 'reports' ? 'active open' : '' }}">
            <a href="{{ url('/app/reports') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-report"></i>
                <div data-i18n="Reports">Reports</div>
            </a>
        </li>
        {{-- @if (auth()->user()->hasPermissionTo('view_roles'))
            <li
                class="menu-item {{ in_array(request()->segment(2) ,['roles']) ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="Roles &amp; Permissions">Roles &amp; Permissions</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->segment(2) == 'roles' ? 'active' : '' }}">
                        <a href="{{ url('/app/roles') }}" class="menu-link">
                            <div data-i18n="Roles">Roles</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('permissions') ? 'active open' : '' }}">
                        <a href="{{ route('permissions') }}" class="menu-link">
                            <div data-i18n="Permission">Permission</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Misc</span>
        </li>
        {{-- <li class="menu-item {{ request()->routeIs('faqs') ? 'active open' : '' }}">
            <a href="{{ route('faqs') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div data-i18n="FAQs">FAQs</div>
            </a>
        </li> --}}
        <li class="menu-item {{ request()->routeIs('help') ? 'active open' : '' }}">
            <a href="https://docs.askaritechnologies.com/" class="menu-link" target="_blank">
                <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                <div data-i18n="Help Center">Help Center</div>
            </a>
        </li>


        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 4px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </ul>
</aside>

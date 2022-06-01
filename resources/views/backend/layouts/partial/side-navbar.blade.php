<div id="kt_aside" class="aside aside-light aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="{{route('dashboard')}}">
            <img alt="Logo" src="{{asset('public/assets/img/backend/logo/logo-dark.png')}}" class="h-40px logo" />
        </a>
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
                </svg>
            </span>
        </div>
    </div>
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <div class="menu-item">
                    <a class="menu-link {{ Ekko::areActiveRoutes(['dashboard']) }}" href="{{route('dashboard')}}">
                        <span class="menu-icon">
                            <i class="bi bi-grid-fill"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">User Management</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ Ekko::areActiveRoutes(['profile.index']) }}" href="{{route('profile.index')}}">
                        <span class="menu-icon">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <span class="menu-title">Profile</span>
                    </a>
                </div>
                @if(auth()->user()->can('user') || auth()->user()->can('role'))
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Ekko::areActiveRoutes(['users.index','users.create', 'users.edit', 'roles.index'], 'show') }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-people-fill"></i>
                        </span>
                        <span class="menu-title">Users</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        @can('user')
                        <div class="menu-item">
                            <a class="menu-link {{ Ekko::areActiveRoutes(['users.index', 'users.edit']) }}" href="{{route('users.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">User List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Ekko::areActiveRoutes(['users.create']) }}" href="{{route('users.create')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Add New</span>
                            </a>
                        </div>
                        @endcan
                        @can('role')
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Ekko::areActiveRoutes(['roles.index'], 'show') }}">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Authorization</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link {{ Ekko::areActiveRoutes(['roles.index']) }}" href="{{route('roles.index')}}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Role</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endcan
                    </div>
                </div>
                @endif
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Ticket Management</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Ekko::areActiveRoutes(['tickets.index', 'tickets.create', 'tickets.show', 'tickets.edit'], 'show') }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-ticket-fill"></i>
                        </span>
                        <span class="menu-title">Tickets</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ Ekko::areActiveRoutes(['tickets.index', 'tickets.show', 'tickets.edit']) }}" href="{{route('tickets.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Ticket List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Ekko::areActiveRoutes(['tickets.create']) }}" href="{{route('tickets.create')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Add New</span>
                            </a>
                        </div>
                    </div>
                </div>
                @if(auth()->user()->can('incident_type', 'vehicle_type'))
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Ekko::areActiveRoutes(['incident-types.index', 'vehicle-types.index'], 'show') }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-list-check"></i>
                        </span>
                        <span class="menu-title">Attributes</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        @can('incident_type')
                        <div class="menu-item">
                            <a class="menu-link {{ Ekko::areActiveRoutes(['incident-types.index']) }}" href="{{route('incident-types.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Incident Types</span>
                            </a>
                        </div>
                        @endcan
                        @can('vehicle_type')
                        <div class="menu-item">
                            <a class="menu-link {{ Ekko::areActiveRoutes(['vehicle-types.index']) }}" href="{{route('vehicle-types.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Vehicle Types</span>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>
                @endif
                <div class="menu-item">
                    <div class="menu-content">
                        <div class="separator mx-1 my-4"></div>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ Ekko::areActiveRoutes(['changelog']) }}" href="{{route('changelog')}}">
                        <span class="menu-icon">
                            <i class="bi bi-code-slash"></i>
                        </span>
                        <span class="menu-title">Changelog</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
        <a href="javascript:void(0);" class="menu-link btn btn-custom btn-primary w-100 justify-content-around" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="Browse">
            <span class="menu-icon">
                <i class="bi bi-globe"></i>
            </span>
            <span class="btn-label">Browse</span>
            <span class="menu-icon">
                <i class="bi bi-box-arrow-up-right"></i>
            </span>
        </a>
    </div>
</div>
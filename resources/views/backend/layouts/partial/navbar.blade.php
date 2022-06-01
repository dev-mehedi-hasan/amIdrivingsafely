<div id="kt_header" style="" class="header align-items-stretch">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
                <i class="bi bi-list" style="font-size: 2em"></i>
            </div>
        </div>
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="javascript:void(0);" class="d-lg-none">
                <img alt="Logo" src="{{asset('public/assets/img/backend/logo/logo-dark.png')}}" class="h-30px" />
            </a>
        </div>
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item">
                            <a class="menu-link {{ Ekko::areActiveRoutes(['dashboard']) }}" href="{{route('dashboard')}}">
                                <span class="menu-icon">
                                    <i class="bi bi-grid-fill"></i>
                                </span>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </div>
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">User Management</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{route('profile.index')}}">
                                        <span class="menu-icon">
                                            <span class="menu-icon">
                                                <i class="bi bi-person-fill"></i>
                                            </span>
                                        </span>
                                        <span class="menu-title">Profile</span>
                                    </a>
                                </div>
                                @if(auth()->user()->can('user') || auth()->user()->can('role'))
                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
                                    <span class="menu-link py-3">
                                        <span class="menu-icon">
                                            <span class="menu-icon">
                                                <i class="bi bi-people-fill"></i>
                                            </span>
                                        </span>
                                        <span class="menu-title">Users</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                        @can('user')
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="{{route('users.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">User List</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="{{route('users.create')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Add New</span>
                                            </a>
                                        </div>
                                        @endcan
                                        @can('role')
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <span class="menu-link py-3">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Authorization</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <a class="menu-link py-3" href="{{route('roles.index')}}">
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
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Ticket Management</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
                                    <span class="menu-link py-3">
                                        <span class="menu-icon">
                                            <span class="menu-icon">
                                                <i class="bi bi-ticket-fill"></i>
                                            </span>
                                        </span>
                                        <span class="menu-title">Tickets</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="{{route('tickets.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Ticket List</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="{{route('tickets.create')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Add New</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @if(auth()->user()->can('incident_type','vehicle_type'))
                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
                                    <span class="menu-link py-3">
                                        <span class="menu-icon">
                                            <i class="bi bi-list-check"></i>
                                        </span>
                                        <span class="menu-title">Attributes</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                        @can('incident_type')
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="{{route('incident-types.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Incident Types</span>
                                            </a>
                                        </div>
                                        @endcan
                                        @can('vehicle_type')
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="{{route('vehicle-types.index')}}">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <div class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <i class="bi bi-grid-fill"></i>
                    </div>
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">
                        <div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10 bg-info">
                            <h3 class="text-white fw-bold mb-3">Attributes</h3>
                        </div>
                        <div class="row g-0">
                            <div class="col-6">
                                <a href="{{route('vehicle-types.index')}}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                    <i class="bi bi-ui-checks-grid text-primary" style="font-size: 2em;"></i>
                                    <span class="fs-5 fw-bold text-gray-800 mb-0">Vehicle Types</span>
                                    <span class="fs-7 text-gray-400 text-center">Ticket attributes</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="{{route('incident-types.index')}}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                    <i class="bi bi-list-check text-info" style="font-size: 2em;"></i>
                                    <span class="fs-5 fw-bold text-gray-800 mb-0">Incident Types</span>
                                    <span class="fs-7 text-gray-400 text-center">Ticket attributes</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <img src="{{asset('public/assets/img/backend/avatar/default.png')}}" alt="user" />
                    </div>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="symbol symbol-50px me-5">
                                    @if(is_null(auth()->user()->photo))
                                    <img alt="user" src="{{asset('public/assets/img/backend/avatar/default.png')}}" />
                                    @else
                                    <img alt="user" src="{{asset('public').'/'.auth()->user()->photo}}" />
                                    @endif
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bolder d-flex align-items-center fs-5">
                                    <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2"></span></div>
                                    <a href="mailto:{{auth()->user()->email}}" class="fw-bold text-muted text-hover-primary fs-7">{{auth()->user()->email}} </a>
                                </div>
                            </div>
                        </div>
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5">
                            <a href="{{route('profile.index')}}" class="menu-link px-5">My Profile</a>
                        </div>
                        <div class="menu-item px-5">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a href="javascript:void(0);" class="menu-link px-5" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
                    <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
                        <i class="bi bi-filter-left" style="font-size: 2em"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
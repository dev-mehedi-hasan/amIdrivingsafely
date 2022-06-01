<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">
            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'dashboard')
            Home
            @endif
            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'profile')
            User Management
            @endif
            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'users')
            User Management
            @endif
            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'roles')
            User Management
            @endif
            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'tickets')
            Ticket Management
            @endif
            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'incident-types')
            Ticket Management
            @endif
            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'vehicle-types')
            Ticket Management
            @endif
            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'changelog')
            Home
            @endif
            <span class="h-20px border-1 border-gray-200 border-start ms-3 mx-2 me-1"></span>
            <span class="text-muted fs-7 fw-bold">
            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'dashboard')
                Dashboard
            @endif

            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'profile')
                Profile
            @endif

            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'users' && Request::segment(3) == 'create')
                Add New
            @elseif(Request::segment(1) == 'backend' && Request::segment(2) == 'users' && Request::segment(4) == 'edit')
                User Edit
            @elseif(Request::segment(1) == 'backend' && Request::segment(2) == 'users')
                User List
            @endif

            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'roles')
                Role   
            @endif

            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'tickets' && Request::segment(3) == 'create')
                Add New
            @elseif(Request::segment(1) == 'backend' && Request::segment(2) == 'tickets' && Request::segment(4) == 'edit')
                Ticket Edit
            @elseif(Request::segment(1) == 'backend' && Request::segment(2) == 'tickets')
                Ticket List
            @endif

            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'incident-types')
                Incident Type   
            @endif
            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'vehicle-types')
                Vehicle Type   
            @endif
            
            @if(Request::segment(1) == 'backend' && Request::segment(2) == 'changelog')
                Changelog
            @endif
            </span>
            </h1>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('backend.layouts.partial.head')
        @include('backend.layouts.partial.script-top')
	</head>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
        <div class="d-flex flex-column flex-root">
            <div class="page d-flex flex-row flex-column-fluid">
                @include('backend.layouts.partial.side-navbar')
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    @include('backend.layouts.partial.navbar')
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        @include('backend.layouts.partial.breadcrumb')
                        <div class="post d-flex flex-column-fluid" id="kt_post">
                            <div id="kt_content_container" class="container-xxl">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    @include('backend.layouts.partial.footer')
                </div>
            </div>
        </div>
        @include('backend.layouts.partial.others.toolbar')
        @include('backend.layouts.partial.others.scrolltop')
        @include('backend.layouts.partial.script-bottom')
    </body>
</html>
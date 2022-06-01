<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        @include('frontend.layouts.partial.head')
        @include('frontend.layouts.partial.script-top')
	</head>
	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                    @yield('content')
				</div>
                @include('frontend.layouts.partial.footer')
			</div>
		</div>
        @include('frontend.layouts.partial.script-bottom')
	</body>
</html>
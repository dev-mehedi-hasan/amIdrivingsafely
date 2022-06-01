<base href="{{ url('/') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="app-url" content="{{ url('/') }}">
<meta name="file-base-url" content="{{ asset('public') }}">
<meta charset="utf-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="{{asset('public/favicon.png')}}">
<title>{{ config('app.name') }} - @yield('title')</title>
@include('backend.layouts.partial.style')
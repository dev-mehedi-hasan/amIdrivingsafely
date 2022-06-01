@extends('frontend.layouts.master')
@section('title', 'Login')
@section('content')
    <a href="{{route('home')}}" class="mb-12">
        <img alt="Logo" src="{{asset('public/assets/img/backend/logo/logo-dark.png')}}" class="h-40px" />
    </a>
    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center mb-10">
                <h1 class="text-dark mb-3">Sign In to Am I Driving Safely?</h1>
                <div class="text-gray-400 fw-bold fs-4">Ticket Management</div>
            </div>
            <div class="fv-row mb-10">
                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                <input type="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" autocomplete="email" required/>
                @error('email')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="fv-row mb-10">
                <div class="d-flex flex-stack mb-2">
                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                    <a href="{{route('password.request')}}" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                </div>
                <input type="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" name="password" autocomplete="current-password" required/>
                @error('password')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                    <span class="indicator-label">Continue</span>
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!-- <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
                <a href="javascript:void(0);" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                <img alt="Logo" src="{{asset('public/assets/img/frontend/social-icon/google.svg')}}" class="h-20px me-3" />Continue with Google</a>
                <a href="javascript:void(0);" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                <img alt="Logo" src="{{asset('public/assets/img/frontend/social-icon/facebook.svg')}}" class="h-20px me-3" />Continue with Facebook</a>
                <a href="javascript:void(0);" class="btn btn-flex flex-center btn-light btn-lg w-100">
                <img alt="Logo" src="{{asset('public/assets/img/frontend/social-icon/twitter.svg')}}" class="h-20px me-3" />Continue with Twitter</a> -->
            </div>
        </form>
    </div>
@endsection
@push('custom-scripts-bottom')
    <script src="{{ asset('public/assets/js/frontend/login/login.js') }}"></script>
@endpush
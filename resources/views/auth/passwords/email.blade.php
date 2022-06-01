@extends('frontend.layouts.master')
@section('title', 'Forget Password')
@section('content')
    <a href="{{route('home')}}" class="mb-12">
        <img alt="Logo" src="{{asset('public/assets/img/backend/logo/logo-dark.png')}}" class="h-40px" />
    </a>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('password.email') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center mb-10">
                <h1 class="text-dark mb-3">Forgot Password ?</h1>
                <div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
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
            <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary fw-bolder me-4">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <a href="{{route('login')}}" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
            </div>
        </form>
    </div>
@endsection
@push('custom-scripts-bottom')
    <script src="{{ asset('public/assets/js/frontend/login/login.js') }}"></script>
@endpush

@extends('frontend.layouts.master')
@section('title', 'Reset Password')
@section('content')
    <a href="{{route('home')}}" class="mb-12">
        <img alt="Logo" src="{{asset('public/assets/img/backend/logo/logo-dark.png')}}" class="h-40px" />
    </a>
    <div class="w-lg-550px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        <form class="form w-100" novalidate="novalidate" id="kt_new_password_form" action="{{ route('password.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="text-center mb-10">
                <h1 class="text-dark mb-3">Reset Password</h1>
                <div class="text-gray-400 fw-bold fs-4">Already have reset your password ?
                <a href="{{route('login')}}" class="link-primary fw-bolder">Sign in here</a></div>
            </div>
            <div class="fv-row mb-10">
                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                <input type="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @else is-valid @enderror" value="{{ $email ?? old('email') }}" name="email" autocomplete="email" required/>
                @error('email')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="mb-10 fv-row" data-kt-password-meter="false">
                <div class="mb-1">
                    <label class="form-label fw-bolder text-dark fs-6">Password</label>
                    <div class="position-relative mb-3">
                        <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" name="password" autocomplete="new-password" required/>
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2 @error('password') d-none @enderror " data-kt-password-meter-control="visibility">
                            <i class="bi bi-eye-slash fs-2"></i>
                            <i class="bi bi-eye fs-2 d-none"></i>
                        </span>
                        @error('password')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="text-muted">Use 6 or more characters with a better combination.</div>
            </div>
            <div class="fv-row mb-10">
                <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                <input id="password-confirm" class="form-control form-control-lg form-control-solid" type="password" name="password_confirmation" autocomplete="new-password" required/>
            </div>
            <div class="fv-row mb-10">
                <div class="form-check form-check-custom form-check-solid form-check-inline">
                    <input id="checkbox" class="form-check-input" type="checkbox" name="toc" value="1" />
                    <label class="form-check-label fw-bold text-gray-700 fs-6" for="checkbox">I Agree &amp;
                    <a href="javascript:void(0)" class="ms-1 link-primary">Terms and conditions</a>.</label>
                </div>
            </div>
            <div class="text-center">
                <button type="button" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </form>
    </div>
@endsection
@push('custom-scripts-bottom')
    <script src="{{ asset('public/assets/js/frontend/reset-password/reset-password.js') }}"></script>
@endpush

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
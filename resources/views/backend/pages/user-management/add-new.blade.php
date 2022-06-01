@extends('backend.layouts.master')
@section('title', 'Add New')
@section('content')
<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    @if ($message = Session::get('user-create-success'))
        <div class="alert alert-success text-center">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('user-create-failed'))
        <div class="alert alert-danger text-center">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
    <form id="kt_modal_add_user_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px" style="max-height: 357px;">
            <div class="fv-row mb-7">
                <label class="d-block fw-bold fs-6 mb-5">Profile Picture</label>
                <div class="image-input image-input-outline" data-kt-image-input="true">
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset('public/assets/img/backend/avatar/default.png')}}');"></div>
                    <label class="btn btn-icon btn-circle btn-color-warning w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change profile picture">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <input type="file" name="photo" accept=".png, .jpg, .jpeg">
                    </label>
                    <span class="btn btn-icon btn-circle btn-color-danger w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel profile picture">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                </div>
                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fw-bold fs-6 mb-2">Name</label>
                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="Full name" value="" required>
                @error('name')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fw-bold fs-6 mb-2">Email</label>
                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="example@domain.com" value="" required>
                @error('email')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="fw-bold fs-6 mb-2">Phone</label>
                <input type="text" name="phone" class="form-control form-control-solid mb-3 mb-lg-0 @error('phone') is-invalid @enderror" placeholder="01*********" value="">
                @error('phone')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="mb-7">
                <label class="required fw-bold fs-6 mb-5">Role</label>
                @foreach ($roles as $role)
                <div class="separator separator-dashed my-5"></div>
                <div class="d-flex fv-row">
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input me-3" name="role" type="radio" value="{{$role->id}}" id="{{$role->name}}" required>
                        <label class="form-check-label" for="{{$role->name}}">
                            <div class="fw-bolder text-gray-800">{{$role->name}}</div>
                        </label>
                    </div>
                </div>
                @endforeach
                <div class="separator separator-dashed my-5"></div>
            </div>
        </div>
        <div class="text-center mt-15">
            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                <span class="indicator-label">Create</span>
                <span class="indicator-progress">Please wait... 
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <div>

        </div>
    </form>
</div>
@endsection
@push('custom-scripts-bottom')

@endpush

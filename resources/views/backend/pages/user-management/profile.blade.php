@extends('backend.layouts.master')
@section('title', 'Profile')
@section('content')
<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    @if ($message = Session::get('user-update-success'))
        <div class="alert alert-success text-center">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('user-update-failed'))
        <div class="alert alert-danger text-center">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
    <form id="kt_modal_add_user_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px" style="max-height: 357px;">
            <div class="fv-row mb-7">
                <label class="d-block fw-bold fs-6 mb-5">Profile Picture</label>
                <div class="image-input image-input-outline" data-kt-image-input="true">
                    @if(!is_null($user->photo))
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset('public/'.$user->photo)}}');"></div>
                    @else
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset('public/assets/img/backend/avatar/default.png')}}');"></div>
                    @endif
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
                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="Full name" value="{{$user->name}}" required>
                @error('name')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fw-bold fs-6 mb-2">Email</label>
                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0 @error('email') is-invalid @enderror" placeholder="example@domain.com" value="{{$user->email}}" required>
                @error('email')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="fw-bold fs-6 mb-2">Phone</label>
                <input type="text" name="phone" class="form-control form-control-solid mb-3 mb-lg-0 @error('phone') is-invalid @enderror" placeholder="01*********" value="{{$user->phone}}">
                @error('phone')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="fw-bold fs-6 mb-2 required">Role</label>
                <input type="text" name="role" class="form-control form-control-solid mb-3 mb-lg-0 @error('role') is-invalid @enderror" placeholder="User Role" value="@if(!empty($user->getRoleNames()))@foreach($user->getRoleNames() as $role){{$role}}@endforeach @endif" readonly required>
                @error('role')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
        </div>
        <div class="text-center mt-15">
            <button type="submit" class="btn btn-warning" data-kt-users-modal-action="submit">
                <span class="indicator-label">Update</span>
                <span class="indicator-progress">Please wait... 
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
    </form>
</div>
@endsection
@push('custom-scripts-bottom')

@endpush

@extends('backend.layouts.master')
@section('title', 'Role')
@section('content')
<div class="row g-5 g-xl-8">
    <div class="col-xl-4">
        <div class="card card-xl-stretch mb-xl-8">
            @if ($message = Session::get('role-delete-success'))
                <div class="alert alert-success text-center">
                    <p class="m-0">{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('role-delete-failed'))
                <div class="alert alert-danger text-center">
                    <p class="m-0">{{ $message }}</p>
                </div>
            @endif
            <div class="card-header border-0">
                <h3 class="card-title fw-bolder text-dark">Roles</h3>
            </div>
            <div class="card-body pt-2 h-300">
                @foreach ($roles as $role)           
                <div class="d-flex align-items-center mb-7">
                    <div class="flex-grow-1 d-flex justify-content-between">
                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$role->name}}</a>
                        <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
							@csrf
                    		@method('DELETE')
							<button type="submit" class="btn btn-icon btn-danger btn-sm">
								<i class="bi bi-trash-fill"></i>
							</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card card-xl-stretch mb-xl-8">
            @if ($message = Session::get('role-create-success'))
                <div class="alert alert-success text-center">
                    <p class="m-0">{{ $message }}</p>
                </div>
            @endif
            <div class="modal-body scroll-y p-15">
                <form id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('roles.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Role and Permissions</h1>
                        <div class="text-muted fw-bold fs-5">Check the permissions during create a specific role</div>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Name</span>
                        </label>
                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Role Name" name="name" autocomplete="Role Name" required autofocus>
                        @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-15 fv-row">
                        <div class="d-flex flex-column">
                            @foreach ($permissions as $permission)                                
                                <div class="d-flex align-items-center py-1">
                                    <label class="form-check form-check-custom form-check-solid me-10 @error('permission') is-invalid @enderror">
                                        <input class="form-check-input h-20px w-20px" type="checkbox" name="permission[]" value="{{$permission->id}}">
                                        <span class="form-check-label fw-bold">{{$permission->name}}</span>
                                    </label>
                                    @error('permission')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">Create</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <div></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-scripts-bottom')

@endpush
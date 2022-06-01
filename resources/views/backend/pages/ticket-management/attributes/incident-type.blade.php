@extends('backend.layouts.master')
@section('title', 'Incident Type')
@section('content')
<div class="row g-5 g-xl-8">
    <div class="col-xl-4">
        <div class="card card-xl-stretch mb-xl-8">
            @if ($message = Session::get('incident-type-delete-success'))
            <div class="alert alert-success text-center">
                <p class="m-0">{{ $message }}</p>
            </div>
            @endif
            @if ($message = Session::get('incident-type-delete-failed'))
                <div class="alert alert-danger text-center">
                    <p class="m-0">{{ $message }}</p>
                </div>
            @endif
            <div class="card-header border-0">
                <h3 class="card-title fw-bolder text-dark">Incident Types</h3>
            </div>
            <div class="card-body pt-2 h-300">
                @foreach ($incident_types as $incident_type)           
                <div class="d-flex align-items-center mb-7">
                    <div class="flex-grow-1 d-flex justify-content-between">
                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$incident_type->name}}</a>
                        <form action="{{ route('incident-types.destroy',$incident_type->id) }}" method="POST">
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
            @if ($message = Session::get('incident-type-create-success'))
            <div class="alert alert-success text-center">
                <p class="m-0">{{ $message }}</p>
            </div>
            @endif
            @if ($message = Session::get('incident-type-create-failed'))
                <div class="alert alert-danger text-center">
                    <p class="m-0">{{ $message }}</p>
                </div>
            @endif
            <div class="modal-body scroll-y p-15">
                <form id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('incident-types.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Incident Types</h1>
                        <div class="text-muted fw-bold fs-5">These types will be the options for incident types
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Name</span>
                        </label>
                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Incident Types" name="name" autocomplete="Incident Types" required autofocus>
                        @error('name')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
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
@extends('backend.layouts.master')
@section('title', 'User List')
@section('content')
<div class="card">
	@if ($message = Session::get('user-delete-success'))
        <div class="alert alert-success text-center">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('user-delete-failed'))
        <div class="alert alert-danger text-center">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
	<div class="card-header border-0 pt-5">
		<h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bolder fs-3 mb-1">All Registered Users</span>
			<span class="text-muted mt-1 fw-bold fs-7"> {{ $users->count() }} @if($users->count()> 1) users @else user @endif</span>
		</h3>
		<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="Click to add new user">
			<a href="{{route('users.create')}}" class="btn btn-sm btn-primary">
				<i class="bi bi-person-plus-fill"></i>
			Add New
		</a>
		</div>
	</div>
	<div class="card-body py-4">
		<table id="DTable" class="table table-row-bordered gy-5 gs-7 rounded">
			<thead>
				<tr class="fw-bolder fs-6 text-gray-800 px-7">
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Role</th>
					<th>Photo</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr class="align-middle">
					<td>@if(is_null($user->name)) No data available @else {{$user->name}} @endif</td>
					<td>@if(is_null($user->email)) No data available @else {{$user->email}} @endif</td>
					<td>@if(is_null($user->phone)) No data available @else {{$user->phone}} @endif</td>
					<td>@if(!empty($user->getRoleNames())) @foreach($user->getRoleNames() as $role){{$role}} @endforeach @else No data available @endif</td>
					<td>
						<div class="symbol symbol-50px">
							@if(is_null($user->photo))
							<img src="{{asset('public/assets/img/backend/avatar/default.png')}}" alt="Profile Picture">
							@else
							<img src="{{asset('public/'.$user->photo)}}" alt="Profile Picture">
							@endif
						</div>
					</td>
					<td>
						<div class="d-flex flex-shrink-0">
							<a href="{{route('users.edit', $user->id)}}" class="btn btn-icon btn-warning btn-sm me-1">
								<i class="bi bi-pencil-square"></i>
							</a>
							<form action="{{ route('users.destroy',$user->id) }}" method="POST">
							@csrf
                    		@method('DELETE')
							<button type="submit" class="btn btn-icon btn-danger btn-sm">
								<i class="bi bi-trash-fill"></i>
							</button>
							</form>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@push('custom-scripts-bottom')
@endpush

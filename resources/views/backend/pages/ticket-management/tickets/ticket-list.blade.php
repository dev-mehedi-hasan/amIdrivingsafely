@extends('backend.layouts.master')
@section('title', 'Ticket List')
@section('content')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div class="card">
	@if ($message = Session::get('ticket-delete-success'))
        <div class="alert alert-success text-center">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('ticket-delete-failed'))
        <div class="alert alert-danger text-center">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
	<div class="card-header border-0 mt-5">
		<div class="row w-100">
			<div class="col-lg-3">
				<div class="">
					<h3 class="card-title">
						<span class="card-label fw-bolder fs-3 mb-1">All the tickets</span>
						<span class="text-muted mt-1 fw-bold fs-7"> {{ $tickets->count() }} @if($tickets->count()> 1) tickets @else ticket @endif</span>
					</h3>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="">
					<form class="form" action="" method="GET">
						<div class="form-group row w-100 align-items-center">
							<div class="col-lg-6">
								<div class="input-group">
									<input type="text" class="form-control" readonly="readonly" name="daterangepicker" placeholder="Select date range" value="@if(request()->daterangepicker != null){{ request()->daterangepicker }}@endif">
									<div class="input-group-append">
										<span class="">
											<i class="form-control la la-calendar-check-o rounded-0 rounded-end"></i>
										</span>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<select class="form-control selectpicker" name="status" required>
									<option value="" selected disabled>Select Status</option>
									<option value="all" @if(request()->status != null && request()->status == 'all') selected @endif>All</option>
									<option value="pending" @if(request()->status != null && request()->status == 'pending') selected @endif>Pending</option>
									<option value="on-progress" @if(request()->status != null && request()->status == 'on-progress') selected @endif>On Progress</option>
									<option value="resolved" @if(request()->status != null && request()->status == 'resolved') selected @endif>Resolved</option>
									<option value="canceled" @if(request()->status != null && request()->status == 'canceled') selected @endif>Cenceled</option>
								</select>
							</div>
							<div class="col-lg-2">
								<button type="submit" class="btn btn-primary btn-sm">
								Go
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="row">
					<div class="col-lg-6">
						<div class="card-toolbar d-flex justify-content-end" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="Click to export tickets to a sheet">
							@php
							if(request()->daterangepicker != null){
								$daterangepicker = explode(' - ',request()->daterangepicker);
								$start_date_y_m_d = explode('/',$daterangepicker[0]);
								$start_date_y_m_d_time = $start_date_y_m_d[2].'-'.$start_date_y_m_d[0].'-'.$start_date_y_m_d[1] .' 00:00:00';
								$end_date_y_m_d = explode('/',$daterangepicker[1]);
								$end_date_y_m_d_time = $end_date_y_m_d[2].'-'.$end_date_y_m_d[0].'-'.$end_date_y_m_d[1] .' 23:59:59';
							}
							@endphp
							@if(request()->daterangepicker != null)
							<a href="{{route('tickets.export',['start_date' => $start_date_y_m_d_time, 'end_date' => $end_date_y_m_d_time, 'status' => request()->status ?? 'null'])}}" class="btn btn-sm btn-light-primary">
								<i class="bi bi-upload"></i>
							Export
							</a>
							@else
							<a href="{{route('tickets.export',['start_date' => 'null', 'end_date' => 'null', 'status' => request()->status ?? 'null'])}}" class="btn btn-sm btn-light-primary">
								<i class="bi bi-upload"></i>
							Export
							</a>
							@endif
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card-toolbar d-flex justify-content-end" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="Create New Ticket">
							<a href="{{route('tickets.create')}}" class="btn btn-sm btn-primary">
								<i class="bi bi-person-plus-fill"></i>
							New
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body py-4">
		<table id="DTable" class="table table-row-bordered gy-5 gs-7 rounded">
			<thead>
				<tr class="fw-bolder fs-6 text-gray-800 px-7">
					<th>Ticket ID</th>
					<th width="20%">Time</th>
					<th>Agent Name</th>
					<th>Phone Number</th>
					<th>Vehicle Number</th>
					<th>Incident Type</th>
					<th>Type of Vehicle</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tickets as $ticket)
				<tr>
					<td>{{$ticket->id}}</td>
					<td>{{ Carbon\Carbon::parse($ticket->updated_at)->format('d-M-Y g:i A') }}</td>
					<td>@if(!is_null($ticket->external_created_by)) {{$ticket->external_created_by}} @else not available @endif</td>
					<td>@if(!is_null($ticket->external_phone_number)) {{$ticket->external_phone_number}} @else not available @endif</td>
					<td>{{$ticket->vehicle_number}}</td>
					<td>{{$ticket->incident_type}}</td>
					<td>{{$ticket->type_of_vehicle}}</td>
					<td>
						<span class="label @if(!is_null($ticket->status) && $ticket->status == 'pending') label-light-warning @elseif(!is_null($ticket->status) && $ticket->status == 'on-progress') label-light-primary @elseif(!is_null($ticket->status) && $ticket->status == 'resolved') label-light-success @elseif(!is_null($ticket->status) && $ticket->status == 'canceled') label-light-danger @endif label-inline">{{$ticket->status}}</span>
					</td>
					<td>
						<div class="d-flex flex-shrink-0">
							<a href="{{route('tickets.show', $ticket->id)}}" class="btn btn-icon btn-primary btn-sm me-1">
                                <i class="bi bi-eye"></i>
							</a>
							<a href="{{route('tickets.edit', $ticket->id)}}" class="btn btn-icon btn-warning btn-sm me-1">
								<i class="bi bi-pencil-square"></i>
							</a>
							@if(auth()->user()->can('user') && auth()->user()->can('role') && auth()->user()->can('incident_type') && auth()->user()->can('vehicle_type'))
							<form action="{{ route('tickets.destroy',$ticket->id) }}" method="POST">
							@csrf
                    		@method('DELETE')
							<button type="submit" class="btn btn-icon btn-danger btn-sm">
								<i class="bi bi-trash-fill"></i>
							</button>
							</form>
							@endif
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
<script>
	$(document).ready(function() {
		$('.selectpicker').select2();
    });
	$(function() {
	$('input[name="daterangepicker"]').daterangepicker({
		opens: 'left'
	}, function(start, end, label) {
		console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
	});
	});
</script>
@endpush

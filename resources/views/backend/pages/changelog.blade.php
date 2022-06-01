@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="row gy-5 g-xl-8">
    <div class="col-xl-6 mx-auto">
        <div class="card card-xl-stretch">
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder mb-2 text-dark">Activities</span>
                    <span class="text-muted fw-bold fs-7">All Changelog</span>
                </h3>
            </div>
            <div class="card-body pt-5">
                @if($tickets->count()>0)
                <div class="timeline-label overflow-auto">
                    @foreach($tickets as $ticket)
                    <div class="timeline-item">
                        <div class="timeline-label">
                            <span class="fw-bolder text-gray-800 fs-7">{{ Carbon\Carbon::parse($ticket->updated_at)->format('d-M-Y') }}</span>
                            <br>
                            <span class="fw-lighter fs-8">{{ Carbon\Carbon::parse($ticket->updated_at)->format('g:i A') }}</span>
                        </div>
                        <div class="timeline-badge">
                            <i class="fa fa-genderless @if($ticket->updated_at > $ticket->created_at) text-warning @else text-primary @endif fs-1"></i>
                        </div>
                        <div class="fw-mormal timeline-content text-muted ps-3">
                            <a class="@if($ticket->updated_at > $ticket->created_at) text-warning @else text-primary @endif" href="{{route('tickets.show', $ticket->id)}}">
                                @if($ticket->updated_at > $ticket->created_at) {{$ticket->UpdatedBy->name}} has updated a ticket about {{$ticket->category}} @else if($ticket->CreatedBy != null) {{$ticket->CreatedBy->name}} @else {{$ticket->external_created_by}} @endif has created a ticket about {{$ticket->category}} @endif
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                No logs available
                @endif
            </div>
            <div class="card-footer align-items-center text-center border-0 mb-4">
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-scripts-bottom')

@endpush
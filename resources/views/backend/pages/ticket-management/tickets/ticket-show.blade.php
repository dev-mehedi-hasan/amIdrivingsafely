@extends('backend.layouts.master')
@section('title', 'Ticket Show')
@section('content')
<div class="card card-custom overflow-hidden">
    @if ($message = Session::get('ticket-update-success'))
        <div class="alert alert-success text-center">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('ticket-update-failed'))
        <div class="alert alert-danger text-center">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
    <div class="card-body p-0">
        <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between">
                        <label class="m-3 @if(!is_null($ticket->status) && $ticket->status == 'pending')text-warning @elseif(!is_null($ticket->status) && $ticket->status == 'on-progress') text-primary @elseif(!is_null($ticket->status) && $ticket->status == 'resolved') text-success @elseif(!is_null($ticket->status) && $ticket->status == 'canceled') text-danger @endif">Status</label>
                        <select class="form-control selectpicker" name="status" required>
                            <option value="pending" @if(!is_null($ticket->status) && $ticket->status == 'pending') selected @endif>Pending</option>
                            <option value="on-progress"@if(!is_null($ticket->status) && $ticket->status == 'on-progress') selected @endif>On Progress</option>
                            <option value="resolved" @if(!is_null($ticket->status) && $ticket->status == 'resolved') selected @endif>Resolved</option>
                            <option value="canceled" @if(!is_null($ticket->status) && $ticket->status == 'canceled') selected @endif>Cenceled</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                        <h1 class="font-weight-boldest">Ticket Number: @if (is_null($ticket->id)) No data available @else #{{$ticket->id}} @endif </h1>
                        <div class="d-flex flex-column align-items-md-end px-0">
                            <span class="d-flex flex-column align-items-md-end opacity-70">
                                @if (!is_null($ticket->external_created_by)) <span><strong>Agent Name:</strong> @if (is_null($ticket->external_created_by)) No data available @else {{$ticket->external_created_by}} @endif </span> @endif
                                @if (!is_null($ticket->external_phone_number))<span><strong>Phone Number:</strong> @if (is_null($ticket->external_phone_number)) No data available @else {{$ticket->external_phone_number}} @endif </span> @endif
                                @if (!is_null($ticket->created_at))<span><strong>Created at:</strong> @if (is_null($ticket->created_at)) No data available @else {{ Carbon\Carbon::parse($ticket->created_at)->format('d-M-Y g:i A') }} @endif</span> @endif
                                @if (!is_null($ticket->created_by))<span><strong>Created by:</strong> @if (is_null($ticket->created_by)) No data available @else {{$ticket->CreatedBy->name}} @endif </span> @endif
                                @if (!is_null($ticket->updated_at) && !is_null($ticket->updated_by))<span><strong>Updated at:</strong> @if (is_null($ticket->updated_at) && is_null($ticket->updated_by)) No data available @else {{ Carbon\Carbon::parse($ticket->updated_at)->format('d-M-Y g:i A') }} @endif </span> @endif
                                @if (!is_null($ticket->updated_by))<span><strong>Updated by:</strong> @if (is_null($ticket->updated_by)) No data available @else {{$ticket->UpdatedBy->name}} @endif </span> @endif
                            </span>
                        </div>
                    </div>
                    <div class="border-bottom w-100"></div>
                    <div class="d-flex justify-content-between pt-6">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2"><strong>Name:</strong> @if (is_null($ticket->name)) No data available @else {{$ticket->name}} @endif</span>
                            <span class="font-weight-bolder mb-2"><strong>Vehicle Number:</strong>  @if (is_null($ticket->vehicle_number)) No data available @else {{$ticket->vehicle_number}} @endif</span>
                            <span class="font-weight-bolder mb-2"><strong>Type of Vehicle:</strong>  @if (is_null($ticket->type_of_vehicle)) No data available @else {{$ticket->type_of_vehicle}} @endif</span>
                        </div>
                        <div class="d-flex flex-column flex-root align-items-md-end">
                            <span class="font-weight-bolder mb-2"><strong>Incident Type:</strong> @if (is_null($ticket->incident_type)) No data available @else {{$ticket->incident_type}} @endif</span>
                            <span class="nt-weight-bolder mb-2"><strong>Location of Incident:</strong> @if (is_null($ticket->location_of_incident)) No data available @else {{$ticket->location_of_incident}} @endif</span>
                            <span class="font-weight-bolder mb-2"><strong>Sticker:</strong> @if (is_null($ticket->sticker)) No data available @else {{$ticket->sticker}} @endif</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between pt-6">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2"><strong>Comment/Recommendation</strong></span>
                                <span class="opacity-70">@if (is_null($ticket->comment_recommendation)) No data available @else {{$ticket->comment_recommendation}} @endif</span>
                            </div>
                            <div class="d-flex flex-column flex-root align-items-md-end">
                                <span class="font-weight-bolder mb-2"><strong>Remarks</strong></span>
                                <div class="input-group ql-editor p-0">
                                    <textarea class="form-control ql-align-right" name="remarks" >@if (is_null($ticket->remarks)) No data available @else{{$ticket->remarks}} @endif</textarea>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            @if($ticketattachment != null)
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <ul class="nav nav-tabs" id="TicketAttachment" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="photo" data-bs-toggle="tab" data-bs-target="#photo-pane" type="button" role="tab" aria-controls="photo-pane" aria-selected="true">Photo</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="video" data-bs-toggle="tab" data-bs-target="#video-pane" type="button" role="tab" aria-controls="video-pane" aria-selected="false">Video</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="TicketAttachmentContent">
                        <div class="tab-pane fade show active" id="photo-pane" role="tabpanel" aria-labelledby="photo" tabindex="0">
                            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-12">
                                    <div class="row">
                                        @if($ticketattachment != null && $ticketattachment_photo != null && count($ticketattachment_photo) > 0)
                                            @foreach($ticketattachment_photo as $photo)
                                            <div class="col-lg-4">
                                                <div class="card shadow-sm">
                                                <img
                                                    src="{{asset('public/'.$photo->photo)}}"
                                                    class="img-fluid"
                                                    alt="Ticket Photo"
                                                />
                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                        <p> No photos available </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-pane" role="tabpanel" aria-labelledby="video" tabindex="0">
                            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-12">
                                    <div class="row">
                                        @if($ticketattachment != null && $ticketattachment_video != null && count($ticketattachment_video) > 0)
                                            @foreach($ticketattachment_video as $video)
                                            <div class="col-lg-4">
                                                <div class="card">
                                                <video class="w-100 max-h-250px" controls>
                                                    <source src="{{asset('public/'.$video->video)}}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                        <p> No videos available </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('custom-scripts-bottom')
<script src="{{ asset('public/assets/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.selectpicker').select2();
    });
</script>
@endpush

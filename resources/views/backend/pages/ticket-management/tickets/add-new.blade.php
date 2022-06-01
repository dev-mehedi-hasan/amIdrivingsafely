@extends('backend.layouts.master')
@section('title', 'Add New')
@section('content')
<div class="card">
    @if ($message = Session::get('ticket-create-success'))
        <div class="alert alert-success text-center">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('ticket-create-failed'))
        <div class="alert alert-danger text-center">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
    <form class="form" action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-4">
                    <label class="required">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                </div>
                <div class="col-lg-4">
                    <label class="required">Location of Incident</label>
                    <textarea class="form-control" name="location_of_incident" required></textarea>
                </div>
                <div class="col-lg-4">
                    <label class="required">Vehicle Number</label>
                    <input type="text" class="form-control" name="vehicle_number" placeholder="Vehicle Number" required>
                </div>
            </div>
       
            <div class="separator separator-dashed my-10"></div>
        
            <div class="form-group row">
                <div class="col-lg-4">
                    <label class="required">Incident Type</label>
                    <select class="form-control selectpicker" name="incident_type" required>
                        <option value="" selected disabled>Select Type</option>
                        @foreach($incident_types as $incident_type)
                        <option value="{{$incident_type->name}}">{{$incident_type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label>Comment/Recommendation</label>
                    <textarea class="form-control" name="comment_recommendation"></textarea>
                </div>
                <div class="col-lg-4">
                    <label class="required">Sticker</label>
                    <div class="radio-inline">
                        <label class="radio radio-solid">
                        <input type="radio" name="sticker" checked="checked" value="Yes">
                        <span></span>Yes</label>
                        <label class="radio radio-solid">
                        <input type="radio" name="sticker" value="No">
                        <span></span>No</label>
                    </div>
                </div>
            </div>
       
            <div class="separator separator-dashed my-10"></div>
       
            <div class="form-group row">
                <div class="col-lg-4">
                    <label class="required">Type of Vehicle</label>
                    <select class="form-control selectpicker" name="type_of_vehicle" required>
                        <option value="" selected disabled>Select Vehicle</option>
                        @foreach($vehicle_types as $vehicle_type)
                        <option value="{{$vehicle_type->name}}">{{$vehicle_type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <label for="attachment" class="">Attachment</label>
                        </div>
                    </div>
                    <div class="increment">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <input class="form-control @if($errors->get('attachments.*')) is-invalid @endif" type="file" id="attachments" name="attachments[]">
                                @if ($errors->get('attachments.*'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->get('attachments.*') as $error)
                                                @foreach ($error as $message)
                                                    <li>{{ $message }}</li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="col-2">
                                <button class="btn btn-icon btn-success btn-sm" id="AddNew" type="button"><i class="bi bi-plus p-0"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="clone d-none">                        
                        <div class="row align-items-center hdtuto control-group lst my-3">
                            <div class="col-10">
                                <input class="form-control" type="file" name="attachments[]">
                            </div>
                            <div class="col-2">
                                <button class="btn btn-icon btn-danger btn-sm" type="button"><i class="bi bi-trash p-0"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
         <div class="row">
          <div class="col-lg-5"></div>
          <div class="col-lg-7">
           <button type="submit" class="btn btn-primary mr-2">Submit</button>
           <button type="reset" class="btn btn-secondary">Cancel</button>
          </div>
         </div>
        </div>
    </form>
</div>
@endsection
@push('custom-scripts-bottom')
<script src="{{ asset('public/assets/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.selectpicker').select2();
    });
    $("#AddNew").click(function(){ 
        var field = $(".clone").html();
        $(".increment").after(field);
    });
    $("body").on("click",".btn-danger",function(){ 
        $(this).parent().parent().remove();
    });
</script>
@endpush
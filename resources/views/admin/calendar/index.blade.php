@extends('layouts.master')


@section('content')

@include('widgets.breadcrumb', [
    'titolo' => 'Calendario',
    'posizione' => 'Calendario',
    'pulsante' => ' '
    
    ] )
@push('style')
      <!-- Calendar CSS -->
    <link href="{{url('/')}}/assets/plugins/calendar/dist/fullcalendar.css" rel="stylesheet" />
@endpush

   <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Drag and Drop Your Event</h4>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div id="calendar-events" class="m-t-20">
                                            <div class="calendar-events" data-class="bg-info"><i class="fa fa-circle text-info"></i> My Event One</div>
                                            <div class="calendar-events" data-class="bg-success"><i class="fa fa-circle text-success"></i> My Event Two</div>
                                            <div class="calendar-events" data-class="bg-danger"><i class="fa fa-circle text-danger"></i> My Event Three</div>
                                            <div class="calendar-events" data-class="bg-warning"><i class="fa fa-circle text-warning"></i> My Event Four</div>
                                        </div>
                                        <!-- checkbox -->
                                        <div class="checkbox">
                                            <input id="drop-remove" type="checkbox">
                                            <label for="drop-remove">
                                                Remove after drop
                                            </label>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#add-new-event" class="btn btn-lg m-t-40 btn-danger btn-block waves-effect waves-light">
                                            <i class="ti-plus"></i> Add New Event
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection



@push('script')
    
  

      <!-- Calendar JavaScript -->
    <script src="{{url('/')}}/assets/plugins/calendar/jquery-ui.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/moment/moment.js"></script>
    <script src='{{url('/')}}/assets/plugins/calendar/dist/fullcalendar.min.js'></script>
    <script src="{{url('/')}}/assets/plugins/calendar/dist/cal-init.js"></script>

@endpush

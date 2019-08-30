@extends('layouts.master')


@section('content')

@include('widgets.breadcrumb', [
    'titolo' => 'Impostazioni Generali Programma',
    'posizione' => 'Impostazioni',
    'pulsante' => ' '
    
    ] )
@push('style')
      <!-- Calendar CSS -->
    <link href="{{url('/')}}/assets/plugins/calendar/dist/fullcalendar.css" rel="stylesheet" />
@endpush

<div class="row">
    {{-- <div class="col-lg-12">
        <div class="card">
            <div class="row">
                <div class="col-xlg-2 col-lg-4 col-md-4">
                    <div class="card-body inbox-panel">
                        <ul class="list-group list-group-full">
                            <li class="list-group-item active"> 
                                <a href="javascript:void(0)"><i class="mdi mdi-gmail"></i> Pagamenti </a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:void(0)"> <i class="mdi mdi-star"></i> Configura Cards </a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:void(0)"> <i class="mdi mdi-send"></i> Configura Email </a>
                            </li>
                            
                        </ul>
                        
                    </div>
                </div>
                <div class="col-xlg-10 col-lg-8 col-md-8">
                    <div class="card-body">
                        
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Impostazione gestionale</h4>
                    @include('admin.settings.form')
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

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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Draggable Panel Portlets</h4>
                             
                            </div>
                        </div>
                    </div>
                </div>

@endsection



@push('script')

@endpush

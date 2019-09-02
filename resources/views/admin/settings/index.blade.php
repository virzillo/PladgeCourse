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

          <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body bg-info">
                    <h4 class="text-white card-title">Aggiungi tipo pagamento</h4>
                    <h6 class="card-subtitle text-white m-b-0 op-5"></h6> </div>
                <div class="card-body">
                    <div class="message-box contact-box">
                        <h2 class="add-ct-btn">
                            <button type="button" data-toggle="modal" data-target="#addTipo" class="btn   btn-danger  waves-effect waves-dark">nuovo</button>
                            {{-- <button type="button" data-toggle="modal" data-target="#addCard"  class="btn  btn-success waves-effect waves-dark">ricarica</button> --}}
                            <button type="button" data-toggle="modal" data-target="#vediTab"  class="btn  btn-primary waves-effect waves-dark">show</button>
                        </h2>
                        <div class="message-widget contact-widget">
                          @foreach ($tipopagamento as $item)
                               <!-- Message -->
                            <a href="#">
                                <div class="mail-contnet">
                                    <h5>{{$item->valore}}</h5>
                                </div>
                            </a>
                          @endforeach
                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>


 <div class="modal fade" id="addTipo" tabindex="-1" role="dialog" aria-labelledby="addCardLabel1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Aggiungi modalità pagamento</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ route('xsettings.store') }}" method="POST">
                                @csrf
                           
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">nome:</label>
                                <input type="text" class="form-control" id="valore" name="valore">
                            </div>
                           
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Inserisci</button>
                    </div>
                        </form>

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

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
@include('widgets.errors')
  <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body bg-info">
                    <h4 class="text-white card-title">Eipass Corsi on-line</h4>
                    <h6 class="card-subtitle text-white m-b-0 op-5"></h6> </div>
                <div class="card-body">
                    <div class="message-box contact-box">
                        <h2 class="add-ct-btn">
                            <button type="button"  data-toggle="modal" data-target="#addEipassOnline"  class="btn  btn-success waves-effect waves-dark">add</button>
                            <button type="button" data-toggle="modal" data-target="#editEipassOnline" class="btn   btn-danger  waves-effect waves-dark">edit</button>
                            <button type="button" data-toggle="modal" data-target="#vediTab"  class="btn  btn-primary waves-effect waves-dark">show</button>
                        </h2>
                        <div class="message-widget contact-widget">
                            <div class="mail-contnet" style="display:flex;">
                                <div class="table-responsive">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Totali</th>
                                                <th>Attivate</th>
                                                <th>Rimanenti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                    <td>{{$eipass->quantita}}</td>
                                                    <td>{{$eipass->costo}}</td>
                                                    <td><span class="label label-danger">0</span> </td>
                                                
                                             </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body bg-secondary">
                    <h4 class="text-white card-title">UPGRADE</h4>
                    <h6 class="card-subtitle text-white m-b-0 op-5"></h6> </div>
                <div class="card-body">
                    <div class="message-box contact-box">
                        <h2 class="add-ct-btn">
                            <button type="button" data-toggle="modal" data-target="#add"  class="btn  btn-success waves-effect waves-dark">add</button>
                            <button type="button" data-toggle="modal" data-target="#vediTab"  class="btn  btn-primary waves-effect waves-dark">show</button>
                        </h2>
                        <div class="message-widget contact-widget">
                            <div class="mail-contnet" style="display:flex;">
                                <div class="table-responsive">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Totali</th>
                                                <th>Attivate</th>
                                                <th>Rimanenti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$tot}}</td>
                                                <td>{{$concodice}}</td>
                                                <td><span class="label label-danger">0</span> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body bg-danger">
                    <h4 class="text-white card-title">P.E.K.I.T.</h4>
                    <h6 class="card-subtitle text-white m-b-0 op-5"></h6> </div>
                <div class="card-body">
                    <div class="message-box contact-box">
                        <h2 class="add-ct-btn">
                            <button type="button" data-toggle="modal" data-target="#add"  class="btn  btn-success waves-effect waves-dark">add</button>
                            <button type="button" data-toggle="modal" data-target="#vediTab"  class="btn  btn-primary waves-effect waves-dark">show</button>
                        </h2>
                        <div class="message-widget contact-widget">
                            <div class="mail-contnet" style="display:flex;">
                                <div class="table-responsive">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Totali</th>
                                                <th>Attivate</th>
                                                <th>Rimanenti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$tot}}</td>
                                                <td>{{$concodice}}</td>
                                                <td><span class="label label-danger">0</span> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body bg-info">
                    <h4 class="text-white card-title">Inglese</h4>
                    <h6 class="card-subtitle text-white m-b-0 op-5"></h6> </div>
                <div class="card-body">
                    <div class="message-box contact-box">
                        <h2 class="add-ct-btn">
                            <button type="button" data-toggle="modal" data-target="#add"  class="btn  btn-success waves-effect waves-dark">add</button>
                            <button type="button" data-toggle="modal" data-target="#vediTab"  class="btn  btn-primary waves-effect waves-dark">show</button>
                        </h2>
                        <div class="message-widget contact-widget">
                            <div class="mail-contnet" style="display:flex;">
                                <div class="table-responsive">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Totali</th>
                                                <th>Attivate</th>
                                                <th>Rimanenti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$tot}}</td>
                                                <td>{{$concodice}}</td>
                                                <td><span class="label label-danger">0</span> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body bg-secondary">
                    <h4 class="text-white card-title">Ei-Card EIPASS Unica</h4>
                    <h6 class="card-subtitle text-white m-b-0 op-5"></h6> </div>
                <div class="card-body">
                    <div class="message-box contact-box">
                        {{-- <h2 class="add-ct-btn">
                            <button type="button" data-toggle="modal" data-target="#addTipoCard"  class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button></h2> --}}
                        <div class="message-widget contact-widget">  
                                <label for="card-codice" class="control-label">Inserisci codice EICARD:</label>
                            
                                    <form action="{{ route('eicardcode.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="codice" name="codice" required> 
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                 <button type="submit" class="btn btn-info">inserisci</button>
                                                 </div>
                                            </div>
                                        </div>
                                    </form>
                                <div class="mail-contnet" style="display:flex;">
                                   <div class="table-responsive">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Totali</th>
                                                <th>Con codice</th>
                                                <th>Rimanenti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$tot}}</td>
                                                <td>{{$concodice}}</td>
                                                <td><span class="label label-danger">0</span> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
</div>

        <div class="row">
            @isset($logcards)
                 <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Log operazioni CARD</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>card</th>
                                                <th>data</th>
                                                <th>Operatore</th>
                                                <th>qta</th>
                                                <th>spesa</th>
                                                <th>totale</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($logcards as $item)
                                            <tr>
                                                <td>{{$item->card->nome}}</td>
                                                <td>{{$item->created_at->format('d/m/y')}}</td>
                                                <td><span class="label label-danger">{{$item->user->name}}</span> </td>
                                                <td>{{$item->quantita}}</td>
                                                <td>{{$item->costo}}</td>
                                                <td>{{($item->costo*$item->quantita)}} €</td>

                                            </tr>
                                            @endforeach
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            @endisset
               
        </div>



        <div class="modal fade" id="addEipassOnline" tabindex="-1" role="dialog" aria-labelledby="addCardLabel1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Aggiungi quantità</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ route('storage.store') }}" method="POST">
                                @csrf
                             <input type="hidden" class="form-control" id="nome" name="nome" value="Eipass Corsi on-line">
                            
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Seleziona quantità:</label>
                                <input type="number" class="form-control" id="quantita" name="quantita">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Costo per unità:</label>
                                <input type="number" class="form-control" id="costo" name="costo">
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

         <div class="modal fade" id="editEipassOnline" tabindex="-1" role="dialog" aria-labelledby="addCardLabel1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Aggiungi quantità</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ route('storage.store') }}" method="POST">
                                @csrf
                             <input type="hidden" class="form-control" id="nome" name="nome" value="Eipass Corsi on-line">
                            
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Seleziona quantità:</label>
                                <input type="number" class="form-control" id="quantita" name="quantita" value="{{$eipass->quantita}}">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Costo per unità:</label>
                                <input type="number" class="form-control" id="costo" name="costo" value="{{$eipass->costo}}">
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

        <div class="modal fade" id="addTipoCard" tabindex="-1" role="dialog" aria-labelledby="addCardLabel2" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Aggiungi Tipo Card</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ route('card.store') }}" method="POST">
                                @csrf
                            <div class="form-group">
                                <label for="name" class="control-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome">
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

        <div class="modal fade" id="vediTab" tabindex="-1" role="dialog" aria-labelledby="addvediTababel2" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document"  style="max-width: 800px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Elenco operazioni su CARD</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                            <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>card</th>
                                                <th>data</th>
                                                <th>Operatore</th>
                                                <th>qta</th>
                                                <th>spesa</th>
                                                <th>totale</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($logcards as $item)
                                            <tr>
                                                <td>{{$item->card->nome}}</td>
                                                <td>{{$item->created_at->format('d/m/y')}}</td>
                                                <td><span class="label label-danger">{{$item->user->name}}</span> </td>
                                                <td>{{$item->quantita}}</td>
                                                <td>{{$item->costo}}</td>
                                                <td>{{($item->costo*$item->quantita)}} €</td>

                                            </tr>
                                            @endforeach
                                          
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addCardLabel1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Aggiungi quantità</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ route('storage.store') }}" method="POST">
                                @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Seleziona quantità:</label>
                                <input type="number" class="form-control" id="quantita" name="quantita">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Costo per unità:</label>
                                <input type="number" class="form-control" id="costo" name="costo">
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
    
  <script>
    
  </script>

      <!-- Calendar JavaScript -->
    <script src="{{url('/')}}/assets/plugins/calendar/jquery-ui.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/moment/moment.js"></script>
    <script src='{{url('/')}}/assets/plugins/calendar/dist/fullcalendar.min.js'></script>
    <script src="{{url('/')}}/assets/plugins/calendar/dist/cal-init.js"></script>

@endpush

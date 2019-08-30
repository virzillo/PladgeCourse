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
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body bg-info">
                    <h4 class="text-white card-title">Aggiungi CARD</h4>
                    <h6 class="card-subtitle text-white m-b-0 op-5">inserisci il numro di card acquistate</h6> </div>
                <div class="card-body">
                    <div class="message-box contact-box">
                        <h2 class="add-ct-btn"><button type="button" data-toggle="modal" data-target="#addCard" data-whatever="@mdo" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button></h2>
                        <div class="message-widget contact-widget">
                          @foreach ($cards as $card)
                               <!-- Message -->
                            <a href="#">
                                <div class="mail-contnet">
                                    <h5>{{$card->nome}}</h5> <span class="mail-desc">{{$card->quantita}}</span>
                                </div>
                            </a>
                          @endforeach
                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body bg-info">
                    <h4 class="text-white card-title">EICARD</h4>
                    <h6 class="card-subtitle text-white m-b-0 op-5">Inserisci seriali EICARD</h6> </div>
                <div class="card-body">
                    <div class="message-box contact-box">
                        <h2 class="add-ct-btn"><button type="button" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button></h2>
                        <div class="message-widget contact-widget">
                           
                            <!-- Message -->
                            <a href="#">
                               
                                <div class="mail-contnet">
                                    <h5>50</h5> <span class="mail-desc">non assegnati</span></div>
                            </a>
                           
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

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($logcards as $item)
                                            <tr>
                                                <td>{{$item->card->nome}}</td>
                                                <td>{{$item->created_at->format('d/m/y')}}</td>
                                                <td><span class="label label-danger">{{$item->user->name}}</span> </td>
                                                <td>{{$item->quantita}}</td>
                                                <td>{{$item->costo}} €</td>

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



    <div class="modal fade" id="addCard" tabindex="-1" role="dialog" aria-labelledby="addCardLabel1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Aggiungi Card</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ route('storage.add') }}" method="POST">
                                @csrf
                            <div class="form-group">
                                <label for="card-name" class="control-label">Seleziona Card:</label>
                                <select name="nome" class="form-control" id="card">
                                     <option value="" selected data-default>scegli card</option>
                                    @foreach ($cards as $card)
                                        <option  value="{{$card->nome}}">{{$card->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
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
    
  

      <!-- Calendar JavaScript -->
    <script src="{{url('/')}}/assets/plugins/calendar/jquery-ui.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/moment/moment.js"></script>
    <script src='{{url('/')}}/assets/plugins/calendar/dist/fullcalendar.min.js'></script>
    <script src="{{url('/')}}/assets/plugins/calendar/dist/cal-init.js"></script>

@endpush

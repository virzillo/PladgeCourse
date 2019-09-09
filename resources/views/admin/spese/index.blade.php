@extends('layouts.master')


@section('content')

@include('widgets.breadcrumb', [
'titolo' => 'Prima nota',
'posizione' => 'Spese',
'pulsante' => ' '

] )
@push('style')

<link href="{{url('/')}}/assets/plugins/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
@endpush
@include('widgets.errors')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body bg-info">
                <h4 class="text-white card-title">Registra Entrate</h4>
                <h6 class="card-subtitle text-white m-b-0 op-5"></h6>
            </div>
            <div class="card-body">
                <div class="message-box contact-box">
                    <h2 class="add-ct-btn">
                        <button type="button" data-toggle="modal" data-target="#addEntrata"
                            class="btn   btn-danger  waves-effect waves-dark">nuova</button></h2>
                    {{-- <button type="button" data-toggle="modal" data-target="#addCard"  class="btn  btn-success waves-effect waves-dark">ricarica</button></h2> --}}
                    <div class="message-widget contact-widget">

                        <label for="card-codice" class="control-label">compila i campi:</label>
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
                                            <td></td>
                                            <td></td>
                                            <td><span class="label label-success">{{$totIn}}</span> </td>
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
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body bg-secondary">
                <h4 class="text-white card-title">AGGIUNGI Uscita</h4>
                <h6 class="card-subtitle text-white m-b-0 op-5"></h6>
            </div>
            <div class="card-body">
                <div class="message-box contact-box">
                    <h2 class="add-ct-btn">
                        <button type="button" data-toggle="modal" data-target="#addUscita"
                            class="btn   btn-danger  waves-effect waves-dark">nuova</button></h2>
                     <div class="message-widget contact-widget">

                        <label for="card-codice" class="control-label">compila i campi:</label>
                        <div class="mail-contnet" style="display:flex;">
                            <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>Totali</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="label label-danger">{{$totOut}}</span> </td>
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
    {{-- @isset($logcards) --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Log operazioni CARD</h4>
                <h6 class="card-subtitle"></h6>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>nome</th>
                                <th>descrizione</th>
                                <th>data</th>
                                <th>cifra</th>
                                <th>stato</th>
                                <th>tipo</th>
                                <th>Operatore</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $item)
                            <tr>
                             <td>{{$item->nome}}</td>
                            <td>{{$item->descrizione}}</td>

                            <td>{{$item->created_at->format('d/m/y H:i:s')}}</td>
                            <td>{{$item->cifra}}</td>
                            <td>{!! $item->ricorrente !!}</td>
                            <td>{{$item->tipo}}</td>

                            <td><span class="label label-megna ">{{$item->user->name}}</span> </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- @endisset --}}

</div>



<div class="modal fade" id="addEntrata" tabindex="-1" role="dialog" aria-labelledby="addEntratal1" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Aggiungi quantità</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('spese.store') }}" method="POST">
                    @csrf
                        <input type="hidden" class="form-control" id="tipo" name="tipo" value="in">

                    <div class="form-group">
                        <label for="spese-name" class="control-label">Nome transazione:</label>
                        <input type="text" class="form-control" id="codice" name="nome" required>
                    </div>
                     <div class="form-group">
                                <label for="spese-name" class="control-label">Descrizione:</label>
                                <input type="text" class="form-control" id="descrizione" name="descrizione" required>
                            </div>
                         <div class="form-group">
                                <label for="spese-name" class="control-label">Valore:</label>
                                <input type="number" class="form-control" id="cifra" name="cifra" required>
                            </div>
                             <div class="form-group bt-switch">
                               <label for="spese-name" class="control-label">Abilita ricorrenza:  </label><br>
                                {{-- <input type="checkbox" name="ricorrente" checked data-on-color="success" data-off-color="info" data-on-text="Singolo" data-off-text="Ricorrente" value="0"> --}}
                                <label class="switch"><input type="checkbox"  name="ricorrente" value="1"></label>
                            </div>
                             {{-- <div class="form-group">
                               <label for="spese-name" class="control-label">Data Scadenza:</label>
                                <input type="date" class="form-control" id="data" name="data" required>
                            </div> --}}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Inserisci</button>
            </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="addUscita" tabindex="-1" role="dialog" aria-labelledby="addCardLabel2" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Aggiungi Tipo Card</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('spese.store') }}" method="POST">
                   @csrf
                        <input type="hidden" class="form-control" id="tipo" name="tipo" value="out">

                    <div class="form-group">
                        <label for="spese-name" class="control-label">Nome transazione:</label>
                        <input type="text" class="form-control" id="codice" name="nome" required>
                    </div>
                     <div class="form-group">
                                <label for="spese-name" class="control-label">Descrizione:</label>
                                <input type="text" class="form-control" id="descrizione" name="descrizione" required>
                            </div>
                         <div class="form-group">
                                <label for="spese-name" class="control-label">Valore:</label>
                                <input type="number" class="form-control" id="cifra" name="cifra" required>
                            </div>
                             <div class="form-group bt-switch">
                               <label for="spese-name" class="control-label">Abilita ricorrenza:  </label><br>
                                <input type="checkbox" name="ricorrente" checked data-on-color="success" data-off-color="info" data-on-text="Singolo" data-off-text="Ricorrente">
                            </div>
                             {{-- <div class="form-group">
                               <label for="spese-name" class="control-label">Data Scadenza:</label>
                                <input type="date" class="form-control" id="data" name="data" required>
                            </div> --}}

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

<script src="{{url('/')}}/assets/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript">
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    $(document).ready(function() {
        radioswitch.init()
    });
    </script>


@endpush

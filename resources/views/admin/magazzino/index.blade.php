@extends('layouts.master')


@section('content')

@include('widgets.breadcrumb', [
    'titolo' => 'Magazzino',
    'posizione' => 'Magazzino',
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
                            <button type="button"  data-toggle="modal" data-target="#addEipassOnline" id="addEipassCard"  class="btn  btn-success waves-effect waves-dark">add</button>
                            <button type="button" data-toggle="modal"  data-target="#editEipassOnline"  id="editEipassCard" class="btn   btn-danger  waves-effect waves-dark">edit</button>
                            {{-- <button type="button" data-toggle="modal" data-target="#vediTab"  class="btn  btn-primary waves-effect waves-dark">show</button> --}}
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
                                                <td id="ta">{{$eipass->quantita}}</td>
                                                <td id="tb">{{$eipass->attive}}</td>
                                                <td><span class="label label-danger">{{$eipass->costo}} €</span> </td>
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
                            <button type="button" data-toggle="modal" data-target="#addUpgrade"  class="btn  btn-success waves-effect waves-dark">add</button>
                            <button type="button" data-toggle="modal" data-target="#editUpgrade"  class="btn  btn-primary waves-effect waves-dark">show</button>
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
                                                <td>{{$upgrade->quantita}}</td>
                                                <td>{{$upgrade->attive}}</td>
                                                <td><span class="label label-danger">{{$upgrade->costo}} €</span> </td>
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
                            <button type="button" data-toggle="modal" data-target="#addPekit"  class="btn  btn-success waves-effect waves-dark">add</button>
                            <button type="button" data-toggle="modal" data-target="#editPekit"  class="btn  btn-primary waves-effect waves-dark">edit</button>
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
                                                <td>{{$pekit->quantita}}</td>
                                                <td>{{$pekit->attive}}</td>
                                                <td><span class="label label-danger">{{$pekit->costo}} €</span> </td>
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
                            <button type="button" data-toggle="modal" data-target="#addInglese"  class="btn  btn-success waves-effect waves-dark">add</button>
                            <button type="button" data-toggle="modal" data-target="#editInglese"  class="btn  btn-primary waves-effect waves-dark">show</button>
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
      
</div>

     

@include('admin.magazzino.form_eicard_online')

@include('admin.magazzino.form_upgrade')

@include('admin.magazzino.form_pekit')

                              
@endsection



@push('script')
    
 

    

@endpush

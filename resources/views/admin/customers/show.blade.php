@extends('layouts.master')


@section('content')


@include('widgets.breadcrumb', [
    'titolo' => 'Dettaglio e modifica Cliente',
    'posizione' => 'Cliente',
    'pulsante' => ' '

    ] )
  <!-- Row -->
  <div class="row">
      
        <!-- Column -->
        <div class="col-lg-12 col-xlg-12 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab" aria-expanded="true">Dati</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#log" role="tab" aria-expanded="false">Proposte</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#log" role="tab" aria-expanded="false">Fatture</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#log" role="tab" aria-expanded="false">Altro</a> </li>


                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!--second tab-->
                    <div class="tab-pane" id="log" role="tabpanel" aria-expanded="false">
                        <div class="card-body">
                            <div class="profiletimeline">
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="{{url('/')}}/assets/images/users/4.jpg" alt="user" class="img-circle"> </div>
                                    <div class="sl-right">
                                        <div><a href="#" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <blockquote class="m-t-10">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

   
                    <!--first tab-->

                    <div class="tab-pane active" id="settings" role="tabpanel" aria-expanded="true">
                        <div class="card-body">
                               {{-- @include('admin.customers.editform') --}}
                               <div class="card-body"> 
                                    <small class="text-muted">Nome e Cognome </small>
                                <h6>{{$customer->nome}} {{$customer->cognome}} </h6> 
                                 <small class="text-muted">Email </small>
                                <h6>{{$customer->email}}</h6> 
                                   <small class="text-muted">Data di Nascita </small>
                                <h6>{{date("d/m/Y", strtotime($customer->data))}}</h6> 
                                <small class="text-muted ">Cellulare - Telefono</small>
                                <h6>{{$customer->cellulare}}  / {{$customer->telefono}} </h6> 
                                <small class="text-muted p-t-30 db">Indirizzo</small>
                                <h6>{{$customer->indirizzo}} , {{$customer->cittadom}} {{ucwords($customer->provinciadom)}}  {{$customer->cap}}</h6>
                                <div class="map-box">
                                        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                                        <!-- "Highlight a place or an address" -->
                                        <iframe 
                                        width="100%" height="150" frameborder="0" style="border:0" allowfullscreen="" src="https://www.google.com/maps/embed/v1/place?q=
                                        {{$customer->indirizzo}}
                                        &key=AIzaSyBjs0j5BupCpuM2LhuYDHVEEagNXPIbLPQ
                                        ">
                                        </iframe>
                                </div> 
                                <small class="text-muted p-t-30 db">Social Profile</small>
                                <br>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#edita-customer" class="btn btn-sm waves-effect waves-light btn-outline-info">Modifica</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    @include('admin.customers.modaledit')
@endsection



@push('script')
     <!-- This is data table -->
    <script src="{{url('/')}}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
@endpush

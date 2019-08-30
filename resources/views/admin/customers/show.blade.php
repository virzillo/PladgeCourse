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
                                    <div class="sl-left"> </div>
                                    <div class="sl-right">
                                        <div><a href="#" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <p>assign a new task <a href="#"> Design weblayout</a></p>
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6 m-b-20"><img src="{{url('/')}}/assets/images/big/img1.jpg" class="img-responsive radius"></div>
                                                <div class="col-lg-3 col-md-6 m-b-20"><img src="{{url('/')}}/assets/images/big/img2.jpg" class="img-responsive radius"></div>
                                                <div class="col-lg-3 col-md-6 m-b-20"><img src="{{url('/')}}/assets/images/big/img3.jpg" class="img-responsive radius"></div>
                                                <div class="col-lg-3 col-md-6 m-b-20"><img src="{{url('/')}}/assets/images/big/img4.jpg" class="img-responsive radius"></div>
                                            </div>
                                            <div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <hr>
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
                               @include('admin.customers.editform')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
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

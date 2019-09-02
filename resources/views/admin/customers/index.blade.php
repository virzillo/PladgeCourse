@extends('layouts.master')

@push('style')
    <link href="../assets/plugins/css-chart/css-chart.css" rel="stylesheet">
@endpush
@section('title','Creazione Customers')

@section('content')

@include('widgets.breadcrumb', [
    'titolo' => 'Customers',
    'posizione' => 'Customers',
    'pulsante' => ''
    ] )


<div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <h1 class="font-light">1</h1>
                                        <h6 class="text-muted">  <a href="{{route('customer.query')}}" class="" >Potenziali</a></h6></div>

                                    <!-- Column -->
                                    <div class="col text-right align-self-center">
                                        <div data-label="20%" class="css-bar m-b-0 css-bar-primary css-bar-20"><i class="mdi mdi-account-circle"></i></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <h1 class="font-light">1</h1>
                                        <h6 class="text-muted">Attivi</h6></div>
                                    <!-- Column -->
                                    <div class="col text-right align-self-center">
                                        <div data-label="30%" class="css-bar m-b-0 css-bar-danger css-bar-20"><i class="mdi mdi-briefcase-check"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <h1 class="font-light">0</h1>
                                        <h6 class="text-muted">Offerte</h6></div>
                                    <!-- Column -->
                                    <div class="col text-right align-self-center">
                                        <div data-label="40%" class="css-bar m-b-0 css-bar-warning css-bar-40"><i class="mdi mdi-star-circle"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <h1 class="font-light">0</h1>
                                        <h6 class="text-muted">Fatture</h6></div>
                                    <!-- Column -->
                                    <div class="col text-right align-self-center">
                                        <div data-label="60%" class="css-bar m-b-0 css-bar-info css-bar-60"><i class="mdi mdi-receipt"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
@include('widgets.errors')
  <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <a href="#" data-toggle="modal" data-target="#crea-customer" class="pull-right  btn waves-effect waves-light btn-rounded btn-primary justify-content-end">Add Customer</a>

                    <h4 class="card-title">Customers</h4>
                    <div class="table-responsive">
                        <table class="table stylish-table" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th >Nome</th>
                                    <th>Email</th>
                                    <th>Telefono</th>

                                    <th>Tipo</th>
                                    <th>Stato</th>
                                    <th>Data</th>

                                    <th>Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{$customer->id}}</td>
                                        <td><a href="{{route('customers.show',$customer->id)}}"  data-toggle="tooltip" data-original-title="Vai alla pagina del cliente"> {{$customer->nome}} {{$customer->cognome}}</a></td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->telefono}} </td>
                                        <td><span class="badge badge-danger">{{$customer->type}}</span> </td>
                                        <td><span class="badge badge-success">{{$customer->active}}</span></td>
                                        <td>{{$customer->created_at->format('d/m/Y')}}</td>

                                        <td>
                                            <div class="button-group" style="display:flex;">
                                            <a href="{{route('customers.show',$customer->id)}}" class="btn btn-sm waves-effect waves-light btn-outline-success" >Show</a>
                                            <a href="#" data-toggle="modal" data-target="#edita-customer" class="btn btn-sm waves-effect waves-light btn-outline-info">Edit</a>

                                            {{-- <a href="{{route('customers.edit',$customer->id)}}" class="btn btn-sm waves-effect waves-light btn-outline-info" >Edit</a> --}}
                                            <form action="{{route('customers.destroy',$customer->id)}}" method="POST" >{{ method_field('DELETE') }} {{csrf_field()}}
                                                    <button type="submit" name="del-user" class="btn btn-sm waves-effect waves-light btn-outline-danger" onclick="return ConfirmDelete()">
                                                        <i class="ft-x" aria-hidden="true" ></i>Elimina</button>
                                                    </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @include('admin.customers.createform')
    @include('admin.customers.modaledit')

@endsection



@push('datatables')
  
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

        $('#myTable').DataTable({
                  "columnDefs": [
                        { "orderable": false, "targets":[1,2,3,4,5,7]  }
                    ],
                    "displayLength": 10,
                    "order": [
                    [0, 'asc']
                ],

            });
    });
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)

          return;
      else
        return false;
    }
    </script>

@endpush

@extends('layouts.master')


@section('content')

@include('widgets.breadcrumb', [
    'titolo' => 'User',
    'posizione' => 'User',
    'pulsante' => ' '

    ] )


  <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <a href="#" data-toggle="modal" data-target="#crea-utente" class="btn waves-effect waves-light btn-rounded btn-primary pull-right">Add User</a>

                    <h4 class="card-title">Utenti</h4>
                    <div class="table-responsive">
                        <table class="table stylish-table" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Data</th>
                                    <th>Ruolo</th>
                                    <th>Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at->format('d/m/Y')}}</td>
                                        <td>@foreach ($user->roles as $role)
                                            @if ( $role->slug === "admin")
                                            <span class='badge badge-secondary'>
                                            @else
                                                <span class='badge badge-info'>
                                            @endif
                                          {{ $role->slug}} </span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class=" button-group" style="display:flex;">
                                            <a href="{{route('users.show',$user->id)}}" class="btn btn-sm waves-effect waves-light btn-outline-info" >Edit</a>
                                            <form action="{{route('users.destroy',$user->id)}}" method="POST" >{{ method_field('DELETE') }} {{csrf_field()}}
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

    </div>

   

    @include('admin.users.modalform')

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

  function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)

          return;
      else
        return false;
    }

     $(document).ready(function() {
            var table = $('#myTable').DataTable({
               
                 "columnDefs": [{ 
                    "orderable": false, 
                    "targets":[1,2] 
                     }],
                "order": [
                    [0, 'asc']
                ],
                "displayLength": 10,
                // dom: 'Bfrtip',
                // buttons: [
                //     'csv', 'pdf', 'print'
                // ]
            });

        });

</script>
@endpush

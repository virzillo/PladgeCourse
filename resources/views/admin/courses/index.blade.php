@extends('layouts.master')

@section('title','Creazione Corsi')

@section('content')

@include('widgets.breadcrumb', [
    'titolo' => 'Sezione creazione corsi',
    'posizione' => 'Corsi',
    'pulsante' => ''
    ] )

  <!-- Row -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Aggiungi Corso</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('courses.store') }}" method="POST">
                            @csrf
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome"> </div>
                    <div class="form-group">
                        <label>Descrizione</label>
                        <textarea class="form-control" name="descrizione"> </textarea>

                    </div>
                    <div class="form-group">
                        <label>Importo Iscrizione</label>
                        <input type="text" class="form-control" name="costo"> </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                <button type="submit" class="btn btn-success" >Salva</button>
            </div>
                </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

                               

<div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <button class="pull-right btn btn-sm btn-rounded btn-success" data-toggle="modal" data-target="#myModal">Nuovo</button>
                               
                                <h4 class="card-title">Elenco corsi</h4>
                                <div class="table-responsive m-t-20">
                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Nome</th>
                                                <th>Descrizione</th>
                                                <th>Iscrizione</th>
                                                <th>#</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($courses as $course)
                                        <tr class="">

                                                <td><span class="round"><a href="#"><img src="{{url('/')}}/assets/images/users/2.jpg" alt="user" width="50"></a></span></td>
                                                <td>
                                                    <h6>{{$course->nome}}</h6></td>
                                                <td>{{$course->descrizione}}</td>
                                                <td><span class="label label-info">{{$course->costo}}</span></td>
                                                <td>  <div class="button-group" style="display:flex;">
                                                <a href="{{route('courses.edit',$course->id)}}" class="btn btn-sm waves-effect waves-light btn-outline-info" >Edit</a>
                                                    <form action="{{route('courses.destroy',$course->id)}}" method="POST" >{{ method_field('DELETE') }} {{csrf_field()}}
                                                    <button type="submit" name="del-user" class="btn btn-sm waves-effect waves-light btn-outline-danger" onclick="return ConfirmDelete()">
                                                        <i class="ft-x" aria-hidden="true" ></i>Elimina</button>
                                                    </form></div>
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

  @if (isset($corso))


<div class="row">
        <div class="col-lg-4">
            <!-- Column -->
                <div class="card">
                <div class="card-body little-profile">
                    <h3 class="m-b-0"></h3>
                    
                        <form action="{{ route('courses.update' , $corso->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="nome" value="{{$corso->nome}}"> </div>
                                            <div class="form-group">
                                                <label>Descrizione</label>
                                                <textarea class="form-control" name="descrizione">{{$corso->descrizione}} </textarea>

                                            </div>
                                            <div class="form-group">
                                                <label>Importo Iscrizione</label>
                                                <input type="text" class="form-control" name="costo" value=" {{$corso->costo}}"></div>
                                    
                                        <button type="submit" class="btn btn-success" >Salva</button>
                                        </form>
                        </div>
                    </div>
                              
            </div>
              <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <button class="pull-right btn btn-sm btn-rounded btn-success" data-toggle="modal" data-target="#addModules">Aggiungi esame</button>
                               
                                <h4 class="card-title">Elenco Moduli di  {{$corso->nome}}{{$corso->id}}</h4>
                                 <div class="table-responsive m-t-20">
                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Descrizione</th>
                                                <th>Costo</th>
                                                <th>#</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($modules as $module)
                                        <tr class="">
                                            <input type="hidden" name="course_id" value="{{$corso->id}}">
                                                <td>
                                                    <h6>{{$module->nome}}</h6><small class="text-muted">{{$module->durata}} : ORE</small></td>
                                                <td>{{$module->descrizione}}</td>
                                                <td><span class="label label-info">{{$module->costo}}</span></td>
                                                <td>  <div class="button-group" style="display:flex;">
                                                <a href="{{route('courses.edit',$module->id)}}" class="btn btn-sm waves-effect waves-light btn-outline-info" >Edit</a>
                                                    <form action="{{route('modules.destroy',$module->id)}}" method="POST" >{{ method_field('DELETE') }} {{csrf_field()}}
                                                    <button type="submit" name="del-user" class="btn btn-sm waves-effect waves-light btn-outline-danger" onclick="return ConfirmDelete()">
                                                        <i class="ft-x" aria-hidden="true" ></i>Elimina</button>
                                                    </form></div>
                                                </td>
                                            </tr>

                                           @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

<div class="modal fade" id="addModules" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Aggiungi esame</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('modules.store') }}" method="POST">
                            @csrf
                    <div class="form-group">
                        <label>Nome</label>
        <input type="hidden" name="course_id" value="{{$corso->id}}">
                        
                        <input type="text" class="form-control" name="nome"> </div>
                    <div class="form-group">
                        <label>Descrizione</label>
                        <textarea class="form-control" name="descrizione"> </textarea>

                    </div>
                    <div class="form-group">
                        <label>Importo</label>
                        <input type="text" class="form-control" name="costo"> 
                    </div>
                    
                    <div class="form-group">
                        <label>Durata</label>
                        <input type="number" class="form-control" name="durata"> 
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                <button type="submit" class="btn btn-success" >Salva</button>
            </div>
                </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


{{-- <div class="modal fade" id="editModules" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modifica esame</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('modules.update' , $module->id) }}" method="POST">
                            @csrf
                    <div class="form-group">
                        <label>Nome</label>
            <input type="hidden" name="course_id" value="{{$corso->id}}">
            <input type="hidden" name="course_id" value="{{$module->id}}">
                        
                        <input type="text" class="form-control" name="nome" value="{{$module->nome}}"> </div>
                    <div class="form-group">
                        <label>Descrizione</label>
                        <textarea class="form-control" name="descrizione"  value="{{$module->descrizione}}"> </textarea>

                    </div>
                    <div class="form-group">
                        <label>Importo</label>
                        <input type="text" class="form-control" name="costo"  value="{{$module->costo}}"> 
                    </div>
                    
                    <div class="form-group">
                        <label>Durata</label>
                        <input type="number" class="form-control" name="durata"  value="{{$module->durata}}"> 
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                <button type="submit" class="btn btn-success" >Salva</button>
            </div>
                </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div> --}}
       </div>
        </div>
  

  @endif

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

        $('#myTable').DataTable({

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
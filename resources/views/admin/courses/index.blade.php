@extends('layouts.master')

@section('title','Creazione Corsi')

@section('content')

@include('widgets.breadcrumb', [
'titolo' => 'Sezione creazione corsi',
'posizione' => 'Corsi',
'pulsante' => ''
] )

<!-- Row -->
@include('widgets.errors')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Aggiungi Corso</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="myBtn"> <span
                        aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf
                        <div class="form-group">
                        <label>Assegna Categoria</label>
                            <select name="card_id" id="card_id" class="form-control">
                                <option value="" disabled>seleziona categoria</option>
                                @foreach ($cards as $card)
                                <option value="{{$card->id}}">{{$card->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                     <div class="form-group m-b-0" >
                        <label>Seleziona tipo corso</label>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <select name="tipo" id="tipo" class="form-control">
                                {{-- <option value="" disabled>seleziona tipo corso</option> --}}
                                <option value="online">online</option>
                                <option value="insede">insede</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-success" id="pulsante">scegli</button>
                        </div>
                    </div>
                    <div class="form-group" id="divnome" >
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome"> 
                    </div>
                    <div class="form-group" id="divdescrizione" >
                        <label>Descrizione</label>
                        <textarea class="form-control" name="descrizione" > </textarea>
                    </div>
                    <div class="form-group" id="diviscrizione" >
                        <label>Importo Iscrizione</label>
                        <input type="number" class="form-control" name="iscrizione" > 
                    </div>
                    <div class="form-group"  id="divesami" >
                        <label>Esami</label>
                        <input type="number" class="form-control" name="esami" id="esami" > 
                    </div>
                    <div class="form-group" id="divcosto"  >
                        <label>Importo Esami</label>
                        <input type="number" class="form-control" name="costo" id="costo"> 
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                <button type="submit" class="btn btn-success">Salva</button>
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
                <button class="pull-right btn btn-sm btn-rounded btn-success" data-toggle="modal"
                    data-target="#myModal">Nuovo</button>

                <h4 class="card-title">Elenco corsi</h4>
                <div class="table-responsive m-t-20">
                    <table class="table stylish-table" id="myTable">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Nome</th>
                                <th>Descrizione</th>
                                <th>Iscrizione</th>
                                <th>Esami</th>
                                <th>Costo</th>
                                <th>#</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                            <tr class="">
                                    <td>@if ($course->tipo=='insede')
                                        <span class="label label-info">{{$course->tipo}}</span>
                                        @else
                                        <span class="label label-warning">{{$course->tipo}}</span>
                                    @endif
                                    </td>
                                <td><h6>{{$course->nome}}</h6></td>
                                <td>{{$course->descrizione}}</td>
                                <td><span class="label label-info">{{$course->iscrizione}} €</span></td>
                                <td>{{$course->esami}}</td>
                                <td><span class="label label-success">{{$course->costo}} €</span></td>
                                <td>
                                    <div class="button-group" style="display:flex;">
                                        <a href="{{route('courses.edit',$course->id)}}"
                                            class="btn btn-sm waves-effect waves-light btn-outline-info">Edit</a>
                                        <form action="{{route('courses.destroy',$course->id)}}" method="POST">
                                            {{ method_field('DELETE') }} {{csrf_field()}}
                                            <button type="submit" name="del-user"
                                                class="btn btn-sm waves-effect waves-light btn-outline-danger"
                                                onclick="return ConfirmDelete()">
                                                <i class="ft-x" aria-hidden="true"></i>Elimina</button>
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
@if (isset($corso))
      <div class="col-lg-4">
        <!-- Column -->
        <div class="card">
            <div class="card-body little-profile">
                <h3 class="m-b-0">MODIFCA DEL CORSO: {{$corso->nome}}</h3>

                <form action="{{ route('courses.update' , $corso->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Tipo</label>
                        <input type="text" class="form-control" name="costo" value=" {{$corso->tipo}}"></div>
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
                    <div class="form-group">
                        <label>Importo Esame</label>
                        <input type="text" class="form-control" name="esame" value=" {{$corso->esame}}"></div>

                    <button type="submit" class="btn btn-success">Salva</button>
                </form>
            </div>
        </div>

    </div>
    @endif   
</div>


</div>
<style>
.nascondi{
    display:none;
}

</style>

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

        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var modal = $(this);
            modal.find('.modal-title').text('Creazione Corso ');
            $('#divnome').addClass('nascondi');
            $('#divdescrizione').addClass('nascondi');
            $('#diviscrizione').addClass('nascondi');
            $('#divesami').addClass('nascondi');
            $('#divcosto').addClass('nascondi'); 
        });



        $('#pulsante').click(function(){
            if ($('#tipo').val()=="online") {
                console.log('online');
                $('#divnome').removeClass('nascondi');
                $('#divdescrizione').removeClass('nascondi');
                $('#diviscrizione').removeClass('nascondi');
                $('#divesami').addClass('nascondi');
                $('#divcosto').addClass('nascondi');
            } else {
                console.log('insede');
                $('#divnome').removeClass('nascondi');
                $('#divdescrizione').removeClass('nascondi');
                $('#diviscrizione').removeClass('nascondi');
                $('#divesami').removeClass('nascondi');
                $('#divcosto').removeClass('nascondi');
            }
         });


    $(document).ready(function () {

        $('#myTable').DataTable({
            "displayLength": 10,
            "order": [
                [0, 'asc']
            ],
        });

              
        
        // $('#create_record').click(function(){
        //     $('.modal-title').text("Add New Record");
        //         $('#action_button').val("Add");
        //         $('#action').val("Add");
        //         $('#formModal').modal('show');
        //     });


    });

    function ConfirmDelete() {
        var x = confirm("Are you sure you want to delete?");
        if (x)

            return;
        else
            return false;
    }

</script>
@endpush

@extends('layouts.master')


@section('content')

@include('widgets.breadcrumb', [
    'titolo' => 'Storage',
    'posizione' => 'Storage',
    'pulsante' => ' '

    ] )
@push('style')

@endpush

@include('widgets.errors')


<div class="row">


    @foreach ($tokens as $token)
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body bg-info">
                    <h4 class="text-white card-title">{{ $token->nome}}</h4>
                    <h6 class="card-subtitle text-white m-b-0 op-5"></h6> </div>
                <div class="card-body">
                    <div class="message-box contact-box">
                        <h2 class="add-ct-btn">
                            <button type="button"  data-toggle="modal" data-target="#add" id="addbtn" data-id="{{$token->id}}" data-nome="{{$token->nome}}" class="btn  btn-success waves-effect waves-dark">add</button>

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
                                                <td id="ta">{{$token->quantita}}</td>
                                                <td id="tb">0</td>
                                                <td><span class="label label-danger">5</span> </td>
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
    @endforeach


         <div class="col-lg-12">
            <div class="card">
                <div class="card-body bg-info">
                    <h4 class="card-title"></h4>
                    <button type="button"  data-toggle="modal" data-target="#addTab" id="addbtn2" class="btn  btn-primary waves-effect waves-dark">add</button>
                </div>
                 <div class="card-body ">
                    <div class="table-responsive">
                        <table class="table stylish-table" id="myTable">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>token</th>
                                    <th>cifra</th>
                                    <th>quantita</th>
                                    <th>movimento</th>
                                    <th>totale</th>
                                    <th>operatore</th>
                                    <th>data</th>
                                    <th>#</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($token_logs as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->token->nome}}</td>
                                        <td>{{$item->costo}} €</td>
                                        <td>{{$item->quantita}}</td>
                                        <td>{{$item->tipomovimento}}</td>
                                        <td>{{$item->totale}} €</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                                       <td> <button type="button" data-toggle="modal"  data-target="#edit" id="editbtn"
                                        data-id="{{$item->id}}" data-quantita="{{$item->quantita}}"  data-costo="{{$item->costo}}"
                                        class="btn btn-danger  waves-effect waves-dark">edit</button></td>
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
@include('admin.storage.modalform')

    <div class="modal fade" id="addTab" tabindex="-1" role="dialog" aria-labelledby="addCardLabel1" aria-hidden="true" role="dialog" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ route('storage.store') }}"  id="formadd"  method="POST">
                                @csrf
                             <div class="form-group"  id="divcategoria">
                                <label>Assegna Categoria</label>
                                    <select name="nome" id="nome" class="form-control">
                                        <option value="" disabled>Seleziona Token</option>
                                        @foreach ($tokens as $token)
                                        <option value="{{$token->nome}}">{{$token->nome}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Seleziona quantità:</label>
                                <input type="number" class="form-control"  name="quantita">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Costo per unità:</label>
                                <input type="text" class="form-control" name="costo">
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Add" />
                    </div>
                        </form>

                </div>
            </div>
        </div>

@if (isset($token_logs))
         <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="addCardLabel1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1"> Modifica quantità</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                          <form id="formupdate" action="" method="POST">
                                @csrf
                                @method('PATCH')
                            <input type="hidden" class="form-control" id="editid" name="id">

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Seleziona quantità:</label>
                                <input type="number" class="form-control " id="editquantita" name="quantita" >
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Costo per unità:</label>
                                <input type="number" class="form-control" id="editcosto" name="costo">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Modifica</button>
                    </div>
                        </form>

                </div>
            </div>
        </div>
@endif



@endsection



@push('script')
 <script>
    // inserimento da tabella
    $('#addTab').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal

        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + nome)

    })
    // modifica da tabella
    $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var quantita =parseInt(button.data('quantita'))
        var costo = button.data('costo')
        var url ='/admin/storage/'+id
        var modal = $(this)
        modal.find('.modal-title').text('Modifica ' + id)
        $('#editid').val(id)
        $('#editquantita').val(quantita)
        $('#editcosto').val(costo)
        $("#formupdate").attr("action", url);

    })


    $('#add').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var nome = button.data('nome')

        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + nome)
        $('#id').val(id)
        $('#nome').val(nome)
    })



  </script>
@endpush

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
                        { "orderable": false, "targets":[]  }
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

@extends('layouts.master')


@section('content')

@include('widgets.breadcrumb', [
    'titolo' => 'Storage',
    'posizione' => 'Storage',
    'pulsante' => ' '
    
    ] )
@push('style')

@endpush
<div class="row">
    {{-- <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                 
                    <div class="table-responsive m-t-40">
                        <table id="tabclienti" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>totali</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tokens as $token)
                                <tr>
                                    <td>{{$token->nome}}</td>
                                    <td>2</td>
                                    <td> 
                                        <button type="button"  data-toggle="modal" data-target="#add" id="addbtn" data-id="{{$token->id}}" data-id="ciao" class="btn  btn-success waves-effect waves-dark">add</button>
                                        <button type="button" data-toggle="modal"  data-target="#edit"  id="editbtn" data-id="{{$token->id}}" class="btn   btn-danger  waves-effect waves-dark">edit</button>
                                        <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                               
                                
                            </tbody>
                        </table>
                    </div>
        </div>
    </div> --}}

  @foreach ($tokens as $token)
       <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body bg-info">
                    <h4 class="text-white card-title">{{ $token->nome}}</h4>
                    <h6 class="card-subtitle text-white m-b-0 op-5"></h6> </div>
                <div class="card-body">
                    <div class="message-box contact-box">
                        <h2 class="add-ct-btn">
                            <button type="button"  data-toggle="modal" data-target="#add" id="addbtn" data-id="{{$token->id}}" class="btn  btn-success waves-effect waves-dark">add</button>
                            <button type="button" data-toggle="modal"  data-target="#edit"  id="editbtn" data-id="{{$token->id}}" class="btn btn-danger  waves-effect waves-dark">edit</button>
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
                                            @foreach ($token_operations as $item)
                                                @if ($item->token_id==$token->id)
                                                    <tr>
                                                    <td id="ta">{{$item->quantita}}</td>
                                                    <td><span class="label label-danger">{{$item->costo}} €</span> </td>
                                                </tr> 
                                                @endif
                                            @endforeach
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

</div>

@include('admin.storage.modalform')

@endsection



@push('script')
 <script>

     $('#add').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')

       
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + id)
        $('#id').val(id)
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
@extends('layouts.master')


@section('content')

@include('widgets.breadcrumb', [
    'titolo' => 'Impostazioni Generali Programma',
    'posizione' => 'Impostazioni',
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
                            <button type="button"  data-toggle="modal"  id="addCard"  class="btn  btn-success waves-effect waves-dark">add</button>
                            <button type="button" data-toggle="modal"  id="editCard" class="btn   btn-danger  waves-effect waves-dark">edit</button>
                            <button type="button" name="addCard" id="addCard" class="btn btn-success btn-sm">Create Record</button>
                            <button type="button" data-toggle="modal" data-target="#vediTab"  class="btn  btn-primary waves-effect waves-dark">show</button>
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
                                                    <td id="tb">{{$eipass->costo}}</td>
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

     


        <div class="modal fade" id="modalformEipassOnline" tabindex="-1" role="dialog" aria-labelledby="addCardLabel1" aria-hidden="true" role="dialog" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Aggiungi quantità</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ route('storage.store') }}"  id="formEipassOnline"  method="POST">
                                @csrf
                             <input type="hidden" class="form-control" id="nome" name="nome" value="Eipass Corsi on-line">
                            
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Seleziona quantità:</label>
                                <input type="number" class="form-control" id="quantita" name="quantita">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Costo per unità:</label>
                                <input type="number" class="form-control" id="costo" name="costo">
                            </div>
                    </div>
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                          <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="tipo_invio" id="tipo_invio" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Add" />
                    </div>
                        </form>

                </div>
            </div>
        </div>

         {{-- <div class="modal fade" id="editEipassOnline" tabindex="-1" role="dialog" aria-labelledby="addCardLabel1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Aggiungi quantità</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ route('storage.store') }}" method="POST">
                                @csrf
                             <input type="hidden" class="form-control" id="nome" name="nome" value="Eipass Corsi on-line">
                            
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Seleziona quantità:</label>
                                <input type="number" class="form-control" id="quantita" name="quantita" value="{{$eipass->quantita}}">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Costo per unità:</label>
                                <input type="number" class="form-control" id="costo" name="costo" value="{{$eipass->costo}}">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Inserisci</button>
                    </div>
                        </form>

                </div>
            </div>
        </div> --}}

       
                              
@endsection



@push('script')
    
  <script>
  $(document).ready(function(){

var quantita = '<?php echo json_encode($eipass->quantita); ?>';
var costo = '<?php echo json_encode($eipass->costo); ?>';


    $('#addCard').click(function(){
        $('.modal-title').text("Crea");
            $('#action_button').val("Add");
            $('#action').val("Add");
             $('#quantita').val('');
             $('#costo').val('');
            $('#modalformEipassOnline').modal('show');
    });



    $('#editCard').click(function(){
        $('.modal-title').text("Modifica");
            $('#action_button').val("Edit");
            $('#action').val("Edit");
             $('#quantita').val(quantita);
             $('#costo').val(costo);

            $('#modalformEipassOnline').modal('show');
    });

     $('#formEipassOnline').on('submit', function(event){
      event.preventDefault();
      if($('#action').val() == 'Add')
      {
       $('#tipo_invio').val('store');
        $('#modalformEipassOnline').modal('hide');
        

               $.ajax({
        url:"{{ route('storage.store') }}",
        method:"POST",
        data: new FormData(this),
        contentType: false,
        cache:false,
        processData: false,
        dataType:"json",
        success:function(data)
        {
            var obj =json_encode( data );
              var html = '';
              $('#formEipassOnline')[0].reset();
        $('#modalformEipassOnline').modal('hide');
            $('#ta').val(obj.quantita);
            $('#tb').val("Edit");

        console.log(data);
         toastr.success(data.success );
       
         if(data.errors)
         {
          html = '<div class="alert alert-danger">';
          for(var count = 0; count < data.errors.length; count++)
          {
           html += '<p>' + data.errors[count] + '</p>';
          }
          html += '</div>';
         }
         if(data.success)
         {
          html = '<div class="alert alert-success">' + data.success + '</div>';
        $('#formEipassOnline')[0].reset();
        $('#modalformEipassOnline').modal('hide');
         toastr.success(data.success );

         }
         $('#form_result').html(html);
        }
       })

       
      }else{
        $('#tipo_invio').val('update');
        $('#modalformEipassOnline').modal('hide');
      }

      
     });

  });
  </script>

    

@endpush

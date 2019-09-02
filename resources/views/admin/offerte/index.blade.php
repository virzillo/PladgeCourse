@extends('layouts.master')


@section('content')

@include('widgets.breadcrumb', [
'titolo' => 'Calendario',
'posizione' => 'Calendario',
'pulsante' => ' '

] )
@push('style')
<!-- Calendar CSS -->
<link href="{{url('/')}}/assets/plugins/calendar/dist/fullcalendar.css" rel="stylesheet" />
@endpush
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Realizza un' offerta</h4>
                        <h6 class="card-subtitle">info aggiuntive
                            <code>da aggiungere</code></h6>
                        {{-- <a class="popup-youtube btn btn-danger" href="">Nuova Offerta</a> --}}
                          <button type="button" name="create_record" id="create_record" class="btn btn-danger">Create Record</button>

                            <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row form-group">
                                        <div class="col-lg-9">
                                            <label for="s">Seleziona cliente:</label>
                                            <select name="company_id" id="company_id" class="form-control">
                                                @foreach ($customers as $customer)
                                                <option value="{{$customer->id}}">{{$customer->nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                                <a href="#" data-toggle="modal" data-target="#crea-company"
                                                    class="btn waves-effect waves-light btn-rounded btn-primary justify-content-end"> <i
                                                        class="ti-plus text" aria-hidden="true"></i></a>

                                        </div>
                                    </div>
                                  <div class="form-group col-8  mb-2 file-repeater">
                                              
                                                <div data-repeater-list="repeater-list">
                                                <div data-repeater-item>
                                                    <div class="row mb-1">
                                                    <div class="col-9 col-xl-10">
                                                        <label class="file center-block">Seleziona Corso:
                                                         <select name="course" id="course" class="form-control">
                                                            <option value="" disabled>seleziona  corso</option>
                                                            @foreach ($courses as $course)
                                                                <option value="{{$course->id}}" id="val">{{$course->nome}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-2 col-xl-1">
                                                        <button type="button" data-repeater-delete class="btn btn-icon btn-danger mr-1"><i class="ft-x"></i></button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <button type="button" data-repeater-create class="btn btn-primary">
                                                <i class="icon-plus4"></i>Aggiungi corso
                                                </button>
                                            </div>
                                   
                                    <div class="form-group">
                                        <input type="textarea" name="test" id="test">
                                        <select name="type" id="car_models" class="form-control">
                                            <option value="" disabled>seleziona  modulo</option>
                                         
                                        </select>
                                    </div>
                                 

                                <br />
                                <div class="form-group" align="right">
                                <input type="hidden" name="action" id="action" />
                                <input type="hidden" name="hidden_id" id="hidden_id" />
                                <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="" />
                                </div>
                            </form>
                    </div>
                    <div class="col-md-6">
                        <h4 class="card-title"></h4>
                        <h6 class="card-subtitle"></h6>

                        <table border='1' id='userTable' style='border-collapse: collapse;'>
       <thead>
        <tr>
          <th>S.no</th>
          <th>Username</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
       </thead>
       <tbody></tbody>
     </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
             <h4 class="modal-title">Add New Record</h4>
             <button type="button" class="close" data-dismiss="modal">&times;</button>

           </div>
           <div class="modal-body">
            <span id="form_result"></span>
            <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
                    <input id="name" type="text" class="form-control"
                        name="name"  required autocomplete="name" autofocus
                        placeholder="Nome">

                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control"
                        name="email" required autocomplete="email" placeholder="Email">

                </div>
                <div class="form-group">
                    <select name="active" id="active" class="form-control">
                        <option value="" disabled>seleziona stato</option>
                        <option value="1">Attivo</option>
                        <option value="0">Inttivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="type" id="type" class="form-control">
                        <option value="" disabled>seleziona tipo cliente</option>
                        <option value="1">Cliente</option>
                        <option value="0">Potenziale</option>
                    </select>
                </div>
                <div class="row form-group">
                    <div class="col-lg-9">
                        <select name="company_id" id="company_id" class="form-control">
                            @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3">
                            <a href="#" data-toggle="modal" data-target="#crea-company"
                                class="btn waves-effect waves-light btn-rounded btn-primary justify-content-end"> <i
                                    class="ti-plus text" aria-hidden="true"></i></a>

                            </div>
                </div>

              <br />
              <div class="form-group" align="right">
               <input type="hidden" name="action" id="action" />
               <input type="hidden" name="hidden_id" id="hidden_id" />
               <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="" />
              </div>
            </form>
           </div>
        </div>
       </div>
</div>


@endsection

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
 <script src="/assets/plugins/forms/repeater/jquery.repeater.min.js"
  type="text/javascript"></script>

@push('script')
<script>

    (function(window, document, $) {
	'use strict';

	// Default
	$('.repeater-default').repeater();

	// Custom Show / Hide Configurations
	$('.file-repeater, .contact-repeater').repeater({
		show: function () {
			$(this).slideDown();
		},
		hide: function(remove) {
			if (confirm('Are you sure you want to remove this item?')) {
				$(this).slideUp(remove);
			}
		}
	});


})(window, document, jQuery);




    $(document).ready(function(){

        // Aprire il modal
        $('#create_record').click(function(){
            $('.modal-title').text("Titolo personale");
            $('#action_button').val("Crea");
            $('#action').val("Add");
            $('#formModal').modal('show');
        });

       

            $('#course').on('change', function(event){
                var idcorso =   $('#course').val();
                $('#test').val(idcorso);
                  $.ajax({
                       headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    url: "/fetch-company/"+idcorso,
                    type: 'get',
                    dataType: 'json',

                    success:function(data){
                         $('#test').val(data['data']);

                          $("#car_models").append(data['button']);
                        console.log(data['button']);


                    },
                    });
                    
            });
       


});

   
    
       

</script>
@endpush

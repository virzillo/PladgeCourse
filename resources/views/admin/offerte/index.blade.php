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

                            <form method="post" id="samplse_form" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                               
                                    <div class="row form-group">
                                        <div class="col-lg-9">
                                            <label for="s">Seleziona cliente:</label>

                                            <select  id="selectj1" name="customer" class="selectclient search_cliente form-control">
                                                @foreach ($customers as $customer)
                                                <option value="{{$customer->id}}">{{$customer->nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                                {{-- <a href="#" data-toggle="modal" data-target="#crea-company"
                                                    class="btn waves-effect waves-light btn-rounded btn-primary justify-content-end"> <i
                                                        class="ti-plus text" aria-hidden="true"></i></a> --}}

                                        </div>
                                    </div>
                                        <div class="form-group col-8  ">
                                            <select  name="course" id="selectj2"  class=" search_corso form-control">
                                                  <option value="" disabled>seleziona  corso</option>
                                                    @foreach ($cards as $course)
                                                        <option value="{{$course->id}}" id="val">{{$course->nome}}</option>
                                                    @endforeach
                                            </select>
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





@endsection

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


@push('script')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>


<script type="text/javascript">


$(document).ready(function() {
		$('.selectclient').select2();
});




        $('.search_utente').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
            type : 'get',
            url: "{{ route('proposal.search') }}",
            data:{'search':$value},
            success:function(data){
            $('tbody').html(data);
            }
            });
        })

         $('.search_corso').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
            type : 'get',
            url: "{{ route('proposal.search_corso') }}",
            data:{'search':$value},
            success:function(data){
            $('tbody').html(data);
            }
            });
        })

</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>


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

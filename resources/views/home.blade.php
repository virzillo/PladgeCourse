@extends('layouts.master')

@section('content')


@include('widgets.breadcrumb', [
    'titolo' => '',
    'posizione' => '',
    'pulsante' => ' '
    ] )
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <div align="right">
                        <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
                       </div>
                       <br />
                     <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="user_table">
                             <thead>
                              <tr>
                                  <th width="20%">Name</th>
                                  <th width="20%">Email</th>
                                  <th width="20%">Type</th>
                                  <th width="20%">Active</th>
                                  <th width="10%">company</th>

                                  <th width="40%">Action</th>
                              </tr>
                             </thead>
                        </table>
                     </div>
                     <br />


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
                            @foreach ($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3">
                            <a href="#" data-toggle="modal" data-target="#crea-company"
                                class="btn waves-effect waves-light btn-rounded btn-primary justify-content-end"> <i
                                    class="ti-plus text" aria-hidden="true"></i></a>

                            </div>
                </div>
                            
              {{-- <div class="form-group">
               <label class="control-label col-md-4">Select Profile Image : </label>
               <div class="col-md-8">
                <input type="file" name="image" id="image" />
                <span id="store_image"></span>
               </div>
              </div> --}}
              <br />
              <div class="form-group" align="right">
               <input type="hidden" name="action" id="action" />
               <input type="hidden" name="hidden_id" id="hidden_id" />
               <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
              </div>
            </form>
           </div>
        </div>
       </div>
   </div>

   <div id="confirmModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h2 class="modal-title">Confirmation</h2>

                   <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                   <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
               </div>
               <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               </div>
           </div>
       </div>
   </div>


   
<div class="modal fade bs-example-modal-sm" id="crea-company" tabindex="-1" role="dialog" aria-labelledby="companyLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="companyLabel">Small modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('company.store') }}">
                    @csrf
                    <div class="form-group">
                        <input id="name" type="text" class="form-control"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Nome">

                    </div>
                    <div class="form-group">
                        <input id="phone" type="text" class="form-control"
                            name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="phone">

                    </div>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Crea</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@push('script')
<script src="{{url('/')}}/assets/plugins/datatables/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function(){


            $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                url: "{{ route('ajax-crud.index') }}",
                },
                data:[

                ],
                columns:[
                //    {
                //     data: 'image',
                //     name: 'image',
                //     render: function(data, type, full, meta){
                //      return "<img src={{ URL::to('/') }}/images/" + data + " width='70' class='img-thumbnail' />";
                //     },
                //    },

                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },

                {
                    data: 'type',
                    name: 'type'
                },

                {
                    data: 'active',
                    name: 'active'
                },

                {
                    data: 'company',
                    name: 'company'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
                ]
            });

     $('#ctable').DataTable({
      processing: true,
      serverSide: true,
      ajax:{
       url: "{{ route('users.index') }}",
      },
      data:[

      ],
      columns:[
        {
        data: 'id',
        name: 'id'
       },
       {
        data: 'name',
        name: 'name'
       },
       {
        data: 'action',
        name: 'action',
        orderable: false
       }
      ]
     });


     $('#create_company').click(function(){
      $('.modal-title').text("Add New Company");
         $('#action_button').val("Add");
         $('#action').val("Add");
         $('#fmCompany').modal('show');
     });

     $('#create_record').click(function(){
      $('.modal-title').text("Add New Record");
         $('#action_button').val("Add");
         $('#action').val("Add");
         $('#formModal').modal('show');
     });

     $('#sample_form').on('submit', function(event){
      event.preventDefault();
      if($('#action').val() == 'Add')
      {
       $.ajax({
        url:"{{ route('ajax-crud.store') }}",
        method:"POST",
        data: new FormData(this),
        contentType: false,
        cache:false,
        processData: false,
        dataType:"json",
        success:function(data)
        {
         var html = '';
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
        $('#sample_form')[0].reset();
        $('#user_table').DataTable().ajax.reload();
        $('#formModal').modal('hide');
         toastr.success(data.success );

         }
         $('#form_result').html(html);
        }
       })
      }

      
     });

     $(document).on('click', '.edit', function(){
      var id = $(this).attr('id');
      $('#form_result').html('');
      $.ajax({
       url:"/ajax-crud/"+id+"/edit",
       dataType:"json",
       success:function(html){
        $('#name').val(html.data.name);
        $('#email').val(html.data.email);
        $('#type').val(html.data.type);
        $('#active').val(html.data.active);
        $('#company_id').val(html.data.company_id);

        // $('#store_image').html("<img src={{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
        // $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
        $('#hidden_id').val(html.data.id);
        $('.modal-title').text("Edit New Record");
        $('#action_button').val("Edit");
        $('#action').val("Edit");
        $('#formModal').modal('show');
       }
      })
     });

     var user_id;

     $(document).on('click', '.delete', function(){
      user_id = $(this).attr('id');
      $('#confirmModal').modal('show');
     });

     $('#ok_button').click(function(){
      $.ajax({
       url:"ajax-crud/destroy/"+user_id,
       beforeSend:function(){
        $('#ok_button').text('Deleting...');
       },
       success:function(data)
       {
        setTimeout(function(){
         $('#confirmModal').modal('hide');
         $('#user_table').DataTable().ajax.reload();
         $('#ok_button').text('Delete');
         toastr.success('Customer eliminato con successo');

        }, 2000);
       }
      })
     });

    });
    </script> 
@endpush





@endsection

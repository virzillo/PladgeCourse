@extends('layouts.master')


@section('content')


@include('widgets.breadcrumb', [
    'titolo' => 'Dettaglio e modifica utente',
    'posizione' => 'User',
    'pulsante' => ' '

    ] )
  <!-- Row -->
  <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card"> <img class="card-img" src="{{url('/')}}/assets/images/background/socialbg.jpg" alt="Card image">
                <div class="card-img-overlay card-inverse social-profile d-flex ">
                    <div class="align-self-center" style="margin:auto;"> <img src="{{url('/')}}/assets/images/users/1.jpg" class="img-circle" width="100">
                        <h4 class="card-title">{{$user->name}}</h4>
                        <h6 class="card-subtitle">{{$user->email}}</h6>
                        <p class="text-white">
                            @foreach ($user->roles as $role)
                            Ruolo: {{$role->slug}}
                            @endforeach    
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab" aria-expanded="true">Dati</a> </li>

                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#log" role="tab" aria-expanded="false">Log operazioni</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!--second tab-->
                    <div class="tab-pane" id="log" role="tabpanel" aria-expanded="false">
                        <div class="card-body">
                            <div class="profiletimeline">
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="{{url('/')}}/assets/images/users/1.jpg" alt="user" class="img-circle"> </div>
                                    <div class="sl-right">
                                        <div><a href="#" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <p>assign a new task <a href="#"> Design weblayout</a></p>
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6 m-b-20"><img src="{{url('/')}}/assets/images/big/img1.jpg" class="img-responsive radius"></div>
                                                <div class="col-lg-3 col-md-6 m-b-20"><img src="{{url('/')}}/assets/images/big/img2.jpg" class="img-responsive radius"></div>
                                                <div class="col-lg-3 col-md-6 m-b-20"><img src="{{url('/')}}/assets/images/big/img3.jpg" class="img-responsive radius"></div>
                                                <div class="col-lg-3 col-md-6 m-b-20"><img src="{{url('/')}}/assets/images/big/img4.jpg" class="img-responsive radius"></div>
                                            </div>
                                            <div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="{{url('/')}}/assets/images/users/2.jpg" alt="user" class="img-circle"> </div>
                                    <div class="sl-right">
                                        <div> <a href="#" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <div class="m-t-20 row">
                                                <div class="col-md-3 col-xs-12"><img src="{{url('/')}}/assets/images/big/img1.jpg" alt="user" class="img-responsive radius"></div>
                                                <div class="col-md-9 col-xs-12">
                                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="#" class="btn btn-success"> Design weblayout</a></div>
                                            </div>
                                            <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="{{url('/')}}/assets/images/users/3.jpg" alt="user" class="img-circle"> </div>
                                    <div class="sl-right">
                                        <div><a href="#" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                        </div>
                                        <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="{{url('/')}}/assets/images/users/4.jpg" alt="user" class="img-circle"> </div>
                                    <div class="sl-right">
                                        <div><a href="#" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <blockquote class="m-t-10">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

   
                    <!--first tab-->

                    <div class="tab-pane active" id="settings" role="tabpanel" aria-expanded="true">
                        <div class="card-body">
                                <form class="" action="{{route('users.update', $user->id)}}" method="POST">
                                        {{ method_field('PUT') }}
                                        @csrf
                                        <div class="form-group">
                                            <label class="col-md-12">Nome</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line" name="name" value="{{ $user->name}} " required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="email" id="email" value="{{$user->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-password" class="col-md-12">Password</label>
                                            
                                            <div class="col-md-6">
                                                <input type="password" id="password" value="" class="form-control" name="password" >

                                            </div>
                                              <div class="col-md-4">
                                                <input type="text" id="label" value="" class="form-control" name="password" readonly>

                                                </div>
                                             
                                            </div>
                                         <div class="form-group">
                                               <div class="col-md-4">
                                                 <input id="random_password" name="random_password" value="true"
                                                        class="form-control" type="checkbox">
                                                <label for="random_password">random</label>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-12">Ruolo</label>
                                            <div class="col-sm-12">
                                                <select class="form-control form-control-line" name="role" required>
                                                    <option value="" disabled>Seleziona Ruolo</option>
                                                    @foreach ($roles as $item)
                                                    <option  value="{{$item->id}}">{{$item->slug}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success">Salva modifiche</button>
                                            </div>
                                        </div>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection



@push('script')
     {{-- <!-- This is data table -->
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
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script> --}}



<script>
    $('#random_password').change(function () {
        var randPassword = $(this).is(":checked");
        var value = makeid(8);
        if (randPassword) {
            $('#password').val(value);
            $('#label').val(value);
            $('#password').attr('readonly', 'readonly');
        } else {
            $('#password').val('');
            $('#label').val('');
            $('#password').removeAttr('readonly');
        }
        console.log(value);
    });

    function makeid(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }

</script>
@endpush


  <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url({{url('/')}}/assets/images/background/user-info.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="{{url('/')}}/assets/images/users/profile.png"  alt="user" /> </div>
                    <!-- User profile text-->
                     @guest
                            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">guest</a>
                        <div class="dropdown-menu animated flipInY">
                            
                        </div>
                    </div>
                          
                        @else
                     <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> {{ Auth::user()->name }}</a>
                        <div class="dropdown-menu animated flipInY">
                            <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                            <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <div class="dropdown-divider"></div> @include('widgets.logout')
                        </div>
                    </div>
                       @endguest
                   
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        {{-- <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html">Dashboard 1</a></li>

                            </ul>
                        </li> --}}
                        <li>
                            <a class=" waves-effect waves-dark" href="{{route('dashboard')}}" aria-expanded="false"><i class="mdi  mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                            {{-- <ul aria-expanded="false" class="collapse">
                                <li><a href="widget-apps.html">Widget Apps</a></li>
                                <li><a href="widget-data.html">Widget Data</a></li>
                                <li><a href="widget-charts.html">Widget Charts</a></li>
                            </ul> --}}
                        </li>
                       @role('admin')

                          <li>
                            <a class=" waves-effect waves-dark" href="{{route('customers.index')}}" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Customer</span></a>

                        </li>
                         <li>
                            <a class=" waves-effect waves-dark" href="{{route('courses.index')}}" aria-expanded="false"><i class="mdi mdi-file-chart"></i><span class="hide-menu">Corsi</span></a>

                        </li>
                         <li>
                            <a class=" waves-effect waves-dark" href="{{route('magazzino.index')}}" aria-expanded="false"><i class="mdi  mdi-buffer"></i><span class="hide-menu">Magazzino</span></a>

                        </li>
                         <li>
                            <a class=" waves-effect waves-dark" href="{{route('storage.index')}}" aria-expanded="false"><i class="mdi  mdi-buffer"></i><span class="hide-menu">Storage</span></a>

                        </li>
                          <li>
                            <a class=" waves-effect waves-dark" href="{{route('spese.index')}}" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Spese</span></a>

                        </li>
                          <li>
                            <a class=" waves-effect waves-dark" href="{{route('proposal.index')}}" aria-expanded="false"><i class="mdi  mdi-chart-line"></i><span class="hide-menu">Proposte</span></a>

                        </li>
                        <li>
                            <a class=" waves-effect waves-dark" href="{{route('classi.index')}}" aria-expanded="false"><i class="mdi mdi-flag-checkered"></i><span class="hide-menu">Classi</span></a>

                        </li>
                           <li>
                            <a class=" waves-effect waves-dark" href="{{route('calendar.index')}}" aria-expanded="false"><i class="mdi mdi-calendar-text"></i><span class="hide-menu">Calendario</span></a>

                        </li>
                        <li class="nav-devider"></li>
                        <li>
                            <a class=" waves-effect waves-dark" href="{{route('users.index')}}" aria-expanded="false"><i class="mdi  mdi-account-convert"></i><span class="hide-menu">Utenti</span></a>

                        </li>
                         <li>
                            <a class=" waves-effect waves-dark" href="{{route('settings.index')}}" aria-expanded="false"><i class="mdi  mdi-settings"></i><span class="hide-menu">Settings</span></a>

                        </li>
                        @endrole

                        {{-- <li class="nav-devider"></li>
                        <li class="nav-small-cap">FORMS, TABLE &amp; WIDGETS</li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Forms</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="form-basic.html">Basic Forms</a></li>
                                <li><a href="form-layout.html">Form Layouts</a></li>
                                <li><a href="form-addons.html">Form Addons</a></li>
                                <li><a href="form-material.html">Form Material</a></li>
                                <li><a href="form-float-input.html">Floating Lable</a></li>
                                <li><a href="form-pickers.html">Form Pickers</a></li>
                                <li><a href="form-upload.html">File Upload</a></li>
                                <li><a href="form-mask.html">Form Mask</a></li>
                                <li><a href="form-validation.html">Form Validation</a></li>
                                <li><a href="form-dropzone.html">File Dropzone</a></li>
                                <li><a href="form-icheck.html">Icheck control</a></li>
                                <li><a href="form-img-cropper.html">Image Cropper</a></li>
                                <li><a href="form-bootstrapwysihtml5.html">HTML5 Editor</a></li>
                                <li><a href="form-typehead.html">Form Typehead</a></li>
                                <li><a href="form-wizard.html">Form Wizard</a></li>
                                <li><a href="form-xeditable.html">Xeditable Editor</a></li>
                                <li><a href="form-summernote.html">Summernote Editor</a></li>
                                <li><a href="form-tinymce.html">Tinymce Editor</a></li>
                            </ul>
                        </li>--}}
                        @role('user')
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Tables</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="table-basic.html">Basic Tables</a></li>
                                <li><a href="table-layout.html">Table Layouts</a></li>
                                <li><a href="table-data-table.html">Data Tables</a></li>
                                <li><a href="table-footable.html">Footable</a></li>
                                <li><a href="table-jsgrid.html">Js Grid Table</a></li>
                                <li><a href="table-responsive.html">Responsive Table</a></li>
                                <li><a href="table-bootstrap.html">Bootstrap Tables</a></li>
                                <li><a href="table-editable-table.html">Editable Table</a></li>
                            </ul>
                        </li> 
                        @endrole


                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
            <a href="{{route('settings.index')}}" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
            <!-- End Bottom points-->
        </aside>

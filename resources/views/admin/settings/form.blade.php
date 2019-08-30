



                        <form action="{{ route('settings.update',1) }}" class="form" method="POST"  role="form" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">TITOLO GESTIONALE</label>
                                        <div class="col-10">
                                            <input type="hidden" name="id" value="{{$settings->id}}">
                                            <input class="form-control" type="text" value="{{$settings->titolo}}" name="titolo">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="display:flex;">
                                        <label for="example-search-input" class="col-2 col-form-label">LOGO</label>
                                        <div class="col-6">
                                            <input id="logo" type="file" class="form-control" name="logo">
                                        </div>
                                         <div class="col-4" >
                                            <img src="{{url('storage/').$settings->logo}}" alt="" width="130">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label">EMAIL</label>
                                        <div class="col-10">
                                            <input class="form-control" type="email" value="{{$settings->email}}" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-2 col-form-label">URL</label>
                                        <div class="col-10">
                                            <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
                                        <div class="col-10">
                                            <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-password-input" class="col-2 col-form-label">Password</label>
                                        <div class="col-10">
                                            <input class="form-control" type="password" value="hunter2" id="example-password-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-number-input" class="col-2 col-form-label">Number</label>
                                        <div class="col-10">
                                            <input class="form-control" type="number" value="42" id="example-number-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-datetime-local-input" class="col-2 col-form-label">Date and time</label>
                                        <div class="col-10">
                                            <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                        <div class="col-10">
                                            <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Month</label>
                                        <div class="col-10">
                                            <input class="form-control" type="month" value="2011-08" id="example-month-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-week-input" class="col-2 col-form-label">Week</label>
                                        <div class="col-10">
                                            <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-time-input" class="col-2 col-form-label">Time</label>
                                        <div class="col-10">
                                            <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Select</label>
                                        <div class="col-10">
                                            <select class="custom-select col-12" id="inlineFormCustomSelect">
                                                <option selected="">Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-2 col-form-label">Color</label>
                                        <div class="col-10">
                                            <input class="form-control" type="color" value="#563d7c" id="example-color-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-color-input" class="col-2 col-form-label">Input Range</label>
                                        <div class="col-10">
                                            <input type="range" class="form-control" id="range" value="50">
                                        </div>
                                    </div> --}}
                                       <button type="submit" class="btn btn-primary">Salva</button>
                                </form>
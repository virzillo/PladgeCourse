

<div class="modal fade show" id="crea-utente" tabindex="-1" role="dialog" aria-labelledby="crea-utenteLabel" style="display:none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="crea-utenteLabel">Crea Utente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                 <form method="POST" action="{{ route('users.index') }}">
                                @csrf
                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                    </div>
                    <div class="form-group">
                       <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                    </div>

                  
{{-- 
                     <div class="form-group">
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm Password">
                    </div> --}}
                       <div class="form-group">
                        <select name="role" id="role" class="form-control">
                              <option value="" selected data-default>Seleziona Ruolo</option>
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->slug}}</option>
                            @endforeach
                        </select>
                                        
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
                </form>

        </div>
    </div>
</div>
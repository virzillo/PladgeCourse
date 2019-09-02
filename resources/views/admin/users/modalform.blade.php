<div class="modal fade show" id="crea-utente" tabindex="-1" role="dialog" aria-labelledby="crea-utenteLabel"
    style="display:none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="crea-utenteLabel">Crea Utente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('users.index') }}">
                    @csrf
                    <div class="form-group">
                        <input id="name" type="text" class="form-control"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Nome">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control"
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" id="password" type="text"
                            class="form-control" name="password" required
                             placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                    </div>
                     <div class="form-group">
                            <input id="random_password" name="random_password" value="true"
                                    class="form-control" type="checkbox">
                            <label for="random_password">random</label>
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

@push('script')
    
<script>
    $('#random_password').change(function () {
        var randPassword = $(this).is(":checked");
        var value = makeid(8);
        if (randPassword) {
            $('#password').val(value);
            $('#password').attr('readonly', 'readonly');
        } else {
            $('#password').val('');
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

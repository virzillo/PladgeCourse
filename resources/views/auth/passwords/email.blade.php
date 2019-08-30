@extends('layouts.app')

@section('content')

<div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
    <div class="login-box card">
    <div class="card-body">
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

            <h3 class="box-title m-b-20">{{ __('Reset Password') }}</h3>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                </div>
            </div>
       
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"> {{ __('Send Password Reset Link') }}</button>
                </div>
            </div>

        </form>
    
    </div>
  </div>
</div>
@endsection

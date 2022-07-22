@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <div class="img">
                        <img src="https://cdn.discordapp.com/attachments/993428523693916180/997097060543254589/deliberboo-delivery-nero.png" alt="">
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{-- Email address --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Rimani collegato') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="login-button d-flex justify-content-center">
                            <button type="submit" class="  btn btn-outline-light ">
                                {{ __('Login') }}
                            </button> 
                        </div>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Hai dimenticato la password?') }}
                            </a>
                        @endif
                        

                            </div>



                        


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    :root {
  --col1: #3f1651;
  --col2: #653780;
  --col3: #9c3587;
  --col4: #e53f71;
  --col5: #f89f5b;
}
*{
    margin:0 ;
    padding:0 ;
    box-sizing: border-box;
}
    .card{
        background-color: var(--col2) !important;
        color: var(--col5) ;
    }
    input{
        color: var(--col5)
    }
    input[type="email"],input[type="password"] {
        background-color : var(--col5); 
    }
    button{
        /* background-color : var(--col5)!important;  */
    }
    .img{
        text-align: center
    }
.img img{
     height:150px;
     
}
   




</style>
@endsection

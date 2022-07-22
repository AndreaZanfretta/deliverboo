@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center debug">
        <div class="col-md-12">

            <div class="cards-container d-flex">

            <div class="card-text  mx-1">
                <img src="https://cdn.discordapp.com/attachments/993428523693916180/997097060543254589/deliberboo-delivery-nero.png" alt="logo">
             <p class="mx-5 d-flex  align-items-center h4">  Hai una fame che fa paura? Deliverboo e l applicazione che fa per te. ordina i tuoi cibi preferiti nei ristoranti che piu ami e noi te li porteremo a casa prima che tu possa dire boo! ...</p> 
            </div>
            
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="registerForm" data-parsley-validate>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante *') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-trigger="keyup" data-parsley-required-message="Il campo nome è obbligatorio" data-parsley-pattern-message="Inserisci un Nome valido" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-mail *') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" required data-parsley-type="email" data-parsley-trigger="keyup" data-parsley-required-message="Il campo email è obbligatorio" data-parsley-type-message="Inserisci un' email valida" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" required data-parsley-length="[8,16]" data-parsley-trigger="keyup" data-parsley-required-message="Il campo password è obbligatorio" data-parsley-length-message="Inserisci una password tra 8 e 16 caratteri" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required data-parsley-equalto="#password" data-parsley-trigger="keyup" data-parsley-required-message="il campo conferma password è obbligatorio" data-parsley-equalto-message="il campo non coincide" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="piva" class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva *') }}</label>

                            <div class="col-md-6">
                                <input id="piva" type="text" class="form-control @error('piva') is-invalid @enderror" required data-parsley-length='[11, 13]'data-parsley-trigger="keyup" data-parsley-required-message="Il campo Partita Iva è obbligatorio" data-parsley-length-message="Inserisci una Partita Iva Valida" name="piva" value="{{ old('piva') }}" required autocomplete="piva" autofocus>

                                @error('piva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo *') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" required data-parsley-trigger="keyup" name="address" data-parsley-required-message="Il campo Indirizzo è obbligatorio" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Categorie *</h5>
                            {{-- @foreach ($types as $type)
                                <div class="form-check-inline">
                                  <input type="checkbox" name="types[]" required data-parsley-mincheck='1' data-parsley-trigger="ready" data-parsley-errors-container="#error" data-parsley-required-message="Inserisci almeno una categoria"class="form-check-input @error('types') is-invalid @enderror" id="{{$type->slug}}" value="{{$type->id}}">
                                  <label class="form-check-label" for="{{$type->slug}}">{{$type->slug}}</label>
                                </div>
                            @endforeach --}}
                            <div id="error"></div>
                            @error('types')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Inserisci almeno una categoria!</strong>
                                    </span>
                                @enderror
                          </div>
                          <p>I campi segnati con * sono obbligatori</p>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn  btn-outline-light">
                                    {{ __('Register') }}
                                </button>

                                </div>

                            </div>
                        </div>
                    </form>
                </div>

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
.debug{
    border: 1px solid greenyellow;
}
.container{
    width:100%
}
.card {
    background-color: var(--col1);
    color: var(--col4);
    width:60%;
}
input[type="email"],input[type="password"],input[type="text"] {
        background-color : var(--col5); 
    }

    .card-text{
        width: 40%;
        color: var(--col5);
        background-color:var(--col2);
        text-align: center;
    }
    .card-text img{
        height: 200px
    }
</style>
@endsection

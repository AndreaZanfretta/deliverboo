@extends('layouts.app')

@section('content')

<form action="{{route('restaurant.products.store')}}" method="POST" enctype="multipart/form-data" id="registerForm" data-parsley-validate>
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome Prodotto*</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" required data-parsley-trigger="keyup" data-parsley-required-message="Il campo nome è obbligatorio" id="name" name="name" aria-describedby="name">
        @error('name')
            <div class="alert alert-danger">
                Inserisci un nome
            </div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Inserisci descrizione prodotto</label>
      <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    <div>
      <label for="price" class="form-label">Inserisci il prezzo del prodotto*</label><br>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">€</span>
      </div>
      <input type="text" class="form-control @error('price') is-invalid @enderror" required data-parsley-range="[0, 99]" data-parsley-errors-container="#error"  data-parsley-required-message="Inserisci un prezzo al prodotto" data-parsley-range-message="il costo del prodotto deve essere compreso tra 0 e 99€" id="price" name="price" aria-label="">
      @error('price')
          <div class="alert alert-danger">
              Inserisci un Prezzo
          </div>
      @enderror
      </div>
      <div id="error"></div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input"  id="visible" name="visible">
      <label class="form-check-label @error('visible') is-invalid @enderror" for="visible">Prodotto visibile?</label>
    </div>
    <div class="form-group @error('image') is-invalid @enderror">
        <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
        <label for="image">Aggiungi immagine</label>
        <input type="file" id="image" name="image" onchange="deliverboo.previewImage();">
    </div>
    <p>I campi con * sono obbligatori</p>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
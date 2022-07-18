@extends('layouts.app')

@section('content')
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title black" id="deleteModalLabel">Cancella il post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body black">
        Sei sicuro di voler eliminare il prodotto @{{productName}} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
        <button type="button" class="btn btn-danger" @@click="submitForm()">Cancella</button>
      </div>
    </div>
  </div>
</div>
<table class="table tablecolor table-striped-columns">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">ristorante</th>
        <th scope="col">Visibile</th>
        <th scope="col">Modifica</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <th scope="row">{{$product->id}}</th>
          <td><a href="{{route('restaurant.products.show', $product->id)}}">{{$product->name}}</a></td>
          <td>{{$product->user->name}}</td>
          <td>{{$product->visible ? 'si' : 'no'}}</td>
          <td><a href="{{route('restaurant.products.edit', $product->id)}}" class="btn btn-success">Modifica</a>
            <form action="{{route('restaurant.products.destroy', $product->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" @@click="openModal($event, {{$product}})" class="btn btn-danger delete">Cancella</button>
            </form>
            </td>
        </tr>
  </table>
  <div class="container">
  </div>
  <img src="{{ asset('storage/' . $product->image) }}" alt="">
  @endsection
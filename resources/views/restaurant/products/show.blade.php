@extends('layouts.app')

@section('content')

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
            <form action="{{route('restaurant.products.destroy', $product->id)}}" method="product">
                @csrf
                @method('DELETE')
                <button type="submit" @@click="openModal($event, {{$product->id}})" class="btn btn-danger delete">Cancella</button>
            </form>
            </td>
        </tr>
  </table>
  <div class="container">
  </div>
  <img src="{{ asset('storage/' . $product->image) }}" alt="">
  @endsection
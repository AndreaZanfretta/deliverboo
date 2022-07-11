@extends('layouts.app')

@section('content')
<a href="{{route('restaurant.products.create')}}" class="btn btn-primary">Aggiungi nuovo prodotto</a>
<table class="table tablecolor table-striped-columns">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Data Creazione</th>
        <th scope="col">Visibile</th>
        <th scope="col">Modifica</th>
      </tr>
    </thead>
    @foreach ($products as $product)
    <tbody>
        <tr>
          <th scope="row">{{$product->id}}</th>
          <td><a href="{{route('restaurant.products.show', $product->id)}}">{{$product->name}}</a></td>
          <td>{{$product->created_at}}</td>
          <td>{{$product->visible ? 'si' : 'no'}}</td>
          <td><a href="{{route('restaurant.products.edit', $product->id)}}" class="btn btn-success">Modifica</a>
            <form action="{{route('restaurant.products.destroy', $product->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"class="btn btn-danger delete">Cancella</button>
            </form>
            </td>
        </tr>
    @endforeach
  </table>
@endsection
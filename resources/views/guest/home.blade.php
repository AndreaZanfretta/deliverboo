@extends('layouts.app')

@section('content')
@guest
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('DeliveBoo') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (Route::has('register'))
                            <h2>Benvenuto! Registrati o accedi per poter iniziare a inserire prodotti</h2>
                        @endif
                        @else
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">{{ __('DeliveBoo') }}</div>
                    
                                        <div class="card-body">
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            <h2>Benvenuto  {{ Auth::user()->name }}!</h2>
                                            <a href="{{route('restaurant.products.index')}}">
                                            <div class="btn btn-info">Lista Prodotti</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endguest
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Riepilogo</div>
                    <div class="card-body text-center d-flex justify-content-center gap-3">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif  
                        <strong>{{ __('You are logged in!') }}</strong>
                        @if (!$restaurant)
                            <a href="{{ route('admin.restaurant.create') }}">Create</a>
                        @else
                            <span>Il tuo ristorante é: </span><span><strong><a
                                        href="{{ route('admin.restaurant.show', $restaurant) }}">{{ $restaurant->name }}</a></strong></span>
                        @endif
                        <a href="{{ route('admin.dishes.create') }}">Crezione piatto</a>
                        <a href="{{ route('admin.dishes.index') }}">i miei piatti</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

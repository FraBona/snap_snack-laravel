<style>

</style>


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
                    <div class="card-body align-items-center text-center d-flex justify-content-center gap-3">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                Bene! Sei loggato
                            </div>
                        @endif
                        <strong>Benvenuto Ristoratore ! </strong>
                        @if (!$restaurant)
                            <a class="btn btn-primary" href="{{ route('admin.restaurant.create') }}">Aggiungi il tuo
                                ristorante</a>
                        @else
                            <span>Il tuo ristorante é: </span><span><strong><a class="btn btn-info"
                                        href="{{ route('admin.restaurant.show', $restaurant) }}">{{ $restaurant->name }}</a></strong></span>
                        @endif
                        @if ($restaurant)
                            <a class="btn btn-success" href="{{ route('admin.dishes.create') }}">Crezione Piatto</a>
                            <a class="btn btn-warning" href="{{ route('admin.dishes.index') }}">Il Mio Menu</a>
                            <a class="btn btn-primary" href="{{ route('admin.orders.index') }}">I Miei Ordini</a>
                            <a class="btn btn-danger" href="{{ route('admin.stats.index') }}">Statistiche ordini</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

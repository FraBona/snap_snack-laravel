@extends('layouts.app')
@section('content')
    <section class="dish-show">
        <div class="container">
            <div class="dish-wrapper">
                <ul class="ul-resetted">
                    <li class="dish-title text-center mt-4"><strong>{{ $order->customer_name }}</strong></li>
                    <li class="text-center mt-4"><strong>{{ $order->customer_last_name  }}</strong></li>
                    <li class="text-center mt-4 mb-4"><strong>{{ $order->customer_address  }}</strong></li>
                    <li class="text-center mt-4 mb-4"><strong>{{ $order->customer_email  }}</strong></li>
                    <li class="text-center mt-4 mb-4"><strong>{{ $order->customer_phone  }}</strong></li>
                    <li class="text-center mt-4 mb-4"><strong>{{ $order->amount  }}</strong></li>
                    @foreach ($dishesWithQuantities as $dish)
                      <?php
                        $object = (object)$dish;
                      ?>
                      <li class="text-center mt-4 mb-4">Nome: {{$object->name}}</li>
                      <li class="text-center mt-4 mb-4">Quantita: {{$object->quantity}}</li>
                    @endforeach
                </ul>
                {{-- <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="post" id="{{$dish->name}}" class="dish-delete-alert">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Cancella"
                         class="btn btn-danger">
                </form>
                <a class="btn btn-primary" href="{{ route('admin.dishes.index') }}">Torna al tuo Menu dei Piatti</a> --}}
            </div>
        </div>
    </section>
@endsection
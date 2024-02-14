@extends('layouts.app')
@section('content')
    <section class="show-wrapper mt-5">
      <h2 class="text-center">
        Dettagli Dell' Ordine: N.{{$order->id }}
      </h2>
        <div class="container">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Data</th>
                        <th scope="col">Totale</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="ordine-row" id="show">
                        <th scope="row">1</th>
                        <td>{{ $order->customer_name }} {{ $order->customer_last_name }}</td>
                        <td>{{ $order->customer_address }}</td>
                        <td>{{ $order->customer_email }}</td>
                        <td>{{ $order->customer_phone }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $totalAmount }}&euro;</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
 
<style>
    .show-wrapper {
        display: flex;
        flex-direction: column;
        gap: 50px;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: calc(100vh - 200px);
    }
</style>
{{-- 
@foreach ($dishesWithQuantities as $dish)
                      <?php
                        $object = (object)$dish;
                      ?>
                      @if ($object->name === 'errore')
                        
                      @else
                        <li class="text-center mt-4 mb-4">Nome: {{$object->name->name}}</li>
                        <li class="text-center mt-4 mb-4">Quantita: {{$object->quantity}}</li>
                      @endif
                    @endforeach --}}
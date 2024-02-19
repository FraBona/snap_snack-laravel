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
            <div class="row justify-content-center">
              @foreach ($dishesWithQuantities as $dish)
                  @if ($dish['quantity'] > 0)
                      @for ($i = 0; $i < $dish['quantity']; $i++)
                          <div class="dish-wrapper col-3 gap-3 mt-4">
                              <?php $object = (object) $dish; ?>
                              @if ($object->name !== 'errore')
                                  @if ($object->name->photo)
                                      <img class="img-dish mt-5" src="{{ asset('storage/' . $object->name->photo) }}" alt="">
                                  @endif
                                  <h4>Nome: <span class="text-danger">{{ $object->name->name }}</span></h4>
                                  <h4>Quantita: <span class="text-danger">{{ $object->quantity }}</span></h4>
                              @endif
                          </div>
                      @endfor
                  @endif
              @endforeach
          </div>
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
    .dish-wrapper {
        background-color: white;
        min-width: 200px;
        max-width: 600px;
        padding: 20px;
        display: flex;
        margin: 20px;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border-radius: 1rem ;
        box-shadow: rgba(128, 128, 128, 0.44) -6px -6px 6px -6px;
    }
    .img-dish {
        min-width: 200px;
        min-height: 150px;
        max-width: 200px;
        max-height: 150px;
        object-fit: cover;
        border-radius: 1rem;
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
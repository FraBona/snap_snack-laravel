@extends('layouts.app')
@section('content')
<section class="order-wrapper">
  <div class="container">
    <div class="row">
      @foreach ($orders as $order)
        <div class="col-md-12 ">
          <ul class="d-flex gap-2 ul-ordini justify-content-center">
            <li>Nome: {{$order->customer_name}}</li>
            <li>Cognome: {{$order->customer_last_name}}</li>
            <li>Email: {{$order->customer_email}}</li>
            <li>Indirizzo: {{$order->customer_address}}</li>
            <li>Telefono: {{$order->customer_phone}}</li>
            <li>Totale: {{$order->amount}}</li>
          </ul>
        </div>
    @endforeach
    </div>
  </div>
</section>
@endsection

<style>
  .ul-ordini{
    list-style: none;
  }

  .order-wrapper{
    display: flex;
    justify-content: center;
    align-items: center; 
    width: 100%;
    height: calc(100vh - 200px);
  }

  .ul-ordini > li{
    text-align: center;
  }
</style>
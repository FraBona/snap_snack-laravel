@extends('layouts.app')
@section('content')
<section class="order-wrapper mt-5">
  <div class="container">
    <div class="row gy-3 gap-3 flex-wrap justify-content-center">
      @foreach ($orderAmount as $order)
      <?php
        $object = (object)$order;
      ?>
      <a href="{{route ('admin.orders.show', $order)}}" class="col-md-3 py-4 ancor-order">
        <div class="">
          <ul class="d-flex flex-column gap-2 ul-ordini justify-content-center">
            <li class="d-flex"><strong>Nome: </strong> {{$object->order->customer_name}}</li>
            <li class="d-flex"><strong>Cognome: </strong> {{$object->order->customer_last_name}}</li>
            <li class="d-flex"><strong>Email: </strong> {{$object->order->customer_email}}</li>
            <li class="d-flex"><strong>Indirizzo: </strong> {{$object->order->customer_address}}</li>
            <li class="d-flex"><strong>Telefono: </strong> {{$object->order->customer_phone}}</li>
            <li class="d-flex"><strong>Totale: </strong> {{$object->amount}} &euro;</li>
          </ul>
        </div>
      </a>
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
  }

  .ul-ordini > li{
    display: flex;
    justify-content: space-between
  }

  .col-md-3{
    background-color: white;
    border-radius: 1rem;
    
  }

  .col-md-3:hover{
    border: 1px solid black;
    cursor: pointer;
  }

  .ancor-order{
    text-decoration: none;
    color: black;
  }

  .ancor-order:link{
    text-decoration: none;
  }
  .ancor-order:visited{
    text-decoration: none;
  }

  .ancor-order:hover{
    text-decoration: none;
  }
</style>
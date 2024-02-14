
@extends('layouts.app')
@section('content')
    <h2 class="text-center pt-5">
        I miei Ordini
    </h2>
    <section class="order-wrapper mt-5">
        <div class="container">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Data</th>
                        <th scope="col">Totale</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    {{-- @dd($order) --}}
                    <?php
                      $object = (object)$order;
                    ?>
                        <tr class="ordine-row" id="show"
                            onclick="redirectShow('{{ route('admin.orders.show', $order) }}')">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $object->customer_name }} {{ $order->customer_last_name }}</td>
                            <td>{{ $object->customer_address }}</td>
                            <td>{{$object->created_at}}</td>
                            <td>{{ $object->amount }} &euro;</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
 
<style>
    .order-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
 
    .thead {
        background-color: #212529;
    }
 
    .ordine-row:hover {
        transform: scale(1.03);
        cursor: pointer;
    }
</style>
 
 
<script>
    function redirectShow(destinationPage) {
        window.location.href = destinationPage
    }
</script>
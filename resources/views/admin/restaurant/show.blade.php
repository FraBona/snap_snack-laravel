@extends('layouts.app')
@section('content')

<style >
  img {
    max-width: 150px;
    max-height:150px;
    border-radius: 1rem;
  }
.restaurant-show {
  display: flex;
  justify-content: center;
  align-items: center;
}
.infos {
    padding: 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
    gap: 6px;
  }

.restaurant-card {
  background-color: white;
  width: 400px;
  border-radius: 2rem;
  box-shadow: rgba(128, 128, 128, 0.44) -6px -6px 6px -6px ;
}
.rest-ul {
  padding-right: 2rem;
}
</style>
@dd($restaurant)
<section class="restaurant-show py-4">
  <div class="restaurant-card">
    <ul class=" py-5 rest-ul d-flex flex-column justify-content-center align-items-center gap-4">
      @if ($restaurant->photo)
        <li><img class="w-100" src="{{asset('storage/' . $restaurant->photo)}}" alt="photo-restaurant"></li>
      @endif
        <li class="infos">Il nome del tuo ristorante é: <strong>{{$restaurant->name}}</strong></li>
        <li class="infos">L'Indirizzo del tuo ristorante é: <strong>{{$restaurant->address}}</strong></li>
        <li class="infos">Il numero del tuo ristorante é: <strong>{{$restaurant->phone_number}}</strong></li>
        <li class="infos">La partita iva del tuo ristorante é: <strong>{{$restaurant->vat}}</strong></li>
        <ul class="d-flex gap-2 ps-0">
            @foreach ($restaurant->categories as $category)
              <li class="badge rounded-pill text-bg-primary">{{$category->name}}</li>
            @endforeach
          </ul>
        <a href="{{route('admin.dashboard')}}">Home</a>
    </ul>
  </div>
</section>
</html>
@endsection


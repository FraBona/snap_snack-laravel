@extends('layouts.app')
@section('content')

<style >
img {
    max-width: 150px;
    max-height:150px;
    border-radius: 1rem;
}
.restaurant-img {
    min-width: 200px;
    min-height:150px;
    max-width: 200px;
    max-height: 150px;
    object-fit: cover;
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

.a-home {
  list-style: none;
  text-decoration: none;
  color: white;
}
</style>

<section class="restaurant-show py-4">
  <div class="restaurant-card">
    <ul class=" py-5 rest-ul d-flex flex-column justify-content-center align-items-center gap-4">
      @if ($restaurant->photo)
        <li><img class="restaurant-img" src="{{asset('storage/' . $restaurant->photo)}}" alt="photo-restaurant"></li>
      @endif
        <li class="infos"><strong>Il nome del tuo ristorante é: </strong> {{$restaurant->name}}</li>    
        <li class="infos"><strong>L'Indirizzo del tuo ristorante é: </strong>{{$restaurant->address}}</li>
        <li class="infos"><strong>Il numero del tuo ristorante é:</strong> {{$restaurant->phone_number}}</li>
        <li class="infos"><strong>La partita iva del tuo ristorante é:</strong> {{$restaurant->vat}}</li>
        <a class="a-home btn btn-primary" href="{{route('admin.dashboard')}}">Home</a>
    </ul>
  </div>
</section>
</html>
@endsection


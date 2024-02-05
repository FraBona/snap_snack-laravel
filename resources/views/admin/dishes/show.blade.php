<style>
    .img-dish {
        min-width: 200px;
        min-height: 150px;
        max-width: 200px;
        max-height: 150px;
        object-fit: cover;
        border-radius: 1rem;
    }

    .dish-title {
      font-size: 24px;
      font-weight: 800;
    }
</style>
@extends('layouts.app')
@section('content')
    <div class="container">
      <img class="img-dish mt-5" src="{{ asset('storage/' . $dish->photo) }}" alt="photo-restaurant">
      <ul>
        <li class="dish-title"><strong>{{ $dish->name }}</strong></li>
        <li><strong>{{ $dish->description }}</strong></li>
        <li><strong>{{ $dish->price }}</strong></li>
      </ul>
      <form action="{{ route('admin.dishes.destroy', $dish) }}" method="post">
          @csrf
          @method('DELETE')
  
          <input class="btn btn-danger" type="submit" value="Delete"
              onclick="return confirm('are you sure you want delete this item')" class="btn btn-danger">
      </form>
      <a class="btn btn-primary" href="{{ route('admin.dishes.index') }}">Torna alla home page dei Piatti</a>
    </div>

@endsection

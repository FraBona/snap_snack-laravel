<img class="w-100" src="{{asset('storage/' . $dish->photo)}}" alt="photo-restaurant">
<h1>{{$dish->name}}</h1>
<h1>{{$dish->description}}</h1>
<h1>{{$dish->price}}</h1>

<form action="{{route('admin.dishes.destroy', $dish)}}" method="post">
  @csrf
  @method('DELETE')

  <input type="submit" value="delete" onclick="return confirm('are you sure you want delete this item')" class="btn btn-danger">
</form>
<a href="{{route('admin.dishes.index')}}">Torna alla home page dei piatti</a>
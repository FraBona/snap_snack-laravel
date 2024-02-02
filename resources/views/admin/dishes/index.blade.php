<a href="{{route('admin.dishes.create')}}">Crezione piatto</a><br>
@foreach ($dishes as $dish)
  <a href="{{route('admin.dishes.show',$dish)}}">{{$dish->name}}</a>
  <p>{{$dish->description}}</p>
  <p>{{$dish->price}}</p>
  <a href="{{route('admin.dishes.edit',$dish)}}">Modifica il piatto</a>
  <form action="{{route('admin.dishes.destroy', $dish)}}" method="post">
    @csrf
    @method('DELETE')
  
    <input type="submit" value="delete" onclick="return confirm('are you sure you want delete this item')" class="btn btn-danger">
  </form>
  
@endforeach
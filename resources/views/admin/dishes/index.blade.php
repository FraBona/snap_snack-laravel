@foreach ($dishes as $dish)
  <a href="{{route('admin.dishes.show',$dish)}}">{{$dish->name}}</a>
  
@endforeach
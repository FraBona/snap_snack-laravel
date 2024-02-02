<h1>edit</h1>
<form action="{{route('admin.dishes.update', $dish)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <label for="name">Nome piatto</label>
  <input type="text" id="name" name="name" required value="{{$dish->name}}">
  <label for="description">Descrizione piatto</label>
  <textarea name="description" id="description" cols="30" rows="10">{{$dish->description}}</textarea>
  <label for="price">Prezzo piatto</label>
  <input type="number" step="0.1" name="price" id="price" required value="{{$dish->price}}">
  <label for="">Inserici foto</label>
  <input type="file" name="photo" id="photo" value="{{$dish->photo}}">

  <input type="submit" value="invia">
</form>

<div class="row">
  @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
</div>
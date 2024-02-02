<form action="{{route('admin.dishes.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <label for="name">Nome piatto</label>
  <input type="text" id="name" name="name" required>
  <label for="description">Descrizione piatto</label>
  <textarea name="description" id="description" cols="30" rows="10"></textarea>
  <label for="price">Prezzo piatto</label>
  <input type="number" step="0.1" name="price" id="price" required>
  <label for="">Inserici foto</label>
  <input type="file" name="photo" id="photo" >

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
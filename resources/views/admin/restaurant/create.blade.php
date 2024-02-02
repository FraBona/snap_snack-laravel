@if (!($restaurant))
<div class="form">
  <form action="{{route('admin.restaurant.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <label for="name">Name</label>
      <input type="text" id="name" name="name" class="form-control">
      <label for="address">Address</label>
      <input type="text" id="address" name="address" class="form-control">
      <label for="phone_number">Phone Number</label>
      <input type="text" id="phone_number" name="phone_number" class="form-control">
      <label for="vat">Vat</label>
      <input type="text" id="vat" name="vat" class="form-control">
      <label for="photo">Photo</label>
      <input type="file" name="photo" id="photo" class="form-control">
      @foreach ($categories as $category)
              <div class="form-check">
                <input type="checkbox" class="form-check-input" value="{{$category->id}}" name="category[]" id="category-{{$category->id}}" @checked(in_array($category->id, old('categories',[])))>
                <label for="category-{{$category->id}}" class="form-check-label">{{$category->name}}</label>
              </div>
            @endforeach


      <input type="submit" value="Submit">
  </form>
</div>
@endif

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

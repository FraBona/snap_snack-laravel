<div class="form">
  <form action="{{route('dashboard')}}" method="post">
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

      <input type="submit" value="Submit">
  </form>
</div>
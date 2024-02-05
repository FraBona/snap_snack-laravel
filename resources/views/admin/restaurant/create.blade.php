<style>
    body {
        background-color: #F5DEB3;
    }

    .container {
        max-width: 1000px;
    }

    .center-content {
        height: calc(100vh - 76px);
        display: flex;
        justify-content: center;
        align-items: center;


    }
</style>
@extends('layouts.app')
@section('content')
    <div class="center-content">
        @if (!$restaurant)
            <div class="container center-content p-2">
                <form class="form row py-2 g-3 justify-content-center" action="{{ route('admin.restaurant.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-6 col-md-6">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" id="name" name="name" class="form-control" value="{{Request::old('name')}}" required>
                    </div>
                    <div class="col-6 col-md-6">
                        <label for="address">Address</label>
                        <input class="form-control" type="text" id="address" name="address" class="form-control" value="{{Request::old('address')}}" required>
                    </div>
                    <div class="col-4 col-md-12">
                        <label for="phone_number">Phone Number</label>
                        <input class="form-control" type="text" id="phone_number" name="phone_number"
                            class="form-control" value="{{Request::old('phone_number')}}" required>
                    </div>
                    <div class="col-3 col-md-6">
                        <label for="vat">Vat</label>
                        <input class="form-control" type="text" id="vat" name="vat" class="form-control" value="{{Request::old('vat')}}" required>
                    </div>
                    <div class="col-5 col-md-6">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control" value="{{Request::old('photo')}}">
                    </div>
                    <div class="mt-5">
                        <span class="text-center "><strong>
                            Consigliabile scegliere almeno una delle seguenti categorie per una corretta indicizzazione del ristorante:
                            </strong></span>
                    </div>
                    <div class="col-md-12  d-flex flex-wrap gap-3 ">
                         @foreach ($categories as $category)
                            <div class="form-check ">
                                <input type="checkbox" class="form-check-input" value="{{ $category->id }}"
                                    name="category[]" id="category-{{ $category->id }}" @checked(in_array($category->id, old('categories', [])))>
                                <label for="category-{{ $category->id }}"
                                    class="form-check-label">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <input class="btn btn-success w-25 mt-4" type="submit" value="Submit">
                    </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </form>
            </div>
        @endif
    </div>




@endsection

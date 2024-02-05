@extends('layouts.app')
@section('content')

    <h2 class="text-center mt-5">Modifica il tuo Piatto:</h2>
    <div class="container">
        <form class="form py-5 row g-3 justify-content-center" action="{{ route('admin.dishes.update', $dish) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <label for="name">Nome piatto</label>
                <input class="form-control" type="text" id="name" name="name" required value="{{ $dish->name }}">
            </div>
            <div class="col-md-12">
                <label for="description">Descrizione piatto</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $dish->description }}</textarea>
            </div>
            <div class="col-md-12">
                <label for="price">Prezzo piatto</label>
                <input class="form-control" type="number" step="0.1" name="price" id="price" required
                    value="{{ $dish->price }}">
            </div>
            <div class="col-md-12">
                <label for="">Inserici la Foto</label>
                <input class="form-control" type="file" name="photo" id="photo" value="{{ $dish->photo }}">
            </div>
            <input class="btn btn-success w-25 mt-5" type="submit" value="Modifica">

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

@endsection

<style>
    body {
        background-color: #F5DEB3;
    }

    .container {
        max-width: 1000px;
    }

    .center-content {
        height: calc(100vh - 80px);
        display: flex;
        justify-content: center;
        align-items: center;
    }    
</style>

@extends('layouts.app')
@section('content')
<section class="center-content">
    <div class="container">
        <form class="form py-5 row g-3 justify-content-center" action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="name">Nome piatto</label>
                <input class="form-control" type="text" id="name" name="name"  value="{{Request::old('name')}}" required>
            </div>
    
            <div class="col-md-6">
                <label for="price">Prezzo piatto</label>
                <input class="form-control" type="number" step="0.1" name="price" id="price" value="{{Request::old('price')}}" required>
            </div>
            <div class="col-md-12">
                <label for="description">Descrizione piatto</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10" value="{{Request::old('description')}}" ></textarea>
            </div>
            <div class="col-md-12">
                {{-- <label for="photo">Aggiungi Foto</label> --}}
                <input class="form-control" type="file" name="photo" id="photo" value="{{Request::old('photo')}}">
            </div>
            <input class="btn btn-success w-25 mt-5" type="submit" value="Invia">
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
</section>

@endsection

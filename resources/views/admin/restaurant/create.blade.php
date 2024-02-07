<style>
    body {
        background-color: #F5DEB3;
    }

    .container {
        max-width: 1000px;
    }

    .center-content {

        height: calc(100vh - 70px);

        display: flex;
        justify-content: center;
        align-items: center;


    }

    .color-red {
        color: red
    }
</style>
@extends('layouts.app')
@section('content')
    <div class="center-content">
        @if (!$restaurant)
            <div class="container center-content p-2">
                <form id="restaurant-form" class="form row py-2 g-3 justify-content-center"
                    action="{{ route('admin.restaurant.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-6 col-md-6">
                        <label for="name">Nome *</label>
                        <input class="form-control" type="text" id="name" name="name" class="form-control"
                            value="{{ Request::old('name') }}" >
                        <span class="color-red" id="name-error"></span>
                    </div>
                    <div class="col-6 col-md-6">
                        <label for="address">Indirizzo *</label>
                        <input class="form-control" type="text" id="address" name="address" class="form-control"
                            value="{{ Request::old('address') }}" >
                    </div>
                    <div class="col-4 col-md-12">
                        <label for="phone_number">Numero di Telefono *</label>
                        <input class="form-control" type="text" id="phone_number" name="phone_number"
                            class="form-control" value="{{ Request::old('phone_number') }}" >
                    </div>
                    <div class="col-3 col-md-6">
                        <label for="vat">Vat *</label>
                        <input class="form-control" type="text" id="vat" name="vat" class="form-control"
                            value="{{ Request::old('vat') }}" >
                    </div>
                    <div class="col-5 col-md-6">
                        <label for="photo">Foto</label>
                        <input type="file" name="photo" id="photo" class="form-control"
                            value="{{ Request::old('photo') }}">
                    </div>
                    <div class="col-md-12  d-flex flex-wrap gap-3 mt-4">
                        <span>Categorie del Ristorante *</span>
                        @foreach ($categories as $category)
                            <div class="form-check ">
                                <input type="checkbox" class="form-check-input" value="{{ $category->id }}"
                                    name="category[]" id="category-{{ $category->id }}" @checked(in_array($category->id, old('categories', [])))>
                                <label for="category-{{ $category->id }}"
                                    class="form-check-label">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="info-wrapper">
                        <h5>I campi con il simbolo * sono obbligatori</h5>
                    </div>
                    <div>
                        <input class="btn btn-success w-25 mt-4" type="submit" value="Crea">
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

    <script async>
        document.getElementById('restaurant-form').addEventListener('submit', function(event) {
            let name = document.getElementById('name').value.trim();
            let nameError = document.getElementById('name-error');
            let errors = false;

            // Validazione del nome (esempio)
            if (name === '') {
                nameError.textContent = 'Il nome del ristorante è obbligatorio';
                errors = true;
            } else {
                nameError.textContent = '';
            }

            // Impedisci l'invio del form se ci sono errori
            if (errors) {
                event.preventDefault();
            }
        });
    </script>



@endsection

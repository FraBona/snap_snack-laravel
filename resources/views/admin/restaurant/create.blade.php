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
                            value="{{ Request::old('name') }}">
                        <span class="color-red" id="name_error"></span>
                    </div>
                    <div class="col-6 col-md-6">
                        <label for="address">Indirizzo *</label>
                        <input class="form-control" type="text" id="address" name="address" class="form-control"
                            value="{{ Request::old('address') }}">
                            <span class="color-red" id="address_error"></span>
                    </div>
                    <div class="col-4 col-md-12">
                        <label for="phone_number">Numero di Telefono *</label>
                        <input class="form-control" type="text" id="phone_number" name="phone_number"
                            class="form-control" value="{{ Request::old('phone_number') }}">
                            <span class="color-red" id="phone_number_error"></span>
                    </div>
                    <div class="col-3 col-md-6">
                        <label for="vat">Vat *</label>
                        <input class="form-control" type="text" id="vat" name="vat" class="form-control"
                            value="{{ Request::old('vat') }}">
                            <span class="color-red" id="vat_error"></span>
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
        // aggancio la funzione al form : 
        document.getElementById('restaurant-form').addEventListener('submit', function(event) {

            // recupero gli elementi del DOM : 

            let name = document.getElementById('name').value.trim();
            let address = document.getElementById('address').value.trim();
            let phone_number = document.getElementById('phone_number').value.trim();
            let vat = document.getElementById('vat').value.trim();

            // recupero gli span di errore 
            let name_error = document.getElementById('name-error');
            let address_error = document.getElementById('address_error');
            let phone_number_error =  document.getElementById('phone_number_error');
            let vat_error =  document.getElementById('phone_number_error');
            // inizzializzo l'errore a false : 
            let errors = false;

            // Validations : 

            if (name === '' || name.length < 3 || name.length > 30 || !isNumber(name)) {
                name_error.textContent = 'Assicurati di inserire un Nome valido';
                errors = true;
            } else {
                nameError.textContent = '';
            }
            if (address === '' || address.length < 10 || address.length > 30 || !isNumber(address)) {
                address_error.textContent = 'Inserisci un Indirizzo valido';
                errors = true;
            } else {
                address_error.textContent = '';
            }
            if (phone_number === '' || phone_number.length < 9 || phone_number.length > 10 || !(phone_number.matches(
                    "[0-9]+"))) {
                phone_number_error.textContent = 'Assicurati di inserire un Telefono valido';
                errors = true;
            } else {
                phone_number_error.textContent = '';
            }

            if (vat === ''|| vat != 11 || !(vat.matches(
                    "[0-9]+")) ) {
                vat_error.textContent = 'Inserisci la descrizione';
                errors = true;
            } else {
                vat_error.textContent = '';
            }

            // Impedisci l'invio del form se ci sono errori
            if (errors) {
                event.preventDefault();
            }
        });
    </script>



@endsection

<style>
    body {
        background-color: #F5DEB3;
    }

    .container {
        max-width: 1000px;
    }

    .center-content {
        /* height: calc(100vh - 200px); */
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;

        max-width: 1000px;
        margin: 0 auto;

    }
    .color-red {
        color: red
    }
</style>
@extends('layouts.app')
@section('content')
<div>
<h2 class="text-center mt-4">
    Inscerisci il tuo Ristorante in SnapSnack
</h2>
</div>
    <div class="center-content">
        @if (!$restaurant)
            <div class="container  p-2">
                <form class="form row py-2 g-3 justify-content-center" action="{{ route('admin.restaurant.store') }}"
                    method="post" enctype="multipart/form-data" id="restaurantForm">
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
                    <div class="col-6 col-md-12">
                        <label for="phone_number">Numero di Telefono *</label>
                        <input class="form-control" type="text" id="phone_number" name="phone_number"
                            class="form-control" value="{{ Request::old('phone_number') }}">
                        <span class="color-red" id="phone_number_error"></span>
                    </div>
                    <div class="col-6 col-md-6">
                        <label for="vat">P.Iva *</label>
                        <input class="form-control" type="text" id="vat" name="vat" class="form-control"
                            value="{{ Request::old('vat') }}">
                        <span class="color-red" id="vat_error"></span>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="photo">Foto</label>
                        <input type="file" name="photo" id="photo" class="form-control"
                            value="{{ Request::old('photo') }}">
                    </div>
                    <div class="col-12 col-md-12">
                        <label for="description">Descrizione</label>
                        <textarea class="form-control" name="description" id="description" cols="12" rows="3" value="{{Request::old('description')}}" ></textarea>
                        <span class="color-red" id="description_error"></span>
                    </div>
                    <div class="col-md-12  d-flex flex-wrap gap-3 mt-4">
                        <span>Categorie del Ristorante *</span>
                        <span class="color-red" id="checkbox_error">
                        </span>
                        @foreach ($categories as $category)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkboxes" value="{{ $category->id }}"
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
        document.getElementById('restaurantForm').addEventListener('submit', function(event) {

            // recupero gli elementi del DOM :

            let name = document.getElementById('name').value.trim();
            let address = document.getElementById('address').value.trim();
            let phone_number = document.getElementById('phone_number').value.trim();
            let vat = document.getElementById('vat').value.trim();
            let inputs = document.querySelectorAll('.checkboxes');
            let description = document.getElementById('description').value.trim();

            let isOneChecked = Array.from(inputs).some(function(input) {
                return input.checked;
            });

            // recupero gli span di errore
            let name_error = document.getElementById('name_error');
            let address_error = document.getElementById('address_error');
            let phone_number_error = document.getElementById('phone_number_error');
            let vat_error = document.getElementById('vat_error');
            let checkbox_error = document.getElementById('checkbox_error');
            let description_error = document.getElementById('description_error');
            // inizzializzo l'errore a false :
            let errors = false;


            function isOnlyNumber(item) {
                return !isNaN(Number(item));
            }

            // Validations :

            if (name === '' || name.length < 3 || name.length > 30 || isOnlyNumber(name)) {
                name_error.textContent = 'Assicurati di inserire un Nome valido';
                errors = true;
            } else {
                name_error.textContent = '';
            }
            if (address === '' || address.length < 10 || address.length > 60 || isOnlyNumber(address)) {
                address_error.textContent = 'Inserisci un Indirizzo valido';
                errors = true;
            } else {
                address_error.textContent = '';
            }
            if (phone_number === '' || phone_number.length < 9 || phone_number.length > 10 || !isOnlyNumber(
                    phone_number)) {
                phone_number_error.textContent = 'Assicurati di inserire un Telefono valido';
                errors = true;
            } else {
                phone_number_error.textContent = '';
            }

            if (vat === '' || vat.length < 11 || vat.length > 11 || !isOnlyNumber(vat)) {
                vat_error.textContent = 'Inserisci un Vat valido';
                errors = true;
            } else {
                vat_error.textContent = '';
            }
            if (!isOneChecked) {
                checkbox_error.textContent = 'Scegli almeno una Categoria';
                errors = true;
            }else {
                checkbox_error.textContent = '';
            }
            if (description.length > 255  ) {
               description_error.textContent = 'Inserisci una Descrizione Valida';
                errors = true;
            } else {
                description_error.textContent = '';
            }
        // Impedisci l'invio del form se ci sono errori
            if (errors) {
                event.preventDefault();
            }

        });
    </script>



@endsection

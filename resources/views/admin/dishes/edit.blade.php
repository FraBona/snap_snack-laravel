<style>
.color-red {
        color: red
    }
</style>
@extends('layouts.app')
@section('content')

    <h2 class="text-center mt-5">Modifica il tuo Piatto:</h2>
    <div class="container">
        <form class="form py-5 row g-3 justify-content-center" action="{{ route('admin.dishes.update', $dish) }}"
            method="post" enctype="multipart/form-data" id="form-edit">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <label for="name">Nome piatto *</label>
                <input class="form-control" type="text" id="name" name="name"  value="{{ $dish->name }}">
                <span class="color-red" id="name-error"></span>
            </div>
            <div class="col-md-12">
                <label for="description">Descrizione piatto *</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $dish->description }}</textarea>
                <span class="color-red" id="description-error"></span>
            </div>
            <div class="col-md-12">
                <label for="price">Prezzo piatto *</label>
                <input class="form-control" type="number" step="0.1" name="price" id="price"
                    value="{{ $dish->price }}">
                    <span class="color-red" id="price-error"></span>
            </div>
            <div class="col-md-12">
                <label>Inserici la Foto *</label>
                <input class="form-control" type="file" name="photo" id="photo" value="{{ $dish->photo }}">
            </div>
            <div class="info-wrapper">
                <h5>I campi con il simbolo * sono obbligatori</h5>
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
    <script async>
        document.getElementById('form-edit').addEventListener('submit', function(event) {
            let name = document.getElementById('name').value.trim();
            let nameError = document.getElementById('name-error');
            let price = document.getElementById('price').value;
            let priceError = document.getElementById('price-error');
            let description = document.getElementById('description').value.trim();
            let descriptionError = document.getElementById('description-error');
            let errors = false;
    
    
            // Validazione del nome (esempio)
            if (name === '') {
                nameError.textContent = 'Inserisci il nome del ristorante';
                errors = true;
            } else {
                nameError.textContent = '';
            }
    
            if (price === '') {
                priceError.textContent = 'Inserisci il prezzo al piatto';
                errors = true;
            } else {
                price.textContent = '';
            }
    
            if (description === '') {
                descriptionError.textContent = 'Inserisci la descrizione';
                errors = true;
            } else {
                description.textContent = '';
            }
            // Impedisci l'invio del form se ci sono errori
            if (errors) {
                event.preventDefault();
            }
        });
    </script>
    

@endsection

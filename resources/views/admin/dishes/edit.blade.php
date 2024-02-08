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
            method="post" enctype="multipart/form-data" id="dish_form_edit">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <label for="name">Nome piatto *</label>
                <input class="form-control" type="text" id="name" name="name"  value="{{ $dish->name }}">
                <span class="color-red" id="name_error"></span>
            </div>
            <div class="col-md-12">
                <label for="description">Descrizione piatto *</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $dish->description }}</textarea>
                <span class="color-red" id="description_error"></span>
            </div>
            <div class="col-md-12">
                <label for="price">Prezzo piatto *</label>
                <input class="form-control" type="number" step="0.1" name="price" id="price"
                    value="{{ $dish->price }}">
                    <span class="color-red" id="price_error"></span>
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
        // aggancio la funzione al form : 
        document.getElementById('dish_form_edit').addEventListener('submit', function(event) {
    
            // recupero gli elementi del DOM : 
            
            let name = document.getElementById('name').value.trim();
            let price = document.getElementById('price').value.trim();
            let description = document.getElementById('description').value.trim();
           
            // recupero gli span di errore 
            let name_error = document.getElementById('name_error');
            let price_error = document.getElementById('price_error');
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
            if (price === '' || price.toString().length < 1 || price.toString().length > 6 || !isOnlyNumber(price) || price < 0.5 ) {
                price_error.textContent = 'Inserisci un Prezzo valido';
                errors = true;
            } else {
                price_error.textContent = '';
            }
            if (description === ''|| description.length < 10 || description.length > 255) {
                    description_error.textContent = 'Assicurati di inserire una Descrizione valida';
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

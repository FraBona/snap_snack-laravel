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
    .color-red {
        color: red
    }
</style>

@extends('layouts.app')
@section('content')
<section class="center-content">
    <div class="container">
        <form class="form py-5 row g-3 justify-content-center" action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data" id="dish_form">
            @csrf
            <div class="col-md-6">
                <label for="name">Nome piatto *</label>
                <input class="form-control" type="text" id="name" name="name"  value="{{Request::old('name')}}" >
                <span class="color-red" id="name_error"></span>
            </div>
    
            <div class="col-md-6">
                <label for="price">Prezzo piatto *</label>
                <input class="form-control" type="number" step="0.1" name="price" id="price" value="{{Request::old('price')}}" >
                <span class="color-red" id="price_error"></span>
            </div>
            <div class="col-md-12">
                <label for="description">Descrizione piatto *</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10" value="{{Request::old('description')}}" ></textarea>
                <span class="color-red" id="description_error"></span>
            </div>
            <div class="col-md-12">
                {{-- <label for="photo">Aggiungi Foto</label> --}}
                <input class="form-control" type="file" name="photo" id="photo" value="{{Request::old('photo')}}">
            </div>
            <div class="info-wrapper">
                <h5>I campi con il simbolo * sono obbligatori</h5>
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

<script async>
    // aggancio la funzione al form : 
    document.getElementById('dish_form').addEventListener('submit', function(event) {

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
        if (price === '' || price.toString().length < 1 || price.toString().length > 6 || !isOnlyNumber(price)) {
            price_error.textContent = 'Inserisci un Prezzo valido';
            errors = true;
        } else {
            price_error.textContent = '';
        }
        if (description === '' || description.length < 11 || description.length > 255 || !isOnlyNumber(
            description)) {
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

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
        <form class="form py-5 row g-3 justify-content-center" action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data" id="dish-form">
            @csrf
            <div class="col-md-6">
                <label for="name">Nome piatto *</label>
                <input class="form-control" type="text" id="name" name="name"  value="{{Request::old('name')}}" >
                <span class="color-red" id="name-error"></span>
            </div>
    
            <div class="col-md-6">
                <label for="price">Prezzo piatto *</label>
                <input class="form-control" type="number" step="0.1" name="price" id="price" value="{{Request::old('price')}}" >
                <span class="color-red" id="price-error"></span>
            </div>
            <div class="col-md-12">
                <label for="description">Descrizione piatto *</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10" value="{{Request::old('description')}}" ></textarea>
                <span class="color-red" id="description-error"></span>
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
    document.getElementById('dish-form').addEventListener('submit', function(event) {
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
            phone.textContent = '';
        }
        // Impedisci l'invio del form se ci sono errori
        if (errors) {
            event.preventDefault();
        }
    });
</script>



@endsection

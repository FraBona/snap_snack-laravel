@extends('layouts.app')
@section('content')
    <style>
        .button-wrapper {
            display: flex;

            margin-bottom: 25px;
        }

        .restaurant-img {
            min-width: 300px;
            object-fit: cover;
            border-radius: 1rem;
        }

        .card-photo{
           display: flex;
           align-items: center;
        }

        .card-description {
            display: flex;
            align-items: center;
            justify-content: flex-start;

        }



        .restaurant-show {

          display: flex;
          flex-wrap: wrap;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          padding: 50px

        }

        .infos {
            padding: 8px;
            text-align: center;
            display: flex;
            flex-direction: row;
            gap: 6px;
        }

        .restaurant-card {
            background-color: white;
            display: grid;
            grid-template-columns: 30% [first]  70% [end];
            border-radius: 2rem;
            box-shadow: rgba(128, 128, 128, 0.44) -6px -6px 6px -6px;
        }

        .rest-ul {
            padding-right: 0.5rem;
        }

        .a-home {
            list-style: none;
            text-decoration: none;
            color: white;
        }
    </style>

    <section class="restaurant-show ">
     <div class="button-wrapper">
        <a class="btn btn-primary mt-4" href="{{ route('admin.dashboard') }}">Torna alla Home</a>
     </div>

        <div class="restaurant-card">
            <div class="card-photo p-4">
                @if ($restaurant->photo)
                <img class="restaurant-img" src="{{ asset('storage/' . $restaurant->photo) }}" alt="photo-restaurant">

            @endif
            </div>
            <div class="card-description p-4">
              <ul class="  rest-ul d-flex flex-column ">
                <li class="infos">Il nome del tuo ristorante é: <strong>{{ $restaurant->name }}</strong></li>
                <li class="infos">L'Indirizzo del tuo ristorante é: <strong>{{ $restaurant->address }}</strong></li>
                <li class="infos">Il numero del tuo ristorante é: <strong>{{ $restaurant->phone_number }}</strong></li>
                <li class="infos">La partita iva del tuo ristorante é: <strong>{{ $restaurant->vat }}</strong></li>
                <li class="infos">Descrizione: <strong>{{ $restaurant->description }}</strong></li>

                <ul class="d-flex justify-content-center gap-2 p-2 ">
                    @foreach ($restaurant->categories as $category)
                        <li class="infos badge rounded-pill text-bg-primary">{{ $category->name }}</li>
                    @endforeach
                </ul>


            </ul>
        </div>
        </div>
    </section>

    </html>
@endsection

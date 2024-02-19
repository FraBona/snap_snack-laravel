<style>
    .dish-wrapper {
        margin-bottom: 25px;
        padding: 20px;
        display: grid;
        /* justify-self: center; */
        text-align: center;
        height: 100%;
        border-radius: 1rem;
        background-color: white;
        box-shadow: rgba(128, 128, 128, 0.44) -6px -6px 6px -6px;
        justify-self: stretch;
        align-self: stretch;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: auto;
        grid-gap: 25px;
        align-items: center;
    }

    .dish-featured-img {
        min-width: 200px;
        min-height: 150px;
        max-width: 200px;
        max-height: 150px;
        object-fit: cover;
        border-radius: 1rem;
        margin-top: 20px;
    }

</style>
@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-success mt-5 mb-5" href="{{ route('admin.dishes.create') }}">Crea Piatto</a>
        <h2 class="text-center pb-5 font-weight-bold">Il Menu</h2>
    </div>


    <div class="container pb-5">
        <div class="grid">
            @foreach ($dishes as $dish)
                <div class="dish-wrapper">
                    @if ($dish->photo)
                        <figure>
                            <img class="dish-featured-img bt-3" src="{{ asset('storage/' . $dish->photo) }}" alt="dish-photo">
                        </figure>
                    @endif
                    <a href="{{ route('admin.dishes.show', $dish) }}"><strong>{{ $dish->name }}</strong></a>
                    <div class="description">
                      <p>{{ $dish->description }}</p>
                    </div>
                    <p>{{ $dish->price }}&euro;</p>
                    <div class="buttons-wrapper">
                      <a class="btn btn-warning mb-3" href="{{ route('admin.dishes.edit', $dish) }}">Modifica il piatto</a>
                      <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="post" id="{{$dish->name}}" class="dish-delete-alert">
                          @csrf
                          @method('DELETE')

                          <input type="submit" value="Cancella"
                               class="btn btn-danger">
                      </form>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection

@section('alert-delete-scripts')
    <script>
        const deleteForms = document.querySelectorAll('.dish-delete-alert');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {

                e.preventDefault();
                Swal.fire({
                title: 'Attenzione !!',
                iconHtml: '<div><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/> <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/></svg></div>',
                html:  `<h4>Sei sicuro di voler eliminare:</h4> </br>  ${e.target.id} `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Elimina il Piatto',
                cancelButtonText: 'Torna indietro'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
            });
        });
    </script>
@endsection

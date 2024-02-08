<style>
    .container {
        display: flex;
        justify-content: center;
    }

    .img-dish {
        min-width: 200px;
        min-height: 150px;
        max-width: 200px;
        max-height: 150px;
        object-fit: cover;
        border-radius: 1rem;
    }

    .dish-show {
        height: calc(100vh - 76px);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .dish-title {
        font-size: 24px;
        font-weight: 800;
    }

    .ul-resetted {
        display: block;
        list-style-type: disc;
        margin-block-start: 0em !important ;
        margin-block-end: 0em !important ;
        margin-inline-start: 0px !important ;
        margin-inline-end: 0px !important;
        padding-inline-start: 0px !important;
    }
    .dish-wrapper {
        background-color: white;
        min-width: 200px;
        max-width: 600px;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border-radius: 1rem ;
        box-shadow: rgba(128, 128, 128, 0.44) -6px -6px 6px -6px;
    }
</style>
@extends('layouts.app')
@section('content')
    <section class="dish-show">
        <div class="container">
            <div class="dish-wrapper">
                <img class="img-dish mt-5" src="{{ asset('storage/' . $dish->photo) }}" alt="">
                <ul class="ul-resetted">
                    <li class="dish-title text-center mt-4"><strong>{{ $dish->name }}</strong></li>
                    <li class="text-center mt-4"><strong>{{ $dish->description }}</strong></li>
                    <li class="text-center mt-4 mb-4"><strong>{{ $dish->price }}</strong></li>
                </ul>
                <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="post" id="{{$dish->name}}" class="dish-delete-alert">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Cancella"
                         class="btn btn-danger">
                </form>
                <a class="btn btn-primary" href="{{ route('admin.dishes.index') }}">Torna al tuo Menu dei Piatti</a>
            </div>
        </div>
    </section>
@endsection

@section('alert-delete-scripts')
    <script>
        const deleteForms = document.querySelectorAll('.dish-delete-alert');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {

                e.preventDefault();
                Swal.fire({

                title: 'Attenzione',
                html:  `<h3>Sei sicuro di voler eliminare:</h3> </br>  ${e.target.id} `,
                icon: 'trash',
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

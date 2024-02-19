@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica il tuo indirizzo Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Ti verrà inviata una email con il link di verifica della email') }}
                    </div>
                    @endif

                    {{ __('Prima di accedere a SnapSnack, assicurati di aver verificato la Email.') }}
                    {{ __('Se non hai ricevuto la email') }}:
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clicca quì per richiedere un alro link') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

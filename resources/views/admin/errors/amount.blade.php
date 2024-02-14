@extends('layouts.app') @section('content')
    <section class="amount-error">
        <h2 class="text-center text-danger">Errore: Il Prezzo pagato dall' utente non corrisponde con l'importo corretto da
            pagare</h2>
        <h4 class="text-center text-danger">Si prega di contattare il supporto di SnapSnack</h4>
    </section>
@endsection <style>
    .amount-error {
        display: flex;
        gap: 25px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: calc(100vh - 80px);
    }
</style>

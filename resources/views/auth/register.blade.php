@extends('layouts.app')
<style>
    .red {
        color: red;
        
    }
</style>
@section('content')
<h2 class="text-center mt-5">
    Registrati a SnapSnack
</h2>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrazione') }}</div>

                    <div class="card-body justify-content-center">
                        <form id="register_form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4 row">
                                <label  for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>
                                    


                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}"  autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span id="name_error"></span>
                                </div>
                                
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail*') }}</label>


                                <div class="col-md-6">
                                    <input id="email" type="string"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span id="email_error"></span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password * (Min 8 Caratteri)') }}</label>


                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                         autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span id="password_error"></span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password*') }}</label>


                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation"  autocomplete="new-password">
                                        <span id="password_conferm_error"></span>
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>
                            <div class="info-wrapper">
                                <h5>I campi con il simbolo * sono obbligatori</h5>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script async>
        // aggancio la funzione al form : 
        document.getElementById('register_form').addEventListener('submit', function(event) {

            // recupero gli elementi del DOM : 

            let name = document.getElementById('name').value.trim();
            let email = document.getElementById('email').value.trim();
            let password = document.getElementById('password').value
            let passwordConferm = document.getElementById('password-confirm').value

            // recupero gli span di errore 
            let name_error = document.getElementById('name_error');
            let email_error = document.getElementById('email_error');
            let password_error = document.getElementById('password_error');
            let password_conferm_error = document.getElementById('password_conferm_error');

            // inizzializzo l'errore a false : 
            let errors = false;

            

            // funzione per vedere se e'un numero 

            function isOnlyNumber(item) {
                return !isNaN(Number(item));
            }
            // funzione per vedere se e' un email 

            function validateEmail(email) {
                const emailPattern = /\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b/;
                return emailPattern.test(email);
            }

            // Validations :

            if (name === '' || name.length < 3 || name.length > 30 || isOnlyNumber(name)) {
                
                name_error.className = " text-danger";
                name_error.innerHTML = 'Assicurati di inserire un Nome valido';
                errors = true;
            } else {
                name_error.innerHTML = '';
            }
            if (email === '' || email.length < 1 || !validateEmail(email)|| email.length > 255 ) {
                
                console.log(validateEmail(email));
                email_error.className = " text-danger";
                email_error.innerHTML = 'Assicurati di inserire una Email valida';
                errors = true;
            } else {
                email_error.innerHTML = '';
            }
            if (password === '' || password.length < 8 || password.length > 40 || isOnlyNumber(password)) {
                password_error.className = " text-danger";
                password_error.innerHTML = 'Assicurati di inserire una Password Valida';
                errors = true;
            } else {
                password_error.innerHTML = '';
            }
            if (!(passwordConferm === password)) {
                password_conferm_error.className = " text-danger";
                password_conferm_error.innerHTML = 'Le Due Password Non Corrispondono';
                errors = true;
            } else {
                password_conferm_error.innerHTML = '';
            }

            // Impedisci l'invio del form se ci sono errori 
            if (errors) {
                event.preventDefault();
            }
        });
    </script>
@endsection

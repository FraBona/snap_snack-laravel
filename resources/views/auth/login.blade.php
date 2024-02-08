@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form  id="login_form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="string" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span id="email_error"></span>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span id="password_error"></span>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script async>
    // aggancio la funzione al form : 
    document.getElementById('login_form').addEventListener('submit', function(event) {

        // recupero gli elementi del DOM : 

        let email = document.getElementById('email').value.trim();
        let password = document.getElementById('password').value
        

        // recupero gli span di errore 
        let email_error = document.getElementById('email_error');
        let password_error = document.getElementById('password_error');

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
        // Impedisci l'invio del form se ci sono errori 
        if (errors) {
            event.preventDefault();
        }
    });
</script>
@endsection

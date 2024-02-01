<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <ul class="d-flex">
      <li><img src="{{ $restaurant->photo }}" alt="photo-restaurant"></li>
      <li>Il nome del tuo ristorante é: <strong>{{$restaurant->name}}</strong></li>    
      <li>L'Indirizzo del tuo ristorante é: <strong>{{$restaurant->address}}</strong></li>
      <li>Il numero del tuo ristorante é: <strong>{{$restaurant->phone_number}}</strong></li>
      <li>La partita iva del tuo ristorante é: <strong>{{$restaurant->vat}}</strong></li>
      <a href="{{route('admin.dashboard')}}">Home</a>
  </ul>
</body>
</html>
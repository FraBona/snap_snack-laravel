<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>{{$restaurant->name}}</h1>
  <h1>{{$restaurant->address}}</h1>
  <h1>{{$restaurant->phone_number}}</h1>
  <h1>{{$restaurant->vat}}</h1>
  <h2><h1>{{$restaurant->photo}}</h1></h2>
  <a href="{{route('admin.dashboard')}}">Home</a>
</body>
</html>
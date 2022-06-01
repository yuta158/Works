<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <title>家計簿</title>
</head>
<body>
  <div class="container mt-5">
    @yield('content')
  </div>
  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
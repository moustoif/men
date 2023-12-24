<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>MEN - @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body class="h-screen flex flex-row">
  
    <div class="left-0 top-0 w-20 z-10 h-full">
      @yield('nav')
    </div>


    
    <div class="flex-1 overflow-hidden" id="main-content">
      @yield('main-content')
    </div>
</body>
</html>
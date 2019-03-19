<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>@yield('title')</title>

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}"></script>
      <!-- <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script> -->



      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
      <link href="{{ asset('css/checkbox.css') }}" rel="stylesheet">



      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="{{ asset('/js/jquery-ja.js') }}"></script>




  </head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{route('get_show_sites')}}">
                    Comments Api
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>

        <main class="py-4">
            <style>
                div.alert {
                    text-align: center;
                }
            </style>
              <div class="{{ Session::get('message') || isset($users) && $users->count() == 0 ? 'alert alert-success' : '' }}">
                <div>{{ Session::get('message') ?? "" }}</div>
                <div>{{ isset($users) && $users->count() == 0 ? "すべての会員が認証済みです。" : "" }}</div>
              </div>

            @if(Session::has('error'))
              <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif

            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                 <div>{{ $error }}</div>
                @endforeach
              </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title' , 'Laravel-memo')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/a8fa5145e8.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<h1 class="mr-auto text-center py-1 bg-secondary shadow-sm"><a href="/">{{ __('laravel_memo') }}</a></h1>
<div class="container">
<div id="app">
<div class="d-lg-flex">
<div class="col-lg-4 pt-4 col4">
<div class=" d-flex d-lg-flex top_flex_l border-bottom mb-4">
  @if( Request::is('/'))
<p class="mr-auto">ようこそ {{ Auth::user()->name }}さん</p>
@else
<h1 class="mr-auto">{{ __('メモ') }}</h1>
@endif
<p class="mr-2 mr-lg-2"><a href="{{ route('create') }}"><i class="far fa-plus-square"></i></a></p>
<p class=""><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
<i class="fas fa-sign-out-alt"></i></a></p>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</div>
<div class=" mb-2">
@yield('list')
</div>
</div>


<div class="col-lg-8 pt-4 col8">
    @yield('content')
</div>
</div>

</div>
</div>
<P class="text-center mb-0 bg-secondary text-white">laravel_memo</P>
</body>
</html>

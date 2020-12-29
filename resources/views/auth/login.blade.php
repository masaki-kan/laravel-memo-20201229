@extends('layouts.login')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card border-0">

<div class="card-body">
  <div class="text-center mt-5">
    <img src="{{ asset('images/login_img.png') }}" class="rounded d-block m-auto" style="width:150px">
  </div>
  <div class="text-center">
      <h2 class="text-primary mt-4">{{ __('laravel-memo') }}</h2>
  </div>
  <div class="text-center m-3 p-3">
      <h2 class="mb-0">{{ __('Login') }}</h2>
  </div>
<form method="POST" action="{{ route('login') }}">
@csrf
    <div class="form-group mt-4 mb-4">
      <label for="email">Email address</label>
      <input id="email"
      type="email"
      class="form-control @error('email') is-invalid @enderror"
      name="email" value="{{ old('email') }}"
      autocomplete="email" autofocus placeholder="〇〇〇〇@gmail.com">
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
     </div>

    <div class="form-group mt-4 mb-4">
      <label for="password">Password</label>
      <input id="password"
      type="password"
      class="form-control @error('password') is-invalid @enderror"
      name="password"
      autocomplete="new-password">
      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary m-auto d-block w-100">
        {{ __('Login') }}
    </button>
</form>
<div class="text-center m-3 p-3">
    <p class="mb-0">アカウントはお持ちですか？</p>
</div>
<button type="" class="btn btn-primary mt-4 d-block w-100">
    <a href="{{ route('register') }}" class="text-white">{{ __('register') }}</a>
</button>
</div>
</div>
</div>
</div>
</div>
@endsection

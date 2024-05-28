@extends('layouts.app')

@section('content')
<div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
  style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
  <span class="mask bg-gradient-dark opacity-6"></span>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 text-center mx-auto">
        <h1 class="text-white mb-2 mt-5">Welcome!</h1>
        <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.
        </p>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
      <div class="card z-index-0">
        <div class="card-header text-center pt-4">
          <h5>Register</h5>
        </div>
        
        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required
                autocomplete="name" autofocus>
              @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
            </div>
            <div class="mb-3">
              <input type="email" placeholder="Email" aria-label="Email"
                class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                required autocomplete="email">
              @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
            </div>
            <div class="mb-3">
              <input type="password" placeholder="Password" aria-label="Password"
                class="form-control @error('password') is-invalid @enderror" name="password" required
                autocomplete="new-password">
              @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
            </div>
            <div class="mb-3">
              <input class="form-control" type="password" placeholder="Confirm Password" aria-label="Password" name="password_confirmation"
                required autocomplete="new-password">
              @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
            </div>
            <div class="form-check form-check-info text-start">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
              <label class="form-check-label" for="flexCheckDefault">
                I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
              </label>
            </div>
            <div class="text-center">
              <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
            </div>
            <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{route('login')}}"
                class="text-dark font-weight-bolder">Sign in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
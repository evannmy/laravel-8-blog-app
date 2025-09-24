@extends('layouts.main')

@section('content')
  <div class="row justify-content-center text-center mt-5">
    <div class="col-md-8 col-lg-5">
      @if (session()->has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('message') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (session()->has('created'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('created') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <main class="form-signin w-100 m-auto">
        <form action="/authenticate" method="POST">
          @csrf
          <h1 class="h3 mb-3 fw-normal">Please Login</h1>
          <div class="form-floating">
            <input
              type="email"
              class="form-control @error('email') is-invalid @enderror"
              id="validationServerEmail"
              placeholder="name@example.com"
              name="email"
              required
              autofocus
            />
            <label for="validationServerEmail">Email address</label>
            @error('email')
              <div id="validationServerEmailFeedback" class="invalid-feedback d-flex mt-1 mb-3">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input
              type="password"
              class="form-control @error('password') is-invalid @enderror"
              id="validationServerPassword"
              placeholder="Password"
              name="password"
              required
            />
            <label for="validationServerPassword">Password</label>
            @error('password')
              <div id="validationServerPasswordFeedback" class="invalid-feedback d-flex mt-1 mb-3">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button class="btn btn-primary w-100 py-2 mb-2" type="submit">
            Login
          </button>
          <small>Don't have account? <a href="/registration">register</a></small>
        </form>
      </main>
    </div>
  </div>
@endsection
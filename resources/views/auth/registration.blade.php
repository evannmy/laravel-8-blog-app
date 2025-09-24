@extends('layouts.main')

@section('content')
  <div class="row justify-content-center text-center mt-5">
    <div class="col-md-8 col-lg-5">
      @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('message') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <main class="form-register w-100 m-auto">
        <form action="/registration" method="POST">
          @csrf
          <h1 class="h3 mb-3 fw-normal">Registration Form</h1>
          <div class="form-floating">
            <input
              type="text"
              class="form-control @error('name') is-invalid @enderror"
              id="validationServerName"
              placeholder="Name"
              name="name" 
              value="{{ old('name') }}"
              required
            />
            <label for="validationServerName">Name</label>
            @error('name')
              <div id="validationServerNameFeedback" class="invalid-feedback d-flex mt-1 mb-3">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input
              type="text"
              class="form-control @error('username') is-invalid @enderror"
              id="validationServerUsername""
              placeholder="Username"
              name="username"
              value="{{ old('username') }}"
              required
            />
            <label for="validationServerUsername">Username</label>
            @error('username')
              <div id="validationServerUsernameFeedback" class="invalid-feedback d-flex mt-1 mb-3">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input
              type="email"
              class="form-control @error('email') is-invalid @enderror"
              id="validationServerEmail"
              placeholder="name@example.com"
              name="email"
              value="{{ old('email') }}"
              required
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
              <div id="validationServerPasswordFeedback" class="invalid-feedback d-flex mt-1 mb-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button class="btn btn-primary w-100 py-2 mb-3" type="submit">
            Register
          </button>
          <small>Already have account? <a href="/login">login</a></small>
        </form>
      </main>
    </div>
  </div>
@endsection
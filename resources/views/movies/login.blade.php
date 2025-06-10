@extends('layouts.template')

@section('navMovie', 'active')
@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card shadow-lg border-0">
      <div class="card-body p-4">
        <h3 class="mb-4 text-center text-success">Login to Your Account</h3>
        <form action="{{ route('login') }}" method="POST">
          @csrf
          
          {{-- Email --}}
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" required placeholder="you@example.com">
            <div class="form-text">We'll never share your email with anyone else.</div>
          </div>

          {{-- Password --}}
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required placeholder="********">
          </div>

          {{-- Remember me --}}
          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
          </div>

          {{-- Submit --}}
          <div class="d-grid">
            <button type="submit" class="btn btn-success">Login</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection

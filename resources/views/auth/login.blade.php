@extends('layouts.app')

@section('content')
    <div class="wave-container mt-5">
        <div class="container d-flex justify-content-center align-items-center" style="height: 100%;">
            <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
                <h3 class="card-title text-center mb-4">Welcome back</h3>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="post"  action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="mb-3 form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="mb-2 form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter the password" required minlength="8">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="mb-2 text-right">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-2">Success</button>
                </form>
            </div>
        </div>
    </div>
@endsection

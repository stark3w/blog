@extends('layouts.app')

@section('content')
    <div class="wave-container mt-5">
        <div class="container d-flex justify-content-center align-items-center" style="height: 100%;">
            <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
                <h3 class="card-title text-center mb-4">Reset Password</h3>
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->token }}">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="mb-2 form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter your email" value="{{ old('email', $request->email) }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" class="mb-2 form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter new password" required>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="mb-2 form-control" id="password-confirm" placeholder="Confirm new password" required>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection

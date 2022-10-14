@extends('layout.layout')

@section('title', 'Register')


@section('content')
    <div class="container pt-5">
        <h1 class="text-center mb-5">Sign Up</h1>
        <form action="/users" method="post" class="w-50 m-auto">
            @csrf

            <div class="form-outline mb-4">
                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" />
                <label class="form-label" for="name">Name</label>
            </div>

            @error('name')
                <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
            @enderror

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" />
                <label class="form-label" for="email">Email address</label>
            </div>

            @error('email')
                <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
            @enderror

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}" />
                <label class="form-label" for="password">Password</label>
            </div>

            @error('password')
                <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
            @enderror

            <!-- Password Confirmation input -->
            <div class="form-outline mb-4">
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                    value="{{ old('password_confirmation') }}" />
                <label class="form-label" for="password_confirmation">Confirm Password</label>
            </div>

            @error('password_confirmation')
                <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
            @enderror

            <!-- Submit button -->
            <button type="submit" class="btn btn-dark btn-block mb-4">Sign up</button>

        </form>
    </div>
@endsection

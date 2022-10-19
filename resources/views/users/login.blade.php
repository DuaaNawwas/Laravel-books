@extends('layout.layout')

@section('title', 'Register')


@section('content')
    <div class="container pt-5">
        <h1 class="text-center mb-5">Sign In To Your Account</h1>
        <form action="users/authenticate" method="post" class="w-50 m-auto">
            @csrf


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

            <!-- Checked checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="true" id="flexCheckChecked" checked
                    name="remember" />
                <label class="form-check-label small" for="flexCheckChecked">Remember me</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-dark btn-block mb-4">Sign in</button>

            <p class="small">Don't have an account? <a href="/register"> Register </a></p>

        </form>
    </div>
@endsection

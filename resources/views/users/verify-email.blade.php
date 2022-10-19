@extends('layout.layout')

@section('title', 'Verify')
<h1>You should verify your email first</h1>
<form action="/email/verification-notification" method="post">
    @csrf
    <button type="submit">Resend Verification Email</button>
</form>
@section('content')


@endsection

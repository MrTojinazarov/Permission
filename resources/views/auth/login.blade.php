@extends('auth.main')
@section('title', 'Login')

@section('content')
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <p>Please login to your account</p>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <h6>{{ $error }}</h6>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="form-outline mb-4">
            <input type="email" name="email" class="form-control" placeholder="Phone number or email address" required />
            <label class="form-label" for="form2Example11">Username</label>
        </div>

        <div class="form-outline mb-4">
            <input type="password" name="password" class="form-control" required />
            <label class="form-label" for="form2Example22">Password</label>
        </div>

        <div class="text-center pt-1 mb-5 pb-1">
            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Login</button>
        </div>

        <div class="d-flex align-items-center justify-content-center pb-4">
            <p class="mb-0 me-2">Don't have an account?</p>
            <a href="{{ route('register') }}" class="btn btn-outline-danger">Create new</a>
        </div>
    </form>
@endsection

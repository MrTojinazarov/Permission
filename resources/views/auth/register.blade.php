@extends('auth.main')
@section('title', 'Registration')
@section('content')

    <form method="POST" action="{{ route('register.create') }}">
        @csrf
        <p>Please create your account</p>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <h6>{{ $error }}</h6>
                        @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="form-outline mb-3">
                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Full Name" required />
                <label class="form-label" for="form2Example11">Full Name</label>
            </div>

            <div class="form-outline mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required />
                <label class="form-label" for="form2Example12">Email Address</label>
            </div>

            <div class="form-outline mb-3">
                <input type="password" name="password" class="form-control" required />
                <label class="form-label" for="form2Example13">Password</label>
            </div>

            <div class="form-outline mb-3">
                <input type="password" name="password_confirmation" class="form-control"  required />
                <label class="form-label" for="form2Example14">Confirm Password</label>
            </div>

            <div class="text-center mb-3">
                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Register</button>
            </div>

            <div class="d-flex align-items-center justify-content-center">
                <p class="mb-0 me-2">Already have an account?</p>
                <a href="{{ route('login') }}" class="btn btn-outline-danger">Login</a>
            </div>

    </form>
@endsection

@extends('Admin.main')

@section('title', 'Create')

@section('content')

    <div class="row pt-3">
        <div class="col-12">
            <a href="/client" class="btn btn-primary" style="width: 100px">Back</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Client</h3>
                </div>
                <form action="/client" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Login</label>
                            <input type="email" class="form-control" name="login" value="{{old('login')}}" id="name" placeholder="Email">
                            @error('login')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pass" class="form-label">Password</label>
                            <input type="text" class="form-control" value="{{old('password')}}" name="password" id="pass" placeholder="Password">
                            @error('password')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

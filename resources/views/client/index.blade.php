@extends('Admin.main')

@section('title', 'Clients')

@section('content')

    <div class="row pt-3">
        <div class="col-12">
            <a href="/client-create" class="btn btn-primary" style="width: 100px">Create</a>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-{{ session('added') }} alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Clients Table</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Login</th>
                                <th>Password</th>
                                <th>Options</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        @foreach ($models as $model)
                            <tbody>
                                <tr>
                                    <td>{{ $model->id }}</td>
                                    <td>{{ $model->login }}</td>
                                    <td>{{ $model->password }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $model->id }}">
                                            Update
                                        </button>
                                        <div class="modal fade" id="exampleModal{{ $model->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Client</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('client.update', $model->id) }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="login" class="form-label">Login</label>
                                                                <input type="text" class="form-control" name="login"
                                                                    id="login" value="{{ $model->login }}"
                                                                    placeholder="Enter login">
                                                                @error('login')
                                                                    <span style="color: red">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password" class="form-label">Password</label>
                                                                <input type="password" class="form-control" name="password"
                                                                    id="password" placeholder="Enter new password">
                                                                @error('password')
                                                                    <span style="color: red">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password_confirmation"
                                                                    class="form-label">Confirm Password</label>
                                                                <input type="password" class="form-control"
                                                                    name="password_confirmation" id="password_confirmation"
                                                                    placeholder="Confirm new password">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('client.destroy', $model->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
            {{ $models->links() }}
        </div>
    </div>

@endsection

@extends('Admin.main')

@section('title', 'Products')

@section('content')

    <div class="row pt-3">
        <div class="col-12">
            <a href="/product-create" class="btn btn-primary" style="width: 100px">Create</a>
        </div>
    </div>

    <div class="row mt-3">
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
                    <h3 class="card-title">Product Table</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Company</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Photo</th>
                                <th>Options</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        @foreach ($models as $model)
                            <tbody>
                                <tr>
                                    <td>{{ $model->id }}</td>
                                    <td>{{ $model->company_id }}</td>
                                    <td>{{ $model->name }}</td>
                                    <td>{{ $model->price }}</td>
                                    <td>{{ $model->quantity }}</td>
                                    <td><img src="{{ asset($model->img) }}" style="width: 200px;" alt="Not img"></td>
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
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('product.update', $model->id) }}" method="post"
                                                        enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="company_id"
                                                                        class="form-label">Company</label>
                                                                    <select name="company_id" class="form-control"
                                                                        id="company_id">
                                                                        @foreach ($companies as $company)
                                                                            @if ($model->company_id == $company->id)
                                                                                <option value="{{ $company->id }}"
                                                                                    selected>{{ $company->name }}</option>
                                                                            @else
                                                                                <option value="{{ $company->id }}">
                                                                                    {{ $company->name }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                        @error('company_id')
                                                                            <span style="color: red">{{ $message }}</span>
                                                                        @enderror
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name" class="form-label">Product
                                                                        name</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $model->name }}" name="name"
                                                                        id="name" placeholder="Product name">
                                                                    @error('name')
                                                                        <span style="color: red">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="price" class="form-label">Product
                                                                        price</label>
                                                                    <input type="number" class="form-control"
                                                                        name="price" value="{{ $model->price }}"
                                                                        id="price" placeholder="Enter product price"
                                                                        min="0" step="0.01">
                                                                    @error('price')
                                                                        <span style="color: red">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="quantity" class="form-label">Product
                                                                        quantity</label>
                                                                    <input type="number" class="form-control"
                                                                        min="0" name="quantity"
                                                                        value="{{ $model->quantity }}" id="quantity"
                                                                        placeholder="Product quantity">
                                                                    @error('quantity')
                                                                        <span style="color: red">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="hidden" name="old_img"
                                                                        value="{{ $model->img }}">
                                                                    <label for="img" class="form-label">Product
                                                                        img</label>
                                                                    <input type="file" class="form-control"
                                                                        name="img" id="img">
                                                                    <img src="{{ asset($model->img) }}"
                                                                        style="width: 150px;" alt="Not img">
                                                                    @error('img')
                                                                        <span style="color: red">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>

                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <form action="/product/{{ $model->id }}" method="POST">
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

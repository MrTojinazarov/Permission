@extends('Admin.main')

@section('title', 'Create')

@section('content')

    <div class="row pt-3">
        <div class="col-12">
            <a href="/product" class="btn btn-primary" style="width: 100px">Back</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Product</h3>
                </div>
                <form action="/product" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="company_id" class="form-label">Company</label>
                            <select name="company_id" class="form-control" id="company_id">
                                <option value="">Choose</option>
                                @foreach ($models as $model)
                                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                                @endforeach
                                @error('company_id')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Product name</label>
                            <input type="text" class="form-control" value="{{old('name')}}" name="name" id="name" placeholder="Product name">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Product price</label>
                            <input type="number" class="form-control" name="price" value="{{old('price')}}" id="price" placeholder="Enter product price" min="0" step="0.01">
                            @error('price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="form-label">Product quantity</label>
                            <input type="number" class="form-control" min="0" name="quantity" value="{{old('quantity')}}" id="quantity" placeholder="Product quantity">
                            @error('quantity')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="img" class="form-label">Product img</label>
                            <input type="file" class="form-control" name="img" id="img">
                            @error('img')
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

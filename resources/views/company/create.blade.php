@extends('Admin.main')

@section('title', 'Create')

@section('content')

    <div class="row pt-3">
        <div class="col-12">
            <a href="/company" class="btn btn-primary" style="width: 100px">Back</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Company</h3>
                </div>
                <form action="/company" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user" class="form-label">Owner</label>
                            <select name="client_id" class="form-control" id="user">
                                <option value="">Choose</option>
                                @foreach ($models as $model)
                                    <option value="{{ $model->id }}">{{ $model->login }}</option>
                                @endforeach
                                @error('client_id')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Company name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Category name">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">Company phone</label>
                            <input type="tel" class="form-control" name="phone" id="phone"
                                placeholder="Company phone">
                            @error('phone')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="is_active" class="form-label">Active Status</label>
                            <br>
                            <input type="radio" name="is_active" id="is_active_true" value="1">
                            <label for="is_active_true" class="form-label">Active</label>
                            <br>
                            <input type="radio" name="is_active" id="is_active_false" value="0">
                            <label for="is_active_false">Not active</label>
                            @error('is_active')
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

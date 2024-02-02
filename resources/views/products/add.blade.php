@extends('layouts.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('admin.product.store')}}" method="POST">
                            @csrf
                        <div class="card mt-1">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <select name="cat_id" class="form-control">
                                        <option value="">Choose category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Input data">
                                </div>

                                <div class="form-group">
                                    <label for="name">Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Input data">
                                </div>

                                <div class="form-group">
                                    <label for="name">Unit</label>
                                    <input type="text" name="unit" class="form-control" placeholder="Input data">
                                </div>

                                <div class="form-check mt-1">
                                    <input type="checkbox" name="status" class="form-check-input" checked>
                                    <label for="status" class="form-check-label">Active</label>
                                </div>

                            </div>
                            <div class="card-footer clearfix">
                                <button type="submit" class="btn bt-sm btn-success"><i class="fas fa-save"></i></button>
                                <button type="reset" class="btn btn-sm btn-default"><i class="fas fa-sync-alt"></i></button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

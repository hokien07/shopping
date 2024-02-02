@extends('layouts.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Categories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('admin.category.update', $category)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card mt-1">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" required name="name" class="form-control" value="{{$category->name}}" placeholder="Input data">
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

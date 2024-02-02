@extends('layouts.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="action-block">
                            <a href="{{ route('admin.category.add') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Add new</a>
                        </div>

                        @include('categories._filter')
                        <div class="card mt-1">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Products</th>
                                        <th>Status</th>
                                        <th><i class="fa fa-cog"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ count($category->products)}}</td>
                                            <td>{{ $category->status == 0 ? 'Inactive' : "Active" }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{route('admin.category.edit', $category)}}"><i class="fas fa-pen"></i></a>
                                                <button class="btn btn-sm btn-danger btn-delete" data-model="category" data-id="{{$category->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

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
                    <div class="col-md-12">
                        <div class="action-block">
                            <a href="{{ route('admin.product.add') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Add new</a>
                        </div>

                        @include('products._filter')
                        <div class="card mt-1">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Cat Name</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Unit</th>
                                        <th><i class="fa fa-cog"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->status == 0 ? 'Inactive' : "Active" }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->unit }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{route('admin.product.edit', $product)}}"><i class="fas fa-pen"></i></a>
                                                <button class="btn btn-sm btn-danger btn-delete" data-model="product" data-id="{{$product->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@extends('app')
@section('content')
    <!-- Heading -->
    <div class="bg-primary">
        <div class="container py-4">
            <!-- Breadcrumb -->
            <nav class="d-flex">
                <h6 class="mb-0">
                    <a href="{{route('home')}}" class="text-white-50">Home</a>
                    <span class="text-white-50 mx-2"> > </span>
                    <a href="{{route('cart.get.list')}}" class="text-white"><u>Shopping cart</u></a>
                </h6>
            </nav>
            <!-- Breadcrumb -->
        </div>
    </div>
    <!-- Heading -->
</header>

<!-- cart + summary -->
<section class="bg-light my-5">
    <div class="container">
        <div class="row">
            <!-- cart -->
            <div class="col-lg-9">
                <div class="card border shadow-0">
                    <div class="m-4">
                        <div class="card-header ui-sortable-handle">
                            <h4 class="card-title mb-4">Your shopping cart</h4>
                        </div>
                        <div class="card-body">
                            @foreach($cartItems as $item)
                                <div class="row gy-3 mb-4">
                                    <div class="col-lg-5">
                                        <div class="me-lg-5">
                                            <div class="d-flex">
                                                <img src="{{getImageUrl(NULL)}}" class="border rounded me-3" style="width: 96px; height: 96px;" />
                                                <div class="">
                                                    <a href="#" class="nav-link">{{$item->getTitle()}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                        <div class="">
                                            <select style="width: 100px;" class="form-select me-4">
                                                <option {{$item->getQuantity() == 1 ? "selected" : ''}}>1</option>
                                                <option {{$item->getQuantity() == 2 ? "selected" : ''}}>2</option>
                                                <option {{$item->getQuantity() == 3 ? "selected" : ''}}>3</option>
                                                <option {{$item->getQuantity() == 4 ? "selected" : ''}}>4</option>
                                            </select>
                                        </div>
                                        <div class="">
                                            <text class="h6">${{$item->getPrice() * $item->getQuantity()}}</text> <br />
                                            <small class="text-muted text-nowrap"> ${{$item->getPrice()}} / per item </small>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                        <div class="float-md-end">
                                            <button class="btn btn-light border text-danger icon-hover-danger btn-cart-remove" data-hash="{{$item->getHash()}}">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="border-top pt-4 mx-4 mb-4">
                        <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                        <p class="text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip
                        </p>
                    </div>
                </div>
            </div>
            <!-- cart -->
            <!-- summary -->
            <div class="col-lg-3">
                <div class="card mb-3 border shadow-0">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label class="form-label">Have coupon?</label>
                                <div class="input-group">
                                    <input type="text" class="form-control border" name="" placeholder="Coupon code" />
                                    <button class="btn btn-light border">Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card shadow-0 border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Total price:</p>
                            <p class="mb-2">${{$subTotal}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Discount:</p>
                            <p class="mb-2 text-success">$0</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">TAX:</p>
                            <p class="mb-2">${{$subTotal * config('cart.default_tax_rate') / 100}}</p>
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Total price:</p>
                            <p class="mb-2 fw-bold">$ {{$subTotal * config('cart.default_tax_rate') / 100 + $subTotal}}</p>
                        </div>

                        <div class="mt-3">
                            <a href="{{route('cart.checkout')}}" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
                            <a href="{{route('home')}}" class="btn btn-light w-100 border mt-2"> Back to shop </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- summary -->
        </div>
    </div>
</section>
<!-- cart + summary -->
<section>
    <div class="container my-5">
        <header class="mb-4">
            <h3>Recommended items</h3>
        </header>

        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
                    <div class="mask px-2" style="height: 50px;">
                        <div class="d-flex justify-content-between">
                            <h6><span class="badge bg-danger pt-1 mt-3 ms-2">New</span></h6>
                            <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                        </div>
                    </div>
                    <a href="#" class="">
                        <img src="{{getImageUrl($product->avatar)}}" class="card-img-top rounded-2" />
                    </a>
                    <div class="card-body d-flex flex-column pt-3 border-top">
                        <a href="#" class="nav-link">{{$product->name}}</a>
                        <div class="price-wrap mb-2">
                            <strong class="">${{$product->price}}</strong>
                        </div>
                        <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                            <button class="btn btn-outline-primary w-100 btn-add-card" data-id="{{$product->id}}">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

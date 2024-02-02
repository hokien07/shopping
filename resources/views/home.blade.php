@extends('app')
@section('content')
<header>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <!-- Container wrapper -->
        <div class="container justify-content-center justify-content-md-between">
            <!-- Toggle button -->
            <button
                class="navbar-toggler border py-2 text-dark"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarLeftAlignExample"
                aria-controls="navbarLeftAlignExample"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{route('category')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{route('product')}}">Products</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
        </div>
        <!-- Container wrapper -->
    </nav>

    <!-- Navbar -->
    <!-- Jumbotron -->
    <div class="bg-primary text-white py-5">
        <div class="container py-5">
            <h1>
                Best products & <br />
                brands in our store
            </h1>
            <p>
                Trendy Products, Factory Prices, Excellent Service
            </p>
            <button type="button" class="btn btn-outline-light">
                Learn more
            </button>
            <button type="button" class="btn btn-light shadow-0 text-primary pt-2 border border-white">
                <span class="pt-1">Purchase now</span>
            </button>
        </div>
    </div>

    <!-- Jumbotron -->
</header>
<!-- Products -->
<section>
    <div class="container my-5">
        <header class="mb-4">
            <h3>New products</h3>
        </header>

        <div class="row">

            @foreach($products  as $product)
            <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="card w-100 my-2 shadow-2-strong">
                    <img src="{{getImageUrl($product->avatar)}}" class="card-img-top" style="aspect-ratio: 1 / 1" />
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">${{$product->price}}</p>
                        <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                            <button class="btn btn-primary shadow-0 me-1 btn-add-card" data-id="{{$product->id}}">Add to cart</button>
                            <button class="btn btn-light border px-2 pt-2 icon-hover btn-wishlist" data-id="{{$product->id}}"><i class="fas fa-heart fa-lg text-secondary px-1"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Products -->

<!-- Feature -->
<section class="mt-5" style="background-color: #f5f5f5;">
    <div class="container text-dark pt-3">
        <header class="pt-4 pb-3">
            <h3>Why choose us</h3>
        </header>

        <div class="row mb-4">
            <div class="col-lg-4 col-md-6">
                <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-camera-retro fa-2x fa-fw text-primary floating"></i>
          </span>
                    <figcaption class="info">
                        <h6 class="title">Reasonable prices</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                    </figcaption>
                </figure>
                <!-- itemside // -->
            </div>
            <!-- col // -->
            <div class="col-lg-4 col-md-6">
                <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-star fa-2x fa-fw text-primary floating"></i>
          </span>
                    <figcaption class="info">
                        <h6 class="title">Best quality</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                    </figcaption>
                </figure>
                <!-- itemside // -->
            </div>
            <!-- col // -->
            <div class="col-lg-4 col-md-6">
                <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-plane fa-2x fa-fw text-primary floating"></i>
          </span>
                    <figcaption class="info">
                        <h6 class="title">Worldwide shipping</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                    </figcaption>
                </figure>
                <!-- itemside // -->
            </div>
            <!-- col // -->
            <div class="col-lg-4 col-md-6">
                <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-users fa-2x fa-fw text-primary floating"></i>
          </span>
                    <figcaption class="info">
                        <h6 class="title">Customer satisfaction</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                    </figcaption>
                </figure>
                <!-- itemside // -->
            </div>
            <!-- col // -->
            <div class="col-lg-4 col-md-6">
                <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-thumbs-up fa-2x fa-fw text-primary floating"></i>
          </span>
                    <figcaption class="info">
                        <h6 class="title">Happy customers</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                    </figcaption>
                </figure>
                <!-- itemside // -->
            </div>
            <!-- col // -->
            <div class="col-lg-4 col-md-6">
                <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-box fa-2x fa-fw text-primary floating"></i>
          </span>
                    <figcaption class="info">
                        <h6 class="title">Thousand items</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                    </figcaption>
                </figure>
                <!-- itemside // -->
            </div>
            <!-- col // -->
        </div>
    </div>
    <!-- container end.// -->
</section>
<!-- Feature -->

<!-- Blog -->
<section class="mt-5 mb-4">
    <div class="container text-dark">
        <header class="mb-4">
            <h3>Blog posts</h3>
        </header>

        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <article>
                        <a href="#" class="img-fluid">
                            <img class="rounded w-100" src="{{getImageUrl($blog->thumb)}}" style="object-fit: cover;" height="160" />
                        </a>
                        <div class="mt-2 text-muted small d-block mb-1">
                <span>
                  <i class="fa fa-calendar-alt fa-sm"></i>
                  23.12.2022
                </span>
                            <a href="#"><h6 class="text-dark">{{$blog->title}}</h6></a>
                            <p>{{\Illuminate\Support\Str::limit($blog->content, 50, '...')}}</p>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog -->
@endsection

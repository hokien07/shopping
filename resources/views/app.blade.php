<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}} | {{isset($title) ? $title : 'Starter'}}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<!-- Jumbotron -->
<div class="p-3 text-center bg-white border-bottom">
    <div class="container">
        <div class="row gy-3">
            <!-- Left elements -->
            <div class="col-lg-2 col-sm-4 col-4">
                <a href="https://mdbootstrap.com/" target="_blank" class="float-start">
                    <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="35" />
                </a>
            </div>
            <!-- Left elements -->

            <!-- Center elements -->
            <div class="order-lg-last col-lg-5 col-sm-8 col-8">
                <div class="d-flex float-end">
                    <a href="#" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank"> <i class="fas fa-user-alt m-1 me-md-2"></i><p class="d-none d-md-block mb-0">Sign in</p> </a>
                    <a href="#" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank"> <i class="fas fa-heart m-1 me-md-2"></i><p class="d-none d-md-block mb-0">Wishlist</p> </a>
                    <a href="{{route('cart.get.list')}}" class="border rounded py-1 px-3 nav-link d-flex align-items-center" id="cart" target="_blank"> <i class="fas fa-shopping-cart m-1 me-md-2"></i><p class="d-none d-md-block mb-0">My cart {{$cartTotal > 0 ? "(".$cartTotal.")" : ''}}</p> </a>
                </div>
            </div>
            <!-- Center elements -->

            <!-- Right elements -->
            <div class="col-lg-5 col-md-12 col-12">
                <div class="input-group float-center">
                    <div class="form-outline">
                        <input type="search" id="form1" class="form-control" />
                    </div>
                    <button type="button" class="btn btn-primary shadow-0">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <!-- Right elements -->
        </div>
    </div>
</div>
<!-- Jumbotron -->

    @yield('content')
<!-- Footer -->
<footer class="text-center text-lg-start text-muted mt-3" style="background-color: #f5f5f5;">
    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start pt-4 pb-4">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-12 col-lg-3 col-sm-12 mb-2">
                    <!-- Content -->
                    <a href="https://mdbootstrap.com/" target="_blank" class="">
                        <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="35" />
                    </a>
                    <p class="mt-2 text-dark">
                        © 2023 Copyright: MDBootstrap.com
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-6 col-sm-4 col-lg-2">
                    <!-- Links -->
                    <h6 class="text-uppercase text-dark fw-bold mb-2">
                        Store
                    </h6>
                    <ul class="list-unstyled mb-4">
                        <li><a class="text-muted" href="#">About us</a></li>
                        <li><a class="text-muted" href="#">Find store</a></li>
                        <li><a class="text-muted" href="#">Categories</a></li>
                        <li><a class="text-muted" href="#">Blogs</a></li>
                    </ul>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-6 col-sm-4 col-lg-2">
                    <!-- Links -->
                    <h6 class="text-uppercase text-dark fw-bold mb-2">
                        Information
                    </h6>
                    <ul class="list-unstyled mb-4">
                        <li><a class="text-muted" href="#">Help center</a></li>
                        <li><a class="text-muted" href="#">Money refund</a></li>
                        <li><a class="text-muted" href="#">Shipping info</a></li>
                        <li><a class="text-muted" href="#">Refunds</a></li>
                    </ul>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-6 col-sm-4 col-lg-2">
                    <!-- Links -->
                    <h6 class="text-uppercase text-dark fw-bold mb-2">
                        Support
                    </h6>
                    <ul class="list-unstyled mb-4">
                        <li><a class="text-muted" href="#">Help center</a></li>
                        <li><a class="text-muted" href="#">Documents</a></li>
                        <li><a class="text-muted" href="#">Account restore</a></li>
                        <li><a class="text-muted" href="#">My orders</a></li>
                    </ul>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-12 col-sm-12 col-lg-3">
                    <!-- Links -->
                    <h6 class="text-uppercase text-dark fw-bold mb-2">Newsletter</h6>
                    <p class="text-muted">Stay in touch with latest updates about our products and offers</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control border" placeholder="Email" aria-label="Email" aria-describedby="button-addon2" />
                        <button class="btn btn-light border shadow-0" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                            Join
                        </button>
                    </div>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <div class="">
        <div class="container">
            <div class="d-flex justify-content-between py-4 border-top">
                <!--- payment --->
                <div>
                    <i class="fab fa-lg fa-cc-visa text-dark"></i>
                    <i class="fab fa-lg fa-cc-amex text-dark"></i>
                    <i class="fab fa-lg fa-cc-mastercard text-dark"></i>
                    <i class="fab fa-lg fa-cc-paypal text-dark"></i>
                </div>
                <!--- payment --->

                <!--- language selector --->
                <div class="dropdown dropup">
                    <a class="dropdown-toggle text-dark" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false"> <i class="flag-united-kingdom flag m-0 me-1"></i>English </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="Dropdown">
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-united-kingdom flag"></i>English <i class="fa fa-check text-success ms-2"></i></a>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-poland flag"></i>Polski</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-china flag"></i>中文</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-japan flag"></i>日本語</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-germany flag"></i>Deutsch</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-france flag"></i>Français</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-spain flag"></i>Español</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-russia flag"></i>Русский</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-portugal flag"></i>Português</a>
                        </li>
                    </ul>
                </div>
                <!--- language selector --->
            </div>
        </div>
    </div>
</footer>
<!-- Footer -->
<script src="{{ asset('js/app.js') }}" defer></script>
@yield('script')
</body>
</html>

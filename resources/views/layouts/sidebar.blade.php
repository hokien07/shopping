<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="{{route('admin.dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('admin.category.home')}}" class="nav-link">
                        <i class="fas fa-list"></i>
                        <p>Categories </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('admin.product.home')}}" class="nav-link">
                        <i class="fab fa-product-hunt"></i>
                        <p>Products</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>

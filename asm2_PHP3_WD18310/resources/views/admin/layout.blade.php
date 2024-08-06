<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('lib/bootstrap.min.css') }}">
    <script src="{{ asset('lib/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/font-fontawesome-ae333ffef2.js') }}"></script>
    <script src="{{ asset('lib/angular.min.js') }}"></script>
    <script src="{{ asset('lib/angular-route.js') }}"></script>

    <style>
        .custom-menu-bg {
            background-color: #e0f7fa; 
        }
    </style>
</head>
<body ng-app="myApp">
    <nav class="navbar navbar-expand-sm bg-primary shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                {{-- <img src="../../img/twitter.png" style="height: 40px;" alt="Logo"> --}}
            </a>
            <ul class="navbar-nav ms-auto me-3">  
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-bell"></i></a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button> <!-- Icon tìm kiếm -->
            </form>
        </div>
    </nav>

    <div class="d-flex">
        <div class="custom-menu-bg" class="bg-light" style="width: 250px; height: calc(100vh - 56px);">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.taikhoan.index') }}"><i class="fa fa-users"></i> Quản lý tài khoản</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.sanpham.index') }}"><i class="fa fa-product-hunt"></i> Quản lý sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.danhmuc.index') }}"><i class="fa fa-list"></i> Quản lý danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.bills.index') }}"><i class="fa fa-shopping-cart"></i> Quản lý đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.khuyenmai.index') }}"><i class="fa fa-gift"></i> Quản lý khuyến mại</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.banners.index') }}"><i class="fa fa-flag"></i> Quản lý banner marketing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.bills.index') }}"><i class="fa fa-file-invoice"></i> Quản lý hóa đơn, in hóa đơn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#"><i class="fa fa-ban"></i> Disabled</a>
                </li>
            </ul>
        </div>
    
        <div class="container mt-3" style="width: calc(100% - 300px);">
            <div class="container mt-3">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>

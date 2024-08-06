<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('lib/bootstrap.min.css') }}">
    <script src="{{ asset('lib/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/font-fontawesome-ae333ffef2.js') }}"></script>
    <script src="{{ asset('lib/angular.min.js') }}"></script>
    <script src="{{ asset('lib/angular-route.js') }}"></script>
</head>
<body ng-app="myApp">
    <header>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-2 mt-2">
                        <div class="bg-light rounded d-flex justify-content-center align-items-center" style="width: 100px; height: 60px;">
                            <img src="/img/twitter.png" alt="" class="mh-100 mw-100">
                        </div>
                    </div>
                    <div class="col-4 mt-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                            <input type="text" class="form-control" placeholder="Từ khóa tìm kiếm" aria-label="Từ khóa tìm kiếm" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="fs-2 text-primary"><i class="fa-solid fa-phone"></i></div>
                                    </div>
                                    <div class="col-9">
                                        Tư vấn<br>
                                        <strong class="text-primary">0123456789</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="fs-2 text-primary"><i class="fa-regular fa-user"></i></div>
                                    </div>
                                    <div class="col-9">
                                        @auth
                                            Xin chào, {{ Auth::user()->name }}!<br>
                                            <a href="{{ route('logout') }}" class="text-decoration-none text-secondary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        @else
                                            <a href="{{ route('login') }}" class="text-decoration-none text-primary">Đăng nhập</a> <br>
                                            <a href="{{ route('register') }}" class="text-decoration-none text-secondary">Đăng ký</a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <button class="btn position-relative">
                                        <a href="{{route('cart.show')}}"><i class="fa-solid fa-cart-shopping fa-2xl"></i></a>
                                        <span class="badge bg-primary rounded-pill position-absolute top-0 end-0"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-primary mt-2">
            <div class="container bg-primary">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('home') }}">Trang chủ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pages
                                    </a>
                                    <ul class="dropdown-menu text-decoration-underline text-primary">
                                        <li><a class="dropdown-item" href="{{route('cart.show')}}">Giỏ Hàng</a></li>
                                        <li><a class="dropdown-item" href="#!trangchu">Sản Phẩm mới nhất</a></li>
                                        <li><a class="dropdown-item" href="#!timtheodanhmuc">Tìm kiếm theo danh mục</a></li>
                                        <li><a class="dropdown-item" href="#">Sale 20%</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">Giới thiệu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">Liên hệ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">Tin tức</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

    </header>
    
    <div class="container">
        @yield('content')
    </div>

    <footer class="bg-primary text-white mt-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <img src="/img/twitter.png" alt="Logo" style="width: 100px;">
                    <p class="mt-3"></p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5>Liên hệ</h5>
                    <ul class="list-unstyled">
                        <li>Địa chỉ: Gia Lâm, Hà Nội</li>
                        <li>Điện thoại: 0123 456 789</li>
                        <li>Email: z@gmail.com</li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5>Liên kết</h5>
                    <ul class="list-unstyled">
                        <li><a class="text-white" href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a class="text-white" href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a class="text-white" href="#"><i class="fab fa-youtube"></i> YouTube</a></li>
                        <li><a class="text-white" href="#"><i class="fab fa-zalo"></i> Zalo</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

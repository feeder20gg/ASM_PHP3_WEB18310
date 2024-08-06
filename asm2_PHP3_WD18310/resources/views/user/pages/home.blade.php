@extends('user.layout')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            @foreach($banners as $index => $banner)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ Storage::url('banners/' . $banner->hinh_anh) }}" alt="{{ $banner->ten_banner }}" height="400px" width="100%">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $banner->ten_banner }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form class="mt-5" method="GET" action="{{ route('home') }}" class="mb-4">
        <div class="input-group">
            <select name="danh_muc_id" class="form-select">
                <option value="">Tìm theo danh mục</option>
                @foreach($danh_mucs as $danh_muc)
                    <option value="{{ $danh_muc->id }}" {{ request('danh_muc_id') == $danh_muc->id ? 'selected' : '' }}>
                        {{ $danh_muc->ten_danh_muc }}
                    </option>
                @endforeach
            </select>
            <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
        </div>
    </form>

    <div class="container mt-4">
        <h2 class="text-center"> Danh sách sản phẩm</h2>
        <div class="row mt-5">
            @foreach($san_phams as $san_pham)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="mt-3"
                            src="{{ asset('storage/' . $san_pham->hinh_anh) }}" 
                            class="card-img-top" 
                            alt="{{ $san_pham->ten_san_pham }}"
                            style="
                                object-fit: cover; 
                                height: 200px; 
                                width: 90%; 
                                display: block; 
                                margin: 0 auto; 
                            "
                        >
                        <div class="card-body">
                            <h5 class="card-title">{{ $san_pham->ten_san_pham }}</h5>
                            <p class="card-text">{{ $san_pham->mo_ta }}</p>
                            <p class="card-text">{{ number_format($san_pham->gia, 0, ',', '.') }} VND</p>
                            <a href="{{ route('san_pham.show', $san_pham->id) }}" class="btn btn-primary">Chi tiết</a>
                            <form action="{{ route('add.to.cart', $san_pham->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Thêm vào giỏ hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

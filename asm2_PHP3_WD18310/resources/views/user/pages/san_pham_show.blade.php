@extends('user.layout')

@section('content')
    <div class="container mt-4">
        <h1>{{ $san_pham->ten_san_pham }}</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $san_pham->hinh_anh) }}" class="img-fluid" alt="{{ $san_pham->ten_san_pham }}" style="height: auto; max-width: 100%;">
            </div>
            <div class="col-md-6">
                <h2>{{ number_format($san_pham->gia, 0, ',', '.') }} VND</h2>
                <p><strong>Danh mục:</strong> {{ $danh_muc->ten_danh_muc }}</p>
                <p><strong>Mô tả:</strong> {{ $san_pham->mo_ta }}</p>

                <form action="{{ route('add.to.cart', $san_pham->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div>
    </div>
@endsection

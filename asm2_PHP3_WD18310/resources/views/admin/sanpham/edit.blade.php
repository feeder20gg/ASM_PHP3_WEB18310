@extends('admin.layout')

@section('content')
    <div class="container mt-4">
        <h1>Sửa sản phẩm</h1>
        <form action="{{ route('admin.sanpham.update', $sanPham->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="ten_san_pham" class="form-label">Tên sản phẩm:</label>
                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" value="{{ $sanPham->ten_san_pham }}" required>
            </div>

            <div class="mb-3">
                <label for="gia" class="form-label">Giá:</label>
                <input type="number" id="gia" name="gia" class="form-control" value="{{ $sanPham->gia }}" required>
            </div>

            <div class="mb-3">
                <label for="mo_ta" class="form-label">Mô tả:</label>
                <textarea id="mo_ta" name="mo_ta" class="form-control">{{ $sanPham->mo_ta }}</textarea>
            </div>

            <div class="mb-3">
                <label for="danh_muc_id" class="form-label">Danh mục:</label>
                <select id="danh_muc_id" name="danh_muc_id" class="form-select" required>
                    @foreach($danhMucs as $danhMuc)
                        <option value="{{ $danhMuc->id }}" {{ $danhMuc->id == $sanPham->danh_muc_id ? 'selected' : '' }}>
                            {{ $danhMuc->ten_danh_muc }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="anh" class="form-label">Ảnh sản phẩm:</label>
                @if($sanPham->hinh_anh)
                    <div>
                        <img src="{{ asset('storage/' . $sanPham->hinh_anh) }}" alt="{{ $sanPham->ten_san_pham }}" style="width: 100px;">
                        <a href="{{ asset('storage/' . $sanPham->hinh_anh) }}" target="_blank">Xem ảnh</a>
                    </div>
                @endif
                <input type="file" id="anh" name="anh" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection

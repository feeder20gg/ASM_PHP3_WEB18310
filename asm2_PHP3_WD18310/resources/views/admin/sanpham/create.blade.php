@extends('admin.layout')

@section('content')
    <div class="container mt-4">
        <h1>Thêm sản phẩm mới</h1>
        <form action="{{ route('admin.sanpham.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="ten_san_pham" class="form-label">Tên sản phẩm:</label>
                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="gia" class="form-label">Giá:</label>
                <input type="number" id="gia" name="gia" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="mo_ta" class="form-label">Mô tả:</label>
                <textarea id="mo_ta" name="mo_ta" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="danh_muc_id" class="form-label">Danh mục:</label>
                <select id="danh_muc_id" name="danh_muc_id" class="form-select" required>
                    @foreach($danhMucs as $danhMuc)
                        <option value="{{ $danhMuc->id }}">{{ $danhMuc->ten_danh_muc }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="anh" class="form-label">Ảnh sản phẩm:</label>
                <input type="file" id="anh" name="anh" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
@endsection

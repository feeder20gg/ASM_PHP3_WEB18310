@extends('admin.layout')

@section('content')
    <h1>Sửa khuyến mại</h1>
    <form action="{{ route('admin.khuyenmai.update', $khuyenMai->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="ten_khuyen_mai" class="form-label">Tên khuyến mại:</label>
            <input type="text" id="ten_khuyen_mai" name="ten_khuyen_mai" class="form-control" value="{{ $khuyenMai->ten_khuyen_mai }}" required>
        </div>
        <div class="mb-3">
            <label for="san_pham_id" class="form-label">Sản phẩm:</label>
            <select id="san_pham_id" name="san_pham_id" class="form-select" required>
                @foreach($sanPhams as $sanPham)
                    <option value="{{ $sanPham->id }}" {{ $khuyenMai->san_pham_id == $sanPham->id ? 'selected' : '' }}>
                        {{ $sanPham->ten_san_pham }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="gia_tri" class="form-label">Giá trị:</label>
            <input type="number" id="gia_tri" name="gia_tri" class="form-control" step="0.01" value="{{ $khuyenMai->gia_tri }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection

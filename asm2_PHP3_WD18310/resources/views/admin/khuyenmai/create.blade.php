@extends('admin.layout')

@section('content')
    <h1>Thêm khuyến mại mới</h1>
    <form action="{{ route('admin.khuyenmai.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ten_khuyen_mai" class="form-label">Tên khuyến mại:</label>
            <input type="text" id="ten_khuyen_mai" name="ten_khuyen_mai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="san_pham_id" class="form-label">Sản phẩm:</label>
            <select id="san_pham_id" name="san_pham_id" class="form-select" required>
                @foreach($sanPhams as $sanPham)
                    <option value="{{ $sanPham->id }}">{{ $sanPham->ten_san_pham }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="gia_tri" class="form-label">Giá trị:</label>
            <input type="number" id="gia_tri" name="gia_tri" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection

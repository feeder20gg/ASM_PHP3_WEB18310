@extends('admin.layout')

@section('content')
    <h1 class="mb-4">Sửa danh mục</h1>
    <form action="{{ route('admin.danhmuc.update', $danhMuc->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="ten_danh_muc">Tên danh mục:</label>
            <input type="text" id="ten_danh_muc" name="ten_danh_muc" class="form-control" value="{{ $danhMuc->ten_danh_muc }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection

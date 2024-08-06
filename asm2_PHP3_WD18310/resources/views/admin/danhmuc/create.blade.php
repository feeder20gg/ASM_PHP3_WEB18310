@extends('admin.layout')

@section('content')
    <h1 class="mb-4">Thêm danh mục mới</h1>
    <form action="{{ route('admin.danhmuc.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="ten_danh_muc">Tên danh mục:</label>
            <input type="text" id="ten_danh_muc" name="ten_danh_muc" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection

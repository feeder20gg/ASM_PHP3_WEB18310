@extends('admin.layout')

@section('content')
    <h1>Thêm Banner mới</h1>
    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="ten_banner">Tên Banner:</label>
            <input type="text" id="ten_banner" name="ten_banner" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="hinh_anh">Ảnh Banner:</label>
            <input type="file" id="hinh_anh" name="hinh_anh" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection

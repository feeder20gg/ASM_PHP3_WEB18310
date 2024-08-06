@extends('admin.layout')

@section('content')
    <h1>Sửa Banner</h1>
    <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ten_banner">Tên Banner:</label>
            <input type="text" id="ten_banner" name="ten_banner" class="form-control" value="{{ $banner->ten_banner }}" required>
        </div>
        <div class="form-group">
            <label for="hinh_anh">Ảnh Banner:</label>
            <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
            <img src="{{ Storage::url('banners/' . $banner->hinh_anh) }}" alt="{{ $banner->ten_banner }}" width="100">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection

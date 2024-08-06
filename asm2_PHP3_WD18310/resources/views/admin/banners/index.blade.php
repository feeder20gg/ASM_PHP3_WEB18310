@extends('admin.layout')

@section('content')
    <h1>Danh sách Banner</h1>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Thêm Banner mới</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Banner</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td>{{ $banner->ten_banner }}</td>
                    <td><img src="{{ Storage::url('banners/' . $banner->hinh_anh) }}" alt="{{ $banner->ten_banner }}" width="100"></td>
                    <td>
                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

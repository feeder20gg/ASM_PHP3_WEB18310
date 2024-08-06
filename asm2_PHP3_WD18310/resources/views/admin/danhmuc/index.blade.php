@extends('admin.layout')

@section('content')
    <h1 class="mb-4">Danh sách danh mục</h1>
    <a href="{{ route('admin.danhmuc.create') }}" class="btn btn-primary mb-3">Thêm danh mục mới</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($danhMucs as $danhMuc)
                <tr>
                    <td>{{ $danhMuc->id }}</td>
                    <td>{{ $danhMuc->ten_danh_muc }}</td>
                    <td>
                        <a href="{{ route('admin.danhmuc.edit', $danhMuc->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('admin.danhmuc.destroy', $danhMuc->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

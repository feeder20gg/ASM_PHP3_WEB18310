@extends('admin.layout')

@section('content')
    <h1>Danh sách khuyến mại</h1>
    <a href="{{ route('admin.khuyenmai.create') }}" class="btn btn-primary">Thêm khuyến mại mới</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên khuyến mại</th>
                <th>Sản phẩm</th>
                <th>Giá trị</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($khuyenMais as $khuyenMai)
                <tr>
                    <td>{{ $khuyenMai->id }}</td>
                    <td>{{ $khuyenMai->ten_khuyen_mai }}</td>
                    <td>{{ $khuyenMai->sanPham->ten_san_pham }}</td>
                    <td>{{ $khuyenMai->gia_tri }}</td>
                    <td>
                        <a href="{{ route('admin.khuyenmai.edit', $khuyenMai->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('admin.khuyenmai.destroy', $khuyenMai->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

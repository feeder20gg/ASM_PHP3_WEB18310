@extends('admin.layout')

@section('content')
    <div class="container mt-4">
        <h1>Danh sách sản phẩm</h1>
        <a href="{{ route('admin.sanpham.create') }}" class="btn btn-primary mb-3">Thêm sản phẩm mới</a>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                    <th>Danh mục</th>
                    <th>Hình ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sanPhams as $sanPham)
                    <tr>
                        <td>{{ $sanPham->id }}</td>
                        <td>{{ $sanPham->ten_san_pham }}</td>
                        <td>{{ $sanPham->gia }}</td>
                        <td>{{ $sanPham->mo_ta }}</td>
                        <td>{{ $sanPham->danhMuc->ten_danh_muc }}</td>
                        <td>
                            @if($sanPham->hinh_anh)
                                <img src="{{ asset('storage/' . $sanPham->hinh_anh) }}" alt="{{ $sanPham->ten_san_pham }}" style="width: 100px;">
                            @else
                                Không có ảnh
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.sanpham.edit', $sanPham->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('admin.sanpham.destroy', $sanPham->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

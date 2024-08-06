@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Chi tiết đơn hàng</h2>

    <div class="mb-3">
        <strong>Người mua:</strong> {{ $bill->user->name }}
    </div>
    <div class="mb-3">
        <strong>Địa chỉ:</strong> {{ $bill->address }}
    </div>
    <div class="mb-3">
        <strong>Số điện thoại:</strong> {{ $bill->phone }}
    </div>
    <div class="mb-3">
        <strong>Trạng thái:</strong> {{ $bill->status }}
    </div>

    <h4>Sản phẩm trong đơn hàng</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Img</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            @php
                $tongtien = 0; 
            @endphp
            @foreach($bill->items as $item)
                @php
                    $product = $item->product; 
                    $sp = $product->gia * $item->quantity;
                    $tongtien += $sp; 
                @endphp
                <tr>
                    <td>{{ $product->ten_san_pham }}</td>
                    <td><img src="{{ asset('storage/' . $product->hinh_anh) }}" alt="{{ $product->ten_san_pham }}" style="width: 100px;"></td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($product->gia, 2, ',', '.') }} VND</td>
                    <td>{{ number_format($sp, 2, ',', '.') }} VND</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-end"><strong>Tổng tiền:</strong></td>
                <td><strong>{{ number_format($tongtien, 2, ',', '.') }} VND</strong></td>
            </tr>
        </tfoot>
    </table>

    <form action="{{ route('admin.bills.update', $bill->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select class="form-control" id="status" name="status">
                <option value="Chưa xác nhận" {{ $bill->status == 'Chưa xác nhận' ? 'selected' : '' }}>Chưa xác nhận</option>
                <option value="Đã xác nhận" {{ $bill->status == 'Đã xác nhận' ? 'selected' : '' }}>Đã xác nhận</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection

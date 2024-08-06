@extends('user.layout')

@section('content')
<div class="container mt-4">
    <h2>Giỏ hàng của bạn</h2>

    @if($carts->isEmpty())
        <p>Giỏ hàng ko có j.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sum = 0;
                @endphp
                @foreach($carts as $cart)
                    @php

                        $product = $products->firstWhere('id', $cart->product_id);
                        
                        $sp = $product->gia * $cart->quantity;
                        $sum += $sp; 
                    @endphp
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $product->hinh_anh) }}" alt="{{ $product->ten_san_pham }}" style="width: 100px;">
                        </td>
                        <td>{{ $product->ten_san_pham }}</td>
                        <td>{{ number_format($product->gia, 0, ',', '.') }} VND</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>{{ number_format($sp, 0, ',', '.') }} VND</td>
                        <td>
                            <form action="{{ route('cart.remove', $cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-end"><strong>Tổng tiền:</strong></td>
                    <td><strong>{{ number_format($sum, 0, ',', '.') }} VND</strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <form action="{{ route('order.place') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <button type="submit" class="btn btn-primary">Đặt hàng</button>
        </form>
    @endif
</div>
@endsection

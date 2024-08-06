<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <h1>Xác nhận đơn hàng</h1>
    <p><strong>Địa chỉ giao hàng:</strong> {{ $bill->address }}</p>
    <p><strong>Số điện thoại:</strong> {{ $bill->phone }}</p>
    <p><strong>Tình trạng:</strong> {{ $bill->status }}</p>
    <h2>Chi tiết đơn hàng:</h2>
    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bill->items as $item)
                <tr>
                    <td>{{ $item->product->ten_san_pham }}</td>
                    <td>{{ $item->product->hinh_anh}}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->product->gia, 0, ',', '.') }} VND</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Cảm ơn bạn đã mua hàng!</p>
</body>
</html>

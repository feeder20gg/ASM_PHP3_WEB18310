@extends('admin.layout')

@section('content')
    <div class="container mt-4">
        <h2>Quản lý đơn hàng</h2>
        <div class="mb-4">
            <h4></h4>
            @if($bills->isEmpty())
                <p>Hiện tại không có đơn hàng nào.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Người mua</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bills as $bill)
                            <tr>
                                <td>{{ $bill->id }}</td>
                                <td>{{  $bill->user->name  }}</td>
                                <td>{{ $bill->address }}</td>
                                <td>{{ $bill->phone }}</td>
                                <td>{{ $bill->status }}</td>
                                <td>
                                    <a href="{{ route('admin.bills.show', $bill->id) }}" class="btn btn-info">Xem</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        @isset($selectedBill)
            <div id="bill-details">
                @include('admin.bill.show', ['bill' => $selectedBill])
            </div>
        @endisset
    </div>
@endsection

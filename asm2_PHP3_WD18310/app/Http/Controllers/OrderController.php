<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bills; 
use App\Models\BillItem; 
use App\Models\carts;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    public function placeOrder(Request $request)
{
    $request->validate([
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
    ]);

    $userId = Auth::id();
    $address = $request->input('address');
    $phone = $request->input('phone');

    $bill = Bills::create([
        'user_id' => $userId,
        'address' => $address,
        'phone' => $phone,
        'status' => 'Chưa xác nhận',
    ]);

    $carts = carts::where('user_id', $userId)->get();
    foreach ($carts as $cart) {
        BillItem::create([
            'bill_id' => $bill->id,
            'product_id' => $cart->product_id,
            'quantity' => $cart->quantity,
        ]);
    }

    carts::where('user_id', $userId)->delete();

    Mail::to(Auth::user()->email)->send(new OrderMail($bill));

    return redirect()->route('home')->with('success', 'Đặt hàng thành công!');
}

}

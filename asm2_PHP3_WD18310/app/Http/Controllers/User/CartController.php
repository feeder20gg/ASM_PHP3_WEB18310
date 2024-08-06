<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\carts;
use App\Models\san_phams;

class CartController extends Controller
{
    public function showCart()
    {
        $userId = Auth::id();

        $carts = carts::where('user_id', $userId)->get();
        $products = san_phams::whereIn('id', $carts->pluck('product_id'))->get();
        
        return view('user.pages.cart', [
            'carts' => $carts,
            'products' => $products,
        ]);
    }
    public function removeFromCart($id)
{
    $userId = Auth::id();
    
    carts::where('user_id', $userId)->where('id', $id)->delete();
    
    return redirect()->route('cart.show');
}

}

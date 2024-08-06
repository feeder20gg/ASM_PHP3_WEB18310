<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\banners;
use App\Models\san_phams;
use App\Models\danh_mucs; 
use Illuminate\Http\Request;
use App\Models\carts;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $banners = banners::all();
        $danh_mucs = danh_mucs::all(); 

        $san_phams_query = san_phams::query();

        if ($request->has('danh_muc_id') && $request->danh_muc_id) {
            $san_phams_query->where('danh_muc_id', $request->danh_muc_id);
        }

        $san_phams = $san_phams_query->get();

        return view('user.pages.home', compact('banners', 'san_phams', 'danh_mucs')); // Thêm danh sách danh mục vào view
    }
    

    public function addToCart(Request $request, $productId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }
    
        $userId = Auth::id();
        
        $cart = carts::where('user_id', $userId)
                    ->where('product_id', $productId)
                    ->first();
                    
        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            carts::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }
    
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }
    public function show($id)
{
    $san_pham = san_phams::findOrFail($id);
    $danh_muc = $san_pham->danhMuc; 
    return view('user.pages.san_pham_show', compact('san_pham', 'danh_muc'));
}
}

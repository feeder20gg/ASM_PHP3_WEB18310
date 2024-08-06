<?php

namespace App\Http\Controllers;
use App\Models\san_phams;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id){
    $san_pham = san_phams::findOrFail($id);
    $danh_muc = $san_pham->danhMuc; 
    return view('user.san_pham_show', compact('san_pham', 'danh_muc'));
}
    public function index()
    {
        return view('home');
    }

}

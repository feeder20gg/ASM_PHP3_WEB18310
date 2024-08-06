<?php

namespace App\Http\Controllers;

use App\Models\khuyen_mais;
use App\Models\san_phams;
use Illuminate\Http\Request;

class KhuyenMaiController extends Controller
{
    public function index()
    {
        $khuyenMais = khuyen_mais::all();
        return view('admin.khuyenmai.index', compact('khuyenMais'));
    }

    public function create()
    {
        $sanPhams = san_phams::all();
        return view('admin.khuyenmai.create', compact('sanPhams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_khuyen_mai' => 'required|string|max:255',
            'san_pham_id' => 'required|exists:san_phams,id',
            'gia_tri' => 'required|numeric|min:0',
        ]);

        khuyen_mais::create($request->all());
        return redirect()->route('admin.khuyenmai.index');
    }

    public function edit(khuyen_mais $khuyenMai)
    {
        $sanPhams = san_phams::all();
        return view('admin.khuyenmai.edit', compact('khuyenMai', 'sanPhams'));
    }

    public function update(Request $request, khuyen_mais $khuyenMai)
    {
        $request->validate([
            'ten_khuyen_mai' => 'required|string|max:255',
            'san_pham_id' => 'required|exists:san_phams,id',
            'gia_tri' => 'required|numeric|min:0',
        ]);

        $khuyenMai->update($request->all());
        return redirect()->route('admin.khuyenmai.index');
    }

    public function destroy(khuyen_mais $khuyenMai)
    {
        $khuyenMai->delete();
        return redirect()->route('admin.khuyenmai.index');
    }
}

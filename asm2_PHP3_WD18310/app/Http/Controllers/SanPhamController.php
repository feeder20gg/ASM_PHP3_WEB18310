<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\san_phams;
use App\Models\danh_mucs;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    public function index()
    {
        $sanPhams = san_phams::with('danhMuc')->get();
        return view('admin.sanpham.index', compact('sanPhams'));
    }

    public function create()
    {
        $danhMucs = danh_mucs::all();
        return view('admin.sanpham.create', compact('danhMucs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_san_pham' => 'required|string|max:255',
            'gia' => 'required|numeric',
            'mo_ta' => 'nullable|string',
            'danh_muc_id' => 'required|exists:danh_mucs,id',
            'anh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $sanPham = new san_phams;
        $sanPham->ten_san_pham = $request->input('ten_san_pham');
        $sanPham->gia = $request->input('gia');
        $sanPham->mo_ta = $request->input('mo_ta');
        $sanPham->danh_muc_id = $request->input('danh_muc_id');

        if ($request->hasFile('anh')) {
            $file = $request->file('anh');
            $path = $file->store('sanpham', 'public');
            $sanPham->hinh_anh = $path;
        }

        $sanPham->save();

        return redirect()->route('admin.sanpham.index')->with('success', 'Sản phẩm đã được thêm!');
    }

    public function edit($id)
    {
        $sanPham = san_phams::findOrFail($id);
        $danhMucs = danh_mucs::all();
        return view('admin.sanpham.edit', compact('sanPham', 'danhMucs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ten_san_pham' => 'required|string|max:255',
            'gia' => 'required|numeric',
            'mo_ta' => 'nullable|string',
            'danh_muc_id' => 'required|exists:danh_mucs,id',
            'anh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $sanPham = san_phams::findOrFail($id);
        $sanPham->ten_san_pham = $request->input('ten_san_pham');
        $sanPham->gia = $request->input('gia');
        $sanPham->mo_ta = $request->input('mo_ta');
        $sanPham->danh_muc_id = $request->input('danh_muc_id');

        if ($request->hasFile('anh')) {
            if ($sanPham->hinh_anh) {
                Storage::disk('public')->delete($sanPham->hinh_anh);
            }
            $file = $request->file('anh');
            $path = $file->store('sanpham', 'public');
            $sanPham->hinh_anh = $path;
        }

        $sanPham->save();

        return redirect()->route('admin.sanpham.index')->with('success', 'Sản phẩm đã được cập nhật!');
    }

    public function destroy($id)
    {
        $sanPham = san_phams::findOrFail($id);
        if ($sanPham->hinh_anh) {
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }
        $sanPham->delete();

        return redirect()->route('admin.sanpham.index');
    }
}

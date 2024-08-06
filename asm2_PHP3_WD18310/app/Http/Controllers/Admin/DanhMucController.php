<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\danh_mucs;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function index()
    {
        $danhMucs = danh_mucs::all();
        return view('admin.danhmuc.index', compact('danhMucs'));
    }

    public function create()
    {
        return view('admin.danhmuc.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_danh_muc' => 'required|string|max:255',
        ]);

        danh_mucs::create($request->all());
        return redirect()->route('admin.danhmuc.index')->with('success', 'Danh mục được thêm thành công.');
    }

    public function edit(danh_mucs $danhMuc)
    {
        return view('admin.danhmuc.edit', compact('danhMuc'));
    }

    public function update(Request $request, danh_mucs $danhMuc)
    {
        $request->validate([
            'ten_danh_muc' => 'required|string|max:255',
        ]);

        $danhMuc->update($request->all());
        return redirect()->route('admin.danhmuc.index')->with('success', 'Danh mục được cập nhật thành công.');
    }

    public function destroy(danh_mucs $danhMuc)
    {
        $danhMuc->delete();
        return redirect()->route('admin.danhmuc.index')->with('success', 'Danh mục được xóa thành công.');
    }
}

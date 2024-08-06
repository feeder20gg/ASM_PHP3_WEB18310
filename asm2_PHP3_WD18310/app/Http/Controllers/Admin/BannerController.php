<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = banners::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_banner' => 'required|string|max:255',
            'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('hinh_anh')->store('public/banners');

        banners::create([
            'ten_banner' => $request->ten_banner,
            'hinh_anh' => basename($path),
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner đã được thêm thành công!');
    }

    public function edit(banners $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, banners $banner)
    {
        $request->validate([
            'ten_banner' => 'required|string|max:255',
            'hinh_anh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('hinh_anh')) {
            Storage::delete('public/banners/' . $banner->hinh_anh);

            $path = $request->file('hinh_anh')->store('public/banners');
            $banner->hinh_anh = basename($path);
        }

        $banner->ten_banner = $request->ten_banner;
        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Banner đã được cập nhật thành công!');
    }

    public function destroy(banners $banner)
    {
        Storage::delete('public/banners/' . $banner->hinh_anh);
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner đã được xóa thành công!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.taikhoan.index', compact('users'));
    }

    public function create()
    {
        return view('admin.taikhoan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,staff,user',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.taikhoan.index')->with('success', 'Tài khoản đã được tạo thành công!');
    }

    public function edit(User $user)
    {
        return view('admin.taikhoan.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:1|confirmed',
        'role' => 'required|in:admin,staff,user',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }
    $user->role = $request->role;
    $user->save();

    return redirect()->route('admin.taikhoan.index')->with('success', 'Tài khoản đã được cập nhật thành công!');
}


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.taikhoan.index');
    }
}

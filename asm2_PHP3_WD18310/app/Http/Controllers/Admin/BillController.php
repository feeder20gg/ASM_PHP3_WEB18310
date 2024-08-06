<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bills;
use App\Models\BillItem;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bills::with('items')->get(); 
        return view('admin.bills.index', compact('bills'));
    }

    public function show($id)
    {
        $bill = Bills::with('items.product')->findOrFail($id);
        return view('admin.bills.show', compact('bill'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $bill = Bills::findOrFail($id);
        $bill->status = $request->input('status');
        $bill->save();

        return redirect()->route('admin.bills.show', $bill->id)->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }
}

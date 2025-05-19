<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersystemController extends Controller
{
public function index($lang)
{
    // جلب كل الطلبات مع العناصر والمنتجات المرتبطة بها
    $orders = Order::with('items.product')->get();

    return view('admin.order.index', compact('orders'));
}
public function show($lang,Order $order)
{
    $order->load('user', 'items.product'); // جلب البيانات المرتبطة لتقليل الاستعلامات
    return view('admin.order.show', compact('order'));
}
public function updateStatus($lang,Request $request, Order $order)
{
    $request->validate([
        'status' => 'required|string|in:Pending,Sent,Delivered,Cancelled', // حسب الحالات المتاحة عندك
    ]);

    $order->status = $request->status;
    $order->save();

    return redirect()->back()->with('success', __('pages.status_updated_successfully'));
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // تأكد أن المستخدم مسجل دخول قبل أي شيء
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * حفظ الطلب بناءً على بيانات الفورم وعناصر العربة
     */
    public function store($lang, Request $request)
    {
        // التحقق من صحة البيانات الواردة
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'phone'      => 'required|string|max:20',
            'email'      => 'required|email|max:255',
            'country'    => 'required|string|max:255',
            'city'       => 'required|string|max:255',
            'address'    => 'required|string|max:500',
            'delivery_day' => 'nullable|date',
            'delivery_time' => 'nullable',
            'note'       => 'nullable|string',
        ]);

        $userId = Auth::id();

        // جلب كل العناصر في عربة المستخدم
        $cartItems = Cart::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'عربة التسوق فارغة');
        }

        // انشاء سجل الطلب
        $order = Order::create([
            'user_id' => $userId,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'delivery_day' => $request->delivery_day,
            'delivery_time' => $request->delivery_time,
            'note' => $request->note,
        ]);

        // اضافة تفاصيل الطلب (كل منتج في العربة)
        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'color' => $item->color,
                'size' => $item->size,
                'quantity' => $item->quantity,
                'price' => $item->cost / $item->quantity,
            ]);
        }

        // حذف عناصر العربة بعد اكتمال الطلب
        Cart::where('user_id', $userId)->delete();

        return redirect()->route('home.page', $lang)->with('success', 'تم إنشاء الطلب بنجاح');
    }
    public function index($lang){
            $userId = auth()->id(); // أو أي طريقة تعتمدها للحصول على المستخدم الحالي
    $cartItems = Cart::with('product')
        ->where('user_id', $userId)
        ->get();

        return view('website.checkout.index', compact('cartItems'));
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add($lang, Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'color' => 'nullable|string',
                'size' => 'nullable|string',
                'quantity' => 'required|integer|min:1',
            ]);

            $productId = $request->product_id;
            $userId = Auth::id();
            $color = $request->color ?? null;
            $size = $request->size ?? null;
            $quantity = $request->quantity;

            $product = Product::findOrFail($productId);
            $price = $product->discount_price ?? $product->price;
            $cost = $price * $quantity;

            $cartItem = Cart::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->where('color', $color)
                            ->where('size', $size)
                            ->first();


            if ($cartItem) {
                $cartItem->quantity += $quantity;
                $cartItem->cost += $cost;
                $cartItem->save();
            } else {
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'color' => $color,
                    'size' => $size,
                    'quantity' => $quantity,
                    'cost' => $cost,
                ]);
            }

            if ($request->ajax()) {
                return response()->json(['message' => 'تم إضافة المنتج إلى العربة.']);
            }

            return redirect()->back()->with('success', 'تم إضافة المنتج إلى العربة.');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'message' => 'حدث خطأ أثناء إضافة المنتج.',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة المنتج.');
        }
    }
    public function index($lang){
            $userId = auth()->id(); // أو أي طريقة تعتمدها للحصول على المستخدم الحالي
    $cartItems = Cart::with('product')
        ->where('user_id', $userId)
        ->get();

        return view('website.cart.index', compact('cartItems'));
    }
    public function update($lang,Request $request, $id)
{
    $cart = Cart::where('user_id', auth()->id())->where('id', $id)->firstOrFail();
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);
    $cart->quantity = $request->quantity;
    $cart->save();

    return redirect()->back()->with('success', 'Cart updated successfully');
}

public function destroy($lang,$id)
{
    $cart = Cart::where('user_id', auth()->id())->where('id', $id)->firstOrFail();
    $cart->delete();

    return redirect()->back()->with('success', 'Item removed from cart');
}

}

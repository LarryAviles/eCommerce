<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $subtotal = 0;

        foreach ($cartItems as $cartItem) {
            $subtotal += $cartItem->product->price * $cartItem->quantity;
        }

        return view('cart.index', compact('cartItems', 'subtotal'));
    }

    public function removeFromCart($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart')->with('success', 'Product removed from cart.');
    }

    public function updateQuantity(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->update(['quantity' => $cartItem->product->quantity + 1]);

        return redirect()->route('cart')->with('success', 'Quantity updated.');
    }

    public function clearCart()
    {
        $user = Auth::user();
        CartItem::where('user_id', $user->id)->delete();

        return redirect()->route('cart')->with('success', 'Cart cleared.');
    }
}

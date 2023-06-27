<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('products.index', ['products' => Product::all()]);
    }

    public function view()
    {

    }

    public function filter(Request $request)
    {
        $query = Product::query();

        if ($request->category != 'all') {
            $query->where('category', $request->category);
        }

        if ($request->min_price != 0) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->max_price != 100) {
            $query->where('price', '<=', $request->max_price);
        }


        $products = $query->get();
        return view('products.index', compact('products'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();
        dd($product);
        $cartItem = CartItem::where('product_id', $product->id)->where('user_id', $user->id)->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $cartItem->quantity + 1]);
        } else {
            CartItem::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Product added to cart.');
    }

    public function removeFromCart($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart')->with('success', 'Product removed from cart.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService;
    }

    public  function index()
    {
        $cart = $this->cartService;

        return view('web.sections.static.cart', compact('cart'));
    }

    public function remove(Product $product)
    {

        if ($this->cartService->remove($product)) {
            return back();
        }

        return back()->with('error', 'Failed to remove product from cart');
    }
}

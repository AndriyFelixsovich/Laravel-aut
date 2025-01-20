<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreatedMail;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function createOrder()
    {
        if ($this->cartService->isEmpty()) return back();

        /** @var Order $order */
        $order = Order::query()->create([
           'user_id' => auth()->user()->getAuthIdentifier(),
            'total'  => $this->cartService->getTotal()
        ]);

        foreach ($this->cartService->get() as $item) {
            OrderProduct::query()->create([
                'order_id' => $order->id,
                'product_id' => $item->id,
            ]);
        }
        $this->cartService->clear();

        Mail::to('order@gmail.com')->send(new OrderCreatedMail($order));

        return redirect()->route('site');
    }
}

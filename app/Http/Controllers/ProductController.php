<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Order;
use App\Models\Phone;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\User;
use App\Services\CartService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    protected CartService $cartService;

    public function __construct() {
        $this->cartService = new CartService;
    }
    public function addToCart($id)
    {
        /** @var Product $product */
        $product = Product::query()->find($id);

        if (is_null($product)) {
            return back();
        }

        $this->cartService->add($product);

        return back();
    }


    /**
     * All products - page
     * @return Factory|View|Application
     */
    public function allProducts(Request $request)
    {

        /*$phone = User::with('phone')->get();
        foreach ($phone as $user) {
//            if ($user->phone) {
                echo $user->phone->number .  '</br>';
//            } else {
//               continue;
//            }
        }*/

        $users = User::where('id', '<', 10)->get();

        $posts = Phone::whereBelongsTo($users)->get();

        $user = User::find(14)->latestOrder;
dd($user);
        $collections = Collection::all();
        $products = Product::query()->where('is_published', '=', 'true');

        if ($request->has('collection')) {
            $products = $products->where('collections_id', '=', $request->get('collection'));
        }

        $products = $products->paginate(20)->withQueryString();

        return view('web.sections.static.product', compact('products', 'collections'));
    }
}

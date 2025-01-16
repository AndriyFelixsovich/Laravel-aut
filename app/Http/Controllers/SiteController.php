<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $collections = Collection::take(4)->get();
        $products = Product::query()->where('is_published', '=', 'true')->take(12)->get();

        return view('web.layout.site', compact('collections','products'));
    }
}

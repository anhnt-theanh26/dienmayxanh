<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request, string $slug)
    {
        $results = Product::join('categories', 'categories.id', '=', 'products.category_id')->where('categories.slug', $slug)->select('products.*')->get();
        $style = 'category';
        $keyword = $slug;
        return view('client.page.search.index', compact('results', 'style', 'keyword'));
    }
}

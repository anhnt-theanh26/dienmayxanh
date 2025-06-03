<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use function JmesPath\search;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $request->validate([
                'keyword' => 'required|string|max:255',
            ]);
            $keyword = trim($request->input('keyword'));
            if (mb_strlen($keyword) < 2) {
                Alert::warning('Thông báo', 'Từ khóa tìm kiếm quá ngắn, vui lòng nhập nhiều hơn 1 ký tự.');
                return redirect()->back()->with('error', 'Từ khóa tìm kiếm quá ngắn, vui lòng nhập nhiều hơn 1 ký tự.');
            }
            $results = Product::when($keyword, function ($query, $keyword) {
                return $query->where('name', 'LIKE', '%' . $keyword . '%');
            })->orderBy('id', 'desc')->get();
            if ($keyword != '') {
                $search = Search::where('search', $keyword)->first();
                if (!$search) {
                    Search::create([
                        'search' => $keyword,
                        'user_id' => Auth::check() ? Auth::user()->id : null,
                    ]);
                }
            }
            $style = 'search';
            return view('client.page.search.index', compact('results', 'keyword', 'style'));
        } catch (\Throwable $th) {
            Alert::error('Đã xảy ra lỗi:', $th->getMessage());
            return redirect()->route('index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function arrange(Request $request)
    {
        $keyword = trim($request->input('keyword'));
        $type = $request->input('type');
        $style = $request->input('style');
        if ($style == 'search') {
            $query = Product::query()
                ->select('products.*')
                ->when($keyword, function ($q) use ($keyword) {
                    return $q->where('products.name', 'LIKE', '%' . $keyword . '%');
                });
        }
        if ($style == 'category') {
            $query = Product::join('categories', 'categories.id', '=', 'products.category_id')->where('categories.slug', $keyword)->select('products.*');
        }

        switch ($type) {
            case 'outstanding':
                $query->orderBy('is_hot', 'desc');
                break;

            case 'selling-well':
                $query->orderBy('sold', 'desc');
                break;

            case 'discount':
                $query->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                    ->selectRaw('MAX(product_variants.price_old - product_variants.price) AS max_discount')
                    ->groupBy('products.id')
                    ->orderByDesc('max_discount');
                break;

            case 'new':
                $query->orderBy('products.created_at', 'desc');
                break;

            case 'low-high':
                $query->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                    ->selectRaw('MIN(product_variants.price) AS min_price')
                    ->groupBy('products.id')
                    ->orderBy('min_price', 'asc');
                break;

            case 'high-low':
                $query->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                    ->selectRaw('MAX(product_variants.price) AS max_price')
                    ->groupBy('products.id')
                    ->orderBy('max_price', 'desc');
                break;

            default:
                $query->orderBy('products.id', 'desc');
                break;
        }

        $results = $query->get();
        return view('client.page.search.show', compact('results'));
    }
    public function filter(Request $request)
    {
        $keyword = trim($request->input('keyword'));
        $type = $request->input('type');
        $style = $request->input('style');
        if ($style == 'category') {
            $query = Product::join('categories', 'categories.id', '=', 'products.category_id')->where('categories.slug', $keyword)->select('products.*');
        }
        if ($style == 'search') {
            $query = Product::query()->select('products.*')
                ->with(['variants', 'attributeValues.attribute'])
                ->when($keyword, function ($q) use ($keyword) {
                    return $q->where('products.name', 'LIKE', '%' . $keyword . '%');
                });
        }
        if ($request->filled('category')) {
            $query->whereIn('category_id', $request->category);
        }
        if ($request->filled('min') || $request->filled('max')) {
            $query->whereHas('variants', function ($q) use ($request) {
                if ($request->filled('min')) {
                    $q->where('price', '>=', $request->min);
                }
                if ($request->filled('max')) {
                    $q->where('price', '<=', $request->max);
                }
            });
        }
        if ($request->filled('attribute')) {
            $query->whereHas('attributeValues', function ($q) use ($request) {
                $q->where(function ($orQ) use ($request) {
                    foreach ($request->attribute as $attributeId => $values) {
                        $valuesLower = array_map('strtolower', $values);
                        $orQ->orWhere(function ($subQ) use ($attributeId, $valuesLower) {
                            $subQ->where('attribute_id', $attributeId)
                                ->whereIn(DB::raw('LOWER(value)'), $valuesLower);
                        });
                    }
                });
            });
        }
        $results = $query->get();
        return view('client.page.search.show', compact('results'));
    }
}

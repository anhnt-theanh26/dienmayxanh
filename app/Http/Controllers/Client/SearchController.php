<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
                return redirect()->back()->with('error', 'Từ khóa tìm kiếm quá ngắn, vui lòng nhập nhiều hơn 1 ký tự.');
            }
            $results = Product::when($keyword, function ($query, $keyword) {
                return $query->where('name', 'LIKE', '%' . $keyword . '%');
            })->orderBy('id', 'desc')->get();
            Search::create([
                'keyword' => $keyword,
                'user_id' => Auth::check() ? Auth::user()->id : null,
            ]);
            if ($results->isEmpty()) {
                Alert::info('Không tìm thấy sản phẩm phù hợp với từ khóa: "' . $keyword . '"');
            }
            return view('client.page.search.search', compact('results', 'keyword'));

        } catch (\Throwable $th) {
            Alert::error('Đã xảy ra lỗi:', $th->getMessage());
            return redirect()->route('index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function filter(Request $request)
    {
        $keyword = trim($request->input('keyword'));
        $type = $request->input('type');
        $query = Product::query()
            ->select('products.*')
            ->when($keyword, function ($q) use ($keyword) {
                return $q->where('products.name', 'LIKE', '%' . $keyword . '%');
            });

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
        // return $type;
        return view('client.page.search.result', compact('results'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

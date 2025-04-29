<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.page.product.index', compact('products'));
        // if (Auth::user()->can('index product')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $attributes = Attribute::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.page.product.create', compact('categories', 'attributes'));
        // if (Auth::user()->can('create product')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $originalSlug = Str::slug($request->sku);
        $slug = $originalSlug;
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        $request->merge(['slug' => $slug]);
        $validated = $request->validate([
            'sku' => 'required|string|max:255|unique:products,sku',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'image' => 'nullable|url|max:255',
            'is_hot' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            // images table 
            'images' => 'nullable|url|max:255',
            // attributes table
            'attribute_value' => 'nullable|array',
            'attribute_value.*' => 'array',
            'attribute_value.*.*' => 'required|string|max:255',
            // variants table
            'variants' => 'required|array|min:1',
            'variants.*.name' => 'required|string|max:255',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.stock_quantity' => 'required|integer|min:0',
            'variants.*.status' => 'required|in:draft,published',
        ]);
        $dataProduct = [
            'sku' => $request->sku,
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
            'image' => $request->image,
            'view_count' => 0,
            'is_hot' => $request->has('is_hot') ? true : false,
            'category_id' => $request->category_id,
        ];
        try {
            $product = Product::create($dataProduct);
            if (!empty($request->images)) {
                $imagesInput = $request->images;
                $imagesArray = explode(',end,', $imagesInput);

                ProductImage::create([
                    'image' => json_encode($imagesArray), // lưu dạng JSON string
                    'product_id' => $product->id,
                ]);
            }
            if (!empty($request->variants) && is_array($request->variants)) {
                foreach ($request->variants as $variant) {
                    $dataVariants[] = [
                        'name' => $variant['name'],
                        'price' => $variant['price'],
                        'stock_quantity' => $variant['stock_quantity'],
                        'status' => $variant['status'],
                        'product_id' => $product->id,
                    ];
                }
                // Lưu variant
                foreach ($dataVariants as $variant) {
                    ProductVariant::create($variant);
                }
            }
            if (!empty($request->attribute_value) && is_array($request->attribute_value)) {
                foreach ($request->attribute_value as $attributeId => $values) {
                    foreach ($values as $value) {
                        $dataAttributes[] = [
                            'value' => $value,
                            'product_id' => $product->id,
                            'attribute_id' => $attributeId,
                        ];
                    }
                }
                // Lưu attribute value
                foreach ($dataAttributes as $attr) {
                    ProductAttributeValue::create($attr);
                }
            }
            if ($product) {
                Alert::success('Thanh cong', 'Them moi san pham thanh cong');
            }
            return redirect()->route('admin.product.index')->with('success', 'Thêm mới sản phẩm thành công');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('store product')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!$product) {
            Alert::error('Khong tim thay san pham:');
            return redirect()->route('admin.product.index')->with('error', 'Khong tim thay san pham');
        }
        return view('admin.page.product.show', compact('product'));
        // if (Auth::user()->can('show product')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $attributes = Attribute::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        if (!$product) {
            Alert::error('Khong tim thay san pham:');
            return redirect()->route('admin.product.index')->with('error', 'Khong tim thay san pham');
        }
        return view('admin.page.product.edit', compact('categories', 'product', 'attributes'));
        // if (Auth::user()->can('edit product')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }
    function remove_items_once($fromArray, $removeArray)
    {
        foreach ($removeArray as $item) {
            $index = array_search($item, $fromArray);
            if ($index !== false) {
                unset($fromArray[$index]);
            }
        }
        return array_values($fromArray); // reset key
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!$product) {
            Alert::error('Khong tim thay san pham:');
            return redirect()->route('admin.product.index')->with('error', 'Không tìm thấy sản phẩm');
        }

        $originalSlug = Str::slug($request->sku);
        $newSlug = $originalSlug;
        $count = 1;
        while (Product::where('slug', $newSlug)->where('slug', '!=', $product->newSlug)->exists()) {
            $newSlug = $originalSlug . '-' . $count++;
        }
        $request->merge([
            'slug' => $newSlug
        ]);
        $validated = $request->validate([ // validate
            'sku' => 'required|string|max:255|unique:products,sku,' . $product->id,
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            'image' => 'nullable|url|max:255',
            'is_hot' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            // images table 
            'images' => 'nullable|url|max:255',
            // attributes table
            'attribute_value' => 'nullable|array',
            'attribute_value.*' => 'array',
            'attribute_value.*.*' => 'required|string|max:255',
            'old_attribute_value' => 'nullable|array',
            'old_attribute_value.*' => 'array',
            'old_attribute_value.*.*' => 'required|string|max:255',
            // variants table
            'variants' => 'required|array|min:1',
            'variants.*.name' => 'required|string|max:255',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.stock_quantity' => 'required|integer|min:0',
            'variants.*.status' => 'required|in:draft,published',
        ]);
        $dataProduct = [ // dataproduct
            'sku' => $request->sku,
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $newSlug,
            'image' => $request->image,
            'view_count' => 0,
            'is_hot' => $request->has('is_hot') ? true : false,
            'category_id' => $request->category_id,
        ];
        try {
            $product->update($dataProduct); // update product
            if (!empty($request->imageUrlOld)) { // images
                $imagesOld = json_decode(ProductImage::where('product_id', $product->id)->first()->image, true);
                $imageArrDel = explode(',end,', $request->imageUrlOld);
                $imageArrNew = $this->remove_items_once($imagesOld, $imageArrDel);
                if (!empty($request->images)) {
                    $imagesInput = $request->images;
                    $imagesArray = explode(',end,', $imagesInput);
                    $imageArrayNew = array_merge($imageArrNew, $imagesArray);
                    $dataImages = [
                        'image' => json_encode($imageArrayNew),
                        'product_id' => $product->id,
                    ];
                } else {
                    $dataImages = [
                        'image' => json_encode($imageArrNew),
                        'product_id' => $product->id,
                    ];
                }
                $product->images()->update($dataImages); // update images
            } else { // images
                $imagesOld = json_decode(ProductImage::where('product_id', $product->id)->first()->image, true);
                if (!empty($request->images)) {
                    $imagesInput = $request->images;
                    $imagesArray = explode(',end,', $imagesInput);
                    $imageArrayNew = array_merge($imagesOld, $imagesArray);
                    $dataImages = [
                        'image' => json_encode($imageArrayNew),
                        'product_id' => $product->id,
                    ];
                    $product->images()->update($dataImages); // update images
                }
            }
            if (!empty($request->variants) && is_array($request->variants)) { //old variants
                foreach ($request->variants as $variant) { //update data Variantsold
                    $dataVariantsold[] = [
                        'id' => $variant['id'],
                        'name' => $variant['name'],
                        'price' => $variant['price'],
                        'stock_quantity' => $variant['stock_quantity'],
                        'status' => $variant['status'],
                        'product_id' => $product->id,
                    ];
                }
                foreach ($dataVariantsold as $variantData) {
                    ProductVariant::where('id', $variantData['id'])->update($variantData);
                }
            }
            if (!empty($request->old_attribute_value) && is_array($request->old_attribute_value)) { //old_attribute_value
                foreach ($request->old_attribute_value as $value) { // attribute old 
                    $dataAttributesOld[] = [
                        'id' => $value['id'],
                        'value' => $value['value'],
                        'attribute_id' => $value['attribute_id'],
                    ];
                }
                foreach ($dataAttributesOld as $attrData) {
                    ProductAttributeValue::where('id', $attrData['id'])->update($attrData);
                }
            }
            if ($request->newvariants) { //dataVariantsNew
                foreach ($request->newvariants as $variant) {
                    $dataVariantsNew[] = [
                        'name' => $variant['name'],
                        'price' => $variant['price'],
                        'stock_quantity' => $variant['stock_quantity'],
                        'status' => $variant['status'],
                        'product_id' => $product->id,
                    ];
                }
                foreach ($dataVariantsNew as $variant) {
                    ProductVariant::create($variant);
                }
            }
            if ($request->attribute_value) { // attribute new
                foreach ($request->attribute_value as $attributeId => $values) {
                    foreach ($values as $value) {
                        $dataAttributes[] = [
                            'value' => $value,
                            'product_id' => $product->id,
                            'attribute_id' => $attributeId,
                        ];
                    }
                }
                foreach ($dataAttributes as $attr) {
                    ProductAttributeValue::create($attr);
                }
            }
            if ($product->update($dataProduct)) {
                Alert::success('Thanh cong', 'Cap nhap san pham thanh cong');
            }
            return redirect()->route('admin.product.index')->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('update product')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $product = Product::onlyTrashed()->where('slug', $slug)->first();
        if (!$product) {
            Alert::error('Khong thay san pham', 'san pham khong ton tai');
            return redirect()->route('admin.product.index')->with('error', 'Khong tim thay san pham!');
        }
        try {
            $product->forceDelete();
            Alert::success('Thanh cong', 'Xoa vinh vien san pham thanh cong');
            return redirect()->route('admin.product.index')->with('success', 'Xoa san pham thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('destroy product')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function delete(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', 'Khong tim thay san pham!');
        }
        try {
            $product->delete();
            Alert::success('Thanh cong', 'Xoa san pham thanh cong');
            return redirect()->route('admin.product.index')->with('success', 'Xoa san pham thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('delete product')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function deleted()
    {
        $products = Product::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('admin.page.product.restore', compact('products'));
        // if (Auth::user()->can('deleted product')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function restore(string $slug)
    {
        $product = Product::withTrashed()->where("slug", $slug)->first();
        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', 'Khong tim thay san pham!');
        }
        try {
            $product->restore();
            Alert::success('Thanh cong', 'Khoi phuc san pham thanh cong');
            return redirect()->route('admin.product.index')->with('success', 'Khoi phuc san pham thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('restore product')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function search(Request $request, string $keyword)
    {
        $status = $request->status;
        if ($status == 'index') {
            $results = Product::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = Product::orderBy('id', 'desc')->get();
            }
        }
        if ($status == 'delete') {
            $results = Product::onlyTrashed()->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = Product::onlyTrashed()->orderBy('id', 'desc')->get();
            }
        }
        return view('admin.page.product.search', compact('results', 'status'));
    }


}
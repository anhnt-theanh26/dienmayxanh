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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.page.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $attributes = Attribute::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.page.product.create', compact('categories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'sku' => 'required|string|max:255|unique:products,sku',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|url|max:255',
                'is_hot' => 'nullable|boolean',
                'category_id' => 'required|exists:categories,id',
                // images table 
                'images' => 'nullable|url',
                // attributes table
                'attribute_value' => 'nullable|array',
                'attribute_value.*' => 'array',
                'attribute_value.*.*' => 'required|string|max:255',
                // variants table
                'variants' => 'required|array|min:1',
                'variants.*.name' => 'required|string|max:255',
                'variants.*.price' => 'required|numeric|min:0',
                'variants.*.price_old' => 'required|numeric|min:0',
                'variants.*.stock_quantity' => 'required|integer|min:0',
                'variants.*.status' => 'required|in:draft,published',
            ]);
            $originalSlug = Str::slug($request->name);
            $slug = $originalSlug;
            $count = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
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
            $product = Product::create($dataProduct);
            if (!empty($request->images)) {
                $imagesInput = $request->images;
                $imagesArray = explode(',', $imagesInput);

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
                        'price_old' => $variant['price_old'],
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
            DB::commit();
            Alert::success('Thanh cong', 'Them moi san pham thanh cong');
            return redirect()->route('admin.product.index')->with('success', 'Thêm mới sản phẩm thành công');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $product = Product::withTrashed()->where('id', $id)->first();
            if (!$product) {
                Alert::error('Khong tim thay san pham:');
                return redirect()->route('admin.product.index')->with('error', 'Khong tim thay san pham');
            }
            return view('admin.page.product.show', compact('product'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $product = Product::where('id', $id)->first();
            $attributes = Attribute::orderBy('id', 'desc')->get();
            $categories = Category::orderBy('id', 'desc')->get();
            if (!$product) {
                Alert::error('Khong tim thay san pham:');
                return redirect()->route('admin.product.index')->with('error', 'Khong tim thay san pham');
            }
            return view('admin.page.product.edit', compact('categories', 'product', 'attributes'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
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
    public function update(Request $request, string $id)
    {
        try {
            $product = Product::where('id', $id)->first();
            if (!$product) {
                Alert::error('Khong tim thay san pham:');
                return redirect()->route('admin.product.index')->with('error', 'Không tìm thấy sản phẩm');
            }
            $request->validate([ // validate
                'sku' => 'required|string|max:255|unique:products,sku,' . $product->id,
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|url|max:255',
                'is_hot' => 'nullable|boolean',
                'category_id' => 'required|exists:categories,id',
                // images table 
                'images' => 'nullable|url',
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
                'variants.*.price_old' => 'required|numeric|min:0',
                'variants.*.stock_quantity' => 'required|integer|min:0',
                'variants.*.status' => 'required|in:draft,published',
            ]);
            $originalSlug = Str::slug($request->name);
            $newSlug = $originalSlug;
            $count = 1;
            while (Product::where('slug', $newSlug)->where('id', '!=', $product->id)->exists()) {
                $newSlug = $originalSlug . '-' . $count++;
            }
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
            $product->update($dataProduct); // update product

            if (!empty($request->imageUrlOld)) { // images
                $productImages = ProductImage::where('product_id', $product->id)->first();
                $imagesOld = $productImages ? json_decode($productImages->image, true) : null;
                $imageArrDel = explode(',', $request->imageUrlOld);
                $imageArrNew = $this->remove_items_once($imagesOld, $imageArrDel);
                if (!empty($request->images)) {
                    $imagesInput = $request->images;
                    $imagesArray = explode(',', $imagesInput);
                    $imageArrayNew = array_merge($imageArrNew ? $imageArrNew : [], $imagesArray ? $imagesArray : []);
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
                $productImages = ProductImage::where('product_id', $product->id)->first();
                $imagesOld = $productImages ? json_decode($productImages->image, true) : null;
                if (!empty($request->images)) {
                    $imagesInput = $request->images;
                    $imagesArray = explode(',', $imagesInput);
                    $imageArrayNew = array_merge($imagesOld ? $imagesOld : [], $imagesArray ? $imagesArray : []);
                    if ($imagesOld == null) {
                        ProductImage::create([
                            'image' => json_encode($imageArrayNew),
                            'product_id' => $product->id,
                        ]);
                    } else {
                        $dataImages = [
                            'image' => json_encode($imageArrayNew),
                            'product_id' => $product->id,
                        ];
                        $product->images()->update($dataImages); // update images
                    }
                }
            }
            if (!empty($request->variants) && is_array($request->variants)) { //old variants
                foreach ($request->variants as $variant) { //update data Variantsold
                    $dataVariantsold[] = [
                        'id' => $variant['id'],
                        'name' => $variant['name'],
                        'price' => $variant['price'],
                        'price_old' => $variant['price_old'],
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
                        'price_old' => $variant['price_old'],
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
            DB::commit();
            return redirect()->back()->with('success', 'Cập nhật thành công!');
            // return redirect()->route('admin.product.index')->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::onlyTrashed()->where('id', $id)->first();
            if (!$product) {
                Alert::error('Khong thay san pham', 'san pham khong ton tai');
                return redirect()->route('admin.product.index')->with('error', 'Khong tim thay san pham!');
            }
            $product->forceDelete();
            Alert::success('Thanh cong', 'Xoa vinh vien san pham thanh cong');
            return redirect()->route('admin.product.index')->with('success', 'Xoa san pham thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function delete(string $id)
    {
        try {
            $product = Product::where('id', $id)->first();
            if (!$product) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay san pham');
                return redirect()->route('admin.product.index')->with('error', 'Khong tim thay san pham!');
            }
            $product->delete();
            Alert::success('Thanh cong', 'Xoa san pham thanh cong');
            return redirect()->route('admin.product.index')->with('success', 'Xoa san pham thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function deleted()
    {
        try {
            $products = Product::onlyTrashed()->orderBy('id', 'desc')->get();
            return view('admin.page.product.restore', compact('products'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function restore(string $id)
    {
        try {
            $product = Product::withTrashed()->where("id", $id)->first();
            if (!$product) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay san pham');
                return redirect()->route('admin.product.index')->with('error', 'Khong tim thay san pham!');
            }
            $product->restore();
            Alert::success('Thanh cong', 'Khoi phuc san pham thanh cong');
            return redirect()->route('admin.product.index')->with('success', 'Khoi phuc san pham thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
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
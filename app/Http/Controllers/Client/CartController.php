<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    // https://packagist.org/packages/hardevine/shoppingcart

    public function index()
    {
        return view('client.page.cart.index');
    }

    public function addToCart(string $id)
    {
        try {
            $variant = ProductVariant::where('id', $id)->first();
            if (!$variant) {
                return [
                    'status' => false,
                    'title' => 'Not Fount Varian',
                    'total' => Cart::count(),
                ];
            }
            $cartItem = null;
            foreach (Cart::content() as $item) {
                if ($item->id == $id) {
                    $cartItem = $item;
                    break;
                }
            }
            if ($cartItem) {
                if ($cartItem->qty >= $variant->stock_quantity) {
                    return [
                        'status' => false,
                        'title' => 'Sản phẩm chỉ còn ' . $variant->stock_quantity . ' và đã trong giỏ hàng',
                        'total' => Cart::count(),
                    ];
                } else {
                    $qty = 1;
                    Cart::add([
                        'rowId' => $variant->id,
                        'id' => $variant->id,
                        'name' => $variant->product->name,
                        'price' => $variant->price,
                        'qty' => $qty,
                        'weight' => 0,
                        'options' => [
                            'code' => $variant->product->sku,
                            'image' => $variant->product->image,
                            'size' => 0,
                            'product' => $variant->product,
                        ]
                    ]);
                    return [
                        'status' => true,
                        'title' => 'Đã thêm vào giỏ hàng!',
                        'total' => Cart::count(),
                    ];
                }
            } else {
                $qty = 1;
                Cart::add([
                    'rowId' => $variant->id,
                    'id' => $variant->id,
                    'name' => $variant->product->name,
                    'price' => $variant->price,
                    'qty' => $qty,
                    'weight' => 0,
                    'options' => [
                        'code' => $variant->product->sku,
                        'image' => $variant->product->image,
                        'size' => 0,
                        'product' => $variant->product,
                    ]
                ]);
                return [
                    'status' => true,
                    'title' => 'Đã thêm vào giỏ hàng!',
                    'total' => Cart::count(),
                ];
            }
        } catch (\Throwable $th) {
            return [
                'status' => false,
                'title' => 'Có lỗi xảy ra ' . $th->getMessage(),
                'total' => Cart::count(),
            ];
        }
    }

    function cartList()
    {

        // foreach (Cart::content() as $item) {
        //     if ($item->id == 3) {
        //         return 'đây';
        //     }
        // }
        // $cartItem = Cart::get('id', 3);
        // $existingQty = $cartItem ? $cartItem->qty : 0;
        // return $existingQty;
        return Cart::content();
    }

    function delete()
    {
        Cart::destroy();

    }

}

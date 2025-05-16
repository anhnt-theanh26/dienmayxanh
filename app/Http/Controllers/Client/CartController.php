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

    public function checkQuantity(string $id)
    {
        
    }

    public function addToCart(string $id)
    {
        try {
            $variant = ProductVariant::where('id', $id)->first();
            if (!$variant) {
                return [
                    'status' => false,
                    'total' => Cart::count(),
                ];
            }
            foreach (Cart::content() as $item) {
                if ($item->id == $id) {
                    $cartItem = $item;
                    break;
                }
            }
            if ($cartItem->qty > $variant->stock_quantity) {
                $qty = 1;
                Cart::add(
                    [
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
                    ]
                );
                return [
                    'status' => true,
                    'total' => Cart::count(),
                ];
            } else {
                return [
                    'status' => false,
                    'total' => Cart::count(),
                    'success' => 'Sản phẩm chỉ còn' . $variant->stock_quantity,
                ];
            }
        } catch (\Throwable $th) {
            return [
                'status' => false,
                'total' => Cart::count(),
            ];
        }
    }

    function giohang()
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

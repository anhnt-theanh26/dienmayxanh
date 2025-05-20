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
                            'variant' => $variant->name,
                            'quantity' => $variant->stock_quantity,
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
                        'variant' => $variant->name,
                        'quantity' => $variant->stock_quantity,
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

    public function delete(string $id)
    {
        try {
            $cart = Cart::get($id);
            if (!$cart) {
                $result = [
                    'status' => false,
                    'title' => 'Not Found',
                    'total' => Cart::count(),
                ];
                return response()->json([
                    'html' => view('client.page.cart.update')->render(),
                    'result' => $result,
                ]);
            }
            Cart::remove($id);
            if (Cart::count() <= 0) {
                Cart::destroy();
                $result = [
                    'status' => true,
                    'title' => 'Đã xóa khỏi giỏ hàng!',
                    'total' => Cart::count(),
                ];
                return response()->json([
                    'html' => view('client.page.cart.empty')->render(),
                    'result' => $result,
                ]);
            } else {
                $result = [
                    'status' => true,
                    'title' => 'Đã xóa khỏi giỏ hàng!',
                    'total' => Cart::count(),
                ];
                return response()->json([
                    'html' => view('client.page.cart.update')->render(),
                    'result' => $result,
                ]);
            }

        } catch (\Throwable $th) {
            $result = [
                'status' => false,
                'title' => 'Có lỗi xảy ra ' . $th->getMessage(),
                'total' => Cart::count(),
            ];
            return response()->json([
                'html' => view('client.page.cart.update')->render(),
                'result' => $result,
            ]);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $quantity = intval($request->query('quantity'));

            $cartItem = Cart::get($id);
            if (!$cartItem) {
                $result = [
                    'status' => false,
                    'title' => 'Sản phẩm không có trong giỏ hàng!',
                    'total' => Cart::count(),
                    'price' => Cart::total(),
                    'html' => view('client.page.cart.delivery-information')->render(),
                ];
                return $result;
            }
            $variant = ProductVariant::where('id', $cartItem->id)->first();
            if (!$variant) {
                $result = [
                    'status' => false,
                    'title' => 'Không tìm thấy sản phẩm!',
                    'total' => Cart::count(),
                    'price' => Cart::total(),
                    'html' => view('client.page.cart.delivery-information')->render(),
                ];
                return $result;
            }
            if ($variant->stock_quantity < $quantity) {
                $result = [
                    'status' => false,
                    'title' => 'Vượt quá số lượng còn lại!',
                    'total' => Cart::count(),
                    'price' => Cart::total(),
                    'html' => view('client.page.cart.delivery-information')->render(),
                ];
                return $result;
            }
            Cart::update($id, $quantity);
            $result = [
                'status' => true,
                'title' => 'Cập nhập số lượng thành công',
                'total' => Cart::count(),
                'price' => Cart::total(),
                'html' => view('client.page.cart.delivery-information')->render(),
            ];
            return $result;
        } catch (\Throwable $th) {
            $result = [
                'status' => false,
                'title' => 'Có lỗi xảy ra ' . $th->getMessage(),
                'total' => Cart::count(),
                'price' => Cart::total(),
                'html' => view('client.page.cart.delivery-information')->render(),
            ];
            return $result;
        }
    }
}

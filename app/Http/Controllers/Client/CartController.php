<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Voucher;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    // https://packagist.org/packages/hardevine/shoppingcart

    public function index()
    {
        $vouchers = Voucher::where('status', true)->get();
        return view('client.page.cart.index', compact('vouchers'));
    }

    public function create(string $id)
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
                        ],
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
                    ],
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


    public function update(Request $request, string $id)
    {
        try {
            $quantity = intval($request->query('quantity'));

            $cartItem = Cart::get($id);
            if (!$cartItem) {
                $result = [
                    'status' => false,
                    'title' => 'Sản phẩm không có trong giỏ hàng!',
                    'total' => (int) Cart::count(),
                    'price' => (int) Cart::total(0, '', ''),
                    'html' => view('client.page.cart.delivery-information')->render(),
                ];
                return $result;
            }
            $variant = ProductVariant::where('id', $cartItem->id)->first();
            if (!$variant) {
                $result = [
                    'status' => false,
                    'title' => 'Không tìm thấy sản phẩm!',
                    'total' => (int) Cart::count(),
                    'price' => (int) Cart::total(0, '', ''),
                    'html' => view('client.page.cart.delivery-information')->render(),
                ];
                return $result;
            }
            if ($variant->stock_quantity < $quantity) {
                $result = [
                    'status' => false,
                    'title' => 'Vượt quá số lượng còn lại!',
                    'total' => (int) Cart::count(),
                    'price' => (int) Cart::total(0, '', ''),
                    'html' => view('client.page.cart.delivery-information')->render(),
                ];
                return $result;
            }
            Cart::update($id, $quantity);
            $result = [
                'status' => true,
                't' => $cartItem->qty,
                'title' => 'Cập nhập số lượng thành công',
                'total' => (int) Cart::count(),
                'price' => (int) Cart::total(0, '', ''),
                'html' => view('client.page.cart.delivery-information')->render(),
            ];
            return $result;
        } catch (\Throwable $th) {
            $result = [
                'status' => false,
                'title' => 'Có lỗi xảy ra ' . $th->getMessage(),
                'total' => (int) Cart::count(),
                'price' => (int) Cart::total(0, '', ''),
                'html' => view('client.page.cart.delivery-information')->render(),
            ];
            return $result;
        }
    }

    public function delete(string $id)
    {
        try {
            $cart = Cart::get($id);
            $vouchers = Voucher::where('status', true)->get();
            if (!$cart) {
                $result = [
                    'status' => false,
                    'title' => 'Not Found',
                    'total' => (int) Cart::count(),
                    'html' => view('client.page.cart.update', compact('vouchers'))->render(),
                ];
                return $result;
            }
            Cart::remove($id);
            if ((int) Cart::count() <= 0) {
                Cart::destroy();
                $result = [
                    'status' => true,
                    'title' => 'Đã xóa khỏi giỏ hàng!',
                    'total' => (int) Cart::count(),
                    'html' => view('client.page.cart.empty')->render(),
                ];
                return $result;
            } else {
                $result = [
                    'status' => true,
                    'title' => 'Đã xóa khỏi giỏ hàng!',
                    'total' => (int) Cart::count(),
                    'html' => view('client.page.cart.update', compact('vouchers'))->render(),
                ];
                return $result;
            }
        } catch (\Throwable $th) {
            $result = [
                'status' => false,
                'title' => 'Có lỗi xảy ra ' . $th->getMessage(),
                'total' => (int) Cart::count(),
                'html' => view('client.page.cart.update', compact('vouchers'))->render(),
            ];
            return $result;
        }
    }

    public function discount(Request $request, string $code)
    {
        $voucher = Voucher::where('promo_code', $code)->first();
        $type = $request->query('type');
        $result = [
            'status' => false,
            'title' => 'Voucher không khả dụng!',
        ];
        // check voucher
        if (!$voucher) {
            return $result;
        }
        if ($voucher->start_date > now()->toDateTimeString() || $voucher->end_date <= now()->toDateTimeString()) {
            return $result;
        }
        if ($voucher->max_use < 1) {
            return $result;
        }
        if ($voucher->status == false) {
            return $result;
        }
        // user nhập voucher
        if ($type == 'enter') {
            $flagusers = true;
            if (Auth::check()) {
                $users = null;
                $flagusers = false;
                $users = json_decode($voucher->users, true);
                if ($users != null) {// kiểm tra xem user có được sử dụng mã giảm giá này không
                    foreach ($users as $user) {
                        if ($user == Auth::user()->id) {
                            $flagusers = true;
                            break;
                        }
                    }
                } else {
                    $flagusers = true;
                }
            }
            $flagproducts = true;
            $products = json_decode($voucher->products, true);
            if ($products !== null) {
                $itemCartArr = [];
                if (Cart::content()) {
                    foreach (Cart::content() as $cartItem) {
                        $itemCartArr[] = (string) $cartItem->options->product->id;
                    }
                }
                foreach ($itemCartArr as $itemCart) {
                    if (!in_array($itemCart, $products)) {
                        $flagproducts = false;
                        break;
                    }
                }
            }
            if ($flagusers == false || $flagproducts == false) {
                return $result;
            }
            $discount = Cart::total(0, '', '') * $voucher->discount_percentage / 100 > $voucher->max_discount ? (int) $voucher->max_discount : Cart::total(0, '', '') * $voucher->discount_percentage / 100;
            $total = Cart::total(0, '', '') - $discount + 20000;
            return [
                'status' => true,
                'type' => $type,
                'title' => 'Giảm giá giỏ hàng!',
                'discount' => $discount,
                'total' => $total,
            ];
        }
        // voucher có sẵn
        if ($type == 'available') {
            if ($voucher->status == false) {
                return $result;
            }
            $discount = Cart::total(0, '', '') * $voucher->discount_percentage / 100 > $voucher->max_discount ? (int) $voucher->max_discount : Cart::total(0, '', '') * $voucher->discount_percentage / 100;
            $total = Cart::total(0, '', '') - $discount + 20000;
            return [
                'status' => true,
                'type' => $type,
                'title' => 'Giảm giá giỏ hàng!',
                'discount' => $discount,
                'total' => $total,
            ];
        }
        return [
            'status' => true,
            'title' => 'Voucher khả dụng!',
        ];
    }
}

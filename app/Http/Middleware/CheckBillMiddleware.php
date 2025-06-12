<?php

namespace App\Http\Middleware;

use App\Models\Bill;
use App\Models\BillItem;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Review;
use App\Models\Search;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBillMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $bills = Bill::get();
        if ($bills) {
            foreach ($bills as $bill) {
                $after5day = \Carbon\Carbon::parse($bill->updated_at)->addDays(5);
                if ($bill->payment_status == 'Payment Failed' && now() > $bill->expiry_time && $bill->status == 'Pending') {
                    $bill->update([
                        'status' => 'Cancelled',
                        'reason_cancel' => 'Hết thời gian thanh toán online!',
                    ]);
                    $billItems = BillItem::where('bill_id', $bill->id)->get();
                    foreach ($billItems as $billItem) {
                        if ($billItem->product_id != null) {
                            $product = Product::where('id', $billItem->product_id)->first();
                            if ($product) {
                                $product->sold -= $billItem->quantity;
                                $product->save();
                            }
                        }
                        if ($billItem->product_variant_id != null) {
                            $product_variant = ProductVariant::where('id', $billItem->product_variant_id)->first();
                            if ($product_variant) {
                                $product_variant->stock_quantity += $billItem->quantity;
                                $product_variant->save();
                            }
                        }
                    }
                }
                if ($bill->status == 'Shipping') {
                    if (now() > $after5day) {
                        if ($bill->payment_method == 'online' && $bill->payment_status == 'Paid') {
                            $bill->update([
                                'status' => 'Delivered',
                            ]);
                        }
                        if ($bill->payment_method == 'offline') {
                            $bill->update([
                                'status' => 'Returned',
                                'reason_cancel' => 'Người dùng không nhận hàng!',
                            ]);
                            $billItems = BillItem::where('bill_id', $bill->id)->get();
                            foreach ($billItems as $billItem) {
                                if ($billItem->product_id != null) {
                                    $product = Product::where('id', $billItem->product_id)->first();
                                    if ($product) {
                                        $product->sold -= $billItem->quantity;
                                        $product->save();
                                    }
                                }
                                if ($billItem->product_variant_id != null) {
                                    $product_variant = ProductVariant::where('id', $billItem->product_variant_id)->first();
                                    if ($product_variant) {
                                        $product_variant->stock_quantity += $billItem->quantity;
                                        $product_variant->save();
                                    }
                                }
                            }
                        }
                    }
                }
                // if ($bill->status == 'Delivered') {
                //     if (Carbon::parse($bill->updated_at)->addDays(5)->isPast()) {
                //         foreach ($bill->billItems as $billItem) {
                //             if (!$billItem->review_status) {
                //                 $billItem->review_status = true;
                //                 $billItem->save();
                //             }
                //         }
                //     }
                // }
            }
        }
        $count = Search::count();
        if ($count > 140) {
            Search::orderBy('created_at')
                ->take($count - 100)
                ->delete();
        }
        $posts = Post::get();
        if ($posts) {
            foreach ($posts as $post) {
                if ($post->published_at >= now() && $post->status == 'draft') {
                    $post->update(['status' => 'published']);
                }
            }
        }
        return $next($request);
    }
}

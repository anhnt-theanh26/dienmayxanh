<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AuthenticationlogController;
use App\Http\Controllers\Admin\BannerMenuController;
use App\Http\Controllers\Admin\BannerMenuItemController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryParentController;
use App\Http\Controllers\Admin\FileManagerController;
use App\Http\Controllers\Admin\LocationBannerMenuController;
use App\Http\Controllers\Admin\LocationMenuController;
use App\Http\Controllers\Admin\LocationProductMenuController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductMenuController;
use App\Http\Controllers\Admin\ProductMenuItemController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Client\BillController as ClientBillController;
use App\Http\Controllers\Client\CartController as ClientCartController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\LoginController as ClientLoginController;
use App\Http\Controllers\Client\PaymentController as ClientPaymentController;
use App\Http\Controllers\Client\PostController as ClientPostController;
use App\Http\Controllers\Client\ProductDetailController as ClientProductDetailController;
use App\Http\Controllers\Client\SearchController as ClientSearchController;
use App\Http\Controllers\Client\UserController as ClientUserController;
// use App\Http\Controllers\SendEmailController;
// use App\Mail\SendEmail;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
// use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// login and register
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showlogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.process');
    Route::get('/register', [LoginController::class, 'showregister'])->name('register');
});

Route::middleware('auth.admin')->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // category-parent
    Route::resource('category-parent', CategoryParentController::class);
    Route::prefix('category-parent')->as('category-parent.')->group(function () {
        Route::get('/deleted', [CategoryParentController::class, 'deleted'])->name('deleted');
        Route::delete('/{id}/delete', [CategoryParentController::class, 'delete'])->name('delete');
        Route::get('/{keyword}/search', [CategoryParentController::class, 'search'])->name('search');
    });

    // category
    Route::prefix('category')->as('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');

        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [CategoryController::class, 'update'])->name('update');

        Route::get('/deleted', [CategoryController::class, 'deleted'])->name('deleted');
        Route::post('/{id}/restore', [CategoryController::class, 'restore'])->name('restore');

        Route::delete('/{id}/delete', [CategoryController::class, 'delete'])->name('delete');
        Route::delete('/{id}/destroy', [CategoryController::class, 'destroy'])->name('destroy');

        Route::get('/{keyword}/search', [CategoryController::class, 'search'])->name('search');
    });

    // post
    Route::prefix('post')->as('post.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');

        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [PostController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [PostController::class, 'update'])->name('update');

        Route::get('/deleted', [PostController::class, 'deleted'])->name('deleted');
        Route::post('/{id}/restore', [PostController::class, 'restore'])->name('restore');

        Route::delete('/{id}/delete', [PostController::class, 'delete'])->name('delete');
        Route::delete('/{id}/destroy', [PostController::class, 'destroy'])->name('destroy');

        Route::get('/{keyword}/search', [PostController::class, 'search'])->name('search');
    });

    // Attribute
    Route::prefix('attribute')->as('attribute.')->group(function () {
        Route::get('/', [AttributeController::class, 'index'])->name('index');

        Route::get('/create', [AttributeController::class, 'create'])->name('create');
        Route::post('/store', [AttributeController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [AttributeController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [AttributeController::class, 'update'])->name('update');

        Route::get('/deleted', [AttributeController::class, 'deleted'])->name('deleted');
        Route::post('/{id}/restore', [AttributeController::class, 'restore'])->name('restore');

        Route::delete('/{id}/delete', [AttributeController::class, 'delete'])->name('delete');
        Route::delete('/{id}/destroy', [AttributeController::class, 'destroy'])->name('destroy');

        Route::get('/{keyword}/search', [AttributeController::class, 'search'])->name('search');
    });

    // Product
    Route::prefix('product')->as('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');

        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');

        Route::get('/{id}/show', [ProductController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [ProductController::class, 'update'])->name('update');

        Route::get('/deleted', [ProductController::class, 'deleted'])->name('deleted');
        Route::post('/{id}/restore', [ProductController::class, 'restore'])->name('restore');

        Route::delete('/{id}/delete', [ProductController::class, 'delete'])->name('delete');
        Route::delete('/{id}/destroy', [ProductController::class, 'destroy'])->name('destroy');

        Route::get('/{keyword}/search', [ProductController::class, 'search'])->name('search');
    });

    // Image
    Route::prefix('image')->as('image.')->group(function () {
        Route::get('/', [FileManagerController::class, 'index'])->name('index');
    });

    // Voucher
    Route::prefix('voucher')->as('voucher.')->group(function () {
        Route::get('/', [VoucherController::class, 'index'])->name('index');

        Route::get('/create', [VoucherController::class, 'create'])->name('create');
        Route::post('/store', [VoucherController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [VoucherController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [VoucherController::class, 'update'])->name('update');

        Route::delete('/{id}/destroy', [VoucherController::class, 'destroy'])->name('destroy');

        Route::get('/{keyword}/search', [VoucherController::class, 'search'])->name('search');
    });

    // User
    Route::prefix('user')->as('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');

        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [UserController::class, 'update'])->name('update');
        Route::put('/{id}/password', [UserController::class, 'password'])->name('password');

        Route::get('/deleted', [UserController::class, 'deleted'])->name('deleted');
        Route::post('/{id}/restore', [UserController::class, 'restore'])->name('restore');

        Route::delete('/{id}/delete', [UserController::class, 'delete'])->name('delete');
        Route::delete('/{id}/destroy', [UserController::class, 'destroy'])->name('destroy');

        Route::get('/{keyword}/search', [UserController::class, 'search'])->name('search');

        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });

    // Bill
    Route::prefix('bill')->as('bill.')->group(function () {
        Route::get('/', [BillController::class, 'index'])->name('index');
        Route::get('/request-cancellation', [BillController::class, 'requestCancellation'])->name('request-cancellation');
        Route::get('/pending', [BillController::class, 'pending'])->name('pending');
        Route::get('/waitingpayment', [BillController::class, 'waitingpayment'])->name('waitingpayment');
        Route::get('/confirmed', [BillController::class, 'confirmed'])->name('confirmed');
        Route::get('/preparing', [BillController::class, 'preparing'])->name('preparing');
        Route::get('/shipping', [BillController::class, 'shipping'])->name('shipping');
        Route::get('/refund', [BillController::class, 'refund'])->name('refund');
        Route::get('/delivered', [BillController::class, 'delivered'])->name('delivered');
        Route::get('/cancelled', [BillController::class, 'cancelled'])->name('cancelled');
        Route::get('/return', [BillController::class, 'return'])->name('return');
        Route::get('/status', [BillController::class, 'status'])->name('status');
        Route::get('/reply-cancel', [BillController::class, 'replyCancel'])->name('reply-cancel');
        Route::get('/reply-refund', [BillController::class, 'replyRefund'])->name('reply-refund');
        Route::get('{id}/show', [BillController::class, 'show'])->name('show');
        Route::get('/{keyword}/search', [BillController::class, 'search'])->name('search');
    });


    // role
    Route::prefix('role')->as('role.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::post('/store', [RoleController::class, 'store'])->name('store');
        Route::delete('{id}/', [RoleController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/update', [RoleController::class, 'update'])->name('update');
    });

    // permission
    Route::prefix('permission')->as('permission.')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::post('/store', [PermissionController::class, 'store'])->name('store');
        Route::delete('{id}/', [PermissionController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/update', [PermissionController::class, 'update'])->name('update');
        Route::get('/{keyword}/search', [PermissionController::class, 'search'])->name('search');
    });

    // authenticationlog
    Route::prefix('authenticationlog')->as('authenticationlog.')->group(function () {
        Route::get('/', [AuthenticationlogController::class, 'index'])->name('index');
        Route::get('/{keyword}/search', [AuthenticationlogController::class, 'search'])->name('search');
    });

    // Location Menu
    Route::prefix('locationmenu')->as('locationmenu.')->group(function () {
        Route::get('/', [LocationMenuController::class, 'index'])->name('index');

        Route::get('/create', [LocationMenuController::class, 'create'])->name('create');
        Route::post('/store', [LocationMenuController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [LocationMenuController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [LocationMenuController::class, 'update'])->name('update');

        Route::delete('/{id}/destroy', [LocationMenuController::class, 'destroy'])->name('destroy');
    });

    // Menu
    Route::prefix('menu')->as('menu.')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('index');

        Route::get('/create', [MenuController::class, 'create'])->name('create');
        Route::post('/store', [MenuController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [MenuController::class, 'update'])->name('update');

        Route::delete('/{id}/destroy', [MenuController::class, 'destroy'])->name('destroy');
    });

    // Menu Item
    Route::prefix('menuitem')->as('menuitem.')->group(function () {
        Route::get('/{id}/edit', [MenuItemController::class, 'edit'])->name('edit');
        Route::post('/{id}/store', [MenuItemController::class, 'store'])->name('store');
        Route::put('/{id}/update', [MenuItemController::class, 'update'])->name('update');

        Route::get('/{id}/destroy', [MenuItemController::class, 'destroy'])->name('destroy');
    });

    // Product Location Menu
    Route::prefix('locationproductmenu')->as('locationproductmenu.')->group(function () {
        Route::get('/', [LocationProductMenuController::class, 'index'])->name('index');

        Route::get('/create', [LocationProductMenuController::class, 'create'])->name('create');
        Route::post('/store', [LocationProductMenuController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [LocationProductMenuController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [LocationProductMenuController::class, 'update'])->name('update');

        Route::delete('/{id}/destroy', [LocationProductMenuController::class, 'destroy'])->name('destroy');
    });

    // Product Menu
    Route::prefix('productmenu')->as('productmenu.')->group(function () {
        Route::get('/', [ProductMenuController::class, 'index'])->name('index');

        Route::get('/create', [ProductMenuController::class, 'create'])->name('create');
        Route::post('/store', [ProductMenuController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [ProductMenuController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [ProductMenuController::class, 'update'])->name('update');

        Route::delete('/{id}/destroy', [ProductMenuController::class, 'destroy'])->name('destroy');
    });

    // Product Menu Item
    Route::prefix('productmenuitem')->as('productmenuitem.')->group(function () {
        Route::get('/{id}/edit', [ProductMenuItemController::class, 'edit'])->name('edit');
        Route::post('/{id}/store', [ProductMenuItemController::class, 'store'])->name('store');
        Route::put('/{id}/update', [ProductMenuItemController::class, 'update'])->name('update');
        Route::get('/{id}/destroy', [ProductMenuItemController::class, 'destroy'])->name('destroy');
    });

    // Banner Location Menu
    Route::prefix('locationbannermenu')->as('locationbannermenu.')->group(function () {
        Route::get('/', [LocationBannerMenuController::class, 'index'])->name('index');

        Route::get('/create', [LocationBannerMenuController::class, 'create'])->name('create');
        Route::post('/store', [LocationBannerMenuController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [LocationBannerMenuController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [LocationBannerMenuController::class, 'update'])->name('update');

        Route::delete('/{id}/destroy', [LocationBannerMenuController::class, 'destroy'])->name('destroy');
    });

    // Banner Menu
    Route::prefix('bannermenu')->as('bannermenu.')->group(function () {
        Route::get('/', [BannerMenuController::class, 'index'])->name('index');

        Route::get('/create', [BannerMenuController::class, 'create'])->name('create');
        Route::post('/store', [BannerMenuController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [BannerMenuController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [BannerMenuController::class, 'update'])->name('update');

        Route::delete('/{id}/destroy', [BannerMenuController::class, 'destroy'])->name('destroy');
    });

    // Banner Menu Item
    Route::prefix('bannermenuitem')->as('bannermenuitem.')->group(function () {
        Route::get('/{id}/edit', [BannerMenuItemController::class, 'edit'])->name('edit');
        Route::post('/{id}/store', [BannerMenuItemController::class, 'store'])->name('store');
        Route::put('/{id}/update', [BannerMenuItemController::class, 'update'])->name('update');
        Route::get('/{id}/destroy', [BannerMenuItemController::class, 'destroy'])->name('destroy');
    });

    // Settings
    Route::prefix('setting')->as('setting.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::get('/create', [SettingController::class, 'create'])->name('create');
        Route::post('/store', [SettingController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [SettingController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [SettingController::class, 'update'])->name('update');
        Route::post('/{id}/status', [SettingController::class, 'status'])->name('status');
        Route::delete('/{id}/destroy', [SettingController::class, 'destroy'])->name('destroy');
        Route::get('/{keyword}/search', [SettingController::class, 'search'])->name('search');
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::prefix('/')->as('')->group(function () {
    Route::get('/', [ClientHomeController::class, 'index'])->name('index');
    Route::get('/home', [ClientHomeController::class, 'index'])->name('home');
    Route::prefix('product')->as('product.')->group(function () {
        Route::get('{slug}', [ClientProductDetailController::class, 'show'])->name('show');
        Route::get('{slug}/review', [ClientProductDetailController::class, 'review'])->name('review');
    });

    Route::prefix('search')->as('search.')->group(function () {
        Route::get('/', [ClientSearchController::class, 'index'])->name('index');
        Route::get('/arrange', [ClientSearchController::class, 'arrange'])->name('arrange');
        Route::get('/filter', [ClientSearchController::class, 'filter'])->name('filter');
    });
    Route::prefix('category')->as('category.')->group(function () {
        Route::get('{slug}', [ClientCategoryController::class, 'show'])->name('show');
    });
    // login
    Route::prefix('login')->as('login.')->group(function () {
        Route::get('/', [ClientLoginController::class, 'index'])->name('form');
        Route::post('/submit', [ClientLoginController::class, 'login'])->name('submit');
    });
    // register
    Route::prefix('register')->as('register.')->group(function () {
        Route::get('/', [ClientLoginController::class, 'create'])->name('form');
        Route::post('/submit', [ClientLoginController::class, 'register'])->name('submit');
    });
    // logout
    Route::get('/logout', [ClientLoginController::class, 'logout'])->name('logout');

    // cart
    Route::prefix('cart')->as('cart.')->group(function () {
        Route::get('/', [ClientCartController::class, 'index'])->name('index');
        Route::get('/add-to-cart/{id}', [ClientCartController::class, 'create'])->name('add-to-cart');
        Route::get('/update-item-cart/{id}', [ClientCartController::class, 'update'])->name('update-item-cart');
        Route::get('/delete-item-cart/{id}', [ClientCartController::class, 'delete'])->name('delete-item-cart');
        Route::get('/discount/{code}', [ClientCartController::class, 'discount'])->name('discount');
    });
    Route::get('/delete-cart', [ClientCartController::class, 'delete'])->name('delete-cart');

    // order
    Route::prefix('order')->as('order.')->group(function () {
        Route::post('/', [ClientBillController::class, 'create'])->name('create');
        Route::get('/pay/{id}', [ClientPaymentController::class, 'vnpay_payment'])->name('vnpay_payment');
        Route::get('/callback', [ClientPaymentController::class, 'vnpayCallback'])->name('vnpay_callback');
        Route::get('/continue-payment/{id}', [ClientBillController::class, 'continuePayment'])->name('continue_payment');
    });
    // bill 
    Route::prefix('bill')->as('bill.')->group(function () {
        Route::get('/', [ClientBillController::class, 'index'])->name('index');
        Route::post('/{id}/received', [ClientBillController::class, 'received'])->name('received');
        Route::post('{id}/cancel', [ClientBillController::class, 'cancel'])->name('cancel');
        Route::post('{id}/refund', [ClientBillController::class, 'refund'])->name('refund');
        Route::post('/review', [ClientBillController::class, 'review'])->name('review');
    });

    // profile 
    Route::prefix('profile')->as('profile.')->group(function () {
        Route::get('/', [ClientUserController::class, 'index'])->middleware(['auth'])->name('index');
        Route::post('update', [ClientUserController::class, 'update'])->middleware(['auth'])->name('update');
        Route::post('/save-address', [ClientUserController::class, 'saveAddress'])->middleware(['auth'])->name('save-address');
        Route::post('/password', [ClientUserController::class, 'password'])->middleware(['auth'])->name('password');
    });

    // post 
    Route::prefix('post')->as('post.')->group(function () {
        Route::get('{slug}/index', [ClientPostController::class, 'index'])->name('index');
        Route::get('{slug}', [ClientPostController::class, 'show'])->name('show');
    });

    // error
    Route::fallback(function () {
        return view('error.client.404')->with('statusCode', 404);
    });
});

// email verify
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    Alert::success('Xác minh email thành công', 'Chào mừng bạn đến với điện máy xanh');
    return redirect('/home');
})->middleware(['auth'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Liên kết xác minh đã được gửi!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// https://github.com/craftpip/jquery-confirm
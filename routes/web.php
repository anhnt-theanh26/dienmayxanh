<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AuthenticationlogController;
use App\Http\Controllers\Admin\BannerMenuController;
use App\Http\Controllers\Admin\BannerMenuItemController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryParentController;
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
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\Client\LoginController as ClientLoginController;
use App\Http\Controllers\client\ProductDetailController;
use App\Http\Controllers\client\SearchController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::post('welcome/store', [AdminController::class, 'welcome'])->name('welcome.store');
Route::get('test', [AdminController::class, 'test'])->name('test');


// login and register
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showlogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.process');

    Route::get('/register', [LoginController::class, 'showregister'])->name('register');
});
Route::middleware('auth.admin')->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // category-parent
    Route::prefix('category-parent')->as('category-parent.')->group(function () {
        Route::get('/', [CategoryParentController::class, 'index'])->name('index');

        Route::get('/create', [CategoryParentController::class, 'create'])->name('create');
        Route::post('/', [CategoryParentController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [CategoryParentController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [CategoryParentController::class, 'update'])->name('update');

        Route::get('/deleted', [CategoryParentController::class, 'deleted'])->name('deleted');
        Route::post('/{id}/restore', [CategoryParentController::class, 'restore'])->name('restore');

        Route::delete('/{id}/delete', [CategoryParentController::class, 'delete'])->name('delete');
        Route::delete('/{id}/destroy', [CategoryParentController::class, 'destroy'])->name('destroy');

        Route::get('/{keyword}/search', [CategoryParentController::class, 'search'])->name('search');
    });

    // category
    Route::prefix('category')->as('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');

        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/', [CategoryController::class, 'store'])->name('store');

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
        Route::post('/', [PostController::class, 'store'])->name('store');

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
        Route::post('/', [AttributeController::class, 'store'])->name('store');

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
        Route::post('/', [ProductController::class, 'store'])->name('store');

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
        Route::get('/', [AdminController::class, 'image'])->name('image');
    });

    // User
    Route::prefix('user')->as('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');

        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');

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

    // role
    Route::prefix('role')->as('role.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::post('/', [RoleController::class, 'store'])->name('store');
        Route::delete('{id}/', [RoleController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/update', [RoleController::class, 'update'])->name('update');

    });

    // permission
    Route::prefix('permission')->as('permission.')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::post('/', [PermissionController::class, 'store'])->name('store');
        Route::delete('{id}/', [PermissionController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/update', [PermissionController::class, 'update'])->name('update');

    });

    // authenticationlog
    Route::prefix('authenticationlog')->as('authenticationlog.')->group(function () {
        Route::get('/', [AuthenticationlogController::class, 'index'])->name('index');
    });

    // Location Menu
    Route::prefix('locationmenu')->as('locationmenu.')->group(function () {
        Route::get('/', [LocationMenuController::class, 'index'])->name('index');

        Route::get('/create', [LocationMenuController::class, 'create'])->name('create');
        Route::post('/', [LocationMenuController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [LocationMenuController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [LocationMenuController::class, 'update'])->name('update');

        Route::delete('/{id}/destroy', [LocationMenuController::class, 'destroy'])->name('destroy');
    });

    // Menu 
    Route::prefix('menu')->as('menu.')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('index');

        Route::get('/create', [MenuController::class, 'create'])->name('create');
        Route::post('/', [MenuController::class, 'store'])->name('store');

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
        Route::post('/', [LocationProductMenuController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [LocationProductMenuController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [LocationProductMenuController::class, 'update'])->name('update');

        Route::delete('/{id}/destroy', [LocationProductMenuController::class, 'destroy'])->name('destroy');
    });

    // Product Menu 
    Route::prefix('productmenu')->as('productmenu.')->group(function () {
        Route::get('/', [ProductMenuController::class, 'index'])->name('index');

        Route::get('/create', [ProductMenuController::class, 'create'])->name('create');
        Route::post('/', [ProductMenuController::class, 'store'])->name('store');

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
        Route::post('/', [LocationBannerMenuController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [LocationBannerMenuController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [LocationBannerMenuController::class, 'update'])->name('update');

        Route::delete('/{id}/destroy', [LocationBannerMenuController::class, 'destroy'])->name('destroy');
    });

    // Banner Menu 
    Route::prefix('bannermenu')->as('bannermenu.')->group(function () {
        Route::get('/', [BannerMenuController::class, 'index'])->name('index');

        Route::get('/create', [BannerMenuController::class, 'create'])->name('create');
        Route::post('/', [BannerMenuController::class, 'store'])->name('store');

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

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::prefix('/')->as('')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/search', [SearchController::class, 'store'])->name('search');
    Route::get('{slug}/defail-product', [ProductDetailController::class, 'show'])->name('product-detail');

    Route::prefix('login')->as('login.')->group(function () {
        Route::get('/', [ClientLoginController::class, 'index'])->name('form');
        Route::post('/submit', [ClientLoginController::class, 'login'])->name('submit');
    });
    Route::prefix('register')->as('register.')->group(function () {
        Route::get('/', [ClientLoginController::class, 'create'])->name('form');
        Route::post('/submit', [ClientLoginController::class, 'register'])->name('submit');
    });
    Route::get('/logout', [ClientLoginController::class, 'logout'])->name('logout');
    Route::post('/save-address', [ClientUserController::class, 'saveAddress'])->name('save-address');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    Alert::success('Xác minh Email thành công', 'Chào mừng bạn đến với Điện Máy XANH');
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Email xác minh đã được gửi lại!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

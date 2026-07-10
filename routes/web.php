<?php
// laravel 10

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;

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
//     return view('pages.home');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/details/{id?}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/success', [App\Http\Controllers\CartController::class, 'success'])->name('success'); // transaksi sukses

Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('register-success');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/products', [DashboardProductController::class, 'index'])->name('dashboard-product');
Route::get('/dashboard/products/create', [DashboardProductController::class, 'create'])->name('dashboard-product-create');
Route::get('/dashboard/products/{id}', [DashboardProductController::class, 'details'])->name('dashboard-product-details');

Route::get('/dashboard/transactions', [DashboardTransactionController::class, 'index'])->name('dashboard-transaction');
Route::get('/dashboard/transactions/{id}', [DashboardTransactionController::class, 'details'])->name('dashboard-transaction-details');

Route::get('/dashboard/settings', [DashboardSettingController::class, 'store'])->name('dashboard-settings-store');
Route::get('/dashboard/account', [DashboardSettingController::class, 'account'])->name('dashboard-settings-account');

// middleware('auth', 'admin')
Route::prefix('admin')->group(function () { // namespace didapat di cotnroller admin yaitu DashboardController.php
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product-gallery', ProductGalleryController::class);
});

Auth::routes();

<?php

use App\Livewire\Admin\Category\Listcategory;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Order\Listorder;
use App\Livewire\Admin\Product\Listproduct;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\HomePage;
use App\Livewire\User\Cancel;
use App\Livewire\User\Cart;
use App\Livewire\User\Checkout;
use App\Livewire\User\Dashboard as UserDashboard;
use App\Livewire\User\MyordersPage;
use App\Livewire\User\ProductDetail;
use App\Livewire\User\Success;
use Illuminate\Support\Facades\Route;

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


Route::get('/', Login::class)->name('login');
Route::get('/register', Register::class);
Route::get('/forgot-password', ForgotPassword::class);


Route::get('/logout', function(){
    auth()->logout();
    return redirect('/');
});

Route::group(['middleware' => ['auth','cekrole:Admin']],function(){
    Route::get('/dashboard-admin', Dashboard::class);
    Route::get('/product-admin/list', Listproduct::class);
    Route::get('/category-admin/list', Listcategory::class);
    Route::get('/order-admin/list', Listorder::class);
    Route::get('/category-admin/list/checkslug', [Listcategory::class, 'checkslug'])->name('admin.category.checkslug');
    Route::get('/product-admin/list/checkslug', [Listproduct::class, 'checkslug'])->name('admin.product.checkslug');
});

Route::group(['middleware' => ['auth','cekrole:User']],function(){
    Route::get('/dashboard-user', UserDashboard ::class);
    Route::get('/products/{slug}', ProductDetail::class);
    Route::get('/cart', Cart::class);
    Route::get('/checkout', Checkout::class);
    Route::get('/success', Success::class)->name('success');
    Route::get('/cancel', Cancel::class)->name('cancel');
    Route::get('/my-orders', MyordersPage::class);
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\BankAccountsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\TradesController;
use App\Http\Controllers\SellsController;
use App\Http\Controllers\BuysController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Auth,仮認証
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    // 会員情報周り
    Route::resource('profile', UsersController::class, ['only' => ['index']]);

    // アカウント詳細ページ(公開)
    Route::resource('/u', AccountController::class, ['only' => ['show']]);

    // 配送先
    Route::resource('addresses', AddressesController::class, ['only' => ['index', 'store', 'show', 'edit', 'update', 'destroy']]);

    // 口座情報
    Route::resource('banks', BankAccountsController::class, ['only' => ['index', 'store',  'edit', 'update', 'destroy']]);

    // ジャンル
    Route::resource('/genres', GenresController::class, ['only' => ['index', 'store']]);

    // 商品
    Route::post('/items/{item}/stop', [ItemsController::class, 'stop'])->name('item.stop');
    Route::post('/items/{item}/restart', [ItemsController::class, 'restart'])->name('item.restart');
    Route::resource('/items', ItemsController::class, ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    Route::post('/buy', [ItemsController::class, 'buy'])->name('items.buy');
    Route::post('/buy/{item}', [ItemsController::class, 'buyshow'])->name('items.buyshow');

    // 取引中
    Route::resource('/trades', TradesController::class);
    Route::get('/trades/{trade}', [TradesController::class, 'show'])->name('trade.show');
    Route::post('/trades/shiping', [TradesController::class, 'shipping'])->name('trade.shipping');

    // 評価
    Route::post('/rating/buyer', [RatingsController::class, 'buyer'])->name('rating.buyer');
    Route::post('/rating/seller', [RatingsController::class, 'seller'])->name('rating.seller');

    // 購入商品
    Route::resource('/buys', BuysController::class, ['only' => ['index', 'show']]);

    // 出品商品
    Route::resource('/sells', SellsController::class, ['only' => ['index', 'show']]);

    // 決済
    Route::post('/cash', [TradesController::class, 'cash'])->name('trade.cash');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// 認証なし

// root
Route::get('/', [ItemsController::class, 'index'])->name('root');
// 商品
Route::resource('/items', ItemsController::class, ['only' => ['show']]);

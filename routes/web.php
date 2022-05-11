<?php

// コントローラをuseで読み込む
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\PhotoController;
use App\Models\Sample;

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

Route::get('/', function () {
    return view('welcome');
});

// getかpostで使い分ける
// nameつけておくと route('ルート名')で指定できる
// ルートファイル追記した後は php artisan route:listやっとくと無難です。

// 最初の引数は ブラウザのURL
// コントローラ, その中のメソッド,
// name は route() ヘルパ関数

Route::get('/samples/index', [ SampleController::class, 'index'])->name('samples.index');
Route::get('/samples/create', [SampleController::class, 'create'])->name('samples.create');
Route::post('/samples/store', [ SampleController::class, 'store' ])->name('samples.store');

// resourceとやると 7つのルートを一度に作れる
Route::resource('photos', PhotoController::class);

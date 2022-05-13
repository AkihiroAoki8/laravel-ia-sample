<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\LifeCycleController;


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

// Laravel Breezeで生成されたコード
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    Route::get('/lectures/', [ LectureController::class, 'index'])->name('lectures.index');    
});


// Route::middleware(['auth'])->group(function(){
//     Route::get('/lecture/', [LectureController::class, 'index'])->name('lecture.index');
// });

require __DIR__.'/auth.php';


// getかpostで使い分ける
// nameつけておくと route('ルート名')で指定できる
// ルートファイル追記した後は php artisan route:listやっとくと無難です。

// 最初の引数は ブラウザのURL
// コントローラ, その中のメソッド,
// name は route() ヘルパ関数
// 20220510
Route::get('/samples/index', [ SampleController::class, 'index'])->name('samples.index');
Route::get('/samples/create', [SampleController::class, 'create'])->name('samples.create');
Route::post('/samples/store', [ SampleController::class, 'store' ])->name('samples.store');

// // 20220511
Route::get('/samples/{id}', [ SampleController::class, 'show'])->name('samples.show');
Route::get('/samples/{id}/edit', [ SampleController::class, 'edit'] )->name('samples.edit');
Route::post('/samples/{id}', [ SampleController::class, 'update' ])->name('samples.update');
Route::post('/samples/{id}/delete', [ SampleController::class, 'delete' ])->name('samples.delete');

// resourceとやると 7つのルートを一度に作れる
Route::resource('photos', PhotoController::class);

// サービスコンテナのサンプル
Route::get('/service-container-test', [ LifeCycleController::class, 'showServiceContainerTest' ]);

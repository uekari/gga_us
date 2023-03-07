<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\HospitalController;


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


// 試しに書いてみる！
Route::resource('user', UserController::class);
Route::resource('plan', PlanController::class);
Route::resource('hospital', HospitalController::class);

/*
|--------------------------------------------------------------------------
| 管理者用ルーティング
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function () {


    // 登録
    Route::get('register', [AdminRegisterController::class, 'create'])
        ->name('admin.register');

    Route::post('register', [AdminRegisterController::class, 'store']);

    // ログイン
    Route::get('login', [AdminLoginController::class, 'showLoginPage'])
        ->name('admin.login');

    Route::post('login', [AdminLoginController::class, 'login']);

    // 以下の中は認証必須のエンドポイントとなる
    Route::middleware(['auth:admin'])->group(function () {
        // ダッシュボード
        Route::get('dashboard', fn() => view('admin.dashboard'))
            ->name('admin.dashboard');
    });


});

// Route::prefix('admin')->name('admin.')->group(function(){
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->middleware(['auth:admin', 'verified'])->name('dashboard');

//     Route::middleware('auth:admin')->group(function () {
//         Route::get('/profile', [ProfileOfAdminController::class, 'edit'])->name('profile.edit');
//         Route::patch('/profile', [ProfileOfAdminController::class, 'update'])->name('profile.update');
//         Route::delete('/profile', [ProfileOfAdminController::class, 'destroy'])->name('profile.destroy');
//     });

//     require __DIR__.'/admin.php';
// });




Route::get('/', function () {
    return view('welcome');
});

// 「/dashboard にアクセスすると {} の処理(＝ブラウザに dashboard という名前のVewのファイルを返す)を実行する」という意味
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

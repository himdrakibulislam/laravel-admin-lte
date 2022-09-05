<?php
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\postController;
use App\Http\Controllers\admin\subcategoryController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [FrontendController::class,'index']);
Route::get('/sendemail', [FrontendController::class,'sendMail']);

Route::get('/dashboard', function () {
    return view('admin.main');
})->middleware(['auth'])->name('dashboard');
Route::get('/changepassword',function(){
    return view('admin.changepassword');
});
Route::resource('/category',categoryController::class);
Route::resource('/subcategory',subcategoryController::class);
Route::resource('/post',postController::class);

require __DIR__.'/auth.php';

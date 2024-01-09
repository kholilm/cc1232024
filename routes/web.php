<?php

use GuzzleHttp\Middleware;
use App\Models\InputNewsModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShowPdfController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InputDataController;
use App\Http\Controllers\InputNewsController;
use App\Http\Controllers\InputNotifController;
use App\Http\Controllers\InputFolderController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\BandingController;
use App\Http\Controllers\DashboardController;

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



Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "news" => InputNewsModel::latest()->filter()->paginate(1)
    ]);
});

Route::get('/link', function () {
    return view('view-link', [
        "title" => "Link"
    ]);
});

Route::get('/view-news', function () {
    return view('view-news', [
        "title" => "News"
    ]);
});

// buat controller method index

Route::get('/view-inputdata', [\App\Http\Controllers\InputDataController::class, 'index']);
// Route::resource('/view-inputdata', InputDataController::class)->except('show')->middleware('admin');
Route::get('/view-inputfiles', [InputDataController::class, 'inputFiles']);
Route::get('/inputFiles/checkSlug', [InputDataController::class, 'checkSlug'])->middleware('auth');
Route::get('/addfile', [InputDataController::class, 'create'])->middleware('auth');
Route::post('/datafile', [InputDataController::class, 'data'])->middleware('auth');
Route::post('/view-inputdata', [InputDataController::class, 'store'])->middleware('auth');
Route::get('/file/{id}/edit', [InputDataController::class, 'edit'])->middleware('auth');
Route::delete('/file/{id}', [InputDataController::class, 'destroy'])->middleware('auth');


Route::get('/addfolder', [InputFolderController::class, 'create'])->middleware('auth');
Route::post('/addfolder', [InputFolderController::class, 'store'])->middleware('auth');


Route::get('/view-notif', [InputNotifController::class, 'index']);
Route::post('/notif/data', [InputNotifController::class, 'datanotif'])->middleware('auth');
Route::get('/notif', [InputNotifController::class, 'create'])->middleware('auth');
Route::post('/notif', [InputNotifController::class, 'store'])->middleware('auth');
Route::get('/notif/{id}/edit', [InputNotifController::class, 'edit'])->middleware('auth');
Route::put('/notif/{id}', [InputNotifController::class, 'update'])->middleware('auth');
Route::delete('/notif/{id}', [InputNotifController::class, 'destroy'])->middleware('auth');

Route::get('/view-news', [InputNewsController::class, 'home']);
Route::get('/view-inputnews', [InputNewsController::class, 'index'])->middleware('auth');
Route::get('/news', [InputNewsController::class, 'create'])->middleware('auth');
Route::get('/news/{id}/edit', [InputNewsController::class, 'edit'])->middleware('auth');
Route::post('/news/data', [InputNewsController::class, 'datanews'])->middleware('auth');
Route::post('/news', [InputNewsController::class, 'store'])->middleware('auth');
Route::put('/news/{id}', [InputNewsController::class, 'update'])->middleware('auth');
Route::delete('/news/{id}', [InputNewsController::class, 'destroy'])->middleware('auth');

Route::get('/view-banding', [BandingController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/view-dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/view-tab', [TabController::class, 'index']);

Route::get('/show-pdf/{slug:url}', [ShowPdfController::class, 'index']);
Route::get('/link', [ShowPdfController::class, 'link']);

Route::resource('/view-dashboard/categories', AdminCategoryController::class)->except('show')->middleware('auth');

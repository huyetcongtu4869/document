
<?php

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

// Route::get('/', function () {
//     return view('real-estate/index');
// });
Route::match(['GET', 'POST'], '/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::match(['GET', 'POST'], '/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::match(['GET', 'POST'], '/register', [App\Http\Controllers\Auth\LoginController::class, 'register'])->name('register');
Route::middleware(['auth'])->group(function () {
    //Danh sách bất động sản
    Route::get('/real-estate', [App\Http\Controllers\RealEstateController::class, 'index'])->name('route_real_estate');
    Route::match(['GET', 'POST'], '/add-real-estate', [App\Http\Controllers\RealEstateController::class, 'add'])->name('route_real_estate_add');
    Route::match(['GET', 'POST'], '/edit-real-estate/{id}', [App\Http\Controllers\RealEstateController::class, 'edit'])->name('route_real_estate_edit');
    Route::get('/delete-real-estate/{id}', [App\Http\Controllers\RealEstateController::class, 'delete'])->name('route_real_estate_delete');
    //Danh mục bất động sản
    Route::get('/cate-real-estate', [App\Http\Controllers\CateRealEstateController::class, 'index'])->name('route_cate_real_estate');
    Route::match(['GET', 'POST'], '/add-cate-real-estate', [App\Http\Controllers\CateRealEstateController::class, 'add'])->name('route_cate_real_estate_add');
    Route::match(['GET', 'POST'], '/edit-cate-real-estate/{id}', [App\Http\Controllers\CateRealEstateController::class, 'edit'])->name('route_cate_real_estate_edit');
    Route::get('/delete-cate-real-estate/{id}', [App\Http\Controllers\CateRealEstateController::class, 'delete'])->name('route_cate_real_estate_delete');
    //Danh mục tin tức
    Route::get('/cate-news', [App\Http\Controllers\CateNewsController::class, 'index'])->name('route_cate_news');
    Route::match(['GET', 'POST'], '/add-cate-news', [App\Http\Controllers\CateNewsController::class, 'add'])->name('route_cate_news_add');
    Route::match(['GET', 'POST'], '/edit-cate-news/{id}', [App\Http\Controllers\CateNewsController::class, 'edit'])->name('route_cate_news_edit');
    Route::get('/delete-cate-news/{id}', [App\Http\Controllers\CateNewsController::class, 'delete'])->name('route_cate_news_delete');
    //Tin tức
    Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('route_news');
    Route::match(['GET', 'POST'], '/add-news', [App\Http\Controllers\NewsController::class, 'add'])->name('route_news_add');
    Route::match(['GET', 'POST'], '/edit-news/{id}', [App\Http\Controllers\NewsController::class, 'edit'])->name('route_news_edit');
    Route::get('/delete-news/{id}', [App\Http\Controllers\NewsController::class, 'delete'])->name('route_news_delete');
    //bannner
    Route::get('/banner', [App\Http\Controllers\BannerController::class, 'index'])->name('route_banner');
    Route::match(['GET', 'POST'], '/add-banner', [App\Http\Controllers\BannerController::class, 'add'])->name('route_banner_add');
    Route::match(['GET', 'POST'], '/edit-banner/{id}', [App\Http\Controllers\BannerController::class, 'edit'])->name('route_banner_edit');
    Route::get('/delete-banner/{id}', [App\Http\Controllers\BannerController::class, 'delete'])->name('route_banner_delete');
});
Route::get('/home', [App\Http\Controllers\PageController::class, 'home'])->name('home');
Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('home');
Route::get('/blog', [App\Http\Controllers\PageController::class, 'blog'])->name('blog');
Route::get('/blog-single', [App\Http\Controllers\PageController::class, 'blogSingle'])->name('route_blog_single');
Route::get('/properties-single/{id}', [App\Http\Controllers\PageController::class, 'propertiesSingle'])->name('route_properties_single');
Route::get('/properties', [App\Http\Controllers\PageController::class, 'properties'])->name('route_properties');

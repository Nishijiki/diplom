<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PersonalAccountController;
use App\Http\Controllers\DocumentSearchController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\InvestorController;


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
    return view('main');
});

Route::get('/news', function () {
    return view('news'); // news.blade.php
});

// Поиск документа
Route::get('/search-document', function () {
    return view('index2'); // index2.blade.php
});

// Подать обращение
Route::get('/submit-request', function () {
    return view('index1'); // index1.blade.php
});

// Инвесторам
Route::get('/investors', function () {
    return view('invest'); // invest.blade.php
});

// Вход
// Route::get('/login', function () {
//     return view('index4'); // index4.blade.php
// });
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Регистрация
// Route::get('/register', function () {
//     return view('index3'); // index3.blade.php
// });
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Личный кабинет
Route::get('/personal-account', function () {
    return view('index5'); // index5.blade.php
});

// Админ-панель
// Route::get('/admin', function () {
//     return view('admin'); // admin.blade.php
// });
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/requests/{id}', [AdminController::class, 'showRequest'])->name('admin.request.show');
    Route::post('/admin/registration/{id}/mark-read', [AdminController::class, 'markRegistrationAsRead'])->name('admin.registration.mark-read');
    Route::patch('/admin/requests/{id}/status', [RequestController::class, 'updateStatus'])->name('requests.update-status');
    Route::patch('/admin/investor-requests/{id}/status', [InvestorController::class, 'updateStatus'])->name('investor.update-status');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::post('/admin/news', [AdminController::class, 'storeNews'])->name('admin.news.store');
    Route::put('/admin/news/{id}', [AdminController::class, 'updateNews'])->name('admin.news.update');
    Route::delete('/admin/news/{id}', [AdminController::class, 'deleteNews'])->name('admin.news.destroy');
    Route::get('/admin/users/{id}', 'App\Http\Controllers\AdminController@getUser')->name('admin.users.get');
    Route::post('/admin/users/{id}', 'App\Http\Controllers\AdminController@updateUser')->name('admin.users.update');
    Route::put('/admin/investor-requests/{id}', [AdminController::class, 'updateInvestorRequest'])->name('admin.investor-requests.update');
    Route::delete('/admin/investor-requests/{id}', [AdminController::class, 'deleteInvestorRequest'])->name('admin.investor-requests.delete');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::post('/update-avatar', [UserController::class, 'updateAvatar'])->name('update.avatar');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});

Route::get('/news/load-more', [NewsController::class, 'index'])->name('news.load-more');

Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/personal-account', [PersonalAccountController::class, 'index'])
    ->middleware('auth.check') // Применяем middleware
    ->name('personal.account');

Route::post('/document-search', [DocumentSearchController::class, 'search'])->name('document.search');
Route::get('/document-suggestions', [DocumentSearchController::class, 'getSuggestions'])->name('document.suggestions');
Route::get('/api/documents/related/{id}', [DocumentSearchController::class, 'getRelatedDocuments'])->name('document.related');

// API-маршрут для поиска новостей
Route::get('/api/news/search', [NewsController::class, 'search'])->name('news.search');

// Маршруты для обращений
Route::post('/requests', [RequestController::class, 'store'])->name('requests.store');
Route::get('/admin/requests', [RequestController::class, 'index'])->name('requests.index')->middleware('auth', 'admin');
Route::get('/admin/requests/{id}', [RequestController::class, 'show'])->name('requests.show')->middleware('auth', 'admin');
Route::patch('/admin/requests/{id}/status', [RequestController::class, 'updateStatus'])->name('requests.update-status')->middleware('auth', 'admin');

// Маршруты для инвесторов
Route::post('/investor-requests', [InvestorController::class, 'store'])->name('investor.store');
Route::patch('/admin/investor-requests/{id}/status', [InvestorController::class, 'updateStatus'])
    ->name('investor.update-status')
    ->middleware(['auth', 'admin']);
    Route::get('/admin/requests/{id}', [RequestController::class, 'show'])->name('admin.request.show');


    Route::delete('/admin/documents/{id}', [AdminController::class, 'destroy'])->name('admin.documents.destroy');
    Route::post('/admin/documents', [AdminController::class, 'store'])->name('documents.store');
    Route::put('/admin/documents/{id}', [AdminController::class, 'update'])->name('admin.documents.update');



    Route::get('/requests/{id}/edit', [RequestController::class, 'edit'])->name('requests.edit');
    Route::put('/requests/{id}', [RequestController::class, 'update'])->name('requests.update');
    Route::delete('/requests/{id}', [RequestController::class, 'destroy'])->name('requests.destroy');


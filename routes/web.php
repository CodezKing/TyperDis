<?php

use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

use App\Livewire\Auth\AdminLogin;
use App\Livewire\Auth\UserLogin;

Route::post('register', array('before' => 'csrf', function()
{
    return 'You gave a valid CSRF token!';
}));



//Admin login route
Route::get('/admin/login',AdminLogin::class)->name('admin.login');

//User login route
Route::get('/login', UserLogin::class)->name('user.login');

Route::post('/logout',[LogoutController::class, 'logout'])->name('logout');

Route::post('register', array('before' => 'csrf', function()
{
    return 'You gave a valid CSRF token!';
}));

Route::get('test', function () {

    $user = App\Models\User::find(4);
    return $user->account;

    $document = App\Models\Document::find(3);
    return $document->user;
    return $document->account;
    return $document->online_publications;
    return $document->font;

    $online_Publications= App\Models\Publishings::find(15);
    return $online_Publications->document;


    $Credits = App\Models\Credit_id::find(2);
    return $Credits ->Account;

    $Font = App\Models\Document_id::find(1);
    return $Font -> document;

    $fonts = App\Models\Font::find(1);
    return $document -> account;

    $account = App\Models\Email::find(1);
    return $user-> account;

}); 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Admin Dashboard Route
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Admin Login Route
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminLoginController::class, 'create'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'store']);
});

// Admin Logout Route
Route::post('/admin/logout', [AdminLoginController::class, 'destroy'])->name('admin.logout');


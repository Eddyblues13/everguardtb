<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CustomAuthController;


Route::get('/', function () {
    return view('home.homepage');
});

Route::get('/bank', function () {
    return view('home.bank');
});
Route::get('/save', function () {
    return view('home.save');
});
Route::get('/borrow', function () {
    return view('home.borrow');
});
Route::get('/invest', function () {
    return view('home.invest');
});
Route::get('/insure', function () {
    return view('home.insure');
});
Route::get('/learn-and-plan', function () {
    return view('home.learn');
});
Route::get('/payments', function () {
    return view('home.payments');
});
Route::get('/credit-cards', function () {
    return view('home.credit-cards');
});
Route::get('/about-us', function () {
    return view('home.about');
});
Route::get('/checking-accounts', function () {
    return view('home.checking-accounts');
});
Route::get('/tax-checklist', function () {
    return view('home.tax-checklist');
});
Route::get('/how-to-save', function () {
    return view('home.how-to-save');
});
Route::get('/simple-ways', function () {
    return view('home.simple-ways');
});
Route::get('/the-impact', function () {
    return view('home.the-impact');
});
Route::get('/business-banking', function () {
    return view('home.business-banking');
});
Route::get('/customer-support', function () {
    return view("home.support");
});
Route::get('/news', function () {
    return view("home.news");
});
Route::get('/careers', function () {
    return view("home.careers");
});
Route::get('/giving-back', function () {
    return view("home.giving");
});
Route::get('/privacy-policy', function () {
    return view("home.privacy");
});
Route::get('/faqs', function () {
    return view("home.faqs");
});

Route::post('/registration', [AuthController::class, 'step1Submit'])->name('step1.submit');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('user.register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// Email & User Verification
Route::get('email/verify', [CustomAuthController::class, 'emailVerify'])->name('email_verify');
Route::get('user/verify', [CustomAuthController::class, 'userVerify'])->name('user_verify');
Route::get('/verify/{id}', [CustomAuthController::class, 'verify'])->name('verify');
Route::post('/verify-code', [CustomAuthController::class, 'verifyCode'])->name('verify.code');
Route::get('/resend-verification-code', [CustomAuthController::class, 'resendVerificationCode'])->name('resend.verification.code');


Route::get('/forgot-password', function () {
    return view('home.forgot-password');
})->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');




Route::post('user-logout', [UserController::class, 'UserLogout'])->name('user.logout');


Route::get('/home', [UserController::class, 'index'])->name('user.home');
Route::prefix('user')->middleware('user')->group(function () {

    // Existing routes
    Route::get('/home', [UserController::class, 'index'])->name('home');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/investment', [UserController::class, 'investment'])->name('investment');
    Route::get('/loan', [UserController::class, 'loan'])->name('loan');
    // Profile Routes
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [UserController::class, 'changePassword'])->name('profile.change-password');
    Route::post('/profile/upload-photo', [UserController::class, 'uploadPhoto'])->name('profile.upload-photo');
    Route::get('/checking-page', [UserController::class, 'checkingPage'])->name('checking.page');
    Route::get('/checking-statement', [UserController::class, 'checkingStatement'])->name('checking.statement');
    Route::get('/savings-page', [UserController::class, 'savingsPage'])->name('savings.page');
    Route::get('/savings-statement', [UserController::class, 'savingsStatement'])->name('savings.statement');
    Route::get('/apply-loan', [App\Http\Controllers\User\LoanController::class, 'index'])->name('loan.history');
    Route::post('apply-/loan', [App\Http\Controllers\User\LoanController::class, 'apply'])->name('loan.apply');
    Route::get('/support', [App\Http\Controllers\User\SupportController::class, 'index'])->name('user.support');
    Route::post('/support', [App\Http\Controllers\User\SupportController::class, 'store'])->name('user.support.store');

    Route::get('/notifications', [App\Http\Controllers\User\NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/data', [App\Http\Controllers\User\NotificationController::class, 'fetchNotifications'])->name('notifications.data');
    Route::get('/notifications/{id}', [App\Http\Controllers\User\NotificationController::class, 'show'])->name('notifications.show');
    Route::post('/notifications', [App\Http\Controllers\User\NotificationController::class, 'store'])->name('notifications.store');
    Route::post('/notifications/{id}/read', [App\Http\Controllers\User\NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::delete('/notifications/{id}', [App\Http\Controllers\User\NotificationController::class, 'destroy'])->name('notifications.destroy');
    Route::get('/transfer/{type}', [App\Http\Controllers\User\TransferController::class, 'showForm'])
        ->name('transfer.form')
        ->where('type', 'wire|local|internal|paypal|crypto|skrill');
    Route::post('/process', [App\Http\Controllers\User\TransferController::class, 'processTransfer'])->name('transfer.process');
    Route::post('/home', [App\Http\Controllers\User\TransferController::class, 'confirmTax'])->name('transfer.confirmTax');

    Route::get('/card-deposit', [App\Http\Controllers\User\CardDepositController::class, 'create'])->name('user.card.deposit.create');
    Route::post('/deposit', [App\Http\Controllers\User\CardDepositController::class, 'store'])->name('user.card.deposit.store');
    Route::get('/cheque-deposit', [App\Http\Controllers\User\ChequeDepositController::class, 'create'])->name('user.cheque.deposit.create');
    Route::post('/deposit', [App\Http\Controllers\User\ChequeDepositController::class, 'store'])->name('user.cheque.deposit.store');
    Route::get('/crypto-deposit', [UserController::class, 'cryptoDeposit'])->name('user.crypto.deposit');
});

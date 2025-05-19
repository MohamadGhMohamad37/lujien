<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\User;
Route::group([
    'prefix' => '{lang}',
    'where' => ['lang' => 'en|ar'],
    'middleware' => ['setLocale'], 
], function () {
    

 });
 Route::get('/login',[AuthController::class,'index'])->name('login');
    Route::get('/register',[AuthController::class,'register'])->name('register.page');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/email/verify', function () {
    return view('auth.verification.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    $user = User::findOrFail($id);

    if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        abort(403);
    }

    if (! $user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
    }
    return redirect()->route('login')->with('status', 'Email verified successfully. Please login.');
})->middleware(['signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'تم إرسال رابط التحقق إلى بريدك.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
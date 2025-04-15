<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FrontArticleController;
use App\Http\Controllers\FrontEventController;
use App\Http\Controllers\ForumFrontController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DonationAndFeedbackController;
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontProfileController;
use App\Http\Controllers\AIController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// LANDING PAGE
Route::get('/', function () {
    return view('welcome'); // misal tampilan awal
})->name('welcome');

// REGISTER
Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// LOGIN
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');

// Dashboard Admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->name('admin.dashboard');

// Logout Admin
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Artikel Routes (User)
Route::get('/articles', [FrontArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [FrontArticleController::class, 'show'])->name('articles.show');

// Artikel Routes (Admin)
Route::prefix('admin')->group(function () {
    // Form create artikel
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    // Proses store artikel
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    // Daftar artikel
    Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
    // Edit artikel
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    // Update artikel
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('article.update');
    // Hapus artikel
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
});

// Event Routes (User)
Route::get('/events', [FrontEventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [FrontEventController::class, 'show'])->name('events.show');
Route::post('/events/{id}/register', [FrontEventController::class, 'register'])
    ->middleware('auth')
    ->name('events.register');

// Event Routes (Admin)
Route::prefix('admin')->group(function () {
    // Form create event
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    // Proses store event
    Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
    // Daftar event
    Route::get('/events', [EventController::class, 'index'])->name('event.index');
    // Edit event
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
    // Update event
    Route::put('/events/{id}', [EventController::class, 'update'])->name('event.update');
    // Hapus event
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('event.destroy');
    // Show event
    Route::get('/events/{id}', [EventController::class, 'show'])->name('event.show');
    // Route to view registrations for an internal event
    Route::get('/events/{id}/registrations', [EventController::class, 'registrations'])->name('events.registrations');
    // Route to delete a registration
    Route::delete('/events/registrations/{id}', [EventController::class, 'destroyRegistration'])->name('registrations.destroy');
    // Route to export registrations
    Route::get('/events/{id}/export', [EventController::class, 'exportRegistrations'])->name('events.export');
});

// Donation and Feedback Routes (User)
Route::post('/donations_and_feedbacks', [DonationAndFeedbackController::class, 'store'])->name('donations_and_feedbacks.store');

// Donation and Feedback Routes (Admin)
Route::prefix('admin')->group(function () {
    // Daftar donation dan feedback
    Route::get('/donation_feedback', [DonationAndFeedbackController::class, 'index'])->name('donation_feedback.index');
    // Detail donation atau feedback
    Route::get('/donation_feedback/{id}', [DonationAndFeedbackController::class, 'show'])->name('donation_feedback.show');
    // Form edit donation atau feedback
    Route::get('/donation_feedback/{id}/edit', [DonationAndFeedbackController::class, 'edit'])->name('donation_feedback.edit');
    // Proses update donation atau feedback
    Route::put('/donation_feedback/{id}', [DonationAndFeedbackController::class, 'update'])->name('donation_feedback.update');
    // Proses hapus donation atau feedback
    Route::delete('/donation_feedback/{id}', [DonationAndFeedbackController::class, 'destroy'])->name('donation_feedback.destroy');
});

// Forum Routes (Admin)
Route::prefix('admin')->group(function () {
    Route::get('/questions', [AdminQuestionController::class, 'index'])->name('admin.forum.index');
    Route::get('/questions/{id}', [AdminQuestionController::class, 'show'])->name('admin.forum.show');
    Route::delete('/questions/{id}', [AdminQuestionController::class, 'destroy'])->name('admin.forum.destroy');
    Route::delete('/answers/{id}', [AdminQuestionController::class, 'destroyAnswer'])->name('admin.forum.answers.destroy');
});

// Forum Routes (User)
Route::get('/forum', [ForumFrontController::class, 'index'])->name('forum.index');
Route::get('/forum/my-questions', [ForumFrontController::class, 'myQuestions'])->name('forum.myQuestions');
Route::get('/forum/create', [ForumFrontController::class, 'create'])->name('forum.create');
Route::get('/forum/{id}', [ForumFrontController::class, 'show'])->name('forum.show');
Route::post('/forum/store', [ForumFrontController::class, 'store'])->name('forum.store');
Route::get('/forum/{id}/edit', [ForumFrontController::class, 'edit'])->name('forum.edit');
Route::put('/forum/{id}', [ForumFrontController::class, 'update'])->name('forum.update');
Route::delete('/forum/{id}', [ForumFrontController::class, 'destroy'])->name('forum.destroy');

// Jawaban
Route::post('/forum/{questionId}/answers', [ForumFrontController::class, 'storeAnswer'])->name('forum.answers.store');
Route::get('/forum/answers/{id}/edit', [ForumFrontController::class, 'editAnswer'])->name('forum.answers.edit');
Route::put('/forum/answers/{id}', [ForumFrontController::class, 'updateAnswer'])->name('forum.answers.update');
Route::delete('/forum/answers/{id}', [ForumFrontController::class, 'destroyAnswer'])->name('forum.answers.destroy');

// User profile routes
Route::get('/user/profile', [FrontProfileController::class, 'index'])->name('profile.index');
Route::get('/user/profile/edit', [FrontProfileController::class, 'edit'])->name('profile.edit');
Route::put('/user/profile', [FrontProfileController::class, 'update'])->name('profile.update');
Route::delete('/user/profile', [FrontProfileController::class, 'destroy'])->name('profile.destroy');

// Profile Routes (Admin)
Route::prefix('admin')->group(function () {
    Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index');
    Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profiles.create');
    Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store');
    Route::get('/profiles/{id}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('/profiles/{id}', [ProfileController::class, 'update'])->name('profiles.update');
    Route::delete('/profiles/{id}', [ProfileController::class, 'destroy'])->name('profiles.destroy');
});

Route::get('/ai-detection', [AIController::class, 'index'])->name('ai.detection');

// PROTECTED ROUTES
Route::middleware('auth')->group(function () {
    // Dashboard user biasa
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');
});



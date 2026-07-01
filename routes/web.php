<?php

use App\Http\Controllers\Admin\AiBlogController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\QuoteRequestController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Frontend Routes (guest + authenticated visitors alike)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/team', [TeamController::class, 'index'])->name('team.index');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/request-quote', [QuoteController::class, 'create'])->name('quote.create');
Route::post('/request-quote', [QuoteController::class, 'store'])->name('quote.store');
Route::get('/request-quote/success', [QuoteController::class, 'success'])->name('quote.success');

/*
|--------------------------------------------------------------------------
| Breeze Auth Routes
|--------------------------------------------------------------------------
| Laravel Breeze publishes its own auth.php with login/register/etc.
| under the "guest" and "auth" middleware groups automatically. Include
| it here. (php artisan breeze:install blade pulls this in for you.)
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Authenticated User Area (non-admin) — Breeze default profile page
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', function () {
    //    return view('dashboard');
    // })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Panel Routes — protected by auth + admin middleware
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('projects', AdminProjectController::class)->except(['show']);
    Route::delete('projects/images/{image}', [AdminProjectController::class, 'destroyImage'])->name('projects.images.destroy');

    Route::resource('services', AdminServiceController::class)->except(['show']);

    Route::resource('team', AdminTeamController::class)->except(['show']);

    Route::resource('testimonials', AdminTestimonialController::class)->except(['show']);

    Route::resource('faqs', AdminFaqController::class)->except(['show']);

    Route::resource('blogs', AdminBlogController::class)->except(['show']);

    Route::resource('categories', AdminCategoryController::class)->only(['index', 'store', 'destroy']);

    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    Route::get('quotes', [QuoteRequestController::class, 'index'])->name('quotes.index');
    Route::get('quotes/{quote}', [QuoteRequestController::class, 'show'])->name('quotes.show');
    Route::patch('quotes/{quote}/status', [QuoteRequestController::class, 'updateStatus'])->name('quotes.status');
    Route::delete('quotes/{quote}', [QuoteRequestController::class, 'destroy'])->name('quotes.destroy');

    Route::resource('users', AdminUserController::class)->except(['show']);

    // AI Blog Generator
    Route::get('ai-blog/generate', [AiBlogController::class, 'create'])->name('ai-blog.create');
    Route::post('ai-blog/generate', [AiBlogController::class, 'generate'])->name('ai-blog.generate');
    Route::post('ai-blog/save', [AiBlogController::class, 'save'])->name('ai-blog.save');
});

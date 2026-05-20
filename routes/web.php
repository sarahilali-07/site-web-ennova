<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| MODELS
|--------------------------------------------------------------------------
*/

use App\Models\Post;
use App\Models\Podcast;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Message;
use App\Models\Candidature;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\CandidatureController;

use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\PodcastController as AdminPodcastController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\AdminUserController;

/*
|--------------------------------------------------------------------------
| FRONT ROUTES
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return view('front.home', [
        'posts' => Post::latest()->take(6)->get(),
        'partners' => Partner::where('status', 'approved')->latest()->take(6)->get(),
    ]);
})->name('home');


// Static pages
Route::view('/competition', 'front.competition')->name('competition');
Route::view('/contact', 'front.contact')->name('contact');
Route::view('/associations', 'front.associations')->name('associations');


// Language switcher
Route::get('/lang/{locale}', function (string $locale) {
    if (! in_array($locale, ['fr', 'en'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    return redirect()->back();
})->name('lang.switch');

// Contact form
Route::post('/contact', function (Request $request) {

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string|max:5000',
    ]);

    Message::create($request->only('name', 'email', 'subject', 'message'));

    return back()->with('success', __('messages.flash.message_sent'));

})->name('contact.store');


// Blog
Route::get('/blog', function () {
    return view('front.blog.index', [
        'posts' => Post::with('category')->latest()->paginate(12),
        'categories' => Category::orderBy('name')->get(),
    ]);
})->name('blog.index');

Route::get('/blog/{post}', function (Post $post) {
    return view('front.blog.show', compact('post'));
})->name('blog.show');


// Podcasts
Route::get('/podcasts', function () {
    return view('front.podcast', [
        'podcasts' => Podcast::latest()->paginate(12),
    ]);
})->name('podcast.index');

// Podcast Guest Form
Route::get('/podcast-guest', function () {
    return view('front.podcast-guest');
})->name('podcast-guest.form');

Route::post('/podcast-guest', function (Request $request) {
    $request->validate([
        'full_name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'organization' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'topic' => 'required|string|max:500',
        'motivation' => 'required|string|max:5000',
        'terms' => 'required|accepted',
    ]);

    Message::create([
        'name' => $request->full_name,
        'email' => $request->email,
        'subject' => 'Podcast Guest Application: ' . $request->topic,
        'message' => "Position: {$request->position}\nOrganization: {$request->organization}\nPhone: {$request->phone}\nTopic: {$request->topic}\n\nMotivation:\n{$request->motivation}",
    ]);

    return back()->with('success', __('messages.flash.podcast_applied'));
})->name('podcast-guest.store');


// Partners (front)
Route::get('/partners', function () {
    return view('front.partners', [
        'partners' => Partner::where('status', 'approved')->latest()->paginate(12),
    ]);
})->name('partners');


// Candidature
Route::view('/candidature', 'front.candidature')->name('candidature');

Route::post('/candidature', [CandidatureController::class, 'store'])
    ->name('candidature.store');


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

// Login page
Route::get('/login', function () {

    if (auth()->check()) {
        return redirect()->route('home');
    }

    return view('auth.login');

})->middleware('guest')->name('login');


// Login action
Route::post('/login', function (Request $request) {

    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended(route('home'));
    }

    return back()->withErrors([
        'email' => __('messages.flash.login_error'),
    ]);

})->middleware('guest');


// Logout
Route::post('/logout', function (Request $request) {

    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home');

})->middleware('auth')->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        // Dashboard
        Route::get('/', function () {

            return view('admin.dashboard', [
                'stats' => [
                    'candidates' => Candidature::count(),
                    'posts' => Post::count(),
                    'podcasts' => Podcast::count(),
                    'partners' => Partner::count(),
                    'messages' => Message::count(),
                ],
                'recentCandidates' => Candidature::latest()->take(6)->get(),
            ]);

        })->name('dashboard')->middleware('permission:view dashboard');


        /*
        |--------------------------------------------------------------------------
        | ADMIN CRUD
        |--------------------------------------------------------------------------
        */

        Route::resource('candidates', CandidateController::class)
            ->only(['index', 'show'])
            ->middleware('permission:view candidates');

        Route::patch(
            'candidates/{candidate}/status',
            [CandidateController::class, 'updateStatus']
        )->name('candidates.updateStatus')->middleware('permission:update candidates');


        Route::resource('posts', AdminPostController::class)->middleware('permission:view posts|create posts|edit posts|delete posts');

        Route::resource('podcasts', AdminPodcastController::class)->middleware('permission:view podcasts|create podcasts|edit podcasts|delete podcasts');

        Route::resource('partners', PartnerController::class)->middleware('permission:view partners|create partners|edit partners|delete partners');
        Route::post('partners/{partner}/approve', [PartnerController::class, 'approve'])->name('partners.approve')->middleware('permission:approve partners');
        Route::post('partners/{partner}/reject', [PartnerController::class, 'reject'])->name('partners.reject')->middleware('permission:approve partners');

        Route::resource('messages', MessageController::class)
            ->only(['index', 'show', 'destroy'])
            ->middleware('permission:view messages|delete messages');

        Route::resource('social-links', SocialLinkController::class)->except(['show'])->middleware('permission:view social links|create social links|edit social links|delete social links');

        Route::post('messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply')->middleware('permission:reply messages');

        Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index')->middleware('permission:view settings');
        Route::put('settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update')->middleware('permission:update settings');

        /*
        |--------------------------------------------------------------------------
        | ADMIN USER & ROLE MANAGEMENT
        |--------------------------------------------------------------------------
        */

        Route::resource('admins', AdminUserController::class)->middleware('permission:view admins|create admins|edit admins|delete admins');

        Route::get('roles', [AdminUserController::class, 'roles'])->name('admins.roles')->middleware('permission:manage roles');
        Route::put('roles', [AdminUserController::class, 'updateRoles'])->name('admins.roles.update')->middleware('permission:manage roles');

    });
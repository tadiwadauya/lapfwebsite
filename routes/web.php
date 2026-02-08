<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\SuperUserDashboardController;
use App\Http\Controllers\SystemAdminDashboardController;

// Front controllers
use App\Http\Controllers\Front\TeamController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\GovernanceController;
use App\Http\Controllers\Front\DepartmentController as FrontDepartmentController;
use App\Http\Controllers\Front\PensionBenefitsController;

// User/Admin controllers (your "admin side" is role:user)
use App\Http\Controllers\Admin\HomeIntroController;
use App\Http\Controllers\Admin\NewsPostController;

use App\Http\Controllers\User\ContactCmsController;
use App\Http\Controllers\User\GovernancePageController;
use App\Http\Controllers\User\CommitteeController;
use App\Http\Controllers\User\CommitteeMemberController;
use App\Http\Controllers\User\PersonController;
use App\Http\Controllers\User\TeamMemberController;
use App\Http\Controllers\User\DepartmentController as UserDepartmentController;
use App\Http\Controllers\User\PensionBenefitPageController;

/*
|--------------------------------------------------------------------------
| Public (Front) Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/history', [HomeController::class, 'history'])->name('history');
Route::get('/identity', [HomeController::class, 'identity'])->name('identity');

Route::get('/governance', [GovernanceController::class, 'index'])->name('governance');

Route::get('/team', [TeamController::class, 'index'])->name('front.team');

Route::get('/departments', [FrontDepartmentController::class, 'index'])->name('front.departments');
Route::get('/departments/{slug}', [FrontDepartmentController::class, 'show'])->name('front.departments.show');

Route::get('/pension-benefits', [PensionBenefitsController::class, 'index'])->name('front.pension-benefits');

// News public details
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');


/*
|--------------------------------------------------------------------------
| Default Breeze Dashboard (optional)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Role Dashboards
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
        ->middleware('role:user')
        ->name('user.dashboard');

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.dashboard');

    Route::get('/superuser/dashboard', [SuperUserDashboardController::class, 'index'])
        ->middleware('role:superuser')
        ->name('superuser.dashboard');

    Route::get('/systemadmin/dashboard', [SystemAdminDashboardController::class, 'index'])
        ->middleware('role:systemadmin')
        ->name('systemadmin.dashboard');
});


/*
|--------------------------------------------------------------------------
| User CMS / Admin-side Routes (role:user)
|--------------------------------------------------------------------------
*/
Route::prefix('user')
    ->name('user.')
    ->middleware(['auth', 'role:user'])
    ->group(function () {

        /*
        | Home Intro CMS
        */
        Route::get('/home-intro', [HomeIntroController::class, 'edit'])->name('home-intro.edit');
        Route::put('/home-intro', [HomeIntroController::class, 'update'])->name('home-intro.update');

        /*
        | News Posts CRUD
        */
        Route::resource('news-posts', NewsPostController::class)->except(['show']);

        /*
        | Contact CMS + Messages
        */
        Route::get('/contact-settings', [ContactCmsController::class, 'edit'])->name('contact-settings.edit');
        Route::put('/contact-settings', [ContactCmsController::class, 'update'])->name('contact-settings.update');

        Route::get('/contact-messages', [ContactCmsController::class, 'messages'])->name('contact-messages.index');
        Route::get('/contact-messages/{contactMessage}', [ContactCmsController::class, 'showMessage'])->name('contact-messages.show');
        Route::delete('/contact-messages/{contactMessage}', [ContactCmsController::class, 'deleteMessage'])->name('contact-messages.destroy');

        /*
        | Governance CMS
        */
        Route::get('/governance', [GovernancePageController::class, 'edit'])->name('governance.edit');
        Route::put('/governance', [GovernancePageController::class, 'update'])->name('governance.update');

        /*
        | Departments CRUD (Admin side)
        */
        Route::resource('departments', UserDepartmentController::class)->except(['show']);

        /*
        | Committees CRUD + Members nested CRUD
        */
        Route::resource('committees', CommitteeController::class)->except(['show']);

        Route::prefix('committees/{committee}')->group(function () {
            Route::get('members', [CommitteeMemberController::class, 'index'])->name('committees.members.index');
            Route::get('members/create', [CommitteeMemberController::class, 'create'])->name('committees.members.create');
            Route::post('members', [CommitteeMemberController::class, 'store'])->name('committees.members.store');
            Route::get('members/{member}/edit', [CommitteeMemberController::class, 'edit'])->name('committees.members.edit');
            Route::put('members/{member}', [CommitteeMemberController::class, 'update'])->name('committees.members.update');
            Route::delete('members/{member}', [CommitteeMemberController::class, 'destroy'])->name('committees.members.destroy');
        });

        /*
        | People CRUD
        */
        Route::resource('people', PersonController::class)->except(['show']);

        /*
        | Team Members CRUD
        */
        Route::resource('team-members', TeamMemberController::class)->except(['show']);

        /*
        | Pension Benefits CMS (single edit page)
        */
        Route::get('pension-benefits/edit', [PensionBenefitPageController::class, 'edit'])
            ->name('pension-benefits.edit');

        Route::put('pension-benefits', [PensionBenefitPageController::class, 'update'])
            ->name('pension-benefits.update');
    });


require __DIR__ . '/auth.php';

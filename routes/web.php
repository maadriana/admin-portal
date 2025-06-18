<?php

use App\Http\Controllers\Users\Users;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Admin\AboutContentController;
use App\Http\Controllers\Admin\ServicesContentController;
use App\Http\Controllers\Admin\TeamContentController;
use App\Http\Controllers\Admin\CareersContentController;
use App\Http\Controllers\Admin\ContactContentController;
use App\Http\Controllers\Admin\HeaderContentController;
use App\Http\Controllers\Admin\FooterContentController;
use App\Http\Controllers\Admin\AuditContentController;
use App\Http\Controllers\Admin\AdvisoryContentController;
use App\Http\Controllers\Admin\OutsourcingContentController;
use App\Http\Controllers\Admin\RestructuringContentController;
use App\Http\Controllers\Admin\CorporateFinanceController;
use App\Http\Controllers\Admin\ForensicContentController;
use App\Http\Controllers\Admin\GovernanceContentController;
use App\Http\Controllers\Admin\EmmanuelContentController;
use App\Http\Controllers\Admin\EphraimContentController;
use App\Http\Controllers\Admin\PamelaContentController;
use App\Http\Controllers\Admin\JekellContentController;
use App\Http\Controllers\Admin\InternationalContentController;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'view'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// FIXED: Logout route that accepts both GET and POST
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Root Redirect
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Protected Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

    // Dashboard Routes
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // User Management Routes
    Route::get('/users', [Users::class, 'index'])->name('users.index');
    Route::post('/users', [Users::class, 'create'])->name('users.store');
    Route::put('/users/{id}', [Users::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [Users::class, 'destroy'])->name('users.destroy');

    // User Profile Routes
    Route::get('/profile', function() { return view('users.profile'); })->name('profile');
    Route::put('/profile/update/{id}', [Users::class, 'update'])->name('profile.update');
    Route::get('/settings', function() { return view('users.settings'); })->name('settings');

    // Content Management Routes

    // Home Content
    Route::get('/home', [HomeContentController::class, 'index'])->name('admin.home.index');
    Route::get('/home/preview', [HomeContentController::class, 'preview'])->name('admin.home.preview');
    Route::get('/home/edit', [HomeContentController::class, 'edit'])->name('admin.home.edit');
    Route::post('/home/update', [HomeContentController::class, 'update'])->name('admin.home.update');
    Route::delete('/home/remove-image', [HomeContentController::class, 'removeImage'])->name('admin.home.remove-image');

    // About Content
    Route::get('/about', [AboutContentController::class, 'index'])->name('admin.about.index');
    Route::get('/about/preview', [AboutContentController::class, 'preview'])->name('admin.about.preview');
    Route::get('/about/edit', [AboutContentController::class, 'edit'])->name('admin.about.edit');
    Route::post('/about/update', [AboutContentController::class, 'update'])->name('admin.about.update');

    // Services Content
    Route::get('/services', [ServicesContentController::class, 'index'])->name('admin.services.index');
    Route::get('/services/preview', [ServicesContentController::class, 'preview'])->name('admin.services.preview');
    Route::get('/services/edit', [ServicesContentController::class, 'edit'])->name('admin.services.edit');
    Route::post('/services/update', [ServicesContentController::class, 'update'])->name('admin.services.update');

    // Team Content
    Route::get('/team', [TeamContentController::class, 'index'])->name('admin.team.index');
    Route::get('/team/preview', [TeamContentController::class, 'preview'])->name('admin.team.preview');
    Route::get('/team/edit', [TeamContentController::class, 'edit'])->name('admin.team.edit');
    Route::post('/team/update', [TeamContentController::class, 'update'])->name('admin.team.update');

    // Careers Content
    Route::get('/careers', [CareersContentController::class, 'index'])->name('admin.careers.index');
    Route::get('/careers/preview', [CareersContentController::class, 'preview'])->name('admin.careers.preview');
    Route::get('/careers/edit', [CareersContentController::class, 'edit'])->name('admin.careers.edit');
    Route::post('/careers/update', [CareersContentController::class, 'update'])->name('admin.careers.update');

    // Contact Content
    Route::get('/contact', [ContactContentController::class, 'index'])->name('admin.contact.index');
    Route::get('/contact/preview', [ContactContentController::class, 'preview'])->name('admin.contact.preview');
    Route::get('/contact/edit', [ContactContentController::class, 'edit'])->name('admin.contact.edit');
    Route::post('/contact/update', [ContactContentController::class, 'update'])->name('admin.contact.update');

    // Header Content
    Route::get('/header', [HeaderContentController::class, 'index'])->name('admin.header.index');
    Route::get('/header/preview', [HeaderContentController::class, 'preview'])->name('admin.header.preview');
    Route::get('/header/edit', [HeaderContentController::class, 'edit'])->name('admin.header.edit');
    Route::post('/header/update', [HeaderContentController::class, 'update'])->name('admin.header.update');

    // Footer Content
    Route::get('/footer', [FooterContentController::class, 'index'])->name('admin.footer.index');
    Route::get('/footer/preview', [FooterContentController::class, 'preview'])->name('admin.footer.preview');
    Route::get('/footer/edit', [FooterContentController::class, 'edit'])->name('admin.footer.edit');
    Route::post('/footer/update', [FooterContentController::class, 'update'])->name('admin.footer.update');

    // Service Pages Content

    // Audit Content
    Route::get('/audit', [AuditContentController::class, 'index'])->name('admin.audit.index');
    Route::get('/audit/preview', [AuditContentController::class, 'preview'])->name('admin.audit.preview');
    Route::get('/audit/edit', [AuditContentController::class, 'edit'])->name('admin.audit.edit');
    Route::post('/audit/update', [AuditContentController::class, 'update'])->name('admin.audit.update');

    // Advisory Content
    Route::get('/advisory', [AdvisoryContentController::class, 'index'])->name('admin.advisory.index');
    Route::get('/advisory/preview', [AdvisoryContentController::class, 'preview'])->name('admin.advisory.preview');
    Route::get('/advisory/edit', [AdvisoryContentController::class, 'edit'])->name('admin.advisory.edit');
    Route::post('/advisory/update', [AdvisoryContentController::class, 'update'])->name('admin.advisory.update');

     // Outsourcing Content Routes
    Route::get('/outsourcing', [OutsourcingContentController::class, 'index'])->name('admin.outsourcing.index');
    Route::get('/outsourcing/preview', [OutsourcingContentController::class, 'preview'])->name('admin.outsourcing.preview');
    Route::get('/outsourcing/edit', [OutsourcingContentController::class, 'edit'])->name('admin.outsourcing.edit');
    Route::post('/outsourcing/update', [OutsourcingContentController::class, 'update'])->name('admin.outsourcing.update');

    // Business Restructuring Content Routes
    Route::get('/restructuring', [RestructuringContentController::class, 'index'])->name('admin.restructuring.index');
    Route::get('/restructuring/preview', [RestructuringContentController::class, 'preview'])->name('admin.restructuring.preview');
    Route::get('/restructuring/edit', [RestructuringContentController::class, 'edit'])->name('admin.restructuring.edit');
    Route::post('/restructuring/update', [RestructuringContentController::class, 'update'])->name('admin.restructuring.update');

    // Corporate Finance Content Routes
    Route::get('/finance', [CorporateFinanceController::class, 'index'])->name('admin.finance.index');
    Route::get('/finance/preview', [CorporateFinanceController::class, 'preview'])->name('admin.finance.preview');
    Route::get('/finance/edit', [CorporateFinanceController::class, 'edit'])->name('admin.finance.edit');
    Route::post('/finance/update', [CorporateFinanceController::class, 'update'])->name('admin.finance.update');

     // Forensic & Litigation Content Routes
    Route::get('/forensic', [ForensicContentController::class, 'index'])->name('admin.forensic.index');
    Route::get('/forensic/preview', [ForensicContentController::class, 'preview'])->name('admin.forensic.preview');
    Route::get('/forensic/edit', [ForensicContentController::class, 'edit'])->name('admin.forensic.edit');
    Route::post('/forensic/update', [ForensicContentController::class, 'update'])->name('admin.forensic.update');

     // Governance Content Routes
    Route::get('/governance', [GovernanceContentController::class, 'index'])->name('admin.governance.index');
    Route::get('/governance/preview', [GovernanceContentController::class, 'preview'])->name('admin.governance.preview');
    Route::get('/governance/edit', [GovernanceContentController::class, 'edit'])->name('admin.governance.edit');
    Route::post('/governance/update', [GovernanceContentController::class, 'update'])->name('admin.governance.update');

    // People Management Routes

     // Emmanuel Y. Mendoza Routes
        Route::get('/emmanuel', [EmmanuelContentController::class, 'index'])->name('admin.people.emmanuel.index');
        Route::get('/emmanuel/preview', [EmmanuelContentController::class, 'preview'])->name('admin.people.emmanuel.preview');
        Route::get('/emmanuel/edit', [EmmanuelContentController::class, 'edit'])->name('admin.people.emmanuel.edit');
        Route::post('/emmanuel/update', [EmmanuelContentController::class, 'update'])->name('admin.people.emmanuel.update');

        // Ephraim T. Tugano Routes
        Route::get('/ephraim', [EphraimContentController::class, 'index'])->name('admin.people.ephraim.index');
        Route::get('/ephraim/preview', [EphraimContentController::class, 'preview'])->name('admin.people.ephraim.preview');
        Route::get('/ephraim/edit', [EphraimContentController::class, 'edit'])->name('admin.people.ephraim.edit');
        Route::post('/ephraim/update', [EphraimContentController::class, 'update'])->name('admin.people.ephraim.update');

        // Pamela Grace S. Tangso Routes
        Route::get('/pamela', [PamelaContentController::class, 'index'])->name('admin.people.pamela.index');
        Route::get('/pamela/preview', [PamelaContentController::class, 'preview'])->name('admin.people.pamela.preview');
        Route::get('/pamela/edit', [PamelaContentController::class, 'edit'])->name('admin.people.pamela.edit');
        Route::post('/pamela/update', [PamelaContentController::class, 'update'])->name('admin.people.pamela.update');

        // Jekell G. Salosagcol Routes
        Route::get('/jekell', [JekellContentController::class, 'index'])->name('admin.people.jekell.index');
        Route::get('/jekell/preview', [JekellContentController::class, 'preview'])->name('admin.people.jekell.preview');
        Route::get('/jekell/edit', [JekellContentController::class, 'edit'])->name('admin.people.jekell.edit');
        Route::post('/jekell/update', [JekellContentController::class, 'update'])->name('admin.people.jekell.update');

    // International content routes
    Route::get('/admin/international', [InternationalContentController::class, 'index'])->name('admin.international.index');
    Route::get('/admin/international/edit', [InternationalContentController::class, 'edit'])->name('admin.international.edit');
    Route::post('/admin/international/update', [InternationalContentController::class, 'update'])->name('admin.international.update');
    Route::get('/admin/international/preview', [InternationalContentController::class, 'preview'])->name('admin.international.preview');

    // System Management
    Route::post('/cache/clear', [AdminController::class, 'clearCache'])->name('admin.cache.clear');
});

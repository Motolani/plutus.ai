<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnterpriseUserController;
use App\Http\Controllers\FreelancerUserController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\StarterUserController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TitlesearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//landing page
Route::get('/', [LandingController::class, 'index'])->name('landingPage');

//sending enquiry mail
Route::post('/send-enquiry-message', [LandingController::class, 'sendEmail'])->name('enquiry.send');

//newRegisterUser route
Route::get('/new-register', function () {
    return view('newRegister');
})->name('new.register');

//newLogin
Route::get('/new-login', function () {
    return view('newLogin');
})->name('new.login');

//forgot password
Route::get('/new-forgotpassword', function () {
    return view('newForgotPassword');
})->name('new.ForgotPassword');

//Billing & Subscription
Route::group(['middleware' => 'auth'], function () {
    Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/plan/{plan}', [PlanController::class, 'show'])->name('plans.show');
    Route::post('/subscription', [SubscriptionController::class, 'create'])->name('subscription.create');
});

//Title Search
Route::group(['prefix' => 'titlesearch', 'middleware' => 'auth'], function () {
    Route::get('/', [TitlesearchController::class, 'index'])->name('title.search');
    Route::post('/search', [TitlesearchController::class, 'search'])->name('title.searching');
    Route::get('/response', [TitlesearchController::class, 'showResponse'])->name('title.response');
    Route::get('/export-pdf', [TitlesearchController::class, 'exportPDF'])->name('title.pdfexport');
});

//MULTIUSERS
//ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth']], function () {
    Route::get('overview', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('enterprise-users', [AdminController::class, 'showEnterpriseUsers'])->name('admin.enterpriseUsers');
    Route::get('users/{user}', [AdminController::class, 'viewUser'])->name('admin.show.users');
    Route::get('employe-user/{employee}', [AdminController::class, 'viewEmployee'])->name('admin.show.employee');
    Route::get('starter-users', [AdminController::class, 'showStarterUsers'])->name('admin.starterUsers');
    Route::get('freelancer-users', [AdminController::class, 'showFreelancerUsers'])->name('admin.freelancerUsers');
    Route::get('employee-users', [AdminController::class, 'showEmployeeUsers'])->name('admin.employeeUsers');
    Route::get('subscriptions', [AdminController::class, 'subscriptions'])->name('admin.subscriptions');
    Route::delete('delete-user/{user}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::get('searches', [AdminController::class, 'searches'])->name('admin.usersSearches');
    Route::get('plans', [PlanController::class, 'plans'])->name('admin.plans');
    Route::get('counties', [AdminController::class, 'counties'])->name('admin.counties');
    Route::get('feedbacks', [AdminController::class, 'feedbacks'])->name('admin.feedbacks');
    Route::get('search-user', [AdminController::class, 'usersTableQuery'])->name('admin.userQueries');
    //Routes for create Plan
    Route::get('create/plan', [SubscriptionController::class, 'createPlan'])->name('create.plan');
    Route::post('store/plan', [SubscriptionController::class, 'storePlan'])->name('store.plan');

    Route::get('saved-searches', [AdminController::class, 'savedSearches'])->name('admin.savedsearches');
    Route::get('search', [AdminController::class, 'search'])->name('admin.search');
});

//Enterprise
Route::group(['prefix' => 'enterprise', 'middleware' => ['isEnterprise', 'auth']], function () {
    Route::get('overview', [EnterpriseUserController::class, 'index'])->name('enterprise.dashboard');
    Route::get('billing', [EnterpriseUserController::class, 'billing'])->name('enterprise.billing');
    Route::get('searches', [EnterpriseUserController::class, 'searches'])->name('enterprise.usersSearches');
    Route::get('employees', [EnterpriseUserController::class, 'employees'])->name('enterprise.employees');
    Route::get('create/employees', [EmployeeController::class, 'create'])->name('enterprise.employee.create');
    Route::delete('delete-user/{employee}', [EnterpriseUserController::class, 'deleteEmployee'])->name('enterprise.deleteEmployee');
    Route::get('settings', [EnterpriseUserController::class, 'settings'])->name('enterprise.settings');
    Route::post('profile-update', [EnterpriseUserController::class, 'update'])->name('update.enterpriseprofile');
    Route::post('update-password', [EnterpriseUserController::class, 'updatePassword'])->name('update.enterprisepassword');
    Route::post('upload-Avatar', [EnterpriseUserController::class, 'uploadAvatar'])->name('upload.enterpriseavatar');
    Route::post('create', [EmployeeController::class, 'store'])->name('enterprise.employee.store');


    Route::get('saved-searches', [EnterpriseUserController::class, 'savedSearches'])->name('enterprise.savedsearches');
    Route::get('search', [EnterpriseUserController::class, 'search'])->name('enterprise.search');
});

//Freelancer
Route::group(['prefix' => 'freelancer', 'middleware' => ['isFreelancer', 'auth']], function () {
    Route::get('dashboard', [FreelancerUserController::class, 'index'])->name('freelancer.dashboard');
    Route::post('profile-update', [FreelancerUserController::class, 'update'])->name('update.freelancerprofile');
    Route::post('update-password', [FreelancerUserController::class, 'updatePassword'])->name('update.freelancerpassword');
    Route::post('upload-Avatar', [FreelancerUserController::class, 'uploadAvatar'])->name('upload.freelanceravatar');
    Route::delete('delete-user', [FreelancerUserController::class, 'destory'])->name('delete.freelancer');


    Route::get('saved-searches', [FreelancerUserController::class, 'savedSearches'])->name('freelancer.savedsearches');
    Route::get('search', [FreelancerUserController::class, 'search'])->name('freelancer.search');
});

//Starter
Route::group(['prefix' => 'user', 'middleware' => ['isStarter', 'auth']], function () {
    Route::get('dashboard', [StarterUserController::class, 'index'])->name('starter.dashboard');
    Route::post('profile-update', [StarterUserController::class, 'update'])->name('update.starterprofile');
    Route::post('update-password', [StarterUserController::class, 'updatePassword'])->name('update.starterpassword');
    Route::post('upload-Avatar', [StarterUserController::class, 'uploadAvatar'])->name('upload.starteravatar');
    Route::delete('delete-user', [StarterUserController::class, 'destory'])->name('delete.starter');


    Route::get('saved-searches', [StarterUserController::class, 'savedSearches'])->name('starter.savedsearches');

    Route::get('search', [StarterUserController::class, 'search'])->name('starter.search');
});

//Employee
Route::group(['prefix' => 'employee', 'middleware' => ['isEmployee', 'auth']], function () {

    Route::get('dashboard', [EmployeeController::class, 'index'])->name('employee.dashboard');
    Route::post('profile-update', [EmployeeController::class, 'update'])->name('update.employeeprofile');
    Route::post('update-password', [EmployeeController::class, 'updatePassword'])->name('update.employeepassword');
    Route::post('upload-Avatar', [StarterUserController::class, 'uploadAvatar'])->name('upload.employeeavatar');


    Route::get('saved-searches', [EmployeeController::class, 'savedSearches'])->name('employee.savedsearches');

    Route::get('search', [EmployeeController::class, 'search'])->name('employee.search');
});

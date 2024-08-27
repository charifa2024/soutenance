<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\loginpageController;
use App\Http\Controllers\profilepageController;
use App\Http\Controllers\taskmanguserController;
use App\Http\Controllers\taskmangchefController;
use App\Http\Controllers\breakrequestController;
use App\Http\Controllers\breakrequestadminController;
use App\Http\Controllers\contactmssgController;
use App\Http\Controllers\signuprequestController;
use App\Http\Controllers\usersprofilesController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\chef_dashboardController;
use App\Http\Controllers\chef_breakrequestController;
use App\Http\Controllers\chef_profileController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', [homepageController::class, 'index'])->name('homepage.index');
Route::get('/loginpage', [loginpageController::class, 'index'])->name('loginpage.index');
Route::get('/profilepage', [profilepageController::class, 'index'])->name('profilepage.index');
Route::get('/taskmanguser', [taskmanguserController::class, 'index'])->name('taskmanguser.index');
Route::get('/taskmangchef', [taskmangchefController::class, 'index'])->name('taskmangchef.index');

Route::get('/taskmangchef/create', [taskmangchefController::class, 'create'])->name('taskmangchef.create');
Route::post('/taskmangchef', [taskmangchefController::class, 'store'])->name('taskmangchef.store');
Route::get('/taskmanguser/{task}', [taskmanguserController::class,'show'])->name('taskmanguser.show');
Route::get('/taskmangchef/{task}', [taskmangchefController::class,'show'])->name('taskmangchef.show');
route::post('/breakrequest', [breakrequestController::class, 'store'])->name('breakrequest.store');
Route::get('/breakrequest', [breakrequestController::class, 'create'])->name('breakrequest.create');
route::get('/breakrequestadmin/{breakrequestadmin}', [breakrequestadminController::class, 'show'])->name('breakrequestadmin.show');
Route::get('/breakrequestadmin', [breakrequestadminController::class, 'index'])->name('breakrequestadmin.index');

Route::get('/contactmssg', [contactmssgController::class, 'index'])->name('contactmssg.index');
Route::get('/contactmssg/create', [contactmssgController::class, 'create'])->name('contactmssg.create');
route::get('/contactmssg/{contactmssg}', [contactmssgController::class, 'show'])->name('contactmssg.show');
route::post('/contactmssg', [contactmssgController::class, 'store'])->name('contactmssg.store');

Route::get('/signuprequest', [signuprequestController::class, 'index'])->name('signuprequest.index');
route::get('/signuprequest/{signuprequest}', [signuprequestController::class, 'show'])->name('signuprequest.show');

Route::get('/usersprofiles', [usersprofilesController::class, 'index'])->name('usersprofiles.index');
route::get('/usersprofiles/{usersprofile}', [usersprofilesController::class,'show'])->name('usersprofiles.show');

Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard.index');

Route::get('/dashboard/create', [dashboardController::class, 'create'])->name('dashboard.create');
route::post('/dashboard', [dashboardController::class, 'store'])->name('dashboard.store');


Route::get('/dashboard/{task}/edit', [dashboardController::class, 'edit'])->name('dashboard.edit');
route::put('/dashboard/{task}', [dashboardController::class, 'update'])->name('dashboard.update');

route::delete('/dashboard/{task}', [dashboardController::class,'destroy'])->name('dashboard.destroy');


Route::get('/chef_dashboard', [chef_dashboardController::class, 'index'])->name('chef_dashboard.index');
Route::get('/chef_dashboard/create', [chef_dashboardController::class, 'create'])->name('chef_dashboard.create');
route::post('/chef_dashboard', [chef_dashboardController::class,'store'])->name('chef_dashboard.store');
Route::get('/chef_dashboard/{task}/edit', [chef_dashboardController::class, 'edit'])->name('chef_dashboard.edit');
route::put('/chef_dashboard/{task}', [chef_dashboardController::class, 'update'])->name('chef_dashboard.update');
route::delete('/chef_dashboard/{task}', [chef_dashboardController::class,'destroy'])->name('chef_dashboard.destroy');

route::get('/chef_breakrequest', [chef_breakrequestController::class, 'create'])->name('chef_breakrequest.create');
route::post('/chef_breakrequest', [chef_breakrequestController::class,'store'])->name('chef_breakrequest.store');
Route::get('/chef_profile', [chef_profileController::class, 'index'])->name('chef_profile.index');
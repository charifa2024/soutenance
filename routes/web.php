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
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', [homepageController::class, 'index'])->name('homepage.index');
Route::post('/homepage', [homepageController::class, 'store'])->name('homepage.store');
Route::get('/loginpage', [loginpageController::class, 'login'])->name('loginpage.login');////////
Route::post('/loginpage', [loginpageController::class, 'Auth'])->name('loginpage.auth');
Route::get('/login', [loginpageController::class, 'login'])->name('login');

Route::get('/', [loginpageController::class, 'logout'])->name('loginpage.logout');
Route::get('/signup', [loginpageController::class, 'signup'])->name('loginpage.signup');
Route::get('/show', [loginpageController::class, 'show'])->name('loginpage.show');

Route::POST('/signup', [loginpageController::class, 'store'])->name('signup.store');

Route::get('/profilepage', [profilepageController::class, 'index'])->name('profilepage.index')->middleware('auth');


Route::get('/profilepage/edit', [profilepageController::class, 'edit'])->name('profilepage.edit')->middleware('auth');
Route::put('/profilepage', [profilepageController::class, 'update'])->name('profilepage.update');

Route::get('/taskmanguser', [taskmanguserController::class, 'index'])->name('taskmanguser.index')->middleware('auth');
Route::get('/taskmangchef', [taskmangchefController::class, 'index'])->name('taskmangchef.index')->middleware('auth');

Route::get('/taskmangchef/create', [taskmangchefController::class, 'create'])->name('taskmangchef.create')->middleware('auth');
Route::post('/taskmangchef', [taskmangchefController::class, 'store'])->name('taskmangchef.store');
Route::get('/taskmanguser/{task}', [taskmanguserController::class,'show'])->name('taskmanguser.show')->middleware('auth');
Route::get('/taskmangchef/{task}', [taskmangchefController::class,'show'])->name('taskmangchef.show')->middleware('auth');
Route::get('/taskmangchef/{task}/edit', [taskmangchefController::class, 'edit'])->name('taskmangchef.edit')->middleware('auth');
route::put('/taskmangchef/{task}', [taskmangchefController::class, 'update'])->name('taskmangchef.update');
Route::get('/breakrequest', [breakrequestController::class, 'index'])->name('breakrequest.index')->middleware('auth');
route::post('/breakrequest', [breakrequestController::class, 'store'])->name('breakrequest.store');
Route::get('/breakrequest/create', [breakrequestController::class, 'create'])->name('breakrequest.create')->middleware('auth');
route::get('/breakrequestadmin/{breakrequestadmin}', [breakrequestadminController::class, 'show'])->name('breakrequestadmin.show')->middleware('auth');
Route::get('/breakrequestadmin', [breakrequestadminController::class, 'index'])->name('breakrequestadmin.index')->middleware('auth');
route::post('/breakrequestadmin/{breakrequestadmin}/accept', [breakrequestadminController::class, 'accept'])->name('breakrequestadmin.accept');
route::post('/breakrequestadmin/{breakrequestadmin}/refuse', [breakrequestadminController::class, 'refuse'])->name('breakrequestadmin.refuse');


Route::get('/contactmssg', [contactmssgController::class, 'index'])->name('contactmssg.index')->middleware('auth');
Route::get('/contactmssg/{contactmssgId}/edit', [contactmssgController::class, 'edit'])->name('contactmssg.edit')->middleware('auth');
route::put('/contactmssg/{contactmssgId}', [contactmssgController::class, 'update'])->name('contactmssg.update');
route::get('/contactmssg/{contactmssgId}', [contactmssgController::class, 'show'])->name('contactmssg.show')->middleware('auth');



Route::get('/signuprequest', [signuprequestController::class, 'index'])->name('signuprequest.index')->middleware('auth');
route::get('/signuprequest/{signuprequestId}', [signuprequestController::class,'show'])->name('signuprequest.show')->middleware('auth');
Route::delete('/signuprequest/{signuprequestId}', [signuprequestController::class,'refuse'])->name('signuprequest.refuse');
Route::post('/signuprequest/{signuprequestId}', [signuprequestController::class,'accept'])->name('signuprequest.accept');

Route::get('/usersprofiles', [usersprofilesController::class, 'index'])->name('usersprofiles.index')->middleware('auth');//////////:///////
route::get('/usersprofiles/create', [usersprofilesController::class, 'create'])->name('usersprofiles.create')->middleware('auth');
route::get('/usersprofiles/{usersprofile}/edit', [usersprofilesController::class, 'edit'])->name('usersprofiles.edit')->middleware('auth');
route::put('/usersprofiles/{usersprofile}', [usersprofilesController::class, 'update'])->name('usersprofiles.update');
route::post('/usersprofiles', [usersprofilesController::class, 'store'])->name('usersprofiles.store');
route::get('/usersprofiles/{usersprofile}', [usersprofilesController::class,'show'])->name('usersprofiles.show')->middleware('auth');

Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::get('/dashboard/create', [dashboardController::class, 'create'])->name('dashboard.create')->middleware('auth');
route::post('/dashboard', [dashboardController::class, 'store'])->name('dashboard.store');


Route::get('/dashboard/{task}/edit', [dashboardController::class, 'edit'])->name('dashboard.edit')->middleware('auth');
route::put('/dashboard/{task}', [dashboardController::class, 'update'])->name('dashboard.update');

route::delete('/dashboard/{task}', [dashboardController::class,'destroy'])->name('dashboard.destroy');


Route::get('/chef_dashboard', [chef_dashboardController::class, 'index'])->name('chef_dashboard.index')->middleware('auth');///////://////
Route::get('/chef_dashboard/create', [chef_dashboardController::class, 'create'])->name('chef_dashboard.create')->middleware('auth');
route::post('/chef_dashboard', [chef_dashboardController::class,'store'])->name('chef_dashboard.store');
Route::get('/chef_dashboard/{task}/edit', [chef_dashboardController::class, 'edit'])->name('chef_dashboard.edit')->middleware('auth');
route::put('/chef_dashboard/{task}', [chef_dashboardController::class, 'update'])->name('chef_dashboard.update');
route::delete('/chef_dashboard/{task}', [chef_dashboardController::class,'destroy'])->name('chef_dashboard.destroy');
route::get('/chef_breakrequest', [chef_breakrequestController::class, 'index'])->name('chef_breakrequest.index')->middleware('auth');
route::get('/chef_breakrequest/create', [chef_breakrequestController::class, 'create'])->name('chef_breakrequest.create')->middleware('auth');
route::post('/chef_breakrequest', [chef_breakrequestController::class,'store'])->name('chef_breakrequest.store');
Route::get('/chef_profile', [chef_profileController::class, 'index'])->name('chef_profile.index')->middleware('auth');
Route::get('/chef_profile/edit', [chef_profileController::class, 'edit'])->name('chef_profile.edit')->middleware('auth');
Route::put('/chef_profile', [chef_profileController::class, 'update'])->name('chef_profile.update');

Route::get('send_request-accepted_email/{signuprequestId}' , [EmailController::class, 'Send_RequestAccepted_Email'])->name('send_request-accepted_email');
route::get('send_request-refused_email/{signuprequestId}', [EmailController::class, 'Send_RequestRefused_Email'])->name('send_request-refused_email');
Route::get('send_contactmssgResponse_email/{contactmssgId}', [EmailController::class, 'send_contactmssgResponse_Email'])->name('send_contactmssgResponse_email');

Route::get('/dashboard/{id}/state', [dashboardController::class, 'state'])->name('dashboard.state');
route::get('/dashboard/{id}/show', [dashboardController::class, 'show'])->name('dashboard.show')->middleware('auth');

Route::get('/chef_dashboard/{id}/state', [chef_dashboardController::class, 'state'])->name('chef_dashboard.state');
route::get('/chef_dashboard/{id}/show', [chef_dashboardController::class, 'show'])->name('chef_dashboard.show')->middleware('auth');

Route::get('/taskmanguser/{id}/state', [taskmanguserController::class, 'state'])->name('taskmanguser.state');
Route::delete('/usersprofiles/{userId}', [usersprofilesController::class, 'destroy'])->name('usersprofiles.destroy')->middleware('auth');

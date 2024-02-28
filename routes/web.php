<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // home
    Route::get('dashboard',[HomeController::class,'index'])->name('dashboard');

    // admin
    Route::get('admin/profile',[ProfileController::class,'index'])->name('admin#profile');

    Route::post('admin/update',[ProfileController::class,'updateAdmin'])->name('admin#update');

    Route::get('admin/changePasswordPage',[ProfileController::class,'changePasswordPage'])->name('admin#changePasswordPage');

    Route::post('admin/changePassword',[ProfileController::class,'changePassword'])->name('admin#changePassword');

     // user list
     Route::get('admin/userList',[UsersController::class,'userList'])->name('admin#userList');

     Route::get('admin/delete/{id}',[UsersController::class,'deleteAccount'])->name('admin#deleteAccount');

     Route::post('admin/userList',[UsersController::class,'userListSearch'])->name('admin#userListSearch');

     Route::get('admin/view/{id}',[UsersController::class,'adminView'])->name('admin#view');

    // role
    Route::get('role',[RoleController::class,'index'])->name('admin#role');

    Route::get('role/add',[RoleController::class,'addRole'])->name('admin#addRole');

    Route::post('role/add',[RoleController::class,'createRole'])->name('admin#createRole');

    Route::get('role/delete/{id}',[RoleController::class,'deleteRole'])->name('admin#deleteRole');

    Route::post('role/search',[RoleController::class,'searchRole'])->name('admin#searchRole');

    Route::get('role/view/{id}',[RoleController::class,'viewRole'])->name('admin#viewRole');

    Route::post('role/update/{id}',[RoleController::class, 'updateRole'])->name('admin#updateRole');
});

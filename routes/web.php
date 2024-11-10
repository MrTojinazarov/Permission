<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Check;

Route::get('/', [AdminController::class, 'index'])->name('admin.index')->middleware([Check::class]);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'create'])->name('register.create');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/company', [CompanyController::class, 'index'])->name('company.index')->middleware(Check::class);
Route::get('/company-create', [CompanyController::class, 'create'])->name('company.create')->middleware(Check::class);
Route::post('/company', [CompanyController::class, 'store'])->middleware(Check::class);
Route::delete('/company/{id}', [CompanyController::class, 'delete'])->middleware(Check::class);
Route::get('/company/{id}', [CompanyController::class, 'addProduct'])->middleware(Check::class);

Route::get('/product', [ProductController::class, 'product'])->name('product.index')->middleware(Check::class);
Route::get('/product-create', [ProductController::class, 'create'])->name('product.create')->middleware(Check::class);
Route::post('/product', [ProductController::class, 'store'])->name('product.store')->middleware(Check::class);
Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('product.delete')->middleware(Check::class);
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update')->middleware(Check::class);

Route::get('/client', [ClientController::class, 'client'])->name('client.index')->middleware(Check::class);
Route::get('/client-create', [ClientController::class, 'create'])->middleware(Check::class);
Route::post('/client', [ClientController::class, 'store'])->middleware(Check::class);
Route::delete('/client/{id}', [ClientController::class, 'delete'])->name('client.destroy')->middleware(Check::class);
Route::put('/client/{user}', [ClientController::class, 'update'])->name('client.update')->middleware(Check::class);

Route::get('/role', [RoleController::class, 'index'])->name('role.index')->middleware(Check::class);
Route::post('/role', [RoleController::class, 'store'])->name('role.store')->middleware(Check::class);
Route::put('/role{role}', [RoleController::class, 'update'])->name('role.update')->middleware(Check::class);
Route::delete('/role{role}', [RoleController::class, 'destroy'])->name('role.delete')->middleware(Check::class);

Route::get('/userRole', [UserRoleController::class, 'index'])->name('userRole.index')->middleware(Check::class);
Route::post('/userRole', [UserRoleController::class, 'store'])->name('userRole.store')->middleware(Check::class);
Route::put('/userRole/{id}', [UserRoleController::class, 'update'])->name('userRole.update')->middleware(Check::class);
Route::delete('/userRole/{id}', [UserRoleController::class, 'destroy'])->name('userRole.delete')->middleware(Check::class);

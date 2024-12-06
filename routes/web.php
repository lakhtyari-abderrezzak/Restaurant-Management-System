<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ServantController;
use App\Http\Controllers\TableController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Auth Routes
route::get('login', [AuthController::class, 'index'])->name('login');
route::post('login', [AuthController::class, 'login'])->name('auth.login');
route::post('logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');


route::resource('categories', CategoryController::class)->middleware('auth');
route::resource('menus', MenuController::class)->middleware('auth');
route::resource('servants', ServantController::class)->middleware('auth');
route::resource('tables', TableController::class)->middleware('auth');
route::resource('sales', SaleController::class)->middleware('auth');

// Reports Routes 
route::get('reports', [ReportsController::class, 'index'])->name('reports.index')->middleware('auth');
route::post('show', [ReportsController::class, 'show'])->name('reports.show')->middleware('auth');
route::post('export', [ReportsController::class, 'export'])->name('reports.export')->middleware('auth');

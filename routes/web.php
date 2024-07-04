<?php

use App\Http\Controllers\CementController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Actions\Logout as LogOutAction;

Route::prefix('/')->middleware("auth")->group(function () {

    Route::get('/', [HomeController::class, 'home'])->name('home'); // home page

    Route::prefix('/clients')->group(function () {

        Route::get("/list", [ClientController::class, 'list'])->name("clients.list");

        Route::get("/create", [ClientController::class, 'create'])->name("clients.create");
    });

    Route::prefix("/cements")->group(function () {

        Route::get("/create", [CementController::class, 'create'])->name("cements.create");
    });

    Route::prefix("/sales")->group(function () {
        Route::get("/create", [SaleController::class, 'create'])->name('sales.create');
        Route::get("/list", [SaleController::class, 'list'])->name('sales.list');
    });

    Route::get('/logout', function () {

        $logout = new   LogOutAction;

        $logout();

        return redirect()->back();
    });
});

require __DIR__ . '/auth.php';

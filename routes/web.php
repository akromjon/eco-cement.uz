<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Actions\Logout as LogOutAction;


Route::get('/', [HomeController::class, 'home'])->middleware("auth")->name('home'); // home page
Route::get('/logout',function(){

    $logout=new   LogOutAction;

    $logout();

    return redirect()->back();
});

require __DIR__ . '/auth.php';

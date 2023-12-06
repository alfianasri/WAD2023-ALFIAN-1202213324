<?php

use App\Http\Controllers\ShowroomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('showroom', [showroomcontroller::class, 'index'])->name('showroom.index');
Route::get('showroom/create', [showroomcontroller::class, 'create'])->name('showroom.create');
Route::post('showroom/store', [showroomcontroller::class, 'store'])->name('showroom.store');

?>
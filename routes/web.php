<?php

use App\Livewire\UserTable;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user',UserTable::class);


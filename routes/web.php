<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Wizard;


Route::get('/', function () {
    return view('landing');
});

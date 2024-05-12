<?php

use App\Livewire\Contact;
use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\News;
use App\Livewire\Portfolio;
use App\Livewire\Service;
use Illuminate\Support\Facades\Route;

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

Route::get('/', Home::class);

Route::get('/about', About::class);

Route::get('/service', Service::class);

Route::get('/portfolio', Portfolio::class);

Route::get('/news', News::class);

Route::get('/contact', Contact::class);

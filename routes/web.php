<?php

use App\Http\Controllers\Sample\IndexController;
use App\Http\Controllers\Tweet\CreateController;
use App\Http\Controllers\Tweet\IndexController as TweetIndexController;
use App\Http\Controllers\Tweet\Update\IndexController as UpdateIndexController;
use App\Http\Controllers\Tweet\Update\PutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/sample',
    [IndexController::class, 'show']
);

Route::get(
    '/sample/{id}',
    [IndexController::class, 'showId']
);

Route::get(
    '/tweet',
    TweetIndexController::class
)
    ->name('tweet.index');

Route::post(
    '/tweet/create',
    CreateController::class
)
    ->name('tweet.create');

Route::get(
    '/tweet/update/{tweetId}',
    UpdateIndexController::class
)
    ->name('tweet.update.index')
    ->where('tweetId', '[0-9]+');

Route::put(
    '/tweet/update/{tweetId}',
    PutController::class
)
    ->name('tweet.update.put')
    ->where('tweetId', '[0-9]+');

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'today' => now()->toFormattedDateString(),
        'wordsets' => [
            'today' => DB::table('wordsets')->whereNull('learnt_at')->orderBy('id')->first(),
            '1day' => DB::table('wordsets')->whereDate('learnt_at', now()->subDay()->toDateString())->first(),
            '3days' => DB::table('wordsets')->whereDate('learnt_at', now()->subDays(4)->toDateString())->first(),
            '7days' => DB::table('wordsets')->whereDate('learnt_at', now()->subDays(11)->toDateString())->first(),
            '16days' => DB::table('wordsets')->whereDate('learnt_at', now()->subDays(27)->toDateString())->first(),
        ]
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

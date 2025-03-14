<?php

use App\Http\Controllers\courrierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Fichier;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    return view('welcome');
});


    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/dashboard2', function () {
        return view('dashboard2');
    })->middleware(['auth', 'verified'])->name('dashboard2');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    route::resource('/user',UserController::class);
    
});

Route::middleware('auth')->group(function(){
Route::resource('courrier',courrierController::class);
// Route::get('file/{fichier_id}', function ($fichier_id) {
//         // Check if the file exists in the public directory
//         //dd($nom_fichier);
//         $fichier=Fichier::where('id','=',$fichier_id)->first();
//         if (Storage::disk('public')->exists($fichier->chemin)) {
//             return response()->file(storage_path("app/public/".$fichier->chemin));
//         }
    
//         // If the file doesn't exist, you can return a 404 response
//         abort(404, 'File not found');
//     });
});

Route::get('/courrier/{id}/file', [App\Http\Controllers\courrierController::class, 'showFile'])->name('courrier.showFile');

require __DIR__.'/auth.php';

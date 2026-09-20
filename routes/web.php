<?php

use App\Http\Controllers\OgolneController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */
//Route::get('/', [OgolneController::class, 'start']);
/* Route::get('/kontakt', function () {
    $zadania=[
        'Zadanie 1',
        'Zadanie 2',
        'Zadanie 3'
    ];
    //return view('kontakt');
    //return view('kontakt', ['zadania' => $zadania]);
    //return view('kontakt')->with('zadania', $zadania);
    return view('kontakt', compact('zadania'));
});

Route::get('/onas', function () {
    return view('onas');
}); */
//Route::get('/kontakt', [OgolneController::class, 'kontakt']);
//Route::get('/onas', [OgolneController::class, 'onas']);
//grupowanie
Route::controller(OgolneController::class)->group(function (){
    Route::get('/', 'start')->name('ogolne.start');
    Route::get('/kontakt-do-nas', 'kontakt')->name('ogolne.kontakt');
    Route::get('/o-nas', 'onas')->name('ogolne.onas');
});
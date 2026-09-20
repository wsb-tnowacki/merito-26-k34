<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/kontakt', function () {
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
});
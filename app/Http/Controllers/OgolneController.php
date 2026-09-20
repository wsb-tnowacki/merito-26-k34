<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OgolneController extends Controller
{
    public function start()
    {
        return view('ogolne.welcome');
    }
    public function kontakt()
    {
        $zadania=[
        'Zadanie 1',
        'Zadanie 2',
        'Zadanie 3'
        ];
        //return view('kontakt');
        //return view('kontakt', ['zadania' => $zadania]);
        //return view('kontakt')->with('zadania', $zadania);
        return view('ogolne.kontakt', compact('zadania'));
    }
    public function onas()
    {
        return view('ogolne.onas');
    }
}

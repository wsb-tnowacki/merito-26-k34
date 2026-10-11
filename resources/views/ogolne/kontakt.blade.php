@extends('layout.layout')
@section('tresc')
    <div>Kontakt</div>
    @auth
     @isset($zadania)
        <ol>
            @foreach ($zadania as $zadanie)
                <li>{{$zadanie}}</li>
            @endforeach
        </ol>    
    @endisset       
    @endauth

@endsection
@section('tytul', '- Kontakt')
@section('podtytul', 'Strona kontaktowa')
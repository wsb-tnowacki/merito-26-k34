@extends('layout.layout')
@section('tresc')
    <div>Kontakt</div>
    @isset($zadania)
        <ol>
            @foreach ($zadania as $zadanie)
                <li>{{$zadanie}}</li>
            @endforeach
        </ol>    
    @endisset
@endsection
@section('tytul', '- Kontakt')
@section('podtytul', 'Strona kontaktowa')
@extends('layout.layout')
@section('tresc')
@isset($post)
<div class="w-full ">
        <div class="mb-2"><label for="tytul" class="block text-gray-700 font-bold mb-2">Tytuł</label>
            <input type="text" name="tytul" id="tytul" value="{{$post->tytul}}" placeholder="Podaj tytuł postu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>

        </div>
        <div class="mb-2"><label for="autor" class="block text-gray-700 font-bold mb-2">Autor</label>
            <input type="text" name="autor" id="autor" value="{{$post->user->name}}" placeholder="Podaj autora postu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>

        </div>
        <div class="mb-2"><label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="text" name="email" id="email"  value="{{$post->user->email}}" placeholder="Podaj email autora postu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
        </div>
        <div class="mb-2">
            <label for="data" class="block text-gray-700 font-bold mb-2">Daty:</label>
            <div class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">Data utworzenia: <b>{{$post->created_at->locale('pl')->setTimezone('Europe/Warsaw')->translatedFormat('j F Y H:i:s')}}</b> <br>
    Data edycji: <b>{{$post->updated_at->locale('pl')->setTimezone('Europe/Warsaw')->translatedFormat('j F Y H:i:s')}}</div>
        </div>
<div class="mb-2">
            <label for="tresc" class="block text-gray-700 font-bold mb-2">Treść</label>
            <textarea name="tresc" id="tresc" rows="4" placeholder="Wpisz treść posta" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>{{$post->tresc}}</textarea>

        </div>
        <div class="flex items-center ">
            @auth
            <a href="{{route('post.edit', $post->id)}}">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline mx-1">Edytuj post</button>
            </a>
            <form action="{{route('post.destroy',$post->id)}}" method="post" onsubmit="return confirm('Czy na pewno chcesz usunąć ten post?')">
                @method('DELETE')
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 mx-1 rounded-lg focus:outline-none focus:shadow-outline">Usuń post</button>
            </form>
            @endauth
            <a href="{{route('post.index')}}">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline mx-1">Powrót do listy</button>
            </a>
        </div>
    
</div>
@endisset
@endsection
@section('tytul', '- Szczegóły posta')
@section('podtytul', 'Szczegóły posta')
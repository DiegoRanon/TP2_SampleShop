@extends('layouts.app')


@section('content')


    <h1>Modifier article: {{ $article->titre }}</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form method="post" action="{{ url('article/'. $article->id) }}" enctype="multipart/form-data" >
        @method('PATCH')
        @csrf


        <div class="form-group mb-3">

            <label for="title">Titre:</label>
            <input type="text" class="form-control" id="title" placeholder="Entrer titre" name="title" value="{{ $article->titre }}">

        </div>

        <div class="form-group mb-3">

            <label for="content">Ajouter le contenu:</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $article->content }}</textarea>

        </div>

        <div class="form-group mb-3">
        <input type = "file" name= "image">
            <input type = "submit" name= "Envoyer">
 </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

@endsection
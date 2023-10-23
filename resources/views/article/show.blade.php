@extends('layouts.app')


@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>{{ $article->titre }}</h1>
            <p class="lead">{{ $article->content }}</p>

            <div class="buttons">
                <a href="{{ url('article/'. $article->id .'/edit') }}" class="btn btn-info">Modifier</a>
                <form action="{{ url('article/'. $article->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>


@endsection
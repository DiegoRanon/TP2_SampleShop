@extends('layouts.app')

    
@section('content')

    <div class="row">

        <div class="col-lg-10">
            <h2>Mon premier blog avec Laravel</h2>
        </div>

        <div class="col-lg-2">
            <a class="btn btn-success" href="{{ url('sample/create') }}">Ajouter un sample</a>
        </div>

    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif



<div class="container">
    <div class="row">
        @foreach ($samples as $index => $sample)
        <div class="col-md-4">
            <div class="card card-body">
                <a href="{{ url('sample/'. $sample->id) }}">
                <h2>
                        {{ $sample->title }}
                    </h2>
                   
                </a>
                {{ $sample->content }}
               

          
            <a href="{{ url('sample/'. $sample->id) }}" class="btn btn-outline-primary">En savoir plus</a>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection 
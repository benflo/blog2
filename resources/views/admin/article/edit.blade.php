@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">éditer d'article</div>

    {!! Form::open() !!}
    {{ Form::token() }}
    {{ Form::label('titre') }}<br>
    {{ Form::text('titre', $articles->titre) }}<br>
    {{ form::label('contenu') }}<br>
    {{ Form::textarea('contenu', $articles->contenu) }}<br><br>

    {{ Form::submit() }}
    {!! Form::close() !!}
    </div>
        </div>
    </div>
@endsection
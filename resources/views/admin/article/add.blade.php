@extends('layouts.app')
<style>
</style>
@section('content')

    <div class="container">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Article</div>
                    {!! Form::open() !!}
                    {{ Form::token() }}
                    {{ Form::label('titre') }}<br>
                    {{ Form::text('titre')}}<br>
                    {{ form::label('contenu') }}<br>
                    {{ Form::textarea('contenu') }}<br><br>

                    {{ Form::submit() }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>




@endsection
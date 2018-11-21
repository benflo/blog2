@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth

                    @endauth
                </div>
            @endif

            <div class="content">
                <h2 class="row justify-content-center">Articles</h2>
                <div>
                    @foreach ($articles as $article)
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <h2 class="card-header"> {{$article->titre}}</h2>
                            <p>{{$article->contenu}}</p>
                            <p>{{$article->created_at}}</p>
                            @if(Route::has('login'))
                                @auth
                                <a href="{{ route('admin.article.edit', ['id' => $article->id]) }}">modifier</a> <a href="{{ route('admin.article.delete', ['id' => $article->id]) }}">supprimer</a>


                        @endauth

                        @endif
                                </div>
                            </div>
                        </div>
                        <br>

                    @endforeach

                </div>

            </div>

        </div>
    </body>
</html>
@endsection
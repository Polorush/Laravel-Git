@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        <h1>{{$article->title}}</h1>
                        <p>{{$article->content}}</p>
                        <p>
                            @if($article->user)
                                Pseudo: {{$article->user->name}}
                            @else
                                Pas d'utilisateur
                            @endif
                        </p>
                            <p>Partager: @include('social.share', [
                                    'url' => request()->fullUrl(),
                                    'description' => 'This is really cool link',
                                    'image' => 'http://placehold.it/300x300?text=Cool+link'
                            ]) </p>
                        <a href="{{route('article.index')}}">Retour</a>

                           <hr>

                            <div class="comments">
                                <ul class="list-group">

                                    @foreach ($article->comments as $comment)
                                        <li class="list-group-item">
                                            <strong>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </strong>
                                            {{ $comment->body }}
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                            <hr>

                            <div class="card">
                                <div class="card-block">
                                    <form method="POST" action="/article/{{ $article->id }}/comments">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <textarea name="body" placeholder="Votre commentaire ici." class="form-control">

                                            </textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Ajouter un commentaire anonyme</button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

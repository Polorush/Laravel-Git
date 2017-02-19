@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                    @endif
                
                    @foreach ($articles as $article)

                        <h1>{{ $article->title }} <small>{{ $article->likes()->count() }} <i class="fa fa-thumbs-up"></i></small></h1>

                        <p>{{ $article->content }}</p>
                            <a href="{{route('article.show', ['id' => $article->id])}}">
                                Voir l'article
                            </a>
                        <br>
                        @foreach ($article->likes as $user)
                            {{ $user->name }} likes this !<br>
                        @endforeach

                        @if ($article->isLiked)
                            <a href="{{ route('article.like', $article->id) }}"> Dislike !</a>
                        @else
                            <a href="{{ route('article.like', $article->id) }}"> Like !</a>
                        @endif
                    @endforeach
                </div>
                 <div class="text-center">
                        {{$articles->links()}}
                        </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">My likes</div>

                <div class="panel-body">
                    @foreach (Auth::user()->likedArticles as $article)

                        <h2>{{ $article->title }}</h2>

                        <a href="{{ route('article.like', $article->id) }}">Dislike !</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
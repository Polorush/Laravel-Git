@extends('layouts.app')

@section('content')

<style>
        .table{
            background-color: white;
        }

        h2 {
            color: white;
        }

        p {
            color: white;
        }
</style>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="container">
        <center><h2>Page Admin</h2></center>
        <center><p>de suppression des articles</p></center>
        <table class="table table-striped">
            
            <thead>
            <tr>
                <th>Articles</th>
                <th>Contenu</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->content }}</td>
                
                <td>{{ Form::open(['route' => ['article.delete', $article->id], 'method'=> 'delete']) }}

                    {{ Form::submit('Supprimer l\'Article', ['class' => 'btn btn-danger']) }}

                    {{ Form::close() }}

                   

    @empty

        Pas d'article

    @endforelse


                    </td>
                </tr>
            </tbody>
        </table>
    </div>




@endsection
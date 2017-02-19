@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="container">
        <center><h2>Page Admin</h2></center>
        <center><p>de suppression des commentaires</p></center>
        <table class="table table-striped">
            
            <thead>
            <tr>
                <th>Commentaires</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($comments as $comment)
            <tr>
                <td>{{ $comment->body }}</td>
                
                <td>{{ Form::open(['route' => ['comments.delete', $comment->id], 'method'=> 'delete']) }}

                    {{ Form::submit('Supprimer le commentaire', ['class' => 'btn btn-danger']) }}

                    {{ Form::close() }}

                   

    @empty

        Pas de commentaires

    @endforelse


                    </td>
                </tr>
            </tbody>
        </table>
    </div>




@endsection
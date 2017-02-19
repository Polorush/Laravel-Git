<title>Forum - Darknet</title>

@extends('layouts.app')

@section('content')

<style>
    .container {
        text-align: center;
    }

    .panel {
        margin-top: 150px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenu sur notre forum veuillez vous munir d'un vpn pour un anonymat absolu</div>

                <div class="panel-body">
                    @if(Auth::check())
                        <h2>Bonjour, {{Auth::user()->name}}</h2>
                        
                        {{--@if(Auth::guest('is_admin' == 1))--}}
                            {{--<p>Connecté en tant qu'administrateur</p>--}}
                        {{--@else--}}
                            {{--<p>Connecté en tant que membre</p>--}}
                        {{--@endif--}}

                    @else
                        <h2>Bonjour invité</h2>
                    @endif
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 style="text-align: center">Contact</h3></div>

                    <div class="panel-body" style="text-align: center">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif



                        <form method="POST" class="form-horizontal" action="{{route('contact')}}">

                            {{csrf_field()}}

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Name</label>
                                <div class="col-sm-10">
                                    <input required type="text" name="name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">E-mail</label>
                                <div class="col-sm-10">
                                    <input required type="text" name="email" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="message">Message</label>
                                <div class="col-sm-10">
                                    <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
<hr>
                            <div class="form-group" style="text-align: center">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <button type="submit" class="btn btn-outline-primary">Envoyer</button>
                                </div>
                            </div>
</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
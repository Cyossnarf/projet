@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenue!</div>

                <div class="panel-body">
                    Bonjour {{ Auth::user()->Prénom." ".Auth::user()->Nom }}, vous êtes connecté.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

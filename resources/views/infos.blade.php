@extends('layouts.app')

@section('content')
	<h1> Informations personnelles </h1>
    <br>
	<div class="panel panel-default">	
		<div class="panel-heading">Profil utilisateur</div>
		<div class="panel-body">
			<p>N°RPPS : {{ Auth::user()->ID_Prac }}</p>
			<p>Prénom : {{ Auth::user()->Prénom }}</p>
			<p>Nom : {{ Auth::user()->Nom }}</p>
			<p>Date de naissance : {{ Auth::user()->DateNaissance }}</p>
			<p>N°SIH : {{ Auth::user()->SIH }}</p>
			@if(Auth::user()->admin == 1)
				Administrateur
			@endif
		</div>
	</div>
	<ul class="list-inline">
		<li>
			{!! link_to_route('informations.edit', 'Modifier mes informations', [], ['class' => 'btn btn-info']) !!}
		</li>
		<li>
			{!! link_to_route('motdepasse.edit', 'Changer de mot de passe', [], ['class' => 'btn btn-info']) !!}
		</li>
	</ul>
@endsection

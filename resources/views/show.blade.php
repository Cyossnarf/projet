@extends('layouts.backend')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Fiche d'utilisateur</div>
			<div class="panel-body">
				<p>N°RPPS : {{ $user->ID_Prac }}</p>
				<p>Prénom : {{ $user->Prénom }}</p>
				<p>Nom : {{ $user->Nom }}</p>
				<p>Date de naissance : {{ $user->DateNaissance }}</p>
				<p>N°SIH : {{ $user->SIH }}</p>
				@if($user->admin == 1)
					Administrateur
				@endif
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@endsection

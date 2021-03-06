@extends('layouts.backend')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Modification d'un utilisateur</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($user, ['route' => ['admin.user.update', $user->ID_Prac], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('Prénom') ? 'has-error' : '' !!}">
					  	{!! Form::text('Prénom', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}
					  	{!! $errors->first('Prénom', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('Nom') ? 'has-error' : '' !!}">
					  	{!! Form::text('Nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
					  	{!! $errors->first('Nom', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('DateNaissance') ? 'has-error' : '' !!}">
					  	{!! Form::text('DateNaissance', null, ['class' => 'form-control', 'placeholder' => 'Date de naissance']) !!}
					  	{!! $errors->first('DateNaissance', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('SIH') ? 'has-error' : '' !!}">
					  	{!! Form::text('SIH', null, ['class' => 'form-control', 'placeholder' => 'N°SIH']) !!}
					  	{!! $errors->first('SIH', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe: laisser vide pour ne rien changer']) !!}
						{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group">
						{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation mot de passe']) !!}
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								{!! Form::checkbox('admin', 1, null) !!}Administrateur
							</label>
						</div>
					</div>
						{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@endsection

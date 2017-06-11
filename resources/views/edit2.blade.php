@extends('layouts.app')

@section('content')

    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Modification des informations</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($user, ['route' => 'informations.update', 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
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
						{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
@endsection

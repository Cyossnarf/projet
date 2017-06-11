@extends('layouts.app')

@section('content')
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Modification du mot de passe</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::open(['route' => 'motdepasse.update', 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('password_old') ? 'has-error' : '' !!}">
						{!! Form::password('password_old', ['class' => 'form-control', 'placeholder' => 'Ancien mot de passe']) !!}
						{!! $errors->first('password_old', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Nouveau mot de passe']) !!}
						{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group">
						{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation nouveau mot de passe']) !!}
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

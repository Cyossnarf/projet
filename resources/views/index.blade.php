@extends('layouts.backend')

@section('content')
    <br>
    <div class="col-sm-offset-2 col-sm-8">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des utilisateurs</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>N°RPPS</th>
						<th>Prénom</th>
						<th>Nom</th>
						<th>N°SIH</th>
						<th>Admin</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>
							<td>{!! $user->ID_Prac !!}</td>
							<td class="text-primary"><strong>{!! $user->Prénom !!}</strong></td>
							<td class="text-primary"><strong>{!! $user->Nom !!}</strong></td>
							<td>{!! $user->SIH !!}</td>
							<td>{!! $user->admin !!}</td>
							<td>{!! link_to_route('admin.user.show', 'Voir', [$user->ID_Prac], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>{!! link_to_route('admin.user.edit', 'Modifier', [$user->ID_Prac], ['class' => 'btn btn-warning btn-block']) !!}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['admin.user.destroy', $user->ID_Prac]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
		</div>
		{!! link_to_route('admin.user.create', 'Ajouter un utilisateur', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
@endsection

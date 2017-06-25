@extends('layouts.backend')

@section('content')
<div class="col-sm-offset-4 col-sm-4">
</br>
<div class="panel panel-primary">
<div class="panel-heading">Consulter des données</div>
<div class="panel-body">

<!--Système d'onglets par "pillules"-->
<ul class="nav nav-pills">
	<li class="active"><a data-toggle="pill" href="#fiches">Fiches</a></li>
    <li><a data-toggle="pill" href="#stats">Listes</a></li>
</ul>
  
<div class="tab-content">
	<!--Première pillule (celle qui est active au début)-->
    <div id="fiches" class="tab-pane fade in active">
		<div class="panel panel-default">
			<div class="panel-heading">Choisissez un type de fiche :</div>
			<div class="panel-body">
				<div class="col-sm-4">
					{!! Form::open(['route' => 'admin.donnees.fiches', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group">
						{!! Form::select('fiche', array('cardiologie' => 'Cardiologie',
							'anatomopatho' => 'Anatomopathologie',
							'radiologie' => 'Radiologie')) !!}
					</div>
					{!! Form::submit('Suivant', ['class' => 'btn btn-primary  pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
    </div>
	<!--Deuxième pillule-->
    <div id="stats" class="tab-pane fade">
		<div class="panel panel-default">
			<div class="panel-heading">Choisissez un type de liste :</div>
			<div class="panel-body">
				<ul class="list-inline">
					<li class="list-group-item">
						{!! link_to_route('admin.donnees.resultat1', 'Praticiens', [], ['class' => 'btn']) !!}
					</li>
  					<li class="list-group-item">
						{!! link_to_route('admin.donnees.resultat2', 'Centres', [], ['class' => 'btn']) !!}
					</li>
  					<li class="list-group-item">
						{!! link_to_route('admin.donnees.resultat3', 'Patients', [], ['class' => 'btn']) !!}
					</li>
				</ul>
			</div>
		</div>
    </div>
</div>

</div>
</div>
</div>
@endsection



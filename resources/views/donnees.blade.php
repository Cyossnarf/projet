@extends('layouts.app')

@section('content')
<h1> Consultation de données </h1>
</br>
<!--Système d'onglets par "pillules"-->
<ul class="nav nav-pills">
	<li class="active"><a data-toggle="pill" href="#fiches">Mes fiches</a></li>
    <li><a data-toggle="pill" href="#stats">Mes statistiques</a></li>
</ul>
  
<div class="tab-content">
	<!--Première pillule (celle qui est active au début)-->
    <div id="fiches" class="tab-pane fade in active">
		<div class="panel panel-default">
			<div class="panel-heading">Choisissez un type de fiche :</div>
			<div class="panel-body">
				<div class="col-sm-4">
					{!! Form::open(['route' => 'donnees.fiches', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group">
						{!! Form::select('fiche', array('anatomopatho' => 'Anatomopathologie',
							'cardiologie' => 'Cardiologie',
							'radiologie' => 'Radiologie')) !!}
					</div>
					{!! Form::submit('Suivant', ['class' => 'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
    </div>
	<!--Deuxième pillule-->
    <div id="stats" class="tab-pane fade">
		<div class="panel panel-default">
			<div class="panel-heading">Choisissez un type de statistique :</div>
			<div class="panel-body">
				<ul class="list-inline">
					<li class="list-group-item">
						{!! link_to_route('donnees.stat1', 'Fiches', [], ['class' => 'btn']) !!}
					</li>
  					<li class="list-group-item">
						{!! link_to_route('donnees.stat2', 'Patients', [], ['class' => 'btn']) !!}
					</li>
  					<li class="list-group-item">
						{!! link_to_route('donnees.stat3', 'Examens', [], ['class' => 'btn']) !!}
					</li>
				</ul>
			</div>
		</div>
    </div>
</div>

@endsection



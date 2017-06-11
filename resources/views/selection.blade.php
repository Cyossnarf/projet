@extends('layouts.app2')

@section('content')

<?php

$fiche = $_POST['fiche'];

try {
	$bdd = new PDO('mysql:host=localhost;dbname=tuto;charset=utf8', 'root', '');
}
catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME=\''.$fiche.'\'');
$champs=array();

while($donnees = $reponse->fetch()) {
	array_push($champs, $donnees[0]);
}

if ($admin) {
	$route = 'admin.donnees.fiches.resultats';
} else {
	$route = 'donnees.fiches.resultats';
	unset($champs[0]);
	unset($champs[1]);
}

?>

<div class="panel panel-primary">
	<div class="panel-heading">{{ "Dans la table ".$fiche.", vous cherchez des fiches telles que :" }}</div>
	<table class="table">
		{!! Form::open(['route' => $route]) !!}
			<tbody>
				@foreach ($champs as $num)
					<?php
						$value = $num.'+'.$fiche;
						$reponse = $bdd->query('SELECT Dénomination, TypeAttr, TableListe FROM codetablesatt WHERE AttributName = \''.$num.'\'' );
						$donnees = $reponse->fetch();
						$label = $donnees[0];
						$liste = ($donnees[1] == 'LISTE');
						$booleen = ($donnees[1] == 'BOOLEEN');
						$pourcentage = ($donnees[1] == 'NOMBRE%');
						$date = ($donnees[1] == 'DATE');

						if ($liste) {
							$reponse = $bdd->query('SELECT * FROM '.$donnees[2] );
							$choix = array();
							while ($donnees = $reponse->fetch()) {
								array_push($choix, $donnees[1]);
							}
						}
						elseif ($booleen) {
							$choix = array('OUI' => 'OUI', 'NON' => 'NON');
						}
						elseif ($pourcentage) {
							$num1 = $num.'1';
							$num2 = $num.'2';
						}
						elseif ($date) {
							$numd1 = $num.'d1';
							$numd2 = $num.'d2';
						}
					?>
					<tr>
						<td>{!! Form::checkbox($value, 1, null) !!}</td>
						<td>{{ $label }}</td>
						<td>
							@if ($liste or $booleen)
								{!! Form::select($num, $choix) !!}
							@elseif ($pourcentage)
								{{ 'entre' }}
								{!! Form::selectRange($num1, 0, 100) !!}
								{{ '% et' }}
								{!! Form::selectRange($num2, 0, 100, 100) !!}
								{{ '%' }}
							@elseif ($date)
								{{ 'entre le' }}
								{!! Form::text($numd1, null, ['class' => 'datepicker', 'readonly' => true]) !!}
								{{ 'et le' }}
								{!! Form::text($numd2, null, ['class' => 'datepicker', 'readonly' => true]) !!}
							@else
								{!! Form::text($num, null) !!}
							@endif
						</td>
					</tr>
				@endforeach
				<?php $reponse->closeCursor();?>
				<tr>
					<td>{!! Form::submit('Résultat', ['class' => 'btn btn-primary']) !!}</td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		{!! Form::close() !!}
	</table>
</div>

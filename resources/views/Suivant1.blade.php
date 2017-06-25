<!DOCTYPE html>

<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=tuto;charset=utf8', 'root', '');
}
catch (Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT COUNT(P_ID_NUM_EXAM) as NB FROM anatomopatho');
$total = $reponse->fetch();

$reponse = $bdd->query('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= \'anatomopatho\'');
$champs=array();

while ($donnees = $reponse->fetch()) {
	array_push($champs,$donnees[0]);
}

if (!$admin) {
	unset($champs[0]);
	unset($champs[1]);
}

$rep = '';
foreach ($champs as $num) :
	$value=$num.'+anatomopatho';

	if (isset($_POST[$value])) {
		if (isset($_POST[$num])) {
			$rep = $rep.$num.' = \''.$_POST[$num].'\' AND ';
		}
		elseif (isset($_POST[$num.'1'])) {
			$rep = $rep.$num.' BETWEEN '.$_POST[$num.'1'].' AND '.$_POST[$num.'2'].' AND ';
		}
		else {
			$rep = $rep.'STR_TO_DATE('.$num.', \'%d-%m-%Y\') BETWEEN \''.$_POST[$num.'d1'].'\' AND \''.$_POST[$num.'d2'].'\' AND ';
		}
	}
endforeach;

$rep = substr($rep, 0, -4);

if (!$admin) {
	$rep = $rep.' AND P_ADM_ANAPATH = \''.$id_user.'\'';
}

$resultat = $bdd->query('SELECT * FROM anatomopatho WHERE '.$rep );
$nb = 0;
$chaine = '';
while ($don = $resultat->fetch()) {
	$nb = $nb+1;
	
	$etab = $bdd->query('SELECT NomÉtablissement FROM etablissement WHERE nFINESS = '.$don[0]);
    $centre=$etab->fetch ();
    $med=$bdd->query('SELECT Nom,Prénom FROM praticien WHERE ID_Prac = '.$don[1]);
    $medecin=$med->fetch ();
    $mal=$bdd->query('SELECT DatedeNaissance,Sexe FROM patient WHERE ID_Pat = \''.$don[4].'\'');
    $malade=$mal->fetch ();
    
    $chaine = $chaine.'La fiche num&eacute;ro '.$nb.' : </br></br>'.'Centre d\'examen : '.$centre[0].'</br>'.'M&eacute;decin responsable : '.$medecin[1].'  '.$medecin[0].'</br>'.' Num&eacute;ro de l\'examen : '.$don[2].'</br>'.' Date de l\'examen : '.$don[3].'</br>'.'Identifiant malade : '.$don[4].'</br>'.'Date de naissance malade : '.$malade[0].'</br>'.'Sexe du malade : '.$malade[1].'</br> </br> </br>';
 }

$pourcentage = number_format($nb*100/$total['NB'], 2, ',', ' ');
echo('Votre recherche correspond à '.$nb.' fiches ('.$pourcentage.'%): </br> </br> </br>'.$chaine);

//echo('SELECT * FROM anatomopatho WHERE '.$rep);//debug

$reponse->closeCursor();
?>

</html>

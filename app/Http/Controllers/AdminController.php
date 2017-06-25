<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
	
    public function show()
    {
        return view('admin');
    }

	public function donnees()
	{
		return view('donnees_adm');
	}
	
public function listmed() {
	$Praticien = \App\Praticien::all();
	$nb = 0;
	$chaine = '';
    foreach ($Praticien as $Praticien) {
    	$chaine = $chaine."Identifiant: <br>".$Praticien->ID_Prac."<br> Nom et Prénom: <br>".$Praticien->Prénom." ".$Praticien->Nom."<br> Date de naissance: <br>". $Praticien->DateNaissance."<br> travaille dans le centre <br>".$Praticien->SIH."<br> <br>";
		$nb = $nb + 1;
	}
	echo ('La base recense '.$nb.' praticiens: <br> <br> <br>'.$chaine);
}

public function listcentre() {
	$etablissement = \App\Etablissement::all();
	$nb = 0;
	$chaine = '';
    foreach ($etablissement as $etablissement) {
    	$chaine = $chaine."Nom de l'etablissement : ".$etablissement->NomÉtablissement."<br> Numero FINESS : ".$etablissement->nFINESS."<br>";
		$nb = $nb + 1;
	}
	echo ('La base recense '.$nb.' établissements: <br> <br> <br>'.$chaine);
}	

public function listpat() {
	$Patient = \App\Patient::all();
	$nb = 0;
	$chaine = '';
    foreach ($Patient as $Patient) {
    	$chaine = $chaine."Date de naissance du patient : <br>".$Patient->DatedeNaissance."<br> Sexe : ".$Patient->Sexe."<br> <br>";
		$nb = $nb + 1;
	}
	echo ('La base recense '.$nb.' patients: <br> <br> <br>'.$chaine);
}
}

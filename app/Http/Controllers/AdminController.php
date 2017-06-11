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
	
	public function listmed()
{
$Praticien = \App\Praticien::all();
    foreach ($Praticien as $Praticien) {
    echo "Identifiant:   ",'<br>',$Praticien->ID_Prac,'<br>',"       Nom et Prénom:  ",'<br>',$Praticien->Prénom,"  ",$Praticien->Nom,'<br>',"       Date de naissance:  ",'<br>', $Praticien->DateNaissance,'<br>',"      travaille dans le centre  ",'<br>', $Praticien->SIH,'<br>','<br>';
}

}
public function listcentre()
{
$etablissement = \App\Etablissement::all();
    foreach ($etablissement as $etablissement) {
    echo "Nom de l'etablissement : ",$etablissement->NomÉtablissement,'<br>',"  Numero FINESS : ", $etablissement->nFINESS,'<br>';
}

}	

public function listpat()
{
$Patient = \App\Patient::all();
    foreach ($Patient as $Patient) {
    echo "Date de naissance du patient : ",'<br>',$Patient->DatedeNaissance,'<br>', "Sexe : ",$Patient->Sexe, '<br>', '<br>';
}
}
}

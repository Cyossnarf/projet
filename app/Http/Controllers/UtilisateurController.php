<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		// Ce middleware impose d'être connecté avant de pouvoir utiliser une méthode du controller
        $this->middleware('auth');
    }
	
	public function index()
	{
		return view('utilisateur');
	}

	public function infos()
	{
		return view('infos');
	}

	public function donnees()
	{
		return view('donnees');
	}

	public function stat1(){
		$fiches = \App\Anatomopatho::
		select('P_ADM_ANAPATH' , \DB::raw('count(P_ID_NUM_EXAM) as nbfiches'))
			->groupBy('P_ADM_ANAPATH')
			->having('P_ADM_ANAPATH', '=', Auth::user()->ID_Prac)
			->get();
		foreach ($fiches as $fiche) {
    		echo  'Vous avez le numéro RPPS '.$fiche->P_ADM_ANAPATH.' et vous avez enregistré  '. $fiche->nbfiches.' fiches.', '<br>';
		}
	}
  
    public function stat2(){
		$pats = \App\Anatomopatho::
		select('P_ADM_ANAPATH' , \DB::raw('count(P_ADM_IPP) as nbpatients'))
			->groupBy('P_ADM_ANAPATH')
			->having('P_ADM_ANAPATH', '=', Auth::user()->ID_Prac)
			->distinct()
			->get();
		foreach ($pats as $pat) {
    		echo  'Vous avez le numéro RPPS '.$pat->P_ADM_ANAPATH.' et vous avez examiné  '. $pat->nbpatients.' patients.', '<br>';
		}
	}

    public function stat3(){
		$fiches = \App\Anatomopatho::
		select('P_ADM_ANAPATH' , \DB::raw('count(P_ID_NUM_EXAM) as nbfiches'))
			->groupBy('P_ADM_ANAPATH')
			->having('P_ADM_ANAPATH', '=', Auth::user()->ID_Prac)
			->get();
		foreach ($fiches as $fiche) {
    		echo  'Vous avez le numéro RPPS '.$fiche->P_ADM_ANAPATH.' et vous avez effectué  '. $fiche->nbfiches.' examens.', '<br>';
		}
	}
}

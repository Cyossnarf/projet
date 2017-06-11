<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class ResearchController extends Controller
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
		// Ce middleware impose d'être admin pour pouvoir utiliser certaines méthodes
		$this->middleware('admin', ['only' => ['selectfiches_adm', 'resultfiches_adm']]);
    }
	
	public function selectfiches()
	{
		return view('selection')->with('admin', false);
	}

	public function resultfiches()
	{
		return view('Suivant1', ['admin' => false, 'id_user' => Auth::user()->ID_Prac]);
	}

	public function selectfiches_adm()
	{
		return view('selection')->with('admin', true);
	}

	public function resultfiches_adm()
	{
		return view('Suivant1', ['admin' => true, 'id_user' => null]);
	}
}

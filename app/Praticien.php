<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Praticien extends Authenticatable
{
	/**
	 * Sans cette précision, Eloquent n'arrivera pas à gérer une clef primaire
	 * de type string
	 */
	public $incrementing = false;
	
	/**
	 * Par défaut, l'authentification laravel cherchera les utilisateurs
	 * dans une table "users", et essaiera de les identifier avec une clef
	 * primaire "id"
	 */	
	protected $table = 'praticien';
	protected $primaryKey = 'ID_Prac';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID_Prac', 'SIH', 'Prénom', 'Nom', 'password', 'DateNaissance', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	 * Méthode appelée après chaque modification du mot de passe
	 * Attention à ne pas crypter deux fois!
	 */
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}
	
	/**
	 * Méthode qui vérifie si l'utilisateur est un administrateur
	 */
	public function isAdmin()
	{
    	return $this->admin; // this looks for an admin column in your users table
	}
}

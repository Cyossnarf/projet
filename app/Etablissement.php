<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    
	protected $table = 'etablissement';
	protected $primaryKey = 'nFINESS';
	
	protected $fillable = [
        'NomÉtablissement'
    ];
	
}

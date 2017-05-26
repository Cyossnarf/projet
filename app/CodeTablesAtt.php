<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeTablesAtt extends Model
{
    protected $table = 'praticien';
	protected $primaryKey = 'ID_Prac';
	
	public $timestamps = false;
}

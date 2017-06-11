<?php

namespace App\Gestion;

use App\Praticien;

class UserRepository extends ResourceRepository
{
	
    public function __construct(Praticien $user)
	{
		$this->model = $user;
	}
	
}
